<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsCalendarEvent
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */

class YsCalendarEvent extends YsComponentOption{
  
  public static $DEFAULT_FORMAT = 'U';
  
  private $id;
  private $title;
  private $allDay;
  private $start;
  private $end;
  private $url;
  private $className;
  private $editable;
  private $source;
  private $color;
  private $backgroundColor;
  private $borderColor;
  private $textColor;
  private $currentTimezone;
  private $allDayDefault;
  private $ignoreTimezone;
  
  private $timeZone;
  private $format;
  
  public function __construct($id,$title,$format = null) {
    parent::__construct();
    $this->setId($id);
    $this->setTitle($title);
    $format = ($format!==null) ? $format : self::$DEFAULT_FORMAT;
    $this->setFormat($format);
  }
  
  public function varsToUnset() {
    return array_merge(array('timeZone','format'), parent::varsToUnset());
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
 
  public function getFormat() {
    return $this->format;
  }

  public function setFormat($format) {
    $this->format = $format;
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getAllDay() {
    return $this->allDay;
  }

  public function setAllDay($allDay) {
    $this->allDay = $allDay;
  }

  public function getStart() {
    return $this->start;
  }

  public function setStart($start) {
    $this->start = $start;
  }

  public function getEnd() {
    return $this->end;
  }

  public function setEnd($end) {
    $this->end = $end;
  }

  public function getUrl() {
    return $this->url;
  }

  public function setUrl($url) {
    $this->url = $url;
  }

  public function getClassName() {
    return $this->className;
  }

  public function setClassName($className) {
    $this->className = $className;
  }

  public function getEditable() {
    return $this->editable;
  }

  public function setEditable($editable) {
    $this->editable = $editable;
  }

  public function getSource() {
    return $this->source;
  }

  public function setSource($source) {
    $this->source = $source;
  }

  public function getColor() {
    return $this->color;
  }

  public function setColor($color) {
    $this->color = $color;
  }

  public function getBackgroundColor() {
    return $this->backgroundColor;
  }

  public function setBackgroundColor($backgroundColor) {
    $this->backgroundColor = $backgroundColor;
  }

  public function getBorderColor() {
    return $this->borderColor;
  }

  public function setBorderColor($borderColor) {
    $this->borderColor = $borderColor;
  }

  public function getTextColor() {
    return $this->textColor;
  }

  public function setTextColor($textColor) {
    $this->textColor = $textColor;
  }
  
  public function getCurrentTimezone() {
    return $this->currentTimezone;
  }

  public function setCurrentTimezone($currentTimezone) {
    $this->currentTimezone = $currentTimezone;
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
    
  public function formatStartAndEnd(){
    if($this->end instanceof DateTime){
      if($this->getTimezone() !== null){
        $this->end = new DateTime($this->end->format('Y-m-d H:i:s'),$this->getDateTimezone());
      }
      $this->end = $this->end->format($this->getFormat());
    }
    if($this->start instanceof DateTime){
      if($this->getTimezone() !== null){
        $this->start = new DateTime($this->start->format('Y-m-d H:i:s'),$this->getDateTimezone());
      }
      $this->start = $this->start->format($this->getFormat());
    }
  }
  
  public function optionsToArray(){
    $config = array();
    $vars = get_object_vars($this);
    foreach($this->varsToUnset() as $value){
      unset($vars[$value]);
    }
    foreach($vars as $var => $value){
      if(isset($this->$var)){
        $config[$var] = $this->$var;
      }
    }
    return $config;
  }
  
}
