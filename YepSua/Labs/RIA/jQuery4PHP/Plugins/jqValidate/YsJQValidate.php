<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQValidate This jQuery plugin makes simple clientside form validation
 * trivial, while offering lots of option for customization
 *
 * @method YsJQValidate _messages
 * @method YsJQValidate _groups
 * @method YsJQValidate _rules
 * @method YsJQValidate _errorClass
 * @method YsJQValidate _validClass
 * @method YsJQValidate _errorElement
 * @method YsJQValidate _focusInvalid
 * @method YsJQValidate _errorContainer
 * @method YsJQValidate _errorLabelContainer
 * @method YsJQValidate _ignore
 * @method YsJQValidate _ignoreTitle
 * @method YsJQValidate _highlight
 * @method YsJQValidate _unhighlight
 * @method YsJQValidate _wrapper
 * @method YsJQValidate _meta
 * @method YsJQValidate _errorPlacement
 * @method YsJQValidate _submitHandler
 * @method YsJQValidate _debug
 * @method YsJQValidate _invalidHandler
 * @method YsJQValidate _focusCleanup
 * @method YsJQValidate _showErrors
 * @method YsJQValidate _success
 * @method YsJQValidate _onsubmit
 * @method YsJQValidate _onfocusin
 * @method YsJQValidate _onfocusout
 * @method YsJQValidate _onkeyup
 * @method YsJQValidate _onclick
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQValidate extends YsJQueryPlugin {

  const VERSION = "1.8.1";
  const LICENSE = "MIT and GPL licenses";

  public static $event = 'validate';
  public static $numberOfInvalidsEvent = 'validate().numberOfInvalids';
  public static $resetFormEvent = 'validate().resetForm';
  public static $validateElementEvent = 'validate().element';
  public static $rulesEvent = 'rules';
  public static $removeAttrsEvent = 'removeAttrs';
  public static $setDefaultsEvent = 'validator.setDefaults';

  public function registerOptions(){
    return   array(
              //options
               '_messages' =>  array('key' => 'messages', 'is_quoted' => false),
               '_groups' =>  array('key' => 'groups', 'is_quoted' => false),
               '_rules' =>  array('key' => 'rules', 'is_quoted' => false),
               '_errorClass' =>  array('key' => 'errorClass', 'is_quoted' => false),
               '_validClass' =>  array('key' => 'validClass', 'is_quoted' => false),
               '_errorElement' =>  array('key' => 'errorElement', 'is_quoted' => false),
               '_focusInvalid' =>  array('key' => 'focusInvalid', 'is_quoted' => false),
               '_errorContainer' =>  array('key' => 'errorContainer', 'is_quoted' => false),
               '_errorLabelContainer' =>  array('key' => 'errorLabelContainer', 'is_quoted' => false),
               '_ignore' =>  array('key' => 'ignore', 'is_quoted' => false),
               '_ignoreTitle' =>  array('key' => 'ignoreTitle', 'is_quoted' => false),
               '_highlight' =>  array('key' => 'highlight', 'is_quoted' => false),
               '_unhighlight' =>  array('key' => 'unhighlight', 'is_quoted' => false),
               '_wrapper' =>  array('key' => 'wrapper', 'is_quoted' => false),
               '_meta' =>  array('key' => 'meta', 'is_quoted' => false),
               '_errorPlacement' =>  array('key' => 'errorPlacement', 'is_quoted' => false),
               '_submitHandler' =>  array('key' => 'submitHandler', 'is_quoted' => false),
               '_debug' =>  array('key' => 'debug', 'is_quoted' => false),
               '_invalidHandler' =>  array('key' => 'invalidHandler', 'is_quoted' => false),
               '_focusCleanup' =>  array('key' => 'focusCleanup', 'is_quoted' => false),
               '_showErrors' =>  array('key' => 'showErrors', 'is_quoted' => false),
               '_success' =>  array('key' => 'success', 'is_quoted' => false),
              // events
               '_onsubmit' =>  array('key' => 'onsubmit', 'is_quoted' => false),
               '_onfocusin' =>  array('key' => 'onfocusin', 'is_quoted' => false),
               '_onfocusout' =>  array('key' => 'onfocusout', 'is_quoted' => false),
               '_onkeyup' =>  array('key' => 'onkeyup', 'is_quoted' => false),
               '_onclick' =>  array('key' => 'onclick', 'is_quoted' => false)
              );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQValidate
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
        $jquery->setOptions($options);
    }
    return $jquery;
  }

  public static function validate($jQuerySelector = null, $options = null){
    $jquery = self::build($options);
    if($jQuerySelector !== null){
      $jquery->setSelector($jQuerySelector);
    }
    return $jquery;
  }

  public static function numberOfInvalids($jquerySelector){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$numberOfInvalidsEvent);
    if($jquerySelector !== null){
        $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }

  public static function resetForm($jquerySelector){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$resetFormEvent);
    if($jquerySelector !== null){
        $jquery->setSelector($jquerySelector);
    }
    return $jquery;
  }
  
  public static function validateElement($formJQuerySelector, $elementJQuerySelector){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$validateElementEvent);
    $jquery->addArgumentsBeforeOptions($elementJQuerySelector);
    $jquery->setSelector($formJQuerySelector);
    return $jquery;
  }

  public static function addRules($jQuerySelector, $rulesArray){
    return self::commonRulesMethod('add', $jQuerySelector, $rulesArray);
  }

  public static function removeRules($jQuerySelector, $rules = null){
    return self::commonRulesMethod('remove', $jQuerySelector, $rules);
  }

  private static function commonRulesMethod($action,$jQuerySelector, $rulesArgument){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$rulesEvent);
    $jquery->addArgumentsBeforeOptions($action);
    if($rulesArgument !== null){
      $jquery->addArgumentsBeforeOptions($rulesArgument);
    }
    $jquery->setSelector($jQuerySelector);
    return $jquery;
  }

  public static function removeAttrs($formJQuerySelector, $attributes = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$removeAttrsEvent);
    if($attributes !== null){
      $jquery->addArgumentsBeforeOptions($attributes);
    }
    $jquery->setSelector($formJQuerySelector);
    return $jquery;
  }

  public static function setDefaults($options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$setDefaultsEvent);
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }

  public function setUITheme($styleClassName = "ui-state-highlight"){
    $this->_highlight(new YsJsFunction(
            YsJQuery::addClass($styleClassName)->inVar('input'), 'input')
    );
    $this->_unhighlight(new YsJsFunction(
            YsJQuery::removeClass($styleClassName)->inVar('input'), 'input')
    );
    return $this;
  }

}