<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsScheduller
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsScheduler extends YsFullCalendar{
  
  public static $DEFAULT_ACTION = '#';
  public static $DEFAULT_ID_GENERATOR_SINTAX = 'Math.floor(Math.random()*3650000)';
  
  private $dialogPattern;
  private $action;
  private $target;
  private $i18nvars;
  private $labelsWidth;
  private $dialogWidth;
  private $dialogHeight;
  private $categories;
  private $ampm;
  private $idEventGeneratorSintax;
  
  private function setDefaultI18NVars(){
    $vars = array();
    $vars['TAB1_LABEL'] = 'Event Data';
    $vars['TAB2_LABEL'] = 'Colors';
    $vars['TITLE_LABEL'] = 'Title:';
    $vars['START_LABEL'] = 'Start:';
    $vars['END_LABEL'] = 'End:';
    $vars['ALL_DAY_LABEL'] = 'All Day Event:';
    $vars['URL_LABEL'] = 'URL:';
    $vars['EDITABLE_LABEL'] = 'Is Editable:';
    $vars['CATEGORY_LABEL'] = 'Category:';
    $vars['COLOR_LABEL'] = 'Color:';
    $vars['BACKGROUND_LABEL'] = 'Background:';
    $vars['BORDER_LABEL'] = 'Border:';
    $vars['TEXT_COLOR_LABEL'] = 'Text:';
    $vars['EDIT_EVENT_LABEL'] = 'Edit Event';
    $vars['SAVE_LABEL'] = 'Save';
    $vars['DELETE_LABEL'] = 'Delete';    
    $vars['ADD_EVENT_LABEL'] = 'Add Event'; 
    $vars['MIN_MAX_VALIDATION_ERROR'] = 'End time is little than start time';
    $vars['SUCCESS_MESSAGE'] = 'Success: The Event was modified';
    $vars['ERROR_MESSAGE'] = 'Error: The Event was not modified';
    $vars['LOADING_MESSAGE'] = 'Please wait';
    $vars['ALL_DAY_INDICATOR'] = 'All Day Event';
    $vars['DATE_PATTERN'] = 'yyyy-dd-MM HH:mm:ss';
    $vars['CONFIRM_DELETE'] = 'Are you sure?';
    $this->setI18NVars($vars);
  }
  
  public function __construct($id) {
    parent::__construct($id);
    $this->assignToVar($this->getComponentVarName());
  }
  
  public function postConstruct() {
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_PNOTYFY);
    $this->setLabelsWidth(130);
    $this->setDialogWidth(400);
    $this->setDialogHeight('auto');
    $this->setDefaultI18NVars();
    $this->setAction(self::$DEFAULT_ACTION);
    $this->setAmPm(true);
    $this->setIdEventGeneratorSintax(self::$DEFAULT_ID_GENERATOR_SINTAX);
    parent::onEventClick(YsJsFunction::execute(YsUIDialog::open($this->getDialogJQuerySelector())));
    parent::onEventMouseover(YsJsFunction::call($this->getEventMouseOverSintax()));
    parent::onEventMouseout(YsJsFunction::newInstance(YsPNotify::removeAll(),'event, jsEvent, view'));
    parent::onDayClick(YsJsFunction::call($this->getDayClickSintax()));
    parent::onEventClick(YsJsFunction::call($this->getEventClickSintax()));
    $onDropOrResize = new YsJsFunction($this->callOnDropResizeSintax(),'event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view');
    parent::onEventDrop($onDropOrResize);
    parent::onEventResize($onDropOrResize);
    parent::setHeaderLeftSection(
      array(
        YsFullCalendar::$CALENDAR_PREV_YEAR_BUTTON,
        YsFullCalendar::$CALENDAR_PREV_BUTTON,
      ),
      array(
        YsFullCalendar::$CALENDAR_NEXT_BUTTON,
        YsFullCalendar::$CALENDAR_NEXT_YEAR_BUTTON
      )
    );
    parent::setHeaderCenterSection(YsFullCalendar::$CALENDAR_TITLE);
    parent::setHeaderRightSection(array(
      YsFullCalendar::$VIEW_AGENDA_DAY,
      YsFullCalendar::$VIEW_AGENDA_WEEK,
      YsFullCalendar::$VIEW_MONTH
    ));
  }
  
  public function renderTemplate() {
    $template = parent::renderTemplate();
    $this->setDefaultDialogPattern();
    $template .= $this->getDialogPattern();
    return $template;
  }
  
  public function build() {
    $sinax = parent::build();
    $sinax .= ';' . $this->buildDialog();
    $sinax .= ';' . $this->buildTabs();
    $sinax .= ';' . $this->buildTimePickers();
    $sinax .= ';' . $this->getOnDropResizeSintax();
    $sinax .= ';' . $this->buildTooltip();
    $sinax .= ';' . $this->buildValidationForm();
    $sinax .= ';' . $this->buildColorpickers();
    return $sinax;
  }
   
  private function generateWidgetId($widgetType, $prefix = ''){
    return $prefix . $this->getId() . $widgetType;
  }
  
  private function generateWidgetVar($widgetType){
    return $this->getComponentVarName() . '.' . $widgetType;
  }
  
  private function generateWidgetTagId($suffix, $separator = '-'){
    return $this->getId() . $separator .$suffix;
  }
  
  public function getDialogVar(){
    return $this->generateWidgetVar('Dialog');
  }
  
  public function getStartTimepickerVar(){
    return $this->generateWidgetVar('startDate');
  }
  
  public function getEndTimepickerVar(){
    return $this->generateWidgetVar('endDate');
  }
  
  public function getTooltipVar(){
    return $this->generateWidgetVar('tooltip');
  }
  
  public function getDialogId(){
    return $this->generateWidgetId('Dialog');
  }
  
  public function getDialogJQuerySelector($suffix = '#'){
    return $suffix . $this->getDialogId();
  }
  
  public function getFormVar(){
    return $this->generateWidgetVar('Form');
  }
  
  public function getFormId(){
    return $this->generateWidgetId('Form');
  }
  
  public function getFormJQuerySelector($suffix = '#'){
    return $suffix . $this->getFormId();
  }
    
  public function getTabsId(){
    return $this->generateWidgetId('Tabs');
  }
  
  public function getTabsJQuerySelector($suffix = '#'){
    return $suffix . $this->getTabsId();
  }
  
  public function getDialogPattern() {
    return $this->dialogPattern;
  }

  public function setDialogPattern($dialogPattern) {
    $this->dialogPattern = $dialogPattern;
  }
  
  public function setDefaultDialogPattern() {
    $dialogPattern = <<<EOF
<div id="%SCHEDULE%Dialog">
<form id="%SCHEDULE%Form" action="%ACTION%" method="post" >
<div id="%SCHEDULE%Tabs">
	<ul>
		<li><a href="#%SCHEDULE%Tab1">%TAB1_LABEL%</a></li>
		<li><a href="#%SCHEDULE%Tab2">%TAB2_LABEL%</a></li>
	</ul>
	<div id="%SCHEDULE%Tab1">
		<table width="100%">
		  <tr align="left"><td width="%LABELS_WIDTH%"><label style="line-height: 1.8;">%TITLE_LABEL%</label></td><td><input style="width:100%" name="title" id="%SCHEDULE%-event-title" class="required ui-widget-content ui-corner-all ui-input" type="text" /></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%START_LABEL%</label></td><td><input style="width:100%" name="start" id="%SCHEDULE%-event-start"  class="required ui-widget-content ui-corner-all ui-input" type="text" /></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%END_LABEL%</label></td><td><input style="width:100%" name="end" id="%SCHEDULE%-event-end"  class="ui-widget-content ui-corner-all ui-input" type="text" /></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%ALL_DAY_LABEL%</label></td><td><input  name="allDay" type="checkbox" id="%SCHEDULE%-event-all-day" class="ui-widget-content ui-corner-all"></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%URL_LABEL%</label></td><td><input type="text" name="url" style="width:100%" id="%SCHEDULE%-event-url" class="url ui-widget-content ui-corner-all"></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%EDITABLE_LABEL%</label></td><td><input name="editable" type="checkbox" id="%SCHEDULE%-event-editable" class="ui-widget-content ui-corner-all"></td></tr>
      <tr align="left"><td><label style="line-height: 1.8;">%CATEGORY_LABEL%</label></td><td>
      <select name="category" id="%SCHEDULE%-event-category" style="width:99%" class="ui-widget-content ui-corner-all">
        %CATEGORIES%
      </select>
      </td></tr>
    </table>
	</div>
	<div id="%SCHEDULE%Tab2">
		<table width="100%">
		  <tr align="left"><td width="%LABELS_WIDTH%"><label style="line-height: 1.8;">%COLOR_LABEL%</label></td><td><input style="width:100%" name="color" id="%SCHEDULE%-event-color" class="ui-widget-content ui-corner-all ui-input" type="text" /></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%BACKGROUND_LABEL%</label></td><td><input style="width:100%" name="background-color" id="%SCHEDULE%-event-bg-color" class="ui-widget-content ui-corner-all ui-input" type="text" /></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%BORDER_LABEL%</label></td><td><input style="width:100%" name="border-color" id="%SCHEDULE%-event-border-color" class="ui-widget-content ui-corner-all ui-input" type="text" /></td></tr>
		  <tr align="left"><td><label style="line-height: 1.8;">%TEXT_COLOR_LABEL%</label></td><td><input style="width:100%" name="text-color" id="%SCHEDULE%-event-text-color" class="ui-widget-content ui-corner-all ui-input" type="text" /></td></tr>
		</table>
	</div>
</div>
	<input type="hidden" id="%SCHEDULE%-event-startDate" name="startDate">
	<input type="hidden" id="%SCHEDULE%-event-endDate" name="endDate">
	<input type="hidden" id="%SCHEDULE%-event-action" name="action">
	<input type="hidden" name="calendarId" value="%SCHEDULE%">
  <input type="hidden" id="%SCHEDULE%-event-id" name="eventId">
  </form>
</div>
EOF;
    foreach($this->getI18NVars() as $var => $val){
      $dialogPattern = str_replace('%' . $var . '%', $val, $dialogPattern);
    }
    $dialogPattern = str_replace('%ACTION%', $this->getAction(), $dialogPattern);
    $dialogPattern = str_replace('%SCHEDULE%', $this->getId(), $dialogPattern);
    $dialogPattern = str_replace('%LABELS_WIDTH%', $this->getLabelsWidth(), $dialogPattern);
    $dialogPattern = str_replace('%CATEGORIES%', $this->getCategoryOptions(), $dialogPattern);
    $this->dialogPattern = $dialogPattern;
  }
  
  private function getEventMouseOverSintax(){
    $sintax= <<<EOF
    function(event, jsEvent, view){
        %TOOLTIP_VAR%.css({"top": jsEvent.clientY+12, "left": jsEvent.clientX+12});
        text = $.fullCalendar.formatDate(event.start,"%DATE_PATTERN%");
        text += (event.end=='' || event.end==null) 
              ? "" 
              : " - " + $.fullCalendar.formatDate(event.end,"%DATE_PATTERN%");
        text += "<br/>" + event.title;      
        text += (view.name == 'month' && event.allDay) 
              ? "<br/><br/><b>All Day Event</b>"
              : "" ;
        %TOOLTIP_VAR%.pnotify({"pnotify_text": text});
        %TOOLTIP_VAR%.pnotify_display();
    }
EOF;
   $sintax = str_replace('%TOOLTIP_VAR%', $this->getTooltipVar(), $sintax);
   $sintax = str_replace('%ALL_DAY_INDICATOR%', $this->getI18NVar('ALL_DAY_INDICATOR'), $sintax);
   $sintax = str_replace('%DATE_PATTERN%', $this->getI18NVar('DATE_PATTERN'), $sintax);
   return $sintax;
   }
   
   
   private function getDayClickSintax(){
    $sintax= <<<EOF
    function(date, allDay, jsEvent, view){
      $('#%SCHEDULE%-event-title').val('');           
      %SCHEDULE_START_VAR%.datepicker('setDate',date);
      %SCHEDULE_END_VAR%.datepicker('setDate',date);
      $('#%SCHEDULE%-event-all-day').attr('checked',allDay);
      $('#%SCHEDULE%-event-editable').attr('checked',true);
      $('#%SCHEDULE%-event-url').val('');
      $('#%SCHEDULE%-event-startDate').val('');
      $('#%SCHEDULE%-event-endDate').val('');
      $('#%SCHEDULE%-event-action').val('');
      $('#%SCHEDULE%-event-id').val('');
      $('#%SCHEDULE%-event-color').val('');
      $('#%SCHEDULE%-event-bg-color').val('');
      $('#%SCHEDULE%-event-border-color').val('');
      $('#%SCHEDULE%-event-text-color').val('');     
      %SCHEDULE_DIALOG_VAR%.%SCHEDULE_DIALOG_EVENT%('option','title','%ADD_EVENT_LABEL%');
      %SCHEDULE_DIALOG_VAR%.%SCHEDULE_DIALOG_EVENT%('option','buttons',{
        '%SAVE_LABEL%': function() {
          end = %SCHEDULE_END_VAR%.datepicker('getDate');
          start = %SCHEDULE_START_VAR%.datepicker('getDate');
          if(start <=  end || (end=='' || end==null)){
            if($('%SCHEDULE_FORM_JQUERY%').valid() && $("%SCHEDULE_TABS_JQUERY%").%SCHEDULE_TABS_EVENT%('option', 'selected') == 0){
              $('#%SCHEDULE%-event-startDate').val(%SCHEDULE_START_VAR%.datepicker('getDate'));
              $('#%SCHEDULE%-event-endDate').val(%SCHEDULE_END_VAR%.datepicker('getDate'));
              $('#%SCHEDULE%-event-action').val('add');
              $('#%SCHEDULE%-event-id').val(%ID_GENERATOR%);
              %SCHEDULE_VAR%.clientAction = 'add';
              $('%SCHEDULE_FORM_JQUERY%').submit();
            }
          }else{
            alert('%MIN_MAX_VALIDATION_ERROR%');
          }
        }
      });
      %SCHEDULE_DIALOG_VAR%.%SCHEDULE_DIALOG_EVENT%('open');
      return false;
    }
EOF;
    $sintax = str_replace('%SCHEDULE_VAR%', $this->getComponentVarName(), $sintax);
    $sintax = str_replace('%SCHEDULE%', $this->getId(), $sintax);
    $sintax = str_replace('%SCHEDULE_START_VAR%', $this->getStartTimepickerVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_END_VAR%', $this->getEndTimepickerVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_DIALOG_VAR%', $this->getDialogVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_FORM_JQUERY%', $this->getFormJQuerySelector(), $sintax);
    $sintax = str_replace('%SCHEDULE_TABS_JQUERY%', $this->getTabsJQuerySelector(), $sintax);
    $sintax = str_replace('%SCHEDULE_DIALOG_EVENT%', YsUIDialog::$uiEvent, $sintax);
    $sintax = str_replace('%SCHEDULE_TABS_EVENT%', YsUITabs::$uiEvent, $sintax);

    $sintax = str_replace('%ID_GENERATOR%', $this->getIdEventGeneratorSintax(), $sintax);
    $sintax = str_replace('%ADD_EVENT_LABEL%', $this->getI18NVar('ADD_EVENT_LABEL'), $sintax);
    $sintax = str_replace('%SAVE_LABEL%', $this->getI18NVar('SAVE_LABEL'), $sintax);
    $sintax = str_replace('%MIN_MAX_VALIDATION_ERROR%', $this->getI18NVar('MIN_MAX_VALIDATION_ERROR'), $sintax);
    
    return $sintax;
  }
  
   private function getEventClickSintax(){
    $sintax= <<<EOF
function(event, jsEvent, view){
  $('#%SCHEDULE%-event-title').val(event.title);           
  %SCHEDULE_START_VAR%.datepicker('setDate',event.start);
  %SCHEDULE_END_VAR%.datepicker('setDate',event.end);
  $('#%SCHEDULE%-event-all-day').attr('checked',event.allDay);
  $('#%SCHEDULE%-event-editable').attr('checked',event.editable);
  $('#%SCHEDULE%-event-url').val(event.url);
  $('#%SCHEDULE%-event-category').val(event.className);
  $('#%SCHEDULE%-event-color').val((event.color != undefined) ? event.color.replace(/#/gi, '') : '');
  $('#%SCHEDULE%-event-bg-color').val((event.backgroundColor != undefined) ? event.backgroundColor.replace(/#/gi, '') : '');
  $('#%SCHEDULE%-event-border-color').val((event.borderColor != undefined) ? event.borderColor.replace(/#/gi, '') : '');
  $('#%SCHEDULE%-event-text-color').val((event.textColor != undefined) ? event.textColor.replace(/#/gi, '') : '');      
  $('#%SCHEDULE%-event-id').val(event.id);
  %SCHEDULE_DIALOG_VAR%.%SCHEDULE_DIALOG_EVENT%('option','title','%EDIT_EVENT_LABEL%');
  var varEvent = event;
  %SCHEDULE_DIALOG_VAR%.%SCHEDULE_DIALOG_EVENT%('option','buttons',{
    '%DELETE_LABEL%': function() {
    if(confirm('%CONFIRM_DELETE%')){
      if(varEvent.id != undefined){
        varEvent.title = $('#%SCHEDULE%-event-title').val();
        varEvent.start = %SCHEDULE_START_VAR%.datepicker('getDate');
        varEvent.end = %SCHEDULE_END_VAR%.datepicker('getDate');
        varEvent.allDay = $('#%SCHEDULE%-event-all-day').is(':checked');
        varEvent.editable = $('#%SCHEDULE%-event-editable').is(':checked');
        varEvent.url = $('#%SCHEDULE%-event-url').val();
        %SCHEDULE_VAR%.event = varEvent;
        $('#%SCHEDULE%-event-action').val('delete');
        %SCHEDULE_VAR%.clientAction = 'delete';
        $('%SCHEDULE_FORM_JQUERY%').submit();
      }
    }
  },
    '%SAVE_LABEL%': function() {
      varEvent.title = $('#%SCHEDULE%-event-title').val();
      varEvent.start = %SCHEDULE_START_VAR%.datepicker('getDate');
      varEvent.end = %SCHEDULE_END_VAR%.datepicker('getDate');
      varEvent.allDay = $('#%SCHEDULE%-event-all-day').is(':checked');
      varEvent.editable = $('#%SCHEDULE%-event-editable').is(':checked');
      varEvent.url = $('#%SCHEDULE%-event-url').val();
      varEvent.className = $('#%SCHEDULE%-event-category').val();             
      varEvent.color  = '#' + $('#%SCHEDULE%-event-color').val();
      varEvent.backgroundColor = '#' + $('#%SCHEDULE%-event-bg-color').val();
      varEvent.borderColor  = '#' + $('#%SCHEDULE%-event-border-color').val();
      varEvent.textColor  = '#' + $('#%SCHEDULE%-event-text-color').val();
      %SCHEDULE_VAR%.event = varEvent;
      end = %SCHEDULE_END_VAR%.datepicker('getDate');
      start = %SCHEDULE_START_VAR%.datepicker('getDate');
      if(start <=  end || (end=='' || end==null)){
        if($('%SCHEDULE_FORM_JQUERY%').valid() && $("%SCHEDULE_TABS_JQUERY%").%SCHEDULE_TABS_EVENT%('option', 'selected') == 0){
          %SCHEDULE_VAR%.clientAction = 'update';
          $('#%SCHEDULE%-event-startDate').val(%SCHEDULE_START_VAR%.datepicker('getDate'));
          $('#%SCHEDULE%-event-endDate').val(%SCHEDULE_END_VAR%.datepicker('getDate'));
          $('#%SCHEDULE%-event-action').val('update');
          $('%SCHEDULE_FORM_JQUERY%').submit();
        }
      }else{
        alert('%MIN_MAX_VALIDATION_ERROR%');
      }
    }
  });
  %SCHEDULE_DIALOG_VAR%.%SCHEDULE_DIALOG_EVENT%('open');
  return false;
}
EOF;
    $sintax = str_replace('%SCHEDULE_VAR%', $this->getComponentVarName(), $sintax);
    $sintax = str_replace('%SCHEDULE%', $this->getId(), $sintax);
    $sintax = str_replace('%SCHEDULE_START_VAR%', $this->getStartTimepickerVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_END_VAR%', $this->getEndTimepickerVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_DIALOG_VAR%', $this->getDialogVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_FORM_JQUERY%', $this->getFormJQuerySelector(), $sintax);
    $sintax = str_replace('%SCHEDULE_TABS_JQUERY%', $this->getTabsJQuerySelector(), $sintax);
    $sintax = str_replace('%SCHEDULE_DIALOG_EVENT%', YsUIDialog::$uiEvent, $sintax);
    $sintax = str_replace('%SCHEDULE_TABS_EVENT%', YsUITabs::$uiEvent, $sintax);

    $sintax = str_replace('%EDIT_EVENT_LABEL%', $this->getI18NVar('EDIT_EVENT_LABEL'), $sintax);
    $sintax = str_replace('%SAVE_LABEL%', $this->getI18NVar('SAVE_LABEL'), $sintax);
    $sintax = str_replace('%DELETE_LABEL%', $this->getI18NVar('DELETE_LABEL'), $sintax);
    $sintax = str_replace('%MIN_MAX_VALIDATION_ERROR%', $this->getI18NVar('MIN_MAX_VALIDATION_ERROR'), $sintax);
    $sintax = str_replace('%CONFIRM_DELETE%', $this->getI18NVar('CONFIRM_DELETE'), $sintax);

    return $sintax;
  }
   
  private function getOnDropResizeSintax(){
    $sintax= <<<EOF
    %SCHEDULE_VAR%.onDropResize = function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view){
      $('#%SCHEDULE%-event-id').val(event.id);
      $('#%SCHEDULE%-event-title').val(event.title);
      $('#%SCHEDULE%-event-all-day').attr('checked',event.allDay);
      $('#%SCHEDULE%-event-editable').attr('checked',event.editable);
      $('#%SCHEDULE%-event-url').val(event.url);
      $('#%SCHEDULE%-event-startDate').val(event.start);
      $('#%SCHEDULE%-event-endDate').val(event.end);
      $('#%SCHEDULE%-event-action').val('update');
      %SCHEDULE_START_VAR%.datepicker('setDate',event.start);
      %SCHEDULE_END_VAR%.datepicker('setDate',event.end);
      %SCHEDULE_VAR%.event = event;
      %SCHEDULE_VAR%.clientAction = 'update';
      $('#%SCHEDULE%Form').submit();
    }
EOF;
    $sintax = str_replace('%SCHEDULE_VAR%', $this->getComponentVarName(), $sintax);
    $sintax = str_replace('%SCHEDULE%', $this->getId(), $sintax);
    $sintax = str_replace('%SCHEDULE_START_VAR%', $this->getStartTimepickerVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_END_VAR%', $this->getEndTimepickerVar(), $sintax);
    return $sintax;
  }
  
  private function callOnDropResizeSintax(){
    $sintax = '%SCHEDULE_VAR%.onDropResize(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view);';
    $sintax = str_replace('%SCHEDULE_VAR%', $this->getComponentVarName(), $sintax);
    return $sintax;
  }
  
  public function getI18NVars() {
    return $this->i18nvars;
  }

  public function setI18NVars($i18nvars) {
    $this->i18nvars = $i18nvars;
  }
  
  public function getI18NVar($varKey) {
    return $this->i18nvars[$varKey];
  }

  public function setI18NVar($varKey, $value) {
    $this->i18nvars[$varKey] = $value;
  }
  
  public function buildColorpickers(){
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCOLORPICKER);
    $selectors = str_replace('%SCHEDULE%',$this->getId(),'#%SCHEDULE%-event-color, #%SCHEDULE%-event-bg-color, #%SCHEDULE%-event-border-color, #%SCHEDULE%-event-text-color');
    return YsJQColorPicker::build()->in($selectors);
  }
  
  private function buildValidationForm(){
    return $this->getValidateJQueryObject();
  }
  
  public function getValidateJQueryObject(){
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQVALIDATE);
    return YsJQValidate::build()->in($this->getFormJQuerySelector())->setUITheme()->_submitHandler(YsJsFunction::call($this->getSubmitHandler()));
  }
    
  private function getSubmitHandler(){
    $sintax= <<<EOF
function(form) {
  jQuery(form).ajaxSubmit({
    target: '%TARGET%',
    success: function(){
      if(%SCHEDULE_VAR%.clientAction == 'add'){
        %SCHEDULE_VAR%.fullCalendar('renderEvent',{
          id     : $('#%SCHEDULE%-event-id').val() ,
          title  : $('#%SCHEDULE%-event-title').val(),
          start  : %SCHEDULE_START_VAR%.datepicker('getDate'),
          end    : %SCHEDULE_END_VAR%.datepicker('getDate'),
          allDay : $('#%SCHEDULE%-event-all-day').is(':checked') ,
          editable : $('#%SCHEDULE%-event-editable').is(':checked'),
          url : $('#%SCHEDULE%-event-url').val(),
          className : ($('#%SCHEDULE%-event-category').length == 0) ? '' : $('#%SCHEDULE%-event-category').val(),
          color  : '#' + $('#%SCHEDULE%-event-color').val(),
          backgroundColor   : '#' + $('#%SCHEDULE%-event-bg-color').val(),
          borderColor   : '#' + $('#%SCHEDULE%-event-border-color').val(),
          textColor  : '#' + $('#%SCHEDULE%-event-text-color').val()
        }, true);
      }            
      if(%SCHEDULE_VAR%.clientAction == 'update'){
        %SCHEDULE_VAR%.fullCalendar('updateEvent', %SCHEDULE_VAR%.event);
      }if(%SCHEDULE_VAR%.clientAction == 'delete'){
        %SCHEDULE_VAR%.fullCalendar("removeEvents", %SCHEDULE_VAR%.event.id);
      }
      jQuery.pnotify({"pnotify_text": "%SUCCESS_MESSAGE%","pnotify_stack": false});
    },
    error: function(){
      jQuery.pnotify({"pnotify_text": "%ERROR_MESSAGE%","pnotify_stack": false, "pnotify_type": "error"});
    },
    beforeSend: function(){
      %SCHEDULE_DIALOG_VAR%.%SCHEDULE_DIALOG_EVENT%("close");
      jQuery('#%SCHEDULE%').block({"message": "%LOADING_MESSAGE%"});
    },
    complete: function(){
      jQuery('#%SCHEDULE%').unblock();
    }
  });
}
EOF;
    $sintax = str_replace('%SCHEDULE_VAR%', $this->getComponentVarName(), $sintax);
    $sintax = str_replace('%SCHEDULE%', $this->getId(), $sintax); 
    $sintax = str_replace('%SCHEDULE_START_VAR%', $this->getStartTimepickerVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_END_VAR%', $this->getEndTimepickerVar(), $sintax);
    $sintax = str_replace('%SCHEDULE_DIALOG_VAR%', $this->getDialogVar(), $sintax);
    $sintax = str_replace('%TARGET%', $this->getTarget(), $sintax);
    $sintax = str_replace('%SCHEDULE_DIALOG_EVENT%', YsUIDialog::$uiEvent, $sintax);
    
    $sintax = str_replace('%SUCCESS_MESSAGE%', $this->getI18NVar('SUCCESS_MESSAGE'), $sintax);
    $sintax = str_replace('%ERROR_MESSAGE%', $this->getI18NVar('ERROR_MESSAGE'), $sintax);
    $sintax = str_replace('%LOADING_MESSAGE%', $this->getI18NVar('LOADING_MESSAGE'), $sintax);    
    return $sintax;
  }
  
  private function buildTabs(){
    return $this->getJQueryTabsObject();
  } 

  private function buildDialog(){
    return $this->getJQueryDialogObject();
  }
  
  private function buildTooltip(){
    return $this->getJQueryTooltipObject();
  }
  
  public function getJQueryTooltipObject(){
    return YsPNotify::tooltip(array($this->getTooltipVar(),$this->getTooltipVar()),"");
  }
  
  public function getJQueryTabsObject(){
    return YsUITabs::build()->in($this->getTabsJQuerySelector());
  }
  
  public function getJQueryDialogObject(){
    return YsUIDialog::build()
             ->in($this->getDialogJQuerySelector())
             ->_autoOpen(false)
             ->_modal(true)
             ->_width($this->getDialogWidth())
             ->_height($this->getDialogHeight())
             ->_open(YsJsFunction::execute(YsUITabs::option('selected', YsArgument::value(0))->in($this->getTabsJQuerySelector())))
             ->assignToVarName($this->getDialogVar());
  }
  
  private function buildTimePickers(){
    return $this->getJQueryStartTimpickerObject() . ';' . $this->getJQueryEndTimpickerObject();
  }
  
  public function getJQueryStartTimpickerObject(){
    return YsUIDateTimepicker::build()
             ->_ampm($this->getAmPm())
             ->in($this->getStartTagJQuerySelector())
             ->assignToVarName($this->getStartTimepickerVar());
  }
  
  public function getJQueryEndTimpickerObject(){
    return YsUIDateTimepicker::build()
             ->_ampm($this->getAmPm())
             ->in($this->getEndTagJQuerySelector())
             ->assignToVarName($this->getEndTimepickerVar());
  }
  
  private function getStartTagId(){
    return $this->generateWidgetTagId('event-start');
  }
  
  private function getStartTagJQuerySelector($selector = '#'){
    return $selector . $this->getStartTagId();
  }
  
  private function getEndTagId(){
    return $this->generateWidgetTagId('event-end');
  }
  
  private function getEndTagJQuerySelector($selector = '#'){
    return $selector . $this->getEndTagId();
  }
  
  public function getAction() {
    return $this->action;
  }

  public function setAction($action) {
    $this->action = $action;
  }

  public function setURL($url){
    $this->setAction($url);
  }
  
  public function getTarget() {
    return $this->target;
  }

  public function setTarget($target) {
    $this->target = $target;
  }
  
  public function getLabelsWidth() {
    return $this->labelsWidth;
  }

  public function setLabelsWidth($labelsWidth) {
    $this->labelsWidth = $labelsWidth;
  }

  public function getDialogWidth() {
    return $this->dialogWidth;
  }

  public function setDialogWidth($dialogWidth) {
    $this->dialogWidth = $dialogWidth;
  }

  public function getDialogHeight() {
    return $this->dialogHeight;
  }

  public function setDialogHeight($dialogHeight) {
    $this->dialogHeight = $dialogHeight;
  }
  
  public function getCategories() {
    return $this->categories;
  }

  public function setCategories(array $categories) {
    $this->categories = $categories;
  }
  
  public function addCategory($key, $value){
    $this->categories[$key] = $value;
  }
  
  public function removeCategory($key){
    if($this->categories !== null && is_array($this->categories)){
      unset($this->categories[$key]);
    }
  }
  
  public function getCategoryOptions(){  
    $options = '<option value=""></option>';
    if($this->categories !== null && is_array($this->categories)){
      $optionsPattern = '<option value="%s">%s</option>';
      $options = '';
      foreach($this->categories as $key => $value){
        $options .= sprintf($optionsPattern,$key,$value);
      }
    }
    return $options;
  }
  
  public function getAmPm() {
    return $this->ampm;
  }

  public function setAmPm($ampm) {
    $this->ampm = $ampm;
  }
  
  public function getIdEventGeneratorSintax() {
    return $this->idEventGeneratorSintax;
  }

  public function setIdEventGeneratorSintax($idEventGeneratorSintax) {
    $this->idEventGeneratorSintax = $idEventGeneratorSintax;
  }
}