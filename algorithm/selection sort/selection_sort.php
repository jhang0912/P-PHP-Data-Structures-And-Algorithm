<?php

echo '選擇排序法';

class Selection
{
  public $n_array;
  public $array;
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
    $array = [];

    for ($i = 0; $i < $this->n_count; $i++) {
      $min = min($this->n_array);
      $array[$i] = $min;
      $key = array_keys($this->n_array, $min);
      unset($this->n_array[$key[0]]);
    }

    $this->n_array = $array;
  }

  /* recursion method */
  public function selection_sort_recursion($round)
  {
    if ($round >= $this->n_count) {
      return;
    }

    $min = min($this->n_array);
    $this->array[$round] = $min;
    $key = array_keys($this->n_array, $min);
    unset($this->n_array[$key[0]]);
    
    $this->selection_sort_recursion($round + 1);
  }
}

$selection = new Selection([18, 12, 8, 2, 14, 6, 10, 16, 4, 20]);
$selection->selection_sort_recursion(0);

echo '<pre>';
print_r($selection->array);
echo '</pre>';
