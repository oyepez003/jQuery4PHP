<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsGridNavigator 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: private $Idprivate $
 */
class YsGridKeyboard {
  
  private $onEnter;
  private $onSpace;
  private $onLeftKey;
  private $onRightKey;
  private $scrollingRows;
  
  private function varsToUnset(){
    return array();
  }
  
  public function getOnEnter() {
    return $this->onEnter;
  }

  public function setOnEnter($onEnter) {
    $this->onEnter = $onEnter;
  }

  public function getOnSpace() {
    return $this->onSpace;
  }

  public function setOnSpace($onSpace) {
    $this->onSpace = $onSpace;
  }

  public function getOnLeftKey() {
    return $this->onLeftKey;
  }

  public function setOnLeftKey($onLeftKey) {
    $this->onLeftKey = $onLeftKey;
  }

  public function getOnRightKey() {
    return $this->onRightKey;
  }

  public function setOnRightKey($onRightKey) {
    $this->onRightKey = $onRightKey;
  }

  public function getScrollingRows() {
    return $this->scrollingRows;
  }

  public function setScrollingRows($scrollingRows) {
    $this->scrollingRows = $scrollingRows;
  }

  public function render($jQuerySelector, $pager){
    $render = YsJQGrid::bindKeys($this->optionsToArray());
    $render->in($jQuerySelector);
    return $render;
  }

  private function optionsToArray(){
    $config = array();
    $vars = get_class_vars(__CLASS__);
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