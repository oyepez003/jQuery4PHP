<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsTreeNode Cross browser tree component.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */

class YsTreeNode extends YsLinkableTreeNode{
   
  private $initiallyOpen;
  private $initiallyLoad;
  private $selected;
  private $checked;
  private $closed;
  private $open;
  private $title;
  private $type;
  
  public function __construct($id, $caption = null, YsDefaultTreeNode &$parent = null) {
    parent::__construct($id, $caption, $parent);
    $this->setId($id);
    $this->addHtmlPropertie('id', $id);
    $this->addListHtmlPropertie('caption', $caption);
    $this->addListHtmlPropertie('node-id', $id);
  }
  
  public function addMetadata($id,$value){
    $this->addListHtmlPropertie($id, $value);
  }
  
  public function buildLinkPattern($caption){
    $pattern = '';
    if(is_array($this->getLabel())){
      foreach($this->getLabel() as $key => $val){
        parent::cleanLinkHtmlProperties();
        parent::addHtmlPropertie('class', $key);
        parent::addHtmlPropertie('id', sprintf('%s-%s',$this->getId(),$key));
        $pattern .= parent::buildLinkPattern($val);
      }
    }else{
      $pattern .= parent::buildLinkPattern($caption);
    }
    return $pattern;
  }
    
  public function isInitiallyOpen() {
    return $this->initiallyOpen;
  }

  public function setInitiallyOpen($initiallyOpen = true) {
    $this->initiallyOpen = $initiallyOpen;
  }
  
  public function isInitiallyLoad() {
    return $this->initiallyLoad;
  }

  public function setInitiallyLoad($initiallyLoad = true) {
    $this->initiallyLoad = $initiallyLoad;
  }
  
  public function isSelected() {
    return $this->selected;
  }

  public function setSelected($selected = true) {
    $this->selected = $selected;
  }
  
  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->addLinkHtmlPropertie('title',$title);
    $this->title = $title;
  }
  
  public function getChecked() {
    return $this->checked;
  }
  
  public function setClosed($closed = true){
    $this->closed = $closed;
    if($closed === true){
      $this->addListHtmlPropertie('class', 'jstree-closed');
    }
  }
  
  public function isClosed() {
    return $this->closed;
  }
  
  public function isOpen() {
    return $this->open;
  }

  public function setOpen($open = true) {
    $this->open = $open;
    if($open === true){
      $this->addListHtmlPropertie('class', 'jstree-open');
    }
  }

  public function setChecked($checked = true) {
    $this->checked = $checked;
    if($checked === true){
      $this->addListHtmlPropertie('class', 'jstree-checked');
    }
  }
  
  public function setType($type){
    if($type instanceof YsTreeNodeType){
      $this->addListHtmlPropertie($type->getTypeAttr(),$type->getId());
      $this->type = $type->getId();
    }else{
      $this->addListHtmlPropertie(YsTreeNodeType::$DEFAULT_TYPE_ATTR,$type);
      $this->type = $type;
    }
  }
  
  public function getType() {
    return $this->type;
  }
  
  public function setSelectedAndChecked(){
    $this->setSelected();
    $this->setChecked();
  }

  public function getInitiallyOpenNodes(){
    $result = array();
    foreach ($this->getArrayCopy() as $node){
        if($node->isLeaf() && $node->isInitiallyOpen()){
            $result[sizeof($result)] = $node->getId();
        }else{
          if($node->isInitiallyOpen()){
            $result[sizeof($result)] = $node->getId();
          }
          $result = array_merge($result, $node->getInitiallyOpenNodes());
        }
    }
    return $result;
  }
  
  public function getInitiallyLoadNodes(){
    $result = array();
    foreach ($this->getArrayCopy() as $node){
        if($node->isLeaf() && $node->isInitiallyLoad()){
            $result[sizeof($result)] = $node->getId();
        }else{
          if($node->isInitiallyLoad()){
            $result[sizeof($result)] = $node->getId();
          }
          $result = array_merge($result, $node->getInitiallyLoadNodes());
        }
    }
    return $result;
  }
  
  public function getSelectedNodes(){
    $result = array();
    foreach ($this->getArrayCopy() as $node){
        if($node->isLeaf() && $node->isSelected()){
            $result[sizeof($result)] = $node->getJQuerySelector();
        }else{
          if($node->isSelected()){
            $result[sizeof($result)] = $node->getJQuerySelector();
          }
          $result = array_merge($result, $node->getSelectedNodes());
        }
    }
    return $result;
  }
  
  public static function deleteListPrefix($value){
    return substr($value,strpos($value, self::$PREFIX_SEPARATOR) + 1); 
  }

}
