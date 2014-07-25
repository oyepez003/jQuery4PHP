<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

include_once dirname(__FILE__) . '/../../CommonUtil/YsUtilAutoloader.php';
YsUtilAutoloader::register();

/**
 * YsJQuery todo description.
 *
 * @package    YepSua
 * @subpackage RIA/jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id
 */
class YsJQuery extends YsJQueryCore
{

  static protected $instance = null;
  static $ID_SELECTOR = '#';

  public $jquery;

  /**
   * Construct function
   */
  public function  __construct($selector = 'document', $event = YsJQueryConstant::READY_EVENT)
  {
    $this->jquery = new YsJQuerySintax();
    $this->jquery->setSelector($selector);
    $this->jquery->setEvent($event);
  }

  /**
   * Retrieves a instance of this class.
   * @return object self::$instance
   */
  public static function newInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  public static function getObject($selector = null){
    $jquery = self::newInstance();
    $jquery->jquery->setSelector($selector);
    return $jquery;
  }

  /**
   * Set the jquery selector and context to execute the current sintax.
   * @param string $selector jQuery selector
   * @param string $context Javascript Object
   * @return object
   */
  public function in($selector, $context = null)
  {
    $this->jquery->setSelector($selector);
    if($context !== null)
    {
      $this->jquery->setContext($context);
    }
    return $this;
  }

  public function inVar($selector, $context = null)
  {
    $this->in($selector, $context);
    $this->jquery->setIsSelectorUnquoted(true);
    return $this;
  }

  /**
   * Set the function to execute.
   * @param string $function The function code
   * @return object
   */
  public function setFunction($function)
  {
    $this->jquery->setArguments(new YsJsFunction($function));
    return $this;
  }
  
  public function setEvent($event){
    $this->jquery->setEvent($event);
    return $this;
  }

  /**
   * Magic
   */
  public function  __call($name, $arguments)
  {
    if(substr($name,0,2) == 'on')
    {
      $event = strtolower(substr($name,2,1)) . substr($name,3);
      $this->jquery->setEvent($event);
      if(isset($arguments[0])){
        $this->jquery->in($arguments[0]);
      }
      if(isset($arguments[1])){
        $this->execute($arguments[1]);
      }
      return $this;
    }
    parent::__call($name, $arguments);
  }

  /**
   * Execute the function and rend the sintax
   * @param string $function
   * @return object
   */
  public function execute($function = null)
  {
    if($function instanceof YsJsFunction){
       $this->setFunction($function);
    }else{
      $this->setFunction(new YsJQueryDynamic(func_get_args()));
    }
    $this->jquery->render();
    return $this;
  }

  public function executeOnce($function = null){
    return 
    YsJQuery::newInstance()->execute(
      YsJQuery::one()
        ->in($this->getJQueryObject()->getSelector())
        ->eventType($this->getJQueryObject()->getEvent())
        ->handler(new YsJQueryDynamic(func_get_args()))
    );
  }

