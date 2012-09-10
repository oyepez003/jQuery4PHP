<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsPlot Plot object returned by call to $.jqplot (YsPlot).
 * Handles parsing user options, creating sub objects
 * (Axes, legend, title, series) and rendering the plot.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlot extends YsComponent{

  public static $DATA_HIGHLIGHT_HANDLER = 'jqplotDataHighlight';
  public static $DATA_CLICK_HANDLER = 'jqplotDataClick';
  public static $DATA_UNHIGHLIGHT_HANDLER = 'jqplotDataUnhighlight';
  public static $DATA_RIGHT_CLICK_HANDLER = 'jqplotDataRightClick';
  public static $DEFAULT_TICK_FORMATTER = 'DefaultTickFormatter';
  public static $MOVE_SERIES_TO_FRONT = 'moveSeriesToFront';
  public static $MOVE_SERIES_TO_BACK = 'moveSeriesToBack';
  public static $RESTORE_PREVIOUS_SERIES_ORDER = 'restorePreviousSeriesOrder';
  public static $RESTORE_ORIGINAL_SERIES_ORDER = 'restoreOriginalSeriesOrder';
  public static $THEME_ENGINE_NEW_THEME = 'themeEngine.newTheme';
  public static $ACTIVATE_THEME = 'activateTheme';
  public static $DEFAULT_THEME = 'Default';
  public static $GLOBAL_SUFFIX = 'Var';
  public static $CONFIG_EVENT = 'config';
  public static $CURSOR_ZOOMPROXY = 'Cursor.zoomProxy';
  public static $REPLOT_EVENT = 'replot';
  public static $CATCH_ERROR_CONFIG = 'catchErrors';
  public static $ERROR_BACKGROUND_CONFIG = 'errorBackground';
  public static $ERROR_BORDER_CONFIG = 'errorBorder';
  public static $ERROR_FONT_FAMILY_CONFIG = 'errorFontFamily';
  public static $ERROR_FONT_SIZE_CONFIG = 'errorFontSize';
  public static $ERROR_MESSAGE_CONFIG = 'errorMessage';
  public static $ENABLE_PLUGINS_EVENT = 'enablePlugins';

  private $data;
  private $axesDefaults;
  private $seriesDefaults;
  private $series;
  private $axes;
  private $grid;
  private $legend;
  private $seriesColors;
  private $sortData;
  private $fontSize;
  private $title;
  private $stackSeries;
  private $defaultAxisStart;
  private $cursor;
  private $dragable;
  private $highlighter;
  private $showMarker;
  private $captureRightClick;
  
  private $plotId;
  private $plotName;
  private $seriesData;
  private $plotHtmlProperties;
  private $plotTemplate;
  private $buildOnce;
  private $jquerySelector;
  private $axisOptions;
  private $catchError;
  private $gridPadding;
  private $seriesStyles;
  private $axesStyles;

  private $errorMessage;
  private $errorBackground;
  private $errorBorder;
  private $errorFontFamily;
  private $errorFontSize;
  private $enablePlugins;
  private $themeEngine;
  
  private $animate;
  private $animateReplot;

  /**
   *
   * @param string $id
   * @param string $title
   */
  public function __construct($id, $title = null) {
    parent::__construct();
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQPLOT);
    $this->setJQueryObject(YsJQPlot::build());
    if ($title !== null) {
      $this->setTitle($title);
    }
    $this->setPlotId($id);
    $this->renewSeries();
    $this->renewAxis();
    $this->themeEngine = new ArrayObject();
    $this->enablePlugins = true;
    $this->buildOnce = true;
  }

  public function varsToUnset() {
    return array('id', 'plotName','seriesData', 'plotHtmlProperties','plotId',
                 'plotTemplate', 'buildOnce', 'jquerySelector', 'axisOptions',
                 'catchError','errorMessage','errorBackground','errorBorder',
                 'errorFontFamily','errorFontSize', 'enablePlugins', 'themeEngine');
  }

  public function getData() {
    return $this->data;
  }

  /**
   * User’s data.  Data should NOT be specified in the options object,
   * but be passed in as the second argument to the $.jqplot() function.
   * The data property is described here soley for reference.
   * The data should be in the form of an array of 2D or 1D arrays like
   * @param array $data
   */
  public function setData($data) {
    $this->data = $data;
  }

  public function getAxesDefaults() {
    return $this->axesDefaults;
  }

  /**
   * Default options that will be applied to all axes.
   * @see YsPlotAxis
   * @param array $axesDefaults
   */
  public function setAxesDefaults($axesDefaults) {
    $this->axesDefaults = $axesDefaults;
  }

  public function getSeriesDefaults() {
    return $this->seriesDefaults;
  }

  /**
   * Default options that will be applied to all series.
   * @see YsPlotSerie
   * @param array $seriesDefaults
   */
  public function setSeriesDefaults(YsPlotSerie $seriesDefaults) {
    $this->buildAxisOptions($seriesDefaults);
    $this->seriesDefaults = $seriesDefaults;
  }

  public function getSeries() {
    return $this->series->getArrayCopy();
  }

  /**
   * Array of series object options
   * @see YsPlotSerie
   * @param YsPlotSerie $seriesDefaults
   */
  public function setSeries($series) {
    foreach (func_get_args () as $serie) {
      if ($serie instanceof YsPlotSerie) {
        $this->addSerie($serie);
      }
    }
  }

  public function addSerie(YsPlotSerie $serie){
    $this->buildAxisOptions($serie);
    $this->addSerieData($serie->getData()->getArrayCopy());
    $this->series->append($serie->optionsToArray());
  }

  public function getAxes() {
    return $this->axes;
  }

  /**
   * Up to 4 axes are supported, each with it’s own options,
   * @see YsPlotSerie
   * @param YsPlotAxis $axes
   */
  public function setAxes($axes) {
    $this->axes = $axes;
  }

  public function getGrid() {
    return $this->grid;
  }

  /**
   * @see YsPlotGrid
   * @param YsPlotGird $grid
   */
  public function setGrid($grid) {
    $this->grid = $grid;
  }

  public function getLegend() {
    return $this->legend;
  }

  /**
   * @see YsPlotLegend
   * @param YsPlotLegend $grid
   */
  public function setLegend(YsPlotLegend $legend) {
    $this->legend = $legend->buildOptions();
  }

  public function getSeriesColors() {
    return $this->seriesColors;
  }

  /**
   * Ann array of CSS color specifications that will be applied, in order,
   * to the series in the plot.  Colors will wrap around so, if their are
   * more series than colors, colors will be reused starting at the beginning.
   * For pie charts, this specifies the colors of the slices.
   * @param array $seriesColors
   */
  public function setSeriesColors($seriesColors) {
    $this->seriesColors = $seriesColors;
  }

  public function getSortData() {
    return $this->sortData;
  }

  /**
   * False to not sort the data passed in by the user.
   * Many bar, stakced and other graphs as well as many plugins depend on
   * having sorted data.
   * @param boolean $sortData
   */
  public function setSortData($sortData) {
    $this->sortData = $sortData;
  }

  public function getFontSize() {
    return $this->fontSize;
  }

  /**
   * CSS specifications for the font-size attribute.
   * Default for the entire plot.
   * @param string $fontSize
   */
  public function setFontSize($fontSize) {
    $this->fontSize = $fontSize;
  }

  public function getTitle() {
    return $this->title;
  }

  /**
   * Title object. As a shortcut, you can specify the title option as just a
   * string like: title: ‘My Plot’ and this will create a new title object
   * with the specified text.
   * @see YsPlotTitle
   * @param YsPlotTitle|string $title
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getStackSeries() {
    return $this->stackSeries;
  }

  /**
   * Creates a stack or “mountain” plot.
   * Not all series renderers may implement this option.
   * @param boolean $stackSeries
   */
  public function setStackSeries($stackSeries) {
    $this->stackSeries = $stackSeries;
  }

  public function getDefaultAxisStart() {
    return $this->defaultAxisStart;
  }

  /**
   * 1-D data series are internally converted into 2-D [x,y] data point
   * arrays by jqPlot.  This is the default starting value for the missing
   * x or y value.  The added data will be a monotonically increasing series
   * (e.g.  [1, 2, 3, ...]) starting at this value.
   * @param array $defaultAxisStart
   */
  public function setDefaultAxisStart($defaultAxisStart) {
    $this->defaultAxisStart = $defaultAxisStart;
  }

  public function getCursor() {
    return $this->cursor;
  }

  /**
   * @see YsPlotCursor
   * @param YsPlotCursor $cursor
   */
  public function setCursor(YsPlotCursor $cursor) {
    $this->cursor = $cursor->optionsToArray();
  }

  public function getDragable() {
    return $this->dragable;
  }

  /**
   * @see YsPlotDraggable
   * @param YsPlotDraggable $dragable
   */
  public function setDragable($dragable) {
    $this->dragable = $dragable;
  }

  public function getHighlighter() {
    return $this->highlighter;
  }

  /**
   * @see YsPlotHighlighter
   * @param YsPlotHighlighter $highlighter
   */
  public function setHighlighter(YsPlotHighlighter $highlighter) {
    $this->highlighter = $highlighter->optionsToArray();
  }

  public function getShowMarker() {
    return $this->showMarker;
  }

  public function setShowMarker($showMarker) {
    $this->showMarker = $showMarker;
  }

  public function getCaptureRightClick() {
    return $this->captureRightClick;
  }

  public function setCaptureRightClick($captureRightClick) {
    $this->captureRightClick = $captureRightClick;
  }

  public function getGridPadding() {
    return $this->gridPadding;
  }

  public function setGridPadding($gridPadding) {
    $this->gridPadding = $gridPadding;
  }

  public function getPlotId() {
    return $this->plotId;
  }

  public function getSeriesStyles() {
    return $this->seriesStyles;
  }

  public function setSeriesStyles($seriesStyles) {
    $this->seriesStyles = $seriesStyles;
  }

  public function getAxesStyles() {
    return $this->axesStyles;
  }

  public function setAxesStyles($axesStyles) {
    $this->axesStyles = $axesStyles;
  }

  /**
   * The object id
   * @param string $id
   */
  public function setPlotId($id) {
    $this->plotId = $id;
  }

  public function getPlotName() {
    return $this->plotName;
  }

  /**
   * The Component Name
   * @param string $plotName
   */
  public function setPlotName($plotName) {
    $this->plotName = $plotName;
  }

  public function renewSeries() {
    $this->series = new ArrayObject();
    $this->seriesData = new ArrayObject();
    $this->axisOptions = null;
  }

  public function renewAxis() {
    $this->axes = null;
  }

  public function removeHighlighter(){
    $this->highlighter = null;
  }

  public function removeCursor(){
    $this->cursor = null;
  }

  public function addSerieData($serie) {
    $this->seriesData->append($serie);
  }

  public function getSeriesData() {
    return $this->seriesData;
  }

  public function showLegend($location = null){
    if($this->legend instanceof YsPlotLegend){
      $this->legend->setShow();
      $this->legend->setLocation($location);
    }else{
      $this->legend = new YsPlotLegend($location);
    }
  }

  public function setSeriesData($seriesData) {
    $this->seriesData = $seriesData;
  }

  public function getCatchError() {
    return $this->catchError;
  }

  public function setCatchError($catchError) {
    $this->catchError = $catchError;
  }

  public function getErrorMessage() {
    return $this->errorMessage;
  }

  public function setErrorMessage($errorMessage) {
    $this->errorMessage = $errorMessage;
  }

  public function getErrorBackground() {
    return $this->errorBackground;
  }

  public function setErrorBackground($errorBackground) {
    $this->errorBackground = $errorBackground;
  }

  public function getErrorBorder() {
    return $this->errorBorder;
  }

  public function setErrorBorder($errorBorder) {
    $this->errorBorder = $errorBorder;
  }

  public function getErrorFontFamily() {
    return $this->errorFontFamily;
  }

  public function setErrorFontFamily($errorFontFamily) {
    $this->errorFontFamily = $errorFontFamily;
  }

  public function getErrorFontSize() {
    return $this->errorFontSize;
  }

  public function setErrorFontSize($errorFontSize) {
    $this->errorFontSize = $errorFontSize;
  }

  public function getEnablePlugins() {
    return $this->enablePlugins;
  }

  public function setEnablePlugins($enablePlugins) {
    $this->enablePlugins = $enablePlugins;
  }
  
  public function renderTemplate($htmlProperties = null) {
    if($htmlProperties !== null){
      $this->setPlotHtmlProperties($htmlProperties);
    }
    return $this->getPlotTemplate();
  }

  public function build() {
    return $this->buildComponentOptions();
  }

  public function buildOnce() {
    $this->setBuildOnce(true);
    return $this->build();
  }

  private function getPlotVarName(){
    return ($this->plotName !== null) ? $this->plotName : $this->plotId;
  }

  private function getPlotGlobalVarName(){
    return sprintf('%s%s', $this->getPlotVarName(), self::$GLOBAL_SUFFIX);
  }

  public function buildComponentOptions(){
    $jqPlot = $this->getJQueryObject();
    $jqPlot->plotId($this->getPlotVarName());
    $seriesData = $this->buildSeriesData();
    $jqPlot->plotSeries($seriesData);
    if($this->enablePlugins === true){
      $jqPlot->addPreSintax(YsPlot::enablePlotPlugins());
    }
    if(sizeof($seriesData) <= 0 && (!isset($this->catchError) || $this->catchError)){
      $jqPlot->addPreSintax(self::config(self::$CATCH_ERROR_CONFIG, true));
      $jqPlot->addPreSintax($this->buildErrorConfiguration());
    }
    $jqPlot->addPostSintax(sprintf('%s = %s', $this->getPlotGlobalVarName(), $this->getPlotVarName()));
    $this->buildAxis();
    $jqPlot->plotOptions($this->buildPlotOptions());
    if($this->isBuildOnce()){
      $jqPlot->conditionNOT(YsJQuery::hasClass('jqplot-target')->in($this->getJQuerySelector()));
    }
    $this->buildThemeEngine();
    return $jqPlot;
  }

  public function getJQuerySelector($suffix = '#') {
    $template = $this->jquerySelector;
    if (!isset($this->jquerySelector) || $this->jquerySelector === null) {
      $template = sprintf('%s%s', $suffix, $this->getPlotId());
    }
    return $template;
  }

  public function setJQuerySelector($jquerySelector) {
    $this->jquerySelector = $jquerySelector;
  }

  private function buildSeries(){
    return $this->getSeries();
  }

  private function buildAxisOptions(YsPlotSerie $serie){
    if($serie->getYaxisOptions() !== null){
      $this->addAxisOptions($serie->getYaxis(), $serie->getYaxisOptions());
    }
    if($serie->getXaxisOptions() !== null){
      $this->addAxisOptions($serie->getXaxis(), $serie->getXaxisOptions());
    }
  }

  private function buildErrorConfiguration(){
    $configPattern = '%s;';
    $errorConfig = '';
    if(isset($this->errorBackground)) 
      $errorConfig =  sprintf ($configPattern,self::config (self::$ERROR_BACKGROUND_CONFIG, $this->errorBackground));
    if(isset($this->errorBorder))
      $errorConfig .= sprintf ($configPattern,self::config (self::$ERROR_BORDER_CONFIG, $this->errorBorder));
    if(isset($this->errorFontFamily))
      $errorConfig .= sprintf ($configPattern,self::config (self::$ERROR_FONT_FAMILY_CONFIG, $this->errorFontFamily));
    if(isset($this->errorFontSize))
      $errorConfig .= sprintf ($configPattern,self::config (self::$ERROR_FONT_SIZE_CONFIG, $this->errorFontSize));
    if(isset($this->errorMessage))
      $errorConfig .= sprintf ($configPattern,self::config (self::$ERROR_MESSAGE_CONFIG, $this->errorMessage));
    return $errorConfig;
  }

  private function buildAxis(){
    if(isset($this->axisOptions) && $this->axisOptions != null){
      $this->axes = $this->axisOptions;
    }
  }

  private function buildSeriesData(){
    return $this->getSeriesData()->getArrayCopy();;
  }

  private function buildPlotOptions(){
    $plotOptions = $this->optionsToArray();
    $plotOptions['series'] = $this->getSeries();
    return $plotOptions;
  }

  public function isBuildOnce() {
    return $this->buildOnce;
  }

  public function setBuildOnce($buildOnce) {
    $this->buildOnce = $buildOnce;
  }

  public function execute() {
    return YsJQuery::newInstance()->execute($this->buildOnce());
  }

  private function getPlotTemplate() {
    return (isset($this->plotTemplate) && $this->plotTemplate !== null)
           ? $this->plotTemplate
           : $this->getDefaultPlotTemplate();
  }

  private function setPlotTemplate($template) {
    $this->plotTemplate = $template;
  }

  private function getDefaultPlotTemplate() {
    return sprintf('<div id="%s" %s></div>', $this->getPlotId(), $this->getPlotHtmlProperties());
  }

  public function getPlotHtmlProperties() {
    return $this->plotHtmlProperties;
  }

  public function setPlotHtmlProperties($gridHtmlProperties) {
    $this->plotHtmlProperties = $gridHtmlProperties;
  }

  public function optionsToArray() {
    $config = array();
    $vars = get_class_vars(__CLASS__);
    foreach ($this->varsToUnset() as $value) {
      unset($vars[$value]);
    }
    foreach ($vars as $var => $value) {
      if (isset($this->$var)) {
        $config[$var] = $this->$var;
      }
    }
    return $config;
  }

  public function addAxisOptions($name, $options){
    $this->axisOptions[$name] = $options;
  }

  public static function config($configname, $value, $pattern = null){
    $pattern = ($pattern == null) ? '%s = %s' : $pattern;
    $pattern = sprintf($pattern,self::configPattern($configname), YsJSON::valueToJS($value));
    return sprintf($pattern,$configname,$value);
  }

  public static function enablePlotPlugins(){
    return self::config(self::$ENABLE_PLUGINS_EVENT, true);
  }

  public static function doConfig($configname, $value){
    return YsJQuery::newInstance()->execute(self::config($configname,$value));
  }

  public static function zoomProxy($targetPlot, $controllerPlot){
    $targetPlot = ($targetPlot instanceof YsPlot) ? $targetPlot->getPlotVarName() : $targetPlot;
    $controllerPlot = ($controllerPlot instanceof YsPlot) ? $controllerPlot->getPlotVarName() : $controllerPlot;
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQPLOT);
    $pattern = '%s.%s.%s(%s,%s)';
    $pattern = sprintf($pattern, YsJQuery::$jqueryVar, YsJQPlot::$event,self::$CURSOR_ZOOMPROXY, $targetPlot, $controllerPlot);
    return YsArgument::value($pattern); 
  }

  public static function configPattern($configname){
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQPLOT);
    $pattern = '%s.%s.%s.%s';
    $pattern = sprintf($pattern, YsJQuery::$jqueryVar, YsJQPlot::$event,self::$CONFIG_EVENT, $configname);
    return YsArgument::value($pattern);
  }

  public function onDataClick($handler){
    $this->bindHandler(self::$DATA_CLICK_HANDLER, $handler);
  }

  public function onDataHighlight($handler){
    $this->bindHandler(self::$DATA_HIGHLIGHT_HANDLER, $handler);
  }

  public function onDataUnhighlight($handler){
    $this->bindHandler(self::$DATA_UNHIGHLIGHT_HANDLER, $handler);
  }
  
  public function bindHandler($handlerName,$handler){
    $this->getJQueryObject()->addPostSintax(
      YsJQuery::bind()->in($this->getJQuerySelector())->eventType($handlerName)->handler($handler)
    );
  }

  public function replot($options = null){
    return YsJQPlot::replot($this->getPlotGlobalVarName(), $options);
  }

  private function resizableFunction(){
    return new YsJsFunction($this->replot(), 'event, ui');
  }

  public static function getDefaultTickFormatter(){
    YsPlotRenderer::getRenderer(self::$DEFAULT_TICK_FORMATTER);
  }

  public function UITabsIntegration($tabsSelector){
    return $this->bindReplotEvent(YsUITabs::$TABS_SHOW,$tabsSelector);
  }

  public function UIAccordionIntegration($accordionSelector, $accordionIndex){
    return YsJQuery::bind(YsUIAccordion::$ACCORDION_CHANGE)
                   ->in($accordionSelector)
                   ->handler($this->getAccordionIntegrationSintax($accordionIndex));
  }

  public function bindReplotEvent($eventName,$accordionSelector){
    return YsJQuery::bind($eventName)->handler($this->replot())->in($accordionSelector);
  }

  public function moveSeriesToFront($serieNumber){
    return self::callMethod(self::$MOVE_SERIES_TO_FRONT,array($serieNumber));
  }

  public function moveSeriesToBack($serieNumber){
    return self::callMethod(self::$MOVE_SERIES_TO_BACK,array($serieNumber));
  }
  public function restorePreviousSeriesOrder(){
    return self::callMethod(self::$RESTORE_PREVIOUS_SERIES_ORDER);
  }
  
  public function restoreOriginalSeriesOrder(){
    return self::callMethod(self::$RESTORE_ORIGINAL_SERIES_ORDER);
  }

  private function getAccordionIntegrationSintax($accordionIndex, $accordionHeaderTag = 'h3'){
    $body = sprintf('var index = $(this).find("%s").index ( ui.newHeader[0] );if (index == %s) {%s;}',$accordionHeaderTag,$accordionIndex,$this->replot());
    $function = new YsJsFunction($body,'event, ui');
    return $function;
  }

  public function getThemes() {
    return $this->themeEngine->getArrayCopy();
  }

  public function setTheme(ArrayObject $themeEngine) {
    $this->themeEngine = $themeEngine;
  }

  public function addTheme(YsPlotTheme $theme){
    $this->themeEngine->append($theme);
  }

  public function buildThemeEngine(){
    foreach($this->getThemes() as $theme){
      $this->addNewThemeEngine($theme);
    }
  }

  private function addNewThemeEngine(YsPlotTheme $theme){
    $this->getJQueryObject()->addPostSintax($this->engineNewTheme($theme));
  }

  public function engineNewTheme(YsPlotTheme $theme){
    return $this->callMethod(self::$THEME_ENGINE_NEW_THEME, array($theme->getThemeName(), $theme));
  }
  
  public function activateTheme($themeName){
    if($themeName instanceof YsPlotTheme){
      $themeName = $themeName->getThemeName();
    }
   return $this->callMethod(self::$ACTIVATE_THEME, array($themeName));
  }

  public function activateDefaultTheme(){
    return $this->activateTheme(self::$DEFAULT_THEME);
  }

  public function  getComponentVarName() {
    return $this->getPlotGlobalVarName();
  }
  
  public function getAxisOptions() {
    return $this->axisOptions;
  }

  public function setAxisOptions($axisOptions) {
    $this->axisOptions = $axisOptions;
  }

  public function getThemeEngine() {
    return $this->themeEngine;
  }

  public function setThemeEngine($themeEngine) {
    $this->themeEngine = $themeEngine;
  }

  public function getAnimate() {
    return $this->animate;
  }

  public function setAnimate($animate) {
    $this->animate = $animate;
  }

  public function getAnimateReplot() {
    return $this->animateReplot;
  }

  public function setAnimateReplot($animateReplot) {
    $this->animateReplot = $animateReplot;
  }  
}