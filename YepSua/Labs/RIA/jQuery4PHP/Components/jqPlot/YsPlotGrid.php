<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotGrid  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotGrid extends YsComponentOption{

  private $drawGridlines;
  private $gridLineColor;
  private $gridLineWidth;
  private $background;
  private $borderColor;
  private $borderWidth;
  private $drawBorder;
  private $shadow;
  private $shadowAngle;
  private $shadowOffset;
  private $shadowWidth;
  private $shadowDepth;
  private $shadowColor;
  private $shadowAlpha;
  private $renderer;
  private $rendererOptions;
  private $backgroundColor;

  public function getDrawGridlines() {
    return $this->drawGridlines;
  }

  /**
   * Wether to draw the gridlines on the plot.
   * @param boolean $drawGridlines
   */
  public function setDrawGridlines($drawGridlines) {
    $this->drawGridlines = $drawGridlines;
  }

  public function getGridLineColor() {
    return $this->gridLineColor;
  }

  /**
   * Color of the grid lines.
   * @param string $gridLineColor
   */
  public function setGridLineColor($gridLineColor) {
    $this->gridLineColor = $gridLineColor;
  }

  public function getGridLineWidth() {
    return $this->gridLineWidth;
  }

  /**
   * Width of the grid lines.
   * @param real $gridLineWidth
   */
  public function setGridLineWidth($gridLineWidth) {
    $this->gridLineWidth = $gridLineWidth;
  }

  public function getBackground() {
    return $this->background;
  }

  /**
   * Css spec for the background color.
   * @param string $background
   */
  public function setBackground($background) {
    $this->background = $background;
  }

  public function getBorderColor() {
    return $this->borderColor;
  }

  /**
   * Css spec for the color of the grid border.
   * @param String $borderColor
   */
  public function setBorderColor($borderColor) {
    $this->borderColor = $borderColor;
  }

  public function getBorderWidth() {
    return $this->borderWidth;
  }

  /**
   * Width of the border in pixels.
   * @param real $borderWidth
   */
  public function setBorderWidth($borderWidth) {
    $this->borderWidth = $borderWidth;
  }

  public function getDrawBorder() {
    return $this->drawBorder;
  }

  /**
   * True to draw border around grid.
   * @param boolean $drawBorder
   */
  public function setDrawBorder($drawBorder) {
    $this->drawBorder = $drawBorder;
  }

  public function getShadow() {
    return $this->shadow;
  }

  /**
   * Wether to show a shadow behind the grid.
   * @param boolean $shadow
   */
  public function setShadow($shadow) {
    $this->shadow = $shadow;
  }

  public function getShadowAngle() {
    return $this->shadowAngle;
  }

  /**
   * Shadow angle in degrees.
   * @param int $shadowAngle
   */
  public function setShadowAngle($shadowAngle) {
    $this->shadowAngle = $shadowAngle;
  }

  public function getShadowOffset() {
    return $this->shadowOffset;
  }

  /**
   * Offset of each shadow stroke from the border in pixels
   * @param real $shadowOffset
   */
  public function setShadowOffset($shadowOffset) {
    $this->shadowOffset = $shadowOffset;
  }

  public function getShadowWidth() {
    return $this->shadowWidth;
  }

  /**
   * Width of the stoke for the shadow
   * @param real $shadowWidth
   */
  public function setShadowWidth($shadowWidth) {
    $this->shadowWidth = $shadowWidth;
  }

  public function getShadowDepth() {
    return $this->shadowDepth;
  }

  /**
   * Number of times shadow is stroked, each stroke offset shadowOffset from
   * the last.
   * @param int $shadowDepth
   */
  public function setShadowDepth($shadowDepth) {
    $this->shadowDepth = $shadowDepth;
  }

  public function getShadowColor() {
    return $this->shadowColor;
  }

  /**
   * An optional css color spec for the shadow in ‘rgba(n, n, n, n)’ form
   * @param string $shadowColor
   */
  public function setShadowColor($shadowColor) {
    $this->shadowColor = $shadowColor;
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

  public function getRenderer() {
    return $this->renderer;
  }

  /**
   * Instance of a renderer which will actually render the grid.
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
   * Options to pass on to the renderer
   * @see YsPlotRenderer
   * @param YsPlotRenderer $renderer
   */
  public function setRendererOptions($rendererOptions) {
    $this->rendererOptions = $rendererOptions;
  }

  public function getBackgroundColor() {
    return $this->backgroundColor;
  }

  /**
   * Css spec for the background color.
   * @param string $backgroundColor
   */
  public function setBackgroundColor($backgroundColor) {
    $this->backgroundColor = $backgroundColor;
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