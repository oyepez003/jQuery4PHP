<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Converts <select> input with attribute multiple into group of checkboxes with 
 * ability to add new values.
 *  
 * @method YsUIDynamicSelect _layout Widget layout template
 * @method YsUIDynamicSelect _item List item layout template
 * @method YsUIDynamicSelect _addText Text for "New value" button/link
 * @method YsUIDynamicSelect _cancelText Text for "Cancel" icon in text field
 * @method YsUIDynamicSelect _inputTitle Text for input tooltip
 * @method YsUIDynamicSelect _size How many items show in widget without scroll (used if select has no "size" attribute)
 * @method YsUIDynamicSelect _itemHoverClass Hover class for list items
 * @method YsUIDynamicSelect _toggleAddButton Hide "New value" button when text field is visible
 * @method YsUIDynamicSelect _parse Function. Parse new list value and return values array. By default - split value by space(s)
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIDynamicSelect extends YsUICore {

  public static $uiEvent = YsUIConstant::DYNAMICSELECT_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(//options
                '_layout' =>  array('key' => 'layout', 'is_quoted' => false),
                '_item' => array('key' => 'item', 'is_quoted' => false),
                '_addText' => array('key' => 'addText', 'is_quoted' => false),
                '_cancelText' => array('key' => 'cancelText', 'is_quoted' => true),
                '_inputTitle' => array('key' => 'inputTitle', 'is_quoted' => true),
                '_size' => array('key' => 'size', 'is_quoted' => true),
                '_itemHoverClass' => array('key' => 'itemHoverClass', 'is_quoted' => true),
                '_toggleAddButton' => array('key' => 'toggleAddButton', 'is_quoted' => true),
                '_parse' => array('key' => 'parse', 'is_quoted' => true)
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
  * @return YsUIMultiSelect
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
   * @return YsUIDynamicSelect
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }
  
  public function _noSplitValue(){
    return $this->_splitValueByRE('/\no-split-value+/');
  }
  
  public function _splitValueBy($splitter){
    return $this->_splitValueByRE(sprintf('/\s*%s\s*/',$splitter));
  }
  
  public function _splitValueByRE($regularExpression){
    return $this->_parse(new YsJsFunction(sprintf('return v.split(%s)',$regularExpression),'v'));
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