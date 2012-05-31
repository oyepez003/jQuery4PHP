<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQForm Allows you to easily and unobtrusively upgrade HTML forms 
 * to use AJAX
 * 
 * @method YsJQForm _target Identifies the element(s) in the page to be updated with the server response
 * @method YsJQForm _replaceTarget Optionally used along with the the target option
 * @method YsJQForm _url URL to which the form data will be submitted
 * @method YsJQForm _type The method in which the form data should be submitted, 'GET' or 'POST'
 * @method YsJQForm _data An object containing extra data that should be submitted along with the form. 
 * @method YsJQForm _dataType Expected data type of the response
 * @method YsJQForm _success Callback function to be invoked after the form has been submitted
 * @method YsJQForm _semantic Boolean flag indicating whether data must be submitted in strict semantic order (slower)
 * @method YsJQForm _resetForm Boolean flag indicating whether the form should be reset if the submit is successful
 * @method YsJQForm _clearForm Boolean flag indicating whether the form should be cleared if the submit is successful
 * @method YsJQForm _iframe Boolean flag indicating whether the form should always target the server response to an iframe
 * @method YsJQForm _iframeSrc String value that should be used for the iframe's src attribute when/if an iframe is used. 
 * @method YsJQForm _forceSync String value that should be used for the iframe's src attribute when/if an iframe is used. 
 * @method YsJQForm _beforeSerialize Callback function to be invoked before the form is serialized
 * @method YsJQForm _beforeSubmit Callback function to be invoked before the form is submitted
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQForm extends YsJQueryPlugin {

  const VERSION = "2.87";
  const LICENSE = "MIT and GPL licenses";

  public static $event = 'ajaxForm';
  public static $ajaxSubmitEvent = 'ajaxSubmit';
  public static $formSerializeEvent = 'formSerialize';
  public static $fieldSerializeEvent = 'fieldSerialize';
  public static $fieldValueEvent = 'fieldValue';
  public static $resetFormEvent = 'resetForm';
  public static $clearFormEvent = 'clearForm';
  public static $clearFieldsEvent = 'clearFields';


  public function registerOptions(){
    return   array(
              //options
               '_target' =>  array('key' => 'target', 'is_quoted' => false),
               '_replaceTarget' =>  array('key' => 'replaceTarget', 'is_quoted' => false),
               '_url' =>  array('key' => 'url', 'is_quoted' => false),
               '_type' =>  array('key' => 'type', 'is_quoted' => false),
               '_data' =>  array('key' => 'data', 'is_quoted' => false),
               '_dataType' =>  array('key' => 'dataType', 'is_quoted' => false),
               '_success' =>  array('key' => 'success', 'is_quoted' => false),
               '_semantic' =>  array('key' => 'semantic', 'is_quoted' => false),
               '_resetForm' =>  array('key' => 'resetForm', 'is_quoted' => false),
               '_clearForm' =>  array('key' => 'clearForm', 'is_quoted' => false),
               '_iframe' =>  array('key' => 'iframe', 'is_quoted' => false),
               '_iframeSrc' =>  array('key' => 'iframeSrc', 'is_quoted' => false),
               '_forceSync' =>  array('key' => 'forceSync', 'is_quoted' => false),
              // events
               '_beforeSerialize' =>  array('key' => 'beforeSerialize', 'is_quoted' => false),
               '_beforeSubmit' =>  array('key' => 'beforeSubmit', 'is_quoted' => false)
              );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQForm
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  /**
   * Build the jQueryPlugin
   * @return YsJQForm Plugin object
   */
  public static function build(){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    return $jquery;
  }
  
  public static function ajaxForm($options = null){
    $jquery = self::build();
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }
  
  /**
   *
   * @param type $options
   * @return YsJQForm 
   */
  public static function ajaxSubmit($options = null){
    $jquery = self::build();
    $jquery->setEvent(self::$ajaxSubmitEvent);
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }
  
  public static function formSerialize($jquerySelector = null){
    $jquery = self::callMethod(self::$formSerializeEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  public static function fieldSerialize($jquerySelector = null){
    $jquery = self::callMethod(self::$fieldSerializeEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  public static function fieldValue($jquerySelector = null){
    $jquery = self::callMethod(self::$fieldValueEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  public static function resetForm($jquerySelector = null){
    $jquery = self::callMethod(self::$resetFormEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  public static function clearForm($jquerySelector = null){
    $jquery = self::callMethod(self::$clearFormEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  public static function clearFields($jquerySelector = null){
    $jquery = self::callMethod(self::$clearFieldsEvent);
    if($jquerySelector !== null){
      $jquery->setSelector($jquerySelector);
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
  public static function initWidget($id, $htmlProperties = null, $tag = YsHTML::FORM){
    return YsHTML::getTag($tag, sprintf('id="%s" %s ', $id , $htmlProperties));
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($tag = YsHTML::FORM){
    return YsHTML::getTagClosed($tag);
  }

}