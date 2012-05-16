<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQKeypad Attaches a popup keyboard to a text field for mouse-driven entry 
 *            or adds an inline keypad in a division or span.
 *
 * @method YsJQKeypad _buttonText Display text for trigger button 
 * @method YsJQKeypad _buttonStatus Status text for trigger button 
 * @method YsJQKeypad _closeText Display text for close link 
 * @method YsJQKeypad _closeStatus Status text for close link 
 * @method YsJQKeypad _clearText Display text for clear link 
 * @method YsJQKeypad _clearStatus Status text for clear link 
 * @method YsJQKeypad _backText Display text for back link 
 * @method YsJQKeypad _backStatus Status text for back link 
 * @method YsJQKeypad _enterText Display text for carriage return 
 * @method YsJQKeypad _enterStatus Status text for carriage return 
 * @method YsJQKeypad _tabText Display text for tab 
 * @method YsJQKeypad _tabStatus Status text for tab 
 * @method YsJQKeypad _shiftText Display text for shift link 
 * @method YsJQKeypad _shiftStatus Status text for shift link 
 * @method YsJQKeypad _alphabeticLayout Default layout for alphabetic characters 
 * @method YsJQKeypad _fullLayout Default layout for full keyboard 
 * @method YsJQKeypad _isAlphabetic Function to determine if character is alphabetic 
 * @method YsJQKeypad _isNumeric Function to determine if character is numeric 
 * @method YsJQKeypad _isRTL false, True if right-to-left language, false if left-to-right 
 
 * @method YsJQKeypad _showOn 'focus' for popup on focus, 'button' for trigger button, or 'both' for either 
 * @method YsJQKeypad _buttonImage URL for trigger button image 
 * @method YsJQKeypad _buttonImageOnly True if the image appears alone, false if it appears on a button 
 * @method YsJQKeypad _showAnim Name of jQuery animation for popup 
 * @method YsJQKeypad _showOptions Options for enhanced animations 
 * @method YsJQKeypad _duration Duration of display/closure 
 * @method YsJQKeypad _appendText Display text following the input box, e.g. showing the format 
 * @method YsJQKeypad _useThemeRoller True to add ThemeRoller classes 
 * @method YsJQKeypad _keypadClass Additional CSS class for the keypad for an instance 
 * @method YsJQKeypad _prompt Display text at the top of the keypad 
 * @method YsJQKeypad _layout Layout of keys 
 * @method YsJQKeypad _separator Separator character between keys 
 * @method YsJQKeypad _target Input target for an inline keypad 
 * @method YsJQKeypad _keypadOnly True for entry only via the keypad, false for keyboard too 
 * @method YsJQKeypad _randomiseAlphabetic True to randomise the alphabetic key positions, false to keep in order 
 * @method YsJQKeypad _randomiseNumeric True to randomise the numeric key positions, false to keep in order 
 * @method YsJQKeypad _randomiseOther True to randomise the other key positions, false to keep in order 
 * @method YsJQKeypad _randomiseAll True to randomise all key positions, false to keep in order 
 * @method YsJQKeypad _beforeShow Callback before showing the keypad 
 * @method YsJQKeypad _onKeypress Define a callback function when a key is selected 
 * @method YsJQKeypad _onClose A callback function when the panel is closed 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQKeypad extends YsJQueryPlugin {
  
  const VERSION = "";  
  const LICENSE = "MIT and GPL licenses";
  
  public static $event = 'keypad';
  
  public function registerOptions(){
    return   array(
              //options
               '_buttonText' =>  array('key' => 'buttonText', 'is_quoted' => false),
               '_buttonStatus' =>  array('key' => 'buttonStatus', 'is_quoted' => false),
               '_closeText' =>  array('key' => 'closeText', 'is_quoted' => false),
               '_closeStatus' =>  array('key' => 'closeStatus', 'is_quoted' => false),
               '_clearText' =>  array('key' => 'clearText', 'is_quoted' => false),
               '_clearStatus' =>  array('key' => 'clearStatus', 'is_quoted' => false),
               '_backText' =>  array('key' => 'backText', 'is_quoted' => false),
               '_backStatus' =>  array('key' => 'backStatus', 'is_quoted' => false),
               '_enterText' =>  array('key' => 'enterText', 'is_quoted' => false),
               '_enterStatus' =>  array('key' => 'enterStatus', 'is_quoted' => false),
               '_tabText' =>  array('key' => 'tabText', 'is_quoted' => false),
               '_tabStatus' =>  array('key' => 'tabStatus', 'is_quoted' => false),
               '_shiftText' =>  array('key' => 'shiftText', 'is_quoted' => false),
               '_shiftStatus' =>  array('key' => 'shiftStatus', 'is_quoted' => false),
               '_alphabeticLayout' =>  array('key' => 'alphabeticLayout', 'is_quoted' => false),
               '_fullLayout' =>  array('key' => 'fullLayout', 'is_quoted' => false),
               '_isAlphabetic' =>  array('key' => 'isAlphabetic', 'is_quoted' => false),
               '_isNumeric' =>  array('key' => 'isNumeric', 'is_quoted' => false),
               '_isRTL' =>  array('key' => 'isRTL', 'is_quoted' => false),
               '_showOn' =>  array('key' => 'showOn', 'is_quoted' => false),
               '_buttonImage' =>  array('key' => 'buttonImage', 'is_quoted' => false),
               '_buttonImageOnly' =>  array('key' => 'buttonImageOnly', 'is_quoted' => false),
               '_showAnim' =>  array('key' => 'showAnim', 'is_quoted' => false),
               '_showOptions' =>  array('key' => 'showOptions', 'is_quoted' => false),
               '_duration' =>  array('key' => 'duration', 'is_quoted' => false),
               '_appendText' =>  array('key' => 'appendText', 'is_quoted' => false),
               '_useThemeRoller' =>  array('key' => 'useThemeRoller', 'is_quoted' => false),
               '_keypadClass' =>  array('key' => 'keypadClass', 'is_quoted' => false),
               '_prompt' =>  array('key' => 'prompt', 'is_quoted' => false),
               '_layout' =>  array('key' => 'layout', 'is_quoted' => false),
               '_separator' =>  array('key' => 'separator', 'is_quoted' => false),
               '_target' =>  array('key' => 'target', 'is_quoted' => false),
               '_keypadOnly' =>  array('key' => 'keypadOnly', 'is_quoted' => false),
               '_randomiseAlphabetic' =>  array('key' => 'randomiseAlphabetic', 'is_quoted' => false),
               '_randomiseNumeric' =>  array('key' => 'randomiseNumeric', 'is_quoted' => false),
               '_randomiseOther' =>  array('key' => 'randomiseOther', 'is_quoted' => false),
               '_randomiseAll' =>  array('key' => 'randomiseAll', 'is_quoted' => false),
               '_beforeShow' =>  array('key' => 'beforeShow', 'is_quoted' => false),
               '_onKeypress' =>  array('key' => 'onKeypress', 'is_quoted' => false),
               '_onClose' =>  array('key' => 'onClose', 'is_quoted' => false),        
              );
  }
  
  /**
   * Retrieves a instance of this class.
   * @return YsJQKeypad
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  public static function build($jQuerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($jQuerySelector !== null){
      $jquery->in($jQuerySelector);
      $jquery->conditionNOT(YsJQuery::hasClass('hasKeypad')->in($jQuerySelector));
    }
    $jquery->_useThemeRoller(true);
    return $jquery;
  }
  
  public static function qwerty($jQuerySelector = null){
    return self::buildWithLayout($jQuerySelector,'qwertyLayout');
  }
  
  public static function alphabetic($jQuerySelector = null){
    return self::buildWithLayout($jQuerySelector,'qwertyAlphabetic');
  }
  
  private static function buildWithLayout($jQuerySelector, $layout){
    $jquery = self::build($jQuerySelector);
    $jquery->_layout(YsArgument::value(self::getLayout($layout)));
    return $jquery;
  }

  private static function getLayout($layout){
    return sprintf('%s.%s.%s',self::$jqueryVar,self::$event,$layout);
  }
  
  public function _customLayout($args){
    $layouts = func_get_args();
    $layouts = (is_array($layouts[0])) ? $layouts[0] : $layouts;
    return $this->_layout($layouts);
  }
  
  public function _customLayoutVars($args){
    $layouts = func_get_args();
    $layouts = (is_array($layouts[0])) ? $layouts[0] : $layouts;
    $layoutVars = array();
    $i=0;
    foreach($layouts as $layout){
      $layoutVars[$i++] = YsArgument::value($layout);
    }
    return $this->_layout($layoutVars);
  }
    
  public static function destroyMethod($jQuerySelector = null){
    return self::callJQueryMethodIn($jQuerySelector,self::$event,'destroy');
  }
  
  public static function show($jQuerySelector = null){
    return self::callJQueryMethodIn($jQuerySelector,self::$event,'show');
  }
  
  public static function hide($jQuerySelector = null){
    return self::callJQueryMethodIn($jQuerySelector,self::$event,'hide');
  }
  
  public static function enable($jQuerySelector = null){
    return self::callJQueryMethodIn($jQuerySelector,self::$event,'enable');
  }
  
  public static function disable($jQuerySelector = null){
    return self::callJQueryMethodIn($jQuerySelector,self::$event,'disable');
  }
  
  public static function isDisabled($jQuerySelector = null){
    return self::callJQueryMethodIn($jQuerySelector,self::$event,'isDisabled');
  }
  
  public static function change($jQuerySelector = null,$settingsOrName=null,$value=null){
    return self::callJQueryMethodIn($jQuerySelector,self::$event,'change',$settingsOrName,$value);
  }
  
  public static function setValue($input,$value){
    return self::callJQueryMethod(sprintf('%s.%s',self::$event,'insertValue'),$input,$value);
  }
  
  public static function isAlphabetic($value){
    return self::callJQueryMethod(sprintf('%s.%s',self::$event,'isAlphabetic'),$value);
  }
  
  public static function isNumeric($value){
    return self::callJQueryMethod(sprintf('%s.%s',self::$event,'isNumeric'),$value);
  }
  
  public function _showOnButton(){
    return $this->_showOn('button');
  }
  
  public function _showOnBoth(){
    return $this->_showOn('both');
  }
}