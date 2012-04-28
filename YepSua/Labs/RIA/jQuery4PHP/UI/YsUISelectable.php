<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUISelectable Enable a DOM element (or group of elements) to be selectable.
 * Draw a box with your cursor to select items. Hold down the Ctrl key to make
 * multiple non-adjacent selections.
 * 
 * @method YsUISelectable _disabled Disables (true) or enables (false) the selectable. 
 * @method YsUISelectable _autoRefresh This determines whether to refresh (recalculate) the position and size of each selectee at the beginning of each select operation.
 * @method YsUISelectable _cancel Prevents selecting if you start on elements matching the selector.
 * @method YsUISelectable _delay Time in milliseconds to define when the selecting should start. It helps preventing unwanted selections when clicking on an element.
 * @method YsUISelectable _distance Tolerance, in pixels, for when selecting should start. If specified, selecting will not start until after mouse is dragged beyond distance.
 * @method YsUISelectable _filter The matching child elements will be made selectees (able to be selected).
 * @method YsUISelectable _tolerance Possible values: 'touch', 'fit'. 
 * @method YsUISelectable _create This event is triggered when selectable is created.
 * @method YsUISelectable _selected This event is triggered at the end of the select operation, on each element added to the selection.
 * @method YsUISelectable _selecting This event is triggered during the select operation, on each element added to the selection.
 * @method YsUISelectable _start This event is triggered at the beginning of the select operation.
 * @method YsUISelectable _stop This event is triggered at the end of the select operation.
 * @method YsUISelectable _unselected This event is triggered at the end of the select operation, on each element removed from the selection.
 * @method YsUISelectable _unselecting This event is triggered during the select operation, on each element removed from the selection.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUISelectable extends YsUICore {

  public static $uiEvent = YsUIConstant::SELECTABLE_INTERACTION;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_autoRefresh' =>  array('key' => 'autoRefresh', 'is_quoted' => false)
              ,'_cancel' =>  array('key' => 'cancel', 'is_quoted' => false)
              ,'_delay' =>  array('key' => 'delay', 'is_quoted' => false)
              ,'_distance' =>  array('key' => 'distance', 'is_quoted' => false)
              ,'_filter' =>  array('key' => 'filter', 'is_quoted' => false)
              ,'_tolerance' =>  array('key' => 'tolerance', 'is_quoted' => false)
               // events
              ,'_create' => array('key' => 'create', 'is_quoted' => false)
              ,'_selected' => array('key' => 'selected', 'is_quoted' => false)
              ,'_selecting' => array('key' => 'selecting', 'is_quoted' => false)
              ,'_start' => array('key' => 'start', 'is_quoted' => false)
              ,'_stop' => array('key' => 'stop', 'is_quoted' => false)
              ,'_unselected' => array('key' => 'unselected', 'is_quoted' => false)
              ,'_unselecting' => array('key' => 'unselecting', 'is_quoted' => false));
  }

  /**
   * Remove the autocomplete functionality completely.
   * This will return the element back to its pre-init state.
   * @param string $jquerySelector A jQuery selector
   * @return YsUICore
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
   * @return YsUICore
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
   * @return YsUICore
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
   * @return YsUICore
   */
  public static function option($jquerySelector, $value = null)
  {
    $staticMethod = YsUIConstant::OPTION_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::$staticMethod($jquerySelector, $value);
  }

  /**
   * Return the widget element
   * @param string $jquerySelector A jQuery selector
   * @return YsUICore
   */
  public static function widget($jquerySelector = null)
  {
    $staticMethod = YsUIConstant::WIDGET_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::$staticMethod($jquerySelector);
  }

  /**
  * Retrieves a instance of this class.
  * @return YsUISelectable
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  // BUILDER
  
  /**
   * Build the jQuery sintax to enable selectable functionality on any DOM
   * element
   * @param string $jquerySelector A jQuery selector
   * @return YsUISelectable
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  //WIDGET METHODS

  /**
   * Refresh the position and size of each selectee element.
   * This method can be used to manually recalculate the position and size
   * of each selectee element. Very useful if autoRefresh is set to false.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function refresh($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::REFRESH_METHOD));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }
 
  
}