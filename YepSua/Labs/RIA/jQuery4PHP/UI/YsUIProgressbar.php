<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIProgressbar The progress bar is designed to simply display the current %
 * complete for a process.
 * 
 * @method YsUIProgressbar _disabled Disables (true) or enables (false) the progressbar. 
 * @method YsUIProgressbar _value The value of the progressbar.
 * @method YsUIProgressbar _create This event is triggered when progressbar is created.
 * @method YsUIProgressbar _change This event is triggered when the value of the progressbar changes.
 * @method YsUIProgressbar _complete This event is triggered when the value of the progressbar reaches the maximum value of 100.
 *
 * @method YsUIProgressbar _labelAlign The label's alignment on the progress bar. The value should be "west","east","center","north","south", or "running".
 * @method YsUIProgressbar _maxValue The max value of the progress bar.
 * @method YsUIProgressbar _minValue The minimum value of the progress bar.
 * @method YsUIProgressbar _fillDirection The fill direction of the progress bar. The value should be "east","west","south" or "north".
 * @method YsUIProgressbar _labelFormatString Sets the format of the label text {0} or {ProgressValue} express the current progress value
                           {1} or {PercentProgress} express the current percent of the progress bar
                           {2} or {RemainingProgress} express the remaining progress of the progress bar
                           {3} or {PercentageRemaining} express the remaining percent of the progress bar
                           {4} or {Min} express the min value of the progress bar
                           {5} or {Max} express the max value of the progress bar 
 * @method YsUIProgressbar _toolTipFormatString Set the format of the ToolTip of the progress bar,the expression of the format like the labelFormatString. 
 * @method YsUIProgressbar _indicatorIncrement The increment of the progress bar's indicator. 
 * @method YsUIProgressbar _indicatorImage The URL of the image's indicator. 
 * @method YsUIProgressbar _animationOptions The options parameter of the jQuery's animation. 
 * @method YsUIProgressbar _animationDelay Gets or sets the delay time of the progress bar's animation in milliseconds.
 * @method YsUIProgressbar _progressChanging Fire upon running the progress.
 * @method YsUIProgressbar _beforeProgressChanging Fires before running the progress.
 * @method YsUIProgressbar _progressChanged Fires when the progress changes.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIProgressbar  extends YsUICore {

  public static $uiEvent = YsUIConstant::PROGRESSBAR_WIDGET;
  public static $intervalTime = 20;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
              //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_value' =>  array('key' => 'value', 'is_quoted' => false)
              // events
              ,'_create' =>  array('key' => 'create', 'is_quoted' => false)
              ,'_change' =>  array('key' => 'change', 'is_quoted' => false)
              ,'_complete' =>  array('key' => 'complete', 'is_quoted' => false)
              // WIJMO
              ,'_labelAlign' =>  array('key' => 'labelAlign', 'is_quoted' => false)
              ,'_maxValue' =>  array('key' => 'maxValue', 'is_quoted' => false)
              ,'_minValue' =>  array('key' => 'minValue', 'is_quoted' => false)
              ,'_fillDirection' =>  array('key' => 'fillDirection', 'is_quoted' => false)
              ,'_labelFormatString' =>  array('key' => 'labelFormatString', 'is_quoted' => false)
              ,'_toolTipFormatString' =>  array('key' => 'toolTipFormatString', 'is_quoted' => false)
              ,'_indicatorIncrement' =>  array('key' => 'indicatorIncrement', 'is_quoted' => false)
              ,'_indicatorImage' =>  array('key' => 'indicatorImage', 'is_quoted' => false)
              ,'_animationOptions' =>  array('key' => 'animationOptions', 'is_quoted' => false)
              ,'_animationDelay' =>  array('key' => 'animationDelay', 'is_quoted' => false)
              ,'_progressChanging' =>  array('key' => 'progressChanging', 'is_quoted' => false)
              ,'_beforeProgressChanging' =>  array('key' => 'beforeProgressChanging', 'is_quoted' => false)
              ,'_progressChanged' =>  array('key' => 'progressChanged', 'is_quoted' => false)        
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
  * @return YsUIProgressbar
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
   * @return YsUIProgressbar
   */
  public static function build($jquerySelector = null, $value = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    if($value !== null){
      $jquery->value($value);
    }
    return $jquery;
  }

  /**
   * This method gets or sets the current value of the progressbar.
   * If no value is specified, will act as a getter.
   * @param string $jquerySelector A jQuery selector
   * @param string $value The value
   * @return YsJQueryCore
   */
  public static function widgetValue($jquerySelector = null, $value = null){
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
   * This method sets the current value of the progressbar (animated).
   * @param string $jquerySelector A jQuery selector
   * @param string $value The value
   * @return string jQuery Sintax
   */
  public static function widgetValueAnimated($jquerySelector, $value){
    return self::getAnimatedPresintax($jquerySelector, $value);
  }

  //TEMPLATES

  /**
   * Protected internal function
   * Get the jQuery code to create the progressbar animation, when change the value.
   * @param string $jquerySelector A jQuery selector
   * @return string jQuery sintax
   */
  protected static function getAnimatedIntervalSintax($jquerySelector){
    $newValue =  self::widgetValue($jquerySelector,YsArgument::likeVar('newValue'));
    return str_replace('$', self::$jqueryVar, "function(){
            widget = $('" . $jquerySelector . "');
            if(i <= newValue){
            support = widget.children().css('width' , i + '%')
            }else{
            support = clearInterval(interval);
            " . $newValue . ";
            }
            i++;}");
  }

  /**
   * Protected internal function
   * Get the jQuery code to create the progressbar animation, when change the value.
   * @param string $jquerySelector A jQuery selector
   * @param string $value The value
   * @return string jQuery sintax
   */
  protected static function getAnimatedPresintax($jquerySelector, $value){
    $template = 'var barVal = %s; var i = (%s <= barVal) ? 0 : barVal; var newValue = %s;var interval = %s';
    $template = sprintf($template,
      self::widgetValue($jquerySelector),
      $value,
      $value,
      YsJsFunction::setInterval(self::getAnimatedIntervalSintax($jquerySelector), self::$intervalTime)
    );
    return $template;
  }


}