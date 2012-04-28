<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsFullCalendar
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsFullCalendar extends YsComponent{
  
  public static $DEFAULT_TEMPLATE_TAG = YsHTML::SPAN;
  public static $VIEW_MONTH = 'month';
  public static $VIEW_BASIC_WEEK = 'basicWeek';
  public static $VIEW_BASIC_DAY = 'basicDay';
  public static $VIEW_AGENDA_WEEK = 'agendaWeek';
  public static $VIEW_AGENDA_DAY = 'agendaDay';
  public static $CALENDAR_TITLE = 'title';
  public static $CALENDAR_PREV_BUTTON = 'prev';
  public static $CALENDAR_NEXT_BUTTON  = 'next';
  public static $CALENDAR_PREV_YEAR_BUTTON  = 'prevYear';
  public static $CALENDAR_NEXT_YEAR_BUTTON  = 'nextYear';
  public static $CALENDAR_TODAY_BUTTON  = 'today';
  public static $CALENDAR_UNION  = ',';
  public static $SUNDAY = 0;
  public static $MONDAY = 1;
  public static $TUESDAY = 2;
  public static $WEDNESDAY = 3;
  public static $THURSDAY = 4;
  public static $FRIDAY = 5;
  public static $SATURDAY = 6;
  
  private $events;
  private $editable;
  private $defaultView;
	private $aspectRatio;
	private $header;
	private $weekends;
	private $isRTL;
	private $firstDay;
	private $theme;
	private $buttonIcons;
  private $weekMode;
  private $height;
  private $contentHeight;
  private $allDaySlot;
  private $allDayText;
  private $axisFormat;
  private $slotMinutes;
  private $defaultEventMinutes;
  private $firstHour;
  private $minTime;
  private $maxTime;
  private $year;
  private $month;
  private $date;
  private $timeFormat;
  private $columnFormat;
  private $titleFormat;
  private $buttonText;
  private $monthNames;
  private $monthNamesShort;
  private $dayNames;
  private $dayNamesShort;
  private $selectable;
  private $selectHelper;
  private $unselectAuto;
  private $unselectCancel;
  private $eventSources;
  private $allDayDefault;
  private $ignoreTimezone;
  private $startParam;
  private $endParam;
  private $lazyFetching;
  private $eventColor;
  private $eventBackgroundColor;
  private $eventBorderColor;
  private $eventTextColor;
  private $disableDragging;
  private $disableResizing;
  private $dragRevertDuration;
  private $dragOpacity;
  private $droppable;
  private $dropAccept;

  private $viewDisplay;
  private $windowResize;
  private $dayClick;
  private $eventClick;
  private $eventMouseover;
  private $eventMouseout;
  private $select;
  private $unselect;
  private $loading;
  private $eventRender;
  private $eventAfterRender;
  private $eventDragStart;
  private $eventDragStop;
  private $eventDrop;
  private $eventResizeStart;
  private $eventResizeStop;
  private $eventResize;
  private $drop;
  
  private $timeZone;
  private $eventsList;
  
  /**
   * 
   * @param string $id
   */
  public function __construct($id) {
    parent::__construct($id);
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFULL_CALENDAR);
    $this->setJQueryObject(YsJQFullCalendar::build());
    $this->eventsList = new ArrayObject();
  }
  
  public function varsToUnset() {
    return array_merge(array('timeZone','eventsList'), parent::varsToUnset());
  }
  
  public function enableThemeroller(){
    $this->setTheme(true);
  }
  
  public function disableThemeroller(){
    $this->setTheme(false);
  }
  
  public function setHeaderLeftSection($contents){
    $contents = func_get_args();
    $this->addHeaderLeftSection($contents);
  }
  
  public function setHeaderCenterSection($contents){
    $contents = func_get_args();
    $this->addHeaderCenterSection($contents);
  }
  
  public function setHeaderRightSection($contents){
    $contents = func_get_args();
    $this->addHeaderRightSection($contents);
  }
  
  public function addHeaderLeftSection($contents){
    $this->addHeaderSection('left', $this->serializeContents($contents));
  }
  
  public function addHeaderCenterSection($contents){
    $this->addHeaderSection('center', $this->serializeContents($contents));
  }
  
  public function addHeaderRightSection($contents){
    $this->addHeaderSection('right', $this->serializeContents($contents));
  }
  
  private function serializeContents($contents){
    $result = "";
    $contents = (is_array($contents)) ? $contents : array($contents);
    foreach($contents  as $content){
      if(is_array($content)){
        foreach($content as $union){
          $result .= $union . self::$CALENDAR_UNION;
        }
        $result .= ' ';
      }else{
        $result .= $content . ' ';
      }
    }
    return $result;
  }
  
  public function addHeaderSection($position,$contents){
    if(isset($this->header[$position])){
      $this->header[$position] = array_merge($this->header[$position],$contents);
    }else{
      $this->header[$position] = $contents;
    }
  }
  
  public function setCurrentDate(DateTime $time){
    $this->year = (int) $time->format('Y');
    $this->month = ((int) $time->format('m')) - 1;
    $this->date = (int) $time->format('d');
  }
  
  public function viewAsAgendaDay(){
    $this->setDefaultView(self::$VIEW_AGENDA_DAY);
  }
  
  public function viewAsAgendaWeek(){
    $this->setDefaultView(self::$VIEW_AGENDA_WEEK);
  }
  
  public function viewAsMonth(){
    $this->setDefaultView(self::$VIEW_MONTH);
  }
  
  public function viewAsBasicDay(){
    $this->setDefaultView(self::$VIEW_BASIC_DAY);
  }
  
  public function viewAsBasicWeek(){
    $this->setDefaultView(self::$VIEW_BASIC_WEEK);
  }
  
  public function noWeekends(){
    $this->setWeekends(false);
  }
  
  public function addEvent(YsCalendarEvent $event){    
    if($event->getTimezone() === null && isset($this->timeZone) ){
      $event->setTimezone($this->getDateTimezone());
    }
    $event->formatStartAndEnd();
    $this->eventsList->append($event);
  }
  
  public function beforeBuild() {
    parent::beforeBuild();
    if($this->eventsList->count() > 0){
      $this->events = $this->eventsList->getArrayCopy();
    }
  }
  
  public function afterBuild($jquery) {
    $jquery = parent::afterBuild($jquery);
    $jquery->conditionNOT(YsJQuery::hasClass('fc')->in($this->getJQuerySelector()));
  }
    
  public function optionsToArray() {
    $config = array();
    $vars = get_object_vars($this);
    foreach ($this->varsToUnset() as $value) {
      unset($vars[$value]);
    }
    foreach ($vars as $var => $value) {
      if (isset($this->$var)) {
        $config[$var] = $this->$var;
      }
    }
    return $config;
  }
   
  public function getTimezone() {
    return $this->timeZone;
  }

  public function setTimezone($timeZone) {
    $this->timeZone = $timeZone;
  }
  
  public function getDateTimezone() {
    return ($this->timeZone instanceof DateTimeZone) 
           ? $this->timeZone
           : new DateTimeZone($this->timeZone);
  }
  
  public function getEvents() {
    return $this->events;
  }

  public function setEvents($events) {
    $this->events = $events;
  }

  public function getEditable() {
    return $this->editable;
  }

  public function setEditable($editable) {
    $this->editable = $editable;
  }
  
  public function getDefaultView() {
    return $this->defaultView;
  }

  public function setDefaultView($defaultView) {
    $this->defaultView = $defaultView;
  }

  public function getAspectRatio() {
    return $this->aspectRatio;
  }

  public function setAspectRatio($aspectRatio) {
    $this->aspectRatio = $aspectRatio;
  }

  public function getHeader() {
    return $this->header;
  }

  public function setHeader($header) {
    $this->header = $header;
  }

  public function getWeekends() {
    return $this->weekends;
  }

  public function setWeekends($weekends) {
    $this->weekends = $weekends;
  }

  public function getAllDayDefault() {
    return $this->allDayDefault;
  }

  public function setAllDayDefault($allDayDefault) {
    $this->allDayDefault = $allDayDefault;
  }

  public function getIgnoreTimezone() {
    return $this->ignoreTimezone;
  }

  public function setIgnoreTimezone($ignoreTimezone) {
    $this->ignoreTimezone = $ignoreTimezone;
  }

  public function getLazyFetching() {
    return $this->lazyFetching;
  }

  public function setLazyFetching($lazyFetching) {
    $this->lazyFetching = $lazyFetching;
  }

  public function getStartParam() {
    return $this->startParam;
  }

  public function setStartParam($startParam) {
    $this->startParam = $startParam;
  }

  public function getEndParam() {
    return $this->endParam;
  }

  public function setEndParam($endParam) {
    $this->endParam = $endParam;
  }

  public function getTitleFormat() {
    return $this->titleFormat;
  }

  public function setTitleFormat($titleFormat) {
    $this->titleFormat = $titleFormat;
  }

  public function getColumnFormat() {
    return $this->columnFormat;
  }

  public function setColumnFormat($columnFormat) {
    $this->columnFormat = $columnFormat;
  }

  public function getTimeFormat() {
    return $this->timeFormat;
  }

  public function setTimeFormat($timeFormat) {
    $this->timeFormat = $timeFormat;
  }

  public function getIsRTL() {
    return $this->isRTL;
  }

  public function setIsRTL($isRTL) {
    $this->isRTL = $isRTL;
  }

  public function getFirstDay() {
    return $this->firstDay;
  }

  public function setFirstDay($firstDay) {
    $this->firstDay = $firstDay;
  }

  public function getMonthNames() {
    return $this->monthNames;
  }

  public function setMonthNames($monthNames) {
    $this->monthNames = $monthNames;
  }

  public function getMonthNamesShort() {
    return $this->monthNamesShort;
  }

  public function setMonthNamesShort($monthNamesShort) {
    $this->monthNamesShort = $monthNamesShort;
  }

  public function getDayNames() {
    return $this->dayNames;
  }

  public function setDayNames($dayNames) {
    $this->dayNames = $dayNames;
  }

  public function getDayNamesShort() {
    return $this->dayNamesShort;
  }

  public function setDayNamesShort($dayNamesShort) {
    $this->dayNamesShort = $dayNamesShort;
  }

  public function getButtonText() {
    return $this->buttonText;
  }

  public function setButtonText($buttonText) {
    $this->buttonText = $buttonText;
  }

  public function getTheme() {
    return $this->theme;
  }

  public function setTheme($theme) {
    $this->theme = $theme;
  }

  public function getButtonIcons() {
    return $this->buttonIcons;
  }

  public function setButtonIcons($buttonIcons) {
    $this->buttonIcons = $buttonIcons;
  }

  public function getUnselectAuto() {
    return $this->unselectAuto;
  }

  public function setUnselectAuto($unselectAuto) {
    $this->unselectAuto = $unselectAuto;
  }

  public function getDropAccept() {
    return $this->dropAccept;
  }

  public function setDropAccept($dropAccept) {
    $this->dropAccept = $dropAccept;
  }
  
  public function getEventSources() {
    return $this->eventSources;
  }

  public function setEventSources($eventSources) {
    $this->eventSources = $eventSources;
  }
  
  public function getWeekMode() {
    return $this->weekMode;
  }

  public function setWeekMode($weekMode) {
    $this->weekMode = $weekMode;
  }

  public function getHeight() {
    return $this->height;
  }

  public function setHeight($height) {
    $this->height = $height;
  }

  public function getContentHeight() {
    return $this->contentHeight;
  }

  public function setContentHeight($contentHeight) {
    $this->contentHeight = $contentHeight;
  }

  public function getAllDaySlot() {
    return $this->allDaySlot;
  }

  public function setAllDaySlot($allDaySlot) {
    $this->allDaySlot = $allDaySlot;
  }

  public function getAllDayText() {
    return $this->allDayText;
  }

  public function setAllDayText($allDayText) {
    $this->allDayText = $allDayText;
  }

  public function getAxisFormat() {
    return $this->axisFormat;
  }

  public function setAxisFormat($axisFormat) {
    $this->axisFormat = $axisFormat;
  }

  public function getSlotMinutes() {
    return $this->slotMinutes;
  }

  public function setSlotMinutes($slotMinutes) {
    $this->slotMinutes = $slotMinutes;
  }

  public function getDefaultEventMinutes() {
    return $this->defaultEventMinutes;
  }

  public function setDefaultEventMinutes($defaultEventMinutes) {
    $this->defaultEventMinutes = $defaultEventMinutes;
  }

  public function getFirstHour() {
    return $this->firstHour;
  }

  public function setFirstHour($firstHour) {
    $this->firstHour = $firstHour;
  }

  public function getMinTime() {
    return $this->minTime;
  }

  public function setMinTime($minTime) {
    $this->minTime = $minTime;
  }

  public function getMaxTime() {
    return $this->maxTime;
  }

  public function setMaxTime($maxTime) {
    $this->maxTime = $maxTime;
  }

  public function getYear() {
    return $this->year;
  }

  public function setYear($year) {
    $this->year = $year;
  }

  public function getMonth() {
    return $this->month;
  }

  public function setMonth($month) {
    $this->month = $month;
  }

  public function getDate() {
    return $this->date;
  }

  public function setDate($date) {
    $this->date = $date;
  }

  public function getSelectable() {
    return $this->selectable;
  }

  public function setSelectable($selectable) {
    $this->selectable = $selectable;
  }

  public function getSelectHelper() {
    return $this->selectHelper;
  }

  public function setSelectHelper($selectHelper) {
    $this->selectHelper = $selectHelper;
  }

  public function getUnselectCancel() {
    return $this->unselectCancel;
  }

  public function setUnselectCancel($unselectCancel) {
    $this->unselectCancel = $unselectCancel;
  }

  public function getEventColor() {
    return $this->eventColor;
  }

  public function setEventColor($eventColor) {
    $this->eventColor = $eventColor;
  }

  public function getEventBackgroundColor() {
    return $this->eventBackgroundColor;
  }

  public function setEventBackgroundColor($eventBackgroundColor) {
    $this->eventBackgroundColor = $eventBackgroundColor;
  }

  public function getEventBorderColor() {
    return $this->eventBorderColor;
  }

  public function setEventBorderColor($eventBorderColor) {
    $this->eventBorderColor = $eventBorderColor;
  }

  public function getEventTextColor() {
    return $this->eventTextColor;
  }

  public function setEventTextColor($eventTextColor) {
    $this->eventTextColor = $eventTextColor;
  }

  public function getDisableDragging() {
    return $this->disableDragging;
  }

  public function setDisableDragging($disableDragging) {
    $this->disableDragging = $disableDragging;
  }

  public function getDisableResizing() {
    return $this->disableResizing;
  }

  public function setDisableResizing($disableResizing) {
    $this->disableResizing = $disableResizing;
  }

  public function getDragRevertDuration() {
    return $this->dragRevertDuration;
  }

  public function setDragRevertDuration($dragRevertDuration) {
    $this->dragRevertDuration = $dragRevertDuration;
  }

  public function getDragOpacity() {
    return $this->dragOpacity;
  }

  public function setDragOpacity($dragOpacity) {
    $this->dragOpacity = $dragOpacity;
  }

  public function getDroppable() {
    return $this->droppable;
  }

  public function setDroppable($droppable) {
    $this->droppable = $droppable;
  }
  
  // callbacks
  
  public function getViewDisplay() {
    return $this->viewDisplay;
  }

  public function onViewDisplay($viewDisplay) {
    $this->viewDisplay = $viewDisplay;
  }

  public function getWindowResize() {
    return $this->windowResize;
  }

  public function onWindowResize($windowResize) {
    $this->windowResize = $windowResize;
  }

  public function getDayClick() {
    return $this->dayClick;
  }

  public function onDayClick($dayClick) {
    $this->dayClick = $dayClick;
  }

  public function getEventClick() {
    return $this->eventClick;
  }

  public function onEventClick($eventClick) {
    $this->eventClick = $eventClick;
  }

  public function getEventMouseover() {
    return $this->eventMouseover;
  }

  public function onEventMouseover($eventMouseover) {
    $this->eventMouseover = $eventMouseover;
  }

  public function getEventMouseout() {
    return $this->eventMouseout;
  }

  public function onEventMouseout($eventMouseout) {
    $this->eventMouseout = $eventMouseout;
  }

  public function getSelect() {
    return $this->select;
  }

  public function onSelect($select) {
    $this->select = $select;
  }

  public function getUnselect() {
    return $this->unselect;
  }

  public function onUnselect($unselect) {
    $this->unselect = $unselect;
  }

  public function getLoading() {
    return $this->loading;
  }

  public function onLoading($loading) {
    $this->loading = $loading;
  }

  public function getEventRender() {
    return $this->eventRender;
  }

  public function onEventRender($eventRender) {
    $this->eventRender = $eventRender;
  }

  public function getEventAfterRender() {
    return $this->eventAfterRender;
  }

  public function onEventAfterRender($eventAfterRender) {
    $this->eventAfterRender = $eventAfterRender;
  }

  public function getEventDragStart() {
    return $this->eventDragStart;
  }

  public function onEventDragStart($eventDragStart) {
    $this->eventDragStart = $eventDragStart;
  }

  public function getEventDragStop() {
    return $this->eventDragStop;
  }

  public function onEventDragStop($eventDragStop) {
    $this->eventDragStop = $eventDragStop;
  }

  public function getEventDrop() {
    return $this->eventDrop;
  }

  public function onEventDrop($eventDrop) {
    $this->eventDrop = $eventDrop;
  }

  public function getEventResizeStart() {
    return $this->eventResizeStart;
  }

  public function onEventResizeStart($eventResizeStart) {
    $this->eventResizeStart = $eventResizeStart;
  }

  public function getEventResizeStop() {
    return $this->eventResizeStop;
  }

  public function onEventResizeStop($eventResizeStop) {
    $this->eventResizeStop = $eventResizeStop;
  }

  public function getEventResize() {
    return $this->eventResize;
  }

  public function onEventResize($eventResize) {
    $this->eventResize = $eventResize;
  }

  public function getDrop() {
    return $this->drop;
  }

  public function onDrop($drop) {
    $this->drop = $drop;
  }
  
  // METHODS
  
  public function doRender(){
    return $this->doMethod('render');
  }
  
  public function doDestroy(){
    return $this->doMethod('destroy');
  }
  
  public function changeView($viewName){
    return $this->doMethod('changeView', $viewName);
  }
  
  public function changeToAgendaDayView(){
    return $this->changeView(self::$VIEW_AGENDA_DAY);
  }
  
  public function changeToAgendaWeekView(){
    return $this->changeView(self::$VIEW_AGENDA_WEEK);
  }
  
  public function changeToDayView(){
    return $this->changeView(self::$VIEW_BASIC_DAY);
  }
  
  public function changeToWeekView(){
    return $this->changeView(self::$VIEW_BASIC_WEEK);
  }
  
  public function changeToMonthView(){
    return $this->changeView(self::$VIEW_MONTH);
  }
  
  public function getView(){
    return $this->doMethod('getView');
  }
  
  public function gotoPrev(){
    return $this->doMethod('prev');
  }
  
  public function gotoNext(){
    return $this->doMethod('next');
  }
  
  public function gotoPrevYear(){
    return $this->doMethod('prevYear');
  }

  public function gotoNextYear(){
    return $this->doMethod('nextYear');
  }
  
  public function gotoToday(){
    return $this->doMethod('today');
  }
  
  public function gotoDate($year=null,$month=null,$date=null){
    return $this->doMethod('gotoDate',$year,$month,$date);
  }  
  
  public function incrementDate($year=null,$month=null,$days=null){
    return $this->doMethod('gotoDate',$year,$month,$days);
  }
  
  public function getCalendarDate(){
    return $this->doMethod('getDate');
  }
  
  public function select($startDate=null,$endDate=null,$allDay=null){
    return $this->doMethod('select',$startDate,$endDate,$allDay);
  }
  
  public function unselect(){
    return $this->doMethod('unselect');
  }
  
  public function updateEvent($event=null){
    return $this->doMethod('updateEvent',$event);
  }
  
  public function getClientEvents ($eventId=null){
    return $this->doMethod('clientEvents',$eventId);
  }
  
  public function removeAllEvents(){
    return $this->doMethod('removeEvents');
  }
  
  public function removeEvent($eventId=null){
    return $this->doMethod('removeEvents',$eventId);
  }
  
  public function refetchEvents(){
    return $this->doMethod('refetchEvents');
  }
  
  public function addEventSource($source=null){
    return $this->doMethod('addEventSource', $source);
  }
  
  public function removeEventSource($source=null){
    return $this->doMethod('removeEventSource', $source);
  }
  
  public function renderEvent($event=null,$stick=null){
    return $this->doMethod('renderEvent',$event,$stick);
  }
  
  public function rerenderEvents(){
    return $this->doMethod('rerenderEvents');
  }
}