<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
* Autoloader and dependency injection initialization for jQuery4PHP.
* Based on swift_required.php by swiftmailer project
*/

if (defined('JQ4PHP_REQUIRED_LOADED'))
  return;

define('JQ4PHP_REQUIRED_LOADED', true);

require dirname(__FILE__) . '/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();