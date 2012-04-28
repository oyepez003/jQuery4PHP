<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIExpander todo description.
 * 
 * @method YsUIExpander _allowExpand Determines if the widget can be collapsed or expanded through user interaction.
 * @method YsUIExpander _animated Determines the animation easing effect;
 * @method YsUIExpander _contentUrl Determines the URL to the external content.
 * @method YsUIExpander _disabled Determines whether the widget behavior is disabled. If false, the widget is enabled.
 * @method YsUIExpander _expanded Determines the visibility state of the content panel. If true, the content element is visible.
 * @method YsUIExpander _expandDirection Determines the content expand direction. Available values are: top, right, bottom, and left.
 * @method YsUIExpander _afterCollapse Occurs after the content area collapses.
 * @method YsUIExpander _afterExpand Occurs after the content area expands.
 * @method YsUIExpander _beforeCollapse Occurs before the content area collapses.
 * @method YsUIExpander _beforeExpand Occurs before the content area expands
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIExpander extends YsUICore {

  public static $uiEvent = YsUIConstant::EXPANDER_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_allowExpand' =>  array('key' => 'allowExpand', 'is_quoted' => false)
              ,'_animated' =>  array('key' => 'animated', 'is_quoted' => false)
              ,'_contentUrl' =>  array('key' => 'contentUrl', 'is_quoted' => false)
              ,'_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_expanded' =>  array('key' => 'expanded', 'is_quoted' => false)
              ,'_expandDirection' =>  array('key' => 'expandDirection', 'is_quoted' => false)
              ,'_afterCollapse' =>  array('key' => 'afterCollapse', 'is_quoted' => false)
              ,'_afterExpand' =>  array('key' => 'afterExpand', 'is_quoted' => false)
              ,'_beforeCollapse' =>  array('key' => 'beforeCollapse', 'is_quoted' => false)
              ,'_beforeExpand' =>  array('key' => 'beforeExpand', 'is_quoted' => false)
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
  * @return YsUIExpander
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
   * @return YsUIExpander
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  //WIDGET METHODS
  
  /**
   * Collapses the content panel.
   * @param string $jquerySelector
   * @return type 
   */
  public static function collapse($jquerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::COLLAPSE_METHOD);
  }
  
  /**
   * Expands the content panel.
   * @param type $jquerySelector
   * @return type 
   */
  public static function expand($jquerySelector){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::EXPAND_METHOD);
  }
  
  
  // TEMPLATES
  public static function title($title, $id=null,$htmlProperties = null){
    $pattern = self::initWidget($id, $htmlProperties,YsHTML::H3);
    $pattern .= $title;
    $pattern .= self::endWidget(YsHTML::H3);
    return $pattern;
  }
  
  public static function initContent($contentId=null, $htmlProperties = null){
    return self::initWidget($contentId, $htmlProperties);
  }
  
  public static function endContent(){
    return self::endWidget();
  }
  
}