<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotAxis An individual axis object.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotAxis extends YsComponentOption{

  public static $DEFAULT_YAXIS_NAME = 'yaxis';
  public static $DEFAULT_XAXIS_NAME = 'xaxis';
  public static $Y = 'y';
  public static $X = 'x';

  private $show;
  private $tickRenderer;
  private $tickOptions;
  private $labelRenderer;
  private $labelOptions;
  private $label;
  private $showLabel;
  private $min;
  private $max;
  private $autoscale;
  private $pad;
  private $padMax;
  private $padMin;
  private $ticks;
  private $numberTicks;
  private $tickInterval;
  private $renderer;
  private $rendererOptions;
  private $showTicks;
  private $showTickMarks;
  private $showMinorTicks;
  private $useSeriesColor;
  private $borderWidth;
  private $borderColor;
  private $syncTicks;
  private $tickSpacing;
  private $barLabels;
  private $tickMode;

  private $name;

  public function  varsToUnset() {
    return array('name');
  }

  public function  __construct($name = null) {
    if($name !== null){
      $this->name = $name;
    }
  }

  public function getShow() {
      return $this->show;
  }

  /**
   * Wether to display the axis on the graph.
   * @param boolean $show
   */
  public function setShow($show) {
      $this->show = $show;
  }

  public function getTickRenderer() {
      return $this->tickRenderer;
  }

  /**
   * A class of a rendering engine for creating the ticks labels displayed
   * on the plot
   * @param YsPlotRenderer $tickRenderer
   */
  public function setTickRenderer($tickRenderer) {
      $this->tickRenderer = $tickRenderer;
  }

  public function getTickOptions() {
      return $this->tickOptions;
  }

  /**
   * Options that will be passed to the tickRenderer
   * @param YsPlotAxisTickOption $tickOptions
   */
  public function setTickOptions(YsPlotAxisTickOption $tickOptions) {
      $this->tickOptions = $tickOptions->optionsToArray();
  }

  public function getLabelRenderer() {
      return $this->labelRenderer;
  }

  /**
   * A class of a rendering engine for creating an axis label.
   * @param YsPlotRenderer $labelRenderer
   */
  public function setLabelRenderer($labelRenderer) {
      $this->labelRenderer = $labelRenderer;
  }

  public function getLabelOptions() {
      return $this->labelOptions;
  }

  /**
   * Options passed to the label renderer.
   * @param YsPlotRenderer $labelOptions
   */
  public function setLabelOptions($labelOptions) {
      $this->labelOptions = $labelOptions;
  }

  public function getLabel() {
      return $this->label;
  }

  /**
   * Label for the axis
   * @param string $label
   */
  public function setLabel($label) {
      $this->label = $label;
  }

  public function getShowLabel() {
      return $this->showLabel;
  }

  /**
   * true to show the axis label.
   * @param boolean $showLabel
   */
  public function setShowLabel($showLabel) {
      $this->showLabel = $showLabel;
  }

  public function getMin() {
      return $this->min;
  }

  /**
   * Minimum value of the axis (in data units, not pixels).
   * @param int $min
   */
  public function setMin($min) {
      $this->min = $min;
  }

  public function getMax() {
      return $this->max;
  }

  /**
   * Maximum value of the axis (in data units, not pixels).
   * @param int $max
   */
  public function setMax($max) {
      $this->max = $max;
  }

  public function getAutoscale() {
      return $this->autoscale;
  }

  /**
   * Autoscale the axis min and max values to provide sensible tick spacing.
   * If axis min or max are set, autoscale will be turned off.
   * The numberTicks, tickInterval and pad options do work with autoscale,
   * although tickInterval has not been tested yet. padMin and padMax do
   * nothing when autoscale is on.
   * @param boolean $autoscale
   */
  public function setAutoscale($autoscale) {
      $this->autoscale = $autoscale;
  }

  public function getPad() {
      return $this->pad;
  }

  /**
   * Padding to extend the range above and below the data bounds.
   * The data range is multiplied by this factor to determine minimum and
   * maximum axis bounds.  A value of 0 will be interpreted to mean no
   * padding, and pad will be set to 1.0.
   * @param string $pad
   */
  public function setPad($pad) {
      $this->pad = $pad;
  }

  public function getPadMax() {
      return $this->padMax;
  }

  /**
   * Padding to extend the range above data bounds.
   * The top of the data range is multiplied by this factor to determine
   * maximum axis bounds.  A value of 0 will be interpreted to mean no
   * padding, and padMax will be set to 1.0.
   * @param string $padMax
   */
  public function setPadMax($padMax) {
      $this->padMax = $padMax;
  }

  public function getPadMin() {
      return $this->padMin;
  }

  /**
   * Padding to extend the range below data bounds.
   * The bottom of the data range is multiplied by this factor to
   * determine minimum axis bounds.  A value of 0 will be interpreted to
   * mean no padding, and padMin will be set to 1.0.
   * @param string $padMin
   */
  public function setPadMin($padMin) {
      $this->padMin = $padMin;
  }

  public function getTicks() {
      return $this->ticks;
  }

  /**
   * 1D [val, val, ...] or 2D [[val, label], [val, label], ...] array of ticks
   * for the axis.  If no label is specified, the value is formatted into an
   * appropriate label.
   * @param array $ticks
   */
  public function setTicks($ticks) {
      $this->ticks = $ticks;
  }

  public function getNumberTicks() {
      return $this->numberTicks;
  }

  /**
   * Desired number of ticks.  Default is to compute automatically.
   * @param array $numberTicks
   */
  public function setNumberTicks($numberTicks) {
      $this->numberTicks = $numberTicks;
  }

  public function getTickInterval() {
      return $this->tickInterval;
  }

  /**
   * Number of units between ticks.  Mutually exclusive with numberTicks.
   * @param int $tickInterval
   */
  public function setTickInterval($tickInterval) {
      $this->tickInterval = $tickInterval;
  }

  public function getRenderer() {
      return $this->renderer;
  }

  /**
   * A class of a rendering engine that handles tick generation,
   * scaling input data to pixel grid units and drawing the axis element.
   * @param YsArgument $renderer new YsArgument('$.jqplot.LinearAxisRenderer')
   */
  public function setRenderer($renderer) {
      $this->renderer = $renderer;
  }

  public function getRendererOptions() {
      return $this->rendererOptions;
  }

  /**
   * Renderer specific options.  See $.jqplot.LinearAxisRenderer  for options.
   * @param array $rendererOptions
   */
  public function setRendererOptions($rendererOptions) {
      $this->rendererOptions = $rendererOptions;
  }

  public function getShowTicks() {
      return $this->showTicks;
  }

  /**
   * Wether to show the ticks (both marks and labels) or not.
   * Will not override showMark and showLabel options if specified on the
   * ticks themselves.
   * @param boolean $showTicks
   */
  public function setShowTicks($showTicks) {
      $this->showTicks = $showTicks;
  }

  public function getShowTickMarks() {
      return $this->showTickMarks;
  }

  /**
   * Wether to show the tick marks (line crossing grid) or not.
   * Overridden by showTicks and showMark option of tick itself.
   * @param boolean $showTickMarks
   */
  public function setShowTickMarks($showTickMarks) {
      $this->showTickMarks = $showTickMarks;
  }

  public function getShowMinorTicks() {
      return $this->showMinorTicks;
  }

  /**
   * Wether or not to show minor ticks.
   * @param boolean $showMinorTicks
   */
  public function setShowMinorTicks($showMinorTicks) {
      $this->showMinorTicks = $showMinorTicks;
  }

  public function getUseSeriesColor() {
      return $this->useSeriesColor;
  }

  /**
   * Use the color of the first series associated with this axis for the tick
   * marks and line bordering this axis.
   * @param boolean $useSeriesColor
   */
  public function setUseSeriesColor($useSeriesColor) {
      $this->useSeriesColor = $useSeriesColor;
  }

  public function getBorderWidth() {
      return $this->borderWidth;
  }

  /**
   * Qidth of line stroked at the border of the axis.
   * Defaults to the width of the grid boarder.
   * @param string $borderWidth
   */
  public function setBorderWidth($borderWidth) {
      $this->borderWidth = $borderWidth;
  }

  public function getBorderColor() {
      return $this->borderColor;
  }

  /**
   * Color of the border adjacent to the axis.  Defaults to grid border color.
   * @param string $borderColor
   */
  public function setBorderColor($borderColor) {
      $this->borderColor = $borderColor;
  }

  public function getSyncTicks() {
      return $this->syncTicks;
  }

  /**
   * true to try and synchronize tick spacing across multiple axes so that
   * ticks and grid lines line up.  This has an impact on autoscaling
   * algorithm, however.  In general, autoscaling an individual axis will
   * work better if it does not have to sync ticks.
   * @param boolean $syncTicks
   */
  public function setSyncTicks($syncTicks) {
      $this->syncTicks = $syncTicks;
  }

  public function getTickSpacing() {
      return $this->tickSpacing;
  }

  /**
   * Approximate pixel spacing between ticks on graph.
   * Used during autoscaling.  This number will be an upper bound, actual
   * spacing will be less.
   * @param string $tickSpacing
   */
  public function setTickSpacing($tickSpacing) {
      $this->tickSpacing = $tickSpacing;
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

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getXaxisName(){
    return ($this->name !== null) ? $this->name : self::$DEFAULT_XAXIS_NAME;
  }

  public function getYaxisName(){
    return ($this->name !== null) ? $this->name : self::$DEFAULT_YAXIS_NAME;
  }

  public function getBarLabels() {
    return $this->barLabels;
  }

  public function setBarLabels($barLabels) {
    $this->barLabels = $barLabels;
  }

  public function getTickMode() {
    return $this->tickMode;
  }

  public function setTickMode($tickMode) {
    $this->tickMode = $tickMode;
  }

}