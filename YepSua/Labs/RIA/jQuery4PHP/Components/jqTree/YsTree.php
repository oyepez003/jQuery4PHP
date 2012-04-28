<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsTree Cross browser tree component.
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsTree extends YsComponent{
  
  public static $INITIALLY_OPEN = 'initially_open';
  public static $INITIALLY_LOAD = 'initially_load';
  public static $LOAD_OPEN = 'load_open';
  public static $OPEN_PARENTS = 'open_parents';
  public static $NOTIFY_PLUGINS = 'notify_plugins';
  public static $HTML_TITLES = 'html_titles';
  public static $ANIMATION = 'animation';
  public static $RTL = 'rtl';
  public static $THEME = 'theme';
  public static $THEME_URL = 'url';
  public static $DOTS = 'dots';
  public static $STRINGS = 'strings';
  public static $THEMES_ICONS = 'icons';
  public static $THEME_APPLE = 'apple';
  public static $THEME_CLASSIC = 'classic';
  public static $THEME_DEFAULT = 'default';
  public static $THEME_DEFAULT_RTL = 'default-rtl';
  public static $INITIALLY_SELECT = 'initially_select';
  public static $SELECT_LIMIT = 'select_limit';
  public static $SELECT_MULTIPLE_MODIFIER = 'select_multiple_modifier';
  public static $SELECTED_PARENT_CLOSE = 'selected_parent_close';
  public static $SELECT_PREV_ON_DELETE = 'select_prev_on_delete';
  public static $DISABLE_SELECTING_CHILDREN = 'disable_selecting_children';
  public static $THEMEROLLER_OPENED = 'opened';
  public static $THEMEROLLER_CLOSED = 'closed';
  public static $THEMEROLLER_ITEM_DEFAULT = 'item';
  public static $THEMEROLLER_ITEM_HOVER = 'item_h';
  public static $THEMEROLLER_ITEM_ACTIVE = 'item_a';
  public static $THEMEROLLER_ITEM_ICON = 'item_icon';
  public static $SEARCH_CASE_INSENSITIVE = 'case_insensitive';
  public static $SEARCH_AJAX = 'ajax';
  public static $CRRM_INPUT_WIDTH_LIMIT = 'input_width_limit';
  public static $CRRM_MOVE = 'move';
  public static $CRRM_MOVE_ALWAYS_COPY = 'always_copy';
  public static $CRRM_MOVE_OPEN_ONMOVE = 'open_onmove';
  public static $CRRM_MOVE_DEFAULT_POSITION = 'default_position';
  public static $COOKIES_SAVE_OPENED = 'save_opened';
  public static $COOKIES_SAVE_SELECTED = 'save_selected';
  public static $COOKIES_AUTO_SAVE = 'auto_save';
  public static $COOKIES_OPTIONS = 'cookie_options';
  public static $DND_COPY_MODIFIER = 'copy_modifier';
  public static $DND_CHECK_TIMEOUT = 'check_timeout';
  public static $DND_OPEN_TIMEOUT = 'open_timeout';
  public static $DND_DROP_TARGET = 'drop_target';
  public static $DND_DROP_CHECK = 'drop_check';
  public static $DND_DROP_FINISH = 'drop_finish';
  public static $DND_DRAG_TARGET = 'drag_target';
  public static $DND_DRAG_CHECK = 'drag_check';
  public static $DND_DRAG_FINISH = 'drag_finish';
  public static $CONTEXTMENU_SHOW_AT_NODE = 'show_at_node';
  public static $CONTEXTMENU_SELECT_NODE = 'select_node';
  public static $CONTEXTMENU_ITEMS = 'items';
  public static $TYPES = 'types';
  public static $TYPES_MAX_CHILDREN = 'max_children';
  public static $TYPES_MAX_DEPTH = 'max_depth';
  public static $TYPES_VALID_CHILDREN = 'valid_children';
  public static $TYPES_USE_DATA = 'use_data';
  public static $TYPES_TYPE_ATTR = 'type_attr';
  public static $AJAX_DATA = 'data';
  public static $AJAX = 'ajax';
  public static $AJAX_URL = 'url';
  public static $AJAX_SUCCESS = 'success';
  public static $AJAX_ERROR = 'error';
  public static $AJAX_CORRECT_STATE = 'correct_state';
  public static $JSON_PROGRESIVE_RENDER = 'progressive_render';
  public static $JSON_PROGRESIVE_UNLOAD = 'progressive_unload';
  public static $XML_CLEAN_NODE = 'clean_node';
  public static $XML_XSL = 'xsl';
  public static $XML_GET_SKIP_EMPTY = 'get_skip_empty';
    
  public static $METHOD_TOGGLE_NODE = 'toggle_node';
  public static $METHOD_TOGGLE_DOTS = 'toggle_dots';
  public static $METHOD_TOGGLE_ICONS = 'toggle_icons';
  public static $METHOD_HIDE_DOTS = 'hide_dots';
  public static $METHOD_HIDE_ICONS = 'hide_icons';
  public static $METHOD_SHOW_DOTS = 'show_dots';
  public static $METHOD_SHOW_ICONS = 'show_icons';
  public static $METHOD_SET_THEME = 'set_theme';
  public static $METHOD_HOVER_NODE = 'hover_node';
  public static $METHOD_DEHOVER_NODE = 'dehover_node';
  public static $METHOD_REFRESH = 'refresh';
  public static $METHOD_RESELECT = 'reselect';
  public static $METHOD_SAVE_SELECTED = 'save_selected';
  public static $METHOD_SELECT_NODE = 'select_node';
  public static $METHOD_DESELECT_NODE = 'deselect_node';
  public static $METHOD_DESELECT_ALL = 'deselect_all';
  public static $METHOD_GET_SELECTED = 'get_selected';
  public static $METHOD_IS_SELECTED = 'is_selected';
  public static $METHOD_TOGGLE_SELECT = 'toggle_select';
  public static $METHOD_ENABLE_HOTKEYS = 'enable_hotkeys';
  public static $METHOD_DISABLE_HOTKEYS = 'disable_hotkeys';
  public static $METHOD_SORT = 'sort';
  public static $METHOD_RENAME = 'rename';
  public static $METHOD_RENAME_NODE = 'rename_node';
  public static $METHOD_CHECK_NODE = 'check_node';
  public static $METHOD_UNCHECK_NODE = 'uncheck_node';
  public static $METHOD_CHECK_ALL = 'check_all';
  public static $METHOD_UNCHECK_ALL = 'uncheck_all';
  public static $METHOD_IS_CHECKED = 'is_checked';
  public static $METHOD_GET_CHECKED = 'get_checked';
  public static $METHOD_GET_UNCHECKED = 'get_unchecked';
  public static $METHOD_SHOW_CHECKBOXES = 'show_checkboxes';
  public static $METHOD_SET_LANG = 'set_lang';
  public static $METHOD_GET_LANG = 'get_lang';
  public static $METHOD_GET_TEXT = 'get_text';
  public static $METHOD_SET_TEXT = 'set_text';
  public static $METHOD_CREATE_NODE = 'create_node';
  public static $METHOD_SEARCH = 'search';
  public static $METHOD_CLEAR_SEARCH = 'clear_search';
  public static $METHOD_REMOVE = 'remove';
  public static $METHOD_CHECK_MOVE = 'check_move';
  public static $METHOD_MOVE_NODE = 'move_node';
  public static $METHOD_CUT = 'cut';
  public static $METHOD_COPY = 'copy';
  public static $METHOD_PASTE = 'paste';
  public static $METHOD_CREATE = 'create';
  public static $METHOD_SHOW_CONTEXTMENU = 'show_contextmenu';
  public static $METHOD__GET_NODE_TYPE = '_get_type';
  public static $METHOD_SET_NODE_TYPE = 'set_type';
  public static $METHOD_LOAD_NODE_HTML = 'load_node_html';
  public static $METHOD_LOAD_NODE_JSON = 'load_node_json';
  public static $METHOD_LOAD_NODE_XML = 'load_node_xml';
  public static $METHOD_GET_JSON = 'get_json';
  public static $METHOD__PARSE_JSON = '_parse_json';
  public static $METHOD_GET_XML = 'get_xml';
  public static $METHOD_PARSE_XML = 'parse_xml';
  
  public static $METHOD_GET_INDEX = 'get_index';
  public static $METHOD_GET_CONTAINER = 'get_container';
  public static $METHOD_GET_CONTAINER_UL = 'get_container_ul';
  public static $METHOD_INIT = 'init';
  public static $METHOD_DESTROY = 'destroy';
  public static $METHOD_LOADED = 'loaded';
  public static $METHOD_SET_FOCUS = 'set_focus';
  public static $METHOD_UNSET_FOCUS = 'unset_focus';
  public static $METHOD_IS_FOCUSED = 'is_focused';
  public static $METHOD_LOCK = 'lock';
  public static $METHOD_UNLOCK = 'unlock';
  public static $METHOD_IS_LOCKED = 'is_locked';
  public static $METHOD__GET_NODE = '_get_node';
  public static $METHOD__GET_NEXT = '_get_next';
  public static $METHOD__GET_PREV = '_get_prev';
  public static $METHOD__GET_PARENT = '_get_parent';
  public static $METHOD__GET_CHILDREN = '_get_children';
  public static $METHOD_GET_PATH = 'get_path';
  public static $METHOD_OPEN_NODE = 'open_node';
  public static $METHOD_AFTER_OPEN = 'after_open';
  public static $METHOD_CLOSE_NODE = 'close_node';
  public static $METHOD_AFTER_CLOSE = 'after_close';
  public static $METHOD_OPEN_ALL = 'open_all';
  public static $METHOD_CLOSE_ALL = 'close_all';
  public static $METHOD_IS_OPEN = 'is_open';
  public static $METHOD_IS_CLOSED = 'is_closed';
  public static $METHOD_IS_LEAF = 'is_leaf';
  public static $METHOD_CLEAN_NODE = 'clean_node';
  public static $METHOD_LOAD_NODE = 'load_node';
  public static $METHOD__IS_LOADED = '_is_loaded';
  public static $METHOD__GET_STRING = '_get_string';
  public static $METHOD_DELETE_NODE = 'delete_node';
  
  public static $PLUGIN_HTML_DATA = 'html_data';
  public static $PLUGIN_JSON_DATA = 'json_data'; 
  public static $PLUGIN_XML_DATA = 'xml_data'; 
  public static $PLUGIN_THEMES = 'themes';
  public static $PLUGIN_TYPES = 'types'; 
  public static $PLUGIN_UI= 'ui'; 
  public static $PLUGIN_CRRM = 'crrm'; 
  public static $PLUGIN_HOTKEYS = 'hotkeys'; 
  public static $PLUGIN_LANGUAGES = 'languages'; 
  public static $PLUGIN_COOKIES = 'cookies'; 
  public static $PLUGIN_SORT = 'sort'; 
  public static $PLUGIN_DND = 'dnd'; 
  public static $PLUGIN_CHECKBOX = 'checkbox'; 
  public static $PLUGIN_SEARCH = 'search'; 
  public static $PLUGIN_CONTEXTMENU = 'contextmenu'; 
  public static $PLUGIN_THEMEROLLER = 'themeroller'; 
  public static $PLUGIN_UNIQUE = 'unique';
  
  private $core;
  private $html_data;
  private $json_data;
  private $xml_data;
  private $themes;
  private $ui;
  private $crrm;
  private $hotkeys;
  private $languages;
  private $cookies;
  private $sort;
  private $dnd;
  private $checkbox;
  private $search;
  private $contextmenu;
  private $types;
  private $themeroller;
  private $unique;
  private $plugins;
  
  private $nodes;
  private $deletedPlugins;
  
  /**
   *
   * @param string $id
   * @param YsTreeNode $nodes
   */
  public function __construct($id, YsTreeNode $nodes = null) {
    parent::__construct($id);
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQTREE);
    $this->setJQueryObject(YsJQTree::build());
    if($nodes !== null){
      $nodes->setPrefixId($this->getId());
      $this->setNodes($nodes);
      $this->setInitiallyOpenNodes($nodes->getInitiallyOpenNodes());
      $this->setInitiallyLoadNodes($nodes->getInitiallyLoadNodes());
      $this->setSelectedNodes($nodes->getSelectedNodes());
    }else{
      $this->setNodes(new YsTreeNode($id));
    }
    $this->addPlugin(self::$PLUGIN_THEMES,self::$PLUGIN_HTML_DATA, self::$PLUGIN_UI);
  }
  
  public function varsToUnset() {
    return array_merge(array('nodes','deletedPlugins'), parent::varsToUnset());
  }
  
  public function beforeBuild(){
    $this->deleteCorePlugins();
  }

  public function noPrependId(){
    $this->getNodes()->setPrefixId(null);
  }
  
  // INIT CORE 
  
  public function getCorePropertie($propertieName){
    if(isset($this->core[$propertieName])){
      return $this->core[$propertieName];
    }else{
      return null;
    }
  }
  
  public function setInitiallyOpenNodes($nodesName){
    if($nodesName != null || (is_array($nodesName) && sizeof($nodesName) > 0)){
      if(is_array($nodesName)){
        $this->core[self::$INITIALLY_OPEN] = $nodesName;
      }else{
        $this->core[self::$INITIALLY_OPEN] = array($nodesName);
      }
    }
  }
  
  public function setInitiallyLoadNodes($nodesName){
    if($nodesName != null || (is_array($nodesName) && sizeof($nodesName) > 0)){
      if(is_array($nodesName)){
        $this->core[self::$INITIALLY_LOAD] = $nodesName;
      }else{
        $this->core[self::$INITIALLY_LOAD] = array($nodesName);
      }
    }
  }
  
  public function setLoadingLabel($label){
    $this->core[self::$STRINGS]['loading'] = $value;
  }
  
  public function setNewNodeLabel($label){
    $this->core[self::$STRINGS]['new_node'] = $value;
  }
  
  public function setMultipleSelectionLabel($label){
    $this->core[self::$STRINGS]['multiple_selection'] = $value;
  }
    
  public function getInitiallyOpenNodes(){
    return $this->getCorePropertie(self::$INITIALLY_OPEN);
  }

  public function getInitiallyLoadNodes(){
    return $this->getCorePropertie(self::$INITIALLY_LOAD);
  }
  
  public function setHtmlTitles($value){
    $this->core[self::$HTML_TITLES] = $value;
  }
  
  public function setAnimationDelay($delay){
    $this->core[self::$ANIMATION] = $delay;
  }
  
  public function setRTL($value){
    $this->core[self::$RTL] = $value;
  }
  
  public function setLoadOpen($boolean){
    $this->core[self::$LOAD_OPEN] = $boolean;
  }
  
  public function getLoadOpen(){
    return $this->getCorePropertie(self::$LOAD_OPEN);
  }
  
  public function setOpenParents($boolean){
    $this->core[self::$OPEN_PARENTS] = $boolean;
  }
  
  public function getOpenParents(){
    return $this->getCorePropertie(self::$OPEN_PARENTS);
  }
  
  public function setNotifyPlugins($boolean){
    $this->core[self::$NOTIFY_PLUGINS] = $boolean;
  }
  
  public function getNotifyPlugins(){
    return $this->getCorePropertie(self::$NOTIFY_PLUGINS);
  }
  
  public function setRTLSupport($value){
    $this->setRTL($value);
    $this->initWithDefaultRTLTheme($value);
  }
  
  public function getHtmlTitles($value){
    return $this->getCorePropertie(self::$HTML_TITLES);
  }
  
  public function getAnimationDelay($delay){
    return $this->getCorePropertie(self::$ANIMATION);
  }
  
  public function getRTLSupport($value){
    return $this->getCorePropertie(self::$RTL);
  }
  
  public function setStrings($value){
    $this->core[self::$STRINGS] = $value;
  }
  
  public function getStrings(){
    return $this->getCorePropertie(self::$STRINGS);
  }
  
  // END CORE
  
  // INIT THEMES 
  
  public function getThemesPropertie($propertieName){
    if(isset($this->themes[$propertieName])){
      return $this->themes[$propertieName];
    }else{
      return null;
    }
  }
  
  public function setTheme($theme){
    $this->themes[self::$THEME] = $theme;
  }
  
  public function initWithAppleTheme(){
    $this->setTheme(self::$THEME_APPLE);
  }
  
  public function initWithClassicTheme(){
    $this->setTheme(self::$THEME_CLASSIC);
  }
  
  public function initWithDefaultTheme(){
    $this->setTheme(self::$THEME_DEFAULT);
  }
  
  public function initWithDefaultRTLTheme(){
    $this->setTheme(self::$THEME_DEFAULT_RTL);
  }
  
  public function getTheme(){
    return $this->getThemesPropertie(self::$THEME);
  }
  
  public function initWithDots($boolean){
    $this->themes[self::$DOTS] = $boolean;
  }
  
  public function getInitWithDots(){
    return $this->getThemesPropertie(self::$DOTS);
  }
  
  public function initWithIcons($boolean){
    $this->themes[self::$THEMES_ICONS] = $boolean;
  }
  
  public function getInitWithIcons(){
    return $this->getThemesPropertie(self::$THEMES_ICONS);
  }
  
  public function setThemeLocation($url){
    $this->themes[self::$THEME_URL] = $url;
  }
  
  public function getThemeLocation(){
    return $this->getThemesPropertie(self::$THEME_URL);
  }
  // END THEMES 
  
  // INIT UI
  
  public function getUIPropertie($propertieName){
    if(isset($this->ui[$propertieName])){
      return $this->ui[$propertieName];
    }else{
      return null;
    }
  }
  
  public function setSelectedNodes($nodesName){
    if($nodesName != null || (is_array($nodesName) && sizeof($nodesName) > 0)){
      if(is_array($nodesName)){
        $this->ui[self::$INITIALLY_SELECT] = $nodesName;
      }else{
        $this->ui[self::$INITIALLY_SELECT] = array($nodesName);
      }
    }
  }
  
  public function getSelectedNodes(){
    return $this->getUIPropertie(self::$INITIALLY_SELECT);
  }
  
  public function setSelectionLimit($limit){
    $this->ui[self::$SELECT_LIMIT] = $limit;
  }
  
  public function setUnlimitedSelection(){
    $this->setSelectionLimit(-1);
  }
  
  public function getSelectionLimit(){
    return $this->getUIPropertie(self::$SELECT_LIMIT);
  }
  
  public function setMultipleSelectionKey($key){
    $this->ui[self::$SELECT_MULTIPLE_MODIFIER] = $key;
  }
  
  public function getMultipleSelectionKey(){
    return $this->getUIPropertie(self::$SELECT_MULTIPLE_MODIFIER);
  }
  
  public function setSelectedParentClose($value){
    $this->ui[self::$SELECTED_PARENT_CLOSE] = $value;
  }
  
  public function getSelectedParentClose(){
    return $this->getUIPropertie(self::$SELECTED_PARENT_CLOSE);
  }
  
  public function setSelectedPreviousOnDelete($boolean){
    $this->ui[self::$SELECT_PREV_ON_DELETE] = $boolean;
  }
  
  public function getSelectedPreviousOnDelete(){
    return $this->getUIPropertie(self::$SELECT_PREV_ON_DELETE);
  }
  
  public function disableSelectionChildren($boolean){
    $this->ui[self::$DISABLE_SELECTING_CHILDREN] = $boolean;
  }
  
  public function getDisableSelectionChildren(){
    return $this->getUIPropertie(self::$DISABLE_SELECTING_CHILDREN);
  }
  
  // END UI
  
  // INIT hotkeys
  
  public function enableHotkeysNavigation(){
    $this->addPlugin(self::$PLUGIN_CRRM,self::$PLUGIN_HOTKEYS);
  }
  
  // END hotkeys
  
  // INIT pugin 
  public function addPlugin($plugins){
    $plugins = func_get_args();
    if(isset($this->plugins) && is_array($this->plugins)){
      $this->plugins = array_merge($this->plugins,$plugins);
    }else{
      $this->plugins = $plugins;
    }
  }
  
  public function getDeletedPlugins() {
    return $this->deletedPlugins;
  }

  public function setDeletedPlugins($deletedPlugins) {
    $this->deletedPlugins = $deletedPlugins;
  }
  
  public function deletePlugin($deletedPlugins) {
    if(is_array($this->deletedPlugins)){
      $this->deletedPlugins = array_merge($this->deletedPlugins, array($deletedPlugins));
    }else{
      $this->deletedPlugins = array($deletedPlugins);
    }
  }
  
  private function deleteCorePlugins(){
    if(is_array($this->plugins) && is_array($this->deletedPlugins)){
      $this->plugins = array_merge(array_unique(array_diff($this->plugins, $this->deletedPlugins)));
    }
    if(!in_array(self::$PLUGIN_HTML_DATA, $this->plugins)){
      if(in_array(self::$PLUGIN_JSON_DATA, $this->plugins)){
        $this->HTMLDataToJSONData();
      }else{
        $this->HTMLDataToXMLData();
      }
    }
  }
  
  private function HTMLDataToXMLData(){
    $this->xml_data = (is_array($this->xml_data)) ? array_merge($this->xml_data,$this->html_data) : $this->html_data;
    unset($this->html_data);
  }
  
  private function HTMLDataToJSONData(){
    $this->json_data = (is_array($this->json_data)) ? array_merge($this->json_data,$this->html_data) : $this->html_data;
    unset($this->html_data);
  }
  
  // END plugin
  
  
  // INIT sort
  
  public function sortable(){
    $this->addPlugin(self::$PLUGIN_CRRM,self::$PLUGIN_SORT);
  }
  
  // END sort
  
  // INIT checkbox
  
  public function enableCheckboxes(){
    $this->addPlugin(self::$PLUGIN_CHECKBOX);
    $this->conditionNOT(YsJQuery::hasClass('jstree')->in($this->getJQuerySelector()));
  }
  
  // END checkbox
  
  // INIT themeroller
  
  public function enableThemeroller(){
    $this->addPlugin(self::$PLUGIN_THEMEROLLER);
    $this->deletePlugin(self::$PLUGIN_THEMES);
    $this->setThemerolleDefaultState('');
    $this->setThemerolleActiveState(YsUIConstant::HIGHLIGHT_STATE);
    $this->setThemerolleHoverState(YsUIConstant::ACTIVE_STATE);
  }
  
  public function getThemerollerPropertie($propertieName){
    if(isset($this->themeroller[$propertieName])){
      return $this->themeroller[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getThemerolleOpenNodesIcon(){
    return $this->getThemerollerPropertie(self::$THEMEROLLER_OPENED);
  }

  public function setThemerolleOpenNodesIcon($icon){
    $this->themeroller[self::$THEMEROLLER_OPENED] = $icon;
  }
  
  public function getThemerolleCloseNodesIcon(){
    return $this->getThemerollerPropertie(self::$THEMEROLLER_CLOSED);
  }
  
  public function setThemerolleCloseNodesIcon($icon){
    $this->themeroller[self::$THEMEROLLER_CLOSED] = $icon;
  }
  
  public function getThemerolleDefaultState(){
    return $this->getThemerollerPropertie(self::$THEMEROLLER_ITEM_DEFAULT);
  }
  
  public function setThemerolleDefaultState($state){
    $this->themeroller[self::$THEMEROLLER_ITEM_DEFAULT] = $state;
  }
  
  public function getThemerolleHoverState(){
    return $this->getThemerollerPropertie(self::$THEMEROLLER_ITEM_HOVER);
  }
  
  public function setThemerolleHoverState($state){
    $this->themeroller[self::$THEMEROLLER_ITEM_HOVER] = $state;
  }
  
  public function getThemerolleActiveState(){
    return $this->getThemerollerPropertie(self::$THEMEROLLER_ITEM_ACTIVE);
  }
  
  public function setThemerolleActiveState($state){
    $this->themeroller[self::$THEMEROLLER_ITEM_ACTIVE] = $state;
  }
  
  public function getThemerolleDefaultIcon(){
    return $this->getThemerollerPropertie(self::$THEMEROLLER_ITEM_ICON);
  }
  
  public function setThemerolleDefaultIcon(){
    $this->themeroller[self::$THEMEROLLER_ITEM_ICON] = $icon;
  }
  
  // END themeroller
  
  // INIT languages
  
  public function enableL10N($languages = null){
    $languages = func_get_args();
    $this->addPlugin(self::$PLUGIN_LANGUAGES);
    $this->setLanguages($languages);
  }
    
  // END languages
  
  // INIT search
  
  public function enableSearch(){
    $this->addPlugin(self::$PLUGIN_SEARCH);
  }
  
  public function getSearchPropertie($propertieName){
    if(isset($this->search[$propertieName])){
      return $this->search[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getCaseInsensitive(){
    $this->getSearchPropertie(self::$SEARCH_CASE_INSENSITIVE);
  }
  
  public function setCaseInsensitive($boolean){
    $this->search[self::$SEARCH_CASE_INSENSITIVE] = $boolean;
  }
  
  public function getSearchURL(){
    $this->getSearchPropertie(self::$SEARCH_AJAX);
  }
  
  public function setSearchURL($url){
    $this->search[self::$SEARCH_AJAX] = $url;
  }
  
  // END search
  
  // INIT CRRM
  
  public function enableCRRM(){
    $this->addPlugin(self::$PLUGIN_CRRM);
  }
  
  public function getCRRMPropertie($propertieName){
    if(isset($this->crrm[$propertieName])){
      return $this->crrm[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getInputWidthLimit(){
    $this->getCRRMPropertie(self::$CRRM_INPUT_WIDTH_LIMIT);
  }
  
  public function setInputWidthLimit($value){
    $this->search[self::$CRRM_INPUT_WIDTH_LIMIT] = $value;
  }
  
  public function getMove(){
    $this->getCRRMPropertie(self::$CRRM_MOVE);
  }
  
  public function setMove($value){
    $this->search[self::$CRRM_MOVE] = $value;
  }
  
  public function setCheckMove($value){
    $this->search[self::$CRRM_MOVE][self::$METHOD_CHECK_MOVE] = $value;
  }
  
  public function setMoveDefaultPosition($value){
    $this->search[self::$CRRM_MOVE][self::$CRRM_MOVE_DEFAULT_POSITION] = $value;
  }
  
  public function setOpenOnMove($value){
    $this->search[self::$CRRM_MOVE][self::$CRRM_MOVE_OPEN_ONMOVE] = $value;
  }
  
  public function setAlwaysCopy($value){
    $this->search[self::$CRRM_MOVE][self::$CRRM_MOVE_ALWAYS_COPY] = $value;
  }
  
  // END CRRM
  
  // INIT cookies
  
  public function enableCookies(){
    $this->addPlugin(self::$PLUGIN_COOKIES);
  }
  
  public function getCookiesPropertie($propertieName){
    if(isset($this->cookies[$propertieName])){
      return $this->cookies[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getSaveOpened(){
    $this->getCookiesPropertie(self::$COOKIES_SAVE_OPENED);
  }
  
  public function setSaveOpened($value){
    $this->cookies[self::$COOKIES_SAVE_OPENED] = $value;
  }
  
  public function getSaveSelected(){
    $this->getCookiesPropertie(self::$COOKIES_SAVE_SELECTED);
  }
  
  public function setSaveSelected($value){
    $this->cookies[self::$COOKIES_SAVE_SELECTED] = $value;
  }
  
  public function getAutoSave(){
    $this->getCookiesPropertie(self::$COOKIES_AUTO_SAVE);
  }
  
  public function setAutoSave($boolean){
    $this->cookies[self::$COOKIES_AUTO_SAVE] = $value;
  }
  
  public function getCookieOptions(){
    $this->getCookiesPropertie(self::$COOKIES_OPTIONS);
  }
  
  public function setCookieOptions($value){
    $this->cookies[self::$COOKIES_OPTIONS] = $value;
  }
  
  // END cookies
  
  // INIT dragNdrop
  
  public function enableDragAndDrop(){
    $this->addPlugin(self::$PLUGIN_DND);
  }
  
  public function getDragAndDropPropertie($propertieName){
    if(isset($this->dnd[$propertieName])){
      return $this->dnd[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getCopyModifier(){
    $this->getDragAndDropPropertie(self::$DND_COPY_MODIFIER);
  }
  
  public function setcCopyModifier($value){
    $this->dnd[self::$DND_COPY_MODIFIER] = $value;
  }
  
  public function getCheckTimeout(){
    $this->getDragAndDropPropertie(self::$DND_CHECK_TIMEOUT);
  }
  
  public function setCheckTimeout($value){
    $this->dnd[self::$DND_CHECK_TIMEOUT] = $value;
  }
  
  public function getOpenTimeout(){
    $this->getDragAndDropPropertie(self::$DND_OPEN_TIMEOUT);
  }
  
  public function setOpenTimeout($value){
    $this->dnd[self::$DND_OPEN_TIMEOUT] = $value;
  }
  
  public function getDropTarget(){
    $this->getDragAndDropPropertie(self::$DND_DROP_TARGET);
  }
  
  public function setDropTarget($value){
    $this->dnd[self::$DND_DROP_TARGET] = $value;
  }
  
  public function getDropCheck(){
    $this->getDragAndDropPropertie(self::$DND_DROP_CHECK);
  }
  
  public function setDropCheck($value){
    $this->dnd[self::$DND_DROP_CHECK] = $value;
  }
  
  public function getDropFinish(){
    $this->getDragAndDropPropertie(self::$DND_DROP_FINISH);
  }
  
  public function setDropFinish($value){
    $this->dnd[self::$DND_DROP_FINISH] = $value;
  }
  
  public function getDragTarget(){
    $this->getDragAndDropPropertie(self::$DND_DRAG_TARGET);
  }
  
  public function setDragTarget($value){
    $this->dnd[self::$DND_DRAG_TARGET] = $value;
  }
  
  public function getDragCheck(){
    $this->getDragAndDropPropertie(self::$DND_DRAG_CHECK);
  }
  
  public function setDragCheck($value){
    $this->dnd[self::$DND_DRAG_CHECK] = $value;
  }
  
  public function getDragFinish(){
    $this->getDragAndDropPropertie(self::$DND_DRAG_FINISH);
  }
  
  public function setDragFinish($value){
    $this->dnd[self::$DND_DRAG_FINISH] = $value;
  }

  // END dragNdrop
  
  // INIT unique
  
  public function enableUnique(){
    $this->addPlugin(self::$PLUGIN_UNIQUE);
  }
  
  // END unique
  
  // INIT contextmenu
  
  public function enableContextMenu(){
    $this->addPlugin(self::$PLUGIN_CRRM, self::$PLUGIN_CONTEXTMENU);
  }
  
  public function getContextMenuPropertie($propertieName){
    if(isset($this->contextmenu[$propertieName])){
      return $this->contextmenu[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getContextMenuShowAtNode(){
    $this->getContextMenuPropertie(self::$CONTEXTMENU_SHOW_AT_NODE);
  }
  
  public function setContextMenuShowAtNode($value){
    $this->contextmenu[self::$CONTEXTMENU_SHOW_AT_NODE] = $value;
  }
  
  public function getContextMenuSelectNode(){
    $this->getContextMenuPropertie(self::$CONTEXTMENU_SELECT_NODE);
  }
  
  public function setContextMenuSelectNode($value){
    $this->contextmenu[self::$CONTEXTMENU_SELECT_NODE] = $value;
  }
  
  public function getContextMenuItems(){
    $this->getContextMenuPropertie(self::$CONTEXTMENU_ITEMS);
  }
  
  public function setContextMenuItems($value){
    $this->contextmenu[self::$CONTEXTMENU_ITEMS] = $value;
  }
  
  // END contextmenu
  
  // INIT types
  
  public function enableTypes(){
    $this->addPlugin(self::$PLUGIN_TYPES);
  }
  
  public function getTypesPropertie($propertieName){
    if(isset($this->types[$propertieName])){
      return $this->types[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getKindsOfTypes(){
    $this->getContextMenuPropertie(self::$TYPES);
  }
  
  public function setKindsOfTypes($value){
    $this->types[self::$TYPES] = $value;
  }
  
  public function getMaxChildren(){
    $this->getContextMenuPropertie(self::$TYPES_MAX_CHILDREN);
  }
  
  public function setMaxChildren($value){
    $this->types[self::$TYPES_MAX_CHILDREN] = $value;
  }
  
  public function getMaxDepth(){
    $this->getContextMenuPropertie(self::$TYPES_MAX_DEPTH);
  }
  
  public function setMaxDepth($value){
    $this->types[self::$TYPES_MAX_DEPTH] = $value;
  }
  
  public function getValidChildren(){
    $this->getContextMenuPropertie(self::$TYPES_VALID_CHILDREN);
  }
  
  public function setValidChildren($value){
    $this->types[self::$TYPES_VALID_CHILDREN] = $value;
  }
  
  public function getUseData(){
    $this->getContextMenuPropertie(self::$TYPES_USE_DATA);
  }
  
  public function setUseData($value){
    $this->types[self::$TYPES_USE_DATA] = $value;
  }
  
  public function getTypeAttributes(){
    $this->getContextMenuPropertie(self::$TYPES_TYPE_ATTR);
  }
  
  public function setTypeAttributes($value){
    $this->types[self::$TYPES_TYPE_ATTR] = $value;
  }
  
  // END types
  
  // INIT ajax_common
  public function setURL($url){
    $this->html_data[self::$AJAX][self::$AJAX_URL] = $url;
  }
    
  public function setData($data){
    $this->html_data[self::$AJAX][self::$AJAX_DATA] = $data;
  }
  
  public function setSuccessCallback($callback){
    $this->html_data[self::$AJAX][self::$AJAX_SUCCESS] = $callback;
  }
  
  public function setErrorCallback($callback){
    $this->html_data[self::$AJAX][self::$AJAX_ERROR] = $callback;
  }
  // END ajax_common
    
  // INIT html_data

  public function enableHTMLData(){
    $this->addPlugin(self::$PLUGIN_HTML_DATA);
  }
  
  public function getHTMLDataPropertie($propertieName){
    if(isset($this->html_data[$propertieName])){
      return $this->html_data[$propertieName];
    }else{
      return null;
    }
  }

  public function getHTML(){
    $this->getHTMLDataPropertie(self::$AJAX_DATA);
  }
  
  public function setHTML($value){
    $this->html_data[self::$AJAX_DATA] = $value;
  }
  
  public function getHTMLDataAJAX(){
    $this->getHTMLDataPropertie(self::$AJAX);
  }
  
  public function setHTMLDataAJAX($value){
    $this->html_data[self::$AJAX] = $value;
  }
  
  public function getHTMLDataCorrectState(){
    $this->getHTMLDataPropertie(self::$AJAX_CORRECT_STATE);
  }
  
  public function setHTMLDataCorrectState($value){
    $this->html_data[self::$AJAX_CORRECT_STATE] = $value;
  }
  
  // END html_data
  
  // INIT json_data
  
  public function enableJSONData(){
    $this->addPlugin(self::$PLUGIN_JSON_DATA);
    $this->deletePlugin(self::$PLUGIN_HTML_DATA);
  }
  
  public function getJSONDataPropertie($propertieName){
    if(isset($this->json_data[$propertieName])){
      return $this->json_data[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getJSON(){
    $this->getJSONDataPropertie(self::$AJAX_DATA);
  }
  
  public function setJSON($value){
    $this->json_data[self::$AJAX_DATA] = $value;
  }
  
  public function getJSONDataAJAX(){
    $this->getJSONDataPropertie(self::$AJAX);
  }
  
  public function setJSONDataAJAX($value){
    $this->json_data[self::$AJAX] = $value;
  }
  
  public function getJSONDataCorrectState(){
    $this->getJSONDataPropertie(self::$AJAX_CORRECT_STATE);
  }
  
  public function setJSONDataCorrectState($value){
    $this->json_data[self::$AJAX_CORRECT_STATE] = $value;
  }
  
  public function getJSONProgresiveRender(){
    $this->getJSONDataPropertie(self::$JSON_PROGRESIVE_RENDER);
  }
  
  public function setJSONProgresiveRender($value){
    $this->json_data[self::$JSON_PROGRESIVE_RENDER] = $value;
  }
  
  public function getJSONProgresiveUnload(){
    $this->getJSONDataPropertie(self::$JSON_PROGRESIVE_UNLOAD);
  }
  
  public function setJSONProgresiveUnload($value){
    $this->json_data[self::$JSON_PROGRESIVE_UNLOAD] = $value;
  }
  
  // END json_data
  
  // INIT xml_data
  
  public function enableXMLData(){
    $this->addPlugin(self::$PLUGIN_XML_DATA);
    $this->deletePlugin(self::$PLUGIN_HTML_DATA);
  }
  
  public function getXMLDataPropertie($propertieName){
    if(isset($this->xml_data[$propertieName])){
      return $this->xml_data[$propertieName];
    }else{
      return null;
    }
  }
  
  public function getXML(){
    $this->getJSONDataPropertie(self::$AJAX_DATA);
  }
  
  public function setXML($value){
    $this->xml_data[self::$AJAX_DATA] = $value;
  }
  
  public function getXMLDataAJAX(){
    $this->getJSONDataPropertie(self::$AJAX);
  }
  
  public function setXMLDataAJAX($value){
    $this->xml_data[self::$AJAX] = $value;
  }
  
  public function getXMLDataCorrectState(){
    $this->getJSONDataPropertie(self::$AJAX_CORRECT_STATE);
  }
  
  public function setXMLDataCorrectState($value){
    $this->xml_data[self::$AJAX_CORRECT_STATE] = $value;
  }
  
  public function getXMLCleanNode(){
    $this->getJSONDataPropertie(self::$XML_CLEAN_NODE);
  }
  
  public function setXMLCleanNode($value){
    $this->xml_data[self::$XML_CLEAN_NODE] = $value;
  }
  
  public function getXSL(){
    $this->getJSONDataPropertie(self::$XML_XSL);
  }
  
  public function setXSL($value){
    $this->xml_data[self::$XML_XSL] = $value;
  }
  
  
  public function getXMLGetSkipEmpty(){
    $this->getJSONDataPropertie(self::$XML_GET_SKIP_EMPTY);
  }
  
  public function setXMLGetSkipEmpty($value){
    $this->xml_data[self::$XML_GET_SKIP_EMPTY] = $value;
  }
  
  // END xml_data
  
  // INIT METHODS
  
  public function parseXML($data){
    return $this->doMethod(self::$METHOD__PARSE_JSON, $data);
  }
  
  public function retrieveXML($type=null, $node=null, $li=null, $a=null, $isCallback=null){
    return $this->doMethodInNode(self::$METHOD_GET_XML,$type,$node,$li,$a,$isCallback);
  }
  
  public function parseJSON($data = null,$node = null,$isCallback = null){
    return $this->doMethodInNode(self::$METHOD_PARSE_XML, $data, $node, $isCallback);
  }
  
  public function retrieveJSON($node = null,$li = null,$a = null){
    return $this->doMethodInNode(self::$METHOD_GET_JSON, $node, $li, $a);
  }
  
  public function reloadTree($successCallback = null,$errorCallback = null){
    return $this->loadAjaxNode(null, $successCallback, $errorCallback);
  }
  
  public function loadAjaxNode($node = null,$successCallback = null,$errorCallback = null){
    if(isset($this->html_data)){
      return $this->loadNodeHTML($node,$successCallback,$errorCallback);
    }elseif(isset($this->json_data)){
      return $this->loadNodeJSON($node,$successCallback,$errorCallback);
    }else{
      return $this->loadNodeXML($node,$successCallback,$errorCallback);
    }
  }
  
  public function loadNodeHTML($node = null,$successCallback = null ,$errorCallback = null){
    return $this->doMethodInNode(self::$METHOD_LOAD_NODE_HTML, $node, $successCallback,$errorCallback);
  }
  
  public function loadNodeJSON($node = null,$successCallback = null ,$errorCallback = null){
    return $this->doMethodInNode(self::$METHOD_LOAD_NODE_JSON, $node, $successCallback, $errorCallback);
  }
  
  public function loadNodeXML($node = null,$successCallback = null ,$errorCallback = null){
    return $this->doMethodInNode(self::$METHOD_LOAD_NODE_XML, $node, $successCallback, $errorCallback);
  }
  
  public function showContextMenu($node, $x = null, $y = null){
    return $this->doMethodInNode(self::$METHOD_SHOW_CONTEXTMENU, $node,$x,$y);
  }
  
  public function remove($node = null){
    return $this->doMethodInNode(self::$METHOD_REMOVE, $node);
  }
  
  public function checkMove($node = null){
    return $this->doMethodInNode(self::$METHOD_CHECK_MOVE, $node);
  }
  
  public function moveNode($nodeFrom = null, $nodeTo = null){
    return $this->doMethodInNode(self::$METHOD_MOVE_NODE, $nodeFrom, $nodeTo);
  }
  
  public function cut($node = null){
    return $this->doMethodInNode(self::$METHOD_CUT, $node);
  }
  
  public function copy($node = null){
    return $this->doMethodInNode(self::$METHOD_COPY, $node);
  }
  
  public function create($node = null, $position=null , $js=null , $callback=null){
    return $this->doMethodInNode(self::$METHOD_CREATE,$node,$position,$js,$callback);
  }
  
  public function paste($node = null){
    return $this->doMethodInNode(self::$METHOD_PASTE, $node);
  }
  
  public function search($value, $skipAsync = null){
    return $this->doMethod(self::$METHOD_SEARCH,$value,$skipAsync);
  }
  
  public function clearSearch(){
    return $this->doMethod(self::$METHOD_CLEAR_SEARCH);
  }
  
  public function changeLang($lang){
    return $this->setLang($lang);
  }
  
  public function setLang($lang){
    return $this->doMethod(self::$METHOD_SET_LANG,$lang);
  }
  
  public function getLang(){
    return $this->doMethod(self::$METHOD_GET_LANG);
  }
  
  public function setText($lang){
    return $this->doMethod(self::$METHOD_SET_TEXT,$lang);
  }
  
  public function getText(){
    return $this->doMethod(self::$METHOD_GET_TEXT);
  }
  
  public function createNode($node = null, $position=null , $js=null , $callback=null){
    return $this->doMethodInNode(self::$METHOD_CREATE_NODE,$node,$position,$js,$callback);
  }
  
  public function checkAll(){
    return $this->doMethod(self::$METHOD_CHECK_ALL);
  }

  public function uncheckAll(){
    return $this->doMethod(self::$METHOD_UNCHECK_ALL);
  }
  
  public function checkNode($node){
    return $this->doMethodInNode(self::$METHOD_CHECK_NODE, $node);
  }
  
  public function uncheckNode($node){
    return $this->doMethodInNode(self::$METHOD_UNCHECK_NODE, $node);
  }
  
  public function isChecked($node){
    return $this->doMethodInNode(self::$METHOD_IS_CHECKED, $node);
  }
  
  public function getChecked($context = null){
    return $this->doMethod(self::$METHOD_GET_CHECKED, $context);
  }
  
  public function getUnchecked($context = null){
    return $this->doMethod(self::$METHOD_GET_UNCHECKED, $context);
  }
  
  public function showCheckboxes(){
    return $this->doMethod(self::$METHOD_SHOW_CHECKBOXES);
  }
  
  public function rename($node = null){
    return $this->doMethodInNode(self::$METHOD_RENAME, $node);
  }
  
  public function renameNode($node = null, $newValue = null, $lang = null){
    $node = ($node instanceof YsTreeNode) ? $node->getListJQuerySelector() : $node;
    return $this->doMethodInNode(self::$METHOD_RENAME_NODE, $node, $newValue, $lang);
  }
  
  public function sort($node = null){
    return $this->doMethodInNode(self::$METHOD_SORT, $node);
  }
  
  public function enableHotkeys(){
    return $this->doMethod(self::$METHOD_ENABLE_HOTKEYS);
  }
  
  public function disableHotkeys(){
    return $this->doMethod(self::$METHOD_DISABLE_HOTKEYS);
  }
  
  public function doMethodInNode($methodName,$arg0,$arg1 = null, $arg2 = null,$arg3 = null, $arg4 = null){
    $arg0 = ($arg0 instanceof YsTreeNode) ? $arg0->getJQuerySelector() : $arg0;
    $arg1 = ($arg1 instanceof YsTreeNode) ? $arg1->getJQuerySelector() : $arg1;
    $arg2 = ($arg2 instanceof YsTreeNode) ? $arg2->getJQuerySelector() : $arg2;
    return $this->doMethod($methodName, $arg0, $arg1, $arg2, $arg3, $arg4);
  }
  
  public function toggleNode($node){
    return $this->doMethodInNode(self::$METHOD_TOGGLE_NODE, $node);
  }
  
  public function hoverNode($node){
    return $this->doMethodInNode(self::$METHOD_HOVER_NODE, $node);
  }
  
  public function dehoverNode(){
    return $this->doMethod(self::$METHOD_DEHOVER_NODE);
  }
  
  public function saveSelected(){
    return $this->doMethod(self::$METHOD_SAVE_SELECTED);
  }
  
  public function selectNode($node,$check = null,$event = null){
    $nodeName = ($node instanceof YsTreeNode) ? $node->getJQuerySelector() : $node;
    return $this->doMethod(self::$METHOD_SELECT_NODE,$nodeName,$check,$event);
  }
  
  public function deselectNode($node){
    return $this->doMethodInNode(self::$METHOD_DESELECT_NODE,$node);
  }
  
  public function toggleSelected($node = null){
    return $this->doMethodInNode(self::$METHOD_TOGGLE_SELECT,$node);
  }
  
  public function deselectAll($context = null){
    return $this->doMethod(self::$METHOD_DESELECT_ALL,$context);
  }
  
  public function selectAll($check = null,$event = null){
    return $this->deselectAll() . YsJsSintax::SEPARATOR . $this->selectNode('*', $check, $event);
  }
  
  public function getSelected($context = null){
    return $this->doMethod(self::$METHOD_GET_SELECTED,$context);
  }
  
  public function isSelected($node){
    return $this->doMethodInNode(self::$METHOD_HOVER_NODE, $node);
  }
  
  public function reselect(){
    return $this->doMethod(self::$METHOD_RESELECT);
  }
  
  public function refresh($node){
    return $this->doMethodInNode(self::$METHOD_REFRESH,$node);
  }
  
  public function showIcons(){
    return $this->doMethod(self::$METHOD_SHOW_ICONS);
  }
  
  public function hideIcons(){
    return $this->doMethod(self::$METHOD_HIDE_ICONS);
  }
  
  public function toggleIcons(){
    return $this->doMethod(self::$METHOD_TOGGLE_ICONS);
  }
  
  public function toggleDots(){
    return $this->doMethod(self::$METHOD_TOGGLE_DOTS);
  }
  
  public function showDots(){
    return $this->doMethod(self::$METHOD_SHOW_DOTS);
  }
  
  public function hideDots(){
    return $this->doMethod(self::$METHOD_HIDE_DOTS);
  }
  
  public function changeTheme($themeName, $url = null){
    if($url != null){
      return $this->doMethod(self::$METHOD_SET_THEME, $themeName, $url);
    }else{
      return $this->doMethod(self::$METHOD_SET_THEME, $themeName);
    }
  }
  
  public function changeToDefaultTheme($url = null){
    return $this->changeTheme(self::$THEME_DEFAULT, $url);
  }
  
  public function changeToClassicTheme($url = null){
    return $this->changeTheme(self::$THEME_CLASSIC, $url);
  }
  
  public function changeToDefaultRTLTheme($url = null){
    return $this->changeTheme(self::$THEME_DEFAULT_RTL, $url);
  }
  
  public function changeToAppleTheme($url = null){
    return $this->changeTheme(self::$THEME_APPLE, $url);
  }
  
  public function getIndex(){
    return $this->doMethod(self::$METHOD_GET_INDEX);
  }
  
  public function getContainer(){
    return $this->doMethod(self::$METHOD_GET_CONTAINER);
  }
  
  public function getContainerUL(){
    return $this->doMethod(self::$METHOD_GET_CONTAINER_UL);
  }
  
  public function initTree(){
    return $this->doMethod(self::$METHOD_INIT);
  }
  
  public function destroyTree(){
    return $this->doMethod(self::$METHOD_DESTROY);
  }
  
  public function loaded(){
    return $this->doMethod(self::$METHOD_LOADED);
  }
 
  public function setFocus(){
    return $this->doMethod(self::$METHOD_SET_FOCUS);
  }
  
  public function unsetFocus(){
    return $this->doMethod(self::$METHOD_UNSET_FOCUS);
  }
  
  public function isFocused(){
    return $this->doMethod(self::$METHOD_IS_FOCUSED);
  }
  
  public function lock(){
    return $this->doMethod(self::$METHOD_LOCK);
  }
  
  public function unlock(){
    return $this->doMethod(self::$METHOD_UNLOCK);
  }
  
  public function isLocked(){
    return $this->doMethod(self::$METHOD_IS_LOCKED);
  }
  
  public function _getNode($node = null){
    return $this->doMethodInNode(self::$METHOD__GET_NODE,$node);
  }
  
  public function _getNext($node = null,$strict= null){
    return $this->doMethodInNode(self::$METHOD__GET_NEXT, $node, $strict);
  }
  
  public function _getPrev($node = null,$strict= null){
    return $this->doMethodInNode(self::$METHOD__GET_PREV, $node, $strict);
  }
  
  public function _getParent($node = null){
    return $this->doMethodInNode(self::$METHOD__GET_PARENT, $node);
  }
  
  public function _getChildren($node = null){
    return $this->doMethodInNode(self::$METHOD__GET_CHILDREN, $node);
  }
  
  public function getPath($node = null,$idMode= null){
    return $this->doMethodInNode(self::$METHOD_GET_PATH, $node, $idMode);
  }
  
  public function openNode($node=null,$callback=null,$skipAnimation=null){
    return $this->doMethodInNode(self::$METHOD_OPEN_NODE,$node,$callback,$skipAnimation);
  }
  
  public function afterOpenNode($node=null){
    return $this->doMethodInNode(self::$METHOD_AFTER_OPEN,$node);
  }
  
  public function closeNode($node=null,$skipAnimation=null){
    return $this->doMethodInNode(self::$METHOD_CLOSE_NODE,$node,$skipAnimation);
  }
  
  public function afterCloseNode($node=null){
    return $this->doMethodInNode(self::$METHOD_AFTER_CLOSE,$node);
  }
  
  public function openAll($node = null ,$doAnimation = null, $originalObj = null){
    return $this->doMethodInNode(self::$METHOD_OPEN_ALL,$node,$doAnimation,$originalObj);
  }
  
  public function closeAll($node = null ,$doAnimation = null){
    return $this->doMethodInNode(self::$METHOD_CLOSE_ALL,$node,$doAnimation);
  }
  
  public function isOpen($node = null){
    return $this->doMethodInNode(self::$METHOD_IS_OPEN,$node);
  }
  
  public function isClosed($node = null){
    return $this->doMethodInNode(self::$METHOD_IS_CLOSED,$node);
  }
  
  public function isLeaf($node = null){
    return $this->doMethodInNode(self::$METHOD_IS_LEAF,$node);
  }
   
  public function cleanNode($node = null){
    return $this->doMethodInNode(self::$METHOD_CLEAN_NODE,$node);
  }
  
  public function loadNode($node = null,$successCallback = null,$errorCallback = null){
    return $this->doMethodInNode(self::$METHOD_LOAD_NODE,$node,$successCallback,$errorCallback);
  }
  
  public function _isLoaded($node = null){
    return $this->doMethodInNode(self::$METHOD__IS_LOADED,$node);
  }
  
  public function _getString($node = null){
    return $this->doMethodInNode(self::$METHOD__GET_STRING,$node);
  }
  
  public function deleteNode($node = null){
    return $this->doMethodInNode(self::$METHOD_DELETE_NODE,$node);
  }
  
  public function getNodeType($node = null){
    return $this->doMethodInNode(self::$METHOD__GET_NODE_TYPE,$node);
  }
  
  public function setNodeType($type = null,$node = null){
    $type = ($type instanceof YsTreeNodeType) ? $type->getId() : $type;
    return $this->doMethodInNode(self::$METHOD_SET_NODE_TYPE,$type,$node);
  }

  public function setDefaultType($node = null){
    return $this->setNodeType('default',$node);
  }
  
  // END METHODS
  
  public function beforeRenderTemplate(){
    $this->setContents($this->getNodes());
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
  
  public function getCore() {
    return $this->core;
  }

  public function setCore($core) {
    $this->core = $core;
  }

  public function getHTMLData() {
    return $this->html_data;
  }

  public function setHTMLData($html_data) {
    $this->html_data = $html_data;
  }

  public function getJSONData() {
    return $this->json_data;
  }

  public function setJSONData($json_data) {
    $this->json_data = $json_data;
  }

  public function getXMLData() {
    return $this->xml_data;
  }

  public function setXMLData($xml_data) {
    $this->xml_data = $xml_data;
  }

  public function getThemes() {
    return $this->themes;
  }

  public function setThemes($themes) {
    $this->themes = $themes;
  }

  public function getUI() {
    return $this->ui;
  }

  public function setUI($ui) {
    $this->ui = $ui;
  }

  public function getCRRM() {
    return $this->crrm;
  }

  public function setCRRM($crrm) {
    $this->crrm = $crrm;
  }

  public function getHotkeys() {
    return $this->hotkeys;
  }

  public function setHotkeys($hotkeys) {
    $this->hotkeys = $hotkeys;
  }

  public function getLanguages() {
    return $this->languages;
  }

  public function setLanguages($languages) {
    $this->languages = $languages;
  }

  public function getCookies() {
    return $this->cookies;
  }

  public function setCookies($cookies) {
    $this->cookies = $cookies;
  }

  public function getSort() {
    return $this->sort;
  }

  public function setSort($sort) {
    $this->sort = $sort;
  }

  public function getDragAndnDrop() {
    return $this->dnd;
  }

  public function setDragAndnDrop($dnd) {
    $this->dnd = $dnd;
  }

  public function getCheckbox() {
    return $this->checkbox;
  }

  public function setCheckbox($checkbox) {
    $this->checkbox = $checkbox;
  }

  public function getSearch() {
    return $this->search;
  }

  public function setSearch($search) {
    $this->search = $search;
  }

  public function getContextmenu() {
    return $this->contextmenu;
  }

  public function setContextmenu($contextmenu) {
    $this->contextmenu = $contextmenu;
  }

  public function getTypes() {
    return $this->types;
  }

  public function setTypes($types) {
    $this->types = $types;
  }
  
  public function addTypes($types){
    $args = func_get_args();
    foreach($args as $type){
      $this->setType($type);
    }
  }
  
  public function addType($type){
    $this->setType($type);
  }
  
  public function setType($type, $value = null){
    if($type instanceof YsTreeNodeType){
      $this->types[self::$TYPES][$type->getId()] = $type->buildOptions();
    }else{
      $this->types[self::$TYPES][$type] = $value;
    }
  }
  
  public function getType($id){
    return $this->types[$id];
  }

  public function getThemeroller() {
    return $this->themeroller;
  }

  public function setThemeroller($themeroller) {
    $this->themeroller = $themeroller;
  }

  public function getUnique() {
    return $this->unique;
  }

  public function setUnique($unique) {
    $this->unique = $unique;
  }

  public function getPlugins() {
    return $this->plugins;
  }

  public function setPlugins($plugins) {
    $this->plugins = $plugins;
  }

  public function getNodes() {
    return $this->nodes;
  }

  public function setNodes(YsTreeNode $nodes) {
    $this->nodes = $nodes;
  }
  
}