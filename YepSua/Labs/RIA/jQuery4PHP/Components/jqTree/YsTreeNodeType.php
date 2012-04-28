<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsTreeNodeType Cross browser tree component.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */

class YsTreeNodeType extends YsComponentOption{
  
  public static $ICON_IMAGE = 'image';
  public static $ICON_POSITION = 'position';
  public static $DEFAULT_TYPE_ATTR = 'rel';

  private $max_children;
  private $max_depth;
  private $valid_children;
  private $select_node;
  private $open_node;
  private $close_node;
  private $create_node;
  private $delete_node;
  private $icon;
  private $id;
  private $typeAttr;
  
  public function __construct($id, $iconImage = null) {
    $this->setId($id);
    $this->setIconImage($iconImage);
    $this->setTypeAttr(self::$DEFAULT_TYPE_ATTR);
  }
  
  public function varsToUnset(){
    return array('id','typeAttr');
  }
  
  public function getTypeAttr() {
    return $this->typeAttr;
  }

  public function setTypeAttr($typeAttr) {
    $this->typeAttr = $typeAttr;
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }
  
  public function getMaxChildren() {
    return $this->max_children;
  }

  public function setMaxChildren($max_children) {
    $this->max_children = $max_children;
  }

  public function getMaxDepth() {
    return $this->max_depth;
  }

  public function setMaxDepth($max_depth) {
    $this->max_depth = $max_depth;
  }

  public function getValidChildren() {
    return $this->valid_children;
  }

  public function setValidChildren($valid_children) {
    $this->valid_children = $valid_children;
  }

  public function getSelectNode() {
    return $this->select_node;
  }

  public function setSelectNode($select_node) {
    $this->select_node = $select_node;
  }

  public function getOpenNode() {
    return $this->open_node;
  }

  public function setOpenNode($open_node) {
    $this->open_node = $open_node;
  }

  public function getCloseNode() {
    return $this->close_node;
  }

  public function setCloseNode($close_node) {
    $this->close_node = $close_node;
  }

  public function getCreateNode() {
    return $this->create_node;
  }

  public function setCreateNode($create_node) {
    $this->create_node = $create_node;
  }

  public function getDeleteNode() {
    return $this->delete_node;
  }

  public function setDeleteNode($delete_node) {
    $this->delete_node = $delete_node;
  }
  
  public function getIcon() {
    return $this->icon;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
  }
  
  public function setIconImage($icon) {
    $this->icon[self::$ICON_IMAGE] = $icon;
  }

  public function setIconPosition($value) {
    $this->icon[self::$ICON_POSITION] = $icon;
  }
  
  public function applyTo(&$nodes){
    $args = func_get_args();
    foreach($args as $node){
      $node->setType($this);
    }
  }
  
  public function optionsToArray(){
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
