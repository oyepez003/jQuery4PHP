<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQColorpicker A simple component to select color in the same way you select 
 * color in Adobe Photoshop
 *
 * @method YsJQColorPicker _eventName($value) The desired event to trigger the colorpicker. Default: 'click'
 * @method YsJQColorPicker _onShow($value) Callback function triggered when the color picker is shown
 * @method YsJQColorPicker _onBeforeShow($value) Callback function triggered before the color picker is shown
 * @method YsJQColorPicker _onHide($value) Callback function triggered when the color picker is hidden
 * @method YsJQColorPicker _onChange($value) Callback function triggered when the color is changed
 * @method YsJQColorPicker _onSubmit($value) Callback function triggered when the color it is chosen
 * @method YsJQColorPicker _color($value) The default color. String for hex color or hash for RGB and HSB ({r:255, r:0, b:0}) . Default: 'ff0000'
 * @method YsJQColorPicker _livePreview($value) Whatever if the color values are filled in the fields while changing values on selector or a field. If false it may improve speed. Default true
 * @method YsJQColorPicker _flat($value) Whatever if the color picker is appended to the element or triggered by an event. Default false
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQColorPicker extends YsJQueryPlugin {

  const VERSION = "23.05.2009";
  const LICENSE = "MIT and GPL licenses";

  public static $event = 'ColorPicker';
  public static $HIDE  = 'ColorPickerHide';
  public static $SET_COLOR  = 'ColorPickerSetColor';
  public static $SHOW  = 'ColorPickerShow';

  public function registerOptions(){
    return   array(
              //options
               '_eventName' =>  array('key' => 'eventName', 'is_quoted' => false),
               '_onShow' =>  array('key' => 'onShow', 'is_quoted' => false),
               '_onBeforeShow' =>  array('key' => 'onBeforeShow', 'is_quoted' => false),
               '_onHide' =>  array('key' => 'onHide', 'is_quoted' => false),
               '_onChange' =>  array('key' => 'onChange', 'is_quoted' => false),
               '_onSubmit' =>  array('key' => 'onSubmit', 'is_quoted' => false),
               '_color' =>  array('key' => 'color', 'is_quoted' => false),
               '_livePreview' =>  array('key' => 'livePreview', 'is_quoted' => false),
               '_flat' =>  array('key' => 'flat', 'is_quoted' => false)        
              );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQColorPicker
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  /**
   * Build the jQueryPlugin
   * @return YsJQColorPicker 
   */
  public static function build(){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    $jquery = $jquery->returnHEXValueIn();
    return $jquery;
  }
  
  private function configureReturnValues($jQueryObject, $jQuerySelector = null,$h= '', $s= '', $b= '', $r = '', $g = '', $b2 = ''){
    $submit = '$(el).val(hex);$(el).ColorPickerHide();';
    $show = '$(this).ColorPickerSetColor(this.value);';
    if($jQuerySelector !== null){
      $submit = sprintf("$('%s').val(hex);", $jQuerySelector);
      $show = sprintf("$('%s').ColorPickerSetColor(this.value);", $jQuerySelector);
    }
    $submit .= sprintf("$('%s').val(hsb.h);", $h);
    $submit .= sprintf("$('%s').val(hsb.s);", $s);
    $submit .= sprintf("$('%s').val(hsb.b);", $b);
    $submit .= sprintf("$('%s').val(rgb.r);", $r);
    $submit .= sprintf("$('%s').val(rgb.g);", $g);
    $submit .= sprintf("$('%s').val(rgb.b);", $b2);
    $submit = str_replace('$',YsJQuery::$jqueryVar,$submit);
    $show = str_replace('$',YsJQuery::$jqueryVar,$show);
    $jQueryObject->_onSubmit(YsJsFunction::newInstance($submit, 'hsb, hex, rgb, el'));
    $jQueryObject->_onBeforeShow(YsJsFunction::execute($show));
    return $jQueryObject;
  }
 
  public function returnHEXValueIn($hex = null){
    $jquery = $this->configureReturnValues($this, $hex);
    return $jquery;
  }
  
  public function returnHSBValuesIn($h, $s, $b){
    $jquery = $this->configureReturnValues($this,'', $h, $s, $b);
    return $this;
  }
  
  public function returnRGBValuesIn($r, $g, $b){
    $jquery = $this->configureReturnValues($this,'','','','',$r, $g, $b);
    return $this;
  }
  
  public function returnHSBAndRGBValuesIn($h, $s, $b, $r, $g, $b2){
    $jquery = $this->configureReturnValues($this,'', $h, $s, $b, $r, $g, $b2);
    return $this;
  }
  
  public function returnAllValuesIn($hex, $h, $s, $b, $r, $g, $b2){
    $jquery = $this->configureReturnValues($this,$hex, $h, $s, $b, $r, $g, $b2);
    return $this;
  }
  
  /**
   * Hide the widget
   * @return YsJQColorPicker 
   */
  public static function hidePicker(){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$HIDE);
    return $jquery;
  }
  
  /**
   * Show the widget
   * @return YsJQColorPicker 
   */
  public static function showPicker(){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$SHOW);
    return $jquery;
  }
  
  /**
   * If you want to set a new color.
   * @param string $color 
   * @return YsJQColorPicker 
   */
  public static function setColor($color){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$SET_COLOR);
    $jquery->addArgumentsBeforeOptions($color);
    return $jquery;
  }
  
}