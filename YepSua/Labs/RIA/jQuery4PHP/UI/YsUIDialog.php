<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIDialog A dialog is a floating window that contains a title bar and a
 * content area. The dialog window can be moved, resized and closed with the
 * 'x' icon by default.
 * 
 * @method YsUIDialog _disabled Disables (true) or enables (false) the dialog.
 * @method YsUIDialog _autoOpen When autoOpen is true the dialog will open automatically when dialog is called.
 * @method YsUIDialog _buttons Specifies which buttons should be displayed on the dialog.
 * @method YsUIDialog _closeOnEscape Specifies whether the dialog should close when it has focus and the user presses the esacpe (ESC) key.
 * @method YsUIDialog _closeText Specifies the text for the close button. 
 * @method YsUIDialog _dialogClass The specified class name(s) will be added to the dialog, for additional theming.
 * @method YsUIDialog _draggable If set to true, the dialog will be draggable will be draggable by the titlebar.
 * @method YsUIDialog _height The height of the dialog, in pixels. Specifying 'auto' is also supported to make the dialog adjust based on its content.
 * @method YsUIDialog _hide The effect to be used when the dialog is closed.
 * @method YsUIDialog _maxHeight The maximum height to which the dialog can be resized, in pixels.
 * @method YsUIDialog _maxWidth The maximum width to which the dialog can be resized, in pixels.
 * @method YsUIDialog _minHeight The minimum height to which the dialog can be resized, in pixels.
 * @method YsUIDialog _minWidth The minimum width to which the dialog can be resized, in pixels.
 * @method YsUIDialog _modal The minimum width to which the dialog can be resized, in pixels.
 * @method YsUIDialog _position Specifies where the dialog should be displayed
 * @method YsUIDialog _resizable If set to true, the dialog will be resizeable.
 * @method YsUIDialog _show The effect to be used when the dialog is opened.
 * @method YsUIDialog _stack Specifies whether the dialog will stack on top of other dialogs. This will cause the dialog to move to the front of other dialogs when it gains focus.
 * @method YsUIDialog _title Specifies the title of the dialog. Any valid HTML may be set as the title. The title can also be specified by the title attribute on the dialog source element.
 * @method YsUIDialog _width The width of the dialog, in pixels.
 * @method YsUIDialog _zIndex The starting z-index for the dialog.
 * @method YsUIDialog _create This event is triggered when dialog is created.
 * @method YsUIDialog _beforeclose This event is triggered when dialog is created.
 * @method YsUIDialog _open This event is triggered when a dialog attempts to close
 * @method YsUIDialog _focus This event is triggered when the dialog gains focus.
 * @method YsUIDialog _dragStart This event is triggered at the beginning of the dialog being dragged.
 * @method YsUIDialog _drag This event is triggered when the dialog is dragged.
 * @method YsUIDialog _dragStop This event is triggered after the dialog has been dragged.
 * @method YsUIDialog _resizeStart This event is triggered at the beginning of the dialog being resized.
 * @method YsUIDialog _resize This event is triggered when the dialog is resized
 * @method YsUIDialog _resizeStop This event is triggered after the dialog has been resized.
 * @method YsUIDialog _close This event is triggered after the dialog has been resized.
 * 
 * WIJMO SUPPORT
 * 
 * @method YsUIDialog _captionButtons WIJMO - An object that determines the caption buttons to show on the wijdialog title bar. 
 * @method YsUIDialog _collapsingAnimation WIJMO - A value determines the settings of the animation effect to be used when the wijdialog is collapsed. 
 * @method YsUIDialog _expandingAnimation WIJMO - A value determines the settings of the animation effect to be used when the wijdialog is expanded. 
 * @method YsUIDialog _contentUrl WIJMO - A URL string specifies the URL for the iframe element inside wijdialog. 
 * @method YsUIDialog _minimizeZoneElementId WIJMO - A string specifies the ID of the DOM element to dock to when wijdialog is minimized. 
 * @method YsUIDialog _blur WIJMO - A function called when the dialog box loses focus. 
 * @method YsUIDialog _buttonCreating WIJMO - A function gets called before the caption buttons are created 
 * @method YsUIDialog _stateChanged WIJMO - A function called when the state ("minimized", "maximized", "normal") 
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIDialog extends YsUICore {

  public static $uiEvent = YsUIConstant::DIALOG_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false),
               '_autoOpen' => array('key' => 'autoOpen', 'is_quoted' => false),
               '_buttons' => array('key' => 'buttons', 'is_quoted' => false),
               '_closeOnEscape' => array('key' => 'closeOnEscape', 'is_quoted' => false),
               '_closeText' => array('key' => 'closeText', 'is_quoted' => true),
               '_dialogClass' => array('key' => 'dialogClass', 'is_quoted' => true),
               '_draggable' => array('key' => 'draggable', 'is_quoted' => false),
               '_height' => array('key' => 'height', 'is_quoted' => false),
               '_hide' => array('key' => 'hide', 'is_quoted' => true),
               '_maxHeight' => array('key' => 'maxHeight', 'is_quoted' => false),
               '_maxWidth' => array('key' => 'maxWidth', 'is_quoted' => false),
               '_minHeight' => array('key' => 'minHeight', 'is_quoted' => false),
               '_minWidth' => array('key' => 'minWidth', 'is_quoted' => false),
               '_modal' => array('key' => 'modal', 'is_quoted' => false),
               '_position' => array('key' => 'position', 'is_quoted' => false),
               '_resizable' => array('key' => 'resizable', 'is_quoted' => false),
               '_show' => array('key' => 'show', 'is_quoted' => true),
               '_stack' => array('key' => 'stack', 'is_quoted' => false),
               '_title' => array('key' => 'title', 'is_quoted' => true),
               '_width' => array('key' => 'width', 'is_quoted' => false),
               '_zIndex' => array('key' => 'zIndex', 'is_quoted' => false),
               // events
               '_create' => array('key' => 'create', 'is_quoted' => false),
               '_beforeclose' => array('key' => 'beforeclose', 'is_quoted' => false),
               '_open' => array('key' => 'open', 'is_quoted' => false),
               '_focus' => array('key' => 'focus', 'is_quoted' => false),
               '_dragStart' => array('key' => 'dragStart', 'is_quoted' => false),
               '_drag' => array('key' => 'drag', 'is_quoted' => false),
               '_dragStop' => array('key' => 'dragStop', 'is_quoted' => false),
               '_resizeStart' => array('key' => 'resizeStart', 'is_quoted' => false),
               '_resize' => array('key' => 'resize', 'is_quoted' => false),
               '_resizeStop' => array('key' => 'resizeStop', 'is_quoted' => false),
               '_close' => array('key' => 'close', 'is_quoted' => false),   
               // WIJMO
               '_captionButtons' => array('key' => 'captionButtons', 'is_quoted' => false),
               '_collapsingAnimation' => array('key' => 'collapsingAnimation', 'is_quoted' => false),
               '_expandingAnimation' => array('key' => 'expandingAnimation', 'is_quoted' => false),
               '_contentUrl' => array('key' => 'contentUrl', 'is_quoted' => false),
               '_minimizeZoneElementId' => array('key' => 'minimizeZoneElementId', 'is_quoted' => false),
               '_blur' => array('key' => 'blur', 'is_quoted' => false),
               '_buttonCreating' => array('key' => 'buttonCreating', 'is_quoted' => false),
               '_stateChanged' => array('key' => 'stateChanged', 'is_quoted' => false),   
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
  * @return YsUIDialog
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
   * @return YsUIDialog
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    $jquery->_hideAllCaptionButtons();
    $jquery->_closeable(true);
    return $jquery;
  }

  // WIDGET METHODS

  /**
   * Close the dialog.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function close($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::CLOSE_METHOD);
  }

  /**
   * Returns true if the dialog is currently open.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function isOpen($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::IS_OPEN_METHOD);
  }

  /**
   * Move the dialog to the top of the dialogs stack.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function moveToTop($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::MOVE_TO_TOP_METHOD);
  }

  /**
   * Open the dialog.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function open($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::OPEN_METHOD);
  }

  /**
   * Restore the dialog.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function restore($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::RESTORE_METHOD);
  }

  /**
   * Minimize the dialog.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function minimize($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::MINIMIZE_METHOD);
  }

  /**
   * Maximize the dialog.
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function maximize($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::MAXIMIZE_METHOD);
  }
  
  /**
   * Pins the dialog instance so that it could not be moved. 
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function pin($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::PIN_METHOD);
  }
  
  /**
   * Refreshes the iframe content in the dialog instance. 
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function refresh($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::REFRESH_METHOD);
  }
  
  /**
   * Resets the properties ("width" ,"height", "position") to their default values.  
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function reset($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::RESET_METHOD);
  }
  
  /**
   * Expands or collapses the content of the wijdialog instance.  
   * @param string $jquerySelector A jQuery selector
   * @return YsJQueryCore
   */
  public static function toggle($jquerySelector = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::TOGGLE_METHOD);
  }


  //TEMPLATES
  
  public function noClosable(){
    $this->_closeOnEscape(false);
    $noCloseablePattern = sprintf("%s(this).parent().children().children('.ui-dialog-titlebar-close').hide();",self::$jqueryVar);
    $this->_open(new YsJsFunction($noCloseablePattern,'event, ui'));
    return $this;
  }
  
  public function noClosableNever(){
    $this->noClosable();
    $this->_beforeclose(new YsJsFunction("return false",'event, ui'));
    return $this;
  }
  
  // WIJMO BUTTONS
  
  public function _configureCaptionButton(array $button){
    $this->mergeOptions('_captionButtons', $button);
  }
  
  /**
   * Please use _maximizable
   * @param boolean $value
   * @return YsUIDialog 
   */
  public function _canMaximize($value = true){
    $this->_maximizable($value);
    return $this;
  }
  
  /**
   * Please use _minimizable
   * @deprecated
   * @param boolean $value
   * @return YsUIDialog 
   */
  public function _canMinimize($value = true){
    $this->_minimizable($value);
    return $this;
  }
  
  /**
   * Show or not the maximize button in the the dialog.
   * @param boolean $value 
   * @return YsUIDialog 
   */
  public function _maximizable($value = true){
    $this->_configureCaptionButton(array('maximize' => array('visible' => $value)));
    return $this;
  }
  
  /**
   * Show or not the minimize button in the the dialog.
   * @param boolean $value
   * @return YsUIDialog 
   */
  public function _minimizable($value = true){
    $this->_configureCaptionButton(array('minimize' => array('visible' => $value)));
    return $this;
  }
  
  /**
   * Show or not the pin button in the the dialog.
   * @param boolean $value
   * @return YsUIDialog 
   */
  public function _pinnable($value = true){
    $this->_configureCaptionButton(array('pin' => array('visible' => $value)));
    return $this;
  }
  
  /**
   * Show or not the refresh button in the the dialog.
   * @param type $value
   * @return YsUIDialog 
   */
  public function _refreshable($value = true){
    $this->_configureCaptionButton(array('refresh' => array('visible' => $value)));
    return $this;
  }
  
  /**
   * Show or not the toggle button in the the dialog.
   * @param type $value
   * @return YsUIDialog   pinnable
   */
  public function _togglable($value = true){
    $this->_configureCaptionButton(array('toggle' => array('visible' => $value)));
    return $this;
  }
  
  /**
   * Show or not the close button in the the dialog.
   * @param type $value
   * @return YsUIDialog 
   */
  public function _closeable($value = true){
    $this->_configureCaptionButton(array('close' => array('visible' => $value)));
    return $this;
  }
  
  /**
   * Hide all caption buttons in the title.
   */
  public function _hideAllCaptionButtons(){
    $this->toggleCaptionButtons(false);
    return $this;
  }
  
  /**
   * Show all caption buttons in the title.
   */
  public function _showAllCaptionButtons(){
    $this->toggleCaptionButtons(true);
    return $this;
  }
  
  /**
   * show or hide all caption buttons in the title.
   * @param boolean $value true for show, false for hide.
   */
  private function toggleCaptionButtons($value){
    $this->_maximizable($value);
    $this->_minimizable($value);
    $this->_togglable($value);
    $this->_refreshable($value);
    $this->_pinnable($value);
    $this->_closeable($value);
  }
}