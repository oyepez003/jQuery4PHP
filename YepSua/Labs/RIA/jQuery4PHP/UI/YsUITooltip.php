<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUITooltip todo description.
 * 
 * @method YsUITooltip _disabled
 * @method YsUITooltip _animate
 * @method YsUITooltip _max
 * @method YsUITooltip _min
 * @method YsUITooltip _orientation
 * @method YsUITooltip _range
 * @method YsUITooltip _step
 * @method YsUITooltip _value
 * @method YsUITooltip _values
 * @method YsUITooltip _start
 * @method YsUITooltip _slide
 * @method YsUITooltip _change
 * @method YsUITooltip _stop
 * 
 * WIJMO SUPPORT
 * 
 * @method YsUITooltip _animation Sets the showAnimation and hideAnimation options if they are not specified individually.
 * @method YsUITooltip _ajaxCallback A function that defines a callback when AJAX is used to set the content property.
 * @method YsUITooltip _closeBehavior Determines how to close the tooltip. Behaviors include auto or sticky.
 * @method YsUITooltip _group Determines which group the tooltip belongs to.
 * @method YsUITooltip _mouseTrailing If true, then the tooltip moves with the mouse.
 * @method YsUITooltip _position Sets the tooltip's position mode in relation to the 'relativeTo', 'offsetX', and 'offsetY' properties.
 * @method YsUITooltip _showCallOut Determines whether to show the callout element.
 * @method YsUITooltip _showAnimation Determines the animation effect that will be shown.
 * @method YsUITooltip _hideAnimation Determines whether the animation effect can be seen.
 * @method YsUITooltip _showDelay Determines the length of the delay before the tooltip appears.
 * @method YsUITooltip _hideDelay Determines the length of the delay before the tooltip disappears.
 * @method YsUITooltip _calloutAnimation Sets the callout's offset changing animation.
 * @method YsUITooltip _calloutFilled Determines the callout's class style. If true, then the callout triangle will be filled.
 * @method YsUITooltip _triggers Sets the event that will cause the tooltip to appear.
 * @method YsUITooltip _content Sets the tooltip's content.
 * @method YsUITooltip _title Specifies a value that sets the tooltip’s title.
 * 
 * @method YsUITooltip _showingToolTip Triggered before showing the tooltip.
 * @method YsUITooltip _shownTooltip  Triggered once the tooltip has appeared.
 * @method YsUITooltip _hidingTooltip  Triggered before hiding the tooltip. If data.cancel is set to true, then the tooltip is no longer hidden.
 * @method YsUITooltip _hiddenTooltip  Triggered once the tooltip is hidden.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUITooltip extends YsUICore {

  public static $uiEvent = YsUIConstant::TOOLTIP_WIDGET;
  public static $BEHAVIOR_NONE = 'none';
  public static $BEHAVIOR_AUTO = 'auto';
  public static $BEHAVIOR_STICKY = 'sticky';
  
  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options

               //wijmo
                '_animation' => array('key' => 'animation', 'is_quoted' => false)
               ,'_ajaxCallback' => array('key' => 'ajaxCallback', 'is_quoted' => false)
               ,'_closeBehavior' => array('key' => 'closeBehavior', 'is_quoted' => false)
               ,'_group' => array('key' => 'group', 'is_quoted' => false)
               ,'_mouseTrailing' => array('key' => 'mouseTrailing', 'is_quoted' => false)
               ,'_position' => array('key' => 'position', 'is_quoted' => false)
               ,'_showCallOut' => array('key' => 'showCallOut', 'is_quoted' => false)
               ,'_showAnimation' => array('key' => 'showAnimation', 'is_quoted' => false)
               ,'_hideAnimation' => array('key' => 'hideAnimation', 'is_quoted' => false)
               ,'_showDelay' => array('key' => 'showDelay', 'is_quoted' => false)
               ,'_hideDelay' => array('key' => 'hideDelay', 'is_quoted' => false)
               ,'_calloutFilled' => array('key' => 'calloutFilled', 'is_quoted' => false)
               ,'_triggers' => array('key' => 'triggers', 'is_quoted' => false)
               ,'_content' => array('key' => 'content', 'is_quoted' => false)
               ,'_title' => array('key' => 'title', 'is_quoted' => false)
               ,'_showingToolTip' => array('key' => 'showing.toolTip', 'is_quoted' => false)
               ,'_shownToolTip' => array('key' => 'shown.toolTip', 'is_quoted' => false)
               ,'_hidingToolTip' => array('key' => 'hiding.toolTip', 'is_quoted' => false)
               ,'_hiddenToolTip' => array('key' => 'title.toolTip', 'is_quoted' => false)        
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
  * @return YsUITooltip
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
   * @return YsUITooltip
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  //WIDGET METHODS
  
  
  /**
   * Shows the tooltip.
   * @param string $jquerySelector A jQuery selector
   * @return YsUITooltip
   */
  public static function show($jquerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::SHOW_METHOD);
  }
  
  /**
   * Hides the tooltip.
   * @param string $jquerySelector A jQuery selector
   * @return YsUITooltip
   */
  public static function hide($jquerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::HIDE_METHOD);
  }
  
}