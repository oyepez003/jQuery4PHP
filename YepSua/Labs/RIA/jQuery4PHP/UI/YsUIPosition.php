<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIPosition TODO description.
 * 
 * @method YsUIPosition _my Defines which position on the element being positioned to align with the target element: "horizontal vertical" alignment. A single value such as "right" will default to "right center", "top" will default to "center top" (following CSS convention).
 * @method YsUIPosition _at Defines which position on the target element to align the positioned element against: "horizontal vertical" alignment. A single value such as "right" will default to "right center", "top" will default to "center top" (following CSS convention). 
 * @method YsUIPosition _of Element to position against.
 * @method YsUIPosition _offset Add these left-top values to the calculated position
 * @method YsUIPosition _collision When the positioned element overflows the window in some direction, move it to an alternative position.
 * @method YsUIPosition _using When specified the actual property setting is delegated to this callback.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIPosition extends YsUICore {

  public static $uiEvent = YsUIConstant::POSITION_UTILITY;
  public static $CENTER_POSITION = 'center';
  public static $LEFT_POSITION = 'left';
  public static $RIGHT_POSITION = 'right';
  public static $TOP_POSITION = 'top';
  public static $BOTTOM_POSITION = 'bottom';

  public static $RIGHT_BOTTOM_POSITION = array('right','bottom');
  public static $RIGHT_CENTER_POSITION = array('right','center');
  public static $CENTER_BOTTOM_POSITION = array('center','bottom');
  public static $LEFT_BOTTOM_POSITION = array('left','bottom');
  public static $LEFT_TOP_POSITION = array('left','top');
  public static $RIGHT_TOP_POSITION = array('right','top');
  public static $CENTER_TOP_POSITION = array('center','top');
  public static $CENTER_CENTER_POSITION = array('center','center');
  public static $LEFT_CENTER_POSITION = array('left','center');
  
  public static $RIGHT_BOTTOM = 'right bottom';
  public static $RIGHT_CENTER = 'right center';
  public static $CENTER_BOTTOM = 'center bottom';
  public static $LEFT_BOTTOM = 'left bottom';
  public static $LEFT_TOP = 'left top';
  public static $RIGHT_TOP = 'right top';
  public static $CENTER_TOP = 'center top';
  public static $CENTER_CENTER = 'center center';
  public static $LEFT_CENTER = 'left center';

  /**
   * @return array options and events for this functionality
   */
  public function registerOptions() {
    return   array(
               //options
               '_my' =>  array('key' => 'my', 'is_quoted' => true)
               ,'_at' => array('key' => 'at', 'is_quoted' => true)
               ,'_of' => array('key' => 'of', 'is_quoted' => true)
               ,'_offset' => array('key' => 'offset', 'is_quoted' => true)
               ,'_collision' => array('key' => 'collision', 'is_quoted' => true)
               ,'_using' => array('key' => 'using', 'is_quoted' => false)
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
  * @return YsUIPosition
  */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  // BUILDER

  /**
   * Build the jQuery sintax to create the utility
   * @param string $jquerySelector A jQuery selector
   * @return YsUIPosition
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }
  
  public function __toString(){
    return $this->getOptionsLikeJson();
  }
 
}