<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotLegend  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotLegend extends YsComponentOption{

  private $show;
  private $location;
  private $labels;
  private $showLabels;
  private $showSwatch;
  private $placement;
  private $xoffset;
  private $yoffset;
  private $border;
  private $background;
  private $textColor;
  private $fontFamily;
  private $fontSize;
  private $rowSpacing;
  private $rendererOptions;
  private $predraw;
  private $marginTop;
  private $marginRight;
  private $marginBottom;
  private $marginLeft;
  private $renderer;
  private $shrinkGrid;
  private $showSwatches;

  public function  __construct($location = null) {
    if($location !== null){
      $this->location = $location;
    }
    $this->show = true;
  }

  public function getShow() {
      return $this->show;
  }

  /**
   * Wether to display the legend on the graph.
   * @param boolean $show
   */
  public function setShow($show) {
      $this->show = $show;
  }

  public function getLocation() {
      return $this->location;
  }

  /**
   * Placement of the legend.  one of the compass directions: nw, n, ne, e, se, s, sw, w
   * @see YsLocation
   * @param YsLocation $location
   */
  public function setLocation($location) {
      $this->location = $location;
  }

  public function getLabels() {
      return $this->labels;
  }

  /**
   * Array of labels to use.  By default the renderer will look for labels on
   * the series.  Labels specified in this array will override labels specified
   * on the series.
   * @param array() $labels
   */
  public function setLabels($labels) {
      $this->labels = $labels;
  }

  public function getShowLabels() {
      return $this->showLabels;
  }

  /**
   * True to show the label text on the legend.
   * @param boolean $showLabels
   */
  public function setShowLabels($showLabels) {
      $this->showLabels = $showLabels;
  }

  public function getShowSwatch() {
      return $this->showSwatch;
  }

  /**
   * True to show the color swatches on the legend.
   * @param boolean $showSwatch
   */
  public function setShowSwatch($showSwatch) {
      $this->showSwatch = $showSwatch;
  }

  public function getPlacement() {
      return $this->placement;
  }

  /**
   * ”insideGrid” places legend inside the grid area of the plot.<br/>
   * “outsideGrid” places the legend outside the grid but inside the plot
   * container,
   * shrinking the grid to accomodate the legend.<br/>
   * “inside” synonym for “insideGrid”,<br/>
   * “outside” places the legend ouside the grid area, but does not shrink the
   * grid which can cause the legend to overflow the plot container.<br/>
   * @param string $placement
   */
  public function setPlacement($placement) {
      $this->placement = $placement;
  }

  public function getXoffset() {
      return $this->xoffset;
  }

  /**
   * Set the margins on the legend using the marginTop, marginLeft, etc.
   * properties or via CSS margin styling of the .jqplot-table-legend class.
   * @deprecated
   * @param int $xoffset
   */
  public function setXoffset($xoffset) {
      $this->xoffset = $xoffset;
  }

  public function getYoffset() {
      return $this->yoffset;
  }

  /**
   * Set the margins on the legend using the marginTop, marginLeft, etc.
   * properties or via CSS margin styling of the .jqplot-table-legend class.
   * @deprecated
   * @param int $yoffset
   */
  public function setYoffset($yoffset) {
      $this->yoffset = $yoffset;
  }

  public function getBorder() {
      return $this->border;
  }

  /**
   * Css spec for the border around the legend box.
   * @param string $border
   */
  public function setBorder($border) {
      $this->border = $border;
  }

  public function getBackground() {
      return $this->background;
  }

  /**
   * Css spec for the background of the legend box.
   * @param string $background
   */
  public function setBackground($background) {
      $this->background = $background;
  }

  public function getTextColor() {
      return $this->textColor;
  }

  /**
   * Css color spec for the legend text.
   * @param String $textColor
   */
  public function setTextColor($textColor) {
      $this->textColor = $textColor;
  }

  public function getFontFamily() {
      return $this->fontFamily;
  }

  /**
   * Css font-family spec for the legend text.
   * @param string $fontFamily
   */
  public function setFontFamily($fontFamily) {
      $this->fontFamily = $fontFamily;
  }

  public function getFontSize() {
      return $this->fontSize;
  }

  /**
   * Css font-size spec for the legend text.
   * @param string $fontSize
   */
  public function setFontSize($fontSize) {
      $this->fontSize = $fontSize;
  }

  public function getRowSpacing() {
      return $this->rowSpacing;
  }

  /**
   * Css padding-top spec for the rows in the legend.
   * @param string $rowSpacing
   */
  public function setRowSpacing($rowSpacing) {
      $this->rowSpacing = $rowSpacing;
  }

  public function getRendererOptions() {
      return $this->rendererOptions;
  }

  /**
   * Renderer specific options passed to the renderer.
   * @see YsPlotRenderer
   * @param YsPlotRenderer $rendererOptions 
   */
  public function setRendererOptions(YsPlotRenderer $rendererOptions) {
      $this->rendererOptions = $rendererOptions;
  }

  public function getPredraw() {
      return $this->predraw;
  }

  /**
   * Wether to draw the legend before the series or not.
   * Used with series specific legend renderers for pie,donut,mekko charts,etc.
   * @param boolean $predraw
   */
  public function setPredraw($predraw) {
      $this->predraw = $predraw;
  }

  public function getMarginTop() {
      return $this->marginTop;
  }

  /**
   * CSS margin for the legend DOM element.  This will set an element CSS style
   * for the margin which will override any style sheet setting.
   * The default will be taken from the stylesheet.
   * @param string $marginTop
   */
  public function setMarginTop($marginTop) {
      $this->marginTop = $marginTop;
  }

  public function getMarginRight() {
      return $this->marginRight;
  }

  /**
   * CSS margin for the legend DOM element.  This will set an element CSS style
   * for the margin which will override any style sheet setting.
   * The default will be taken from the stylesheet.
   * @param string $marginRight
   */
  public function setMarginRight($marginRight) {
      $this->marginRight = $marginRight;
  }

  public function getMarginBottom() {
      return $this->marginBottom;
  }

  /**
   * CSS margin for the legend DOM element.  This will set an element CSS style
   * for the margin which will override any style sheet setting.
   * The default will be taken from the stylesheet.
   * @param string $marginBottom
   */
  public function setMarginBottom($marginBottom) {
      $this->marginBottom = $marginBottom;
  }

  public function getMarginLeft() {
      return $this->marginLeft;
  }

  /**
   * CSS margin for the legend DOM element.  This will set an element CSS style
   * for the margin which will override any style sheet setting.
   * The default will be taken from the stylesheet.
   * @param string $marginLeft
   */
  public function setMarginLeft($marginLeft) {
      $this->marginLeft = $marginLeft;
  }
  
  public function getRenderer() {
    return $this->renderer;
  }

  /**
   * Set the renderer object
   * @see YsPlotRenderer
   * @param YsPlotRenderer $renderer
   */
  public function setRenderer($renderer) {
    $this->renderer = $renderer;
  }

  public function getShrinkGrid() {
    return $this->shrinkGrid;
  }

  /**
   * Set ShrinkGrid
   * @param object $shrinkGrid
   */
  public function setShrinkGrid($shrinkGrid) {
    $this->shrinkGrid = $shrinkGrid;
  }

  public function getShowSwatches() {
    return $this->showSwatches;
  }

  /**
   * Wether to display the legend Swatches.
   * @param boolean $showSwatches
   */
  public function setShowSwatches($showSwatches) {
    $this->showSwatches = $showSwatches;
  }

  public function optionsToArray(){
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
}