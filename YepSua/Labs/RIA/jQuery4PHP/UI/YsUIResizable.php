<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIResizable Enable any DOM element to be resizable. With the cursor grab
 * the right or bottom border and drag to the desired width or height.
 *
 * @method YsUIResizable _disabled Disables (true) or enables (false) the resizable.
 * @method YsUIResizable _alsoResize Resize these elements synchronous when resizing.
 * @method YsUIResizable _animate Animates to the final size after resizing.
 * @method YsUIResizable _animateDuration Duration time for animating, in milliseconds. Other possible values: 'slow', 'normal', 'fast'.
 * @method YsUIResizable _animateEasing Easing effect for animating.
 * @method YsUIResizable _aspectRatio If set to true, resizing is constrained by the original aspect ratio. Otherwise a custom aspect ratio can be specified, such as 9 / 16, or 0.5.
 * @method YsUIResizable _autoHide If set to true, automatically hides the handles except when the mouse hovers over the element.
 * @method YsUIResizable _cancel Prevents resizing if you start on elements matching the selector.
 * @method YsUIResizable _containment Constrains resizing to within the bounds of the specified element.
 * @method YsUIResizable _delay Tolerance, in milliseconds, for when resizing should start. If specified, resizing will not start until after mouse is moved beyond duration.
 * @method YsUIResizable _distance Tolerance, in pixels, for when resizing should start. If specified, resizing will not start until after mouse is moved beyond distance.
 * @method YsUIResizable _ghost If set to true, a semi-transparent helper element is shown for resizing.
 * @method YsUIResizable _grid Snaps the resizing element to a grid, every x and y pixels. Array values: [x, y]
 * @method YsUIResizable _handles If specified as a string, should be a comma-split list of any of the following: 'n, e, s, w, ne, se, sw, nw, all'.
 * @method YsUIResizable _helper This is the css class that will be added to a proxy element to outline the resize during the drag of the resize handle.
 * @method YsUIResizable _maxHeight This is the maximum height the resizable should be allowed to resize to.
 * @method YsUIResizable _maxWidth This is the maximum width the resizable should be allowed to resize to.
 * @method YsUIResizable _minHeight This is the minimum height the resizable should be allowed to resize to.
 * @method YsUIResizable _minWidth This is the minimum width the resizable should be allowed to resize to.
 * @method YsUIResizable _create This event is triggered when resizable is created.
 * @method YsUIResizable _start This event is triggered at the start of a resize operation.
 * @method YsUIResizable _resize This event is triggered during the resize, on the drag of the resize handler.
 * @method YsUIResizable _stop This event is triggered at the end of a resize operation.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIResizable extends YsUICore {

  public static $uiEvent = YsUIConstant::RESIZABLE_INTERACTION;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_alsoResize' =>  array('key' => 'alsoResize', 'is_quoted' => false)
              ,'_animate' =>  array('key' => 'animate', 'is_quoted' => false)
              ,'_animateDuration' =>  array('key' => 'animateDuration', 'is_quoted' => false)
              ,'_animateEasing' =>  array('key' => 'animateEasing', 'is_quoted' => false)
              ,'_aspectRatio' =>  array('key' => 'aspectRatio', 'is_quoted' => false)
              ,'_autoHide' =>  array('key' => 'autoHide', 'is_quoted' => false)
              ,'_cancel' =>  array('key' => 'cancel', 'is_quoted' => false)
              ,'_containment' =>  array('key' => 'containment', 'is_quoted' => false)
              ,'_delay' =>  array('key' => 'delay', 'is_quoted' => false)
              ,'_distance' =>  array('key' => 'distance', 'is_quoted' => false)
              ,'_ghost' =>  array('key' => 'ghost', 'is_quoted' => false)
              ,'_grid' =>  array('key' => 'grid', 'is_quoted' => false)
              ,'_handles' =>  array('key' => 'handles', 'is_quoted' => false)
              ,'_helper' =>  array('key' => 'helper', 'is_quoted' => false)
              ,'_maxHeight' =>  array('key' => 'maxHeight', 'is_quoted' => false)
              ,'_maxWidth' =>  array('key' => 'maxWidth', 'is_quoted' => false)
              ,'_minHeight' =>  array('key' => 'minHeight', 'is_quoted' => false)
              ,'_minWidth' =>  array('key' => 'minWidth', 'is_quoted' => false)
                // events
              ,'_create' => array('key' => 'create', 'is_quoted' => false)
              ,'_start' => array('key' => 'start', 'is_quoted' => false)
              ,'_resize' => array('key' => 'resize', 'is_quoted' => false)
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
  * @return YsUIResizable
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  // BUILDER

  /**
   * Build the jQuery sintax to enable resizable functionality on any DOM
   * element
   * @param string $jquerySelector A jQuery selector
   * @return YsUIResizable
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }
 
  
}