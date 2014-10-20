<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIButton Button enhances standard form elements like button, input of type
 * submit or reset or anchors to themable buttons with appropiate mouseover and
 * active styles.
 * 
 * @method YsUIButton _disabled Disables (true) or enables (false) the button.
 * @method YsUIButton _text Whether to show any text - when set to false (display no text), icons (see icons option) must be enabled, otherwise it'll be ignored.
 * @method YsUIButton _icons Icons to display, with or without text (see text option). The primary icon is displayed by default on the left of the label text, the secondary by default is on the right.
 * @method YsUIButton _label Text to show on the button. When not specified (null), the element's html content is used, or its value attribute when it's an input element of type submit or reset;
 * @method YsUIButton _create This event is triggered when button is created.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIButton extends YsUICore {

  public static $uiEvent = YsUIConstant::BUTTON_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(//options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false),
               '_text' => array('key' => 'text', 'is_quoted' => false),
               '_icons' => array('key' => 'icons', 'is_quoted' => false),
               '_label' => array('key' => 'label', 'is_quoted' => true),
               '_create' => array('key' => 'create', 'is_quoted' => true)
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
  * @return YsUIButton
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
   * @return YsUIButton 
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  /**
   * Build a buttonset 
   * @param string $buttonsetId The buttonset Id
   * @return object YsJQueryCore
   */
  public static function buildButtonset($buttonsetId = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(YsUIConstant::BUTTONSET_WIDGET);
    if($buttonsetId !== null){
      $jquery->setSelector($buttonsetId);
    }else{
      $jquery->setSelector(YsJQueryConstant::THIS);
    }
    return $jquery;
  }

  // WIDGET METHODS
  
  /**
   * Refreshes the visual state of the button. Useful for updating button
   * state after the native element's checked or disabled state is changed
   * programatically.
   * @param string $jquerySelector A jQuery selector
   * @return YsUIAutocomplete
   */
  public static function refresh($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::REFRESH_METHOD));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  //TEMPLATES

  /**
   * Returns the standar HTML tags for build a button like a checkbox functionallity
   * @param string $buttonId The button Id
   * @param string $label The button value
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function chekboxButton($buttonId, $label, $htmlProperties = ''){
    $template = YsHTML::getTagClosed(YsHTML::INPUT_CHECKBOX, sprintf(' id="%s" %s',$buttonId, $htmlProperties));
    $template .= YsHTML::getTag(YsHTML::LABEL, sprintf(' for="%s" ',$buttonId));
    $template .= $label;
    $template .= YsHTML::getTagClosed(YsHTML::LABEL);
    return $template;
  }

  /**
   * Returns the standar HTML tags for build a button
   * @param string $buttonId The button Id
   * @param string $label The button value
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function buttonTag($buttonId, $label, $htmlProperties = ''){
    $template = YsHTML::getTag(YsHTML::BUTTON, sprintf(' id="%s" %s',$buttonId, $htmlProperties));
    $template .= $label;
    $template .= YsHTML::getTagClosed(YsHTML::BUTTON);
    return $template;
  }

  /**
   * Returns the standar HTML tags for build a button like a radio functionallity
   * @param string $buttonId The button Id
   * @param string $label The button value
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function radioButton($buttonId, $label, $htmlProperties = ''){
    $template = YsHTML::getTagClosed(YsHTML::INPUT_RADIO, sprintf(' id="%s" %s',$buttonId, $htmlProperties));
    $template .= YsHTML::getTag(YsHTML::LABEL, sprintf(' for="%s" ',$buttonId));
    $template .= $label;
    $template .= YsHTML::getTagClosed(YsHTML::LABEL);
    return $template;
  }

  /**
   * Starts the standar HTML tags for build a buttonset
   * @param string $buttonsetId The buttonset Id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initButtonset($buttonsetId = null, $htmlProperties = null){
    $template = YsHTML::getTag(YsHTML::SPAN, sprintf(' id="%s" %s ',$buttonsetId,$htmlProperties));
    $template .= YsUIButton::buildButtonset('#' . $buttonsetId)->executeOnReady();
    return $template;
  }

  /**
   * Ends the standar HTML tags for build a buttonset
   * @return YsHTML HTML tags
   */
  public static function endButtonset(){
    $template = YsHTML::getTagClosed(YsHTML::SPAN);
    return $template;
  }

  /**
   * Starts the standar HTML tags for build toolbar
   * @param string $toolbarId The toolbarId Id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initToolbar($toolbarId, $htmlProperties = null){
    $htmlProperties = sprintf('id="%s" class="ui-widget-header ui-corner-all ui-jq4php-toolbar" %s', $toolbarId, $htmlProperties);
    $template = YsHTML::getTag(YsHTML::DIV, $htmlProperties);
    return $template;
  }
  
  /**
   * Ends the standar HTML tags for build a toolbar
   * @return YsHTML HTML tags
   */
  public static function endToolbar(){
    return YsHTML::getTagClosed(YsHTML::DIV);
  }
  
  /**
   * Starts the standar HTML tags for build this widget
   * @param string $widgetId The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($widgetId, $htmlProperties = null, $htmlTag = YsHTML::INPUT){
    if($htmlTag === YsHTML::BUTTON){
      return YsHTML::getTag($htmlTag, sprintf('id="%s" %s ', $widgetId , $htmlProperties));
    }else{
      return YsHTML::getTagClosed($htmlTag, sprintf('id="%s" %s ', $widgetId , $htmlProperties));
    }
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($htmlTag = YsHTML::INPUT){
    if($htmlTag === YsHTML::BUTTON || $htmlTag === YsHTML::A){
      return YsHTML::getTagClosed($htmlTag);
    }else{
      return null;
    }
  }
  
  /**
   * Starts the standar HTML tags for build this widget
   * @param string $widgetId The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initButton($widgetId, $htmlProperties = null,$type = 'button', $value = null){
    if($type === 'icon' || $type === 'link'){
      $tag = ($type === 'icon') ? YsHTML::BUTTON : YsHTML::A;
      $value = ($value === null || $value === '') ? YsHTML::NBSP : $value;
      $template  = sprintf('%s%s%s'
                     ,self::initWidget($widgetId, $htmlProperties, $tag)
                     ,$value
                     ,self::endWidget($tag)
                   );
    }else{
      $template  = self::initWidget($widgetId, $htmlProperties);
      /*$template .= ($type==='button')
                 ? YsHTML::getTag(YsHTML::LABEL, sprintf(' for="%s" ',$widgetId),$value)
                 : '';*/
    }
    return $template;
  }
}