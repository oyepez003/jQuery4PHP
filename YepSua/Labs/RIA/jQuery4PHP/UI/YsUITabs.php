<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUITabs todo description.
 * 
 * @method YsUITabs _disabled Disables (true) or enables (false) the tabs.
 * @method YsUITabs _ajaxOptions Additional Ajax options to consider when loading tab content.
 * @method YsUITabs _cache Whether or not to cache remote tabs content, e.g. load only once or with every click.
 * @method YsUITabs _collapsible Set to true to allow an already selected tab to become unselected again upon reselection.
 * @method YsUITabs _cookie Store the latest selected tab in a cookie.
 * @method YsUITabs _deselectable Deprecated use collapsible.
 * @method YsUITabs _disabled An array containing the position of the tabs (zero-based index) that should be disabled on initialization.
 * @method YsUITabs _event The type of event to be used for selecting a tab.
 * @method YsUITabs _fx Enable animations for hiding and showing tab panels. The duration option can be a string representing one of the three predefined speeds ("slow", "normal", "fast") or the duration in milliseconds to run an animation
 * @method YsUITabs _idPrefix If the remote tab, its anchor element that is, has no title attribute to generate an id from, an id/fragment identifier is created from this prefix and a unique id returned by $.data(el), for example "ui-tabs-54".
 * @method YsUITabs _panelTemplate HTML template from which a new tab panel is created in case of adding a tab with the add method or when creating a panel for a remote tab on the fly.
 * @method YsUITabs _selected Zero-based index of the tab to be selected on initialization. To set all tabs to unselected pass -1 as value.
 * @method YsUITabs _spinner The HTML content of this string is shown in a tab title while remote content is loading. Pass in empty string to deactivate that behavior. An span element must be present in the A tag of the title, for the spinner content to be visible.
 * @method YsUITabs _tabTemplate HTML template from which a new tab is created and added. 
 * @method YsUITabs _create This event is triggered when tabs is created.
 * @method YsUITabs _select This event is triggered when clicking a tab.
 * @method YsUITabs _load This event is triggered after the content of a remote tab has been loaded.
 * @method YsUITabs _show This event is triggered when a tab is shown.
 * @method YsUITabs _add This event is triggered when a tab is added.
 * @method YsUITabs _remove This event is triggered when a tab is removed.
 * @method YsUITabs _enable This event is triggered when a tab is enabled.
 * @method YsUITabs _disable This event is triggered when a tab is disabled.
 * @method YsUITabs _closable For scrollable tabs. User can close the tab / but cannot close if there is only one tab remaining
 * @method YsUITabs _animationSpeed For scrollable tabs. Length of the animation.
 * @method YsUITabs _loadLastTab for scrollable tabs. If true than tabs will animate to the last tab when loaded.
 * @method YsUITabs _resizable For scrollable tabs. User can resize the tabs wrapper
 * @method YsUITabs _resizeHandles For scrollable tabs. The directions that user can resize the tabs wrapper in
 * @method YsUITabs _easing For scrollable tabs. Name of the easing.
 * @method YsUITabs _onTabClose For scrollable tabs. Callback that will be called after the tabs has been closed.
 * 
 * WIJMO SUPPORT
 * 
 * @method YsUITabs _alignment Determines the tabs’ alignment in respect to the content. Possible values are: 'top', 'bottom', 'left' and 'right'.
 * @method YsUITabs _sortable Determines whether the tab can be dragged to a new position.
 * @method YsUITabs _scrollable  Determines whether to wrap tabs to the next line or enable scrolling when the number of tabs exceeds the specified
 * @method YsUITabs _hideOption This is an animation option for hiding the tab’s panel content.
 * @method YsUITabs _showOption This is an animation option for showing the tab’s panel content.
 * @method YsUITabs _disabledIndexes An array containing the position of tabs (zero-based index) that should be disabled upon initialization.
 * 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUITabs extends YsUICore {

  public static $uiEvent = YsUIConstant::TABS_WIDGET;
  public static $scrollableTabs = YsUIConstant::SCROLLABLE_TABS_WIDGET;
  public static $TABS_SHOW = 'tabsshow';

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
              //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_ajaxOptions' =>  array('key' => 'ajaxOptions', 'is_quoted' => false)
              ,'_cache' =>  array('key' => 'cache', 'is_quoted' => false)
              ,'_collapsible' =>  array('key' => 'collapsible', 'is_quoted' => false)
              ,'_cookie' =>  array('key' => 'cookie', 'is_quoted' => false)
              ,'_deselectable' =>  array('key' => 'deselectable', 'is_quoted' => false)
              ,'_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_event' =>  array('key' => 'event', 'is_quoted' => true)
              ,'_fx' =>  array('key' => 'fx', 'is_quoted' => false)
              ,'_idPrefix' =>  array('key' => 'idPrefix', 'is_quoted' => true)
              ,'_panelTemplate' =>  array('key' => 'panelTemplate', 'is_quoted' => true)
              ,'_selected' =>  array('key' => 'selected', 'is_quoted' => false)
              ,'_spinner' =>  array('key' => 'spinner', 'is_quoted' => true)
              ,'_tabTemplate' =>  array('key' => 'tabTemplate', 'is_quoted' => true)
              // events
              ,'_create' =>  array('key' => 'create', 'is_quoted' => false)
              ,'_select' =>  array('key' => 'select', 'is_quoted' => false)
              ,'_load' =>  array('key' => 'load', 'is_quoted' => false)
              ,'_show' =>  array('key' => 'show', 'is_quoted' => false)
              ,'_add' =>  array('key' => 'add', 'is_quoted' => false)
              ,'_remove' =>  array('key' => 'remove', 'is_quoted' => false)
              ,'_enable' =>  array('key' => 'enable', 'is_quoted' => false)
              ,'_disable' =>  array('key' => 'disable', 'is_quoted' => false)

              //scrollable
              ,'_closable' =>  array('key' => 'closable', 'is_quoted' => false)
              ,'_animationSpeed' =>  array('key' => 'animationSpeed', 'is_quoted' => false)
              ,'_loadLastTab' =>  array('key' => 'loadLastTab', 'is_quoted' => false)
              ,'_resizable' =>  array('key' => 'resizable', 'is_quoted' => false)
              ,'_resizeHandles' =>  array('key' => 'resizeHandles', 'is_quoted' => false)
              ,'_easing' =>  array('key' => 'easing', 'is_quoted' => false)
              ,'_onTabClose ' =>  array('key' => 'onTabClose ', 'is_quoted' => false)
        
              //WIJMO
              ,'_alignment' =>  array('key' => 'alignment', 'is_quoted' => false)
              ,'_sortable' =>  array('key' => 'sortable', 'is_quoted' => false)
              ,'_scrollable' =>  array('key' => 'scrollable', 'is_quoted' => false)
              ,'_hideOption' =>  array('key' => 'hideOption', 'is_quoted' => false)
              ,'_showOption' =>  array('key' => 'showOption', 'is_quoted' => false)
              ,'_disabledIndexes' =>  array('key' => 'disabledIndexes', 'is_quoted' => false)
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
  public static function option($optionName, $value = null)
  {
    $staticMethod = YsUIConstant::OPTION_METHOD;
    parent::$uiEvent = self::$uiEvent;
    return parent::$staticMethod($optionName, $value);
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
  * @return YsUITabs
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  // BUILDER

  /**
   * Build the jQuery sintax to create this widget
   * @param string $jquerySelector A jQuery selector
   * @return YsUITabs
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  /**
   * Build the jQuery sintax to create this widget
   * @param string $jquerySelector A jQuery selector
   * @return YsUITabs
   */
  public static function tabs($jquerySelector = null){
    return self::build($jquerySelector);
  }

  /**
   * Build the jQuery sintax to create this widget (Scrollable)
   * @param string $jquerySelector A jQuery selector
   * @return YsUITabs
   */
  public static function scrollabletabs($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$scrollableTabs);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  public function sortable($axis = 'x'){
    $this->addAccesors(self::getSortableSintax(YsJQueryConstant::THIS, $axis));
    return $this;
  }

  public static function makeSortable($jquerySelector = null,$axis='x'){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(YsUIConstant::TABS_WIDGET);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    $jquery->addAccesors(self::getSortableSintax($jquerySelector, $axis));
    return $jquery;
  }

  /**
   * Add a new tab.
   * @param string $url is either a URL consisting of a fragment identifier only
   * to create an in-page tab or a full url (relative or absolute, no
   * cross-domain support) to turn the new tab into an Ajax (remote) tab
   * @param string $label The label of the new tab
   * @param integer $index Is the zero-based position where to insert the new tab.
   * Optional, by default a new tab is appended at the end.
   * @return YsJQueryCore
   */
  public static function add($url = null, $label = null, $index = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::ADD_METHOD));
    $jquery->addArgument(new YsArgument($url));
    $jquery->addArgument(new YsArgument($label));
    if($index !== null){
      $jquery->addArgument(new YsArgument($index));
    }
    return $jquery;
  }

  /**
   * Remove a tab.
   * @param integer $index Is the zero-based index of the tab to be removed.
   * @return YsJQueryCore
   */
  public static function remove($index){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::REMOVE_METHOD));
    $jquery->addArgument(new YsArgument($index));
    return $jquery;
  }

  /**
   * Enable a disabled tab.
   * @param integer $index is the zero-based index of the tab to be enabled.
   * @return YsJQueryCore
   */
  public static function enableTab($index){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::ENABLE_METHOD));
    $jquery->addArgument(new YsArgument($index));
    return $jquery;
  }

  /**
   * Disable a tab.
   * @param integer $index Is the zero-based index of the tab to be disabled.
   * @return YsJQueryCore
   */
  public static function disableTab($index){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::DISABLE_METHOD));
    $jquery->addArgument(new YsArgument($index));
    return $jquery;
  }

  /**
   * Select a tab, as if it were clicked.
   * @param integer $index Is the zero-based index of the tab to be selected
   * @return YsJQueryCore
   */
  public static function select($index){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::SELECT_METHOD));
    $jquery->addArgument(new YsArgument($index));
    return $jquery;
  }

  /**
   * Reload the content of an Ajax tab programmatically.
   * @param integer $index Is the zero-based index of the tab to be reloaded.
   * @return YsJQueryCore
   */
  public static function load($index){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::LOAD_EVENT));
    $jquery->addArgument(new YsArgument($index));
    return $jquery;
  }

  /**
   * Change the url from which an Ajax (remote) tab will be loaded.
   * @param string $index Is the zero-based index of the tab of which its URL
   * is to be updated
   * @param string $url Is a URL the content of the tab is loaded from.
   * @return YsJQueryCore
   */
  public static function url($index, $url){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::URL_METHOD));
    $jquery->addArgument(new YsArgument($index));
    $jquery->addArgument(new YsArgument($url));
    return $jquery;
  }

  /**
   * Retrieve the number of tabs of the first matched tab pane.
   * @return YsJQueryCore
   */
  public static function length(){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::LENGTH_METHOD));
    return $jquery;
  }

  /**
   * Terminate all running tab ajax requests and animations.
   * @return YsJQueryCore
   */
  public static function abort(){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::ABORT_METHOD));
    return $jquery;
  }

  /**
   * Set up an automatic rotation through tabs of a tab pane.
   * @param integer $ms Is an amount of time in milliseconds until the next tab in the cycle gets activated
   * @param boolean $continuing
   * @return YsJQueryCore
   */
  public static function rotate($ms,$continuing = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::ROTATE_METHOD));
    $jquery->addArgument(new YsArgument($ms));
    if($continuing !== null){
      $jquery->addArgument(new YsArgument($continuing));
    }
    return $jquery;
  }

  //TEMPLATES

  public static function initWidget($tabsId , $htmlProperties = null,$htmlTag = YsHTML::DIV){
    $htmlProperties = sprintf('class="ui-tabs-header" id="%s" ', $tabsId) . $htmlProperties;
    $template = YsHTML::getTag($htmlTag, $htmlProperties);
    return $template;
  }

  public static function endWidget($htmlTag = YsHTML::DIV){
    return  YsHTML::getTagClosed($htmlTag);
  }
  
  public static function initHeader(){
    return  YsHTML::getTag(YsHTML::UL);
  }

  public static function endHeader(){
    return  YsHTML::getTagClosed(YsHTML::UL);
  }
  
  public static function tab($label, $tabHref, $closable = false ,$htmlProperties = null){
    $htmlProperties = sprintf(' href="%s" ', $tabHref) . $htmlProperties;
    $template = YsHTML::getTag(YsHTML::A, $htmlProperties);
    $template .= $label;
    $template .= YsHTML::getTagClosed(YsHTML::A);
    if($closable){
      $template .= YsHTML::getTag(YsHTML::SPAN, ' class="ui-icon ui-icon-close" ',YsHTML::NBSP);
      $template .= self::getClosableSintax()->execute();
    }
    $template = YsHTML::getTag(YsHTML::LI, null , $template);

    return $template;
  }

  public static function initTabContent($tabId, $htmlProperties = null){
    $htmlProperties = sprintf(' id="%s" ', $tabId) . $htmlProperties;
    $template = YsHTML::getTag(YsHTML::DIV, $htmlProperties);
    return $template;
  }

  public static function endTabContent(){
    return YsHTML::getTagClosed(YsHTML::DIV);
  }

  protected static function getClosableSintax(){
    return YsJQuery::one()
            ->in('.ui-tabs-header li .ui-icon-close')
            ->eventType(YsJQueryConstant::CLICK_EVENT)
            ->handler(
              str_replace('$',YsJQuery::$jqueryVar,str_replace('%TABS_EVENT%',self::$uiEvent,'$tabs = $("#" + $(this).parents("div .ui-tabs-header").attr("id"));
               var index = $("li",$tabs).index($(this).parent());
               $tabs.%TABS_EVENT%("remove", index);'))
            );
  }
  
  protected static function getSortableSintax($selector,$axis){
    if($selector == 'this'){
      $template = ".%s('.ui-tabs-nav', %s).%s({axis:'%s'});";
    }else{
      $template = ".%s('.ui-tabs-nav', '%s').%s({axis:'%s'});";
    }
    return sprintf($template
                   ,YsJQueryConstant::FIND_EVENT
                   ,$selector
                   ,YsUIConstant::SORTABLE_INTERACTION
                   ,$axis);
  }
}