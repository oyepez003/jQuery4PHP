<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotCursor  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotCursor extends YsComponentOption{

  private $style;
  private $show;
  private $showTooltip;
  private $followMouse;
  private $tooltipOffset;
  private $showTooltipGridPosition;
  private $showTooltipUnitPosition;
  private $showTooltipDataPosition;
  private $tooltipFormatString;
  private $useAxesFormatters;
  private $tooltipAxisGroups;
  private $zoom;
  private $clickReset;
  private $dblClickReset;
  private $showVerticalLine;
  private $showHorizontalLine;
  private $constrainZoomTo;
  private $intersectionThreshold;
  private $showCursorLegend;
  private $cursorLegendFormatString;
  private $constrainOutsideZoom;
  private $showTooltipOutsideZoom;
  private $tooltipLocation;

  public function  __construct() {
    parent::__construct();
    $this->show = true;
  }

  public function getStyle() {
    return $this->style;
  }

  /**
   * CSS spec for cursor style
   * @param string $style
   */
  public function setStyle($style) {
    $this->style = $style;
  }

  public function getShow() {
    return $this->show;
  }

  /**
   * Wether to show the cursor or not.
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
  }

  public function getShowTooltip() {
    return $this->showTooltip;
  }

  /**
   * Show a cursor position tooltip.
   * @param boolean $showTooltip
   */
  public function setShowTooltip($showTooltip) {
    $this->showTooltip = $showTooltip;
  }

  public function getFollowMouse() {
    return $this->followMouse;
  }

  /**
   * Tooltip follows the mouse, it is not at a fixed location. 
   * @param boolean $followMouse
   */
  public function setFollowMouse($followMouse) {
    $this->followMouse = $followMouse;
  }

  public function getTooltipOffset() {
    return $this->tooltipOffset;
  }

  /**
   * Pixel offset of tooltip from the grid boudaries or cursor center.
   * @param int $tooltipOffset
   */
  public function setTooltipOffset($tooltipOffset) {
    $this->tooltipOffset = $tooltipOffset;
  }

  public function getShowTooltipGridPosition() {
    return $this->showTooltipGridPosition;
  }

  /**
   * Show the grid pixel coordinates of the mouse.
   * @param boolean $showTooltipGridPosition
   */
  public function setShowTooltipGridPosition($showTooltipGridPosition) {
    $this->showTooltipGridPosition = $showTooltipGridPosition;
  }

  public function getShowTooltipUnitPosition() {
    return $this->showTooltipUnitPosition;
  }

  /**
   * Show the unit (data) coordinates of the mouse.
   * @param boolean $showTooltipUnitPosition
   */
  public function setShowTooltipUnitPosition($showTooltipUnitPosition) {
    $this->showTooltipUnitPosition = $showTooltipUnitPosition;
  }

  public function getShowTooltipDataPosition() {
    return $this->showTooltipDataPosition;
  }

  /**
   * Used with showVerticalLine to show intersecting data points in the tooltip.
   * @param boolean $showTooltipDataPosition
   */
  public function setShowTooltipDataPosition($showTooltipDataPosition) {
    $this->showTooltipDataPosition = $showTooltipDataPosition;
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

  public function getTooltipAxisGroups() {
    return $this->tooltipAxisGroups;
  }

  /**
   * Show position for the specified axes.
   * This is an array like [[‘xaxis’, ‘yaxis’], [‘xaxis’, ‘y2axis’]] Default is to
   * compute automatically for all visible axes.
   * @param array $tooltipAxisGroups
   */
  public function setTooltipAxisGroups($tooltipAxisGroups) {
    $this->tooltipAxisGroups = $tooltipAxisGroups;
  }

  public function getZoom() {
    return $this->zoom;
  }

  /**
   * Enable plot zooming.
   * @param boolean $zoom
   */
  public function setZoom($zoom) {
    $this->zoom = $zoom;
  }

  public function getClickReset() {
    return $this->clickReset;
  }

  /**
   * Will reset plot zoom if single click on plot without drag.
   * @param boolean $clickReset
   */
  public function setClickReset($clickReset) {
    $this->clickReset = $clickReset;
  }

  public function getDblClickReset() {
    return $this->dblClickReset;
  }

  /**
   * Will reset plot zoom if double click on plot without drag.
   * @param boolean $dblClickReset
   */
  public function setDblClickReset($dblClickReset) {
    $this->dblClickReset = $dblClickReset;
  }

  public function getShowVerticalLine() {
    return $this->showVerticalLine;
  }

  /**
   * draw a vertical line across the plot which follows the cursor.
   * When the line is near a data point, a special legend and/or tooltip can be
   * updated with the data values.
   * @param boolean $showVerticalLine
   */
  public function setShowVerticalLine($showVerticalLine) {
    $this->showVerticalLine = $showVerticalLine;
  }

  public function getShowHorizontalLine() {
    return $this->showHorizontalLine;
  }

  /**
   * Draw a horizontal line across the plot which follows the cursor.
   * @param boolean $showHorizontalLine
   */
  public function setShowHorizontalLine($showHorizontalLine) {
    $this->showHorizontalLine = $showHorizontalLine;
  }

  public function getConstrainZoomTo() {
    return $this->constrainZoomTo;
  }

  /**
   * ’none’, ‘x’ or ‘y’. Default 'none'.
   * @param string $constrainZoomTo
   */
  public function setConstrainZoomTo($constrainZoomTo) {
    $this->constrainZoomTo = $constrainZoomTo;
  }

  public function getIntersectionThreshold() {
    return $this->intersectionThreshold;
  }

  /**
   * pixel distance from data point or marker to consider cursor lines
   * intersecting with point.  If data point markers are not shown,
   * this should be >= 1 or will often miss point intersections.
   * @param int $intersectionThreshold
   */
  public function setIntersectionThreshold($intersectionThreshold) {
    $this->intersectionThreshold = $intersectionThreshold;
  }

  public function getShowCursorLegend() {
    return $this->showCursorLegend;
  }

  /**
   * Replace the plot legend with an enhanced legend displaying
   * intersection information.
   * @param boolean $showCursorLegend
   */
  public function setShowCursorLegend($showCursorLegend) {
    $this->showCursorLegend = $showCursorLegend;
  }

  public function getCursorLegendFormatString() {
    return $this->cursorLegendFormatString;
  }

  /**
   * Format string used in the cursor legend.  If showTooltipDataPosition
   * is true, this will also be the default format string used by
   * tooltipFormatString.
   * @param YsJQuery $cursorLegendFormatString
   */
  public function setCursorLegendFormatString($cursorLegendFormatString) {
    $this->cursorLegendFormatString = $cursorLegendFormatString;
  }

  public function getConstrainOutsideZoom() {
    return $this->constrainOutsideZoom;
  }

  /**
   * True to limit actual zoom area to edges of grid, even when zooming outside
   * of plot area.  That is, can’t zoom out by mousing outside plot.
   * @param boolean $constrainOutsideZoom
   */
  public function setConstrainOutsideZoom($constrainOutsideZoom) {
    $this->constrainOutsideZoom = $constrainOutsideZoom;
  }

  public function getShowTooltipOutsideZoom() {
    return $this->showTooltipOutsideZoom;
  }

  /**
   * True will keep updating the tooltip when zooming of the grid.
   * @param boolean $showTooltipOutsideZoom
   */
  public function setShowTooltipOutsideZoom($showTooltipOutsideZoom) {
    $this->showTooltipOutsideZoom = $showTooltipOutsideZoom;
  }

  public function getTooltipLocation() {
    return $this->tooltipLocation;
  }

  public function setTooltipLocation($tooltipLocation) {
    $this->tooltipLocation = $tooltipLocation;
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