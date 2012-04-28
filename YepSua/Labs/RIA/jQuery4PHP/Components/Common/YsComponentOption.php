<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsComponentOption todo description
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
abstract class YsComponentOption {

  public function  __construct() {}

  public function varsToUnset(){
    return array();
  }

  public function buildOptions(){
    return $this->optionsToArray();
  }

  public abstract function optionsToArray();

  public function  __toString() {
    $options = $this->buildOptions();
    if(sizeof($options) > 0) {
      return YsJSON::arrayToJson($this->buildOptions());
    }else{
      return YsJSON::arrayToJson($this->buildOptions());
    }
  }

}