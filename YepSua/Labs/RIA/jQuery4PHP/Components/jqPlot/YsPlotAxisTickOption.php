<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsPlotAxisTickOption  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotAxisTickOption extends YsComponentOption{

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
  private $angle;

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
   * Length of the tick beyond the grid in pixels.
   * DEPRECATED: This has been superceeded by markSize
   * @deprecated
   * @param int $size
   */
  public function setSize($size) {
      $this->size = $size;
  }

  public function getMarkSize() {
      return $this->markSize;
  }

  /**
   * Length of the tick marks in pixels.  For ‘cross’ style, length will be
   * stoked above and below axis, so total length will be twice this.
   * @param int $markSize
   */
  public function setMarkSize($markSize) {
      $this->markSize = $markSize;
  }

  public function getShow() {
      return $this->show;
  }

  /**
   * Wether or not to show the tick (mark and label).
   * Setting this to false requires more testing.
   * It is recommended to set showLabel and showMark to false instead.
   * @param boolean $show
   */
  public function setShow($show) {
      $this->show = $show;
  }

  public function getShowLabel() {
      return $this->showLabel;
  }

  /**
   * Wether or not to show the label.
   * @param boolean $showLabel
   */
  public function setShowLabel($showLabel) {
      $this->showLabel = $showLabel;
  }

  public function getFormatter() {
      return $this->formatter;
  }

  /**
   * A class of a formatter for the tick text.  sprintf by default.
   * @param YsJQuery $formatter YsPlot::getDefaultTickFormatter()
   */
  public function setFormatter($formatter) {
      $this->formatter = $formatter;
  }

  public function getPrefix() {
      return $this->prefix;
  }

  /**
   * String appended to the tick label if no formatString is specified.
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
   * CSS spec for the font-family css attribute.
   * @param string $fontFamily
   */
  public function setFontFamily($fontFamily) {
      $this->fontFamily = $fontFamily;
  }


  public function getFontSize() {
      return $this->fontSize;
  }

  /**
   * CSS spec for the font-size css attribute.
   * @param string  $fontSize
   */
  public function setFontSize($fontSize) {
      $this->fontSize = $fontSize;
  }

  public function getTextColor() {
      return $this->textColor;
  }

  /**
   * CSS spec for the color attribute.
   * @param string $textColor
   */
  public function setTextColor($textColor) {
      $this->textColor = $textColor;
  }

  public function getAngle() {
    return $this->angle;
  }

  public function setAngle($angle) {
    $this->angle = $angle;
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