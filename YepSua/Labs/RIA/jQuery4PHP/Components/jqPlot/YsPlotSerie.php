<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsPlotSerie  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotSerie extends YsComponentOption{

  private $show;
  private $xaxis;
  private $yaxis;
  private $renderer;
  private $rendererOptions;
  private $label;
  private $showLabel;
  private $color;
  private $lineWidth;
  private $shadow;
  private $shadowAngle;
  private $shadowOffset;
  private $shadowDepth;
  private $shadowAlpha;
  private $breakOnNull;
  private $markerRenderer;
  private $markerOptions;
  private $showLine;
  private $showMarker;
  private $index;
  private $fill;
  private $fillColor;
  private $fillAlpha;
  private $fillAndStroke;
  private $disableStack;
  private $neighborThreshold;
  private $fillToZero;
  private $fillToValue;
  private $fillAxis;
  private $useNegativeColors;
  private $data;
  private $pointLabels;
  private $dragable;
  private $isDragable;
  private $trendline;
  private $seriesColors;
  private $highlightColors;

  private $yaxisOptions;
  private $xaxisOptions;
  
  private $linePattern;

  public function __construct($label = null, $color = null) {
    if($label !== null){
      $this->label = $label;
    }
    if($color !== null){
      $this->color = $color;
    }
    $this->renewData();
  }

  public function varsToUnset(){
    return array('data', 'yaxisOptions', 'xaxisOptions');
  }

  public function getShow() {
    return $this->show;
  }

  /**
   * Wether or not to draw the series.
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
  }

  public function getXaxis() {
    return $this->xaxis;
  }

  /**
   * Which x axis to use with this series.
   * @param YsPlotAxis $xaxis 
   */
  public function setXaxis(YsPlotAxis $xaxis) {
    $this->xaxis = $xaxis->getXaxisName();
    $this->xaxisOptions = $xaxis->optionsToArray();
  }

  public function getYaxis() {
    return $this->yaxis;
  }

  /**
   * Which y axis to use with this series.
   * @param YsPlotAxis $yaxis 
   */
  public function setYaxis(YsPlotAxis $yaxis) {
    $this->yaxis = $yaxis->getYaxisName();
    $this->yaxisOptions = $yaxis->optionsToArray();
  }

  public function getRenderer() {
    return $this->renderer;
  }

  /**
   * A class of a renderer which will draw the series.
   * @see YsPlotRenderer
   * @param YsPlotRenderer $renderer
   */
  public function setRenderer($renderer) {
    $this->renderer = $renderer;
  }

  public function getRendererOptions() {
    return $this->rendererOptions;
  }

  /**
   * Options to pass on to the renderer.
   * @see YsPlotRenderer
   * @param YsPlotRenderer $renderer
   */
  public function setRendererOptions(YsPlotRenderer $rendererOptions) {
    $this->rendererOptions = $rendererOptions->buildOptions();
  }

  public function getLabel() {
    return $this->label;
  }

  /**
   * Line label to use in the legend.
   * @param string $label
   */
  public function setLabel($label) {
    $this->label = $label;
  }

  public function getShowLabel() {
    return $this->showLabel;
  }

  /**
   * True to show label for this series in the legend.
   * @param boolean $showLabel
   */
  public function setShowLabel($showLabel) {
    $this->showLabel = $showLabel;
  }

  public function getColor() {
    return $this->color;
  }

  /**
   * Css color spec for the series
   * @param string $color
   */
  public function setColor($color) {
    $this->color = $color;
  }

  public function getLineWidth() {
    return $this->lineWidth;
  }

  /**
   * Width of the line in pixels.
   * May have different meanings depending on renderer.
   * @param real $lineWidth
   */
  public function setLineWidth($lineWidth) {
    $this->lineWidth = $lineWidth;
  }

  public function getShadow() {
    return $this->shadow;
  }

  /**
   * Wether or not to draw a shadow on the line
   * @param boolean $shadow
   */
  public function setShadow($shadow) {
    $this->shadow = $shadow;
  }

  public function getShadowAngle() {
    return $this->shadowAngle;
  }

  /**
   * Shadow angle in degrees
   * @param int $shadowAngle
   */
  public function setShadowAngle($shadowAngle) {
    $this->shadowAngle = $shadowAngle;
  }

  public function getShadowOffset() {
    return $this->shadowOffset;
  }

  /**
   * Shadow offset from line in pixels
   * @param real $shadowOffset
   */
  public function setShadowOffset($shadowOffset) {
    $this->shadowOffset = $shadowOffset;
  }

  public function getShadowDepth() {
    return $this->shadowDepth;
  }

  /**
   * Number of times shadow is stroked,
   * each stroke offset shadowOffset from the last.
   * @param int $shadowDepth
   */
  public function setShadowDepth($shadowDepth) {
    $this->shadowDepth = $shadowDepth;
  }

  public function getShadowAlpha() {
    return $this->shadowAlpha;
  }

  /**
   * Alpha channel transparency of shadow.  0 = transparent.
   * @param string $shadowAlpha
   */
  public function setShadowAlpha($shadowAlpha) {
    $this->shadowAlpha = $shadowAlpha;
  }

  public function getBreakOnNull() {
    return $this->breakOnNull;
  }

  /**
   * Wether line segments should be be broken at null value.
   * False will join point on either side of line.
   * @param boolean $breakOnNull
   */
  public function setBreakOnNull($breakOnNull) {
    $this->breakOnNull = $breakOnNull;
  }

  public function getMarkerRenderer() {
    return $this->markerRenderer;
  }

  /**
   * A class of a renderer which will draw marker.
   * @see YsPlotRenderer
   * @param YsPlotRenderer $renderer
   */
  public function setMarkerRenderer($markerRenderer) {
    $this->markerRenderer = $markerRenderer;
  }

  public function getMarkerOptions() {
    return $this->markerOptions;
  }

  /**
   * Renderer specific options to pass to the markerRenderer.
   * @see YsPlotMarker
   * @param YsPlotMarker $renderer
   */
  public function setMarkerOptions(YsPlotMarker $markerOptions) {
    $this->markerOptions = $markerOptions->buildOptions();
  }

  public function getShowLine() {
    return $this->showLine;
  }

  /**
   * Wether to actually draw the line or not.
   * Series will still be renderered, even if no line is drawn.
   * @param boolean $showLine
   */
  public function setShowLine($showLine) {
    $this->showLine = $showLine;
  }

  public function getShowMarker() {
    return $this->showMarker;
  }

  /**
   * Wether or not to show the markers at the data points.
   * @param boolean $showMarker
   */
  public function setShowMarker($showMarker) {
    $this->showMarker = $showMarker;
  }

  public function getIndex() {
    return $this->index;
  }

  /**
   * 0 based index of this series in the plot series array.
   * @param int $index
   */
  public function setIndex($index) {
    $this->index = $index;
  }

  public function getFill() {
    return $this->fill;
  }

  /**
   * True or false, wether to fill under lines or in bars.  May not be implemented in all renderers.
   * @param boolean $fill
   */
  public function setFill($fill) {
    $this->fill = $fill;
  }

  public function getFillColor() {
    return $this->fillColor;
  }

  /**
   * CSS color spec to use for fill under line.  Defaults to line color.
   * @param string $fillColor
   */
  public function setFillColor($fillColor) {
    $this->fillColor = $fillColor;
  }

  public function getFillAlpha() {
    return $this->fillAlpha;
  }
  /**
   * Alpha transparency to apply to the fill under the line.
   * Use this to adjust alpha separate from fill color.
   * @param string $fillAlpha
   */
  public function setFillAlpha($fillAlpha) {
    $this->fillAlpha = $fillAlpha;
  }

  public function getFillAndStroke() {
    return $this->fillAndStroke;
  }

  /**
   * If true will stroke the line (with color this.color)
   * as well as fill under it.  Applies only when fill is true.
   * @param boolean $fillAndStroke
   */
  public function setFillAndStroke($fillAndStroke) {
    $this->fillAndStroke = $fillAndStroke;
  }

  public function getDisableStack() {
    return $this->disableStack;
  }

  /**
   * True to not stack this series with other series in the plot.
   * @param boolean $disableStack
   */
  public function setDisableStack($disableStack) {
    $this->disableStack = $disableStack;
  }

  public function getNeighborThreshold() {
    return $this->neighborThreshold;
  }

  /**
   * How close or far (in pixels) the cursor must be from a
   * point marker to detect the point.
   * @param int $neighborThreshold
   */
  public function setNeighborThreshold($neighborThreshold) {
    $this->neighborThreshold = $neighborThreshold;
  }

  public function getFillToZero() {
    return $this->fillToZero;
  }

  /**
   * True will force bar and filled series to fill toward zero on the fill Axis.
   * @param boolean $fillToZero
   */
  public function setFillToZero($fillToZero) {
    $this->fillToZero = $fillToZero;
  }

  public function getFillToValue() {
    return $this->fillToValue;
  }

  /**
   * Fill a filled series to this value on the fill axis.
   * Works in conjunction with fillToZero, so that must be true.
   * @param int $fillToValue
   */
  public function setFillToValue($fillToValue) {
    $this->fillToValue = $fillToValue;
  }

  public function getFillAxis() {
    return $this->fillAxis;
  }

  /**
   * Either ‘x’ or ‘y’.  Which axis to fill the line toward if fillToZero is true.
   * ‘y’ means fill up/down to 0 on the y axis for this series.
   * @param string $fillAxis
   */
  public function setFillAxis($fillAxis) {
    $this->fillAxis = $fillAxis;
  }

  public function getUseNegativeColors() {
    return $this->useNegativeColors;
  }

  /**
   * True to color negative values differently in filled and bar charts.
   * @param boolean $useNegativeColors
   */
  public function setUseNegativeColors($useNegativeColors) {
    $this->useNegativeColors = $useNegativeColors;
  }

  public function getPointLabels() {
    return $this->pointLabels;
  }

  /**
   * Set the PointLabels
   * @see YsPlotPointLabels
   * @param YsPlotPointLabels $pointLabels
   */
  public function setPointLabels(YsPlotPointLabels $pointLabels) {
    $this->pointLabels = $pointLabels;
  }

  /**
   * Add data to the serie
   * @param args $values
   */
  public function addData($values) {
    if(func_num_args() > 1 ){
      $data = new ArrayObject();
      foreach (func_get_args() as $value){
      $data->append($value);
      }
      if($data->count() > 0){
        $this->data->append($data->getArrayCopy());
      }
    }else{
      foreach (func_get_args() as $value){
        $this->data->append($value);
      }
    }
  }

  /**
   * Renew serie data
   */
  public function renewData(){
    $this->data = new ArrayObject();
  }

  public function getData() {
    return $this->data;
  }

  public function setData(ArrayObject $data) {
    $this->data = $data;
  }

  public function optionsToArray(){
    $config = array();
    $vars = get_class_vars(__CLASS__);
    foreach($this->varsToUnset() as $value){
      unset($vars[$value]);
    }
    foreach($vars as $var => $value){
      if(isset($this->$var)){
        $config[$var] = $this->$var;
      }
    }
    return $config;
  }

  public function getYaxisOptions() {
    return $this->yaxisOptions;
  }

  public function setYaxisOptions($yaxisOptions) {
    $this->yaxisOptions = $yaxisOptions;
  }

  public function getXaxisOptions() {
    return $this->xaxisOptions;
  }

  public function setXaxisOptions($xaxisOptions) {
    $this->xaxisOptions = $xaxisOptions;
  }

  public function getDragable() {
    return $this->dragable;
  }

  /**
   * Set the draggable options
   * @see YsPlotDraggable
   * @param YsPlotDraggable $dragable
   */
  public function setDragable(YsPlotDraggable $dragable) {
    $this->isDragable = true;
    $this->dragable = $dragable;
  }

  public function getIsDragable() {
    return $this->isDragable;
  }

  /**
   * True to drag the serie marks.
   * @param boolean $isDragable
   */
  public function setIsDragable($isDragable) {
    $this->isDragable = $isDragable;
  }

  public function getTrendline() {
    return $this->trendline;
  }

  /**
   * Set the trendline
   * @see YsPlotTrendLine
   * @param YsPlotTrendLine $trendline
   */
  public function setTrendline($trendline) {
    $this->trendline = $trendline;
  }

  public function getSeriesColors() {
    return $this->seriesColors;
  }

  /**
   * Set the series color
   * @param array() $seriesColors
   */
  public function setSeriesColors($seriesColors) {
    $this->seriesColors = $seriesColors;
  }

  public function getHighlightColors() {
    return $this->highlightColors;
  }

  /**
   * Set the series highlight colors
   * @param array() $highlightColors
   */
  public function setHighlightColors($highlightColors) {
    $this->highlightColors = $highlightColors;
  }

  public function setLinealData($data){
    if(!is_array($data)){
      $data = func_get_args();
    }
    foreach($data as $value){
      $this->addData($value);
    }
  }
  
  public function getLinePattern() {
    return $this->linePattern;
  }

  public function setLinePattern($linePattern) {
    $this->linePattern = $linePattern;
  }
}