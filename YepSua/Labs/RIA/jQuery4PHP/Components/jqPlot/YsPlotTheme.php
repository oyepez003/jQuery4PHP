<?php

/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * YsPlotTheme todo description
 * 
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotTheme extends YsPlot{

  private $themeName;

  public function  __construct($themeName) {
    parent::__construct($themeName);
    $this->themeName = $themeName;
  }

  public function getThemeName() {
    return $this->themeName;
  }

  /**
   * The Theme name
   * @param string $themeName
   */
  public function setThemeName($themeName) {
    $this->themeName = $themeName;
  }

}