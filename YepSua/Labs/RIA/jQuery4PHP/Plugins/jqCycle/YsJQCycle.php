<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQCycle The jQuery Cycle Plugin is a slideshow plugin that supports 
 * many different types of transition effects. It supports pause-on-hover, 
 * auto-stop, auto-fit, before/after callbacks, click triggers and much more.
 *
 * @method YsJQCycle _activePagerClass($value) class name used for the active pager element 
 * @method YsJQCycle _after($value) transition callback (scope set to element that was shown):  function(currSlideElement, nextSlideElement, options, forwardFlag) 
 * @method YsJQCycle _allowPagerClickBubble($value) allows or prevents click event on pager anchors from bubbling 
 * @method YsJQCycle _animIn($value) properties that define how the slide animates in 
 * @method YsJQCycle _animOut($value) properties that define how the slide animates out 
 * @method YsJQCycle _autostop($value) true to end slideshow after X transitions (where X == slide count) 
 * @method YsJQCycle _autostopCount($value) number of transitions (optionally used with autostop to define X) 
 * @method YsJQCycle _backwards($value) number of transitions (optionally used with autostop to define X) 
 * @method YsJQCycle _before($value) transition callback (scope set to element to be shown):     function(currSlideElement, nextSlideElement, options, forwardFlag) 
 * @method YsJQCycle _cleartype($value) true if clearType corrections should be applied (for IE) 
 * @method YsJQCycle _cleartypeNoBg($value) set to true to disable extra cleartype fixing (leave false to force background color setting on slides) 
 * @method YsJQCycle _containerResize($value) resize container to fit largest slide 
 * @method YsJQCycle _continuous($value) true to start next transition immediately after current one completes 
 * @method YsJQCycle _cssAfter($value) properties that defined the state of the slide after transitioning out 
 * @method YsJQCycle _cssBefore($value) properties that define the initial state of the slide before transitioning in 
 * @method YsJQCycle _delay($value) additional delay (in ms) for first transition (hint: can be negative) 
 * @method YsJQCycle _easeIn($value) easing for "in" transition 
 * @method YsJQCycle _easeOut($value) easing for "out" transition 
 * @method YsJQCycle _easing($value) easing method for both in and out transitions 
 * @method YsJQCycle _end($value) callback invoked when the slideshow terminates (use with autostop or nowrap options): function(options)
 * @method YsJQCycle _fastOnEvent($value) force fast transitions when triggered manually (via pager or prev/next); value == time in ms 
 * @method YsJQCycle _fit($value) force slides to fit container 
 * @method YsJQCycle _fx($value) name of transition effect (or comma separated names, ex: 'fade,scrollUp,shuffle') 
 * @method YsJQCycle _fxFn($value) function used to control the transition: function(currSlideElement, nextSlideElement, options, afterCalback, forwardFlag) 
 * @method YsJQCycle _height($value) container height (if the 'fit' option is true, the slides will be set to this height as well) 
 * @method YsJQCycle _manualTrump($value) causes manual transition to stop an active transition instead of being ignored 
 * @method YsJQCycle _metaAttr($value) data- attribute that holds the option data for the slideshow 
 * @method YsJQCycle _next($value) element, jQuery object, or jQuery selector string for the element to use as event trigger for next slide 
 * @method YsJQCycle _nowrap($value) true to prevent slideshow from wrapping 
 * @method YsJQCycle _onPagerEvent($value) callback fn for pager events: function(zeroBasedSlideIndex, slideElement) 
 * @method YsJQCycle _onPrevNextEvent($value) callback fn for prev/next events: function(isNext, zeroBasedSlideIndex, slideElement) 
 * @method YsJQCycle _pager($value)  element, jQuery object, or jQuery selector string for the element to use as pager container 
 * @method YsJQCycle _pagerAnchorBuilder($value) callback fn for building anchor links:  function(index, DOMelement) 
 * @method YsJQCycle _pagerEvent($value) name of event which drives the pager navigation 
 * @method YsJQCycle _pause($value) true to enable "pause on hover" 
 * @method YsJQCycle _pauseOnPagerHover($value) true to pause when hovering over pager link 
 * @method YsJQCycle _prev($value) element, jQuery object, or jQuery selector string for the element to use as event trigger for previous slide 
 * @method YsJQCycle _prevNextEvent($value) event which drives the manual transition to the previous or next slide 
 * @method YsJQCycle _random($value) true for random, false for sequence (not applicable to shuffle fx) 
 * @method YsJQCycle _randomizeEffects($value) valid when multiple effects are used; true to make the effect sequence random 
 * @method YsJQCycle _requeueOnImageNotLoaded($value) requeue the slideshow if any image slides are not yet loaded 
 * @method YsJQCycle _requeueTimeout($value) ms delay for requeue 
 * @method YsJQCycle _rev($value) causes animations to transition in reverse (for effects that support it such as scrollHorz/scrollVert/shuffle) 
 * @method YsJQCycle _shuffle($value) coords for shuffle animation, ex: { top:15, left: 200 } 
 * @method YsJQCycle _slideExpr($value) expression for selecting slides (if something other than all children is required) 
 * @method YsJQCycle _slideResize($value) force slide width/height to fixed size before every transition 
 * @method YsJQCycle _speed($value) speed of the transition (any valid fx speed value) 
 * @method YsJQCycle _speedIn($value) speed of the 'in' transition 
 * @method YsJQCycle _speedOut($value) speed of the 'out' transition 
 * @method YsJQCycle _startingSlide($value) zero-based index of the first slide to be displayed 
 * @method YsJQCycle _sync($value) true if in/out transitions should occur simultaneously 
 * @method YsJQCycle _timeout($value) true if in/out transitions should occur simultaneously 
 * @method YsJQCycle _timeoutFn($value) milliseconds between slide transitions (0 to disable auto advance) 
 * @method YsJQCycle _updateActivePagerLink($value) callback fn invoked to update the active pager link (adds/removes activePagerClass style) 
 * @method YsJQCycle _width($value) container width (if the 'fit' option is true, the slides will be set to this width as well) 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQCycle extends YsJQueryPlugin {

  const VERSION = "2.9999";
  const LICENSE = "MIT and GPL licenses";
  
  public static $event = 'cycle';
  
  public static $EFFECT_ALL = 'all';
  public static $EFFECT_NONE = 'none';
  public static $EFFECT_FADE = 'fade';
  public static $EFFECT_FADE_ZOOM = 'fadeZoom';
  public static $EFFECT_FADEOUT = 'fadeout';
  public static $EFFECT_SCROLL_UP = 'scrollUp';
  public static $EFFECT_SCROLL_DOWN = 'scrollDown';
  public static $EFFECT_SCROLL_LEFT = 'scrollLeft';
  public static $EFFECT_SCROLL_RIGHT = 'scrollRight';
  public static $EFFECT_SCROLL_HORIZONTAL = 'scrollHorz';
  public static $EFFECT_SCROLL_VERTICAL = 'scrollVert';
  public static $EFFECT_SLIDE_X = 'slideX';
  public static $EFFECT_SLIDE_Y = 'slideY';
  public static $EFFECT_SHUFFLE = 'shuffle';
  public static $EFFECT_TURN_UP = 'turnUp';
  public static $EFFECT_TURN_DOWN = 'turnDown';
  public static $EFFECT_TURN_LEFT = 'turnLeft';
  public static $EFFECT_TURN_RIGHT = 'turnRight';
  public static $EFFECT_ZOOM = 'zoom';
  public static $EFFECT_BLIND_X = 'blindX';
  public static $EFFECT_BLIND_Y = 'blindY';
  public static $EFFECT_BLIND_Z = 'blindZ';
  public static $EFFECT_GROW_X = 'growX';
  public static $EFFECT_GROW_Y = 'growY';
  public static $EFFECT_CURTAIN_X = 'curtainX';
  public static $EFFECT_CURTAIN_Y = 'curtainY';
  public static $EFFECT_COVER = 'cover';
  public static $EFFECT_UNCOVER = 'uncover';
  public static $EFFECT_TOSS = 'toss';
  public static $EFFECT_WIPE = 'wipe';
  
  public function registerOptions(){
    return   array(
              //options
               '_activePagerClass' =>  array('key' => 'activePagerClass', 'is_quoted' => false),
               '_after' =>  array('key' => 'after', 'is_quoted' => false),
               '_allowPagerClickBubble' =>  array('key' => 'allowPagerClickBubble', 'is_quoted' => false),
               '_animIn' =>  array('key' => 'animIn', 'is_quoted' => false),
               '_animOut' =>  array('key' => 'animOut', 'is_quoted' => false),
               '_autostop' =>  array('key' => 'autostop', 'is_quoted' => false),
               '_autostopCount' =>  array('key' => 'autostopCount', 'is_quoted' => false),
               '_backwards' =>  array('key' => 'backwards', 'is_quoted' => false),
               '_before' =>  array('key' => 'before', 'is_quoted' => false),
               '_cleartype' =>  array('key' => 'cleartype', 'is_quoted' => false),
               '_cleartypeNoBg' =>  array('key' => 'cleartypeNoBg', 'is_quoted' => false),
               '_containerResize' =>  array('key' => 'containerResize', 'is_quoted' => false),
               '_continuous' =>  array('key' => 'continuous', 'is_quoted' => false),
               '_cssAfter' =>  array('key' => 'cssAfter', 'is_quoted' => false),
               '_cssBefore' =>  array('key' => 'cssBefore', 'is_quoted' => false),
               '_delay' =>  array('key' => 'delay', 'is_quoted' => false),
               '_easeIn' =>  array('key' => 'easeIn', 'is_quoted' => false),
               '_easeOut' =>  array('key' => 'easeOut', 'is_quoted' => false),
               '_easing' =>  array('key' => 'easing', 'is_quoted' => false),
               '_end' =>  array('key' => 'end', 'is_quoted' => false),
               '_fastOnEvent' =>  array('key' => 'fastOnEvent', 'is_quoted' => false),
               '_fit' =>  array('key' => 'fit', 'is_quoted' => false),
               '_fx' =>  array('key' => 'fx', 'is_quoted' => false),
               '_fxFn' =>  array('key' => 'fxFn', 'is_quoted' => false),
               '_height' =>  array('key' => 'height', 'is_quoted' => false),
               '_manualTrump' =>  array('key' => 'manualTrump', 'is_quoted' => false),
               '_metaAttr' =>  array('key' => 'metaAttr', 'is_quoted' => false),
               '_next' =>  array('key' => 'next', 'is_quoted' => false),
               '_nowrap' =>  array('key' => 'nowrap', 'is_quoted' => false),
               '_onPagerEvent' =>  array('key' => 'onPagerEvent', 'is_quoted' => false),
               '_onPrevNextEvent' =>  array('key' => 'onPrevNextEvent', 'is_quoted' => false),
               '_pager' =>  array('key' => 'pager', 'is_quoted' => false),
               '_pagerAnchorBuilder' =>  array('key' => 'pagerAnchorBuilder', 'is_quoted' => false),
               '_pagerEvent' =>  array('key' => 'pagerEvent', 'is_quoted' => false),
               '_pause' =>  array('key' => 'pause', 'is_quoted' => false),
               '_pauseOnPagerHover' =>  array('key' => 'pauseOnPagerHover', 'is_quoted' => false),
               '_prev' =>  array('key' => 'prev', 'is_quoted' => false),
               '_prevNextEvent' =>  array('key' => 'prevNextEvent', 'is_quoted' => false),
               '_random' =>  array('key' => 'random', 'is_quoted' => false),
               '_randomizeEffects' =>  array('key' => 'randomizeEffects', 'is_quoted' => false),
               '_requeueOnImageNotLoaded' =>  array('key' => 'requeueOnImageNotLoaded', 'is_quoted' => false),
               '_requeueTimeout' =>  array('key' => 'requeueTimeout', 'is_quoted' => false),
               '_rev' =>  array('key' => 'rev', 'is_quoted' => false),
               '_shuffle' =>  array('key' => 'shuffle', 'is_quoted' => false),
               '_slideExpr' =>  array('key' => 'slideExpr', 'is_quoted' => false),
               '_slideResize' =>  array('key' => 'slideResize', 'is_quoted' => false),
               '_speed' =>  array('key' => 'speed', 'is_quoted' => false),
               '_speedIn' =>  array('key' => 'speedIn', 'is_quoted' => false),
               '_speedOut' =>  array('key' => 'speedOut', 'is_quoted' => false),
               '_startingSlide' =>  array('key' => 'startingSlide', 'is_quoted' => false),
               '_sync' =>  array('key' => 'sync', 'is_quoted' => false),
               '_timeout' =>  array('key' => 'timeout', 'is_quoted' => false),
               '_timeoutFn' =>  array('key' => 'timeoutFn', 'is_quoted' => false),
               '_updateActivePagerLink' =>  array('key' => 'updateActivePagerLink', 'is_quoted' => false),
               '_width' =>  array('key' => 'width', 'is_quoted' => false),        
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
   * Build the jQueryPlugin
   * @return YsJQCycle Plugin object
   */
  public static function build($jQuerySelector = null, $options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($jQuerySelector !== null){$jquery->in($jQuerySelector);}
    if($options !== null){$jquery->setOptions($options);}
    return $jquery;
  }
  
  
  /**
   * Build with none effects
   * @return YsJQCycle Plugin object
   */
  public static function fxNone($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_NONE);
  }
  
  /**
   * Build with random effects
   * @return YsJQCycle Plugin object
   */
  public static function fxAll($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_ALL);
  }
  
  /**
   * Build with fadeZoom effects
   * @return YsJQCycle Plugin object
   */
  public static function fxFadeZoom($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_FADE_ZOOM);
  }
  
  /**
   * Build with fadeout effect
   * @return YsJQCycle Plugin object
   */
  public static function fxFadeout($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_FADEOUT);
  }
  
  /**
   * Build with scrollUp effect
   * @return YsJQCycle Plugin object
   */
  public static function fxScrollUp($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SCROLL_UP);
  }
  
  /**
   * Build with scrollDown effect
   * @return YsJQCycle Plugin object
   */
  public static function fxScrollDown($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SCROLL_DOWN);
  }
  
  /**
   * Build with scrollLeft effect
   * @return YsJQCycle Plugin object
   */
  public static function fxScrollLeft($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SCROLL_LEFT);
  }
  
  /**
   * Build with scrollRight effect
   * @return YsJQCycle Plugin object
   */
  public static function fxScrollRight($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SCROLL_RIGHT);
  }  
  
  /**
   * Build with scrollHorizontal effect
   * @return YsJQCycle Plugin object
   */
  public static function fxScrollHorizontal($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SCROLL_HORIZONTAL);
  }
  
  /**
   * Build with scrollVertical effect
   * @return YsJQCycle Plugin object
   */
  public static function fxScrollVertical($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SCROLL_VERTICAL);
  }
  
  /**
   * Build with slideX effect
   * @return YsJQCycle Plugin object
   */
  public static function fxSlideX($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SLIDE_X);
  }
  
  /**
   * Build with slideY effect
   * @return YsJQCycle Plugin object
   */
  public static function fxSlideY($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SLIDE_Y);
  }
  
  /**
   * Build with shuffle effect
   * @return YsJQCycle Plugin object
   */
  public static function fxShuffle($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_SHUFFLE);
  }
  
  /**
   * Build with turnUp effect
   * @return YsJQCycle Plugin object
   */
  public static function fxTurnUp($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_TURN_UP);
  }
  
  /**
   * Build with turnDown effect
   * @return YsJQCycle Plugin object
   */
  public static function fxTurnDown($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_TURN_DOWN);
  }
  
  /**
   * Build with turnLeft effect
   * @return YsJQCycle Plugin object
   */
  public static function fxTurnLeft($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_TURN_LEFT);
  }
  
  /**
   * Build with turnRight effect
   * @return YsJQCycle Plugin object
   */
  public static function fxTurnRight($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_TURN_RIGHT);
  }
  
  /**
   * Build with zoom effect
   * @return YsJQCycle Plugin object
   */
  public static function fxZoom($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_ZOOM);
  }
  
  /**
   * Build with blindY effect
   * @return YsJQCycle Plugin object
   */
  public static function fxBlindY($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_BLIND_Y);
  }
  
  /**
   * Build with blindX effect
   * @return YsJQCycle Plugin object
   */
  public static function fxBlindX($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_BLIND_X);
  }
  
  /**
   * Build with blindZ effect
   * @return YsJQCycle Plugin object
   */
  public static function fxBlindZ($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_BLIND_Z);
  }
  
  /**
   * Build with growY effect
   * @return YsJQCycle Plugin object
   */
  public static function fxGrowX($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_GROW_X);
  }
  
  /**
   * Build with growY effect
   * @return YsJQCycle Plugin object
   */
  public static function fxGrowY($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_GROW_Y);
  }
  
  /**
   * Build with curtainX effect
   * @return YsJQCycle Plugin object
   */
  public static function fxCurtainX($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_CURTAIN_X);
  }
  
  /**
   * Build with curtainY effect
   * @return YsJQCycle Plugin object
   */
  public static function fxCurtainY($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_CURTAIN_Y);
  }
  
  /**
   * Build with cover effect
   * @return YsJQCycle Plugin object
   */
  public static function fxCover($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_COVER);
  }
  
  /**
   * Build with uncover effect
   * @return YsJQCycle Plugin object
   */
  public static function fxUncover($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_UNCOVER);
  }
  
  /**
   * Build with toss effect
   * @return YsJQCycle Plugin object
   */
  public static function fxToss($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_TOSS);
  }
  
  /**
   * Build with wipe effect
   * @return YsJQCycle Plugin object
   */
  public static function fxWipe($jQuerySelector){
    return self::build()->in($jQuerySelector)->_fx(self::$EFFECT_WIPE);
  }

  /**
   * Stops the slideshow and unbinds all events
   */
  public static function doDestroy(){
    return self::callJQueryMethod(self::$event,'destroy');
  }
  
  
  /**
   * Stops the slideshow 
   */
  public static function stop(){
    return self::callJQueryMethod(self::$event,'stop');
  }
  
  /**
   * Advances slideshow to previous slide 
   */
  public static function prev(){
    return self::callJQueryMethod(self::$event,'prev');
  }
  
  /**
   * Advances slideshow to next slide 
   */
  public static function next(){
    return self::callJQueryMethod(self::$event,'next');
  }
  
  /**
   * Toggles the pause/resume state of the slideshow 
   */
  public static function toggle(){
    return self::callJQueryMethod(self::$event,'toggle');
  }
  
  /**
   * Resumes a paused slideshow 
   */
  public static function resume(){
    return self::callJQueryMethod(self::$event,'resume');
  }
  
  /**
   * Pauses the slideshow, slideshow can be resumed with 'resume' command 
   */
  public static function pause(){
    return self::callJQueryMethod(self::$event, 'pause');
  }
  
  public static function pager($id,$htmlProperties = null){
    return self::inline($id, $htmlProperties);
  }

}