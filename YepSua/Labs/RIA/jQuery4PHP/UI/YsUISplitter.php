<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUISplitter todo description.
 * 
 * @method YsUISplitter _barZIndex A value that indicates the z-index (stack order) of the splitter bar.
 * @method YsUISplitter _showExpander A Boolean value that determines whether the expander of the wijsplitter widget is shown.
 * @method YsUISplitter _splitterDistance  Gets or sets the location of the splitter, in pixels, from the left or top edge of the SplitContainer.
 * @method YsUISplitter _orientation Gets or sets a value indicating the horizontal or vertical orientation of the SplitContainer panels.
 * @method YsUISplitter _fullSplit Gets or sets a value that indicates whether the widget fills the whole page.
 * @method YsUISplitter _resizeSettings Defines the animation while the bar of the splitter is being dragged.
                                        animationDuration Defines how long (in milliseconds) the sliding animation will run.
                                        easing The easing effect that is applied to the animation.
                                        ghost Gets or sets a value that determines whether an outline of a panel appears while dragging the splitter bar.
                                        increment Gets or sets the movement span of incremental resizing.
 * @method YsUISplitter _panel1 Defines the information for the top or left panel of the splitter.
                                minSize Gets or sets the minimum distance in pixels when resizing the splitter.
                                collapsed Gets or sets a value determining whether the splitter panel is collapsed or expanded.
                                scrollBars Gets or sets the type of scroll bars to display for the splitter panel.
 * @method YsUISplitter _panel2 Defines the information for the bottom or right panel of the splitter.
                                minSize Gets or sets the minimum distance in pixels when resizing the splitter.
                                collapsed Gets or sets a value determining whether the splitter panel is collapsed or expanded.
                                scrollBars Gets or sets the type of scroll bars to display for the splitter panel.
 * @method YsUISplitter _sizing Gets or sets the javascript function name that would be called at the client side when a user is dragging the splitter.
 * @method YsUISplitter _sized Gets or sets the javascript function name that would be called at the client side when the user is done dragging the splitter.
 * @method YsUISplitter _expand Gets or sets the javascript function name to be called before panel1 is expanded.
 * @method YsUISplitter _collapse Gets or sets the javascript function name to be called before panel1 is collapsed.
 * @method YsUISplitter _expanded Gets or sets the javascript function name to be called when panel1 is expanded by clicking the collapse/expand
 * @method YsUISplitter _collapsed Gets or sets the javascript function name to be called when panel1 is collapsed by clicking the collapse/expand
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUISplitter extends YsUICore {

  public static $uiEvent = YsUIConstant::SPLITTER_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_barZIndex' =>  array('key' => 'barZIndex', 'is_quoted' => false)
              ,'_showExpander' =>  array('key' => 'showExpander', 'is_quoted' => false)
              ,'_splitterDistance' =>  array('key' => 'splitterDistance', 'is_quoted' => false)
              ,'_orientation' =>  array('key' => 'orientation', 'is_quoted' => false)
              ,'_fullSplit' =>  array('key' => 'fullSplit', 'is_quoted' => false)
              ,'_resizeSettings' =>  array('key' => 'resizeSettings', 'is_quoted' => false)
              ,'_panel1' =>  array('key' => 'panel1', 'is_quoted' => false)
              ,'_panel2' =>  array('key' => 'panel2', 'is_quoted' => false)
              ,'_sizing' =>  array('key' => 'sizing', 'is_quoted' => false)
              ,'_sized' =>  array('key' => 'sized', 'is_quoted' => false)  
              ,'_expand' =>  array('key' => 'expand', 'is_quoted' => false)  
              ,'_collapse' =>  array('key' => 'collapse', 'is_quoted' => false)  
              ,'_expanded' =>  array('key' => 'expanded', 'is_quoted' => false)  
              ,'_collapsed' =>  array('key' => 'collapsed', 'is_quoted' => false)  
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
  * @return YsUISplitter
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
   * @return YsUISplitter
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  //WIDGET METHODS

  public static function refresh($jquerySelector,$size = null, $state = null){
    return self::callJQueryMethodIn($jquerySelector,self::$uiEvent,YsUIConstant::REFRESH_METHOD,$size,$state);
  }
  
  public static function initSection($sectionId = null, $htmlProperties = null){
    return self::initWidget($sectionId, $htmlProperties);
  }
  
  public static function endSection(){
    return self::endWidget();
  }
}