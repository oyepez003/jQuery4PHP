<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotRenderer  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotRenderer extends YsComponentOption{

  public static $CATEGORY_AXIS_RENDERER = 'CategoryAxisRenderer';
  public static $BAR_RENDERER = 'BarRenderer';
  public static $CANVAS_AXIS_TICK_RENDERER = 'CanvasAxisTickRenderer';
  public static $AXIS_TICK_RENDERER = 'AxisTickRenderer';
  public static $DATE_AXIS_RENDERER = 'DateAxisRenderer';
  public static $PIE_RENDERER = 'PieRenderer';
  public static $LOG_AXIS_RENDERER = 'LogAxisRenderer';
  public static $DONUT_RENDERER = 'DonutRenderer';
  public static $DONUT_LEGEND_RENDERER = 'DonutLegendRenderer';
  public static $BEZIER_CURVE_RENDERER = 'BezierCurveRenderer';
  public static $BLOCK_RENDERER = 'BlockRenderer';
  public static $ENHANCED_LEGEND_RENDERER = 'EnhancedLegendRenderer';
  public static $BUBBLE_RENDERER = 'BubbleRenderer';
  public static $MEKKO_AXIS_RENDERER = 'MekkoAxisRenderer';
  public static $MEKKO_RENDERER = 'MekkoRenderer';
  public static $MEKKO_LEGEND_RENDERER = 'MekkoLegendRenderer';
  public static $METER_GAUGE_RENDERER = 'MeterGaugeRenderer';
  public static $OHLC_RENDERER = 'OHLCRenderer';
  public static $CANVAS_GRID_RENDERER = 'CanvasGridRenderer';
  public static $DIV_TITLE_RENDERER = 'DivTitleRenderer';
  public static $LINEAR_AXIS_RENDERER = 'LinearAxisRenderer';
  public static $MARKER_RENDERER = 'MarkerRenderer';
  public static $SHAPE_RENDERER = 'ShapeRenderer';
  public static $SHADOW_RENDERER = 'ShadowRenderer';
  public static $LINE_RENDERER = 'LineRenderer';
  public static $AXIS_LABEL_RENDERER = 'AxisLabelRenderer';
  public static $CANVAS_AXIS_LABEL_RENDERER = 'CanvasAxisLabelRenderer';
  public static $FUNNEL_RENDERER = 'FunnelRenderer';
  public static $FUNNEL_LEGEND_RENDERER = 'FunnelLegendRenderer';

  private $diameter;
  private $padding;
  private $sliceMargin;
  private $fill;
  private $shadowOffset;
  private $shadowAlpha;
  private $shadowDepth;
  private $tickRenderer;
  private $highlightMouseDown;

  private $barPadding;
  private $barMargin;
  private $barDirection;
  private $barWidth;
  private $waterfall;
  private $varyBarColor;
  private $groups;

  private $setGridData;
  private $makeGridData;

  private $css;
  private $escapeHtml;
  private $insertBreaks;
  private $varyBlockColors;

  private $varyBubbleColors;
  private $autoscaleBubbles;
  private $autoscaleMultiplier;
  private $autoscalePointsFactor;
  private $highlightMouseOver;
  private $highlightColors;
  private $bubbleAlpha;
  private $highlightAlpha;
  private $bubbleGradients;
  private $showLabels;
  
  private $mark;
  private $showMark;
  private $showGridline;
  private $isMinorTick;
  private $size;
  private $markSize;
  private $show;
  private $showLabel;
  private $formatter;
  private $prefix;
  private $formatString;
  private $fontFamily;
  private $fontSize;
  private $textColor;

  private $style;
  private $lineWidth;
  private $color;
  private $shadow;
  private $shadowAngle;
  private $shadowRenderer;
  private $shapeRenderer;

  private $lineJoin;
  private $lineCap;
  private $isarc;
  private $fillRect;
  private $strokeRect;
  private $clearRect;
  private $strokeStyle;
  private $fillStyle;
  private $draw;

  private $angle;
  private $offset;
  private $alpha;
  private $depth;

  private $highlightColor;

  private $label;
  
  private $fontWeight;	
  private $fontStretch;
  private $enableFontSupport;
  private $pt2px;

  private $labelPosition;

  private $sortMergedLabels;

  private $innerDiameter;
  private $thickness;
  private $ringMargin;
  private $dataLabels;
  private $showDataLabels;
  private $dataLabelFormatString;
  private $dataLabelThreshold	;
  private $dataLabelPositionFactor;
  private $dataLabelNudge;
  private $startAngle;

  private $numberRows;
  private $numberColumns;

  private $seriesToggle;
  private $disableIEFading;

  private $sectionMargin;
  private $widthRatio;

  private $tickMode;
  private $barLabelRenderer;
  private $barLabels;
  private $barLabelOptions;

  private $borderColor;
  private $showBorders;

  private $background;
  private $ringColor;
  private $tickColor;
  private $ringWidth;
  private $min;
  private $max;
  private $ticks;
  private $showTicks;
  private $showTickLabels;
  private $labelHeightAdjust;
  private $intervals;
  private $intervalColors;
  private $intervalInnerRadius;
  private $intervalOuterRadius;
  private $tickSpacing;
  private $hubRadius;
  private $tickPadding;
  private $needleThickness;
  private $needlePad;
  private $pegNeedle;

  private $candleStick;
  private $tickLength;
  private $bodyWidth;
  private $openColor;
  private $closeColor;
  private $wickColor;
  private $fillUpBody;
  private $fillDownBody;
  private $upBodyColor;
  private $downBodyColor;
  private $hlc;

  private $dataLabelCenterOn;

  private $placement;


  public static function getRenderer($rendererName){
    $pattern = '%s.%s.%s';
    $pattern = sprintf($pattern, YsJQuery::$jqueryVar, YsJQPlot::$event, $rendererName);
    return YsArgument::value($pattern);
  }

  public static function getCanvasAxisLabelRenderer(){
    return self::getRenderer(self::$CANVAS_AXIS_LABEL_RENDERER);
  }

  public static function getCategoryAxisRenderer(){
    return self::getRenderer(self::$CATEGORY_AXIS_RENDERER);
  }

  public static function getBarRenderer(){
    return self::getRenderer(self::$BAR_RENDERER);
  }
  
  public static function getCanvasAxisTickRenderer(){
    return self::getRenderer(self::$CANVAS_AXIS_TICK_RENDERER);
  }

  public static function getDateAxisRenderer(){
    return self::getRenderer(self::$DATE_AXIS_RENDERER);
  }

  public static function getPieRenderer(){
    return self::getRenderer(self::$PIE_RENDERER);
  }

  public static function getLogAxisRenderer(){
    return self::getRenderer(self::$LOG_AXIS_RENDERER);
  }

  public static function getDonutRenderer(){
    return self::getRenderer(self::$DONUT_RENDERER);
  }

  public static function getDonutLegendRenderer(){
    return self::getRenderer(self::$DONUT_LEGEND_RENDERER);
  }

  public static function getBezierCurveRenderer(){
    return self::getRenderer(self::$BEZIER_CURVE_RENDERER);
  }

  public static function getBlockRenderer(){
    return self::getRenderer(self::$BLOCK_RENDERER);
  }

  public static function getEnhancedLegendRenderer(){
    return self::getRenderer(self::$ENHANCED_LEGEND_RENDERER);
  }

  public static function getBubbleRenderer(){
    return self::getRenderer(self::$BUBBLE_RENDERER);
  }

  public static function getMekkoAxisRenderer(){
    return self::getRenderer(self::$MEKKO_AXIS_RENDERER);
  }

  public static function getMekkoRenderer(){
    return self::getRenderer(self::$MEKKO_RENDERER);
  }

  public static function getMekkoLegendRenderer(){
    return self::getRenderer(self::$MEKKO_LEGEND_RENDERER);
  }

  public static function getMeterGaugeRenderer(){
    return self::getRenderer(self::$METER_GAUGE_RENDERER);
  }

  public static function getOHLCRenderer(){
    return self::getRenderer(self::$OHLC_RENDERER);
  }

  public static function getAxisTickRenderer(){
    return self::getRenderer(self::$AXIS_TICK_RENDERER);
  }

  public static function getCanvasGridRenderer(){
    return self::getRenderer(self::$CANVAS_GRID_RENDERER);
  }

  public static function getDivTitleRenderer(){
    return self::getRenderer(self::$DIV_TITLE_RENDERER);
  }
  
  public static function getLinearAxisRenderer(){
    return self::getRenderer(self::$LINEAR_AXIS_RENDERER);
  }

  public static function getMarkerRenderer(){
    return self::getRenderer(self::$MARKER_RENDERER);
  }

  public static function getShapeRenderer(){
    return self::getRenderer(self::$SHAPE_RENDERER);
  }

  public static function getShadowRenderer(){
    return self::getRenderer(self::$SHADOW_RENDERER);
  }

  public static function getLineRenderer(){
    return self::getRenderer(self::$LINE_RENDERER);
  }

  public static function getAxisLabelRenderer(){
    return self::getRenderer(self::$AXIS_LABEL_RENDERER);
  }

  public static function getFunnelRenderer(){
    return self::getRenderer(self::$FUNNEL_RENDERER);
  }

  public static function getFunnelLegendRenderer(){
    return self::getRenderer(self::$FUNNEL_LEGEND_RENDERER);
  }

  
  public function getDiameter() {
    return $this->diameter;
  }

  /**
   * Diameter of the pie, auto computed by default;
   * @param int $diameter
   */
  public function setDiameter($diameter) {
    $this->diameter = $diameter;
  }

  public function getPadding() {
    return $this->padding;
  }
  
  /**
   * Padding between the pie and plot edges, legend, etc.
   * @param string/int $padding
   */
  public function setPadding($padding) {
    $this->padding = $padding;
  }

  /**
   * Padding between the pie and plot edges, legend, etc.
   * @param string/int $padding
   */
  public function getSliceMargin() {
    return $this->sliceMargin;
  }

  /**
   * Pixels spacing between pie slices.
   * @param int $sliceMargin
   */
  public function setSliceMargin($sliceMargin) {
    $this->sliceMargin = $sliceMargin;
  }

  public function getFill() {
    return $this->fill;
  }

  /**
   * True or false, wether to fil the slices.
   * @param boolean $fill
   */
  public function setFill($fill) {
    $this->fill = $fill;
  }

  public function getShadowOffset() {
    return $this->shadowOffset;
  }

  /**
   * Offset of the shadow from the slice and offset of each succesive stroke of
   * the shadow from the last.
   * @param int $shadowOffset
   */
  public function setShadowOffset($shadowOffset) {
    $this->shadowOffset = $shadowOffset;
  }

  public function getShadowAlpha() {
    return $this->shadowAlpha;
  }

  /**
   * Transparency of the shadow (0 = transparent, 1 = opaque)
   * @param real $shadowAlpha
   */
  public function setShadowAlpha($shadowAlpha) {
    $this->shadowAlpha = $shadowAlpha;
  }

  public function getShadowDepth() {
    return $this->shadowDepth;
  }

  /**
   * Number of strokes to apply to the shadow, each stroke offset shadowOffset from the last.
   * @param int $shadowDepth
   */
  public function setShadowDepth($shadowDepth) {
    $this->shadowDepth = $shadowDepth;
  }
  
  public function getTickRenderer() {
    return $this->tickRenderer;
  }

  /**
   * A class of a rendering engine for creating the ticks labels displayed on
   * the plot
   * @param YsJQuery $tickRenderer
   */
  public function setTickRenderer($tickRenderer) {
    $this->tickRenderer = $tickRenderer;
  }

  public function getHighlightMouseDown() {
    return $this->highlightMouseDown;
  }

  public function setHighlightMouseDown($highlightMouseDown) {
    $this->highlightMouseDown = $highlightMouseDown;
  }


  public function getBarPadding() {
    return $this->barPadding;
  }

  /**
   * Number of pixels between adjacent bars at the same axis value.
   * @param int $barPadding
   */
  public function setBarPadding($barPadding) {
    $this->barPadding = $barPadding;
  }

  public function getBarMargin() {
    return $this->barMargin;
  }

  /**
   * Number of pixels between groups of bars at adjacent axis values.
   * @param int $barMargin
   */
  public function setBarMargin($barMargin) {
    $this->barMargin = $barMargin;
  }

  public function getBarDirection() {
    return $this->barDirection;
  }

  /**
   * ‘vertical’ = up and down bars, ‘horizontal’ = side to side bars
   * @param YsDirection $barDirection
   */
  public function setBarDirection($barDirection) {
    $this->barDirection = $barDirection;
  }

  public function getBarWidth() {
    return $this->barWidth;
  }

  /**
   * Width of the bar in pixels (auto by devaul).
   * @param int $barWidth
   */
  public function setBarWidth($barWidth) {
    $this->barWidth = $barWidth;
  }

  public function getWaterfall() {
    return $this->waterfall;
  }

  /**
   * true to enable waterfall plot.
   * @param boolean $waterfall
   */
  public function setWaterfall($waterfall) {
    $this->waterfall = $waterfall;
  }

  public function getVaryBarColor() {
    return $this->varyBarColor;
  }

  /**
   * true to color each bar separately.
   * @param boolean $varyBarColor
   */
  public function setVaryBarColor($varyBarColor) {
    $this->varyBarColor = $varyBarColor;
  }

  public function getSetGridData() {
    return $this->setGridData;
  }

  /**
   * Converts the user data values to grid coordinates and stores them in the
   * gridData array.
   * @param YsJsFunction(plot) $setGridData
   */
  public function setSetGridData($setGridData) {
    $this->setGridData = $setGridData;
  }

  public function getMakeGridData() {
    return $this->makeGridData;
  }

  /**
   * Converts any arbitrary data values to grid coordinates and returns them.
   * @param YsJsFunction(data,plot) $makeGridData
   */
  public function setMakeGridData($makeGridData) {
    $this->makeGridData = $makeGridData;
  }

  public function getCss() {
    return $this->css;
  }

  /**
   * Default css styles that will be applied to all data blocks.
   * @param string $css
   */
  public function setCss($css) {
    $this->css = $css;
  }

  public function getEscapeHtml() {
    return $this->escapeHtml;
  }

  /**
   * true to escape html in the box label.
   * @param boolean $escapeHtml
   */
  public function setEscapeHtml($escapeHtml) {
    $this->escapeHtml = $escapeHtml;
  }

  public function getInsertBreaks() {
    return $this->insertBreaks;
  }

  /**
   * true to turn spaces in data block label into html breaks <br />.
   * @param boolean $insertBreaks
   */
  public function setInsertBreaks($insertBreaks) {
    $this->insertBreaks = $insertBreaks;
  }

  public function getVaryBlockColors() {
    return $this->varyBlockColors;
  }

  /**
   * true to vary the color of each block in this series according to the
   * seriesColors array.
   * @param boolean $varyBlockColors
   */
  public function setVaryBlockColors($varyBlockColors) {
    $this->varyBlockColors = $varyBlockColors;
  }

  public function getVaryBubbleColors() {
    return $this->varyBubbleColors;
  }

  /**
   * true to vary the color of each bubble in this series according to the
   * seriesColors array.
   * @param boolean $varyBubbleColors
   */
  public function setVaryBubbleColors($varyBubbleColors) {
    $this->varyBubbleColors = $varyBubbleColors;
  }

  public function getAutoscaleBubbles() {
    return $this->autoscaleBubbles;
  }

  /**
   * true to scale the bubble radius based on plot size.
   * @param boolean $autoscaleBubbles
   */
  public function setAutoscaleBubbles($autoscaleBubbles) {
    $this->autoscaleBubbles = $autoscaleBubbles;
  }

  public function getAutoscaleMultiplier() {
    return $this->autoscaleMultiplier;
  }

  /**
   * Multiplier the bubble size if autoscaleBubbles is true.
   * @param integer $autoscaleMultiplier
   */
  public function setAutoscaleMultiplier($autoscaleMultiplier) {
    $this->autoscaleMultiplier = $autoscaleMultiplier;
  }


  public function getAutoscalePointsFactor() {
    return $this->autoscalePointsFactor;
  }

  /**
   * Factor which decreases bubble size based on how many bubbles on the
   * chart.
   * @param real $autoscalePointsFactor
   */
  public function setAutoscalePointsFactor($autoscalePointsFactor) {
    $this->autoscalePointsFactor = $autoscalePointsFactor;
  }

  public function getHighlightMouseOver() {
    return $this->highlightMouseOver;
  }

  /**
   * true to highlight bubbles when moused over.
   * @param boolean $highlightMouseOver
   */
  public function setHighlightMouseOver($highlightMouseOver) {
    $this->highlightMouseOver = $highlightMouseOver;
  }

  public function getHighlightColors() {
    return $this->highlightColors;
  }

  /**
   * An array of colors to use when highlighting a slice.
   * @param array() $highlightColors
   */
  public function setHighlightColors($highlightColors) {
    $this->highlightColors = $highlightColors;
  }

  public function getBubbleAlpha() {
    return $this->bubbleAlpha;
  }

  /**
   * Alpha transparency to apply to all bubbles in this series.
   * @param real $bubbleAlpha
   */
  public function setBubbleAlpha($bubbleAlpha) {
    $this->bubbleAlpha = $bubbleAlpha;
  }

  public function getHighlightAlpha() {
    return $this->highlightAlpha;
  }

  /**
   * Alpha transparency to apply when highlighting bubble.
   * @param real $highlightAlpha
   */
  public function setHighlightAlpha($highlightAlpha) {
    $this->highlightAlpha = $highlightAlpha;
  }

  public function getBubbleGradients() {
    return $this->bubbleGradients;
  }

  /**
   * true to color the bubbles with gradient fills instead of flat colors.
   * @param boolean $bubbleGradients
   */
  public function setBubbleGradients($bubbleGradients) {
    $this->bubbleGradients = $bubbleGradients;
  }

  public function getShowLabels() {
    return $this->showLabels;
  }

  /**
   * true to show labels on bubbles (if any), false to not show.
   * @param boolean $showLabels
   */
  public function setShowLabels($showLabels) {
    $this->showLabels = $showLabels;
  }

  public function getMark() {
    return $this->mark;
  }

  /**
   * Tick mark on the axis.  One of ‘inside’, ‘outside’, ‘cross’, ‘’ or null.
   * @param string $mark
   */
  public function setMark($mark) {
    $this->mark = $mark;
  }

  public function getShowMark() {
    return $this->showMark;
  }

  /**
   * Wether or not to show the mark on the axis.
   * @param boolean $showMark
   */
  public function setShowMark($showMark) {
    $this->showMark = $showMark;
  }

  public function getShowGridline() {
    return $this->showGridline;
  }

  /**
   * Wether or not to draw the gridline on the grid at this tick.
   * @param boolean $showGridline
   */
  public function setShowGridline($showGridline) {
    $this->showGridline = $showGridline;
  }

  public function getIsMinorTick() {
    return $this->isMinorTick;
  }

  /**
   * If this is a minor tick.
   * @param boolean $isMinorTick
   */
  public function setIsMinorTick($isMinorTick) {
    $this->isMinorTick = $isMinorTick;
  }

  public function getSize() {
    return $this->size;
  }

  /**
   * The size
   * @param integer $size
   */
  public function setSize($size) {
    $this->size = $size;
  }

  public function getMarkSize() {
    return $this->markSize;
  }

  /**
   * Length of the tick marks in pixels.
   * @param integer $markSize
   */
  public function setMarkSize($markSize) {
    $this->markSize = $markSize;
  }

  public function getShow() {
    return $this->show;
  }

  /**
   * Wether or not to show
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
  }

  public function getShowLabel() {
    return $this->showLabel;
  }

  /**
   * Wether or not to show the label
   * @param boolean $showLabel
   */
  public function setShowLabel($showLabel) {
    $this->showLabel = $showLabel;
  }

  public function getFormatter() {
    return $this->formatter;
  }

  /**
   * A class of a formatter for the tick text. 
   * @param YsJQuery $formatter YsPlot::getDefaultTickFormatter()
   */
  public function setFormatter($formatter) {
    $this->formatter = $formatter;
  }

  public function getPrefix() {
    return $this->prefix;
  }

  /**
   * String appended to the label
   * @param string $prefix
   */
  public function setPrefix($prefix) {
    $this->prefix = $prefix;
  }

  public function getFormatString() {
    return $this->formatString;
  }

  /**
   * String passed to the formatter.
   * @param string $formatString
   */
  public function setFormatString($formatString) {
    $this->formatString = $formatString;
  }

  public function getFontFamily() {
    return $this->fontFamily;
  }

  /**
   * Css spec for the font-family css attribute.
   * @param string $fontFamily
   */
  public function setFontFamily($fontFamily) {
    $this->fontFamily = $fontFamily;
  }

  public function getFontSize() {
    return $this->fontSize;
  }

  /**
   * css spec for the font-size css attribute.
   * @param int $fontSize
   */
  public function setFontSize($fontSize) {
    $this->fontSize = $fontSize;
  }

  public function getTextColor() {
    return $this->textColor;
  }

  public function getStyle() {
    return $this->style;
  }

  /**
   * One of diamond, circle, square, x, plus, dash, filledDiamond, filledCircle,
   * filledSquare
   * @param string $style
   */
  public function setStyle($style) {
    $this->style = $style;
  }


  public function getLineWidth() {
    return $this->lineWidth;
  }

  /**
   * Size of the line
   * @param integer $lineWidth
   */
  public function setLineWidth($lineWidth) {
    $this->lineWidth = $lineWidth;
  }

  public function getColor() {
    return $this->color;
  }

  /**
   * The color
   * @param string $color
   */
  public function setColor($color) {
    $this->color = $color;
  }

  public function getShadow() {
    return $this->shadow;
  }

  /**
   * Wether or not to draw a shadow
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
   * @param integer $shadowAngle
   */
  public function setShadowAngle($shadowAngle) {
    $this->shadowAngle = $shadowAngle;
  }

  public function getShadowRendererValue() {
    return $this->shadowRenderer;
  }

  /**
   * Renderer that will draws the shadows.
   * @param YsJQuery $shadowRenderer
   */
  public function setShadowRenderer($shadowRenderer) {
    $this->shadowRenderer = $shadowRenderer;
  }

  public function getShapeRendererValue() {
    return $this->shapeRenderer;
  }

  /**
   * Renderer that will draw the marker.
   * @param YsJQuery $shapeRenderer
   */
  public function setShapeRenderer($shapeRenderer) {
    $this->shapeRenderer = $shapeRenderer;
  }

  public function getLineJoin() {
    return $this->lineJoin;
  }

  /**
   * How line segments of the shadow are joined.
   * @param string $lineJoin
   */
  public function setLineJoin($lineJoin) {
    $this->lineJoin = $lineJoin;
  }

  public function getLineCap() {
    return $this->lineCap;
  }

  /**
   * How ends of the shadow line are rendered.
   * @param string $lineCap
   */
  public function setLineCap($lineCap) {
    $this->lineCap = $lineCap;
  }

  public function getIsarc() {
    return $this->isarc;
  }

  /**
   * Wether the shadow is an arc or not.
   * @param boolean $isarc
   */
  public function setIsarc($isarc) {
    $this->isarc = $isarc;
  }

  public function getFillRect() {
    return $this->fillRect;
  }

  /**
   * true to draw shape as a filled rectangle.
   * @param boolean $fillRect
   */
  public function setFillRect($fillRect) {
    $this->fillRect = $fillRect;
  }

  public function getStrokeRect() {
    return $this->strokeRect;
  }

  /**
   * true to draw shape as a stroked rectangle.
   * @param boolean $strokeRect
   */
  public function setStrokeRect($strokeRect) {
    $this->strokeRect = $strokeRect;
  }

  public function getClearRect() {
    return $this->clearRect;
  }

  /**
   * true to cear a rectangle.
   * @param boolean $clearRect
   */
  public function setClearRect($clearRect) {
    $this->clearRect = $clearRect;
  }

  public function getStrokeStyle() {
    return $this->strokeStyle;
  }

  /**
   * Css color spec for the stoke style
   * @param string $strokeStyle
   */
  public function setStrokeStyle($strokeStyle) {
    $this->strokeStyle = $strokeStyle;
  }

  public function getFillStyle() {
    return $this->fillStyle;
  }
  
  /**
   * Css color spec for the fill style.
   * @param string $fillStyle
   */
  public function setFillStyle($fillStyle) {
    $this->fillStyle = $fillStyle;
  }

  public function getDraw() {
    return $this->draw;
  }

  /**
   * Draws
   * @param YsJsFunction $draw
   */
  public function setDraw($draw) {
    $this->draw = $draw;
  }
  
  /**
   * Css spec for the color attribute.
   * @param string $textColor
   */
  public function setTextColor($textColor) {
    $this->textColor = $textColor;
  }

  public function getAngle() {
    return $this->angle;
  }

  /**
   * Angle in degrees.
   * @param  integer $angle
   */
  public function setAngle($angle) {
    $this->angle = $angle;
  }

  public function getOffset() {
    return $this->offset;
  }

  /**
   * Pixel offset
   * @param integer $offset
   */
  public function setOffset($offset) {
    $this->offset = $offset;
  }

  public function getAlpha() {
    return $this->alpha;
  }

  /**
   * Alpha transparency
   * @param real $alpha
   */
  public function setAlpha($alpha) {
    $this->alpha = $alpha;
  }

  public function getDepth() {
    return $this->depth;
  }

  /**
   * How many times the shadow is stroked.
   * @param integer $depth
   */
  public function setDepth($depth) {
    $this->depth = $depth;
  }

  public function getHighlightColor() {
    return $this->highlightColor;
  }

  /**
   * Color to use when highlighting an area on a filled plot.
   * @param string $highlightColor
   */
  public function setHighlightColor($highlightColor) {
    $this->highlightColor = $highlightColor;
  }

  public function getLabel() {
    return $this->label;
  }

  public function getGroups() {
    return $this->groups;
  }

  /**
   * Group bars into this many groups
   * @param integer $groups
   */
  public function setGroups($groups) {
    $this->groups = $groups;
  }


  /**
   * The text or html for the label.
   * @param string $label
   */
  public function setLabel($label) {
    $this->label = $label;
  }

  public function getFontWeight() {
    return $this->fontWeight;
  }

  /**
   * Css spec for font weight.
   * @param string $fontWeight
   */
  public function setFontWeight($fontWeight) {
    $this->fontWeight = $fontWeight;
  }

  public function getFontStretch() {
    return $this->fontStretch;
  }

  /**
   * Multiplier to condense or expand font width.
   * @param real $fontStretch
   */
  public function setFontStretch($fontStretch) {
    $this->fontStretch = $fontStretch;
  }

  public function getEnableFontSupport() {
    return $this->enableFontSupport;
  }

  /**
   * true to turn on native canvas font support in Mozilla 3.5+ and Safari 4+. 
   * @param boolean $enableFontSupport
   */
  public function setEnableFontSupport($enableFontSupport) {
    $this->enableFontSupport = $enableFontSupport;
  }

  public function getPt2px() {
    return $this->pt2px;
  }

  /**
   * Point to pixel scaling factor, used for computing height of bounding box
   * around a label.
   * @param integer $pt2px
   */
  public function setPt2px($pt2px) {
    $this->pt2px = $pt2px;
  }

  public function getLabelPosition() {
    return $this->labelPosition;
  }

  /**
   * The label Position ‘auto’, ‘start’, ‘middle’ or ‘end’.
   * @param string $labelPosition YsLocation
   */
  public function setLabelPosition($labelPosition) {
    $this->labelPosition = $labelPosition;
  }

  public function getSortMergedLabels() {
    return $this->sortMergedLabels;
  }

  /**
   * true to sort tick labels when labels are created by merging x axis
   * values from multiple series.
   * @param boolean $sortMergedLabels
   */
  public function setSortMergedLabels($sortMergedLabels) {
    $this->sortMergedLabels = $sortMergedLabels;
  }

  public function getInnerDiameter() {
    return $this->innerDiameter;
  }

  /**
   * Inner diameter of teh donut, auto calculated by default. 
   * @param integer $innerDiameter
   */
  public function setInnerDiameter($innerDiameter) {
    $this->innerDiameter = $innerDiameter;
  }

  public function getThickness() {
    return $this->thickness;
  }

  /**
   * Thickness of the donut, auto computed by default Overridden by if
   * innerDiameter is specified.
   * @param integer $thickness
   */
  public function setThickness($thickness) {
    $this->thickness = $thickness;
  }

  public function getRingMargin() {
    return $this->ringMargin;
  }

  /**
   * Pixel distance between rings, or multiple series in a donut plot.
   * @param integer $ringMargin
   */
  public function setRingMargin($ringMargin) {
    $this->ringMargin = $ringMargin;
  }

  public function getDataLabels() {
    return $this->dataLabels;
  }

  /**
   * Either ‘label’, ‘value’, ‘percent’ or an array of labels to place on the
   * pie slices.
   * @param array $dataLabels
   */
  public function setDataLabels($dataLabels) {
    $this->dataLabels = $dataLabels;
  }

  public function getShowDataLabels() {
    return $this->showDataLabels;
  }

  /**
   * true to show data labels on slices.
   * @param boolean $showDataLabels
   */
  public function setShowDataLabels($showDataLabels) {
    $this->showDataLabels = $showDataLabels;
  }

  public function getDataLabelFormatString() {
    return $this->dataLabelFormatString;
  }

  /**
   * Format string for data labels. 
   * @param string $dataLabelFormatString
   */
  public function setDataLabelFormatString($dataLabelFormatString) {
    $this->dataLabelFormatString = $dataLabelFormatString;
  }

  public function getDataLabelThreshold() {
    return $this->dataLabelThreshold;
  }

  /**
   * The Data Label Threshold
   * @param string $dataLabelThreshold
   */
  public function setDataLabelThreshold($dataLabelThreshold) {
    $this->dataLabelThreshold = $dataLabelThreshold;
  }

  public function getDataLabelPositionFactor() {
    return $this->dataLabelPositionFactor;
  }

  /**
   * A Multiplier (0-1) of the pie radius which controls position of label on
   * slice.
   * @param real $dataLabelPositionFactor
   */
  public function setDataLabelPositionFactor($dataLabelPositionFactor) {
    $this->dataLabelPositionFactor = $dataLabelPositionFactor;
  }

  public function getDataLabelNudge() {
    return $this->dataLabelNudge;
  }

  /**
   * Number of pixels to slide the label away from (+) or toward (-)
   * the center of the pie.
   * @param integer $dataLabelNudge
   */
  public function setDataLabelNudge($dataLabelNudge) {
    $this->dataLabelNudge = $dataLabelNudge;
  }

  public function getStartAngle() {
    return $this->startAngle;
  }

  /**
   * Angle to start drawing donut in degrees. 
   * @param integer $startAngle
   */
  public function setStartAngle($startAngle) {
    $this->startAngle = $startAngle;
  }

  public function getNumberRows() {
    return $this->numberRows;
  }

  /**
   * Maximum number of rows.
   * @param integer $numberRows
   */
  public function setNumberRows($numberRows) {
    $this->numberRows = $numberRows;
  }

  public function getNumberColumns() {
    return $this->numberColumns;
  }

  /**
   * Maximum number of columns.
   * @param integer $numberColumns
   */
  public function setNumberColumns($numberColumns) {
    $this->numberColumns = $numberColumns;
  }

  public function getSeriesToggle() {
    return $this->seriesToggle;
  }

  /**
   * false to not enable series on/off toggling on the legend. 
   * @param boolean $seriesToggle
   */
  public function setSeriesToggle($seriesToggle) {
    $this->seriesToggle = $seriesToggle;
  }

  public function getDisableIEFading() {
    return $this->disableIEFading;
  }

  /**
   * true to toggle series with a show/hide method only and not allow fading
   * in/out.
   * @param boolean $disableIEFading
   */
  public function setDisableIEFading($disableIEFading) {
    $this->disableIEFading = $disableIEFading;
  }

  public function getSectionMargin() {
    return $this->sectionMargin;
  }

  /**
   * Spacing between funnel sections in pixels.
   * @param integer $sectionMargin
   */
  public function setSectionMargin($sectionMargin) {
    $this->sectionMargin = $sectionMargin;
  }

  public function getWidthRatio() {
    return $this->widthRatio;
  }

  public function getTickMode() {
    return $this->tickMode;
  }

  /**
   * The ratio of the width of the top of the funnel to the bottom.
   * @param real $widthRatio
   */
  public function setWidthRatio($widthRatio) {
    $this->widthRatio = $widthRatio;
  }

  /**
   * How to space the ticks on the axis. 
   * @param string $tickMode
   */
  public function setTickMode($tickMode) {
    $this->tickMode = $tickMode;
  }

  public function getBarLabelRenderer() {
    return $this->barLabelRenderer;
  }

  /**
   * Renderer to use to draw labels under each bar.
   * @param YsPlotRenderer $barLabelRenderer
   */
  public function setBarLabelRenderer($barLabelRenderer) {
    $this->barLabelRenderer = $barLabelRenderer;
  }

  public function getBarLabels() {
    return $this->barLabels;
  }

  /**
   * Array of labels to put under each bar.
   * @param array $barLabels
   */
  public function setBarLabels($barLabels) {
    $this->barLabels = $barLabels;
  }

  public function getBarLabelOptions() {
    return $this->barLabelOptions;
  }

  /**
   * Options object to pass to the bar label renderer.
   * @param array $barLabelOptions
   */
  public function setBarLabelOptions($barLabelOptions) {
    $this->barLabelOptions = $barLabelOptions;
  }

  public function getBorderColor() {
    return $this->borderColor;
  }

  /**
   * Color of the borders between areas on the chart
   * @param string $borderColor
   */
  public function setBorderColor($borderColor) {
    $this->borderColor = $borderColor;
  }

  public function getShowBorders() {
    return $this->showBorders;
  }

  /**
   * True to draw borders lines between areas on the chart. 
   * @param boolean $showBorders
   */
  public function setShowBorders($showBorders) {
    $this->showBorders = $showBorders;
  }

  public function getBackground() {
    return $this->background;
  }

  /**
   * Background color of the inside of the gauge.
   * @param string $background
   */
  public function setBackground($background) {
    $this->background = $background;
  }

  public function getRingColor() {
    return $this->ringColor;
  }

  /**
   * Color of the outer ring, hub, and needle of the gauge.
   * @param string $ringColor
   */
  public function setRingColor($ringColor) {
    $this->ringColor = $ringColor;
  }

  public function getTickColor() {
    return $this->tickColor;
  }

  /**
   * Color of the tick marks around the gauge.
   * @param string $tickColor
   */
  public function setTickColor($tickColor) {
    $this->tickColor = $tickColor;
  }

  public function getRingWidth() {
    return $this->ringWidth;
  }

  /**
   * Width of the ring around the gauge.
   * @param integer $ringWidth
   */
  public function setRingWidth($ringWidth) {
    $this->ringWidth = $ringWidth;
  }

  public function getMin() {
    return $this->min;
  }

  /**
   * Minimum value on the gauge. 
   * @param integer $min
   */
  public function setMin($min) {
    $this->min = $min;
  }

  public function getMax() {
    return $this->max;
  }

  /**
   * Maximum value on the gauge. 
   * @param integer $max
   */
  public function setMax($max) {
    $this->max = $max;
  }

  public function getTicks() {
    return $this->ticks;
  }

  /**
   * Array of tick values.
   * @param array $ticks
   */
  public function setTicks($ticks) {
    $this->ticks = $ticks;
  }

  public function getShowTicks() {
    return $this->showTicks;
  }

  /**
   * true to show ticks around gauge.
   * @param boolean $showTicks
   */
  public function setShowTicks($showTicks) {
    $this->showTicks = $showTicks;
  }

  public function getShowTickLabels() {
    return $this->showTickLabels;
  }

  /**
   * True to show tick labels next to ticks.
   * @param boolean $showTickLabels
   */
  public function setShowTickLabels($showTickLabels) {
    $this->showTickLabels = $showTickLabels;
  }

  public function getLabelHeightAdjust() {
    return $this->labelHeightAdjust;
  }

  /**
   * Number of Pixels to offset the label up (-) or down (+) from its default
   * position.
   * @param integer $labelHeightAdjust
   */
  public function setLabelHeightAdjust($labelHeightAdjust) {
    $this->labelHeightAdjust = $labelHeightAdjust;
  }

  public function getIntervals() {
    return $this->intervals;
  }

  /**
   * Array of ranges to be drawn around the gauge.
   * @param array $intervals
   */
  public function setIntervals($intervals) {
    $this->intervals = $intervals;
  }

  public function getIntervalColors() {
    return $this->intervalColors;
  }

  /**
   * Array of colors to use for the intervals.
   * @param array $intervalColors
   */
  public function setIntervalColors($intervalColors) {
    $this->intervalColors = $intervalColors;
  }

  public function getIntervalInnerRadius() {
    return $this->intervalInnerRadius;
  }

  /**
   * Radius of the inner circle of the interval ring.
   * @param integer $intervalInnerRadius
   */
  public function setIntervalInnerRadius($intervalInnerRadius) {
    $this->intervalInnerRadius = $intervalInnerRadius;
  }

  public function getIntervalOuterRadius() {
    return $this->intervalOuterRadius;
  }

  /**
   * Radius of the outer circle of the interval ring.
   * @param integer $intervalOuterRadius
   */
  public function setIntervalOuterRadius($intervalOuterRadius) {
    $this->intervalOuterRadius = $intervalOuterRadius;
  }

  public function getTickSpacing() {
    return $this->tickSpacing;
  }

  /**
   * Degrees between ticks. 
   * @param integer $tickSpacing
   */
  public function setTickSpacing($tickSpacing) {
    $this->tickSpacing = $tickSpacing;
  }

  public function getHubRadius() {
    return $this->hubRadius;
  }

  /**
   * Radius of the hub at the bottom center of gauge which the needle attaches
   * to.
   * @param integer $hubRadius
   */
  public function setHubRadius($hubRadius) {
    $this->hubRadius = $hubRadius;
  }

  public function getTickPadding() {
    return $this->tickPadding;
  }

  /**
   * Padding of the tick marks to the outer ring and the tick labels to marks.
   * @param integer $tickPadding
   */
  public function setTickPadding($tickPadding) {
    $this->tickPadding = $tickPadding;
  }

  public function getNeedleThickness() {
    return $this->needleThickness;
  }

  /**
   * Maximum thickness the needle. 
   * @param integer $needleThickness
   */
  public function setNeedleThickness($needleThickness) {
    $this->needleThickness = $needleThickness;
  }

  public function getNeedlePad() {
    return $this->needlePad;
  }

  /**
   * Padding between needle and inner edge of the ring when the needle is at the
   * min or max gauge value.
   * @param integer $needlePad
   */
  public function setNeedlePad($needlePad) {
    $this->needlePad = $needlePad;
  }

  public function getPegNeedle() {
    return $this->pegNeedle;
  }

  /**
   * True will stop needle just below/above the min/max values if data is
   * below/above min/max, as if the meter is “pegged”.
   * @param boolean $pegNeedle
   */
  public function setPegNeedle($pegNeedle) {
    $this->pegNeedle = $pegNeedle;
  }

  public function getCandleStick() {
    return $this->candleStick;
  }

  /**
   * true to render chart as candleStick. 
   * @param boolean $candleStick
   */
  public function setCandleStick($candleStick) {
    $this->candleStick = $candleStick;
  }

  public function getTickLength() {
    return $this->tickLength;
  }

  /**
   * Length of the line in pixels indicating open and close price.
   * @param integer $tickLength
   */
  public function setTickLength($tickLength) {
    $this->tickLength = $tickLength;
  }

  public function getBodyWidth() {
    return $this->bodyWidth;
  }

  /**
   * Width of the candlestick body in pixels.
   * @param integer $bodyWidth
   */
  public function setBodyWidth($bodyWidth) {
    $this->bodyWidth = $bodyWidth;
  }

  public function getOpenColor() {
    return $this->openColor;
  }

  /**
   * Color of the open price tick mark.
   * @param String $openColor
   */
  public function setOpenColor($openColor) {
    $this->openColor = $openColor;
  }

  public function getCloseColor() {
    return $this->closeColor;
  }

  /**
   * Color of the close price tick mark.
   * @param string $closeColor
   */
  public function setCloseColor($closeColor) {
    $this->closeColor = $closeColor;
  }

  public function getWickColor() {
    return $this->wickColor;
  }

  /**
   * Color of the hi-lo line thorugh the candlestick body.
   * @param string $wickColor
   */
  public function setWickColor($wickColor) {
    $this->wickColor = $wickColor;
  }

  public function getFillUpBody() {
    return $this->fillUpBody;
  }

  /**
   * true to render an “up” day (close price greater than open price) with a
   * filled candlestick body.
   * @param boolean $fillUpBody
   */
  public function setFillUpBody($fillUpBody) {
    $this->fillUpBody = $fillUpBody;
  }

  public function getFillDownBody() {
    return $this->fillDownBody;
  }

  /**
   * true to render a “down” day (close price lower than open price) with a
   * filled candlestick body.
   * @param boolean $fillDownBody
   */
  public function setFillDownBody($fillDownBody) {
    $this->fillDownBody = $fillDownBody;
  }

  public function getUpBodyColor() {
    return $this->upBodyColor;
  }

  /**
   * Color of candlestick body of an “up” day.
   * @param string $upBodyColor
   */
  public function setUpBodyColor($upBodyColor) {
    $this->upBodyColor = $upBodyColor;
  }

  public function getDownBodyColor() {
    return $this->downBodyColor;
  }

  /**
   * Color of candlestick body on a “down” day. 
   * @param string $downBodyColor
   */
  public function setDownBodyColor($downBodyColor) {
    $this->downBodyColor = $downBodyColor;
  }

  public function getHlc() {
    return $this->hlc;
  }

  /**
   * true if is a hi-low-close chart (no open price). 
   * @param boolean $hlc
   */
  public function setHlc($hlc) {
    $this->hlc = $hlc;
  }

  public function getDataLabelCenterOn() {
    return $this->dataLabelCenterOn;
  }

  /**
   * Center the data label
   * @param boolean $dataLabelCenterOn
   */
  public function setDataLabelCenterOn($dataLabelCenterOn) {
    $this->dataLabelCenterOn = $dataLabelCenterOn;
  }

  public function getPlacement() {
    return $this->placement;
  }

  public function setPlacement($placement) {
    $this->placement = $placement;
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
 
}