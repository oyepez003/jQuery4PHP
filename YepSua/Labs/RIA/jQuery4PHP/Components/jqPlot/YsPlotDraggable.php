<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotDraggable  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotDraggable extends YsComponentOption{
    
  private $color;
  private $constrainTo;

  public function getColor() {
      return $this->color;
  }

  /**
   * CSS color specifications for the dragged point
   * (and adjacent line segment or bar).
   * @param string $color
   */
  public function setColor($color) {
      $this->color = $color;
  }

  public function getConstrainTo() {
      return $this->constrainTo;
  }

  /**
   * Constrain dragging motion to an axis or to none.
   * Allowable values are ‘none’, ‘x’, ‘y’
   * @param string $constrainTo
   */
  public function setConstrainTo($constrainTo) {
      $this->constrainTo = $constrainTo;
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