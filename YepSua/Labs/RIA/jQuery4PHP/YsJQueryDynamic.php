<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQueryDynamic todo description.
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQueryDynamic extends YsJQuery {

  public function __construct($function = null) {
    parent::__construct();
    if ($function !== null) {
      $arraySintax = is_array($function) ? $function : func_get_args();
      $this->build($arraySintax);
    }
    return $this;
  }

 public function build($function) {
    if ($function !== null) {
      if(sizeof($function) > 1){
      $function = $this->searchPreSintax($function);
      if(!is_array($function)){
        $this->setFunction($function);
      }else{
        $this->clearJQueryList();
        $jqueryFinal = new YsJQuerySintax();
        $argAux = $function[0];
        $postSintax = null;
        for($i=1; $i < sizeof($function); $i++ ){
          $argNext =  $function[$i];
          if($argNext instanceof YsJQueryCore){
            if($argNext->getSelector() == $argAux->getSelector() || $argNext->getSelector() == null){
              $argAux->addAccesorsWithPattern($argNext->getEvent(),$argNext->getArguments());
              }
              else{
              $argAux->addPostSintax($postSintax);
              $postSintax = null;
              $this->getJQueryList()->add($argAux->getSelector(), $argAux);
              $argAux = $function[$i];
            }
          }else{
            $argAux->addPostSintax(YsJsFunction::JAVASCRIPT_SINTAX_SEPARATOR . $argNext);
          }
        }
        $this->getJQueryList()->add($argAux->getSelector(), $argAux);
        $sintax = '';
        foreach($this->getJQueryList()->getItems() as $jquery => $jquerySintax){
          $sintax .= $jquerySintax;
        }
        $this->setFunction($sintax);
      }

    }
       else {
        if (is_array($function) && isset($function[0])) {
          $this->setFunction($function[0]);
        } else {
          $this->setFunction($function);
        }
      }
      $this->jquery->render();
    }
    return $this;
  }

  private function  searchPreSintax($functions) {
      $presintax = "";
      $newFunction = array();
      $indObjectFinded = false;
      $i = 0;
      if(is_array($functions) && sizeof($functions) > 0 && is_string($functions[0])){
        foreach($functions as $function){
          if(!$indObjectFinded){
            if(is_string($function)){
              $presintax .= $function . YsJsFunction::JAVASCRIPT_SINTAX_SEPARATOR;
            }else{
              if($function instanceof YsJQueryBuilder){
                $newFunction[$i++] = $function->setPreSintax($presintax);
                $indObjectFinded = true;
              }
            }
          }else{
            $newFunction[$i++] = $function;
          }
        }
      }else{
        $newFunction = $functions;
      }
    return (sizeof($newFunction) <= 0) ? $presintax : $newFunction;
  }

  public function __toString() {
    return $this->jquery->getInternalSintax();
  }

}
