<?php

echo '選擇排序法';

class Selection
{
  public $n_array;
  public $n_count;
  public $n_max;
  public $c = 0;

  public function __construct(array $array)
  {
    $this->n_array = $array;
    $this->n_count = count($this->n_array);
  }

  /* loop method */
  public function selection_sort()
  {
    for ($i = 0; $i < $this->n_count; $i++) {
      $this->n_max = $i;
      for ($k = $i; $k < $this->n_count; $k++) {
        if ($this->n_array[$k] < $this->n_array[$this->n_max]) {
          $this->n_max = $k;
        }
      }
      $this->swap($i, $this->n_max);
    }
  }

  /* recursion method */
  public function selection_sort_recursion($round)
  {
    if ($round >= $this->n_count) {
      return;
    }

    $this->n_max = $round;

    for ($k = $round; $k < $this->n_count; $k++) {
      if ($this->n_array[$k] < $this->n_array[$this->n_max]) {
        $this->n_max = $k;
      }
    }

    $this->swap($round, $this->n_max);

    print_r($this->n_array) . '<br>';
    echo ($this->c += 1) . ' end<br>';

    $this->selection_sort_recursion($round + 1);
  }

  /* swap array number position*/
  public function swap($left, $right)
  {
    $tmp = $this->n_array[$left];
    $this->n_array[$left] = $this->n_array[$right];
    $this->n_array[$right] = $tmp;
  }
}

$selection = new Selection([8, 2, 6, 10, 4, 12]);

echo '<pre>';
$selection->selection_sort_recursion(0);
echo '</pre>';
