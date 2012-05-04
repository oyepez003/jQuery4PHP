<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQBox todo description.
 *
 * @method YsJQBox _padding Space inside fancyBox around content
 * @method YsJQBox _margin Minimum space between viewport and fancyBox. Can be set as array - [top, right, bottom, left]. Right and bottom margins are ignored if content dimensions exceeds viewport
 * @method YsJQBox _opacity When true, transparency of content is changed for elastic transitions
 * @method YsJQBox _modal When true, 'overlayShow' is set to 'true' and 'hideOnOverlayClick', 'hideOnContentClick', 'enableEscapeButton', 'showCloseButton' are set to 'false'
 * @method YsJQBox _cyclic When true, galleries will be cyclic, allowing you to keep pressing next/back.
 * @method YsJQBox _scrolling Set the overflow CSS property to create or hide scrollbars. Can be set to 'auto', 'yes' or 'no'
 * @method YsJQBox _width Default width for 'iframe' and 'swf' content. Also for 'inline', 'ajax' and 'html' if 'autoSize' is set to 'false'
 * @method YsJQBox _height Default height for 'iframe' and 'swf' content. Also for 'inline', 'ajax' and 'html' if 'autoSize' is set to 'false'
 * @method YsJQBox _autoScale If true, FancyBox is scaled to fit in viewport
 * @method YsJQBox _autoDimensions For inline and ajax views, resizes the view to the element recieves. Make sure it has dimensions otherwise this will give unexpected results
 * @method YsJQBox _centerOnScroll When true, FancyBox is centered while scrolling page
 * @method YsJQBox _ajax Options for ajax request
 * @method YsJQBox _Note: 'error' and 'success' will be overwritten by FancyBox
 * @method YsJQBox _swf Params to put on the swf object
 * @method YsJQBox _hideOnOverlayClick Toggle if clicking the overlay should close FancyBox
 * @method YsJQBox _hideOnContentClick Toggle if clicking the content should close FancyBox
 * @method YsJQBox _overlayShow Toggle overlay
 * @method YsJQBox _overlayOpacity Opacity of the overlay (from 0 to 1; default - 0.3)
 * @method YsJQBox _overlayColor Color of the overlay
 * @method YsJQBox _titleShow Toggle title
 * @method YsJQBox _titlePosition The position of title. Can be set to 'outside', 'inside' or 'over'
 * @method YsJQBox _titleFormat Callback to customize title area. You can set any html - custom image counter or even custom navigation
 * @method YsJQBox _transitionIn The transition type. Can be set to 'elastic', 'fade' or 'none'
 * @method YsJQBox _transitionOut The transition type. Can be set to 'elastic', 'fade' or 'none'
 * @method YsJQBox _speedIn Speed of the fade and elastic transitions, in milliseconds
 * @method YsJQBox _speedOut Speed of the fade and elastic transitions, in milliseconds
 * @method YsJQBox _changeSpeed Speed of resizing when changing gallery items, in milliseconds
 * @method YsJQBox _changeFade Speed of the content fading while changing gallery items
 * @method YsJQBox _easingIn Easing used for elastic animations
 * @method YsJQBox _easingOut	Easing used for elastic animations
 * @method YsJQBox _showCloseButton	Toggle close button
 * @method YsJQBox _showNavArrows Toggle navigation arrows
 * @method YsJQBox _enableEscapeButton Toggle if pressing Esc button closes FancyBox
 * @method YsJQBox _onStart Will be called right before attempting to load the content
 * @method YsJQBox _onCancel Will be called after loading is canceled
 * @method YsJQBox _onComplete Will be called once the content is displayed
 * @method YsJQBox _onCleanup Will be called just before closing
 * @method YsJQBox _onClosed Will be called once FancyBox is closed
 * @method YsJQBox _type Overrides type for content
 * @method YsJQBox _href Forces content source
 * @method YsJQBox _title Overrides title
 * @method YsJQBox _content Overrides content to be displayed
 * @method YsJQBox _orig Sets object whos position and dimensions will be used by 'elastic' transition
 * @method YsJQBox _index Overrides group start index
 *
 * @method YsJQBox _minWidth 	Minimum width fancyBox should be allowed to resize to
 * @method YsJQBox _minHeight 	Minimum height fancyBox should be allowed to resize to
 * @method YsJQBox _maxWidth 	Maximum width fancyBox should be allowed to resize to
 * @method YsJQBox _maxHeight 	Maximum height fancyBox should be allowed to resize to
 * @method YsJQBox _autoSize 	If set to true, for 'inline', 'ajax' and 'html' type content width/height is auto determined. If no dimensions set this may give unexpected results
 * @method YsJQBox _fitToView 	If set to true, fancyBox is resized to fit inside viewport
 * @method YsJQBox _aspectRatio 	If set to true, resizing is constrained by the original aspect ratio (images always keep ratio)
 * @method YsJQBox _topRatio 	Top space ratio for vertical centering. If set to 0.5 than vertical and bottom spece will be equal. If 0 - fancyBox will be at the viewport top
 * @method YsJQBox _fixed 	If set to true, fancyBox position will be changed to 'fixed' if it fits inside viewport
 * @method YsJQBox _wrapCSS 	Customizable CSS class for wrapping element (great for custom styling)
 * @method YsJQBox _closeClick 	If set to true, fancyBox will be closed when user clicks the content
 * @method YsJQBox _closeBtn 	If set to true, close button will be displayed
 * @method YsJQBox _arrows 	If set to true, navigation arrows will be displayed
 * @method YsJQBox _mouseWheel 	If set to true, you will be able to navigate gallery using the mouse wheel
 * @method YsJQBox _loop 	If set to true, enables cyclic navigation. This means, if you click "next" after you reach the last element, first element will be displayed (and vice versa).
 * @method YsJQBox _keys 	Define keyboard keys for gallery navigation and closing
 * @method YsJQBox _autoPlay 	If set to true, slideshow will start after opening the first gallery item
 * @method YsJQBox _playSpeed 	Slideshow speed in milliseconds
 * @method YsJQBox _url 	Overrides content source url
 * @method YsJQBox _tpl 	Object containing various templates
 * @method YsJQBox _openEffect Animation effect ('elastic', 'fade' or 'none') for each transition type
 * @method YsJQBox _closeEffect Animation effect ('elastic', 'fade' or 'none') for each transition type
 * @method YsJQBox _nextEffect Animation effect ('elastic', 'fade' or 'none') for each transition type
 * @method YsJQBox _prevEffect 	Animation effect ('elastic', 'fade' or 'none') for each transition type
 * @method YsJQBox _openSpeed The time it takes (in ms, or "slow", "normal", "fast") to complete transition
 * @method YsJQBox _closeSpeed The time it takes (in ms, or "slow", "normal", "fast") to complete transition
 * @method YsJQBox _nextSpeed The time it takes (in ms, or "slow", "normal", "fast") to complete transition
 * @method YsJQBox _prevSpeed 	The time it takes (in ms, or "slow", "normal", "fast") to complete transition
 * @method YsJQBox _openEasing Easing method for each transition type
 * @method YsJQBox _closeEasing Easing method for each transition type
 * @method YsJQBox _nextEasing Easing method for each transition type
 * @method YsJQBox _prevEasing 	Easing method for each transition type
 * @method YsJQBox _openOpacity If set to true, transparency is changed for elastic transitions
 * @method YsJQBox _closeOpacity 	If set to true, transparency is changed for elastic transitions
 * @method YsJQBox _openMethod Method that handles transition (you can add custom effects there)
 * @method YsJQBox _closeMethod Method that handles transition (you can add custom effects there)
 * @method YsJQBox _nextMethod Method that handles transition (you can add custom effects there)
 * @method YsJQBox _prevMethod 	Method that handles transition (you can add custom effects there)
 * @method YsJQBox _helpers Object containing options for enabled helpers 
 * @method YsJQBox _onCancel 	Called after user triggers canceling. 
 * @method YsJQBox _beforeLoad 	Called before starting to load content. 
 * @method YsJQBox _afterLoad 	Called after content is loaded. 
 * @method YsJQBox _beforeShow 	Called right before open animations has started 
 * @method YsJQBox _afterShow 	Called after open animations has ended 
 * @method YsJQBox _beforeClose  	Called right after closing has been triggered but not yet started 
 * @method YsJQBox _afterClose 	Called after closing animation has ended 
 * @method YsJQBox _onUpdate 	Called after window resize, scroll or orientation change events are triggered 
 * @method YsJQBox _onPlayStart 	Called after slideshdow has started 
 * @method YsJQBox _onPlayEnd 	Called after slideshdow has stoped 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQBox extends YsJQueryPlugin {

  const VERSION = "2.0";
  const LICENSE = "CC BY-NC 3.0";
  
  public static $event = 'fancybox';
  
  public static $EFFECT_ELASTIC = 'elastic';
  public static $EFFECT_FADE = 'fade';
  public static $EFFECT_NONE = 'none';
  public static $TYPE_INLINE = 'inline';
  public static $TYPE_IFRAME = 'iframe';
  public static $TYPE_AJAX = 'ajax';
  public static $TYPE_HTML = 'html';
  public static $TYPE_SWF = 'swf';
  
  private static $TPL_ERROR = '<p class="fancybox-error">%s</p>';
  private static $TPL_CLOSE = '<div title="%s" class="fancybox-item fancybox-close"></div>';
  private static $TPL_NEXT = '<a title="%s" class="fancybox-item fancybox-next"><span></span></a>';
  private static $TPL_PREV = '<a title="%s" class="fancybox-item fancybox-prev"><span></span></a>';
  private static $TPL_BUTTONS = '<div id="fancybox-buttons"><ul><li><a class="btnPrev" title="%PREV%" href="javascript:$.fancybox.prev();">%PREV%</a></li><li><a class="btnPlay" title="%PLAY%" href="javascript:$.fancybox.play();;">%PLAY%</a></li><li><a class="btnNext" title="%NEXT%" href="javascript:$.fancybox.next();">%NEXT%</a></li><li><a class="btnToggle" title="%TOGLE_SIZE%" href="javascript:$.fancybox.toggle();">%TOGLE_SIZE%</a></li><li><a class="btnClose" title="%CLOSE%" href="javascript:$.fancybox.close();">%CLOSE%</a></li></ul></div>';
    
  public function registerOptions(){
    return   array(
              //options
               '_padding' =>  array('key' => 'padding', 'is_quoted' => false),
               '_margin' =>  array('key' => 'margin', 'is_quoted' => false),
               '_opacity' =>  array('key' => 'opacity', 'is_quoted' => false),
               '_modal' =>  array('key' => 'modal', 'is_quoted' => false),
               '_cyclic' =>  array('key' => 'cyclic', 'is_quoted' => false),
               '_scrolling' =>  array('key' => 'scrolling', 'is_quoted' => false),
               '_width' =>  array('key' => 'width', 'is_quoted' => false),
               '_height' =>  array('key' => 'height', 'is_quoted' => false),
               '_autoScale' =>  array('key' => 'autoScale', 'is_quoted' => false),
               '_autoDimensions' =>  array('key' => 'autoDimensions', 'is_quoted' => false),
               '_centerOnScroll' =>  array('key' => 'centerOnScroll', 'is_quoted' => false),
               '_ajax' =>  array('key' => 'ajax', 'is_quoted' => false),
               '_note' =>  array('key' => 'Note', 'is_quoted' => false),
               '_swf' =>  array('key' => 'swf', 'is_quoted' => false),
               '_hideOnOverlayClick' =>  array('key' => 'hideOnOverlayClick', 'is_quoted' => false),
               '_hideOnContentClick' =>  array('key' => 'hideOnContentClick', 'is_quoted' => false),
               '_overlayShow' =>  array('key' => 'overlayShow', 'is_quoted' => false),
               '_overlayOpacity' =>  array('key' => 'overlayOpacity', 'is_quoted' => false),
               '_overlayColor' =>  array('key' => 'overlayColor', 'is_quoted' => false),
               '_titleShow' =>  array('key' => 'titleShow', 'is_quoted' => false),
               '_titlePosition' =>  array('key' => 'titlePosition', 'is_quoted' => false),
               '_titleFormat' =>  array('key' => 'titleFormat', 'is_quoted' => false),
               '_transitionIn' =>  array('key' => 'transitionIn', 'is_quoted' => false),
               '_transitionOut' =>  array('key' => 'transitionOut', 'is_quoted' => false),
               '_speedIn' =>  array('key' => 'speedIn', 'is_quoted' => false),
               '_speedOut' =>  array('key' => 'speedOut', 'is_quoted' => false),
               '_changeSpeed' =>  array('key' => 'changeSpeed', 'is_quoted' => false),
               '_changeFade' =>  array('key' => 'changeFade', 'is_quoted' => false),
               '_easingIn' =>  array('key' => 'easingIn', 'is_quoted' => false),
               '_showCloseButton' =>  array('key' => 'showCloseButton', 'is_quoted' => false),
               '_showNavArrows' =>  array('key' => 'showNavArrows', 'is_quoted' => false),
               '_enableEscapeButton' =>  array('key' => 'enableEscapeButton', 'is_quoted' => false),
               '_onStart' =>  array('key' => 'onStart', 'is_quoted' => false),
               '_onCancel' =>  array('key' => 'onCancel', 'is_quoted' => false),
               '_onComplete' =>  array('key' => 'onComplete', 'is_quoted' => false),
               '_onCleanup' =>  array('key' => 'onCleanup', 'is_quoted' => false),
               '_onClosed' =>  array('key' => 'onClosed', 'is_quoted' => false),
               '_type' =>  array('key' => 'type', 'is_quoted' => false),
               '_href' =>  array('key' => 'href', 'is_quoted' => false),
               '_title' =>  array('key' => 'title', 'is_quoted' => false),
               '_content' =>  array('key' => 'content', 'is_quoted' => false),
               '_orig' =>  array('key' => 'orig', 'is_quoted' => false),
               '_index' =>  array('key' => 'index', 'is_quoted' => false),
        
               '_minWidth' =>  array('key' => 'minWidth', 'is_quoted' => false),
               '_minHeight' =>  array('key' => 'minHeight', 'is_quoted' => false),
               '_maxWidth' =>  array('key' => 'maxWidth', 'is_quoted' => false),
               '_maxHeight' =>  array('key' => 'maxHeight', 'is_quoted' => false),
               '_autoSize' =>  array('key' => 'autoSize', 'is_quoted' => false),
               '_fitToView' =>  array('key' => 'fitToView', 'is_quoted' => false),
               '_aspectRatio' =>  array('key' => 'aspectRatio', 'is_quoted' => false),
               '_topRatio' =>  array('key' => 'topRatio', 'is_quoted' => false),
               '_wrapCSS' =>  array('key' => 'wrapCSS', 'is_quoted' => false),
               '_closeClick' =>  array('key' => 'closeClick', 'is_quoted' => false),
               '_closeBtn' =>  array('key' => 'closeBtn', 'is_quoted' => false),
               '_arrows' =>  array('key' => 'arrows', 'is_quoted' => false),
               '_mouseWheel' =>  array('key' => 'mouseWheel', 'is_quoted' => false),
               '_loop' =>  array('key' => 'loop', 'is_quoted' => false),
               '_keys' =>  array('key' => 'keys', 'is_quoted' => false),
               '_autoPlay' =>  array('key' => 'autoPlay', 'is_quoted' => false),
               '_playSpeed' =>  array('key' => 'playSpeed', 'is_quoted' => false),
               '_url' =>  array('key' => 'url', 'is_quoted' => false),
               '_tpl' =>  array('key' => 'tpl', 'is_quoted' => false),
               '_openEffect' =>  array('key' => 'openEffect', 'is_quoted' => false),
               '_closeEffect' =>  array('key' => 'closeEffect', 'is_quoted' => false),
               '_nextEffect' =>  array('key' => 'nextEffect', 'is_quoted' => false),
               '_prevEffect' =>  array('key' => 'prevEffect', 'is_quoted' => false),
               '_openSpeed' =>  array('key' => 'openSpeed', 'is_quoted' => false),
               '_closeSpeed' =>  array('key' => 'closeSpeed', 'is_quoted' => false),
               '_nextSpeed' =>  array('key' => 'nextSpeed', 'is_quoted' => false),
               '_prevSpeed' =>  array('key' => 'prevSpeed', 'is_quoted' => false),
               '_openEasing' =>  array('key' => 'openEasing', 'is_quoted' => false),
               '_closeEasing' =>  array('key' => 'closeEasing', 'is_quoted' => false),
               '_nextEasing' =>  array('key' => 'nextEasing', 'is_quoted' => false),
               '_prevEasing' =>  array('key' => 'prevEasing', 'is_quoted' => false),
               '_openOpacity' =>  array('key' => 'openOpacity', 'is_quoted' => false),
               '_closeOpacity' =>  array('key' => 'closeOpacity', 'is_quoted' => false),
               '_openMethod' =>  array('key' => 'openMethod', 'is_quoted' => false),
               '_closeMethod' =>  array('key' => 'closeMethod', 'is_quoted' => false),
               '_nextMethod' =>  array('key' => 'nextMethod', 'is_quoted' => false),
               '_prevMethod' =>  array('key' => 'prevMethod', 'is_quoted' => false),
               '_helpers' =>  array('key' => 'helpers', 'is_quoted' => false),
               '_onCancel' =>  array('key' => 'onCancel', 'is_quoted' => false),
               '_beforeLoad' =>  array('key' => 'beforeLoad', 'is_quoted' => false),
               '_afterLoad' =>  array('key' => 'afterLoad', 'is_quoted' => false),
               '_beforeShow' =>  array('key' => 'beforeShow', 'is_quoted' => false),
               '_afterShow' =>  array('key' => 'afterShow', 'is_quoted' => false),
               '_beforeClose' =>  array('key' => 'beforeClose', 'is_quoted' => false),
               '_afterClose' =>  array('key' => 'afterClose', 'is_quoted' => false),
               '_onUpdate' =>  array('key' => 'onUpdate', 'is_quoted' => false),
               '_onPlayStart' =>  array('key' => 'onPlayStart', 'is_quoted' => false),
               '_onPlayEnd' =>  array('key' => 'onPlayEnd', 'is_quoted' => false),
              );
  }
  
  /**
   * Retrieves a instance of this class.
   * @return YsJQBox
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  public static function build($jQuerySelector=null, $options=null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($jQuerySelector !== null){$jquery->in($jQuerySelector);}
    if($options !== null){$jquery->setOptions($options);}
    return $jquery;
  }
  
  public function _errorMsg($message){
    $this->defineTPL('error', sprintf(self::$TPL_ERROR, $message));
    return $this;
  }
  
  public function _nextTitle($title){
    $this->defineTPL('next', sprintf(self::$TPL_NEXT, $title));
    $this->updateTPLButtons('%NEXT%',$title);
    return $this;
  }
  
  public function _prevTitle($title){
    $this->defineTPL('prev', sprintf(self::$TPL_PREV, $title));
    $this->updateTPLButtons('%PREV%',$title);
    return $this;
  }
  
  public function _closeTitle($title){
    $this->defineTPL('closeBtn', sprintf(self::$TPL_CLOSE, $title));
    return $this;
  }
  
  public function defineTPL($key, $value){
    $tpl = $this->getOptionValue('_tpl');
    if(is_array($tpl)){
      $this->_tpl(array_merge($tpl,array($key => $value)));
    }else{
      $this->_tpl(array($key => $value));
    }
  }
  
  private function updateTPLButtons($key, $value){
    self::$TPL_BUTTONS = str_replace($key, $value, self::$TPL_BUTTONS);
    $buttons = array('buttons' => array('tpl' => self::$TPL_BUTTONS));
    $this->mergeOptions('_helpers', $buttons);
  }
  
  
  // METHODS
  
  /**
   * Shows loading animation
   */
  public static function showActivity($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'showActivity');
    return $jquery;
  }
  
  /**
   * Hides loading animation
   */
  public static function hideActivity($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'hideActivity');
    return $jquery;
  }
  
  /**
   * Displays the next gallery item
   */
  public static function next($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'next');
    return $jquery;
  }
  
  /**
   * Displays the previous gallery item
   */
  public static function previous($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'prev');
    return $jquery;
  }
  
  /**
   * Displays item by index from gallery
   */
  public static function pos($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'pos');
    return $jquery;
  }
  
  /**
   * Cancels loading content
   */
  public static function cancel($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'cancel');
    return $jquery;
  }
  
  /**
   * Hides FancyBox
   */
  public static function close($jQuerySelector=null,$force=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'close');
    return $jquery;
  }
  
  /**
   * Hides FancyBox in a iFrame
   */
  public static function closeIFrame($jQuerySelector=null,$force=null){
    $jquery = self::close($jQuerySelector,$force);
    return $jquery;
  }
  
  /**
   * Auto-resizes FancyBox height to match height of content
   */
  public static function resize($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'resize');
    return $jquery;
  }
  
  /**
   * Centers FancyBox in viewport
   */
  public static function center($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'center');
    return $jquery;
  }

  /**
   * Show FancyBox
   */
  public static function open($jQuerySelector=null,$group=null,$options=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'open');
    $jquery->addArgumentsBeforeOptions($group);
    $jquery->addArgumentsBeforeOptions($options);
    return $jquery;
  }
  
  /**
   * Start or stop (if already running) slideshow
   */
  public static function play($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'play');
    return $jquery;
  }
  
  /**
   * Navigate to gallery item by index. Item counting starts from 0.
   */
  public static function jumpTo($jQuerySelector=null,$item=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'jumpto');
    $jquery->addArgumentsBeforeOptions($item);
    return $jquery;
  }
  
  /**
   * Will center fancyBox inside viewport and toggle position type to fixed or 
   * absolute if needed
   */
  public static function reposition($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'reposition');
    return $jquery;
  }
  
  /**
   * Auto-sizes fancyBox height to match height of content
   */
  public static function update($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'update');
    return $jquery;
  }
  
  
  /**
   * If content is resized to fit inside viewport than it will be expanded to 
   * full size (and vice verse)
   */
  public static function toggle($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'toggle');
    return $jquery;
  }
  
  /**
   * Shows loading animation
   */
  public static function showLoading($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'showLoading');
    return $jquery;
  }
  
  /**
   * Hides loading animation 
   */
  public static function hideLoading($jQuerySelector=null){
    $jquery = self::callJQBoxMethod($jQuerySelector,'hideLoading');
    return $jquery;
  }
  
  /**
   * @param string $jQuerySelector
   * @param string $methodName
   * @return YsJQueryCore 
   */
  private static function callJQBoxMethod($jQuerySelector,$methodName){
    $jquery = new YsJQueryCore();
    $jquery->addAccesors(sprintf('.%s.%s',self::$event,$methodName));
    $jquery->in($jQuerySelector);
    return $jquery;
  }
  
  public function _withButtons($config = array()){
    $this->_helpers(array('buttons' => $config));
    return $this;
  }
  
}