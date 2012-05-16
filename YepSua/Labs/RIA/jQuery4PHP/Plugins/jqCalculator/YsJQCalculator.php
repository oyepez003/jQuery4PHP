<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQCalculator attaches a popup calculator to an input field
 * 
 * @method YsJQCalculator _decimalChar Character for the decimal point 
 * @method YsJQCalculator _buttonText Display text for trigger button 
 * @method YsJQCalculator _buttonStatus Status text for trigger button 
 * @method YsJQCalculator _closeText Display text for close link 
 * @method YsJQCalculator _closeStatus Status text for close link 
 * @method YsJQCalculator _useText Display text for use link 
 * @method YsJQCalculator _useStatus Status text for use link 
 * @method YsJQCalculator _eraseText Display text for erase link 
 * @method YsJQCalculator _eraseStatus Status text for erase link 
 * @method YsJQCalculator _backspaceText Display text for backspace link 
 * @method YsJQCalculator _backspaceStatus Status text for backspace link 
 * @method YsJQCalculator _clearErrorText Display text for clear error link 
 * @method YsJQCalculator _clearErrorStatus Status text for clear error link 
 * @method YsJQCalculator _clearText Display text for clear link 
 * @method YsJQCalculator _clearStatus Status text for clear link 
 * @method YsJQCalculator _memClearText Display text for memory clear link 
 * @method YsJQCalculator _memClearStatus Status text for memory clear link 
 * @method YsJQCalculator _memRecallText Display text for memory recall link 
 * @method YsJQCalculator _memRecallStatus Status text for memory recall link 
 * @method YsJQCalculator _memStoreText Display text for memory store link 
 * @method YsJQCalculator _memStoreStatus Status text for memory store link 
 * @method YsJQCalculator _memAddText Display text for memory add link 
 * @method YsJQCalculator _memAddStatus Status text for memory add link 
 * @method YsJQCalculator _memSubtractText Display text for memory subtract link 
 * @method YsJQCalculator _memSubtractStatus Status text for memory subtract link 
 * @method YsJQCalculator _base2Text Display text for base 2 link 
 * @method YsJQCalculator _base2Status Status text for base 2 link 
 * @method YsJQCalculator _base8Text Display text for base 8 link 
 * @method YsJQCalculator _base8Status Status text for base 8 link 
 * @method YsJQCalculator _base10Text Display text for base 10 link 
 * @method YsJQCalculator _base10Status Status text for base 10 link 
 * @method YsJQCalculator _base16Text Display text for base 16 link 
 * @method YsJQCalculator _base16Status Status text for base 16 link 
 * @method YsJQCalculator _degreesText Display text for degrees link 
 * @method YsJQCalculator _degreesStatus Status text for degrees link 
 * @method YsJQCalculator _radiansText Display text for radians link 
 * @method YsJQCalculator _radiansStatus Status text for radians link 
 * @method YsJQCalculator _isRTL True if right-to-left language, false if left-to-right 
     
 * @method YsJQCalculator _showOn 'focus' for popup on focus, 'button' for trigger button,'both' for either, 'operator' for non-numeric character entered, 'opbutton' for operator/button combination 
 * @method YsJQCalculator _buttonImage URL for trigger button image 
 * @method YsJQCalculator _buttonImageOnly True if the image appears alone, false if it appears on a button 
 * @method YsJQCalculator _isOperator Call back function to determine if a keystroke opens the calculator 
 * @method YsJQCalculator _showAnim Name of jQuery animation for popup 
 * @method YsJQCalculator _showOptions Options for enhanced animations 
 * @method YsJQCalculator _duration Duration of display/closure 
 * @method YsJQCalculator _appendText Display text following the input box, e.g. showing the format 
 * @method YsJQCalculator _useThemeRoller True to add ThemeRoller classes 
 * @method YsJQCalculator _calculatorClass Additional CSS class for the calculator for an instance 
 * @method YsJQCalculator _prompt Text across the top of the calculator 
 * @method YsJQCalculator _layout Layout of keys 
 * @method YsJQCalculator _value The initial value for inline calculators 
 * @method YsJQCalculator _base The numeric base for calculations 
 * @method YsJQCalculator _precision The number of digits of precision to use in rounding for display 
 * @method YsJQCalculator _memoryAsCookie True to save memory into cookie, false for memory only 
 * @method YsJQCalculator _cookieName Name of cookie for memory 
 * @method YsJQCalculator _cookieExpires The time that the memory cookie expires as a Date or number of seconds 
 * @method YsJQCalculator _cookiePath The path for the memory cookie 
 * @method YsJQCalculator _useDegrees True to use degress for trigonometric functions, false for radians 
 * @method YsJQCalculator _constrainInput True to restrict typed characters to numerics, false to allow anything 
 * @method YsJQCalculator _onOpen Define a callback function before the panel is opened 
 * @method YsJQCalculator _onButton Define a callback function when a button is activated 
 * @method YsJQCalculator _onClose A callback function when the panel is closed 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */

class YsJQCalculator extends YsJQueryPlugin {
  
  const VERSION = "";
  const LICENSE = "MIT and GPL licenses";
  
  public static $event = 'calculator';  
  
