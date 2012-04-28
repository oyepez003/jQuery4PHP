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
 * @method YsUIDatepicker _disabled Disables (true) or enables (false) the datepicker
 * @method YsUIDatepicker _altField The jQuery selector for another field that is to be updated with the selected date from the datepicker.
 * @method YsUIDatepicker _altFormat The dateFormat to be used for the altField option. 
 * @method YsUIDatepicker _appendText The text to display after each date field, e.g. to show the required format.
 * @method YsUIDatepicker _autoSize Set to true to automatically resize the input field to accommodate dates in the current dateFormat.
 * @method YsUIDatepicker _buttonImage The URL for the popup button image. If set, buttonText becomes the alt value and is not directly displayed
 * @method YsUIDatepicker _buttonImageOnly Set to true to place an image after the field to use as the trigger without it appearing on a button.
 * @method YsUIDatepicker _buttonText The text to display on the trigger button. Use in conjunction with showOn equal to 'button' or 'both'.
 * @method YsUIDatepicker _calculateWeek A function to calculate the week of the year for a given date.
 * @method YsUIDatepicker _changeMonth Allows you to change the month by selecting from a drop-down list. You can enable this feature by setting the attribute to true.
 * @method YsUIDatepicker _changeYear Allows you to change the year by selecting from a drop-down list. You can enable this feature by setting the attribute to true.
 * @method YsUIDatepicker _closeText The text to display for the close link.
 * @method YsUIDatepicker _constrainInput When true entry in the input field is constrained to those characters allowed by the current dateFormat.
 * @method YsUIDatepicker _currentText The text to display for the current day link. This attribute is one of the regionalisation attributes. Use the showButtonPanel to display this button.
 * @method YsUIDatepicker _dateFormat The format for parsed and displayed dates.
 * @method YsUIDatepicker _dayNames The list of long day names, starting from Sunday
 * @method YsUIDatepicker _dayNamesMin The list of minimised day names, starting from Sunday
 * @method YsUIDatepicker _dayNamesShort The list of abbreviated day names, starting from Sunday
 * @method YsUIDatepicker _defaultDate Set the date to highlight on first opening if the field is blank
 * @method YsUIDatepicker _duration Control the speed at which the datepicker appears, it may be a time in milliseconds or a string representing one of the three predefined speeds ("slow", "normal", "fast").
 * @method YsUIDatepicker _firstDay Set the first day of the week: Sunday is 0, Monday is 1, ... 
 * @method YsUIDatepicker _gotoCurrent When true the current day link moves to the currently selected date instead of today.
 * @method YsUIDatepicker _hideIfNoPrevNext Normally the previous and next links are disabled when not applicable
 * @method YsUIDatepicker _isRTL Normally the previous and next links are disabled when not applicable
 * @method YsUIDatepicker _maxDate Set a maximum selectable date via a Date object or as a string in the current dateFormat, or a number of days from today (e.g. +7) or a string of values and periods ('y' for years, 'm' for months, 'w' for weeks, 'd' for days, e.g. '+1m +1w'), or null for no limit.
 * @method YsUIDatepicker _minDate Set a minimum selectable date via a Date object or as a string in the current dateFormat, or a number of days from today (e.g. +7) or a string of values and periods ('y' for years, 'm' for months, 'w' for weeks, 'd' for days, e.g. '-1y -1m'), or null for no limit.
 * @method YsUIDatepicker _monthNames The list of full month names, for use as requested via the dateFormat setting.
 * @method YsUIDatepicker _monthNamesShort The list of abbreviated month names, as used in the month header on each datepicker and as requested via the dateFormat setting.
 * @method YsUIDatepicker _navigationAsDateFormat When true the formatDate function is applied to the prevText, nextText, and currentText values before display, allowing them to display the target month names for example.
 * @method YsUIDatepicker _nextText The text to display for the next month link.
 * @method YsUIDatepicker _numberOfMonths Set how many months to show at once.
 * @method YsUIDatepicker _prevText The text to display for the previous month link.
 * @method YsUIDatepicker _selectOtherMonths When true days in other months shown before or after the current month are selectable.
 * @method YsUIDatepicker _shortYearCutoff Set the cutoff year for determining the century for a date (used in conjunction with dateFormat 'y'). If a numeric value (0-99) is provided then this value is used directly.
 * @method YsUIDatepicker _showAnim Set the name of the animation used to show/hide the datepicker
 * @method YsUIDatepicker _showButtonPanel Whether to show the button panel.
 * @method YsUIDatepicker _showCurrentAtPos Specify where in a multi-month display the current month shows, starting from 0 at the top/left.
 * @method YsUIDatepicker _showMonthAfterYear Whether to show the month after the year in the header.
 * @method YsUIDatepicker _showOn Whether to show the month after the year in the header.
 * @method YsUIDatepicker _showOptions If using one of the jQuery UI effects for showAnim, you can provide additional settings for that animation via this option.
 * @method YsUIDatepicker _showOtherMonths Display dates in other months (non-selectable) at the start or end of the current month.
 * @method YsUIDatepicker _showWeek Display dates in other months (non-selectable) at the start or end of the current month.
 * @method YsUIDatepicker _stepMonths Set how many months to move when clicking the Previous/Next links.
 * @method YsUIDatepicker _weekHeader The text to display for the week of the year column heading.
 * @method YsUIDatepicker _yearRange Control the range of years displayed in the year drop-down: either relative to today's year (-nn:+nn), relative to the currently selected year (c-nn:c+nn), absolute (nnnn:nnnn), or combinations of these formats (nnnn:-nn).
 * @method YsUIDatepicker _yearSuffix Additional text to display after the year in the month headers
 * @method YsUIDatepicker _create This event is triggered when datepicker is created.
 * @method YsUIDatepicker _beforeShow Can be a function that takes an input field and current datepicker instance and returns an options object to update the datepicker with.
 * @method YsUIDatepicker _beforeShowDay The function takes a date as a parameter and must return an array with [0] equal to true/false indicating whether or not this date is selectable, [1] equal to a CSS class name(s) or '' for the default presentation, and [2] an optional popup tooltip for this date.
 * @method YsUIDatepicker _onChangeMonthYear Allows you to define your own event when the datepicker moves to a new month and/or year.
 * @method YsUIDatepicker _onClose Allows you to define your own event when the datepicker is closed, whether or not a date is selected.
 * @method YsUIDatepicker _onSelect Allows you to define your own event when the datepicker is selected.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUIDatepicker  extends YsUICore {

  public static $uiEvent = YsUIConstant::DATEPICKER_WIDGET;

  /**
   * @return array options and events for this widget
   */
  public function registerOptions() {
    return   array(
               //options
               '_disabled' =>  array('key' => 'disabled', 'is_quoted' => false)
              ,'_altField' =>  array('key' => 'altField', 'is_quoted' => false)
              ,'_altFormat' =>  array('key' => 'altFormat', 'is_quoted' => false)
              ,'_appendText' =>  array('key' => 'appendText', 'is_quoted' => false)
              ,'_autoSize' =>  array('key' => 'autoSize', 'is_quoted' => false)
              ,'_buttonImage' =>  array('key' => 'buttonImage', 'is_quoted' => false)
              ,'_buttonImageOnly' =>  array('key' => 'buttonImageOnly', 'is_quoted' => false)
              ,'_buttonText' =>  array('key' => 'buttonText', 'is_quoted' => false)
              ,'_calculateWeek' =>  array('key' => 'calculateWeek', 'is_quoted' => false)
              ,'_changeMonth' =>  array('key' => 'changeMonth', 'is_quoted' => false)
              ,'_changeYear' =>  array('key' => 'changeYear', 'is_quoted' => false)
              ,'_closeText' =>  array('key' => 'closeText', 'is_quoted' => false)
              ,'_constrainInput' =>  array('key' => 'constrainInput', 'is_quoted' => false)
              ,'_currentText' =>  array('key' => 'currentText', 'is_quoted' => false)
              ,'_dateFormat' =>  array('key' => 'dateFormat', 'is_quoted' => false)
              ,'_dayNames' =>  array('key' => 'dayNames', 'is_quoted' => false)
              ,'_dayNamesMin' =>  array('key' => 'dayNamesMin', 'is_quoted' => false)
              ,'_dayNamesShort' =>  array('key' => 'dayNamesShort', 'is_quoted' => false)
              ,'_defaultDate' =>  array('key' => 'defaultDate', 'is_quoted' => false)
              ,'_duration' =>  array('key' => 'duration', 'is_quoted' => false)
              ,'_firstDay' =>  array('key' => 'firstDay', 'is_quoted' => false)
              ,'_gotoCurrent' =>  array('key' => 'gotoCurrent', 'is_quoted' => false)
              ,'_hideIfNoPrevNext' =>  array('key' => 'hideIfNoPrevNext', 'is_quoted' => false)
              ,'_isRTL' =>  array('key' => 'isRTL', 'is_quoted' => false)
              ,'_maxDate' =>  array('key' => 'maxDate', 'is_quoted' => false)
              ,'_minDate' =>  array('key' => 'minDate', 'is_quoted' => false)
              ,'_monthNames' =>  array('key' => 'monthNames', 'is_quoted' => false)
              ,'_monthNamesShort' =>  array('key' => 'monthNamesShort', 'is_quoted' => false)
              ,'_navigationAsDateFormat' =>  array('key' => 'navigationAsDateFormat', 'is_quoted' => false)
              ,'_nextText' =>  array('key' => 'nextText', 'is_quoted' => false)
              ,'_numberOfMonths' =>  array('key' => 'numberOfMonths', 'is_quoted' => false)
              ,'_prevText' =>  array('key' => 'prevText', 'is_quoted' => false)
              ,'_selectOtherMonths' =>  array('key' => 'selectOtherMonths', 'is_quoted' => false)
              ,'_shortYearCutoff' =>  array('key' => 'shortYearCutoff', 'is_quoted' => false)
              ,'_showAnim' =>  array('key' => 'showAnim', 'is_quoted' => false)
              ,'_showButtonPanel' =>  array('key' => 'showButtonPanel', 'is_quoted' => false)
              ,'_showCurrentAtPos' =>  array('key' => 'showCurrentAtPos', 'is_quoted' => false)
              ,'_showMonthAfterYear' =>  array('key' => 'showMonthAfterYear', 'is_quoted' => false)
              ,'_showOn' =>  array('key' => 'showOn', 'is_quoted' => false)
              ,'_showOptions' =>  array('key' => 'showOptions', 'is_quoted' => false)
              ,'_showOtherMonths' =>  array('key' => 'showOtherMonths', 'is_quoted' => false)
              ,'_showWeek' =>  array('key' => 'showWeek', 'is_quoted' => false)
              ,'_stepMonths' =>  array('key' => 'stepMonths', 'is_quoted' => false)
              ,'_weekHeader' =>  array('key' => 'weekHeader', 'is_quoted' => false)
              ,'_yearRange' =>  array('key' => 'yearRange', 'is_quoted' => false)
              ,'_yearSuffix' =>  array('key' => 'yearSuffix', 'is_quoted' => false)
              // events
              ,'_create' => array('key' => 'create', 'is_quoted' => false)
              ,'_beforeShow' => array('key' => 'beforeShow', 'is_quoted' => false)
              ,'_beforeShowDay' => array('key' => 'beforeShowDay', 'is_quoted' => false)
              ,'_onChangeMonthYear' => array('key' => 'onChangeMonthYear', 'is_quoted' => false)
              ,'_onClose' => array('key' => 'onClose', 'is_quoted' => false)
              ,'_onSelect' => array('key' => 'onSelect', 'is_quoted' => false));
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
  * @return YsUIDatepicker
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
   * @return YsUIDatepicker 
   */
  public static function build($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$uiEvent);
    if($jquerySelector !== null) { $jquery->setSelector($jquerySelector); }
    return $jquery;
  }

  public static function datepicker($jquerySelector = null){
    return self::build($jquerySelector);
  }

  public static function datetimepicker($jquerySelector = null){
    return YsUIDateTimepicker::datetimepicker($jquerySelector);
  }

  public static function timepicker($jquerySelector = null){
    return YsUIDateTimepicker::timepicker($jquerySelector);
  }

  public static function daterangepicker($jquerySelector = null){
    return YsUIDateRangepicker::build($jquerySelector);
  }

  // WIDGET METHODS

  /**
   * Open a datepicker in a "dialog" box.
   * @param string $date The initial date for the date picker as either a Date
   * or a string in the current date format.
   * @param string $onSelect A callback function when a date is selected.
   * The function receives the date text and date picker instance as parameters.
   * @param array $settings The new settings for the date picker. 
   * @param array $pos The position of the top/left of the dialog as array(x, y) or
   * a MouseEvent that contains the coordinates.
   * If not specified the dialog is centered on the screen.
   * @return object YsJQueryCore
   */
  public static function dialog($date , $onSelect = null, $settings = null,
                                $pos = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::DIALOG_WIDGET));
    if($date !== null){
      $jquery->value($date);
    }
    if($onSelect !== null){
      $jquery->value($onSelect);
    }
    if($settings !== null){
      $jquery->value($settings);
    }
    if($pos !== null){
      $jquery->value($pos);
    }
    return $jquery;
  }

  /**
   * Determine whether a date picker has been disabled.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function isDisabled($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::IS_DISABLED));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  /**
   * Close a previously opened date picker.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function hide($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::HIDE_EFFECT));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  /**
   * Call up a previously attached date picker.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function show($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::SHOW_EFFECT));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  /**
   * Redraw a date picker, after having made some external modifications.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
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

  /**
   * Returns the current date for the datepicker or null if no date has been
   * selected.
   * @param string $jquerySelector A jQuery selector
   * @return object YsJQueryCore
   */
  public static function getDate($jquerySelector = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::GET_DATE_METHOD));
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  /**
   * Returns the current date for the datepicker or null if no date has been
   * selected.
   * @param string/number $date  A number of days from today (e.g. +7) or a
   * string of values and periods ('y' for years, 'm' for months, 'w' for weeks,
   * 'd' for days, e.g. '+1m +7d'), or null to clear the selected date.
   * @return object YsJQueryCore
   */
  public static function setDate($jquerySelector = null, $date = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$uiEvent);
    $jquery->addArgument(new YsArgument(YsUIConstant::SET_DATE_METHOD));
    if($date !== null){
      $jquery->setSelector($jquerySelector);
      $jquery->value($date);
    }else{
      if($jquerySelector !== null){
        $jquery->value($jquerySelector);
      }
    }
    return $jquery;
  }

  /**
   * Synchronize two datepickers,
   * should be used with the function ::doSynchronization()
   * @return string javascript sintax
   */
  public function synchronize(){
    return sprintf('var dates = %s', $this);
  }

  /**
   * Returns the javascript function to synchronize two datepickers
   * @param string $datePickerFromId The datepicker for MIN date
   * @param string $datePickerToId The datepicker for MAX date
   * @return object YsJsFunction
   */
  public static function doSynchronization($datePickerFromId, $datePickerToId){
    $body = self::getSynchronizeSintax($datePickerFromId, $datePickerToId);
    return new YsJsFunction($body, 'selectedDate');
  }

  /**
   * Protected internal function
   * Returns the javascript code to synchronize two datepickers
   * @param string $datePickerFromId The datepicker for MIN date
   * @param string $datePickerToId The datepicker for MAX date
   * @return string javascript sintax
   */
  protected static function getSynchronizeSintax($datePickerFromId, $datePickerToId){
    $pattern = 'var option = this.id == "%s" ? "minDate" : "maxDate";
        var option = this.id == "%s" ? "maxDate" : "minDate";
				var instance = $(this).data("datepicker");
				var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
				dates.not(this).datepicker("option", option, date);';
    $pattern = sprintf($pattern,$datePickerFromId, $datePickerToId);
    $pattern = str_ireplace('$', self::$jqueryVar,$pattern);
    return $pattern;
  }

  public static function hideDateRangepicker($jquerySelector = '.ui-daterangepicker', $duration = 300){
    return YsUIDateRangepicker::hide($jquerySelector, $duration);
  }

  public static function showDateRangepicker($jquerySelector = '.ui-daterangepicker', $duration = 300){
    return YsUIDateRangepicker::show($jquerySelector, $duration);
  }

}