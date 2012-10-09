<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Allows you to upload files using HTML5 Gears, Silverlight, Flash, 
 * BrowserPlus or normal forms, providing some unique features such as upload 
 * progress, image resizing and chunked uploads.
 *
 * @method YsUpload _runtimes This is a comma separated list of runtimes that you want to initialize the uploader instance with. It will try to initialize each runtime in order if one fails it will move on to the next one.
 * @method YsUpload _url Page URL to where the files will be uploaded to.
 * @method YsUpload _maxFileSize Maximum file size that the user can pick. This string can be in the following formats 100b, 10kb, 10mb.
 * @method YsUpload _chunkSize Enables you to chunk the file into smaller pieces for example if your PHP backend has a max post size of 1MB you can chunk a 10MB file into 10 requests. To disable chunking, remove this config option from your setup.
 * @method YsUpload _uniqueNames Generate unique filenames when uploading. This will generate unqiue filenames for the files so that they don't for example collide with existing ones on the server.
 * @method YsUpload _resize Enables plupload to resize the images to clientside to the specified width, height and quality. Set this to an object with those parameters.
 * @method YsUpload _filters List of filters to apply when the user selects files. This is currently file extension filters there are two items for each filter. title and extensions.
 * @method YsUpload _flashSwfUrl URL to where the SWF file is for the Flash runtime.
 * @method YsUpload _silverlightXapUrl URL to where the XAP file is for the Silverlight runtime.
 * @method YsUpload _browseButton String with the ID of the browse button. Flash, HTML 5 and Silverlight requires a shim so you need to specify the id of the button that the shim will be placed above for those runtimes. This option is not required for by the queue widget.
 * @method YsUpload _dropElement String with the ID of the element that you want to be able to drop files into this is only used by some runtimes that support it.
 * @method YsUpload _container Element ID to add object elements to, this defaults to the document body element.
 * @method YsUpload _multipart Boolean state if the files should be uploaded using mutlipart instead of direct binary streams. Doesn't work on WebKit using the HTML 5 runtime.
 * @method YsUpload _multipartParams Object name/value collection with arguments to get posted together with the multipart file.
 * @method YsUpload _parameters Object name/value collection with arguments to get posted together with the multipart file.
 * @method YsUpload _requiredFeatures Comma separated list of features that each runtime must have for it to initialize.
 * @method YsUpload _headers Name/value object with custom headers to add to HTTP requests.
 * 
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsUpload extends YsJQueryPlugin {

  const VERSION = "1.5.4";
  const LICENSE = "GPLv2";


  public static $event = 'plupload';
  public static $DEFAULT_RUNTIMES = "html5";
  
  public function registerOptions(){
    return   array(
              //options
               '_runtimes' =>  array('key' => 'runtimes', 'is_quoted' => false),
               '_url' =>  array('key' => 'url', 'is_quoted' => false),
               '_action' =>  array('key' => 'url', 'is_quoted' => false),
               '_maxFileSize' =>  array('key' => 'max_file_size', 'is_quoted' => false),
               '_chunkSize' =>  array('key' => 'chunk_size', 'is_quoted' => false),
               '_uniqueNames' =>  array('key' => 'unique_names', 'is_quoted' => false),
               '_resize' =>  array('key' => 'resize', 'is_quoted' => false),
               '_filtersOption' =>  array('key' => 'filters', 'is_quoted' => false),
               '_flashSwfUrl' =>  array('key' => 'flash_swf_url', 'is_quoted' => false),
               '_silverlightXapUrl' =>  array('key' => 'silverlight_xap_url', 'is_quoted' => false),
               '_browseButton' =>  array('key' => 'browse_button', 'is_quoted' => false),
               '_dropElement' =>  array('key' => 'drop_element', 'is_quoted' => false),
               '_container' =>  array('key' => 'container', 'is_quoted' => false),
               '_multipart' =>  array('key' => 'multipart', 'is_quoted' => false),
               '_parameters' =>  array('key' => 'multipart_params', 'is_quoted' => false),
               '_multipartParams' =>  array('key' => 'multipart_params', 'is_quoted' => false),
               '_requiredFeatures' =>  array('key' => 'required_features', 'is_quoted' => false),
               '_headers' =>  array('key' => 'headers', 'is_quoted' => false),
               '_preinit' =>  array('key' => 'preinit', 'is_quoted' => false),
               '_dragdrop' =>  array('key' => 'dragdrop', 'is_quoted' => false),
               '_rename' =>  array('key' => 'rename', 'is_quoted' => false),
               '_multipleQueues' =>  array('key' => 'multiple_queues', 'is_quoted' => false),
               '_urlstreamUpload' =>  array('key' => 'urlstream_upload', 'is_quoted' => false),
              );
  }

  /**
   * Retrieves a instance of this class.
   * @return YsUpload
   */
  public static function getInstance()
  {
    $object = __CLASS__;
    self::$instance = new $object();
    return self::$instance;
  }
  
  /**
   *
   * @param type $jQuerySelector
   * @param type $options
   * @return YsUpload 
   */
  public static function build($jQuerySelector = null,$options = null){
    $jquery = self::getInstance();
    $jquery->setEvent(self::$event);
    $jquery->_runtimes(self::$DEFAULT_RUNTIMES);
    if($jQuerySelector !== null){
        $jquery->setEvent(self::$blockEvent);
        $jquery->setSelector($jQuerySelector);
    }
    if($options !== null){
        $jquery->setOptions($options);
    }
    return $jquery;
  }
  
  public function _filters($value){
    $value = (is_array($value)) ? $value : array(array('title' => 'Files', 'extensions' => $value));
    $this->_filtersOption($value);
    return $this;
  }
}