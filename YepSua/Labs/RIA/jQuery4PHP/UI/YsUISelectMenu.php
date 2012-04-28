<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUISelectMenu todo description
 * 
 * @method YsUISelectMenu _transferClasses
 * @method YsUISelectMenu _style
 * @method YsUISelectMenu _width
 * @method YsUISelectMenu _menuWidth
 * @method YsUISelectMenu _handleWidth
 * @method YsUISelectMenu _maxHeight
 * @method YsUISelectMenu _icons
 * @method YsUISelectMenu _format
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUISelectMenu extends YsUICore {

  public static $uiEvent = YsUIConstant::SELECT_MENU_WIDGET;
  public static $POPUP_STYLE = 'popup';

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(//options
                '_transferClasses' =>  array('key' => 'transferClasses', 'is_quoted' => false),
                '_style' => array('key' => 'style', 'is_quoted' => false),
                '_width' => array('key' => 'width', 'is_quoted' => false),
                '_menuWidth' => array('key' => 'menuWidth', 'is_quoted' => true),
                '_handleWidth' => array('key' => 'handleWidth', 'is_quoted' => true),
                '_maxHeight' => array('key' => 'maxHeight', 'is_quoted' => true),
                '_icons' => array('key' => 'icons', 'is_quoted' => true),
                '_format' => array('key' => 'format', 'is_quoted' => true)
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
  * @return YsUISelectMenu
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
   * @return YsUISelectMenu
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