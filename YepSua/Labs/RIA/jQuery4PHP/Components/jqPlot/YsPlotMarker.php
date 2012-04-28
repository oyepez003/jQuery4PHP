<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsPlotMarker  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotMarker extends YsComponentOption{

  public static $STYLE_CIRCLE = "circle";
  public static $STYLE_DIAMOND = "diamond";
  public static $STYLE_SQUARE = "square";
  public static $STYLE_FILLED_CIRCLE = "filledCircle";
  public static $STYLE_FILLED_DIAMOND = "filledDiamond";
  public static $STYLE_FILLED_QUARE = "filledSquare";
  public static $STYLE_X = "x";
  public static $STYLE_DASH = "dash";
  public static $STYLE_PLUS = "plus";

  private $show;
  private $style;
  private $lineWidth;
  private $size;
  private $color;
  private $shadow;
  private $shadowAngle;
  private $shadowOffset;
  private $shadowDepth;
  private $shadowAlpha;
  private $shadowRenderer;
  private $shapeRenderer;

  public function  __construct($style = null) {
    parent::__construct();
    if($style !== null){
      $this->style = $style;
    }
    $this->show = true;
  }

  public function getShow() {
    return $this->show;
  }

  /**
   * Wether or not to show the marker.
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
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
   * Size of the line for non-filled markers.
   * @param int $lineWidth
   */
  public function setLineWidth($lineWidth) {
    $this->lineWidth = $lineWidth;
  }

  public function getSize() {
    return $this->size;
  }

  /**
   * Size of the marker (diameter or circle, length of edge of square, etc.)
   * @param real $size
   */
  public function setSize($size) {
    $this->size = $size;
  }

  public function getColor() {
    return $this->color;
  }

  /**
   * Color of marker.  Will be set to color of series by default on init.
   * @param string $color
   */
  public function setColor($color) {
    $this->color = $color;
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
   * @param int $shadowOffset
   */
  public function setShadowOffset($shadowOffset) {
    $this->shadowOffset = $shadowOffset;
  }

  public function getShadowDepth() {
    return $this->shadowDepth;
  }

  /**
   * Number of times shadow is stroked, each stroke offset
   * shadowOffset from the last.
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

  public function getShadowRenderer() {
    return $this->shadowRenderer;
  }

  /**
   * Renderer that will draws the shadows on the marker.
   * @see YsPlotRenderer
   * @param YsPlotRenderer $shadowRenderer
   */
  public function setShadowRenderer($shadowRenderer) {
    $this->shadowRenderer = $shadowRenderer;
  }

  public function getShapeRenderer() {
    return $this->shapeRenderer;
  }

  /**
   * Renderer that will draw the marker.
   * @see YsPlotRenderer
   * @param YsPlotRenderer $shadowRenderer
   */
  public function setShapeRenderer($shapeRenderer) {
    $this->shapeRenderer = $shapeRenderer;
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

  /*public function buildOption(){
    return $this->optionsToArray();
  }*/

}