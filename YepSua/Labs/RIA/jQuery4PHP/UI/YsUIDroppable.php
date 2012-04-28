<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIDroppable Enable any DOM element to be droppable, a target for draggable
 * elements.
 * 
 * @method YsUIDroppable _disabled Disables (true) or enables (false) the droppable
 * @method YsUIDroppable _accept All draggables that match the selector will be accepted
 * @method YsUIDroppable _activeClass If specified, the class will be added to the droppable while an acceptable draggable is being dragged.
 * @method YsUIDroppable _addClasses If set to false, will prevent the ui-droppable class from being added.
 * @method YsUIDroppable _greedy If true, will prevent event propagation on nested droppables.
 * @method YsUIDroppable _hoverClass If specified, the class will be added to the droppable while an acceptable draggable is being hovered.
 * @method YsUIDroppable _scope Used to group sets of draggable and droppable items, in addition to droppable's accept option. 
 * @method YsUIDroppable _tolerance Specifies which mode to use for testing whether a draggable is 'over' a droppable. Possible values: 'fit', 'intersect', 'pointer', 'touch'. 
 * @method YsUIDroppable _create This event is triggered when droppable is created.
 * @method YsUIDroppable _activate This event is triggered any time an accepted draggable starts dragging.
 * @method YsUIDroppable _deactivate This event is triggered any time an accepted draggable stops dragging.
 * @method YsUIDroppable _over This event is triggered as an accepted draggable is dragged 'over' (within the tolerance of) this droppable.
 * @method YsUIDroppable _out This event is triggered when an accepted draggable is dragged out (within the tolerance of) this droppable.
 * @method YsUIDroppable _drop This event is triggered when an accepted draggable is dropped 'over' (within the tolerance of) this droppable.
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIDroppable extends YsUICore {

  public static $uiEvent = YsUIConstant::DROPPABLE_INTERACTION;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_accept' =>  array('key' => 'accept', 'is_quoted' => false)
              ,'_activeClass' =>  array('key' => 'activeClass', 'is_quoted' => false)
              ,'_addClasses' =>  array('key' => 'addClasses', 'is_quoted' => false)
              ,'_greedy' =>  array('key' => 'greedy', 'is_quoted' => false)
              ,'_hoverClass' =>  array('key' => 'hoverClass', 'is_quoted' => false)
              ,'_scope' =>  array('key' => 'scope', 'is_quoted' => false)
              ,'_tolerance' =>  array('key' => 'tolerance', 'is_quoted' => false)
               // events
              ,'_create' => array('key' => 'create', 'is_quoted' => false)
              ,'_activate' => array('key' => 'activate', 'is_quoted' => false)
              ,'_deactivate' => array('key' => 'deactivate', 'is_quoted' => false)
              ,'_over' => array('key' => 'over', 'is_quoted' => false)
              ,'_out' => array('key' => 'out', 'is_quoted' => false)
              ,'_drop' => array('key' => 'drop', 'is_quoted' => false));
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
  * @return YsUIDroppable
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  // BUILDER

  /**
   * Build the jQuery sintax to enable droppable functionality on any DOM
   * element
   * @param string $jquerySelector A jQuery selector
   * @return YsUIDroppable
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }
  
}