  /**
   * Execute when the element is ready
   */
  public function executeOnReady($function = null)
  {
    if(func_num_args() > 1){
      $this->clearJQueryList();
      $jqueryFinal = new YsJQuerySintax();
      $argAux = func_get_arg(0);
      $postSintax = null;
      for($i=1; $i < func_num_args(); $i++ ){
        $argNext =  func_get_arg($i);
        if($argNext instanceof YsJQueryCore){
          if($argNext->getSelector() == $argAux->getSelector() || $argNext->getSelector() == null){
            $argAux->addAccesorsWithPattern($argNext->getEvent(),$argNext->getArguments());
            }
            else{
            $argAux->addPostSintax($postSintax);
            $postSintax = null;
            $this->getJQueryList()->add($argAux->getSelector(), $argAux);
            $argAux = func_get_arg($i);
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
    else
    {
      $this->setFunction($function);
    }
    return $this->jquery->executeOnReady();
  }

  /**
   * Get the jquery sintax
   * @return string jQuery sintax
   */
  public function getSintax()
  {
    return $this->jquery->getSintax();
  }

  public function getJQueryObject(){
    return $this->jquery;
  }
  
  public function addPreSintax($pre_sintax, $withSeparator = true){
    return $this->jquery->addPreSintax($pre_sintax, $withSeparator);
  }

  public function addPostSintax($post_sintax, $withSeparator = true){
    return $this->jquery->addPostSintax($post_sintax, $withSeparator);
  }

  public function addSintax($sintax){
    return $this->jquery->addSintax($sintax);
  }
  
  public function setPreSintax($pre_sintax){
    return $this->jquery->setPreSintax($pre_sintax);
  }

  public function setPostSintax($post_sintax){
    return $this->jquery->setPostSintax($post_sintax);
  }

  /**
   * Magic
   * @return string This object
   */
  public function __toString()
  {
    return $this->jquery->renderWithJsTags();
  }

  public function confirmation($confirmation, $onFailure = null){
    $this->jquery->confirmation($confirmation,$onFailure);
    return $this;
  }

  public function condition($condition, $onFailure = null){
    $this->jquery->condition($condition,$onFailure);
    return $this;
  }

  public function setInterval($time = 5000, $intervalVarName = null){
    $this->jquery->setInterval($time,$intervalVarName);
    return $this;
  }

  public function setTimeout($time = 5000){
    $this->jquery->setTimeout($time);
    return $this;
  }
  
  public function setEmbebedFunction($embebedFunction) {
    $this->jquery->setEmbebedFunction($embebedFunction);
    return $this;
  }
  
  public static function remoteCommand($proccess = null, $update = null, $preUpdate = '', $postUpdate = ''){
    if($proccess !== null){
      $proccessSintax = YsJQuery::serializeArray()->in($proccess);
    }
    if($update !== null){
      $updateSintax = self::ajaxUpdateSintax($update, $preUpdate, $postUpdate);
    }
    $jquery = self::ajax();
    $jquery->_type('POST');
    if($proccess !== null){
      $jquery->_data($proccessSintax);
    }
    if($update !== null){
      $jquery->_success($updateSintax);
    }
    return $jquery;
  }
  
  public static function ajaxUpdateSintax($update = null, $preSintax = '', $postSintax = ''){
    return YsJsFunction::newInstance(
      new YsJQueryDynamic(
        $preSintax,
        YsJQuery::html(YsArgument::value('data'))->in($update),
        YsJQuery::val(YsArgument::value('data'))->in($update),
        $postSintax
      ),
      'data, textStatus, jqXHR'
    );
  }
  
  public static function ajaxStatus($selector
                                   ,$start = null
                                   ,$send = null
                                   ,$success = null
                                   ,$complete = null
                                   ,$error = null
                                   ,$stop = null
                                   ){
    $sintax = array();
    if($start !== null){
      $sintax[] = YsJQuery::ajaxStart($start)->in($selector);
    }
    if($send !== null){
      $sintax[] = YsJQuery::ajaxSend($send)->in($selector);
    }
    if($success !== null){
      $sintax[] = YsJQuery::ajaxSuccess($success)->in($selector);
    }
    if($complete !== null){
      $sintax[] = YsJQuery::ajaxComplete($complete)->in($selector);
    }
    if($error !== null){
      $sintax[] = YsJQuery::ajaxError($error)->in($selector);
    }
    if($stop !== null){
      $sintax[] = YsJQuery::ajaxStop($stop)->in($selector);
    }
    return new YsJQueryDynamic($sintax);
  }
  
  public static function executeAjaxStatus($selector
                                   ,$start = null
                                   ,$send = null
                                   ,$success = null
                                   ,$complete = null
                                   ,$error = null
                                   ,$stop = null
                                   ){
    return YsJQuery::newInstance()
      ->execute(
      self::ajaxStatus($selector,$start,$send,$success,$complete,$error,$stop)
    );
  }
  
}