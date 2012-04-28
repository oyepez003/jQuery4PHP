<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsDefaultTreeNode  todo description
 *
 * @package    YepSua
 * @subpackage CommonUtil
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsDefaultTreeNode extends ArrayObject implements ArrayAccess{
   
    public static $DEFAULT_LEAF_PATTERN = '<li %s>%s</li>';
    public static $DEFAULT_BRANCH_PATTERN = '<ul %s>%s</ul>';
    public static $PREFIX_SEPARATOR = '-';
  
    private $leafPattern;
    private $branchPattern;
    private $htmlProperties;
   
    private $caption;
    private $id;
    private $parentNode;
    private $leaf;
    private $prefixId;
   
   
    public function __construct($id, $caption = null, YsDefaultTreeNode &$parent = null){
        $this->setId($id);
        $this->setCaption($caption);
        $this->setLeafPattern(self::$DEFAULT_LEAF_PATTERN);
        $this->setBranchPattern(self::$DEFAULT_BRANCH_PATTERN);
        if($parent !== null){
            $this->setParentNode($parent);
            $parent->append($this);
        }
    }
    
    public function getJQuerySelector($suffix = '#') {
      return sprintf('%s%s', $suffix, $this->getId());;
    }

    public function build($onlyContent = false){
        $result = "";
        foreach ($this->getArrayCopy() as $node){
            $node->buildID();
            if($node->isLeaf()){
                $result .= $node->buildLeaf();
            }else{
                $result .= $node->buildLeaf($node->build());
            }
        }
        if(!$onlyContent){
          $result = $this->buildBranch($result);
        }
        return $result;
    }
    
    public function buildPrefixId(){
      if(isset($this->prefixId)){
         return sprintf('%s%s%s',$this->prefixId,self::$PREFIX_SEPARATOR,$this->id);
      }else{
        if(isset($this->parentNode) && $this->parentNode->getPrefixId() !== null){
           $this->setPrefixId($this->parentNode->getPrefixId());
           return sprintf('%s%s%s',$this->parentNode->getPrefixId(),self::$PREFIX_SEPARATOR,$this->id);  
        }
      }
      return $this->id;
    }
    
    public function getListJQuerySelector(){
      return sprintf('#%s',$this->buildPrefixId());
    }
    
    public function buildID(){
      $id = $this->buildPrefixId();  
      $this->setHtmlProperties(sprintf('id="%s"',$id));
    }
    
    public function buildContent(){
      return $this->build(true);
    }
   
    public function buildLeaf($content = null){
        $content = sprintf('%s %s',$this->getCaption(),$content);
        return sprintf($this->getLeafPattern(), $this->getHtmlProperties(), $content);
    }
   
    public function buildBranch($content){
        $branch = "";
        if(!isset($this->parentNode)){
            $branch = sprintf($this->getBranchPattern(), $this->getHtmlProperties(), $content);
        }else{
            $branch = sprintf($this->getBranchPattern(), null, $content);
        }
        return $branch;
    }
   
    public function __toString(){
      return $this->build();
    }
    
    public function getPrefixId() {
      return $this->prefixId;
    }

    public function setPrefixId($prefixId) {
      $this->prefixId = $prefixId;
    }
   
    public function isLeaf(){
        return $this->count() === 0;
    }
    
    public function getLeaf() {
      return $this->leaf;
    }

    public function setLeaf($leaf) {
      $this->leaf = $leaf;
    }
   
    public function setHtmlProperties($htmlProperties){
        if(isset($this->htmlProperties)){
            $htmlProperties = sprintf('%s %s',$this->getHtmlProperties(),$htmlProperties);
        }
        $this->htmlProperties = $htmlProperties;
    }
   
    public function getHtmlProperties(){
        return $this->htmlProperties;
    }
    
    public function cleanHtmlProperties(){
      unset($this->htmlProperties);
    }
    
    public function addHtmlPropertie($key, $value){
      $this->setHtmlProperties(sprintf('%s="%s"',$key,$value));
    }
   
    public function getLeafPattern(){
        return $this->leafPattern;
    }
   
    public function setLeafPattern($leafPattern){
        $this->leafPattern = $leafPattern;
    }
   
    public function getBranchPattern(){
        return $this->branchPattern;
    }
   
    public function setBranchPattern($branchPattern){
        $this->branchPattern = $branchPattern;
    }
   
    public function getCaption(){
        return $this->caption;
    }
   
    public function setCaption($caption){
        $this->caption = $caption;
    }
   
    public function getId(){
        return $this->id;
    }
   
    public function setId($id){
        $this->id = $id;
    }

    public function getParentNode(){
        return $this->parentNode;
    }
   
    public function setParentNode($parentNode){
        $this->parentNode = $parentNode;
    }
    
    public function getChildrens(){
      return $this->getArrayCopy();
    }
}