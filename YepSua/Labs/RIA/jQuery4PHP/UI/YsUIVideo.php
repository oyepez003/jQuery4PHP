<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIVideo turns an HTML5 video tag into a fully functional video player utilizing jQuery UI theming.
 * 
 * @method YsUIVideo _fullScreenButtonVisible A value that indicates whether to show the full screen button.
 * @method YsUIVideo _showControlsOnHover Determines whether to display the controls only when hovering the mouse over the video.
 * 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIVideo extends YsUICore {

  public static $uiEvent = YsUIConstant::VIDEO_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_fullScreenButtonVisible' =>  array('key' => 'fullScreenButtonVisible', 'is_quoted' => false)
              ,'_showControlsOnHover' =>  array('key' => 'showControlsOnHover', 'is_quoted' => false)
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
  * @return YsUIVideo
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
   * @return YsUIVideo
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  //WIDGET METHODS
  
  /**
   * Pauses the video.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function pause($jQuerySelector){
    return self::callJQueryMethodIn($jQuerySelector,self::$uiEvent,YsUIConstant::PAUSE_METHOD);
  }
  
  /**
   * Plays the video.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function play($jQuerySelector){
    return self::callJQueryMethodIn($jQuerySelector,self::$uiEvent,YsUIConstant::PLAY_METHOD);
  }  
  
    //TEMPLATES

  /**
   * Starts the standar HTML tags for build this widget
   * @param string $accordionId The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($accordionId, $htmlProperties = null, $htmlTag = YsHTML::VIDEO){
    return YsHTML::getTag($htmlTag, sprintf('id="%s" %s ', $accordionId , $htmlProperties));
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($htmlTag = YsHTML::VIDEO){
    return YsHTML::getTagClosed($htmlTag);
  }
}