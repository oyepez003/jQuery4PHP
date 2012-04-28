<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQueryAutoloader based on Symfony AutoLoaders.
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class YsJQueryAutoloader {

  static protected $registered = false, $instance = null;

  /**
   * Registers YsJQueryAutoloader as an SPL autoloader.
   */
  static public function register() {
    include_once dirname(__FILE__) . '/../../CommonUtil/YsUtilAutoloader.php';
    YsUtilAutoloader::register();
    ini_set('unserialize_callback_func', 'spl_autoload_call');
    spl_autoload_register(array(self::getInstance(), 'autoload'));
    self::$registered = true;
  }

  static function unregister() {
    try {
      YsUtilAutoloader::unregister();
      spl_autoload_unregister(array(self::getInstance(), 'autoload'));
      self::$registered = false;
    } catch (Exception $e) {
      spl_autoload_unregister(array(self::getInstance(), 'autoload'));
      self::$registered = false;
    }
  }

  static function isRegistered() {
    return self::$registered;
  }

  /**
   * Retrieves the singleton instance of this class.
   *
   * @return sfCoreAutoload A sfCoreAutoload implementation instance.
   */
  static public function getInstance() {
    if (!isset(self::$instance)) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  /**
   * Handles autoloading of classes.
   *
   * @param  string  $class  A class name.
   *
   * @return boolean Returns true if the class has been loaded
   */
  public function autoload($class) {
    $dirName = dirname(__FILE__);
    if (file_exists($dirName . '/' . $class . '.php')) {
      require $dirName . '/' . $class . '.php';
      return true;
    }
    if (file_exists($dirName . '/Plugins/' . $class . '.php')) {
      require $dirName . '/Plugins/' . $class . '.php';
      return true;
    }
    if (file_exists($dirName . '/UI/' . $class . '.php')) {
      require $dirName . '/UI/' . $class . '.php';
      return true;
    }
  }

}