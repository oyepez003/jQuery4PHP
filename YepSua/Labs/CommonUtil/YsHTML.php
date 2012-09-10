<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsHTML todo description.
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsHTML extends YsTag{

  const NBSP = '&nbsp';

  const A = 'a';
  const P = 'p';
  const DIV = 'div';
  const FORM = 'form';
  const SPAN = 'span';
  const SELECT = 'select';
  const H1 = 'h1';
  const H2 = 'h2';
  const H3 = 'h3';
  const H4 = 'h4';
  const H5 = 'h5';
  const H6 = 'h6';
  const LABEL = 'label';
  const INPUT = 'input';
  const BUTTON = 'button';
  const UL = 'ul';
  const LI = 'li';
  const INPUT_CHECKBOX = 'input type="checkbox"';
  const INPUT_RADIO = 'input type="radio"';
  const TABLE = 'table';
  const TR = 'tr';
  const TH = 'th';
  const TD = 'td';
  const TBODY = 'tbody';
  const TFOOTER = 'tfooter';
  const VIDEO = 'video';
  
  public static function appendInPropeties($propertie,$appendValues,$propeties){
    $propertie = sprintf('%s="',$propertie);
    $classes = sprintf('%s%s ',$propertie,$appendValues);
    if(strstr($propeties, $propertie)){
      $propeties = str_replace($propertie, $classes, $propeties);
    }else{
      $propeties = sprintf('%s %s%s"',$propeties,$propertie,$appendValues);
    }
    return $propeties;
  }
  
}
