<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Another attempt of a sortable, searchable multiple select widget 
 * 
 * @method YsUIPickList _header
 * @method YsUIPickList _height
 * @method YsUIPickList _width
 * @method YsUIPickList _minWidth
 * @method YsUIPickList _checkAllText
 * @method YsUIPickList _uncheckAllText
 * @method YsUIPickList _noneSelectedText
 * @method YsUIPickList _selectedText
 * @method YsUIPickList _selectedList
 * @method YsUIPickList _show
 * @method YsUIPickList _hide
 * @method YsUIPickList _autoOpen
 * @method YsUIPickList _multiple
 * @method YsUIPickList _classes
 * @method YsUIPickList _position
 * @method YsUIPickList _create
 * @method YsUIPickList _beforeopen
 * @method YsUIPickList _open
 * @method YsUIPickList _beforeclose
 * @method YsUIPickList _close
 * @method YsUIPickList _checkAll
 * @method YsUIPickList _uncheckAll
 * @method YsUIPickList _optgroupToggle
 * @method YsUIPickList _click
 * @method YsUIPickList _close
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIPickList extends YsUICore {

  public static $uiEvent = YsUIConstant::PICKLIST_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(//options
                '_header' =>  array('key' => 'header', 'is_quoted' => false),
                '_height' => array('key' => 'height', 'is_quoted' => false),
                '_width' => array('key' => 'width', 'is_quoted' => false),
                '_minWidth' => array('key' => 'minWidth', 'is_quoted' => true),
                '_checkAllText' => array('key' => 'checkAllText', 'is_quoted' => true),
                '_uncheckAllText' => array('key' => 'uncheckAllText', 'is_quoted' => true),
                '_noneSelectedText' => array('key' => 'noneSelectedText', 'is_quoted' => true),
                '_selectedText' => array('key' => 'selectedText', 'is_quoted' => true),
                '_selectedList' => array('key' => 'selectedList', 'is_quoted' => true),
                '_show' => array('key' => 'show', 'is_quoted' => true),
                '_hide' => array('key' => 'hide', 'is_quoted' => true),
                '_autoOpen' => array('key' => 'autoOpen', 'is_quoted' => true),
                '_multiple' => array('key' => 'multiple', 'is_quoted' => true),
                '_classes' => array('key' => 'classes', 'is_quoted' => true),
                '_position' => array('key' => 'position', 'is_quoted' => true),
                
                //Events
                '_create' => array('key' => 'create', 'is_quoted' => true),
                '_beforeopen' => array('key' => 'beforeopen', 'is_quoted' => true),
                '_open' => array('key' => 'open', 'is_quoted' => true),
                '_beforeclose' => array('key' => 'beforeclose', 'is_quoted' => true),
                '_close' => array('key' => 'close', 'is_quoted' => true),
                '_checkAll' => array('key' => 'checkAll', 'is_quoted' => true),
                '_uncheckAll' => array('key' => 'uncheckAll', 'is_quoted' => true),
                '_optgroupToggle' => array('key' => 'optgroupToggle', 'is_quoted' => true),
                '_click' => array('key' => 'close', 'click' => true),
                '_close' => array('key' => 'close', 'is_quoted' => true),        
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
  * @return YsUIPickList
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }

  // BUILDERS

  /**
   * Build the jQuery sintax to create this widget
   * @param string $jquerySelector A jQuery selector
   * @return YsUIPickList
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }
  
  /**
   * Starts the standar HTML tags for build this widget
   * @param string $widgetId The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($widgetId, $htmlProperties = null, $htmlTag = YsHTML::SELECT){
    return YsHTML::getTagClosed($htmlTag, sprintf('id="%s" %s ', $widgetId , $htmlProperties));
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($htmlTag = YsHTML::SELECT){
    return YsHTML::getTagClosed($htmlTag);
  }

}