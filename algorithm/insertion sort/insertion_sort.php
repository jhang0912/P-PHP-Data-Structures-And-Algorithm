<?php

echo '插入排序法';

class Insertion
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
  public function insertion_sort()
  {
    for ($i = 1; $i < $this->n_count; $i++) {
      for ($k = $i; $k > 0; $k--) {
        if ($this->n_array[$k - 1] < $this->n_array[$k]) {
          break;
        }
        
        if ($this->n_array[$k - 1] > $this->n_array[$k]) {
          $this->swap($k - 1, $k);
          print_r($this->n_array);
        }
        echo ($this->c += 1) . ' end<br>';
      }
    }
  }

  /* recursion method */
  public function insertion_sort_recursion($round)
  {
    if ($round >= $this->n_count) {
      return;
    }

    for ($k = $round; $k > 0; $k--) {
      if ($this->n_array[$k - 1] < $this->n_array[$k]) {
        break;
      }
      if ($this->n_array[$k - 1] > $this->n_array[$k]) {
        $this->swap($k - 1, $k);
        print_r($this->n_array);
      }
      echo ($this->c += 1) . ' end<br>';
    }

    $this->insertion_sort_recursion($round + 1);
  }

  /* swap array number position*/
  public function swap($left, $right)
  {
    $tmp = $this->n_array[$left];
    $this->n_array[$left] = $this->n_array[$right];
    $this->n_array[$right] = $tmp;
  }
}

$insetion = new Insertion([18, 12, 8, 2, 14, 6, 10, 16, 4, 20]);

echo '<pre>';
print_r($insetion->insertion_sort_recursion(1));
echo '</pre>';
