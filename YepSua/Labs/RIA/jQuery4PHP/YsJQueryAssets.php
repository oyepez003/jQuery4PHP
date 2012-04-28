<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsJQueryAssets todo description.
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsJQueryAssets {

  public static function loadScriptsOnReady($srciptsNames, $callback = null){
    $sintax = self::loadSciptsSintax($srciptsNames, $callback);
    return YsJQuery::newInstance()->execute($sintax);
  }

  public static function loadScripts($srciptsNames, $callback = null){
    $sintax = self::loadSciptsSintax($srciptsNames, $callback);
    return $sintax;
  }

  private static function loadSciptsSintax($srciptsNames, $callback = null){
    $sintax = null;
    if(is_array($srciptsNames)){
      $assets = array();
      $i = 0;
      foreach($srciptsNames as $srcipt){
        $assets[$i++] = (string) YsJQuery::getScript($srcipt);
      }
      if($callback !== null){
        $assets[$i] = $callback;
      }
      $dinamic = new YsJQueryDynamic();
      $sintax = $dinamic->build($assets);
    }else{
      $sintax = YsJQuery::getScript($srciptsNames, new YsJsFunction($callback));
    }
    return $sintax;
  }

}
?>
