<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQueryPlugin todo description
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQueryPlugin extends YsJQueryUtil {

  public function registerOptions(){}
  
  public static $event = 'undefined';
  
  /**
   *
   * @return YsJQueryPlugin 
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  /**
   * Render function for jLayout functionality
   * @see YsJQueryUtil::render()
   * @return parent::render()
   */
  public function render(){
    if($this->getOptions() !== null){
      if($this->getArgumentsBeforeOptions() !== null || $this->getArgumentsAfterOptions() !== null){
        $this->setArguments($this->getArgumentsBeforeOptions() .  $this->getOptionsLikeJson() . $this->getArgumentsAfterOptions());
      }else{
        $this->setArguments($this->getOptionsLikeJson());
      }
    }
    return parent::render();
  }
  
  public static function callMethod($methodName){
    $jquery = self::getInstance();
    $jquery->setEvent($methodName);
    return $jquery;
  }
  
  public static function callJQueryMethod($methodName){
    $jquery = self::getInstance();
    $args = func_get_args();
    if(sizeof($args) == 1){
      $jquery->setEvent($methodName);
    }
    if(sizeof($args) > 1){
      $jquery->setEvent($args[0]);
      for($i=1; $i < sizeof($args); $i++){
        $jquery->addArgumentsBeforeOptions($args[$i]);
      }
    }
    return $jquery;
  }
  
  public static function callJQueryMethodIn($args){
    $jquery = self::getInstance();
    $args = func_get_args();
    if(sizeof($args) == 2){
      $jquery->in($args[0]);
      $jquery->setEvent($args[1]);
    }
    if(sizeof($args) > 2){
      $jquery->in($args[0]);
      $jquery->setEvent($args[1]);
      for($i=2; $i < sizeof($args); $i++){
        $jquery->addArgumentsBeforeOptions($args[$i]);
      }
    }
    return $jquery;
  }
  
  // BASIC TEMPLATES
  /**
   * Starts the standar HTML tags for build this widget
   * @param string $id The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($id, $htmlProperties = null, $tag = YsHTML::DIV){
    return YsHTML::getTag($tag, sprintf('id="%s" %s ', $id , $htmlProperties));
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($tag = YsHTML::DIV){
    return YsHTML::getTagClosed($tag);
  }
  
  /**
   * Returns the standar HTML tags for build this widget like a "input:text"
   * @param string $datepickerId The datepicker Id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function input($widgetId, $htmlProperties = null){
    return YsHTML::getTagClosed(YsHTML::INPUT, sprintf('id="%s" %s ', $widgetId , $htmlProperties));
  }

  /**
   * Returns the standar HTML tags for build this widget inline
   * @param string $datepickerId The datepicker Id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function inline($widgetId, $htmlProperties = null){
    return sprintf('%s%s', self::initWidget($widgetId, $htmlProperties), self::endWidget());
  }
}