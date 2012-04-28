<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIMenu todo description.
 * 
 * @method YsUIMenu _trigger Specifies the event used to show the menu.
 * @method YsUIMenu _triggerEvent Specifies the event used to show the menu.
 * @method YsUIMenu _position Specifies the location and orientation of the menu relative to the button or link used to open it.
 * @method YsUIMenu _animation Sets the showAnimation and hideAnimation options if they are not specified individually.
 * @method YsUIMenu _showAnimation Determines the animation used to show submenus.
 * @method YsUIMenu _hideAnimation Determines the animation used to hide submenus.
 * @method YsUIMenu _slidingAnimation Defines the animation used to slide a submenu in sliding mode.
 * @method YsUIMenu _mode Defines the behavior of the submenu whether it is a popup menu or an iPod-style navigation list.  Possible values are "flyout" or "sliding".
 * @method YsUIMenu _superPanelOptions This option specifies a hash value that sets to superpanel options when a superpanel is created.
 * @method YsUIMenu _checkable Defines whether the item can be checked.
 * @method YsUIMenu _orientation Controls the root menu's orientation. All submenus are vertical regardless of the orientation of the root menu. Possible values are "horizontal" or "vertical".
 * @method YsUIMenu _maxHeight Determines the iPod-style menu's maximum height.
 * @method YsUIMenu _backLink Determines whether the iPod menu shows a back link or a breadcrumb header in the menu.
 * @method YsUIMenu _backLinkText Sets the text of the back link.
 * @method YsUIMenu _topLinkText Sets the text of the top link.
 * @method YsUIMenu _crumbDefaultText  Sets the top breadcrumb's default text.
 * @method YsUIMenu _showDelay This option determines how many milliseconds to delay before showing the submenu in a fly-out menu.
 * @method YsUIMenu _hideDelay This option determines how many milliseconds to delay before hiding the submenu in a fly-out menu.
 * @method YsUIMenu _focus Triggered when a menu item gets the focus.
 * @method YsUIMenu _blur  Triggered when a menu item loses focus.
 * @method YsUIMenu _select  Triggered when a menu item is selected.
 * @method YsUIMenu _showing  Triggered before showing the submenu.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIMenu extends YsUICore {

  public static $uiEvent = YsUIConstant::MENU_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_trigger' =>  array('key' => 'trigger', 'is_quoted' => false)
              ,'_triggerEvent' =>  array('key' => 'triggerEvent', 'is_quoted' => false)
              ,'_position' =>  array('key' => 'position', 'is_quoted' => false)
              ,'_animation' =>  array('key' => 'animation', 'is_quoted' => false)
              ,'_showAnimation' =>  array('key' => 'showAnimation', 'is_quoted' => false)
              ,'_hideAnimation' =>  array('key' => 'hideAnimation', 'is_quoted' => false)
              ,'_mode' =>  array('key' => 'mode', 'is_quoted' => false)
              ,'_superPanelOptions' =>  array('key' => 'superPanelOptions', 'is_quoted' => false)
              ,'_checkable' =>  array('key' => 'checkable', 'is_quoted' => false)
              ,'_orientation' =>  array('key' => 'orientation', 'is_quoted' => false)
              ,'_maxHeight' =>  array('key' => 'maxHeight', 'is_quoted' => false)
              ,'_backLink' =>  array('key' => 'backLink', 'is_quoted' => false)
              ,'_backLinkText' =>  array('key' => 'backLinkText', 'is_quoted' => false)
              ,'_topLinkText' =>  array('key' => 'topLinkText', 'is_quoted' => false)
              ,'_crumbDefaultText' =>  array('key' => 'crumbDefaultText', 'is_quoted' => false)
              ,'_showDelay' =>  array('key' => 'showDelay', 'is_quoted' => false)
              ,'_hideDelay' =>  array('key' => 'hideDelay', 'is_quoted' => false)
              ,'_focus' =>  array('key' => 'focus.wijmenu', 'is_quoted' => false)
              ,'_blur' =>  array('key' => 'blur.wijmenu', 'is_quoted' => false)
              ,'_select' =>  array('key' => 'select.wijmenu', 'is_quoted' => false)
              ,'_showing' =>  array('key' => 'showing.wijmenu', 'is_quoted' => false)
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
  * @return YsUIMenu
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
   * @return YsUIMenu
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }
  
  /**
   * Build the jQuery sintax to create this widget.
   * @param string $jquerySelector A jQuery selector
   * @return YsUIMenu
   */
  public static function iPod($jquerySelector = null){
    $jquery = self::build($jquerySelector);
    $jquery->_orientation("vertical");
    $jquery->_mode("sliding");
    return $jquery;
  }
  
  /**
   * Build the jQuery sintax to create this widget.
   * @param string $jquerySelector A jQuery selector
   * @return YsUIMenu
   */
  public static function contextmenu($jquerySelector = null,$trigger = null){
    $jquery = self::build($jquerySelector);
    if($trigger !== null){
      $jquery->_trigger($trigger); 
    }
    $jquery->_orientation(YsOrientation::$VERTICAL);
    return $jquery;
  }

  //WIDGET METHODS

  /**
   * Selects the next item based on the active one. 
   * Selects the first item if none is active or if the last one is active.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function next($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'next');
  }

  /**
   * Selects the previous item based on the active one. 
   * Selects the last item if none is active or if the first one is active.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function previous($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'previous');
  }
  
  /**
   * Determines whether the active item is the first menu item.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function first($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'first');
  }
  
  /**
   * Determines whether the active item is the last menu item.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function last($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'last');
  }
  
  /**
   * This event is similar to the previousPage event, but it jumps a whole page 
   * to the next page.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function nextPage($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'nextPage');
  }
  
  /**
   * This event is similar to the nextPage event, 
   * but it jumps a whole page to the previous page.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function previousPage($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'previousPage');
  }
  
  /**
   * Selects the active item, triggering the selected event for that item. 
   * This event is useful for custom keyboard handling.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function select($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::SELECT_METHOD);
  }
  
  /**
   * Disables a menu item. 
   * The selector parameter is a jQuery selector which indicates the item to 
   * disable.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function setItemDisabled($jQuerySelector, $item){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'setItemDisabled',$item);
  }
  
  /**
   * Renders all non-menu items as menuitems, called once by _create.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function refresh($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::REFRESH_METHOD);
  }
  
  /**
   * Hides all the visible submenus.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function hideAllMenus($jQuerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,'hideAllMenus');
  }
  
  /**
   * Starts the standar HTML tags for build this widget
   * @param string $widgetId The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($widgetId, $htmlProperties = null, $htmlTag = YsHTML::UL){
    return YsHTML::getTagClosed($htmlTag, sprintf('id="%s" %s ', $widgetId , $htmlProperties));
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($htmlTag = YsHTML::UL){
    return YsHTML::getTagClosed($htmlTag);
  }
}