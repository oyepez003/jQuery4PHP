<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsEditor description
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsEditor extends YsComponent{
   
  private $doctype;
  private $cssClass;
  private $cssfiles;
  private $height;
  private $resizable;
  private $lang;
  private $toolbar;
  private $absoluteURLs;
  private $allowSource;
  private $stripWhiteSpace;
  private $styleWithCSS;
  private $fmAllow;
  private $fmOpen;
  private $allowTags;
  private $denyTags;
  private $denyAttr;
  private $pasteDenyAttr;
  private $allowTextNodes;
  private $allowBrowsersSpecStyles;
  private $allowPaste;
  private $pasteOnlyText;
  private $replace;
  private $restore;
  private $pagebreak;
  private $buttons;
  private $panels;
  private $toolbars;
  private $panelNames;
  private $width;
    
  public function getDoctype() {
    return $this->doctype;
  }

  public function setDoctype($doctype) {
    $this->doctype = $doctype;
  }

  public function getCssClass() {
    return $this->cssClass;
  }

  public function setCssClass($cssClass) {
    $this->cssClass = $cssClass;
  }

  public function getCssfiles() {
    return $this->cssfiles;
  }

  public function setCssfiles($cssfiles) {
    $this->cssfiles = $cssfiles;
  }

  public function getHeight() {
    return $this->height;
  }

  public function setHeight($height) {
    $this->height = $height;
  }

  public function getResizable() {
    return $this->resizable;
  }

  public function setResizable($resizable) {
    $this->resizable = $resizable;
  }

  public function getLang() {
    return $this->lang;
  }

  public function setLang($lang) {
    $this->lang = $lang;
  }

  public function getToolbar() {
    return $this->toolbar;
  }

  public function setToolbar($toolbar) {
    if ($toolbar instanceof YsEditorToolbar){
      $this->setToolbars($toolbar->getToolbar());
      $panels = $toolbar->getEditorPanels();
      if($panels !== null){
        $this->setPanels($panels);
      }
      $toolbar = $toolbar->getName();
    }
    $this->toolbar = $toolbar;
  }

  public function getAbsoluteURLs() {
    return $this->absoluteURLs;
  }

  public function setAbsoluteURLs($absoluteURLs) {
    $this->absoluteURLs = $absoluteURLs;
  }

  public function getAllowSource() {
    return $this->allowSource;
  }

  public function setAllowSource($allowSource) {
    $this->allowSource = $allowSource;
  }

  public function getStripWhiteSpace() {
    return $this->stripWhiteSpace;
  }

  public function setStripWhiteSpace($stripWhiteSpace) {
    $this->stripWhiteSpace = $stripWhiteSpace;
  }

  public function getStyleWithCSS() {
    return $this->styleWithCSS;
  }

  public function setStyleWithCSS($styleWithCSS) {
    $this->styleWithCSS = $styleWithCSS;
  }

  public function getFmAllow() {
    return $this->fmAllow;
  }

  public function setFmAllow($fmAllow) {
    $this->fmAllow = $fmAllow;
  }

  public function getFmOpen() {
    return $this->fmOpen;
  }

  public function setFmOpen($fmOpen) {
    $this->fmOpen = $fmOpen;
  }

  public function getAllowTags() {
    return $this->allowTags;
  }

  public function setAllowTags($allowTags) {
    $this->allowTags = $allowTags;
  }

  public function getDenyTags() {
    return $this->denyTags;
  }

  public function setDenyTags($denyTags) {
    $this->denyTags = $denyTags;
  }

  public function getDenyAttr() {
    return $this->denyAttr;
  }

  public function setDenyAttr($denyAttr) {
    $this->denyAttr = $denyAttr;
  }

  public function getPasteDenyAttr() {
    return $this->pasteDenyAttr;
  }

  public function setPasteDenyAttr($pasteDenyAttr) {
    $this->pasteDenyAttr = $pasteDenyAttr;
  }

  public function getAllowTextNodes() {
    return $this->allowTextNodes;
  }

  public function setAllowTextNodes($allowTextNodes) {
    $this->allowTextNodes = $allowTextNodes;
  }

  public function getAllowBrowsersSpecStyles() {
    return $this->allowBrowsersSpecStyles;
  }

  public function setAllowBrowsersSpecStyles($allowBrowsersSpecStyles) {
    $this->allowBrowsersSpecStyles = $allowBrowsersSpecStyles;
  }

  public function getAllowPaste() {
    return $this->allowPaste;
  }

  public function setAllowPaste($allowPaste) {
    $this->allowPaste = $allowPaste;
  }

  public function getPasteOnlyText() {
    return $this->pasteOnlyText;
  }

  public function setPasteOnlyText($pasteOnlyText) {
    $this->pasteOnlyText = $pasteOnlyText;
  }

  public function getReplace() {
    return $this->replace;
  }

  public function setReplace($replace) {
    $this->replace = $replace;
  }

  public function getRestore() {
    return $this->restore;
  }

  public function setRestore($restore) {
    $this->restore = $restore;
  }

  public function getPagebreak() {
    return $this->pagebreak;
  }

  public function setPagebreak($pagebreak) {
    $this->pagebreak = $pagebreak;
  }

  public function getButtons() {
    return $this->buttons;
  }

  public function setButtons($buttons) {
    $this->buttons = $buttons;
  }

  public function getPanels() {
    return $this->panels;
  }

  public function setPanels($panels) {
    $this->panels = $panels;
  }

  public function getToolbars() {
    return $this->toolbars;
  }

  public function setToolbars($toolbars) {
    $this->toolbars = $toolbars;
  }

  public function getPanelNames() {
    return $this->panelNames;
  }

  public function setPanelNames($panelNames) {
    $this->panelNames = $panelNames;
  }
  
  public function getWidth() {
    return $this->width;
  }

  public function setWidth($width) {
    $this->width = $width;
  }
  
  public function __construct($componentId = null) {
    parent::__construct($componentId);
    YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQEDITOR);
    $htmlProperties = sprintf('id="%s"', $componentId);
    $this->setHtmlProperties($htmlProperties);
    $this->setJQueryObject(YsJQEditor::build());
  }
  
  public function buildEditorTemplate($content){
    $template = sprintf('%s %s %s',
      YsJQEditor::initWidget($this->getId(), $this->getHtmlProperties()),
      $content,
      YsJQEditor::endWidget()
    );
    return $template;
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
  
  public function initWidget(){
    return YsJQEditor::initWidget($this->getId());
  }
  
  public function endWidget(){
    return YsJQEditor::endWidget();
  }
  
  public function getValue(){
    return YsJQEditor::getValue($this->getJQuerySelector());
  }
 
    
}