<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsEditorToolbar description
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsEditorToolbar extends YsComponentOption{
  
  private $panels;
  private $name;
  private $editorPanels;
  
  public static $TYNY = 'tiny';
	public static $COMPACT = 'compact';
	public static $NORMAL = 'normal';
	public static $COMPLETE = 'complete';
	public static $MAXI = 'maxi';
	public static $ELDORADO = 'eldorado'; 
    
  public function __construct($name) {
    $this->name = $name;
    $this->panels = new ArrayObject();
    $this->editorPanels = new ArrayObject();
  }
  
  public function getPanels() {
    return $this->panels;
  }

  public function setPanels($panels) {
    $this->panels = $panels;
  }
  
  public function addPanel($panel){
    if($panel instanceof YsEditorPanel){
      $this->editorPanels->append($panel);
      $panel = $panel->getName();
    }
    $this->panels->append($panel);
  }
  
  public function addPanels($panel){
    $args = func_get_args();
    foreach($args as $panel){
      $this->addPanel($panel);
    }
  }
  
  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
  
  public function getToolbar(){
    return array($this->getName() => $this->optionsToArray());
  }
  
  public function optionsToArray(){
    return $this->panels->getArrayCopy();
  }
  
  public function getEditorPanels() {
    if($this->editorPanels->count() > 0){
      $panels = array();
      foreach ($this->editorPanels->getArrayCopy() as $editorPanel){
        $panels[$editorPanel->getName()] = $editorPanel->optionsToArray();
      }
      return $panels;
    }else{
      return null;
    }
  }

  public function setEditorPanels($editorPanels) {
    $this->editorPanels = $editorPanels;
  }
  
}