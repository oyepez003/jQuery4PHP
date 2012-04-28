<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQTree Cross browser tree component.
 *
 * @method YsJQTree _core
 * @method YsJQTree _html_data
 * @method YsJQTree _json_data
 * @method YsJQTree _xml_data
 * @method YsJQTree _htmlData
 * @method YsJQTree _jsonData
 * @method YsJQTree _xmlData
 * @method YsJQTree _themes
 * @method YsJQTree _UI
 * @method YsJQTree _CRRM
 * @method YsJQTree _hotkeys
 * @method YsJQTree _languages
 * @method YsJQTree _cookies
 * @method YsJQTree _dnd
 * @method YsJQTree _dragAndDrop
 * @method YsJQTree _checkbox
 * @method YsJQTree _search
 * @method YsJQTree _contextmenu
 * @method YsJQTree _themeroller
 * @method YsJQTree _unique
 * @method YsJQTree _plugins
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQTree extends YsJQueryPlugin {

  const VERSION = "PRE 1.0 FIXED";
  const LICENSE = "MIT and GPL licenses";

  public static $event = 'jstree';

  public function registerOptions(){
    return   array(
              //options
               '_core' =>  array('key' => 'core', 'is_quoted' => false),
               '_html_data' =>  array('key' => 'html_data', 'is_quoted' => false),
               '_json_data' =>  array('key' => 'json_data', 'is_quoted' => false),
               '_xml_data' =>  array('key' => 'xml_data', 'is_quoted' => false),
               '_htmlData' =>  array('key' => 'html_data', 'is_quoted' => false),
               '_jsonData' =>  array('key' => 'json_data', 'is_quoted' => false),
               '_xmlData' =>  array('key' => 'xml_data', 'is_quoted' => false),
               '_themes' =>  array('key' => 'themes', 'is_quoted' => false),
               '_UI' =>  array('key' => 'UI', 'is_quoted' => false),
               '_CRRM' =>  array('key' => 'CRRM', 'is_quoted' => false),
               '_hotkeys' =>  array('key' => 'hotkeys', 'is_quoted' => false),
               '_languages' =>  array('key' => 'languages', 'is_quoted' => false),
               '_cookies' =>  array('key' => 'cookies', 'is_quoted' => false),
               '_dnd' =>  array('key' => 'dnd', 'is_quoted' => false),
               '_dragAndDrop' =>  array('key' => 'dnd', 'is_quoted' => false),
               '_checkbox' =>  array('key' => 'checkbox', 'is_quoted' => false),
               '_search' =>  array('key' => 'search', 'is_quoted' => false),
               '_contextmenu' =>  array('key' => 'contextmenu', 'is_quoted' => false),
               '_themeroller' =>  array('key' => 'themeroller', 'is_quoted' => false),
               '_unique' =>  array('key' => 'unique', 'is_quoted' => false),
               '_plugins' =>  array('key' => 'plugins', 'is_quoted' => false)
              );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQTree
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
  
}