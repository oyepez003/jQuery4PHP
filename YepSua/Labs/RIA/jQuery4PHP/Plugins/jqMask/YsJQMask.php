<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQMask todo description.
 *
 * @method YsJQMask _attr
 * @method YsJQMask _mask
 * @method YsJQMask _type
 * @method YsJQMask _maxLength
 * @method YsJQMask _defaultValue
 * @method YsJQMask _textAlign
 * @method YsJQMask _selectCharsOnFocus
 * @method YsJQMask _setSize
 * @method YsJQMask _autoTab
 * @method YsJQMask _fixedChars
 * @method YsJQMask _onInvalid
 * @method YsJQMask _onValid
 * @method YsJQMask _onOverflow
 * 
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQMask extends YsJQueryPlugin {

  const VERSION = "1.1.3";
  const LICENSE = "MIT License";
  public static $event = 'setMask';
  public static $unsetMaskEvent = 'unsetMask';
  public static $unmaskedValEvent = 'unmaskedVal';
  public static $maskStringEvent = 'mask.string';
  public static $setMasksEvent = 'mask.masks';
  public static $setRulesEvent = 'mask.rules';


  public function registerOptions(){
      return   array(
            //options
             '_attr' =>  array('key' => 'attr', 'is_quoted' => false),
             '_mask' =>  array('key' => 'mask', 'is_quoted' => false),
             '_type' =>  array('key' => 'type', 'is_quoted' => false),
             '_maxLength' =>  array('key' => 'maxLength', 'is_quoted' => false),
             '_defaultValue' =>  array('key' => 'defaultValue', 'is_quoted' => true),
             '_textAlign' =>  array('key' => 'textAlign', 'is_quoted' => false),
             '_selectCharsOnFocus' =>  array('key' => 'selectCharsOnFocus', 'is_quoted' => false),
             '_setSize' =>  array('key' => 'setSize', 'is_quoted' => false),
             '_autoTab' =>  array('key' => 'autoTab', 'is_quoted' => false),
             '_fixedChars' =>  array('key' => 'fixedChars ', 'is_quoted' => false),
            // events
             '_onInvalid' =>  array('key' => 'onInvalid', 'is_quoted' => false),
             '_onValid' =>  array('key' => 'onValid', 'is_quoted' => false),
             '_onOverflow' =>  array('key' => 'onOverflow', 'is_quoted' => false)
            );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQMask
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }

  public static function build($options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    return $jquery;
  }

  public static function unsetMask($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$unsetMaskEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }
  
  public static function unmaskedVal($jquerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$unmaskedValEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  public static function maskString($el){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$maskStringEvent);
    $jquery->addArgumentsBeforeOptions($el);
    return $jquery;
  }

  public static function mask($mask, $options){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    return $jquery;
  }

  public static function setMasks($masks){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$setMasksEvent);
    $jquery->addArgumentsBeforeOptions($masks);
    return $jquery;
  }

  public static function setRules($rules){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$setRulesEvent);
    $jquery->addArgumentsBeforeOptions($rules);
    return $jquery;
  }
  
  /**
   * Starts the standar HTML tags for build this widget
   * @param string $id The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($id, $htmlProperties = null, $tag = YsHTML::INPUT){
    return YsHTML::getTagClosed($tag, sprintf('id="%s" %s ', $id , $htmlProperties));
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($tag = YsHTML::DIV){
    return false;
  }
}
