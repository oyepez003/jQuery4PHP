<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQFileManager File manager for web similar to that you use on your 
 * computer
 *
 * @method YsJQFileManager _url Connector URL. The only required option
 * @method YsJQFileManager _lang Interface language
 * @method YsJQFileManager _cssClass Additional CSS class for container
 * @method YsJQFileManager _wrap Additional CSS class for container
 * @method YsJQFileManager _places Folder name for "favorites". Can be localized. By default - Places. You can set this to empty string "" to disable "favorites"
 * @method YsJQFileManager _placesFirst Place "favorites" before file tree in navigation panel. By default - true
 * @method YsJQFileManager _editorCallback Callback function for WYSIWYG editor (CKEditor, TinyMCE, elRTE etc...). This function will get argument (String) - URL of selected file
 * @method YsJQFileManager _cutURL Cut string from the URL when calling editorCallback, to cut base url use special value root
 * @method YsJQFileManager _closeOnEditorCallback Close elFinder after calling editorCallback? By default - true. (useless for CKEditor, TinyMCE)
 * @method YsJQFileManager _i18n Internationalization
 * @method YsJQFileManager _view Default directory view. Possible values: icons, list. By default - icons
 * @method YsJQFileManager _width Width of file manager.
 * @method YsJQFileManager _height Height of file manager
 * @method YsJQFileManager _disableShortcuts Disable shortcut keys
 * @method YsJQFileManager _rememberLastDir Open last visited directory after page reload or after browser restart
 * @method YsJQFileManager _cookie Set cookie (stores current view, last visited directory, "favorites")
 * @method YsJQFileManager _toolbar Groups of icons in toolbar
 * @method YsJQFileManager _contextmenu Contents of context menu
 * @method YsJQFileManager _dialog jQueryUI dialog options with which elFinder will be opened
 * @method YsJQFileManager _docked Allow "undock" feature 
 * @method YsJQFileManager _autoReload Amount of munites after which to update current directory contents
 * @method YsJQFileManager _selectMultiple Allow multiple selection
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQFileManager extends YsJQueryPlugin {

  const VERSION = "1.2";
  const LICENSE = "BSD License || MIT and GPL licenses";

  public static $event = 'elfinder';

  public function registerOptions(){
    return   array(
              //options
               '_url' =>  array('key' => 'url', 'is_quoted' => false),
               '_lang' =>  array('key' => 'lang', 'is_quoted' => false),
               '_cssClass' =>  array('key' => 'cssClass', 'is_quoted' => false),
               '_wrap' =>  array('key' => 'wrap', 'is_quoted' => false),
               '_places' =>  array('key' => 'places', 'is_quoted' => false),
               '_placesFirst' =>  array('key' => 'placesFirst', 'is_quoted' => false),
               '_editorCallback' =>  array('key' => 'editorCallback', 'is_quoted' => false),
               '_cutURL' =>  array('key' => 'cutURL', 'is_quoted' => false),
               '_closeOnEditorCallback' =>  array('key' => 'closeOnEditorCallback', 'is_quoted' => false),
               '_i18n' =>  array('key' => 'i18n', 'is_quoted' => false),
               '_view' =>  array('key' => 'view', 'is_quoted' => false),
               '_width' =>  array('key' => 'width', 'is_quoted' => false),
               '_height' =>  array('key' => 'height', 'is_quoted' => false),
               '_disableShortcuts' =>  array('key' => 'disableShortcuts', 'is_quoted' => false),
               '_rememberLastDir' =>  array('key' => 'rememberLastDir', 'is_quoted' => false),
               '_cookie' =>  array('key' => 'cookie', 'is_quoted' => false),
               '_toolbar' =>  array('key' => 'toolbar', 'is_quoted' => false),
               '_contextmenu' =>  array('key' => 'contextmenu', 'is_quoted' => false),
               '_dialog' =>  array('key' => 'dialog', 'is_quoted' => false),
               '_docked' =>  array('key' => 'docked', 'is_quoted' => false),
               '_autoReload' =>  array('key' => 'autoReload', 'is_quoted' => false),
               '_selectMultiple' =>  array('key' => 'selectMultiple', 'is_quoted' => false),
              );
  }
 
  /**
   * Retrieves a instance of this class.
   * @return YsJQFileManager
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
   * @return YsJQFileManager 
   */
  public static function build($options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }
  
  public static function elfinder($options = null){
    return self::build();
  }
  
  public static function renderTemplate($htmlProperties = null){
    $template = new YsHTML();
    $template->addToTemplate(YsHTML::getTag(YsHTML::DIV, $htmlProperties));
    $template->addToTemplate(YsHTML::getTagClosed(YsHTML::DIV));
    return $template;
  }

}