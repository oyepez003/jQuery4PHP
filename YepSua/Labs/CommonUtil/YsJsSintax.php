<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJsSintax
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJsSintax {

  const BOOLEAN_NOT = '!';
  const SEPARATOR = ';';
  const ARGUMENT_SEPARATOR = ',';

  public static function parseInt($value){
    return self::parse('parseInt', $value);
  }

  public static function parse($parseName, $value){
    $pattern = $parseName . '(%s)';
    return YsArgument::likeVar(sprintf($pattern, YsJSON::valueToJS($value)));
  }
  
  public static function setInterval($function, $time, $intervalVarName = null){
    $pattern = $intervalVarName === null
           ? "setInterval('%s',%s)"
           : $intervalVarName . " = setInterval('%s',%s)";
    return sprintf('setInterval(%s, %s);',$function,$time);
  }

  public static function setTimeout($function, $time){
    return sprintf('setTimeout(%s, %s);',$function,$time);
  }

  public static function redirect($href){
    return sprintf('window.location = "%s"',$href);
  }

  public static function cleanSintax($sintax){
    $errorSintax = array(".()",";;",",}",",]","{;",",,");
    $realSintax = array("",";","}","]","{", ",");
    $sintax = str_replace($errorSintax, $realSintax, $sintax);
    $errorSintax = array("[\n|\r|\n\r]");
    $realSintax = array(' ');
    $sintax = preg_replace($errorSintax, $realSintax, $sintax);
    return $sintax;
  }

  public static function parseValue($value){
    return YsJSON::valueToJS($value);
  }

  public static function callFunction($functionName){
    return new YsArgument($functionName, false);
  }

}