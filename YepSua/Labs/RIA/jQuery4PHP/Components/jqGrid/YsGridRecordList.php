<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsGridRecordList todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsGridRecordList extends ArrayObject implements ArrayAccess{

  public function append($value){
    if($value instanceof YsGridRecord){
      parent::append($value);
    }else{
      throw new YsException("The Argument(s) passed to YsGridRecordList::append() must be an instance of YsGridRecord");
    }
    
  }

}
