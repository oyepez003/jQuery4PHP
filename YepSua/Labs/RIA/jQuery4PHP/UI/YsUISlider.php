<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUISlider todo description.
 * 
 * @method YsUISlider _disabled Disables (true) or enables (false) the slider.
 * @method YsUISlider _animate Disables (true) or enables (false) the slider
 * @method YsUISlider _max The maximum value of the slider.
 * @method YsUISlider _min The minimum value of the slider.
 * @method YsUISlider _orientation This option determines whether the slider has the min at the left, the max at the right or the min at the bottom, the max at the top. Possible values: 'horizontal', 'vertical'.
 * @method YsUISlider _range If set to true, the slider will detect if you have two handles and create a stylable range element between these two.
 * @method YsUISlider _step Determines the size or amount of each interval or step the slider takes between min and max.
 * @method YsUISlider _values This option can be used to specify multiple handles. If range is set to true, the length of 'values' should be 2.
 * @method YsUISlider _create This event is triggered when slider is created.
 * @method YsUISlider _start This event is triggered when the user starts sliding.
 * @method YsUISlider _slide This event is triggered on every mouse move during slide.
 * @method YsUISlider _change This event is triggered on slide stop, or if the value is changed programmatically (by the value method).
 * @method YsUISlider _stop This event is triggered when the user stops sliding.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUISlider extends YsUICore {

  public static $uiEvent = YsUIConstant::SLIDER_WIDGET;
  const MAX_RANGE = 'max';
  const MIN_RANGE = 'min';

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
                '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
               ,'_animate' =>  array('key' => 'animate', 'is_quoted' => false)
               ,'_max' =>  array('key' => 'max', 'is_quoted' => false)
               ,'_min' =>  array('key' => 'min', 'is_quoted' => false)
               ,'_orientation' =>  array('key' => 'orientation', 'is_quoted' => true)
               ,'_range' =>  array('key' => 'range', 'is_quoted' => false)
               ,'_step' =>  array('key' => 'step', 'is_quoted' => false)
               ,'_value' =>  array('key' => 'value', 'is_quoted' => false)
               ,'_values' =>  array('key' => 'values', 'is_quoted' => false)
               // events
               ,'_create' => array('key' => 'create', 'is_quoted' => false)
               ,'_start' => array('key' => 'start', 'is_quoted' => false)
               ,'_slide' => array('key' => 'slide', 'is_quoted' => false)
               ,'_change' => array('key' => 'change', 'is_quoted' => false)
               ,'_stop' => array('key' => 'stop', 'is_quoted' => false)
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
  * @return YsUISlider
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
   * @return YsUISlider
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  //WIDGET METHODS

  /**
   * Gets or sets the value of the slider. For single handle sliders.
   * If no value is specified, will act as a getter.
   * @param string $jquerySelector A jQuery selector
   * @param string $value The value
   * @return YsJQueryCore
   */
  public static function widgetValue($jquerySelector = null , $value = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::VALUE_EVENT));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    if($value !== null){
      $jquery->value($value);
    }
    return $jquery;
  }

  /**
   * Gets or sets the values of the slider. For multiple handle or range sliders.
   * If no value is specified, will act as a getter.
   * @param string $jquerySelector A jQuery selector
   * @param string $index The index to set the value
   * @param string $value The value
   * @return YsJQueryCore
   */
  public static function widgetValues($jquerySelector = null , $index = null, $value = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::VALUES_EVENT));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    if($index !== null){
      $jquery->index($index);
    }
    if($value !== null){
      $jquery->value($value);
    }
    return $jquery;
  }

  //TEMPLATES
  
  /**
   * Determines the value of the slider, if there's only one handle. If there is more than one handle, determines the value of the first handle.
   * @param number $value 
   */
  public function _value($value){
    $value = (is_array($value)) ? $value : array($value);
    return $this->_values($value);
  }
  
}