<?php

class Insertion
{
  public $n_array;
  public $n_count;

  public function __construct(array $array)
  {
    $this->n_array = $array;
    $this->n_count = count($this->n_array);
  }

  public function insertion_sort()
  {
    for ($i = 1; $i < $this->n_count; $i++) {
      for ($k = $i; $k > 0; $k--) {
        if ($this->n_array[$k - 1] > $this->n_array[$k]) {
          $this->swap($k - 1, $k);
          print_r($this->n_array);
        }
      }
      echo $i . 'end<br>';
    }
  }

  /* swap array number position*/
  public function swap($left, $right)
  {
    $tmp = $this->n_array[$left];
    $this->n_array[$left] = $this->n_array[$right];
    $this->n_array[$right] = $tmp;
  }
}

$insetion = new Insertion([8, 2, 6, 10, 4]);

echo '<pre>';
print_r($insetion->insertion_sort());
echo '</pre>';
