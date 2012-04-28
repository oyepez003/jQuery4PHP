<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIAccordion Make the selected elements Accordion widgets.
 * 
 * @method YsUIAccordion _disabled Disables (true) or enables (false) the accordion
 * @method YsUIAccordion _active Selector for the active element. Set to false to display none at start. Needs collapsible: true
 * @method YsUIAccordion _animated Choose your favorite animation, or disable them (set to false).
 *                                 Sets the animation easing effect. Set this option to false in order to disable animation. Easing effects require UI Effects Core.
                                   Options available for the animation function include:
                                   down – If true, indicates that the index of the pane should be expanded higher than the index of the pane that must be collapsed.
                                   horizontal – If true, indicates that the accordion has a horizontal orientation (when the expandDirection is left or right).
                                   rightToLeft – If true, indicates that the content element is located before the header element (for the top and left expand direction).
                                   toShow – jQuery object that contains the content element(s) should be shown.
                                   toHide –jQuery object that contains the content element(s) should be hidden.
 * @method YsUIAccordion _autoHeight If set, the highest content part is used as height reference for all other parts 
 * @method YsUIAccordion _clearStyle If set, clears height and overflow styles after finishing animations
 * @method YsUIAccordion _collapsible Whether all the sections can be closed at once
 * @method YsUIAccordion _event The event on which to trigger the accordion
 * @method YsUIAccordion _fillSpace The event on which to trigger the accordion.
 * @method YsUIAccordion _header Selector for the header element.
 * @method YsUIAccordion _icons Icons to use for headers. Icons may be specified for 'header' and 'headerSelected'
 * @method YsUIAccordion _navigation If set, looks for the anchor that matches location
 * @method YsUIAccordion _navigationFilter Overwrite the default location.href-matching with your own matcher
 * @method YsUIAccordion _change This event is triggered every time the accordion starts to change. 
 * @method YsUIAccordion _changestart This event is triggered every time the accordion starts to change. 
 * @method YsUIAccordion _create This event is triggered when accordion is created.
 *  
 * WIJMO SUPPORT
 * 
 * @method YsUIAccordion _duration The animation duration in milliseconds.
 * @method YsUIAccordion _expandDirection Determines the direction in which the content area of the control expands. Available values include: top, right, bottom, and left.
 * @method YsUIAccordion _requireOpenedPane  Determines whether clicking the header will close the currently opened pane (leaving all the accordion's panes closed).
 * @method YsUIAccordion _selectedIndex Gets or sets the index of the currently expanded accordion pane.
 * @method YsUIAccordion _beforeSelectedIndexChanged Occurs before an active accordion pane is changed.
 * @method YsUIAccordion _selectedIndexChanged Occurs when an active accordion pane is changed.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIAccordion extends YsUICore {

  public static $uiEvent = YsUIConstant::ACCORDION_WIDGET;
  public static $ACCORDION_CHANGE = 'accordionchange';


  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
               ,'_active' => array('key' => 'active', 'is_quoted' => false)
               ,'_animated' => array('key' => 'animated', 'is_quoted' => false)
               ,'_autoHeight' => array('key' => 'autoHeight', 'is_quoted' => false)
               ,'_clearStyle' => array('key' => 'clearStyle', 'is_quoted' => true)
               ,'_collapsible' => array('key' => 'collapsible', 'is_quoted' => true)
               ,'_event' => array('key' => 'event', 'is_quoted' => false)
               ,'_fillSpace' => array('key' => 'fillSpace', 'is_quoted' => false)
               ,'_header' => array('key' => 'header', 'is_quoted' => true)
               ,'_icons' => array('key' => 'icons', 'is_quoted' => false)
               ,'_navigation' => array('key' => 'navigation', 'is_quoted' => false)
               ,'_navigationFilter' => array('key' => 'navigationFilter', 'is_quoted' => false)
               // events
               ,'_create' => array('key' => 'create', 'is_quoted' => false)
               ,'_change' => array('key' => 'change', 'is_quoted' => false)
               ,'_changestart' => array('key' => 'changestart', 'is_quoted' => false)
               ,'_duration' => array('key' => 'duration', 'is_quoted' => false)
               ,'_expandDirection' => array('key' => 'expandDirection', 'is_quoted' => false)
               ,'_requireOpenedPane' => array('key' => 'requireOpenedPane', 'is_quoted' => false)
               ,'_selectedIndex' => array('key' => 'selectedIndex', 'is_quoted' => false)
               ,'_beforeSelectedIndexChanged' => array('key' => 'beforeSelectedIndexChanged', 'is_quoted' => false)
               ,'_selectedIndexChanged' => array('key' => 'selectedIndexChanged', 'is_quoted' => false)        
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
  * @return YsUIAccordion
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
   * @return YsUIAccordion
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  // WIDGET METHODS

  /**
   * Activate a content part of the Accordion programmatically
   * @param integer $index The index can be a zero-indexed number to match the
   * position of the header to close or a Selector matching an element.
   * Pass false to close all (only possible with collapsible:true)
   * @return object YsJQueryCore
   */
  public static function activate($index = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::ACTIVATE_METHOD));
    if($index !== null){
      $jquery->value($index);
    }
    return $jquery;
  }

  /**
   * Recompute heights of the accordion contents when using the fillSpace
   * option and the container height changed. For example, when the container
   * is a resizable, this method should be called by its resize-event.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function resize($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::RESIZE_METHOD));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  //TEMPLATES

  /**
   * Starts the standar HTML tags for build this widget
   * @param string $accordionId The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($accordionId, $htmlProperties = null, $htmlTag = YsHTML::DIV){
    return YsHTML::getTag($htmlTag, sprintf('id="%s" %s ', $accordionId , $htmlProperties));
  }

  /**
   * Starts the standar HTML tags for build the section of an accordion
   * @param string $label The label of a section of the accordion
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initSection($label = null,$htmlProperties = null){
    $template = new YsHTML();
    $template->addToTemplate(YsHTML::getTag(YsHTML::H3, null, YsHTML::getTag(YsHTML::A, $htmlProperties, $label)));
    $template->addToTemplate(YsHTML::getTag(YsHTML::DIV));
    return $template->getTemplate();
  }

  /**
   * Ends the standar HTML tags for build the section
   * @return YsHTML HTML tags
   */
  public static function endSection(){
    return YsHTML::getTagClosed(YsHTML::DIV);
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($htmlTag = YsHTML::DIV){
    return YsHTML::getTagClosed($htmlTag);
  }

  /**
   * Customize the header icons with the icons option,
   * which accepts classes for the header's default and selected (open) state
   * @param string $headerIcon The header icon
   * @param string $headerSelectedIcon The header icon when the section
   * has been selected
   * @return array array('header' => $headerIcon,
   *                     'headerSelected' => $headerSelectedIcon)
   */
  public static function configureIcons($headerIcon, $headerSelectedIcon){
    return array(
          'header' => $headerIcon,
          'headerSelected' => $headerSelectedIcon
        );
  }  
}