<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQEditor It features rich text editing, options for changing its 
 * appearance, style and many more
 *
 * @method YsJQEditor _doctype DocType of editor window (iframe)
 * @method YsJQEditor _cssClass CSS class for editor
 * @method YsJQEditor _cssfiles Array of css files which will be included in editor
 * @method YsJQEditor _height Height of editor window in pixels
 * @method YsJQEditor _resizable
 * @method YsJQEditor _lang Interface language
 * @method YsJQEditor _toolbar Toolbar to use
 * @method YsJQEditor _absoluteURLs Make image URLs absolute
 * @method YsJQEditor _allowSource Allow edit in HTML
 * @method YsJQEditor _stripWhiteSpace 
 * @method YsJQEditor _styleWithCSS If true - text will be formated using span-tag with style attribute, else - semantic tags like strong, em and other
 * @method YsJQEditor _fmAllow Allow use of file manager
 * @method YsJQEditor _fmOpen Function which will be called to open file manager. Argument callback - function which editor passes to file manager on open. File manager must call this function with using URL of selected file as argument
 * @method YsJQEditor _allowTags
 * @method YsJQEditor _denyTags
 * @method YsJQEditor _denyAttr
 * @method YsJQEditor _pasteDenyAttr
 * @method YsJQEditor _allowTextNodes
 * @method YsJQEditor _allowBrowsersSpecStyles
 * @method YsJQEditor _allowPaste
 * @method YsJQEditor _pasteOnlyText
 * @method YsJQEditor _replace
 * @method YsJQEditor _restore
 * @method YsJQEditor _pagebreak
 * @method YsJQEditor _buttons
 * @method YsJQEditor _panels
 * @method YsJQEditor _toolbars
 * @method YsJQEditor _panelNames
 * @method YsJQEditor _width Width of editor window in pixels
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQEditor extends YsJQueryPlugin {

  const VERSION = "1.3";
  const LICENSE = "BSD License || MIT and GPL licenses";

  public static $event = 'elrte';

  public function registerOptions(){
    return   array(
              //options
               '_doctype' =>  array('key' => 'doctype', 'is_quoted' => false),
               '_cssClass' =>  array('key' => 'cssClass', 'is_quoted' => false),
               '_cssfiles' =>  array('key' => 'cssfiles', 'is_quoted' => false),
               '_height' =>  array('key' => 'height', 'is_quoted' => false),
               '_resizable' =>  array('key' => 'resizable', 'is_quoted' => false),
               '_lang' =>  array('key' => 'lang', 'is_quoted' => false),
               '_toolbar' =>  array('key' => 'toolbar', 'is_quoted' => false),
               '_absoluteURLs' =>  array('key' => 'absoluteURLs', 'is_quoted' => false),
               '_allowSource' =>  array('key' => 'allowSource', 'is_quoted' => false),
               '_stripWhiteSpace' =>  array('key' => 'stripWhiteSpace', 'is_quoted' => false),
               '_styleWithCSS' =>  array('key' => 'styleWithCSS', 'is_quoted' => false),
               '_fmAllow' =>  array('key' => 'fmAllow', 'is_quoted' => false),
               '_fmOpen' =>  array('key' => 'fmOpen', 'is_quoted' => false),
               '_allowTags' =>  array('key' => 'allowTags', 'is_quoted' => false),
               '_denyTags' =>  array('key' => 'denyTags', 'is_quoted' => false),
               '_denyAttr' =>  array('key' => 'denyAttr', 'is_quoted' => false),
               '_pasteDenyAttr' =>  array('key' => 'pasteDenyAttr', 'is_quoted' => false),
               '_allowTextNodes' =>  array('key' => 'allowTextNodes', 'is_quoted' => false),
               '_allowBrowsersSpecStyles' =>  array('key' => 'allowBrowsersSpecStyles', 'is_quoted' => false),
               '_allowPaste' =>  array('key' => 'allowPaste', 'is_quoted' => false),
               '_pasteOnlyText' =>  array('key' => 'pasteOnlyText', 'is_quoted' => false),
               '_replace' =>  array('key' => 'replace', 'is_quoted' => false),
               '_restore' =>  array('key' => 'restore', 'is_quoted' => false),
               '_pagebreak' =>  array('key' => 'pagebreak', 'is_quoted' => false),
               '_buttons' =>  array('key' => 'buttons', 'is_quoted' => false),
               '_panels' =>  array('key' => 'panels', 'is_quoted' => false),
               '_toolbars' =>  array('key' => 'toolbars', 'is_quoted' => false),
               '_panelNames' =>  array('key' => 'panelNames', 'is_quoted' => false),
               '_width' =>  array('key' => 'width', 'is_quoted' => false)
              );
  } 
  
  /**
   * Retrieves a instance of this class.
   * @return YsJQEditor
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  /**
   *
   * @param type $options
   * @return YsJQEditor 
   */
  public static function build($options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }
  
  public static function elrte($options = null){
    return self::build($options);
  }
  
  public static function getValue($jQuerySelector){
    $jquery = self::callJQueryMethod(self::$event,'val');
    $jquery->in($jQuerySelector);
    return $jquery;
  }

}