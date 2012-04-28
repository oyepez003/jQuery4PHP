<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsEditorPanel description
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsEditorPanel extends YsComponentOption{
  
  private $buttons;
  private $name;
  
  public static $EOL = 'eol';
	public static $SAVE = 'save';
	public static $COPYPASTE = 'copypaste';
	public static $UNDOREDO = 'undoredo';
	public static $STYLE = 'style';
	public static $COLORS = 'colors';
	public static $ALIGNMENT = 'alignment';
	public static $INDENT = 'indent';
	public static $FORMAT = 'format';
	public static $LISTS = 'lists';
	public static $ELEMENTS = 'elements';
	public static $DIRECTION = 'direction';
	public static $LINKS = 'links';
	public static $IMAGES = 'images';
	public static $MEDIA = 'media';
	public static $TABLES = 'tables';
	public static $ELFINDER = 'elfinder';
	public static $FULLSCREEN = 'fullscreen';
  
  public function __construct($name) {
    $this->name = $name;
    $this->buttons = new ArrayObject();
  }
  
public function getButtons() {
    return $this->buttons;
  }

  public function setButtons($buttons) {
    $this->buttons = $buttons;
  }
  
  public function addButton($button){
    $this->buttons->append($button);
  }
  
  public function addButtons($button){
    $args = func_get_args();
    foreach($args as $button){
      $this->addButton($button);
    }
  }
  
  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
  
  public function getPanel(){
    return array($this->getName() => $this->optionsToArray());
  }
  
  public function optionsToArray(){
    return $this->buttons->getArrayCopy();
  }
  
}