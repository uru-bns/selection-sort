<?php

$data = explode(',', $argv[1]);
$order_by_ascending = strtolower($argv[2]) == 'a' ? true : false;

$data = [8, 10, -1, 1, 5, 9];
$data_a = [-1, 1, 5, 8, 9, 10];
$data_d = [10, 9, 8, 5, 1, -1];
var_dump(empty(array_diff($data_a, selection_sort($data, true))));
var_dump(empty(array_diff($data_a, selection_sort2($data, true))));
var_dump(empty(array_diff($data_d, selection_sort($data, false))));
var_dump(empty(array_diff($data_d, selection_sort2($data, false))));

print_r(selection_sort($data, $order_by_ascending));
print_r(selection_sort2($data, $order_by_ascending));

function selection_sort($data, $order_by_ascending)
{
  $work_data = $data;
  $start = 0;
  $end = count($work_data) - 1;

  while ($start < $end) {
    for ($i = $start + 1; $i <= $end; $i++) {
      if ($order_by_ascending) {
        if ((int)$work_data[$start] > (int)$work_data[$i]) {
          $tmp = $work_data[$start];
          $work_data[$start] = $work_data[$i];
          $work_data[$i] = $tmp;
        }
      }
      else {
        if ((int)$work_data[$start] < (int)$work_data[$i]) {
          $tmp = $work_data[$start];
          $work_data[$start] = $work_data[$i];
          $work_data[$i] = $tmp;
        }
      }
    }

    $start++;
  }

  return $work_data;
}

function selection_sort2($data, $order_by_ascending)
{
  $work_data = $data;
  $start = 0;
  $end = count($work_data) - 1;

  while ($start < $end) {
    for ($i = $start + 1; $i <= $end; $i++) {
      if (is_swappable($work_data[$start], $work_data[$i], $order_by_ascending)) {
        swap($work_data[$start], $work_data[$i]);
      }
    }

    $start++;
  }

  return $work_data;
}

function is_swappable($a, $b, $order_by_ascending)
{
  return $order_by_ascending ? (int)$a > (int)$b : (int) $a < (int)$b;
}

function swap(&$a, &$b)
{
  $tmp = $a;
  $a = $b;
  $b = $tmp;
}
