<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIPopUp todo description.
 * 
 * @method YsUIPopUp _autoHide Determines whether to automatically hide the popup when clicking outside the element.
 * @method YsUIPopUp _ensureOutermost Determines if the element's parent element is the outermost element. If true, the element's parent element will be changed to the body or outermost form element.
 * @method YsUIPopUp _hideDuration Defines how long (in milliseconds) the animation duration for hiding the popup will last.
 * @method YsUIPopUp _hideEffect Specified the object/hash including specific options for the hide effect.
 * @method YsUIPopUp _position Options for positioning the element, please see jquery.ui.position for possible options.
 * @method YsUIPopUp _showDuration Defines how long (in milliseconds) the animation duration for showing the popup will last.
 * @method YsUIPopUp _showEffect Specifies the effect to be used when the popup is shown.
 * @method YsUIPopUp _showOptions Specifies the object/hash including specific options for the show effect.

 * @method YsUIPopUp _hidden The hidden event handler.
 * @method YsUIPopUp _hiding The hiding event handler.
 * @method YsUIPopUp _posChanged The posChanged event handler.
 * @method YsUIPopUp _showing The showing event handler.
 * @method YsUIPopUp _shown The shown event handler.
 * 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIPopUp extends YsUICore {

  public static $uiEvent = YsUIConstant::POPUP_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_autoHide' =>  array('key' => 'autoHide', 'is_quoted' => false)
              ,'_ensureOutermost' =>  array('key' => 'ensureOutermost', 'is_quoted' => false)
              ,'_hideDuration' =>  array('key' => 'hideDuration', 'is_quoted' => false)
              ,'_hideEffect' =>  array('key' => 'hideEffect', 'is_quoted' => false)
              ,'_position' =>  array('key' => 'position', 'is_quoted' => true)
              ,'_showDuration' =>  array('key' => 'showDuration', 'is_quoted' => false)
              ,'_showEffect' =>  array('key' => 'showEffect', 'is_quoted' => false)
              ,'_showOptions' =>  array('key' => 'showOptions', 'is_quoted' => false)
               // events
               ,'_hidden' => array('key' => 'hidden', 'is_quoted' => false)
               ,'_hiding' => array('key' => 'hiding', 'is_quoted' => false)
               ,'_posChanged' => array('key' => 'posChanged', 'is_quoted' => false)
               ,'_showing' => array('key' => 'showing', 'is_quoted' => false)
               ,'_shown' => array('key' => 'shown', 'is_quoted' => false)
               );
  }

  /**
   * Remove the autocomplete functionality completely.
   * This will return the element back to its pre-init state.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function destroyMethod($jquerySelector = null)
  {
    $staticMethod = YsUIConstant::DESTROY_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::destroyMethod($jquerySelector);
  }

  /**
   * Disable the functionality.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function disable($jquerySelector = null)
  {
    $staticMethod = YsUIConstant::DISABLE_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::$staticMethod($jquerySelector);
  }

  /**
   * Enable the functionality.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function enable($jquerySelector = null)
  {
    $staticMethod = YsUIConstant::ENABLE_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::$staticMethod($jquerySelector);
  }

  /**
   * Get or set any option.
   * If no value is specified, will act as a getter.
   * @param string/array $optionName The option name or a map(array) options
   * @param any $value The option value
   * @return object YsJQueryCore
   */
  public static function option($optionName, $value = null)
  {
    $staticMethod = YsUIConstant::OPTION_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::$staticMethod($optionName, $value);
  }

  /**
   * Return the widget element
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function widget($jquerySelector = null)
  {
    $staticMethod = YsUIConstant::WIDGET_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::$staticMethod($jquerySelector);
  }

  /**
  * Retrieves a instance of this class.
  * @return YsUIPopUp
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  // BUILDER

  /**
   * Build the jQuery sintax to create this widget.
   * @param string $jquerySelector A jQuery selector
   * @return YsUIPopUp
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  //WIDGET METHODS

  /**
   * Hides the element.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function hide($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::HIDE_METHOD);
  }
 
  /**
   * Determines whether the element is visible.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function isVisible($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'isVisible');
  }
  
  /**
   * Pops up the element.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function show($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::SHOW_METHOD);
  }
  
  /**
   * Pops up the element at specified absolute position related to document.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function showAt($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'showAt');
  }
}