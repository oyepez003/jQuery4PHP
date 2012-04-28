<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJsFunction
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJsFunction {
    
  private $body;
  private $arguments;
  private $pattern = 'function(%s){%s}';
  private $returnFalse = false;
  private $condition;
  private $onConditionFailure;
  private $confirmation;
  private $onConfirmationFailure;
  private $buildSuccess;
  private $varName;

  const JAVASCRIPT_SINTAX_SEPARATOR = ';';
  const JAVASCRIPT_ARGUMENT_SEPARATOR = ',';
  

  public function  __construct($body= null, $arguments = null)
  {
    $this->setArguments($arguments);
    if($body instanceof self){
      $this->setPattern('%s%s');
      $this->setArguments(null);
    }
    $this->setBody($body);
  }
  
  public static function newInstance($body= null, $arguments = null){
    return new YsJsFunction($body,$arguments);
  }

  public function getPattern(){
    return $this->pattern;
  }

  public function setPattern($pattern){
    $this->pattern = $pattern;
  }

  public function getBody(){
    return (!$this->returnFalse) ? $this->body : $this->body . '; return false';
  }

  public function setBody($body){
    $this->body = $body;
  }

  public function getArguments(){
    return $this->arguments;
  }

  public function setArguments($arguments){
    $this->arguments = $arguments;
    return $this;
  }

  public function  __toString() {
    if(isset($this->condition) || isset($this->confirmation) ){
      $this->buildPattern();
    }
    if(isset($this->varName)){
      $this->setPattern(sprintf('%s = %s',$this->varName, $this->getPattern()));
    }
    return sprintf($this->getPattern(), $this->getArguments(),$this->getBody());
  }

  /**
   *@deprecated Use YsJsSintax::setInterval()
   */
  public static function setInterval($function, $interval){
    return sprintf('setInterval(%s, %s);',$function,$interval);
  }

  /**
   *@deprecated Use YsJsSintax::redirect()
   */
  public static function redirect($href){
    return sprintf('window.location = "%s"',$href);
  }

  /**
   *@deprecated Use YsJsSintax::cleanSintax()
   */
  public static function cleanSintax($sintax){
    $errorSintax = array(".()",";;",",}",",]","{;");
    $realSintax = array("",";","}","]","{");
    $sintax = str_replace($errorSintax, $realSintax, $sintax);
    return $sintax;
  }

  /**
   *@deprecated Use YsJsSintax::parseValue()
   */
  public static function parseValue($value){
    return YsJSON::valueToJS($value);
  }

  public static function call($functionName){
    return new YsArgument($functionName, false);
  }

  public static function execute(){
    $function = new YsJsFunction();
    $function->setBody(new YsJQueryDynamic(func_get_args()));
    return $function;
  }
  
  public function getReturnFalse() {
    return $this->returnFalse;
  }

  public function setReturnFalse($returnFalse) {
    $this->returnFalse = $returnFalse;
  }
  
  public function getCondition() {
    return $this->condition;
  }

  public function setCondition($condition) {
    if(is_bool($condition)){
      $condition = YsJSON::valueToJS($condition, true);
    }
    $this->condition = $condition;
  }

  public function getOnConditionFailure() {
    return $this->onConditionFailure;
  }

  public function setOnConditionFailure($onConditionFailure) {
    $this->onConditionFailure = $onConditionFailure;
  }

  public function getConfirmation() {
    return $this->confirmation;
  }

  public function setConfirmation($confirmation) {
    $this->confirmation = $confirmation;
  }

  public function getOnConfirmationFailure() {
    return $this->onConfirmationFailure;
  }

  public function setOnConfirmationFailure($onConfirmationFailure) {
    $this->onConfirmationFailure = $onConfirmationFailure;
  }
  
  public function condition($condition,$onFailure = null){
    $this->setCondition($condition);
    $this->onConditionFailure =  $onFailure;
    return $this;
  }
  
  public function conditionNOT($condition, $onFailure = null){
    $this->condition(YsJsSintax::BOOLEAN_NOT . $condition, $onFailure);
  }
  
  public function confirmation($message, $onFailure = null){
    $this->confirmation =  $message;
    $this->onConfirmationFailure =  $onFailure;
    return $this;
  }
  
  public function getVarName() {
    return $this->varName;
  }
  
  public function assignToVar($varName) {
    $this->varName = $varName;
  }

  public function setVarName($varName) {
    $this->varName = $varName;
  }
  
  public function buildPattern(){
    $conditionPattern = null;
    $confirmationPattern = null;
    $pattern = $this->getPattern();
    if(!$this->buildSuccess){
      if(isset($this->confirmation)){
        if(isset($this->onConfirmationFailure)){
          $confirmationPattern = "if (confirm('" . $this->confirmation . "')){%s}else{". $this->onConfirmationFailure ."}";
        }else{
          $confirmationPattern = "if (confirm('" . $this->confirmation . "')){%s}";
        }
      }
      if(isset($this->condition)){
        if(isset($this->onConditionFailure)){
          $conditionPattern = "if(" . $this->condition . "){%s}else{". $this->onConditionFailure ."}";
        }else{
          $conditionPattern = "if('" . $this->condition . "'){%s}";
        }
      }
      if($conditionPattern !== null){
        $pattern = sprintf($pattern,"%s",$conditionPattern);
      }
      if($confirmationPattern !== null){
        $pattern = sprintf($pattern,"%s",$confirmationPattern);
      }
      $this->setPattern($pattern);
      }
    $this->buildSuccess = true;
  }
}
