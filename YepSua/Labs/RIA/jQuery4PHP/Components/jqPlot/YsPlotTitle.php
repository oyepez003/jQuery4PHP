<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotTitle  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotTitle extends YsComponentOption{

  private $text;
  private $show;
  private $fontFamily;
  private $fontSize;
  private $textAlign;
  private $textColor;
  private $renderer;
  private $rendererOptions;

  public function  __construct($text = null) {
    parent::__construct();
    if($text !== null){
      $this->text = $text;
    }
    $this->show = true;
  }

  public function getText() {
    return $this->text;
  }

  /**
   * Text of the title;
   * @param string $text
   */
  public function setText($text) {
    $this->text = $text;
  }

  public function getShow() {
    return $this->show;
  }

  /**
   * Wether or not to show the title
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
  }

  public function getFontFamily() {
    return $this->fontFamily;
  }

  /**
   * Css font-family spec for the text.
   * @param string $fontFamily
   */
  public function setFontFamily($fontFamily) {
    $this->fontFamily = $fontFamily;
  }

  public function getFontSize() {
    return $this->fontSize;
  }

  /**
   * Css font-size spec for the text.
   * @param integer $fontSize
   */
  public function setFontSize($fontSize) {
    $this->fontSize = $fontSize;
  }

  public function getTextAlign() {
    return $this->textAlign;
  }

  /**
   * Css text-align spec for the text.
   * @param string $textAlign
   */
  public function setTextAlign($textAlign) {
    $this->textAlign = $textAlign;
  }

  public function getTextColor() {
    return $this->textColor;
  }

  /**
   * Css color spec for the text.
   * @param string $textColor
   */
  public function setTextColor($textColor) {
    $this->textColor = $textColor;
  }

  public function getRenderer() {
    return $this->renderer;
  }

  /**
   * A class for creating a DOM element for the title
   * @param YsJQuery $renderer
   */
  public function setRenderer($renderer) {
    $this->renderer = $renderer;
  }

  public function getRendererOptions() {
    return $this->rendererOptions;
  }

  /**
   * Renderer specific options passed to the renderer.
   * @param YsPlotRenderer $rendererOptions
   */
  public function setRendererOptions($rendererOptions) {
    $this->rendererOptions = $rendererOptions;
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