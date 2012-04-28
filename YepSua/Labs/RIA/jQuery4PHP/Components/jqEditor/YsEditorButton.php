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
class YsEditorButton extends YsComponentOption{
  
	public static $SAVE = 'save';
	public static $COPY = 'copy';
	public static $CUT = 'cut';
	public static $CSS = 'css';
	public static $PASTE =	'paste';
	public static $PASTE_TEXT ='pastetext';
	public static $PASTE_FORMAT_TEXT = 'pasteformattext';
	public static $REMOVEFORMAT = 'removeformat';
	public static $UNDO = 'undo';
	public static $REDO = 'redo';
	public static $BOLD = 'bold';
	public static $ITALIC = 'italic';
	public static $UNDERLINE = 'underline';
	public static $STRIKETHROUGH = 'strikethrough';
	public static $SUPERSCRIPT = 'superscript';
	public static $SUBSCRIPT = 'subscript';
	public static $JUSTIFY_LEFT = 'justifyleft';
	public static $JUSTIFY_RIGHT =	'justifyright';
	public static $JUSTIFY_CENTER = 'justifycenter';
	public static $JUSTIFY_FULL = 'justifyfull';
	public static $INDENT = 'indent';
	public static $OUTDENT = 'outdent';
	public static $RTL = 'rtl';
	public static $LTR = 'ltr';
	public static $FORECOLOR = 'forecolor';
	public static $HILITECOLOR = 'hilitecolor';
	public static $FORMAT_BLOCK = 'formatblock';
	public static $FONT_SIZE = 'fontsize';
	public static $FONT_NAME = 'fontname';
	public static $INSERT_ORDERED_LIST = 'insertorderedlist';
	public static $INSERT_UNORDERED_LIST = 'insertunorderedlist';
	public static $HORIZONTAL_RULE = 'horizontalrule';
	public static $BLOCK_QUOTE = 'blockquote';
	public static $DIV = 'div';
	public static $LINK = 'link';
	public static $UNLINK = 'unlink';
	public static $ANCHOR = 'anchor';
	public static $IMAGE = 'image';
	public static $PAGE_BREAK = 'pagebreak';
	public static $SMILEY = 'smiley';
	public static $FLASH = 'flash';
	public static $TABLE = 'table';
	public static $TABLE_RM = 'tablerm';
	public static $TABLE_PROPS = 'tableprops';
	public static $TB_CELL_PROPS = 'tbcellprops';
	public static $TB_ROW_BEFORE = 'tbrowbefore';
	public static $TB_ROW_AFTER = 'tbrowafter';
	public static $TB_ROW_RM = 'tbrowrm';
	public static $TB_COL_BEFORE_ = 'tbcolbefore';
	public static $TB_COL_AFTER = 'tbcolafter';
	public static $TB_COL_RM = 'tbcolrm';
	public static $TB_CELLS_MERGE = 'tbcellsmerge';
	public static $TB_CELL_SPLIT = 'tbcellsplit';
	public static $DOCSTRUCTURE = 'docstructure';
	public static $ELFINDER = 	'elfinder';
	public static $FULLSCREEN = 'fullscreen';
	public static $NBSP = 'nbsp';
	public static $STOPFLOAT = 'stopfloat';
	public static $ABOUT = 'about';
  
  public function optionsToArray(){
    
  }
  
}