<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotTrendline  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotTrendline extends YsComponentOption{

  private $show;
  private $color;
  private $renderer;
  private $rendererOptions;
  private $label;
  private $type;
  private $shadow;
  private $markerRenderer;
  private $lineWidth;
  private $shadowAngle;
  private $shadowOffset;
  private $shadowAlpha;
  private $shadowDepth;

  public function  __construct() {
    parent::__construct();
    $this->show = true;
  }

  public function getShow() {
    return $this->show;
  }

  /**
   * Wether or not to show the trend line.
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
  }

  public function getColor() {
    return $this->color;
  }

  /**
   * Wether or not to show the trend line.
   * @param string $color
   */
  public function setColor($color) {
    $this->color = $color;
  }

  public function getRenderer() {
    return $this->renderer;
  }

  /**
   * Renderer to use to draw the trend line. 
   * @param YsPlotRenderer $renderer
   */
  public function setRenderer($renderer) {
    $this->renderer = $renderer;
  }

  public function getRendererOptions() {
    return $this->rendererOptions;
  }

  /**
   * Options to pass to the line renderer.
   * @param YsPlotRenderer $rendererOptions
   */
  public function setRendererOptions($rendererOptions) {
    $this->rendererOptions = $rendererOptions;
  }

  public function getLabel() {
    return $this->label;
  }

  /**
   * Label for the trend line to use in the legend.
   * @param string $label
   */
  public function setLabel($label) {
    $this->label = $label;
  }

  public function getType() {
    return $this->type;
  }

  /**
   * Either ‘exponential’, ‘exp’, or ‘linear’.
   * @param string $type
   */
  public function setType($type) {
    $this->type = $type;
  }

  public function getShadow() {
    return $this->shadow;
  }

  /**
   * true or false, wether or not to show the shadow.
   * @param boolean $shadow
   */
  public function setShadow($shadow) {
    $this->shadow = $shadow;
  }

  public function getMarkerRenderer() {
    return $this->markerRenderer;
  }

  /**
   * Renderer to use to draw markers on the line.
   * @param YsPlotRenderer $markerRenderer
   */
  public function setMarkerRenderer($markerRenderer) {
    $this->markerRenderer = $markerRenderer;
  }

  public function getLineWidth() {
    return $this->lineWidth;
  }

  /**
   * Width of the trend line.
   * @param integer $lineWidth
   */
  public function setLineWidth($lineWidth) {
    $this->lineWidth = $lineWidth;
  }

  public function getShadowAngle() {
    return $this->shadowAngle;
  }

  /**
   * Width of the trend line.
   * @param integer $shadowAngle
   */
  public function setShadowAngle($shadowAngle) {
    $this->shadowAngle = $shadowAngle;
  }

  public function getShadowOffset() {
    return $this->shadowOffset;
  }

  /**
   * Pixel offset for each stroke of the shadow.
   * @param integer $shadowOffset
   */
  public function setShadowOffset($shadowOffset) {
    $this->shadowOffset = $shadowOffset;
  }

  public function getShadowAlpha() {
    return $this->shadowAlpha;
  }

  /**
   * Alpha transparency of the shadow.
   * @param real $shadowAlpha
   */
  public function setShadowAlpha($shadowAlpha) {
    $this->shadowAlpha = $shadowAlpha;
  }

  public function getShadowDepth() {
    return $this->shadowDepth;
  }

  /**
   * Number of strokes to make of the shadow.
   * @param integer $shadowDepth
   */
  public function setShadowDepth($shadowDepth) {
    $this->shadowDepth = $shadowDepth;
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