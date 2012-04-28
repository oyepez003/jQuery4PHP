<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsBlockUI Lets you simulate synchronous behavior when using AJAX, 
 * without locking the browser. When activated, it will prevent user activity 
 * with the page (or part of the page) until it is deactivated. BlockUI adds 
 * elements to the DOM to give it both the appearance and behavior of blocking 
 * user interaction.
 *
 * @method YsBlockUI _message Message displayed when blocking (use null for no message) 
 * @method YsBlockUI _css Styles for the message when blocking
 * @method YsBlockUI _overlayCSS Styles for the overlay 
 * @method YsBlockUI _growlCSS Styles applied when using ::growlUI
 * @method YsBlockUI _iframeSrc IE issues: 'about:blank' fails on HTTPS and javascript:false is s-l-o-w   
 * @method YsBlockUI _forceIframe Force usage of iframe in non-IE browsers (handy for blocking applets) 
 * @method YsBlockUI _baseZ z-index for the blocking overlay 
 * @method YsBlockUI _centerX Set these to true to have the message automatically centered 
 * @method YsBlockUI _centerY Set these to true to have the message automatically centered 
 * @method YsBlockUI _allowBodyStretch Enable if you want key and mouse events to be disabled for content that is blocked, disable if you wish to prevent changes to the body height 
 * @method YsBlockUI _bindEvents Enable if you want key and mouse events to be disabled for content that is blocked 
 * @method YsBlockUI _constrainTabKey Be default blockUI will supress tab navigation from leaving blocking content 
 * @method YsBlockUI _fadeIn FadeIn time in millis; set to 0 to disable fadeIn on block 
 * @method YsBlockUI _fadeOut FadeOut time in millis; set to 0 to disable fadeOut on unblock 
 * @method YsBlockUI _timeout Time in millis to wait before auto-unblocking; Set to 0 to disable auto-unblock 
 * @method YsBlockUI _showOverlay Disable if you don't want to show the overlay 
 * @method YsBlockUI _focusInput If true, focus will be placed in the first available input field when page blocking 
 * @method YsBlockUI _applyPlatformOpacityRules Suppresses the use of overlay styles on FF/Linux (due to performance issues with opacity) 
 * @method YsBlockUI _quirksmodeOffsetHack Don't ask; if you really must know: http://groups.google.com/group/jquery-en/browse_thread/thread/36640a8730503595/2f6a79a77a78e493#2f6a79a77a78e493
 * @method YsBlockUI _theme Set to true to use with jQuery UI themes
 * @method YsBlockUI _title Only used when theme == true
 * @method YsBlockUI _onUnblock Callback method invoked when unblocking has completed
 * @method YsBlockUI _onBlock Callback method invoked when blocking has completed
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsBlockUI extends YsJQueryPlugin {

  const VERSION = "2.39";
  const LICENSE = "MIT and GPL licenses";

  public static $event = 'blockUI';
  public static $blockEvent = 'block';
  public static $unblockUIEvent = 'unblockUI';
  public static $unblockEvent = 'unblock';
  public static $growlUIEvent = 'growlUI';
  public static $defaultsEvent = '.defaults';

  public function registerOptions(){
    return   array(
              //options
               '_message' =>  array('key' => 'message', 'is_quoted' => false),
               '_css' =>  array('key' => 'css', 'is_quoted' => false),
               '_overlayCSS' =>  array('key' => 'overlayCSS', 'is_quoted' => false),
               '_growlCSS' =>  array('key' => 'growlCSS', 'is_quoted' => false),
               '_iframeSrc' =>  array('key' => 'iframeSrc', 'is_quoted' => false),
               '_forceIframe' =>  array('key' => 'forceIframe', 'is_quoted' => false),
               '_baseZ' =>  array('key' => 'baseZ', 'is_quoted' => false),
               '_centerX' =>  array('key' => 'centerX', 'is_quoted' => false),
               '_centerY' =>  array('key' => 'centerY', 'is_quoted' => false),
               '_allowBodyStretch' =>  array('key' => 'allowBodyStretch', 'is_quoted' => false),
               '_bindEvents' =>  array('key' => 'bindEvents', 'is_quoted' => false),
               '_constrainTabKey' =>  array('key' => 'constrainTabKey', 'is_quoted' => false),
               '_fadeIn' =>  array('key' => 'fadeIn', 'is_quoted' => false),
               '_fadeOut' =>  array('key' => 'fadeOut', 'is_quoted' => false),
               '_timeout' =>  array('key' => 'timeout', 'is_quoted' => false),
               '_showOverlay' =>  array('key' => 'showOverlay', 'is_quoted' => false),
               '_focusInput' =>  array('key' => 'focusInput', 'is_quoted' => false),
               '_applyPlatformOpacityRules' =>  array('key' => 'applyPlatformOpacityRules', 'is_quoted' => false),
               '_quirksmodeOffsetHack' =>  array('key' => 'quirksmodeOffsetHack', 'is_quoted' => false),
               '_theme' =>  array('key' => 'theme', 'is_quoted' => false),
               '_title' =>  array('key' => 'title', 'is_quoted' => false),
              // events
               '_onUnblock' =>  array('key' => 'onUnblock', 'is_quoted' => false),
               '_onBlock' =>  array('key' => 'onBlock', 'is_quoted' => false),
              );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsBlockUI
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  /**
   *
   * @param type $jQuerySelector
   * @param type $options
   * @return YsBlockUI 
   */
  public static function build($jQuerySelector = null,$options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($jQuerySelector !== null){
        $jquery->setEvent(self::$blockEvent);
        $jquery->setSelector($jQuerySelector);
    }
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }

  /**
   *
   * @param type $options
   * @return YsBlockUI 
   */
  public static function block($options = null){
    return self::build(null, $options);
  }
  
  /**
   *
   * @param type $jQuerySelector
   * @param type $options
   * @return YsBlockUI
   */
  public static function blockElement($jQuerySelector, $options = null){
    return self::build($jQuerySelector, $options);
  }

  /**
   *
   * @param type $title
   * @param type $message
   * @return YsBlockUI 
   */
  public static function growlUI($title, $message){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$growlUIEvent);
    $jquery->addArgumentsBeforeOptions($title);
    $jquery->addArgumentsBeforeOptions($message);
    return $jquery;
  }
  
  /**
   *
   * @param type $jQuerySelector
   * @param type $options
   * @return YsBlockUI
   */
  public static function unblock($jQuerySelector = null, $options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$unblockUIEvent);
    if($jQuerySelector !== null){
        $jquery->setEvent(self::$unblockEvent);
        $jquery->setSelector($jQuerySelector);
    }
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }

  /**
   * @param type $options
   * @return YsJQueryDynamic 
   */
  public static function defaults($options = null){
    $sintaxArray = array();
    $jqueryDynamic = new YsJQueryDynamic();
    if($options !== null){
      if(is_array($options)){
        $i = 0;
        foreach ($options as $key => $value){
          $jquery = self::getInstance();
          $jquery->setIsOnlyAccesors(true);
          $jquery->setEvent(self::$event . self::$defaultsEvent);
          $jquery->addAccesorsWithPattern($key, new YsArgument($value), '.%s = %s');
          $sintaxArray[$i++] = $jquery;
        }
        $jqueryDynamic->build($sintaxArray);
      }
    }
    return $jqueryDynamic;
  }

}