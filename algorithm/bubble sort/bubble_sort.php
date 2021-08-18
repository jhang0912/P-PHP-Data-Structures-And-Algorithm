<?php

echo '氣泡排序法';

class Bubble
{
  public $n_array;
  public $n_count;
  public $c = 0;

  public function __construct(array $array)
  {
    $this->n_array = $array;
    $this->n_count = count($this->n_array);
  }

  /* loop method */
  public function bubble_sort()
  {
    for ($i = 0; $i < count($this->n_array); $i++) {
      for ($k = 1; $k < $this->n_count; $k++) {
        if ($this->n_array[$k - 1] > $this->n_array[$k]) {
          $this->swap($k - 1, $k);
          print_r($this->n_array);
          echo ($this->c += 1) . ' end<br>';
        }
      }
      $this->n_count--;
    }
  }

  /* recursion method */
  public function bubble_sort_recursion(int $round)
  {
    if ($round > count($this->n_array)) {
      return;
    }

    for ($k = 1; $k < $this->n_count; $k++) {
      if ($this->n_array[$k - 1] > $this->n_array[$k]) {
        $this->swap($k - 1, $k);
        print_r($this->n_array);
        echo ($this->c += 1) . ' end<br>';
      }
    }
    
    $this->n_count--;

    $this->bubble_sort_recursion($round + 1);
  }

  /* swap array number position */
  public function swap($left, $right)
  {
    $tmp = $this->n_array[$left];
    $this->n_array[$left] = $this->n_array[$right];
    $this->n_array[$right] = $tmp;
  }
}

$bubble = new Bubble([18, 12, 8, 2, 14, 6, 10, 16, 4, 20]);

echo '<pre>';
print_r($bubble->bubble_sort());
echo '</pre>';
