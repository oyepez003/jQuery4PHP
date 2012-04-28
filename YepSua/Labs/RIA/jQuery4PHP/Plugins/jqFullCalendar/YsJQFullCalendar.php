<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQFullCalendar Provides a full-sized, drag & drop calendar like the one 
 * below.
 *
 * @method YsJQFullCalendar _events An array of Event Objects that will be displayed on the calendar.
 * @method YsJQFullCalendar _editable Determines whether the events on the calendar can be modified.
 * @method YsJQFullCalendar _defaultView The initial view when the calendar loads.
 * @method YsJQFullCalendar _aspectRatio Determines the width-to-height aspect ratio of the calendar.
 * @method YsJQFullCalendar _header Defines the buttons and title at the top of the calendar.
 * @method YsJQFullCalendar _weekends Whether to include Saturday/Sunday columns in any of the calendar views.
 * @method YsJQFullCalendar _isRTL Displays the calendar in right-to-left mode.
 * @method YsJQFullCalendar _firstDay The day that each week begins.
 * @method YsJQFullCalendar _theme Enables/disables use of jQuery UI theming.
 * @method YsJQFullCalendar _buttonIcons Determines which theme icons appear on the header buttons.
 * @method YsJQFullCalendar _weekMode Determines the number of weeks displayed in a month view. Also determines each week's height.
 * @method YsJQFullCalendar _height Will make the entire calendar (including header) a pixel height.
 * @method YsJQFullCalendar _contentHeight Will make the calendar's content area a pixel height.
 * @method YsJQFullCalendar _allDaySlot Determines if the "all-day" slot is displayed at the top of the calendar.
 * @method YsJQFullCalendar _allDayText The text titling the "all-day" slot at the top of the calendar.
 * @method YsJQFullCalendar _axisFormat Determines the time-text that will be displayed on the vertical axis of the agenda views.
 * @method YsJQFullCalendar _slotMinutes The frequency for displaying time slots, in minutes.
 * @method YsJQFullCalendar _defaultEventMinutes Determines the length (in minutes) an event appears to be when it has an unspecified end date.
 * @method YsJQFullCalendar _firstHour Determines the first hour that will be visible in the scroll pane.
 * @method YsJQFullCalendar _minTime Determines the first hour/time that will be displayed, even when the scrollbars have been scrolled all the way up.
 * @method YsJQFullCalendar _maxTime Determines the last hour/time (exclusively) that will be displayed, even when the scrollbars have been scrolled all the way down.
 * @method YsJQFullCalendar _year The initial year when the calendar loads.
 * @method YsJQFullCalendar _month The initial month when the calendar loads.
 * @method YsJQFullCalendar _date The initial date-of-month when the calendar loads.
 * @method YsJQFullCalendar _timeFormat Determines the time-text that will be displayed on each event.
 * @method YsJQFullCalendar _columnFormat Determines the text that will be displayed on the calendar's column headings.
 * @method YsJQFullCalendar _titleFormat Determines the text that will be displayed in the header's title.
 * @method YsJQFullCalendar _buttonText Text that will be displayed on buttons of the header.
 * @method YsJQFullCalendar _monthNames Full names of months.
 * @method YsJQFullCalendar _monthNamesShort Abbreviated names of months.
 * @method YsJQFullCalendar _dayNames Full names of days-of-week.
 * @method YsJQFullCalendar _dayNamesShort Abbreviated names of days-of-week.
 * @method YsJQFullCalendar _selectable Allows a user to highlight multiple days or timeslots by clicking and dragging.
 * @method YsJQFullCalendar _selectHelper Whether to draw a "placeholder" event while the user is dragging.
 * @method YsJQFullCalendar _unselectAuto Whether clicking elsewhere on the page will cause the current selection to be cleared.
 * @method YsJQFullCalendar _unselectCancel A way to specify elements that will ignore the unselectAuto option.
 * @method YsJQFullCalendar _eventSources A way to specify multiple event sources.
 * @method YsJQFullCalendar _allDayDefault Determines the default value for each Event Object's allDay property, when it is unspecified.
 * @method YsJQFullCalendar _ignoreTimezone When parsing ISO8601 dates, whether UTC offsets should be ignored while processing event source data.
 * @method YsJQFullCalendar _startParam A GET parameter of this name will be inserted into each JSON feed's URL.
 * @method YsJQFullCalendar _endParam A GET parameter of this name will be inserted into each JSON feed's URL.
 * @method YsJQFullCalendar _lazyFetching Determines when event fetching should occur.
 * @method YsJQFullCalendar _eventColor How to change colors of events through CSS. 
 * @method YsJQFullCalendar _eventBackgroundColor Sets the background and border colors for all events on the calendar.
 * @method YsJQFullCalendar _eventBorderColor Sets the border color for all events on the calendar.
 * @method YsJQFullCalendar _eventTextColor Sets the text color for all events on the calendar.
 * @method YsJQFullCalendar _disableDragging Disables all event dragging, even when events are editable.
 * @method YsJQFullCalendar _disableResizing Disables all event resizing, even when events are editable.
 * @method YsJQFullCalendar _dragRevertDuration Time it takes for an event to revert to its original position after an unsuccessful drag.
 * @method YsJQFullCalendar _dragOpacity The opacity of an event while it is being dragged.
 * @method YsJQFullCalendar _droppable Determines if jQuery UI draggables can be dropped onto the calendar.
 * @method YsJQFullCalendar _dropAccept Provides a way to filter which elements can be dropped onto the calendar.
 * @method YsJQFullCalendar _viewDisplay Triggered when the calendar loads and every time a different date-range is displayed.
 * @method YsJQFullCalendar _windowResize Triggered after the calendar's dimensions have been changed due to the browser window being resized.
 * @method YsJQFullCalendar _dayClick Triggered when the user clicks on a day.
 * @method YsJQFullCalendar _eventClick Triggered when the user clicks an event.
 * @method YsJQFullCalendar _eventMouseover Triggered when the user mouses over an event.
 * @method YsJQFullCalendar _eventMouseout Triggered when the user mouses out of an event.
 * @method YsJQFullCalendar _select A callback that will fire after a selection is made.
 * @method YsJQFullCalendar _unselect A callback that will fire when the current selection is cleared.
 * @method YsJQFullCalendar _loading Triggered when event fetching starts/stops.
 * @method YsJQFullCalendar _eventRender Triggered while an event is being rendered.
 * @method YsJQFullCalendar _eventAfterRender Triggered after an event has been placed on the calendar in its final position.
 * @method YsJQFullCalendar _eventDragStart Triggered when event dragging begins.
 * @method YsJQFullCalendar _eventDragStop Triggered when event dragging stops.
 * @method YsJQFullCalendar _eventDrop Triggered when dragging stops and the event has moved to a different day/time.
 * @method YsJQFullCalendar _eventResizeStart Triggered when event resizing begins.
 * @method YsJQFullCalendar _eventResizeStop Triggered when event resizing stops.
 * @method YsJQFullCalendar _eventResize Triggered when resizing stops and the event has changed in duration.
 * @method YsJQFullCalendar _drop Called when a valid jQuery UI draggable has been dropped onto the calendar.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQFullCalendar extends YsJQueryPlugin {

  const VERSION = "1.5.2";
  const LICENSE = "MIT and GPL licenses";

  public static $event = 'fullCalendar';

  public function registerOptions(){
    return   array(
              //options 
               '_events' =>  array('key' => 'events', 'is_quoted' => false),
               '_editable' =>  array('key' => 'editable', 'is_quoted' => false),
               '_defaultView' =>  array('key' => 'defaultView', 'is_quoted' => false),
               '_aspectRatio' =>  array('key' => 'aspectRatio', 'is_quoted' => false),
               '_header' =>  array('key' => 'header', 'is_quoted' => false),
               '_weekends' =>  array('key' => 'weekends', 'is_quoted' => false),
               '_isRTL' =>  array('key' => 'isRTL', 'is_quoted' => false),
               '_firstDay' =>  array('key' => 'firstDay', 'is_quoted' => false),
               '_theme' =>  array('key' => 'theme', 'is_quoted' => false),
               '_buttonIcons' =>  array('key' => 'buttonIcons', 'is_quoted' => false),
               '_weekMode' =>  array('key' => 'weekMode', 'is_quoted' => false),
               '_height' =>  array('key' => 'height', 'is_quoted' => false),
               '_contentHeight' =>  array('key' => 'contentHeight', 'is_quoted' => false),
               '_allDaySlot' =>  array('key' => 'allDaySlot', 'is_quoted' => false),
               '_allDayText' =>  array('key' => 'allDayText', 'is_quoted' => false),
               '_axisFormat' =>  array('key' => 'axisFormat', 'is_quoted' => false),
               '_slotMinutes' =>  array('key' => 'slotMinutes', 'is_quoted' => false),
               '_defaultEventMinutes' =>  array('key' => 'defaultEventMinutes', 'is_quoted' => false),
               '_firstHour' =>  array('key' => 'firstHour', 'is_quoted' => false),
               '_minTime' =>  array('key' => 'minTime', 'is_quoted' => false),
               '_maxTime' =>  array('key' => 'maxTime', 'is_quoted' => false),
               '_year' =>  array('key' => 'year', 'is_quoted' => false),
               '_month' =>  array('key' => 'month', 'is_quoted' => false),
               '_date' =>  array('key' => 'date', 'is_quoted' => false),
               '_timeFormat' =>  array('key' => 'timeFormat', 'is_quoted' => false),
               '_columnFormat' =>  array('key' => 'columnFormat', 'is_quoted' => false),
               '_titleFormat' =>  array('key' => 'titleFormat', 'is_quoted' => false),
               '_buttonText' =>  array('key' => 'buttonText', 'is_quoted' => false),
               '_monthNames' =>  array('key' => 'monthNames', 'is_quoted' => false),
               '_monthNamesShort' =>  array('key' => 'monthNamesShort', 'is_quoted' => false),
               '_dayNames' =>  array('key' => 'dayNames', 'is_quoted' => false),
               '_dayNamesShort' =>  array('key' => 'dayNamesShort', 'is_quoted' => false),
               '_selectable' =>  array('key' => 'selectable', 'is_quoted' => false),
               '_selectHelper' =>  array('key' => 'selectHelper', 'is_quoted' => false),
               '_unselectAuto' =>  array('key' => 'unselectAuto', 'is_quoted' => false),
               '_unselectCancel' =>  array('key' => 'unselectCancel', 'is_quoted' => false),
               '_eventSources' =>  array('key' => 'eventSources', 'is_quoted' => false),
               '_allDayDefault' =>  array('key' => 'allDayDefault', 'is_quoted' => false),
               '_ignoreTimezone' =>  array('key' => 'ignoreTimezone', 'is_quoted' => false),
               '_startParam' =>  array('key' => 'startParam', 'is_quoted' => false),
               '_endParam' =>  array('key' => 'endParam', 'is_quoted' => false),
               '_lazyFetching' =>  array('key' => 'lazyFetching', 'is_quoted' => false),
               '_eventColor' =>  array('key' => 'eventColor', 'is_quoted' => false),
               '_eventBackgroundColor' =>  array('key' => 'eventBackgroundColor', 'is_quoted' => false),
               '_eventBorderColor' =>  array('key' => 'eventBorderColor', 'is_quoted' => false),
               '_eventTextColor' =>  array('key' => 'eventTextColor', 'is_quoted' => false),
               '_disableDragging' =>  array('key' => 'disableDragging', 'is_quoted' => false),
               '_disableResizing' =>  array('key' => 'disableResizing', 'is_quoted' => false),
               '_dragRevertDuration' =>  array('key' => 'dragRevertDuration', 'is_quoted' => false),
               '_dragOpacity' =>  array('key' => 'dragOpacity', 'is_quoted' => false),
               '_droppable' =>  array('key' => 'droppable', 'is_quoted' => false),
               '_dropAccept' =>  array('key' => 'dropAccept', 'is_quoted' => false),
               '_viewDisplay' =>  array('key' => 'viewDisplay', 'is_quoted' => false),
               '_windowResize' =>  array('key' => 'windowResize', 'is_quoted' => false),
               '_dayClick' =>  array('key' => 'dayClick', 'is_quoted' => false),
               '_eventClick' =>  array('key' => 'eventClick', 'is_quoted' => false),
               '_eventMouseover' =>  array('key' => 'eventMouseover', 'is_quoted' => false),
               '_eventMouseout' =>  array('key' => 'eventMouseout', 'is_quoted' => false),
               '_select' =>  array('key' => 'select', 'is_quoted' => false),
               '_unselect' =>  array('key' => 'unselect', 'is_quoted' => false),
               '_loading' =>  array('key' => 'loading', 'is_quoted' => false),
               '_eventRender' =>  array('key' => 'eventRender', 'is_quoted' => false),
               '_eventAfterRender' =>  array('key' => 'eventAfterRender', 'is_quoted' => false),
               '_eventDragStart' =>  array('key' => 'eventDragStart', 'is_quoted' => false),
               '_eventDragStop' =>  array('key' => 'eventDragStop', 'is_quoted' => false),
               '_eventDrop' =>  array('key' => 'eventDrop', 'is_quoted' => false),
               '_eventResizeStart' =>  array('key' => 'eventResizeStart', 'is_quoted' => false),
               '_eventResizeStop' =>  array('key' => 'eventResizeStop', 'is_quoted' => false),
               '_eventResize' =>  array('key' => 'eventResize', 'is_quoted' => false),
               '_drop' =>  array('key' => 'drop', 'is_quoted' => false),     
              );    
  }
  /**
   * Retrieves a instance of this class.
   * @return YsJQFullCalendar
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  public static function build($jQuerySelector=null, $options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($jQuerySelector !== null){ $jquery->in($jQuerySelector);}
    if($options !== null){ $jquery->setOptions($options);}
    return $jquery;
  }
}