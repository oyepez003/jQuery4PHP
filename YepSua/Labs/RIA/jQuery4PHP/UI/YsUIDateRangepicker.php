<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsUIDatepicker The jQuery UI Datepicker is a highly configurable plugin that
 * adds datepicker functionality to your pages. You can customize the date
 * format and language, restrict the selectable date ranges and add in buttons
 * and other navigation options easily.
 * 
 * @method YsUIDateRangepicker _presetRanges
 * @method YsUIDateRangepicker _presets
 * @method YsUIDateRangepicker _rangeStartTitle
 * @method YsUIDateRangepicker _rangeEndTitle
 * @method YsUIDateRangepicker _doneButtonText
 * @method YsUIDateRangepicker _prevLinkText
 * @method YsUIDateRangepicker _nextLinkText
 * @method YsUIDateRangepicker _earliestDate
 * @method YsUIDateRangepicker _latestDate
 * @method YsUIDateRangepicker _dateFormat
 * @method YsUIDateRangepicker _closeOnSelect
 * @method YsUIDateRangepicker _arrows
 * @method YsUIDateRangepicker _posX
 * @method YsUIDateRangepicker _posY
 * @method YsUIDateRangepicker _appendTo
 * @method YsUIDateRangepicker _onOpen
 * @method YsUIDateRangepicker _onClose
 * @method YsUIDateRangepicker _onChange
 * @method YsUIDateRangepicker _datepickerOptions
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIDateRangepicker  extends YsUICore {

  public static $uiEvent = YsUIConstant::DATERANGEPICKER_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
         //options
         '_presetRanges' =>  array('key' => 'presetRanges', 'is_quoted' => false),
         '_presets' =>  array('key' => 'presets', 'is_quoted' => false),
         '_rangeStartTitle' =>  array('key' => 'rangeStartTitle', 'is_quoted' => false),
         '_rangeEndTitle' =>  array('key' => 'rangeEndTitle', 'is_quoted' => false),
         '_doneButtonText' =>  array('key' => 'doneButtonText', 'is_quoted' => false),
         '_prevLinkText' =>  array('key' => 'prevLinkText', 'is_quoted' => false),
         '_nextLinkText' =>  array('key' => 'nextLinkText', 'is_quoted' => false),
         '_earliestDate' =>  array('key' => 'earliestDate', 'is_quoted' => false),
         '_latestDate' =>  array('key' => 'latestDate', 'is_quoted' => false),
         '_dateFormat' =>  array('key' => 'dateFormat', 'is_quoted' => false),
         '_closeOnSelect' =>  array('key' => 'closeOnSelect', 'is_quoted' => false),
         '_arrows' =>  array('key' => 'arrows', 'is_quoted' => false),
         '_posX' =>  array('key' => 'posX', 'is_quoted' => false),
         '_posY' =>  array('key' => 'posY', 'is_quoted' => false),
         '_appendTo' =>  array('key' => 'appendTo', 'is_quoted' => false),
        // events
         '_onOpen' =>  array('key' => 'onOpen', 'is_quoted' => false),
         '_onClose' =>  array('key' => 'onClose', 'is_quoted' => false),
         '_onChange' =>  array('key' => 'onChange', 'is_quoted' => false),
        // datepickerOptions
         '_datepickerOptions' =>  array('key' => 'datepickerOptions', 'is_quoted' => false));
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
  * @return YsUIDateRangepicker
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
   * @return YsUIDateRangepicker 
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);   
    if($jquerySelector !== null) {
      $jquery->setSelector($jquerySelector);
      $jquery->conditionNOT(
        new YsJQueryDynamic(
          YsJQuery::parent()->in($jquerySelector),
          YsJQuery::hasClass('ui-daterangepicker-arrows')
        )
      );
    }
    return $jquery;
  }

  public static function daterangepicker($jquerySelector = null){
    return self::build($jquerySelector);
  }

  public static function hide($jquerySelector = '.ui-daterangepicker', $duration = 300){
    return YsJQuery::fadeOut($duration)->in($jquerySelector);
  }

  public static function show($jquerySelector = '.ui-daterangepicker', $duration = 300){
    return YsJQuery::fadeIn($duration)->in($jquerySelector);
  }

  public static function configureDefaultPresetRanges($localNames, $defaultPresetRanges = null){
    $defaultPresetRanges = self::getDefaultPresetRanges($defaultPresetRanges);
    foreach($localNames as $name => $localName){
      $defaultPresetRanges = str_replace($name, $localName,$defaultPresetRanges);
    }
    return YsArgument::value($defaultPresetRanges);
  }

  private static function getDefaultPresetRanges($dedaults = null){
  $dedaults = ($dedaults === null) ? <<<EOF
   [
			{text: 'Today', dateStart: 'today', dateEnd: 'today' },
			{text: 'Last 7 days', dateStart: 'today-7days', dateEnd: 'today' },
			{text: 'Month to date', dateStart: function(){ return Date.parse('today').moveToFirstDayOfMonth();  }, dateEnd: 'today' },
			{text: 'Year to date', dateStart: function(){ var x= Date.parse('today'); x.setMonth(0); x.setDate(1); return x; }, dateEnd: 'today' },
			//extras:
			{text: 'The previous Month', dateStart: function(){ return Date.parse('1 month ago').moveToFirstDayOfMonth();  }, dateEnd: function(){ return Date.parse('1 month ago').moveToLastDayOfMonth();  } }
			//{text: 'Tomorrow', dateStart: 'Tomorrow', dateEnd: 'Tomorrow' },
			//{text: 'Ad Campaign', dateStart: '03/07/08', dateEnd: 'Today' },
			//{text: 'Last 30 Days', dateStart: 'Today-30', dateEnd: 'Today' },
			//{text: 'Next 30 Days', dateStart: 'Today', dateEnd: 'Today+30' },
			//{text: 'Our Ad Campaign', dateStart: '03/07/08', dateEnd: '07/08/08' }
		]
EOF
  : $dedaults;
  return $dedaults;
  }

}