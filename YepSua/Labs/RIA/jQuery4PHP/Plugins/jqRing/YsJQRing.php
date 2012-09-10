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
  
  // BASIC TEMPLATES
  /**
   * Starts the standar HTML tags for build this widget
   * @param string $id The widget id
   * @param string $htmlProperties custom HTML properties like 'style="display:none"'
   * @return YsHTML HTML tags
   */
  public static function initWidget($id, $htmlProperties = null, $tag = YsHTML::UL){
    return parent::initWidget($id , $htmlProperties,$tag);
  }

  /**
   * Ends the standar HTML tags for build this widget
   * @return YsHTML HTML tags
   */
  public static function endWidget($tag = YsHTML::UL){
    return parent::endWidget();
  }
}

/**
 *


bearing 	The starting direction in which Roundabout should face relative to the focusBearing. 	float 	0.0
tilt 	Slightly alters the calculations of moving elements. In the default shape, it adjusts the apparent tilt. Other shapes will differ. 	float 	0.0
minZ 	The lowest z-index that will be assigned to a moving element. This occurs when the moving element is opposite of (that is, 180° away from) the focusBearing. 	integer 	100
maxZ 	The greatest z-index that will be assigned to a moving element. This occurs when the moving element is at the same bearing as the focusBearing. 	integer 	280
minOpacity 	The lowest opacity that will be assigned to a moving element. This occurs when the moving element is opposite of (that is, 180° away from) the focusBearing. 	float 	0.4
maxOpacity 	The greatest opacity that will be assigned to a moving element. This occurs when the moving element is at the same bearing as the focusBearing. 	float 	1.0
minScale 	The lowest size (relative to its starting size) that will be assigned to a moving element. This occurs when the moving element is opposite of (that is, 180° away from) the focusBearing. 	float 	0.4
maxScale 	The greatest size (relative to its starting size) that will be assigned to a moving element. This occurs when the moving element is at the same bearing as the focusBearing. 	float 	1.0
duration 	The length of time Roundabout will take to move from one child element being in focus to another (when an animation is triggered). This value acts as the default for Roundabout, but each animation action can be given a custom duration for that animation. 	integer 	600
btnNext 	A jQuery selector of page elements that, when clicked, will trigger the Roundabout to animate to the next moving element. 	string 	null
btnNextCallback 	A function that will be called once the animation triggered by a btnNext-related click has finished. 	function 	function() {}
btnPrev 	A jQuery selector of page elements that, when clicked, will trigger the Roundabout to animate to the previous moving element. 	string 	null
btnPrevCallback 	A function that will be called once the animation triggered by a btnPrev-releated click has finished. 	function 	function() {}
btnToggleAutoplay 	A jQuery selector of page elements that, when clicked, will toggle the Roundabout’s autoplay state (either starting or stopping). 	string 	null
btnStartAutoplay 	A jQuery selector of page elements that, when clicked, will start the Roundabout’s autoplay feature (if it’s currently stopped). 	string 	null
btnStopAutoplay 	A jQuery selector of page elements that, when clicked, will stop the Roundabout’s autoplay feature (if it’s current playing). 	string 	null
easing 	The easing function to use when animating Roundabout. With no other plugins, the standard jQuery easing functions are available. When using the jQuery easing plugin, all of its easing functions will also be available. 	string 	"swing"
clickToFocus 	When true, Roundabout will bring non-focused moving elements into focus when they’re clicked. Otherwise, click events won’t be captured and will be passed through to the moving child elements. 	boolean 	true
clickToFocusCallback 	A function that will be called once the clickToFocus animation has completed. 	function 	function() {}
focusBearing 	The bearing that Roundabout will use as the focus point. All animations that move Roundabout between children will animate the given child element to this bearing. 	float 	0.0
shape 	The path that moving elements follow. By default, Roundabout comes with one shape, which is lazySusan. When using Roundabout with the Roundabout Shapes plugin, there are many other shapes available. 	string 	"lazySusan"
debug 	When true, Roundabout will replace the contents of moving elements with information about the moving elements themselves. 	boolean 	false
childSelector 	A jQuery selector of child elements within the elements Roundabout is called upon that will become the moving elements within Roundabout. By default, Roundabout works on unordered lists, but it can be changed to work with any nested set of child elements. 	string 	"li"
startingChild 	The child element that will start at the Roundabout’s focusBearing on load. This is a zero-based counter based on the order of markup. 	integer 	0
reflect 	When true, reverses the direction in which Roundabout will operate. By default, next animations will rotate moving elements in a clockwise direction and previous animations will be counterclockwise. Using reflect will flip the two. 	boolean 	false
floatComparisonThreshold 	The maximum distance two values can be from one another to still be considered equal by Roundabout’s standards. This prevents JavaScript rounding errors. 	float 	0.001
autoplay 	When true, Roundabout will automatically advance the moving elements to the next child at a regular interval (settable as autoplayDuration). 	boolean 	false
autoplayInitialDelayadded in v2.4 	The length of time (in milliseconds) to delay the start of Roundabout’s configured autoplay option. This only works with setting autoplay to true, and only on the first start of autoplay. 	integer 	0
autoplayDuration 	The length of time (in milliseconds) between animation triggers when a Roundabout’s autoplay is playing. 	integer 	1000
autoplayPauseOnHover 	When true, Roundabout will pause autoplay when the user moves the cursor over the Roundabout container. 	boolean 	false
enableDrag 	Requires event.drag and event.drop plugins by ThreeDubMedia. Allows a user to rotate Roundabout be clicking and dragging the Roundabout area itself. 	boolean 	false
dropDuration 	The length of time (in milliseconds) the animation will take to animate Roundabout to the appropriate child when the Roundabout is “dropped.” 	integer 	600
dropEasing 	The easing function to use when animating Roundabout after it has been “dropped.” With no other plugins, the standard jQuery easing functions are available. When using the jQuery easing plugin all of its easing functions will also be available. 	string 	"swing"
dropAnimateTo 	The animation method to use when a dragged Roundabout is “dropped.” Valid values are next, previous, or nearest. 	string 	"nearest"
dropCallback 	A function that will be called once the dropped animation has completed. 	function 	function() {}
dragAxis 	The axis along which drag events are measured. Valid values are x and y. 	string 	"x"
dragFactor 	Alters the rate at which dragging moves the Roundabout’s moving elements. Higher numbers will cause the moving elements to move less. 	integer 	4
triggerFocusEvents 	When true, a focus event will be triggered on the child element that moves into focus when it does so. 	boolean 	true
triggerBlurEvents 	When true, a blur event will be triggered on the child element that moves out of the focused position when it does so. 	boolean 	true
responsiveadded in v2.1 	When true, attaches a resize event onto the window and will automatically relayout Roundabout’s child elements as the holder element changes size. 	boolean 	false

 */