<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsAssets todo description.
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsAssets {
    private $assets;
    private $packages;

    public function  __construct() {
        $this->assets = array();
        $this->packages = array();
    }

    public function getAssets() {
        return $this->assets;
    }

    public function setAssets($assets) {
        $this->assets = $assets;
    }

    public function getPackages() {
        return $this->packages;
    }

    public function setPackages($packages) {
        $this->packages = $packages;
    }

    public function addAssets($key, SimpleXMLElement $asset) {
        $this->assets[$key] = $asset;
    }

    public function addPackage($key, SimpleXMLElement $package) {
        $this->packages[$key] = $package;
    }

}

/**
 * YsConfigAssets todo description.
 *
 * Easily maintain javascripts and stylesheets files and dependencies in one
 * dedicated place.
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 * @see        assets-config.xml
 */
abstract class YsConfigAssets {

    const ASSETS_CONFIG_FILE = '/assets-default-config.xml';

    private static $assets;
    private static $forceRead = true;

    public static function includeAssets($packageName, $file = null) {
        self::setForceRead(true);
        $file = ($file !== null) ? $file : dirname(__FILE__) . self::ASSETS_CONFIG_FILE;
        $config = null;
        self::readConfigurationFile($packageName,$file);
        foreach(self::$assets->getAssets() as $key => $asset){
            if(in_array($key, self::$assets->getPackages())){
             foreach($asset->children() as $child){
                $config .= str_replace("/>", sprintf("></%s>",$child->getName()), $child->saveXML());
                }    
            }
        }
        return $config;
    }

    private static function readConfigurationFile($packageName, $file = null) {
        if (self::getForceRead()) {
            $assets = new YsAssets();
            self::setForceRead(false);
            $xml = simplexml_load_file($file);
            foreach ($xml->children() as $child) {
                if($child->getName() === 'assets'){
                    foreach($child as $asset){
                        $attributes = $asset->attributes();
                        if(isset($attributes['id'])){
                            $assets->addAssets( (string) $attributes['id'], $asset);
                        }
                    }
                }
                if($child->getName() === 'packages'){
                    foreach($child as $packages){
                        $attributes = $packages->attributes();
                        if(isset($attributes['name']) && $attributes['name'] == $packageName){
                            if(isset ($attributes['import'])){
                                $assets->setPackages(preg_split('/[\s,]+/', $attributes['import']));
                            }
                        }
                    }
                }
            }
            self::$assets = $assets;
        }
    }

    public static function getForceRead() {
        return self::$forceRead;
    }

    public static function setForceRead($forceRead) {
        self::$forceRead = $forceRead;
    }

    public static function getAssets() {
        return $this->assets;
    }

    public static function setAssets(YsAssets $assets) {
        $this->assets = $assets;
    }
    
}