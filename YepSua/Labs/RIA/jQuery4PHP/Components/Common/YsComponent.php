<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsComponent  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsComponent{
  
  public static $DEFAULT_TEMPLATE_TAG = YsHTML::DIV;

  private $jquerySelector;
  private $jQueryObject;
  private $componentVarName;
  private $id;
  private $htmlProperties;
  private $bindEvents;
  private $contents;
  
  public function varsToUnset() {
    return array();
  }
  
  public function  __construct($componentId = null) {
    $this->preConstruct();
    $this->setId($componentId);
    $this->setHtmlProperties(sprintf('id="%s"', $componentId));
    $this->setJQuerySelector($componentId);
    $this->jQueryObject = YsJQuery::newInstance();
    $this->setDefaultComponentVarName();
    $this->postConstruct();
  }

  public function getJQuerySelector($suffix = '#') {
    $template = $this->jquerySelector;
    if (!isset($this->jquerySelector) || $this->jquerySelector === null) {
      $template = sprintf('%s%s', $suffix, $this->getId());
    }
    return $template;
  }

  public function setJQuerySelector($jquerySelector) {
    $this->jquerySelector = YsJQuery::$ID_SELECTOR . $jquerySelector;
  }
  
  /**
   *
   * @return YsJQuery 
   */
  public function getJQueryObject() {
    return $this->jQueryObject;
  }

  public function setJQueryObject(YsJQueryBuilder $jQueryObject) {
    $this->jQueryObject = $jQueryObject;
  }
  
  public function getComponentVarName() {
    return $this->componentVarName;
  }

  public function setComponentVarName($componentVarName) {
    $this->componentVarName = $componentVarName;
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function callMethod($methodName, $args = null, $pattern = '%s.%s(%s)'){
    $args = ($args !== null) ? YsJSON::valuesToJS($args) : '';
    return sprintf($pattern,$this->getComponentVarName(),$methodName, $args);
  }

  public function  __toString() {
   return YsJSON::arrayToJson($this->optionsToArray());
  }
  
  public function draw() {
    return sprintf('%s%s', $this->renderTemplate(), $this->execute());
  }
  
  public function execute() {
    return YsJQuery::newInstance()->execute($this->buildComponent());
  }
  
  public function buildComponent(){
    if (is_array($this->bindEvents) && sizeof($this->bindEvents) > 0){
      $i = 0;
      $bind[$i++] = $this->build();
      foreach($this->bindEvents as $event => $function){
        $jqueryBind = YsJQuery::bind()->eventType($event)->callJSFunction($function);        
        $bind[$i++] = $jqueryBind;
      }
      return new YsJQueryDynamic($bind);
    }else{
      return $this->build();
    }
  }
  
  public function assignToVar($varName){
     $this->getJQueryObject()->assignToVarName($varName);
  }
  
  public function getHtmlProperties() {
    return $this->htmlProperties;
  }

  public function setHtmlProperties($htmlProperties) {
    $this->htmlProperties = $htmlProperties;
  }
  
  public function addHtmlProperties($htmlProperties){
    if(isset($this->htmlProperties)){
        $htmlProperties = sprintf('%s %s',$this->getHtmlProperties(),$htmlProperties);
    }
    $this->htmlProperties = $htmlProperties;
  }
  
  public function addHtmlPropertie($key,$value){
    $this->addHtmlProperties(sprintf('%s="%s"',$key,$value));
  }
  
  public function beforeBuild(){
    return false;
  }
  
  public function build(){
    $this->beforeBuild();
    $jquery =  $this->getJQueryObject();
    $jquery->in($this->getJQuerySelector());
    $jquery->setOptions($this->optionsToArray());
    $this->afterBuild($jquery);
    return $jquery;
  }
  
  public function afterBuild($jquery){
    return $jquery;
  }
  
  public function beforeRenderTemplate(){
    return false;
  }
  
  public function renderTemplate(){
    $this->beforeRenderTemplate();
    if(isset($this->contents)){
      return YsHTML::getTag($this->getDefaultTemplateTag(),$this->getHtmlProperties(),$this->getContents());
    }else{
      return  
      sprintf('%s%s'
             ,YsHTML::getTag($this->getDefaultTemplateTag(),$this->getHtmlProperties())
             ,YsHTML::getTagClosed($this->getDefaultTemplateTag()));    
    }
    $this->afterRenderTemplate();
  }
    
  public function afterRenderTemplate(){
    return false;
  }
  
  public function getDefaultTemplateTag(){
    return self::$DEFAULT_TEMPLATE_TAG;
  }
  
  public function optionsToArray() {
    $config = array();
    $vars = get_object_vars($this);
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
  
  public function postConstruct(){
    return false;
  }
  
  public function preConstruct(){
    return false;
  }
  
  public function doMethod($args){
    $jquery = YsJQueryPlugin::callJQueryMethod($this->getJQueryObject()->getEvent())->in($this->getJQuerySelector());
    $args = func_get_args();
    foreach($args as $arg){
      $jquery->addArgumentsBeforeOptions($arg);
    }
    return $jquery;
  }
  
  public function confirmation($message, $onFailure = null){
    $this->getJQueryObject()->confirmation($message, $onFailure);
  }

  public function condition($condition, $onFailure = null){
    $this->getJQueryObject()->condition($condition, $onFailure);
  }

  public function conditionNOT($condition, $onFailure = null){
    $this->getJQueryObject()->conditionNOT($condition, $onFailure);
  }

  public function setInterval($time = 5000, $intervalVarName = null){
    $this->getJQueryObject()->setInterval($time, $intervalVarName);
  }

  public function setTimeout($time = 5000){
    $this->getJQueryObject()->setInterval($time);
  }
  
  public function getBindEvents() {
    return $this->bindEvents;
  }

  public function setBindEvents(array $bindEvents) {
    $this->bindEvents = $bindEvents;
  }
  
  public function bindEvent($event,$function){
    $this->bindEvents[$event] = $function;
  }
  
  public function getContents() {
    return $this->contents;
  }

  public function setContents($contents) {
    $this->contents = $contents;
  }
  
  public function setDefaultComponentVarName($suffix = 'Var'){
    $this->setComponentVarName($this->getId() . $suffix);
  }
}