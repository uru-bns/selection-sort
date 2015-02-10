<?php

require_once('./selection-sort.php');

class SelectionSortTest extends PHPUnit_Framework_TestCase
{
  private $_data = [8, 10, -1, 1, 5, 9];
  private $_data_a = null;
  private $_data_d = null;

  public function setUp()
  {
    $this->_data_a = $this->_data;
    sort($this->_data_a);
    $this->_data_d = $this->_data;
    rsort($this->_data_d);
  }

  function test_selection_sort()
  {
    $this->assertEquals($this->_data_a, selection_sort($this->_data, true));
    $this->assertEquals($this->_data_d, selection_sort($this->_data, false));
  }

  function test_selection_sort2()
  {
    $this->assertEquals($this->_data_a, selection_sort2($this->_data, true));
    $this->assertEquals($this->_data_d, selection_sort2($this->_data, false));
  }
}
