<?php
/*
 * This file is part of the YepSua package.
 * (c) 2009-2012 Omar Yepez <omar.yepez@yepsua.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * YsPlotPointLabels  todo description
 *
 *
 * @package    YepSua
 * @subpackage jQuery4PHP
 * @author     Omar Yepez <omar.yepez@yepsua.com>
 * @version    SVN: $Id$
 */
class YsPlotPointLabels extends YsComponentOption{

  private $show;
  private $location;
  private $labelsFromSeries;
  private $seriesLabelIndex;
  private $labels;
  private $stackedValue;
  private $ypadding;
  private $xpadding;
  private $escapeHTML;
  private $edgeTolerance;
  private $formatter;
  private $formatString;
  private $hideZeros;


  public function  __construct($location = null) {
    if($location !== null){
      $this->location = $location;
    }
    $this->show = true;
  }

  public function getShow() {
    return $this->show;
  }

  /**
   * Show the labels or not.
   * @param boolean $show
   */
  public function setShow($show) {
    $this->show = $show;
  }

  public function getLocation() {
    return $this->location;
  }

  /**
   * Compass location where to position the label around the point.
   * @param YsLocation $location
   */
  public function setLocation($location) {
    $this->location = $location;
  }

  public function getLabelsFromSeries() {
    return $this->labelsFromSeries;
  }

  /**
   * true to use labels within data point arrays.
   * @param boolean $labelsFromSeries
   */
  public function setLabelsFromSeries($labelsFromSeries) {
    $this->labelsFromSeries = $labelsFromSeries;
  }

  public function getSeriesLabelIndex() {
    return $this->seriesLabelIndex;
  }

  /**
   * Array index for location of labels within data point arrays.
   * @param array $seriesLabelIndex
   */
  public function setSeriesLabelIndex($seriesLabelIndex) {
    $this->seriesLabelIndex = $seriesLabelIndex;
  }

  public function getLabels() {
    return $this->labels;
  }

  /**
   * Array of arrays of labels, one array for each series.
   * @param array $labels
   */
  public function setLabels($labels) {
    $this->labels = $labels;
  }

  public function getStackedValue() {
    return $this->stackedValue;
  }

  /**
   * true to display value as stacked in a stacked plot.
   * @param boolean $stackedValue
   */
  public function setStackedValue($stackedValue) {
    $this->stackedValue = $stackedValue;
  }

  public function getYPadding() {
    return $this->ypadding;
  }

  /**
   * Vertical padding in pixels between point and label
   * @param integer $ypadding
   */
  public function setYPadding($ypadding) {
    $this->ypadding = $ypadding;
  }

  public function getXPadding() {
    return $this->xpadding;
  }

  /**
   * Horizontal padding in pixels between point and label
   * @param integer $xpadding
   */
  public function setXPadding($xpadding) {
    $this->xpadding = $xpadding;
  }

  public function getEscapeHTML() {
    return $this->escapeHTML;
  }

  /**
   * true to escape html entities in the labels.
   * @param boolean $escapeHTML
   */
  public function setEscapeHTML($escapeHTML) {
    $this->escapeHTML = $escapeHTML;
  }

  public function getEdgeTolerance() {
    return $this->edgeTolerance;
  }

  /**
   * Number of pixels that the label must be away from an axis boundary in
   * order to be drawn.
   * @param integer $edgeTolerance
   */
  public function setEdgeTolerance($edgeTolerance) {
    $this->edgeTolerance = $edgeTolerance;
  }

  public function getFormatter() {
    return $this->formatter;
  }

  /**
   * A class of a formatter for the tick text.
   * @param YsJQuery $formatter YsPlot::getDefaultTickFormatter()
   */
  public function setFormatter($formatter) {
    $this->formatter = $formatter;
  }

  public function getFormatString() {
    return $this->formatString;
  }

  /**
   * string passed to the formatter.
   * @param string $formatString
   */
  public function setFormatString($formatString) {
    $this->formatString = $formatString;
  }

  public function getHideZeros() {
    return $this->hideZeros;
  }

  /**
   * true to not show a label for a value which is 0.
   * @param boolean $hideZeros
   */
  public function setHideZeros($hideZeros) {
    $this->hideZeros = $hideZeros;
  }
  
  public function optionsToArray(){
    $config = array();
    $vars = get_class_vars(__CLASS__);
    foreach ($this->varsToUnset() as $value) {
      unset($vars[$value]);
    }
    foreach ($vars as $var => $value) {
      if (isset($this->$var)) {
        $config[$var] = $this->$var;
      }
    }
    return $config;
  }
}