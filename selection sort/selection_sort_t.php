<?php

echo '選擇排序法';

class Selection
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
  public function selection_sort()
  {
    for ($i = 0; $i < $this->n_count; $i++) {
      $n_max = $i;
      for ($k = $i; $k < $this->n_count; $k++) {
        if ($this->n_array[$k] < $this->n_array[$n_max]) {
          $n_max = $k;
        }
      }
      $this->swap($i, $n_max);
    }
  }

  /* recursion method */
  public function selection_sort_recursion($round)
  {
  }

  /* swap array number position*/
  public function swap($left, $right)
  {
    $tmp = $this->n_array[$left];
    $this->n_array[$left] = $this->n_array[$right];
    $this->n_array[$right] = $tmp;
  }
}

$selection = new Selection([8, 2, 6, 10, 4]);
$selection->selection_sort();

echo '<pre>';
print_r($selection->n_array);
echo '</pre>';
