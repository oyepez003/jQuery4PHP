<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsXML todo description.
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsXML extends YsTag{
  public static $DEFAULT_ENCODING = 'utf-8';
  public static $DEFAULT_XML_VERSION = '1.0';

  const CDATA_TEMPLATE = '<![CDATA[%s]]>';
  const HEADER_TEMPLATE = "<?xml version='1.0' encoding='utf-8'?>";

  protected static function buildTag($tag , $xmlProperties = null){
    $pattern = ($xmlProperties === null) ? '%s' : '%s %s';
    return sprintf(self::$TAG_INITIATOR . $pattern . self::$TAG_FINALIZER, $tag, $xmlProperties);
  }

  public static function cDATA($value){
    return html_entity_decode(sprintf(self::CDATA_TEMPLATE,$value));
  }

  public static function getHeaderDocument($xmlVersion = null, $encoding = null){
    $header = '';
    $xmlVersion = ($xmlVersion === null) ? self::$DEFAULT_XML_VERSION : $xmlVersion;
    $encoding = ($encoding === null) ? self::$DEFAULT_ENCODING : $encoding;
    $header = html_entity_decode(sprintf(self::HEADER_TEMPLATE,$xmlVersion, $encoding));
    return $header;
  }
}