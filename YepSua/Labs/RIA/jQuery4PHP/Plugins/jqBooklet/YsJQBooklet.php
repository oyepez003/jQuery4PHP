<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQBooklet todo description
 *
 * @method YsJQBooklet _name               Name of the booklet to display in the document title bar
 * @method YsJQBooklet _width              Container width
 * @method YsJQBooklet _height             Container height
 * @method YsJQBooklet _speed              Speed of the transition between pages
 * @method YsJQBooklet _direction          Direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
 * @method YsJQBooklet _startingPage       Index of the first page to be displayed
 * @method YsJQBooklet _easing             Easing method for complete transition
 * @method YsJQBooklet _easeIn             Easing method for first half of transition
 * @method YsJQBooklet _easeOut            Easing method for second half of transition
 * @method YsJQBooklet _closed             Start with the book "closed", will add empty pages to beginning and end of book
 * @method YsJQBooklet _closedFrontTitle   Used with "closed", "menu" and "pageSelector", determines title of blank starting page
 * @method YsJQBooklet _closedFrontChapter Used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
 * @method YsJQBooklet _closedBackTitle    Used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
 * @method YsJQBooklet _closedBackChapter  Used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
 * @method YsJQBooklet _covers             Used with "closed", makes first and last pages into covers, without page numbers (if enabled)
 * @method YsJQBooklet _autoCenter         Used with "closed", makes book position in center of container when closed
 * @method YsJQBooklet _pagePadding        Padding for each page wrapper
 * @method YsJQBooklet _pageNumbers        Display page numbers on each page
 * @method YsJQBooklet _manual             Enables manual page turning, requires jQuery UI to function 
 * @method YsJQBooklet _hovers             Enables preview pageturn hover animation, shows a small preview of previous or next page on hover
 * @method YsJQBooklet _overlays           Enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
 * @method YsJQBooklet _tabs               Adds tabs along the top of the pages
 * @method YsJQBooklet _tabWidth           Set the width of the tabs
 * @method YsJQBooklet _tabHeight          Set the height of the tabs
 * @method YsJQBooklet _arrows             Adds arrows overlayed over the book edges
 * @method YsJQBooklet _arrowsHide         Auto hides arrows when controls are not hovered
 * @method YsJQBooklet _cursor             Cursor css setting for side bar areas   
 * @method YsJQBooklet _hash               Enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
 * @method YsJQBooklet _keyboard           Enables navigation with arrow keys (left: previous, right: next)
 * @method YsJQBooklet _next               Selector for element to use as click trigger for next page
 * @method YsJQBooklet _prev               Selector for element to use as click trigger for previous page
 * @method YsJQBooklet _auto               Enables automatic navigation, requires "delay"
 * @method YsJQBooklet _delay              Amount of time between automatic page flipping
 * @method YsJQBooklet _pause              Selector for element to use as click trigger for pausing auto page flipping
 * @method YsJQBooklet _play               Selector for element to use as click trigger for restarting auto page flipping
 * @method YsJQBooklet _menu               Selector for element to use as the menu area, required for 'pageSelector'
 * @method YsJQBooklet _pageSelector       Enables navigation with a dropdown menu of pages, requires 'menu'
 * @method YsJQBooklet _chapterSelector    Enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'
 * @method YsJQBooklet _shadows            Display shadows on page animations
 * @method YsJQBooklet _shadowTopFwdWidth  Shadow width for top forward anim
 * @method YsJQBooklet _shadowTopBackWidth Shadow width for top back anim
 * @method YsJQBooklet _shadowBtmWidth     Shadow width for bottom shadow
 * @method YsJQBooklet _before             Callback invoked before each page turn animation
 * @method YsJQBooklet _after              Callback invoked after each page turn animation
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQBooklet extends YsJQueryPlugin {
  
  const VERSION = "1.2.0";
  const LICENSE = "MIT and GPL licenses";
  
  public static $event = 'booklet';
  public static $className = 'b-load';
  
  public function registerOptions(){
    return   array(
              //options
               '_name' =>  array('key' => 'name', 'is_quoted' => false),
               '_width' =>  array('key' => 'width', 'is_quoted' => false),
               '_height' =>  array('key' => 'height', 'is_quoted' => false),
               '_speed' =>  array('key' => 'speed', 'is_quoted' => false),
               '_direction' =>  array('key' => 'direction', 'is_quoted' => false),
               '_startingPage' =>  array('key' => 'startingPage', 'is_quoted' => false),
               '_easing' =>  array('key' => 'easing', 'is_quoted' => false),
               '_easeIn' =>  array('key' => 'easeIn', 'is_quoted' => false),
               '_easeOut' =>  array('key' => 'easeOut', 'is_quoted' => false),
               '_closed' =>  array('key' => 'closed', 'is_quoted' => false),
               '_closedFrontTitle' =>  array('key' => 'closedFrontTitle', 'is_quoted' => false),
               '_closedFrontChapter' =>  array('key' => 'closedFrontChapter', 'is_quoted' => false),
               '_closedBackTitle' =>  array('key' => 'closedBackTitle', 'is_quoted' => false),
               '_closedBackChapter' =>  array('key' => 'closedBackChapter', 'is_quoted' => false),
               '_covers' =>  array('key' => 'covers', 'is_quoted' => false),
               '_autoCenter' =>  array('key' => 'autoCenter', 'is_quoted' => false),
               '_pagePadding' =>  array('key' => 'pagePadding', 'is_quoted' => false),
               '_pageNumbers' =>  array('key' => 'pageNumbers', 'is_quoted' => false),
               '_manual' =>  array('key' => 'manual', 'is_quoted' => false),
               '_hovers' =>  array('key' => 'hovers', 'is_quoted' => false),
               '_overlays' =>  array('key' => 'overlays', 'is_quoted' => false),
               '_tabs' =>  array('key' => 'tabs', 'is_quoted' => false),
               '_tabWidth' =>  array('key' => 'tabWidth', 'is_quoted' => false),
               '_tabHeight' =>  array('key' => 'tabHeight', 'is_quoted' => false),
               '_arrows' =>  array('key' => 'arrows', 'is_quoted' => false),
               '_arrowsHide' =>  array('key' => 'arrowsHide', 'is_quoted' => false),
               '_cursor' =>  array('key' => 'cursor', 'is_quoted' => false),
               '_hash' =>  array('key' => 'hash', 'is_quoted' => false),
               '_keyboard' =>  array('key' => 'keyboard', 'is_quoted' => false),
               '_next' =>  array('key' => 'next', 'is_quoted' => false),
               '_prev' =>  array('key' => 'prev', 'is_quoted' => false),
               '_auto' =>  array('key' => 'auto', 'is_quoted' => false),
               '_delay' =>  array('key' => 'delay', 'is_quoted' => false),
               '_pause' =>  array('key' => 'pause', 'is_quoted' => false),
               '_play' =>  array('key' => 'play', 'is_quoted' => false),
               '_menu' =>  array('key' => 'menu', 'is_quoted' => false),
               '_pageSelector' =>  array('key' => 'pageSelector', 'is_quoted' => false),
               '_chapterSelector' =>  array('key' => 'chapterSelector', 'is_quoted' => false),
               '_keyboard' =>  array('key' => 'keyboard', 'is_quoted' => false),
               '_shadows' =>  array('key' => 'shadows', 'is_quoted' => false),
               '_shadowTopFwdWidth' =>  array('key' => 'shadowTopFwdWidth', 'is_quoted' => false),
               '_shadowTopBackWidth' =>  array('key' => 'shadowTopBackWidth', 'is_quoted' => false),
               '_shadowBtmWidth' =>  array('key' => 'shadowBtmWidth', 'is_quoted' => false),        
              // events
               '_before' =>  array('key' => 'before', 'is_quoted' => false),
               '_after' =>  array('key' => 'after', 'is_quoted' => false),
              );
  }
  
  /**
   * Retrieves a instance of this class.
   * @return YsJQBooklet
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  public static function build($jQuerySelector = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($jQuerySelector !== null){
      $jquery->in($jQuerySelector);
      $jquery->conditionNOT(YsJQuery::hasClass('booklet')->in($jQuerySelector));
    }
    return $jquery;
  }
  
  /**
   * Move to the next page
   * @return YsJQBooklet 
   */
  public static function next(){
    $jquery = self::build();
    $jquery->addArgumentsBeforeOptions('next');
    return $jquery;
  }
  
  /**
   * Move to the previous page
   * @return YsJQBooklet 
   */
  public static function previous(){
    $jquery = self::build();
    $jquery->addArgumentsBeforeOptions('prev');
    return $jquery;
  }
  
  /**
   * Move directly to a specific page number, 0 indexed
   * @param int $page The specific page number
   * @return YsJQBooklet 
   */
  public static function goToPage($page){
    $jquery = self::build();
    $jquery->addArgumentsBeforeOptions(YsArgument::value($page));
    return $jquery;
  }
  
  // TEMPLATE
  
  public static function initWidget($id, $htmlProperties = null, $tag = YsHTML::DIV){
    $template = parent::initWidget($id, $htmlProperties, $tag);
    $template .= parent::initWidget(sprintf('%s-%s',$id,self::$className), sprintf('class="%s"', self::$className), $tag);
    return $template;
  }

  public static function endWidget($tag = YsHTML::DIV){
    $template = parent::endWidget($tag);
    $template .= parent::endWidget($tag);
    return $template;
  }
  
  public static function initPage($title = null, $chapter = null, $htmlProperties = null, $tag = YsHTML::DIV){
    $htmlProperties = ($title === null) ? $htmlProperties : sprintf('%s title="%s"',$htmlProperties, $title);
    $htmlProperties = ($chapter === null) ? $htmlProperties : sprintf('%s rel="%s"',$htmlProperties, $chapter);
    return parent::initWidget(null, $htmlProperties, $tag);
  }

  public static function endPage($tag = YsHTML::DIV){
    return parent::endWidget($tag);
  }
  
  public static function menu($id, $htmlProperties = null, $tag = YsHTML::DIV){
    $template = parent::initWidget($id, $htmlProperties, $tag);
    $template .= parent::endWidget($tag);
    return $template;
  }
  
}