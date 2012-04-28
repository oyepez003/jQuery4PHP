<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQRing todo description.
 *
 * @method YsJQRing _bearing
 * @method YsJQRing _tilt
 * @method YsJQRing _minZ
 * @method YsJQRing _maxZ
 * @method YsJQRing _minOpacity
 * @method YsJQRing _maxOpacity
 * @method YsJQRing _minScale
 * @method YsJQRing _maxScale
 * @method YsJQRing _duration
 * @method YsJQRing _btnNext
 * @method YsJQRing _btnPrev
 * @method YsJQRing _easing
 * @method YsJQRing _clickToFocus
 * @method YsJQRing _focusBearing
 * @method YsJQRing _shape
 * @method YsJQRing _debug
 * @method YsJQRing _childSelector
 * @method YsJQRing _startingChild
 * @method YsJQRing _reflect
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQRing extends YsJQueryPlugin {

  const VERSION = "v1.1";
  const LICENSE = "BSD license";
  
  public static $SHAPE_LAZY_SUSAN = 'lazySusan';
  public static $SHAPE_WATER_WHEEL = 'waterWheel';
  public static $SHAPE_FIGURE8 = 'figure8';
  public static $SHAPE_SQUARE = 'square';
  public static $SHAPE_CONVEYOR_BELT_LEFT = 'conveyorBeltLeft';
  public static $SHAPE_CONVEYOR_BELT_RIGHT = 'conveyorBeltRight';
  public static $SHAPE_DIAGONAL_RING_LEFT = 'diagonalRingLeft';
  public static $SHAPE_DIAGONAL_RING_RIGHT = 'diagonalRingRight';
  public static $SHAPE_ROLLER_COASTER = 'rollerCoaster';
  public static $SHAPE_TEAR_DROP = 'tearDrop';
  public static $SHAPE_THE_JUGGLER = 'theJuggler';
  public static $SHAPE_GOODBYE_CRUEL_WORLD = 'goodbyeCruelWorld';
  

  public static $event = 'roundabout';


  public function registerOptions(){
    return   array(
              //options
               '_bearing' =>  array('key' => 'bearing', 'is_quoted' => false),
               '_tilt' =>  array('key' => 'tilt', 'is_quoted' => false),
               '_minZ' =>  array('key' => 'minZ', 'is_quoted' => false),
               '_maxZ' =>  array('key' => 'maxZ', 'is_quoted' => false),
               '_minOpacity' =>  array('key' => 'minOpacity', 'is_quoted' => false),
               '_maxOpacity' =>  array('key' => 'maxOpacity', 'is_quoted' => false),
               '_minScale' =>  array('key' => 'minScale', 'is_quoted' => false),
               '_maxScale' =>  array('key' => 'maxScale', 'is_quoted' => false),
               '_duration' =>  array('key' => 'duration', 'is_quoted' => false),
               '_btnNext' =>  array('key' => 'btnNext', 'is_quoted' => false),
               '_btnPrev' =>  array('key' => 'btnPrev', 'is_quoted' => false),
               '_easing' =>  array('key' => 'easing', 'is_quoted' => false),
               '_clickToFocus' =>  array('key' => 'clickToFocus', 'is_quoted' => false),
               '_focusBearing' =>  array('key' => 'focusBearing', 'is_quoted' => false),
               '_shape' =>  array('key' => 'shape', 'is_quoted' => false),
               '_debug' =>  array('key' => 'debug', 'is_quoted' => false),
               '_childSelector' =>  array('key' => 'childSelector', 'is_quoted' => false),
               '_startingChild' =>  array('key' => 'startingChild', 'is_quoted' => false),
               '_reflect' =>  array('key' => 'reflect', 'is_quoted' => false),        
              );
  }


  /**
   * Retrieves a instance of this class.
   * @return YsJQRing
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }

  public static function build(){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    return $jquery;
  }
  
  private static function initWithShape($jQuerySelector,$shapeName){
    return self::build()->in($jQuerySelector)->_shape($shapeName);
  }
  
  public static function shapeWaterWheel($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_WATER_WHEEL);
  }
  
  public static function shapeFigure8($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_FIGURE8);
  }
  
  public static function shapeSquare($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_SQUARE);
  }
  
  public static function shapeConveyorBeltLeft($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_CONVEYOR_BELT_LEFT);
  }
  
  public static function shapeConveyorBeltRight($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_CONVEYOR_BELT_RIGHT);
  }
  
  
  public static function shapeDiagonalRingLeft($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_DIAGONAL_RING_LEFT);
  }
  
  public static function shapeDiagonalRingRight($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_DIAGONAL_RING_RIGHT);
  }
  
  public static function shapeRollerCoaster($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_ROLLER_COASTER);
  }
  
  public static function shapeTearDrop($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_TEAR_DROP);
  }
  
  public static function shapeTheJuggler($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_THE_JUGGLER);
  }
  
  public static function shapeGoodbyeCruelWorld($jQuerySelector){
    return self::initWithShape($jQuerySelector,self::$SHAPE_GOODBYE_CRUEL_WORLD);
  }
    
}