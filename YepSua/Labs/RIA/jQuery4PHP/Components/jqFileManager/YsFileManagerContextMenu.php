<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsFileManagerContextMenu description
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsFileManagerContextMenu extends YsComponentOption{
  
  public static $OPTION_DELIM = "delim";
  public static $OPTION_SEPARATOR = "delim";
  public static $OPTION_RELOAD = "reload";
  public static $OPTION_SELECT = "select";
  public static $OPTION_OPEN = "open";
  public static $OPTION_MKDIR = "mkdir";
  public static $OPTION_MKFILE = "mkfile";
  public static $OPTION_UPLOAD= "upload";
  public static $OPTION_COPY = "copy";
  public static $OPTION_PASTE = "paste";
  public static $OPTION_RM = "rm";
  public static $OPTION_RENAME = "rename";
  public static $OPTION_EDIT = "edit";
  public static $OPTION_INFO = "info";
  public static $OPTION_QUICKLOOK = "quicklook";
  public static $OPTION_RESIZE = "resize";
  public static $OPTION_CUT = "cut";
  public static $OPTION_DUPLICATE = "duplicate";
  public static $OPTION_EXTRACT = "extract";
  public static $OPTION_ARCHIVE = "archive";
  
  
  public static $CONTEXT_MENU_CWD = "cwd"; 
  public static $CONTEXT_MENU_FILE = "file"; 
  public static $CONTEXT_MENU_GROUP = "group"; 
  
  private $options;
  
  public static $DEFAULT_OPTIONS = array(
    'cwd' => array('reload', 'delim', 'mkdir', 'mkfile', 'upload', 'delim', 'paste', 'delim', 'info')
   ,'file' => array('select', 'open', 'quicklook', 'delim', 'copy', 'cut', 'rm', 'delim', 'duplicate', 'rename', 'edit', 'resize', 'archive', 'extract', 'delim', 'info')  
   ,'group' => array('select', 'copy', 'cut', 'rm', 'delim', 'archive', 'extract', 'delim', 'info')  
  );
  
  public function __construct() {
    $this->setDefaultOptions();
  }
  
  public function removeAllOptions(){
    $this->options = array();
  }
  
  public function setDefaultOptions(){
     $this->options = self::$DEFAULT_OPTIONS;
  }
      
  public function addOptions($contextMenu,$args){
    if(is_array($args)){
      $options = $args;
    }else{
      $options = func_get_args();
      unset($options[0]);
    }
    $this->options[$contextMenu] = $options;
  }
  
  public function addOptionsInGroupContextMenu($args){
    $args = func_get_args();
    $this->addOptions(self::$CONTEXT_MENU_GROUP, $args);
  }
  
  public function addOptionsInCWDContextMenu($args){
    $args = func_get_args(); 
    $this->addOptions(self::$CONTEXT_MENU_CWD, $args);
  }
  
  public function addOptionsInFileContextMenu($args){
    $args = func_get_args();
    $this->addOptions(self::$CONTEXT_MENU_FILE, $args);
  }

  public function getOptions() {
    return $this->options;
  }

  public function setOptions($options) {
    $this->options = $options;
  }
  
  public function optionsToArray(){
    return $this->getOptions();
  }

}