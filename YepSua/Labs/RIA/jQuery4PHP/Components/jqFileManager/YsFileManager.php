<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsFileManager description
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsFileManager extends YsComponent{
  
  private $url;
  private $lang;
  private $cssClass;
  private $wrap;
  private $places;
  private $placesFirst;
  private $editorCallback;
  private $cutURL;
  private $closeOnEditorCallback;
  private $i18n;
  private $view;
  private $width;
  private $height;
  private $disableShortcuts;
  private $rememberLastDir;
  private $cookie;
  private $toolbar;
  private $contextmenu;
  private $dialog;
  private $docked;
  private $autoReload;
  private $selectMultiple;
  
  public static $LIST_VIEW_TYPE = 'list';
  public static $ICONS_VIEW_TYPE = 'icons';
     
  public function __construct($componentId = null) {
    parent::__construct($componentId);
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFILEMANAGER);
    $this->setJQueryObject(YsJQFileManager::build());
  }
  
  public function getUrl() {
    return $this->url;
  }

  public function setUrl($url) {
    $this->url = $url;
  }

  public function getLang() {
    return $this->lang;
  }

  public function setLang($lang) {
    $this->lang = $lang;
  }

  public function getCssClass() {
    return $this->cssClass;
  }

  public function setCssClass($cssClass) {
    $this->cssClass = $cssClass;
  }

  public function getWrap() {
    return $this->wrap;
  }

  public function setWrap($wrap) {
    $this->wrap = $wrap;
  }

  public function getPlaces() {
    return $this->places;
  }

  public function setPlaces($places) {
    $this->places = $places;
  }
  
  public function getPlacesFirst() {
    return $this->placesFirst;
  }

  public function setPlacesFirst($placesFirst) {
    $this->placesFirst = $placesFirst;
  }

  public function getEditorCallback() {
    return $this->editorCallback;
  }

  public function setEditorCallback($editorCallback) {
    $this->editorCallback = $editorCallback;
  }

  public function getCutURL() {
    return $this->cutURL;
  }

  public function setCutURL($cutURL) {
    $this->cutURL = $cutURL;
  }

  public function getCloseOnEditorCallback() {
    return $this->closeOnEditorCallback;
  }

  public function setCloseOnEditorCallback($closeOnEditorCallback) {
    $this->closeOnEditorCallback = $closeOnEditorCallback;
  }

  public function getI18n() {
    return $this->i18n;
  }

  public function setI18n($i18n) {
    $this->i18n = $i18n;
  }

  public function getView() {
    return $this->view;
  }

  public function setView($view) {
    $this->view = $view;
  }

  public function getWidth() {
    return $this->width;
  }

  public function setWidth($width) {
    $this->width = $width;
  }

  public function getHeight() {
    return $this->height;
  }

  public function setHeight($height) {
    $this->height = $height;
  }

  public function getDisableShortcuts() {
    return $this->disableShortcuts;
  }

  public function setDisableShortcuts($disableShortcuts) {
    $this->disableShortcuts = $disableShortcuts;
  }

  public function getRememberLastDir() {
    return $this->rememberLastDir;
  }

  public function setRememberLastDir($rememberLastDir) {
    $this->rememberLastDir = $rememberLastDir;
  }

  public function getCookie() {
    return $this->cookie;
  }

  public function setCookie($cookie) {
    $this->cookie = $cookie;
  }

  public function getToolbar() {
    return $this->toolbar;
  }

  public function setToolbar($toolbar) {
    $this->toolbar = ($toolbar instanceof YsFileManagerToolbar) 
                   ? $toolbar->getButtons() 
                   : $toolbar;
  }

  public function getContextMenu() {
    return $this->contextmenu;
  }

  public function setContextMenu($contextmenu) {
    $this->contextmenu = ($contextmenu instanceof YsFileManagerContextMenu) 
               ? $contextmenu->getOptions() 
               : $contextmenu;
  }

  public function getDialog() {
    return $this->dialog;
  }

  public function setDialog($dialog) {
    $this->dialog = ($dialog instanceof YsUIDialog) 
           ? $dialog->getOptionsValues() 
           : $dialog;
  }

  public function getDocked() {
    return $this->docked;
  }

  public function setDocked($docked) {
    $this->docked = $docked;
  }

  public function getAutoReload() {
    return $this->autoReload;
  }

  public function setAutoReload($autoReload) {
    $this->autoReload = $autoReload;
  }

  public function getSelectMultiple() {
    return $this->selectMultiple;
  }

  public function setSelectMultiple($selectMultiple) {
    $this->selectMultiple = $selectMultiple;
  }
  
  public function build() {
    $fileManager =  $this->getJQueryObject();
    $fileManager->in($this->getJQuerySelector());
    $fileManager->setOptions($this->optionsToArray());
    return $fileManager;
  }
    
  public function setViewAsList(){
    $this->setView(self::$LIST_VIEW_TYPE);
  }
  
  public function setViewAsIcons(){
    $this->setView(self::$ICONS_VIEW_TYPE);
  }
  
  public function optionsToArray() {
    $config = array();
    $vars = get_class_vars(__CLASS__);
    foreach ($this->varsToUnset() as $value) {
      unset($vars[$value]);
    }
    foreach ($vars as $var => $value) {
      if (isset($this->$var)) {
        $config[$var] = $this->$var;
      }
    }
    return $config;
  }
    
}