<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsLinkableTreeNode  todo description
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsLinkableTreeNode extends YsDefaultTreeNode{
   
    public static $DEFAULT_ACTION = '#';
    public static $DEFAULT_LINK_PATTERN = '<a %s>%s</a>';
   
    private $linkPattern;
    private $linkHtmlProperties;
    private $action;
   
    public function __construct($id, $caption = null , YsDefaultTreeNode &$parent = null){
        parent::__construct($id, $caption, $parent);
        $this->setAction(self::$DEFAULT_ACTION);
        $this->setLinkPattern(self::$DEFAULT_LINK_PATTERN);
    }
   
    public function getCaption(){
        return $this->buildLinkPattern(parent::getCaption());
    }
    
    public function getLabel(){
      return parent::getCaption();
    }
   
    public function getLinkPattern(){
        return $this->linkPattern;
    }
   
    public function buildLinkPattern($caption){
        $action = sprintf('href="%s" %s', $this->getAction(), $this->getLinkHtmlProperties());
        return sprintf($this->getLinkPattern(), $action, $caption);
    }
   
    public function setLinkPattern($linkPattern){
        $this->linkPattern = $linkPattern;
    }
   
    public function getAction(){
        return $this->action;
    }
   
    public function setAction($action){
        $this->action = $action;
    }
    
    public function setLinkHtmlProperties($linkHtmlProperties){
        if(isset($this->linkHtmlProperties)){
            $linkHtmlProperties = sprintf('%s %s',$this->getLinkHtmlProperties(),$linkHtmlProperties);
        }
        $this->linkHtmlProperties = $linkHtmlProperties;
    }
   
    public function getLinkHtmlProperties(){
        return $this->linkHtmlProperties;
    }
    
    public function cleanLinkHtmlProperties(){
      unset($this->linkHtmlProperties);
    }
    
    public function addLinkHtmlPropertie($key, $value){
      $this->setLinkHtmlProperties(sprintf('%s="%s"',$key,$value));
    }
    
    /*public function setHtmlProperties($htmlProperties){
      $this->setLinkHtmlProperties($htmlProperties);
    }
   
    public function getHtmlProperties(){
        return $this->getLinkHtmlProperties();
    }
    
    public function cleanHtmlProperties(){
      $this->cleanLinkHtmlProperties();
    }*/
    
    public function addHtmlPropertie($key, $value){
      $this->addLinkHtmlPropertie($key,$value);
    }
    
    public function setListHtmlProperties($htmlProperties){
      parent::setHtmlProperties($htmlProperties);
    }
   
    public function getListHtmlProperties(){
      return parent::getHtmlProperties();
    }
    
    public function cleanListHtmlProperties(){
      parent::cleanHtmlProperties();
    }
    
    public function addListHtmlPropertie($key, $value){
      parent::addHtmlPropertie($key,$value);
    }
    
    
}