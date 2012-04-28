<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQMonitor todo description
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQMonitor extends YsJQueryPlugin {
  
  const VERSION = "0.9.100511";
  const LICENSE = "MIT License";
  
  public static $event = 'idleTimer';
  public static $idelState = 'idle.idleTimer';
  public static $activeState = 'active.idleTimer';
  
  public function registerOptions(){
    return   array();
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQMonitor
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  public static function build($jQuerySelector = YsJQueryConstant::DOCUMENT){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    $jquery->in($jQuerySelector);
    return $jquery;
  }
  
  public static function init($timeout = 5000){
    $jquery = self::build();
    return $jquery->addArgumentsBeforeOptions($timeout);
  }
  
  public static function onActive($jQuerySelector = YsJQueryConstant::DOCUMENT, $handler = null){
    return self::onState(self::$activeState, $jQuerySelector, $handler);
  }
  
  public static function onIdle($jQuerySelector = YsJQueryConstant::DOCUMENT, $handler = null){
    return self::onState(self::$idelState, $jQuerySelector, $handler);
  }
  
  private static function onState($state, $jQuerySelector, $handler){
    $jquery = YsJQuery::bind()->in($jQuerySelector);
    $jquery->eventType($state);
    if($handler !== null) $jquery->handler($handler);
    return $jquery;
  }
  
  public function _onActive($handler){
    $this->addPreSintax(self::onActive($this->getSelector(),$handler));
    return $this;
  }
  
  public function _onIdle($handler){
    $this->addPreSintax(self::onIdle($this->getSelector(),$handler));
    return $this;
  }
  
  public static function kill($jQuerySelector = YsJQueryConstant::DOCUMENT){
    $jquery = self::build();
    $jquery->addArgumentsBeforeOptions('destroy');
    return $jquery;
  }
  
  public static function getElapsedTime($jQuerySelector = YsJQueryConstant::DOCUMENT){
    $jquery = self::build();
    $jquery->addArgumentsBeforeOptions('getElapsedTime');
    return $jquery;
  }
  
  public static function timeout($jQuerySelector = YsJQueryConstant::DOCUMENT){
    $jquery = self::build();
    $jquery->addArgumentsBeforeOptions('timeout');
    return $jquery;
  }
  
  public function _timeout($timeout){
    $this->addArgumentsBeforeOptions(YsArgument::value($timeout));
    return $this;
  }
}