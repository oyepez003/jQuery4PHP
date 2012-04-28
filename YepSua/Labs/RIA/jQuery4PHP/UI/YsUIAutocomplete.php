<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIAutocomplete When added to an input field, enables users to quickly find
 * and select from a pre-populated list of values as they type, leveraging 
 * searching and filtering.
 *
 * @method YsUIAutocomplete _disabled Disables (true) or enables (false) the autocomplete.
 * @method YsUIAutocomplete _appendTo Which element the menu should be appended to.
 * @method YsUIAutocomplete _autoFocus If set to true the first item will be automatically focused.
 * @method YsUIAutocomplete _delay The delay in milliseconds the Autocomplete waits after a keystroke to activate itself. A zero-delay makes sense for local data (more responsive), but can produce a lot of load for remote data, while being less responsive.
 * @method YsUIAutocomplete _minLength The minimum number of characters a user has to type before the Autocomplete activates.
 * @method YsUIAutocomplete _position Identifies the position of the Autocomplete widget in relation to the associated input element.
 * @method YsUIAutocomplete _source Defines the data to use, must be specified.
 * @method YsUIAutocomplete _create This event is triggered when autocomplete is created.
 * @method YsUIAutocomplete _search Before a request (source-option) is started, after minLength and delay are met. Can be canceled (return false), then no request will be started and no items suggested.
 * @method YsUIAutocomplete _open Triggered when the suggestion menu is opened.
 * @method YsUIAutocomplete _focus Before focus is moved to an item (not selecting), ui.item refers to the focused item.
 * @method YsUIAutocomplete _select Triggered when an item is selected from the menu; ui.item refers to the selected item.
 * @method YsUIAutocomplete _close When the list is hidden - doesn't have to occur together with a change.
 * @method YsUIAutocomplete _change Triggered when the field is blurred, if the value has changed; ui.item refers to the selected item.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIAutocomplete extends YsUICore {

  public static $uiEvent = YsUIConstant::AUTOCOMPLETE_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_appendTo' =>  array('key' => 'appendTo', 'is_quoted' => false)
              ,'_autoFocus' =>  array('key' => 'autoFocus', 'is_quoted' => false)
              ,'_delay' =>  array('key' => 'delay', 'is_quoted' => false)
              ,'_minLength' =>  array('key' => 'minLength', 'is_quoted' => false)
              ,'_position' =>  array('key' => 'position', 'is_quoted' => false)
              ,'_source' =>  array('key' => 'source', 'is_quoted' => false)
               // events
              ,'_search' => array('key' => 'search', 'is_quoted' => false)
              ,'_open' => array('key' => 'open', 'is_quoted' => false)
              ,'_focus' => array('key' => 'focus', 'is_quoted' => false)
              ,'_select' => array('key' => 'select', 'is_quoted' => false)
              ,'_close' => array('key' => 'close', 'is_quoted' => false)
              ,'_change' => array('key' => 'change', 'is_quoted' => false));
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
  * @return YsUIAutocomplete
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
   * @return YsUIAutocomplete
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  // WIDGET METHODS

  /**
   * Triggers a search event, which, when data is available,
   * then will display the suggestions
   * @param string $value The value to search
   * @return object YsJQueryCore
   */
  public static function search($value = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::SEARCH_METHOD));
    if($value !== null){
      $jquery->value($value);
    }
    return $jquery;
  }

  /**
   * Close the Autocomplete menu. Useful in combination with the search method,
   * to close the open menu.
   * then will display the suggestions
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function close($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::CLOSE_METHOD));
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
  public static function initWidget($widgetId, $htmlProperties = null, $htmlTag = YsHTML::INPUT){
    return YsHTML::getTagClosed($htmlTag, sprintf('type="text" id="%s" %s ', $widgetId , $htmlProperties));
  }


  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($htmlTag = YsHTML::DIV){
    return false;
  }
    
  public function _multiple($separator = ","){
    $this->_minLength(0);
    $this->_focus(new YsJsFunction("return false"));
    $this->setOnSelectFunctionForMultiple($separator);
    $this->setSourceForMultiple($separator);
    return $this;
  }
  
  private function setOnSelectFunctionForMultiple($separator){
    $body = sprintf('var terms = this.value.split( /%s\s*/ );terms.pop();terms.push( ui.item.value );terms.push( "" );this.value = terms.join( "%s " );return false;',$separator,$separator);
    $this->_select(new YsJsFunction($body, 'event, ui'));
  }
  
  private function setSourceForMultiple($separator){
    $body = sprintf("response( $.ui.autocomplete.filter(%s, request.term.split( /%s\s*/ ).pop()));",new YsArgument($this->getOptionValue('_source')),$separator);
    $this->_source( new YsJsFunction($body, 'request, response'));
  }
  
}