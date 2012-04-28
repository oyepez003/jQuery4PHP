<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQGrid todo description
 *
 * @method YsJQGrid _ajaxGridOptions This option allow to set global ajax settings for the grid when we request data
 * @method YsJQGrid _ajaxSelectOptions This option allow to set global ajax settings for the select element when the select is obtained via dataUrl option in editoptions or searchoptions objects
 * @method YsJQGrid _altclass The class that is used for alternate rows.
 * @method YsJQGrid _altRows Set a zebra-striped grid
 * @method YsJQGrid _autoencode When set to true encodes (html encode) the incoming (from server) and posted data (from editing modules)
 * @method YsJQGrid _autowidth When set to true, the grid width is recalculated automatically to the width of the parent element.
 * @method YsJQGrid _caption Defines the Caption layer for the grid
 * @method YsJQGrid _cellLayout This option determines the padding + border width of the cell
 * @method YsJQGrid _cellEdit Enables (disables) cell editing
 * @method YsJQGrid _cellsubmit Determines where the contents of the cell are saved: 'remote' or 'clientArray'. 
 * @method YsJQGrid _cellurl The url where the cell is to be saved.
 * @method YsJQGrid _colModel Array which describes the parameters of the columns
 * @method YsJQGrid _colNames An array in which we place the names of the columns
 * @method YsJQGrid _data A array that store the local data passed to the grid
 * @method YsJQGrid _datastr The string of data when datatype parameter is set to xmlstring or jsonstring
 * @method YsJQGrid _datatype Defines what type of information to expect to represent data in the grid
 * @method YsJQGrid _deepempty This option should be set to true if a event or a plugin is attached to the table cell
 * @method YsJQGrid _deselectAfterSort Applicable only when we use datatype
 * @method YsJQGrid _direction Determines the language direction in grid
 * @method YsJQGrid _editurl Defines the url for inline and form editing.
 * @method YsJQGrid _emptyrecords Display the information when the returned (or the current) number of records is zero. This option is valid only if viewrecords option is set to true.
 * @method YsJQGrid _ExpandColClick When true, the treeGrid is expanded and/or collapsed when we click on the text of the expanded column, not only on the image
 * @method YsJQGrid _ExpandColumn Indicates which column (name from colModel) should be used to expand the tree grid. If not set the first one is used. Valid only when treeGrid option is set to true.
 * @method YsJQGrid _footerrow If set to true this will place a footer table with one row below the gird records and above the pager
 * @method YsJQGrid _forceFit If set to true, and resizing the width of a column, the adjacent column (to the right) will resize so that the overall grid width is maintained
 * @method YsJQGrid _gridstate Determines the current state of the grid
 * @method YsJQGrid _gridview If set to true we can not use treeGrid, subGrid, or afterInsertRow event
 * @method YsJQGrid _grouping Enables grouping in grid
 * @method YsJQGrid _groupingView Set groupingView in grid
 * @method YsJQGrid _headertitles If the option is set to true the title attribute is added to the column headers
 * @method YsJQGrid _height The height of the grid
 * @method YsJQGrid _hiddengrid If set to true the grid initially is hidden
 * @method YsJQGrid _hidegrid Enables or disables the show/hide grid button
 * @method YsJQGrid _hoverrows When set to false the mouse hovering is disabled in the grid data rows.
 * @method YsJQGrid _idPrefix When set this string is added as prefix to the id of the row when it is build
 * @method YsJQGrid _ignoreCase By default the local searching is case sensitive
 * @method YsJQGrid _inlineData An array used to add content to the data posted to the server when we are in inline editing.
 * @method YsJQGrid _jsonReader Array which describes the structure of the expected json data
 * @method YsJQGrid _lastpage Determines the total number of pages returned from the request. 
 * @method YsJQGrid _lastsort Determines the index of last sorted column beginning from 0
 * @method YsJQGrid _loadonce If this flag is set to true, the grid loads the data from the server only once (using the appropriate datatype).
 * @method YsJQGrid _loadtext The text which appear when requesting and sorting data
 * @method YsJQGrid _loadui This option controls what to do when an ajax operation is in progress.
 * @method YsJQGrid _mtype Defines the type of request to make (“POST” or “GET”)
 * @method YsJQGrid _multikey This parameter have sense only multiselect option is set to true
 * @method YsJQGrid _multiboxonly This option works only when multiselect = true. When multiselect is set to true, clicking anywhere on a row selects that row
 * @method YsJQGrid _multiselect If this flag is set to true a multi selection of rows is enabled
 * @method YsJQGrid _multiselectWidth Determines the width of the multiselect column if multiselect is set to true
 * @method YsJQGrid _page Set the initial number of page when we make the request
 * @method YsJQGrid _pager Defines that we want to use a pager bar to navigate through the records
 * @method YsJQGrid _pagerpos Determines the position of the pager in the grid
 * @method YsJQGrid _pgbuttons Determines if the Pager buttons should be shown if pager is available
 * @method YsJQGrid _pginput Determines if the input box, where the user can change the number of requested page, should be available
 * @method YsJQGrid _pgtext Show information about current page status. The first value is the current loaded page
 * @method YsJQGrid _prmNames Default values prmNames
 * @method YsJQGrid _postData This array is passed directly to the url
 * @method YsJQGrid _recordpos Determines the exactly number of rows in the grid
 * @method YsJQGrid _records Determines the number of returned records in grid from the request
 * @method YsJQGrid _recordtext Represent information that can be shown in the pager
 * @method YsJQGrid _reccount Determines the exactly number of rows in the grid
 * @method YsJQGrid _resizeclass Assigns a class to columns that are resizable so that we can show a resize handle only for ones that are resizable
 * @method YsJQGrid _rowList An array to construct a select box element in the pager in which we can change the number of the visible rows
 * @method YsJQGrid _rownumbers If this option is set to true, a new column at left of the grid is added
 * @method YsJQGrid _rowNum Sets how many records we want to view in the grid
 * @method YsJQGrid _rowTotal When set this parameter can instruct the server to load the total number of rows needed to work on
 * @method YsJQGrid _rownumWidth Determines the width of the row number column if rownumbers option is set to true
 * @method YsJQGrid _savedRow This is read only property and is used in Inline and cell editing modules to store the data, before editing the row or cell
 * @method YsJQGrid _searchdata Deprecated this property contain the searched data in pair name:value
 * @method YsJQGrid _scroll Creates dynamic scrolling grids
 * @method YsJQGrid _scrollOffset Determines the width of the vertical scrollbar
 * @method YsJQGrid _scrollTimeout This control the timeout handler when scroll is set to 1
 * @method YsJQGrid _scrollrows When enabled, selecting a row with setSelection scrolls the grid so that the selected row is visible
 * @method YsJQGrid _selarrrow Determines the currently selected rows when multiselect is set to true
 * @method YsJQGrid _selrow Contain the id of the last selected row
 * @method YsJQGrid _shrinkToFit This option describes the type of calculation of the initial width of each column against with the width of the grid
 * @method YsJQGrid _sortable When enabled this option allow column reordering with mouse
 * @method YsJQGrid _sortname The initial sorting name when we use datatypes xml or json (data returned from server)
 * @method YsJQGrid _sortorder The initial sorting name when we use datatypes xml or json (data returned from server)
 * @method YsJQGrid _subGrid If set to true this enables using a subgrid.
 * @method YsJQGrid _subGridModel This property, which describes the model of the subgrid, has an effect only if the subGrid property is set to true
 * @method YsJQGrid _subGridType This option allow loading subgrid as a service
 * @method YsJQGrid _subGridUrl This option has effect only if subGrid option is set to true
 * @method YsJQGrid _subGridWidth Determines the width of the subGrid column if subgrid is enabled
 * @method YsJQGrid _toolbar This option defines the toolbar of the grid
 * @method YsJQGrid _toppager When enabled this option place a pager element at top of the grid below the caption (if available)
 * @method YsJQGrid _totaltime Measure the loading time of the records - currently available only when we load xml or json data
 * @method YsJQGrid _treedatatype Determines the initial datatype 
 * @method YsJQGrid _treeGrid Enables (disables) the tree grid format
 * @method YsJQGrid _treeGridModel Deteremines the method used for the treeGrid
 * @method YsJQGrid _treeIcons This array set the icons used in the tree
 * @method YsJQGrid _treeReader Extends the colModel defined in the basic grid
 * @method YsJQGrid _tree_root_level Determines the level where the root element begins when treeGrid is enabled
 * @method YsJQGrid _url The url of the file that holds the request
 * @method YsJQGrid _userData The url of the file that holds the request
 * @method YsJQGrid _userDataOnFooter This array contain custom information from the request
 * @method YsJQGrid _viewrecords If true, jqGrid displays the beginning and ending record number in the grid, out of the total number of records in the query
 * @method YsJQGrid _viewsortcols The purpose of this parameter is to define different look and behavior of sorting icons that appear near the header
 * @method YsJQGrid _width The purpose of this parameter is to define different look and behavior of sorting icons that appear near the header
 * @method YsJQGrid _xmlReader Array which describes the structure of the expected xml data
 * @method YsJQGrid _subGridOptions A set of additional options for the subgrid
 * @method YsJQGrid _cmTemplate Defines a set of properties which overwrite the default values in column Model
 * @method YsJQGrid _afterInsertRow This event fires after every inserted row
 * @method YsJQGrid _beforeProcessing This event fire before proccesing the data from the server
 * @method YsJQGrid _beforeRequest This event fire before requesting any data
 * @method YsJQGrid _beforeSelectRow This event fire when the user click on the row
 * @method YsJQGrid _gridComplete This fires after all the data is loaded into the grid and all other processes are complete
 * @method YsJQGrid _loadBeforeSend A pre-callback to modify the XMLHttpRequest object (xhr) before it is sent
 * @method YsJQGrid _loadComplete This event is executed immediately after every server request
 * @method YsJQGrid _loadError A function to be called if the request fails
 * @method YsJQGrid _onCellSelect Fires when we click on particular cell in the grid
 * @method YsJQGrid _ondblClickRow Raised immediately after row was double clicked
 * @method YsJQGrid _onHeaderClick Fire after clicking to hide or show grid (hidegrid:true)
 * @method YsJQGrid _onPaging Fire after clicking to hide or show grid (hidegrid:true)
 * @method YsJQGrid _onRightClickRow Raised immediately after row was right clicked
 * @method YsJQGrid _onSelectAll This event fires when multiselect option is true and you click on the header checkbox
 * @method YsJQGrid _onSelectRow Raised immediately after row was clicked
 * @method YsJQGrid _onSortCol Raised immediately after sortable column was clicked and before sorting the data. 
 * @method YsJQGrid _resizeStart Event which is called when we start resize a column
 * @method YsJQGrid _resizeStop Event which is called after the column is resized
 * @method YsJQGrid _serializeGridData If set this event can serialize the data passed to the ajax request
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQGrid extends YsJQueryPlugin {

  const VERSION = "4.1.2";
  const LICENSE = "MIT and GPL licenses";

  public static $event = 'jqGrid';
  public static $filterToolbarEvent = 'filterToolbar';
  public static $getGridParamEvent = 'getGridParam';
  public static $setGridParamEvent = 'setGridParam';
  public static $triggerEvent  = 'trigger';

  public function registerOptions(){
    return   array(
              //options
               '_ajaxGridOptions' =>  array('key' => 'ajaxGridOptions', 'is_quoted' => false),
               '_ajaxSelectOptions' =>  array('key' => 'ajaxSelectOptions', 'is_quoted' => false),
               '_altclass' =>  array('key' => 'altclass', 'is_quoted' => false),
               '_altRows' =>  array('key' => 'altRows', 'is_quoted' => false),
               '_autoencode' =>  array('key' => 'autoencode', 'is_quoted' => false),
               '_autowidth' =>  array('key' => 'autowidth', 'is_quoted' => false),
               '_caption' =>  array('key' => 'caption', 'is_quoted' => false),
               '_cellLayout' =>  array('key' => 'cellLayout', 'is_quoted' => false),
               '_cellEdit' =>  array('key' => 'cellEdit', 'is_quoted' => false),
               '_cellsubmit' =>  array('key' => 'cellsubmit', 'is_quoted' => false),
               '_cellurl' =>  array('key' => 'cellurl', 'is_quoted' => false),
               '_colModel' =>  array('key' => 'colModel', 'is_quoted' => false),
               '_colNames' =>  array('key' => 'colNames', 'is_quoted' => false),
               '_data' =>  array('key' => 'data', 'is_quoted' => false),
               '_datastr' =>  array('key' => 'datastr', 'is_quoted' => false),
               '_datatype' =>  array('key' => 'datatype', 'is_quoted' => false),
               '_deepempty' =>  array('key' => 'deepempty', 'is_quoted' => false),
               '_deselectAfterSort' =>  array('key' => 'deselectAfterSort', 'is_quoted' => false),
               '_direction' =>  array('key' => 'direction', 'is_quoted' => false),
               '_editurl' =>  array('key' => 'editurl', 'is_quoted' => false),
               '_emptyrecords' =>  array('key' => 'emptyrecords', 'is_quoted' => false),
               '_ExpandColClick' =>  array('key' => 'ExpandColClick', 'is_quoted' => false),
               '_ExpandColumn' =>  array('key' => 'ExpandColumn', 'is_quoted' => false),
               '_footerrow' =>  array('key' => 'footerrow', 'is_quoted' => false),
               '_forceFit' =>  array('key' => 'forceFit', 'is_quoted' => false),
               '_gridstate' =>  array('key' => 'gridstate', 'is_quoted' => false),
               '_gridview' =>  array('key' => 'gridview', 'is_quoted' => false),
               '_grouping' =>  array('key' => 'grouping', 'is_quoted' => false),
               '_groupingView' =>  array('key' => 'groupingView', 'is_quoted' => false),
               '_headertitles' =>  array('key' => 'headertitles', 'is_quoted' => false),
               '_height' =>  array('key' => 'height', 'is_quoted' => false),
               '_hiddengrid' =>  array('key' => 'hiddengrid', 'is_quoted' => false),
               '_hidegrid' =>  array('key' => 'hidegrid', 'is_quoted' => false),
               '_hoverrows' =>  array('key' => 'hoverrows', 'is_quoted' => false),
               '_ignoreCase' =>  array('key' => 'ignoreCase', 'is_quoted' => false),
               '_inlineData' =>  array('key' => 'inlineData', 'is_quoted' => false),
               '_jsonReader' =>  array('key' => 'jsonReader', 'is_quoted' => false),
               '_lastpage' =>  array('key' => 'lastpage', 'is_quoted' => false),
               '_lastsort' =>  array('key' => 'lastsort', 'is_quoted' => false),
               '_loadonce' =>  array('key' => 'loadonce', 'is_quoted' => false),
               '_loadtext' =>  array('key' => 'loadtext', 'is_quoted' => false),
               '_loadui' =>  array('key' => 'loadui', 'is_quoted' => false),
               '_mtype' =>  array('key' => 'mtype', 'is_quoted' => false),
               '_multikey' =>  array('key' => 'multikey', 'is_quoted' => false),
               '_multiboxonly' =>  array('key' => 'multiboxonly', 'is_quoted' => false),
               '_multiselect' =>  array('key' => 'multiselect', 'is_quoted' => false),
               '_multiselectWidth' =>  array('key' => 'multiselectWidth', 'is_quoted' => false),
               '_page' =>  array('key' => 'page', 'is_quoted' => false),
               '_pager' =>  array('key' => 'pager', 'is_quoted' => false),
               '_pagerpos' =>  array('key' => 'pagerpos', 'is_quoted' => false),
               '_pgbuttons' =>  array('key' => 'pgbuttons', 'is_quoted' => false),
               '_pginput' =>  array('key' => 'pginput', 'is_quoted' => false),
               '_pgtext' =>  array('key' => 'pgtext', 'is_quoted' => false),
               '_prmNames' =>  array('key' => 'prmNames', 'is_quoted' => false),
               '_postData' =>  array('key' => 'postData', 'is_quoted' => false),
               '_recordpos' =>  array('key' => 'recordpos', 'is_quoted' => false),
               '_records' =>  array('key' => 'records', 'is_quoted' => false),
               '_recordtext' =>  array('key' => 'recordtext', 'is_quoted' => false),
               '_reccount' =>  array('key' => 'reccount', 'is_quoted' => false),
               '_resizeclass' =>  array('key' => 'resizeclass', 'is_quoted' => false),
               '_rowList' =>  array('key' => 'rowList', 'is_quoted' => false),
               '_rownumbers' =>  array('key' => 'rownumbers', 'is_quoted' => false),
               '_rowNum' =>  array('key' => 'rowNum', 'is_quoted' => false),
               '_rowTotal' =>  array('key' => 'rowTotal', 'is_quoted' => false),
               '_rownumWidth' =>  array('key' => 'rownumWidth', 'is_quoted' => false),
               '_savedRow' =>  array('key' => 'savedRow', 'is_quoted' => false),
               '_searchdata' =>  array('key' => 'searchdata', 'is_quoted' => false),
               '_scroll' =>  array('key' => 'scroll', 'is_quoted' => false),
               '_scrollOffset' =>  array('key' => 'scrollOffset', 'is_quoted' => false),
               '_scrollTimeout' =>  array('key' => 'scrollTimeout', 'is_quoted' => false),
               '_scrollrows' =>  array('key' => 'scrollrows', 'is_quoted' => false),
               '_selarrrow' =>  array('key' => 'selarrrow', 'is_quoted' => false),
               '_selrow' =>  array('key' => 'selrow', 'is_quoted' => false),
               '_shrinkToFit' =>  array('key' => 'shrinkToFit', 'is_quoted' => false),
               '_sortable' =>  array('key' => 'sortable', 'is_quoted' => false),
               '_sortname' =>  array('key' => 'sortname', 'is_quoted' => false),
               '_sortorder' =>  array('key' => 'sortorder', 'is_quoted' => false),
               '_subGrid' =>  array('key' => 'subGrid', 'is_quoted' => false),
               '_subGridModel' =>  array('key' => 'subGridModel', 'is_quoted' => false),
               '_subGridType' =>  array('key' => 'subGridType', 'is_quoted' => false),
               '_subGridUrl' =>  array('key' => 'subGridUrl', 'is_quoted' => false),
               '_subGridWidth' =>  array('key' => 'subGridWidth', 'is_quoted' => false),
               '_toolbar' =>  array('key' => 'toolbar', 'is_quoted' => false),
               '_toppager' =>  array('key' => 'toppager', 'is_quoted' => false),
               '_totaltime' =>  array('key' => 'totaltime', 'is_quoted' => false),
               '_treedatatype' =>  array('key' => 'treedatatype', 'is_quoted' => false),
               '_treeGrid' =>  array('key' => 'treeGrid', 'is_quoted' => false),
               '_treeGridModel' =>  array('key' => 'treeGridModel', 'is_quoted' => false),
               '_treeIcons' =>  array('key' => 'treeIcons', 'is_quoted' => false),
               '_treeReader' =>  array('key' => 'treeReader', 'is_quoted' => false),
               '_tree_root_level' =>  array('key' => 'tree_root_level', 'is_quoted' => false),
               '_url' =>  array('key' => 'url', 'is_quoted' => false),
               '_userData' =>  array('key' => 'userData', 'is_quoted' => false),
               '_userDataOnFooter' =>  array('key' => 'userDataOnFooter', 'is_quoted' => false),
               '_viewrecords' =>  array('key' => 'viewrecords', 'is_quoted' => false),
               '_viewsortcols' =>  array('key' => 'viewsortcols', 'is_quoted' => false),
               '_width' =>  array('key' => 'width', 'is_quoted' => false),
               '_xmlReader' =>  array('key' => 'xmlReader', 'is_quoted' => false),
               '_subGridOptions' =>  array('key' => 'subGridOptions', 'is_quoted' => false),  
               '_cmTemplate' =>  array('key' => 'cmTemplate', 'is_quoted' => false),  
               '_idPrefix' =>  array('key' => 'idPrefix', 'is_quoted' => false),
              //events
               '_afterInsertRow' =>  array('key' => 'afterInsertRow', 'is_quoted' => false),
               '_beforeProcessing' =>  array('key' => 'beforeProcessing', 'is_quoted' => false),
               '_beforeRequest' =>  array('key' => 'beforeRequest', 'is_quoted' => false),
               '_beforeSelectRow' =>  array('key' => 'beforeSelectRow', 'is_quoted' => false),
               '_gridComplete' =>  array('key' => 'gridComplete', 'is_quoted' => false),
               '_loadBeforeSend' =>  array('key' => 'loadBeforeSend', 'is_quoted' => false),
               '_loadComplete' =>  array('key' => 'loadComplete', 'is_quoted' => false),
               '_loadError' =>  array('key' => 'loadError', 'is_quoted' => false),
               '_onCellSelect' =>  array('key' => 'onCellSelect', 'is_quoted' => false),
               '_ondblClickRow' =>  array('key' => 'ondblClickRow', 'is_quoted' => false),
               '_onHeaderClick' =>  array('key' => 'onHeaderClick', 'is_quoted' => false),
               '_onPaging' =>  array('key' => 'onPaging', 'is_quoted' => false),
               '_onRightClickRow' =>  array('key' => 'onRightClickRow', 'is_quoted' => false),
               '_onSelectAll' =>  array('key' => 'onSelectAll', 'is_quoted' => false),
               '_onSelectRow' =>  array('key' => 'onSelectRow', 'is_quoted' => false),
               '_onSortCol' =>  array('key' => 'onSortCol', 'is_quoted' => false),
               '_resizeStart' =>  array('key' => 'resizeStart', 'is_quoted' => false),
               '_resizeStop' =>  array('key' => 'resizeStop', 'is_quoted' => false),
               '_serializeGridData' =>  array('key' => 'serializeGridData', 'is_quoted' => false));
  }

  /**
   * Retrieves a instance of this class.
   * @return YsJQGrid
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }

  public static function build($options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    if($options !== null){
      $jquery->setOptions($options);
    }
    return $jquery;
  }

  public static function filterGrid($options, $newApi = false){
    $jquery = new YsJQueryCore();
    if($newApi){
      $jquery->setEvent(self::$event);
      $jquery->addArgument(new YsArgument(self::$filterToolbarEvent));
    }else{
      $jquery->setEvent(self::$filterToolbarEvent);
    }
    $jquery->addArgument(new YsArgument($options));
    return $jquery;
  }

  public static function navGrid($args){
    $funcArgs = func_get_args();
    $args = array_merge(array('navGrid'),$funcArgs);
    return self::setAndGetMethods($args);
  }

  public static function navButtonAdd($args){
    $funcArgs = func_get_args();
    $args = array_merge(array('navButtonAdd'),$funcArgs);
    return self::setAndGetMethods($args);
  }
  
  public static function bindKeys($args){
    $funcArgs = func_get_args();
    $args = array_merge(array('bindKeys'),$funcArgs);
    return self::setAndGetMethods($args);
  }

  public static function navSeparatorAdd($args){
    $funcArgs = func_get_args();
    $args = array_merge(array('navSeparatorAdd'),$funcArgs);
    return self::setAndGetMethods($args);
  }

  public static function buildMethod($args){
    return self::setAndGetMethods(func_get_args());
  }

  public static function buildMethodForGrid($args){
    $funcArgs = func_get_args();
    if(isset($funcArgs[0]) && is_array($funcArgs[0])){
      $i=0;
      $arrayArgs = array();
      foreach($funcArgs[0] as $funcArg){
        $arrayArgs[$i++] = $funcArg;
      }
      $funcArgs = array();
      $funcArgs = $arrayArgs;
    }
    return self::setAndGetMethods($funcArgs);
  }
  
  private static function setAndGetMethods($arguments){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$event);
    foreach($arguments as $argument){
      $jquery->addArgument(new YsArgument($argument));
    }
    return $jquery;
  }

  public static function trigger($triggerName,$options = null){
    $jquery = new YsJQueryCore();
    $jquery->setEvent(self::$triggerEvent);
    $jquery->addArgument(new YsArgument($triggerName));
    $jquery->addArgument(new YsArgument($options));
    return $jquery;
  }

  public static function reloadGrid($jQuerySelector, $options = null){
    return new YsJQueryDynamic(YsJQGrid::build(null)->in($jQuerySelector), YsJQGrid::trigger('reloadGrid', $options));
  }

}