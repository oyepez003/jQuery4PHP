<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsKeys todo description
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsKeys extends YsJQueryPlugin {
  
  const VERSION = "0.9.7r635";
  const LICENSE = "(hotkeys MIT or GPL Version 2 licenses) ()";

  public static $keystrokesEvent = 'keystrokes';
  public static $defaultHotkeysEvent = YsJQueryConstant::KEYDOWN_EVENT;

  public function registerOptions(){
    return   array();
  }

  /**
   * Retrieves a instance of this class.
   * @return YsKeys
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  public static function build($jQuerySelector = YsJQueryConstant::DOCUMENT){
    $jquery = self::getInstance();
    $jquery->setEvent(YsJQueryConstant::BIND_EVENT);
    $jquery->setSelector($jQuerySelector);
    return $jquery;
  }
  
  public static function hotkeys($jQuerySelector = YsJQueryConstant::DOCUMENT){
    $jquery = self::build($jQuerySelector);
    $jquery->_on(self::$defaultHotkeysEvent);
    return $jquery;
  }
  
  public static function keystrokes($jQuerySelector = YsJQueryConstant::DOCUMENT){
    $jquery = self::build($jQuerySelector);
    $jquery->_on(self::$keystrokesEvent);
    return $jquery;
  }
  
  public function _on($event){
    $this->addArgumentsBeforeOptions($event);
    return $this;
  }
  
  public function _hotkey($combination){
    $this->addArgumentsBeforeOptions($combination);
    return $this;
  }
  
  public function _combination($combination){
    $this->addOption('combi', new YsArgument($combination));
    return $this;
  }
  
  public function _disableInInput($boolean){
    $this->addOption('disableInInput', new YsArgument($boolean));
    return $this;
  }
  
  public function _keys($keys){
    $args = func_get_args();
    $this->addOption('keys', new YsArgument($args));
    return $this;
  }
  
  public function _handler($handler){
    $handler = ($handler instanceof YsJsFunction) 
               ? $handler 
               : new YsJsFunction($handler);
    $handler->setReturnFalse(true);
    $this->addArgumentsAfterOptions($handler);
    return $this;
  }
  
}