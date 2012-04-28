<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotHighlighter  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotHighlighter extends YsComponentOption{

  private $show;
  private $markerRenderer;
  private $showMarker;
  private $lineWidthAdjust;
  private $sizeAdjust;
  private $showTooltip;
  private $tooltipLocation;
  private $fadeTooltip;
  private $tooltipFadeSpeed;
  private $tooltipOffset;
  private $tooltipAxes;
  private $useAxesFormatters;
  private $tooltipFormatString;
  private $formatString;
  private $yvalues;
  private $bringSeriesToFront;

  public function getShow() {
    return $this->show;
  }

  /**
   * True to show the highlight.
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
  }

  public function getMarkerRenderer() {
    return $this->markerRenderer;
  }

  /**
   * Renderer used to draw the marker of the highlighted point.
   * Renderer will assimilate attributes from the data point being highlighted,
   * so no attributes need set on the renderer directly.
   * Default is to turn off shadow drawing on the highlighted point.
   * @see YsPlotRenderer
   * @param YsPlotRenderer $markerRenderer
   */
  public function setMarkerRenderer($markerRenderer) {
    $this->markerRenderer = $markerRenderer;
  }

  public function getShowMarker() {
    return $this->showMarker;
  }

  /**
   * True to show the marker
   * @param boolean $showMarker
   */
  public function setShowMarker($showMarker) {
    $this->showMarker = $showMarker;
  }

  public function getLineWidthAdjust() {
    return $this->lineWidthAdjust;
  }

  /**
   * Pixels to add to the lineWidth of the highlight.
   * @param real $lineWidthAdjust
   */
  public function setLineWidthAdjust($lineWidthAdjust) {
    $this->lineWidthAdjust = $lineWidthAdjust;
  }

  public function getSizeAdjust() {
    return $this->sizeAdjust;
  }

  /**
   * Pixels to add to the overall size of the highlight.
   * @param int $sizeAdjust
   */
  public function setSizeAdjust($sizeAdjust) {
    $this->sizeAdjust = $sizeAdjust;
  }

  public function getShowTooltip() {
    return $this->showTooltip;
  }

  /**
   * Show a tooltip with data point values.
   * @param boolean $showTooltip
   */
  public function setShowTooltip($showTooltip) {
    $this->showTooltip = $showTooltip;
  }

  public function getTooltipLocation() {
    return $this->tooltipLocation;
  }

  /**
   * Where to position tooltip, ‘n’, ‘ne’, ‘e’, ‘se’, ‘s’, ‘sw’, ‘w’, ‘nw’
   * @see YsLocation
   * @param YsLocation $tooltipLocation
   */
  public function setTooltipLocation($tooltipLocation) {
    $this->tooltipLocation = $tooltipLocation;
  }

  public function getFadeTooltip() {
    return $this->fadeTooltip;
  }

  /**
   * true = fade in/out tooltip, flase = show/hide tooltip
   * @param boolean $fadeTooltip
   */
  public function setFadeTooltip($fadeTooltip) {
    $this->fadeTooltip = $fadeTooltip;
  }

  public function getTooltipFadeSpeed() {
    return $this->tooltipFadeSpeed;
  }

  /**
   * ’slow’, ‘def’, ‘fast’, or number of milliseconds.
   * @see YsSpeed
   * @param YsSpeed $tooltipFadeSpeed
   */
  public function setTooltipFadeSpeed($tooltipFadeSpeed) {
    $this->tooltipFadeSpeed = $tooltipFadeSpeed;
  }

  public function getTooltipOffset() {
    return $this->tooltipOffset;
  }

  /**
   * Pixel offset of tooltip from the highlight.
   * @param int $tooltipOffset
   */
  public function setTooltipOffset($tooltipOffset) {
    $this->tooltipOffset = $tooltipOffset;
  }

  public function getTooltipAxes() {
    return $this->tooltipAxes;
  }

  /**
   * Which axes to display in tooltip, ‘x’, ‘y’ or ‘both’, ‘xy’ or ‘yx’ ‘both’
   * and ‘xy’ are equivalent, ‘yx’ reverses order of labels.
   * @see YsDirection
   * @param YsDirection $tooltipAxes
   */
  public function setTooltipAxes($tooltipAxes) {
    $this->tooltipAxes = $tooltipAxes;
  }

  public function getUseAxesFormatters() {
    return $this->useAxesFormatters;
  }

  /**
   * Use the x and y axes formatters to format the text in the tooltip.
   * @param boolean $useAxesFormatters
   */
  public function setUseAxesFormatters($useAxesFormatters) {
    $this->useAxesFormatters = $useAxesFormatters;
  }

  public function getTooltipFormatString() {
    return $this->tooltipFormatString;
  }

  /**
   * Sprintf format string for the tooltip
   * @param string $tooltipFormatString
   */
  public function setTooltipFormatString($tooltipFormatString) {
    $this->tooltipFormatString = $tooltipFormatString;
  }

  public function getFormatString() {
    return $this->formatString;
  }

  /**
   * Alternative to tooltipFormatString will format the whole tooltip text,
   * populating with x, y values as indicated by tooltipAxes option.
   * So, you could have a tooltip like: ‘Date: %s, number of cats: %d’ to format
   * the whole tooltip at one go.  If useAxesFormatters is true, values will be
   * formatted according to Axes formatters and you can populate your tooltip
   * string with %s placeholders.
   * @param string $formatString
   */
  public function setFormatString($formatString) {
    $this->formatString = $formatString;
  }

  public function getYValues() {
    return $this->yvalues;
  }

  /**
   * Number of y values to expect in the data point array.
   * Typically this is 1.  Certain plots, like OHLC, will have more y values in
   * each data point array.
   * @param int/array() $yvalues
   */
  public function setYValues($yvalues) {
    $this->yvalues = $yvalues;
  }

  public function getBringSeriesToFront() {
    return $this->bringSeriesToFront;
  }

  /**
   * True to bring the series of the highlighted point to the front of other
   * series.
   * @param boolean $bringSeriesToFront
   */
  public function setBringSeriesToFront($bringSeriesToFront) {
    $this->bringSeriesToFront = $bringSeriesToFront;
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