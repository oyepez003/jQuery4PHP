<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJSON todo description.
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJSON{

  public static function optionsToJson($key, $value, $isFunction = false){
    $pattern = null;
    if(is_array($value)){
      $key = ($key === null) ? $key : sprintf('"%s"',$key);
      $pattern = ($key === null) ? " %s," : $key . ": %s,";
      $ysJson = new YsJSON();
      $array = $ysJson->isSimpleArray($value);
      if($array){
        $value = $array;
      }else{
        $arrayFunctionPattern = '{';
        foreach($value as $arrayKey => $arrayValue){
          $arrayFunctionPattern .= self::valueToJSON($arrayKey,$arrayValue);
        }
        $arrayFunctionPattern = ($arrayFunctionPattern != '{') ? substr($arrayFunctionPattern,0,strlen($arrayFunctionPattern)-1) : $arrayFunctionPattern ;
        $arrayFunctionPattern .= '}';
        $value = $arrayFunctionPattern;
      }
      $pattern = sprintf($pattern, $value);
    }else{
      $pattern = self::valueToJSON($key, $value, $isFunction);
    }
    return $pattern;
  }

  public static function valueToJSON($key, $value, $isQuoted = false){
    $key = ($key === null) ? $key : sprintf('"%s"',$key);
    $value = ($value instanceof ArrayObject) ? $value->getArrayCopy() : $value;
    $pattern = ($key === null) ? ' "%s",' :$key . ': "%s",';
    if(!is_null($value)){
      if(is_numeric($value)){
        $pattern = ($key === null) ? " %s," :$key . ": %s,";
        $pattern = sprintf($pattern, $value);
        return $pattern;
      }
      if(is_string($value)){
        if($isQuoted == true){
          $pattern = ($key === null) ? ' "%s",' :$key . ': "%s",';
        }
        /*if($value instanceof YsJsFunction){
          $pattern = ($key === null) ? " %s," :$key . ": %s,";
        }*/
        //$pattern = sprintf($pattern, $value);
        $pattern = sprintf($pattern, str_replace('"','\"',$value));
        return $pattern;
      }
      if(is_bool($value)){
        $pattern = ($key === null) ? " %s," :$key . ": %s,";
        $pattern = sprintf($pattern,YsUtil::booleanForJavascript($value));
        return $pattern;
      }
      if(is_object($value) || $isQuoted){
        $pattern = ($key === null) ? " %s," :$key . ": %s,";
        if($value instanceof YsJQuery){
          $pattern = sprintf($pattern,$value->getJQueryObject());
        }elseif($value instanceof YsArgument && $value->getValue() === null){
          $pattern = sprintf($pattern,'null');
        }else{
          $pattern = sprintf($pattern,$value);
        }
        return $pattern;
      }
      if(is_array($value) || $isQuoted){
        $pattern = ($key === null) ? " %s," :$key . ": %s,";
        $pattern = sprintf($pattern,YsJSON::arrayToJson($value));
        return $pattern;
      }
    }else{
      $pattern = ($key === null) ? " null," :$key . ": null,";
      return $pattern;
    }
    //$pattern = sprintf($pattern,$value);
    //return $pattern;
  }

  public static function valueToJS($value, $isQuoted = false){
    $pattern = self::valueToJSON(null, $value, $isQuoted);
    return substr($pattern, 0, strlen($pattern) - 1);
  }

  public static function valuesToJS($values){
    $jsValues = '';
    foreach($values as $value){
      $args = self::valueToJSON(null, $value, false);
      substr($args, 0, strlen($args) - 1);
      $jsValues .= $args;
    }
    return substr($jsValues, 0, strlen($jsValues) - 1);
  }
  
  protected function isSimpleArray($array){
    $response = true;
    $array = ($array instanceof ArrayObject) ? $array->getArrayCopy() : $array;
    if(count($array) > 0){
      $keys = array_keys($array);
      $response = false;
      $is_simple = false;
      $i=0;
      foreach($keys as $key){
        if($key === $i){
          $is_simple = true;
        }else{
          $is_simple = false;
          break;
        }
        $i++;
      }
      $j = 0;
      $sintax = "";
      foreach($array as $key => $value){
        $key = ($is_simple) ? null : $key;
        if($value instanceof YsJQuery){
          $sintax .= self::optionsToJson($key, $value->getJQueryObject());
        }else{
          $sintax .= self::optionsToJson($key, $value);
        }
      }
      $sintax = sprintf("[%s]", $sintax);
      //$response = ($is_simple) ? json_encode($array)  : false;
      $response = ($is_simple) ? $sintax  : false;
    }
    return $response;
  }

  public static function arrayToJson($array){
    $sintax = "";
    $ysJson = new YsJSON();
    $sintax = $ysJson->isSimpleArray($array);
    if(!$sintax){
      if(is_array($array)){
        if(count($array) > 0){
          $keys = array_keys($array);
          $sintax = "";
          foreach($array as $key => $value){
            if(substr($key, 0, 1) === '_'){
              $key = isset($value['key']) ? $value['key'] : $key;
              $value = isset($value['value']) ? $value['value'] : $value;
            }
            if($value instanceof YsJQuery){
              $sintax .= self::optionsToJson($key, $value->getJQueryObject());
            }else{
              $sintax .= self::optionsToJson($key, $value);
            }
          }
          $sintax = sprintf("{%s}", $sintax);
        }else{
          json_encode($array);
        }
      }else{
        $sintax = $array;
      }
    }
    //return $sintax;
    return (is_array($array) && sizeof($array) == 0 )? "{}" : YsJsSintax::cleanSintax($sintax);
  }

  public function  __toString() {
    return json_encode($this->getOptions());
  }

}