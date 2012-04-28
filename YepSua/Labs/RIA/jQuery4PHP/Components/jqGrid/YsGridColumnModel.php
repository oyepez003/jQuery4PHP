<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

include_once('YsGridField.php');

/**
 * YsGridColumnModel TODO description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsGridColumnModel extends YsGridField {
  
  public function __construct($id = null, $colName = null) {
    parent::__construct($id, $colName);
    unset($this->id);
    unset($this->colName);
  }
  
}
