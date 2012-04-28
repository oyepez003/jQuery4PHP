<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsTag todo description.
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsTag {
  private static $TAG_INITIATOR = '<';
  private static $TAG_FINALIZER = '>';
  private static $TAG_CLOSER_AT_FIRST = '</';
  private static $TAG_CLOSER_AT_END = ' />';

  private $template;

  public function getTemplate(){
    return $this->template;
  }

  public function setTemplate($template){
    $this->template = $template;
  }

  public function addToTemplate($template){
    $this->template .= $template;
  }

  public static function getTagClosed($tag , $properties = null){
    return self::buildCloseTag($tag, $properties);
  }
 
  public static function getTag($tag , $properties = null, $content = null){
    $template = $tag;
    if ($content === null){
      $template = self::buildTag($tag , $properties);
    }else{
      $template = self::buildTag($tag , $properties) . $content . self::buildCloseTag($tag);
    }
    return $template;
  }

  protected static function buildTag($tag , $properties = null){
    $pattern = ($properties === null) ? '%s' : '%s %s';
    return sprintf(self::$TAG_INITIATOR . $pattern . self::$TAG_FINALIZER, $tag, $properties);
  }

  protected static function buildCloseTag($tag , $properties = null){
    $tagClosed = $tag;
    if($properties === null){
      $tagClosed = sprintf(self::$TAG_CLOSER_AT_FIRST . '%s' . self::$TAG_FINALIZER , $tag);
    }else{
      $tagClosed = sprintf(self::$TAG_INITIATOR . '%s %s' . self::$TAG_CLOSER_AT_END, $tag , $properties);
    }
    return $tagClosed;
  }
  
  public static function initWidget($widgetId, $htmlProperties = null, $htmlTag = YsHTML::INPUT, $content = null){
    return self::getTag($htmlTag, sprintf('%s ', $htmlProperties), $content);
  }

  public static function endWidget($htmlTag = YsHTML::INPUT){
    return self::getTagClosed($htmlTag);
  }
  
  public function __toString() {
    return $this->template;
  }
}