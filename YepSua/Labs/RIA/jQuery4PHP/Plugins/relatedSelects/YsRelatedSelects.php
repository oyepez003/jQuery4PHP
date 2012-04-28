<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsRelatedSelects todo description
 *
 * @method YsRelatedSelects _selects
 * @method YsRelatedSelects _dataType
 * @method YsRelatedSelects _onChangeLoad
 * @method YsRelatedSelects _loadingMessage
 * @method YsRelatedSelects _defaultOptionText
 * @method YsRelatedSelects _disableIfEmpty
 * @method YsRelatedSelects _onLoadingStart
 * @method YsRelatedSelects _onLoadingEnd
 * @method YsRelatedSelects _onChange
 * @method YsRelatedSelects _onEmptyResult
 * @method YsRelatedSelects _dataType
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsRelatedSelects extends YsJQueryPlugin {

  const VERSION = "1.0";
  const LICENSE = "MIT and GPL licenses";
  
  public static $event = 'relatedSelects';

  public function registerOptions(){
    return   array(
              //options
               '_selects' =>  array('key' => 'selects', 'is_quoted' => false)
              ,'_dataType' =>  array('key' => 'dataType', 'is_quoted' => false)
              ,'_onChangeLoad' =>  array('key' => 'onChangeLoad', 'is_quoted' => false)
              ,'_loadingMessage' =>  array('key' => 'loadingMessage', 'is_quoted' => false)
              ,'_defaultOptionText' =>  array('key' => 'defaultOptionText', 'is_quoted' => false)
              ,'_disableIfEmpty' =>  array('key' => 'disableIfEmpty', 'is_quoted' => false)
              ,'_onLoadingStart' =>  array('key' => 'onLoadingStart', 'is_quoted' => false)
              ,'_onLoadingEnd' =>  array('key' => 'onLoadingEnd', 'is_quoted' => false)
              ,'_onChange' =>  array('key' => 'onChange', 'is_quoted' => false)
              ,'_onEmptyResult' =>  array('key' => 'onEmptyResult', 'is_quoted' => false)
              ,'_dataType' =>  array('key' => 'dataType', 'is_quoted' => false)
              );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsRelatedSelects
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
    if($options !== null){
      if(!is_array($options)){
        $options = array(self::TEXT => $options);
      }
      $jquery->setOptions($options);
    }
    return $jquery;
  }

  public static function relate($options = null){
    return self::build($options);
  }

}