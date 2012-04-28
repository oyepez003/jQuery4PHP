<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQPlot todo description.
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQPlot extends YsJQueryPlugin {

  const VERSION = "0.9.7r635";
  const LICENSE = "MIT and GPL licenses";
  public static $event = 'jqplot';
  public static $CONFIG_EVENT = 'config';
  public static $CURSOR_ZOOMPROXY = 'Cursor.zoomProxy';
  public static $REPLOT_EVENT = 'replot';
  public static $CATCH_ERROR_CONFIG = 'catchErrors';
  public static $ERROR_BACKGROUND_CONFIG = 'errorBackground';
  public static $ERROR_BORDER_CONFIG = 'errorBorder';
  public static $ERROR_FONT_FAMILY_CONFIG = 'errorFontFamily';
  public static $ERROR_FONT_SIZE_CONFIG = 'errorFontSize';
  public static $ERROR_MESSAGE_CONFIG = 'errorMessage';

  public static $ENABLE_PLUGINS_EVENT = 'enablePlugins';


  public function registerOptions(){
    return   array();
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQPlot
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }

  public static function build($plotId = null, $series = null, $options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    $jquery->plotId($plotId);
    $jquery->plotSeries($series);
    $jquery->setOptions($options);
    return $jquery;
  }

  public function plotId($plotId, $varName = null){
    if($plotId !== null){
    $this->addArgumentsBeforeOptions($plotId);
    }
    $this->assignToVarName(( $varName === null) ? $plotId : $varName, false);
    //$this->setPreSintax(sprintf('%s =',($varName !== null) ? $varName : $plotId));
    return $this;
  }

  public function plotSeries($series){
    if($series !== null){
      $this->addArgumentsBeforeOptions($series);
    }
    return $this;
  }

  public function plotOptions($options){
    if($options !== null){
      $this->setOptions($options);
    }
    return $this;
  }

  public static function replot($varName, $options = null){
    if($options !== null){
      $options = YsJSON::arrayToJson($options);
    }
    return sprintf('%s.%s(%s)', $varName , self::$REPLOT_EVENT, $options);
  } 
}