  public function registerOptions(){
    return   array(
                '_decimalChar' =>  array('key' => 'decimalChar', 'is_quoted' => false),
                '_buttonText' =>  array('key' => 'buttonText', 'is_quoted' => false),
                '_buttonStatus' =>  array('key' => 'buttonStatus', 'is_quoted' => false),
                '_closeText' =>  array('key' => 'closeText', 'is_quoted' => false),
                '_closeStatus' =>  array('key' => 'closeStatus', 'is_quoted' => false),
                '_useText' =>  array('key' => 'useText', 'is_quoted' => false),
                '_useStatus' =>  array('key' => 'useStatus', 'is_quoted' => false),
                '_eraseText' =>  array('key' => 'eraseText', 'is_quoted' => false),
                '_eraseStatus' =>  array('key' => 'eraseStatus', 'is_quoted' => false),
                '_backspaceText' =>  array('key' => 'backspaceText', 'is_quoted' => false),
                '_backspaceStatus' =>  array('key' => 'backspaceStatus', 'is_quoted' => false),
                '_clearErrorText' =>  array('key' => 'clearErrorText', 'is_quoted' => false),
                '_clearErrorStatus' =>  array('key' => 'clearErrorStatus', 'is_quoted' => false),
                '_clearText' =>  array('key' => 'clearText', 'is_quoted' => false),
                '_clearStatus' =>  array('key' => 'clearStatus', 'is_quoted' => false),
                '_memClearText' =>  array('key' => 'memClearText', 'is_quoted' => false),
                '_memClearStatus' =>  array('key' => 'memClearStatus', 'is_quoted' => false),
                '_memRecallText' =>  array('key' => 'memRecallText', 'is_quoted' => false),
                '_memRecallStatus' =>  array('key' => 'memRecallStatus', 'is_quoted' => false),
                '_memStoreText' =>  array('key' => 'memStoreText', 'is_quoted' => false),
                '_memStoreStatus' =>  array('key' => 'memStoreStatus', 'is_quoted' => false),
                '_memAddText' =>  array('key' => 'memAddText', 'is_quoted' => false),
                '_memAddStatus' =>  array('key' => 'memAddStatus', 'is_quoted' => false),
                '_memSubtractText' =>  array('key' => 'memSubtractText', 'is_quoted' => false),
                '_memSubtractStatus' =>  array('key' => 'memSubtractStatus', 'is_quoted' => false),
                '_base2Text' =>  array('key' => 'base2Text', 'is_quoted' => false),
                '_base2Status' =>  array('key' => 'base2Status', 'is_quoted' => false),
                '_base8Text' =>  array('key' => 'base8Text', 'is_quoted' => false),
                '_base8Status' =>  array('key' => 'base8Status', 'is_quoted' => false),
                '_base10Text' =>  array('key' => 'base10Text', 'is_quoted' => false),
                '_base10Status' =>  array('key' => 'base10Status', 'is_quoted' => false),
                '_base16Text' =>  array('key' => 'base16Text', 'is_quoted' => false),
                '_base16Status' =>  array('key' => 'base16Status', 'is_quoted' => false),
                '_degreesText' =>  array('key' => 'degreesText', 'is_quoted' => false),
                '_degreesStatus' =>  array('key' => 'degreesStatus', 'is_quoted' => false),
                '_radiansText' =>  array('key' => 'radiansText', 'is_quoted' => false),
                '_radiansStatus' =>  array('key' => 'radiansStatus', 'is_quoted' => false),
                '_isRTL' =>  array('key' => 'isRTL', 'is_quoted' => false),
                '_showOn' =>  array('key' => 'showOn', 'is_quoted' => false),
                '_buttonImage' =>  array('key' => 'buttonImage', 'is_quoted' => false),
                '_buttonImageOnly' =>  array('key' => 'buttonImageOnly', 'is_quoted' => false),
                '_isOperator' =>  array('key' => 'isOperator', 'is_quoted' => false),
                '_showAnim' =>  array('key' => 'showAnim', 'is_quoted' => false),
                '_showOptions' =>  array('key' => 'showOptions', 'is_quoted' => false),
                '_duration' =>  array('key' => 'duration', 'is_quoted' => false),
                '_appendText' =>  array('key' => 'appendText', 'is_quoted' => false),
                '_useThemeRoller' =>  array('key' => 'useThemeRoller', 'is_quoted' => false),
                '_calculatorClass' =>  array('key' => 'calculatorClass', 'is_quoted' => false),
                '_prompt' =>  array('key' => 'prompt', 'is_quoted' => false),
                '_layout' =>  array('key' => 'layout', 'is_quoted' => false),
                '_value' =>  array('key' => 'value', 'is_quoted' => false),
                '_base' =>  array('key' => 'base', 'is_quoted' => false),
                '_precision' =>  array('key' => 'precision', 'is_quoted' => false),
                '_memoryAsCookie' =>  array('key' => 'memoryAsCookie', 'is_quoted' => false),
                '_cookieName' =>  array('key' => 'cookieName', 'is_quoted' => false),
                '_cookieExpires' =>  array('key' => 'cookieExpires', 'is_quoted' => false),
                '_cookiePath' =>  array('key' => 'cookiePath', 'is_quoted' => false),
                '_useDegrees' =>  array('key' => 'useDegrees', 'is_quoted' => false),
                '_constrainInput' =>  array('key' => 'constrainInput', 'is_quoted' => false),
                '_onOpen' =>  array('key' => 'onOpen', 'is_quoted' => false),
                '_onButton' =>  array('key' => 'onButton', 'is_quoted' => false),
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
      $jquery->conditionNOT(YsJQuery::hasClass('hasCalculator')->in($jQuerySelector));
    }
    $jquery->_useThemeRoller(true);
    return $jquery;
  }
  
  public static function scientific($jQuerySelector = null){
    return self::buildWithLayout($jQuerySelector,'scientificLayout');
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