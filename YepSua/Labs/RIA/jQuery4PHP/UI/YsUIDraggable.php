<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIDraggable Enable draggable functionality on any DOM element.
 * Move the draggable object by clicking on it with the mouse and dragging it
 * anywhere within the viewport.
 * 
 * @method YsUIDraggable _disabled Disables (true) or enables (false) the draggable.
 * @method YsUIDraggable _addClasses If set to false, will prevent the ui-draggable class from being added.
 * @method YsUIDraggable _appendTo The element passed to or selected by the appendTo option will be used as the draggable helper's container during dragging.
 * @method YsUIDraggable _axis Constrains dragging to either the horizontal (x) or vertical (y) axis.
 * @method YsUIDraggable _cancel Prevents dragging from starting on specified elements.
 * @method YsUIDraggable _connectToSortable Allows the draggable to be dropped onto the specified sortables.
 * @method YsUIDraggable _containment Allows the draggable to be dropped onto the specified sortables.
 * @method YsUIDraggable _cursor The css cursor during the drag operation.
 * @method YsUIDraggable _cursorAt Sets the offset of the dragging helper relative to the mouse cursor.
 * @method YsUIDraggable _delay Time in milliseconds after mousedown until dragging should start.
 * @method YsUIDraggable _distance Distance in pixels after mousedown the mouse must move before dragging should start.
 * @method YsUIDraggable _grid Snaps the dragging helper to a grid, every x and y pixels. Array values: [x, y]
 * @method YsUIDraggable _handle If specified, restricts drag start click to the specified element(s).
 * @method YsUIDraggable _helper Allows for a helper element to be used for dragging display. Possible values: 'original', 'clone'.
 * @method YsUIDraggable _iframeFix Prevent iframes from capturing the mousemove events during a drag
 * @method YsUIDraggable _opacity Opacity for the helper while being dragged.
 * @method YsUIDraggable _refreshPositions If set to true, all droppable positions are calculated on every mousemove.
 * @method YsUIDraggable _revert If set to true, the element will return to its start position when dragging stops. Possible string values: 'valid', 'invalid'
 * @method YsUIDraggable _revertDuration The duration of the revert animation, in milliseconds. Ignored if revert is false.
 * @method YsUIDraggable _scope Used to group sets of draggable and droppable items, in addition to droppable's accept option.
 * @method YsUIDraggable _scroll If set to true, container auto-scrolls while dragging.
 * @method YsUIDraggable _scrollSensitivity Distance in pixels from the edge of the viewport after which the viewport should scroll. Distance is relative to pointer, not the draggable.
 * @method YsUIDraggable _scrollSpeed The speed at which the window should scroll once the mouse pointer gets within the scrollSensitivity distance.
 * @method YsUIDraggable _snap The speed at which the window should scroll once the mouse pointer gets within the scrollSensitivity distance.
 * @method YsUIDraggable _snapMode Determines which edges of snap elements the draggable will snap to. Ignored if snap is false. Possible values: 'inner', 'outer', 'both'
 * @method YsUIDraggable _snapTolerance The distance in pixels from the snap element edges at which snapping should occur. Ignored if snap is false.
 * @method YsUIDraggable _stack Controls the z-Index of the set of elements that match the selector, always brings to front the dragged item. Very useful in things like window managers.
 * @method YsUIDraggable _zIndex z-index for the helper while being dragged.
 * @method YsUIDraggable _create This event is triggered when draggable is created.
 * @method YsUIDraggable _start This event is triggered when dragging starts.
 * @method YsUIDraggable _drag This event is triggered when the mouse is moved during the dragging.
 * @method YsUIDraggable _stop This event is triggered when dragging stops.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIDraggable extends YsUICore {

  public static $uiEvent = YsUIConstant::DRAGGABLE_INTERACTION;

  /**
   * @return array options and events for this functionality
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_addClasses' =>  array('key' => 'addClasses', 'is_quoted' => false)
              ,'_appendTo' =>  array('key' => 'appendTo', 'is_quoted' => false)
              ,'_axis' =>  array('key' => 'axis', 'is_quoted' => false)
              ,'_cancel' =>  array('key' => 'cancel', 'is_quoted' => false)
              ,'_connectToSortable' =>  array('key' => 'connectToSortable', 'is_quoted' => false)
              ,'_containment' =>  array('key' => 'containment', 'is_quoted' => false)
              ,'_cursor' =>  array('key' => 'cursor', 'is_quoted' => false)
              ,'_cursorAt' =>  array('key' => 'cursorAt', 'is_quoted' => false)
              ,'_delay' =>  array('key' => 'delay', 'is_quoted' => false)
              ,'_distance' =>  array('key' => 'distance', 'is_quoted' => false)
              ,'_grid' =>  array('key' => 'grid', 'is_quoted' => false)
              ,'_handle' =>  array('key' => 'handle', 'is_quoted' => false)
              ,'_helper' =>  array('key' => 'helper', 'is_quoted' => false)
              ,'_iframeFix' =>  array('key' => 'iframeFix', 'is_quoted' => false)
              ,'_opacity' =>  array('key' => 'opacity', 'is_quoted' => false)
              ,'_refreshPositions' =>  array('key' => 'refreshPositions', 'is_quoted' => false)
              ,'_revert' =>  array('key' => 'revert', 'is_quoted' => false)
              ,'_revertDuration' =>  array('key' => 'revertDuration', 'is_quoted' => false)
              ,'_scope' =>  array('key' => 'scope', 'is_quoted' => false)
              ,'_scroll' =>  array('key' => 'scroll', 'is_quoted' => false)
              ,'_scrollSensitivity' =>  array('key' => 'scrollSensitivity', 'is_quoted' => false)
              ,'_scrollSpeed' =>  array('key' => 'scrollSpeed', 'is_quoted' => false)
              ,'_snap' =>  array('key' => 'snap', 'is_quoted' => false)
              ,'_snapMode' =>  array('key' => 'snapMode', 'is_quoted' => false)
              ,'_snapTolerance' =>  array('key' => 'snapTolerance', 'is_quoted' => false)
              ,'_stack' =>  array('key' => 'stack', 'is_quoted' => false)
              ,'_zIndex' =>  array('key' => 'zIndex', 'is_quoted' => false)
               // events
              ,'_create' =>  array('key' => 'create', 'is_quoted' => false)
              ,'_start' => array('key' => 'start', 'is_quoted' => false)
              ,'_drag' => array('key' => 'drag', 'is_quoted' => false)
              ,'_stop' => array('key' => 'stop', 'is_quoted' => false)
               );
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
  * @return YsUIDraggable
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  // BUILDER

  /**
   * Build the jQuery sintax to enable draggable functionality on any DOM
   * element
   * @param string $jquerySelector A jQuery selector
   * @return YsUIDraggable
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }
 
}