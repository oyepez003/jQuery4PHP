<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsFileManagerToolbar description
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsFileManagerToolbar extends YsComponentOption{
  
  public static $BUTTON_BACK = "back";
  public static $BUTTON_RELOAD = "reload";
  public static $BUTTON_SELECT = "select";
  public static $BUTTON_OPEN = "open";
  public static $BUTTON_MKDIR = "mkdir";
  public static $BUTTON_MKFILE = "mkfile";
  public static $BUTTON_UPLOAD= "upload";
  public static $BUTTON_COPY = "copy";
  public static $BUTTON_PASTE = "paste";
  public static $BUTTON_RM = "rm";
  public static $BUTTON_RENAME = "rename";
  public static $BUTTON_EDIT = "edit";
  public static $BUTTON_INFO = "info";
  public static $BUTTON_QUICKLOOK = "quicklook";
  public static $BUTTON_RESIZE = "resize";
  public static $BUTTON_ICONS = "icons";
  public static $BUTTON_LIST = "list";
  public static $BUTTON_HELP = "help";
  
  private $buttons;
  
  public static $DEFAULT_BUTTONS = array(
      array('back', 'reload'),
			array('select', 'open'),
			array('mkdir', 'mkfile', 'upload'),
			array('copy', 'paste', 'rm'),
			array('rename', 'edit'),
			array('info', 'quicklook', 'resize'),
			array('icons', 'list'),
			array('help'));
  
  public function __construct() {
    $this->setDefaultButtons();
  }
  
  public function removeAllButtons(){
    $this->buttons = array();
  }
  
  public function setDefaultButtons(){
     $this->buttons = self::$DEFAULT_BUTTONS;
  }
      
  public function addButtons($args){
    $buttons = func_get_args();
    if(is_array($this->buttons)){
      $buttonsGroup = $this->buttons;
      array_push($buttonsGroup,$buttons);
      $this->buttons = $buttonsGroup;
    }else{
      $this->buttons = $buttons;
    }
  } 
  
  public function getButtons() {
    return $this->buttons;
  }

  public function setButtons($buttons) {
    $this->buttons = $buttons;
  }
  
  public function optionsToArray(){
    return $this->getButtons();
  }
}