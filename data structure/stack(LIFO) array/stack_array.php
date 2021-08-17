<?php

class StackArray
{
  public $stackArray;
  public $indexTop = 0;

  public function __construct(array $array)
  {
    foreach ($array as $key => $value) {
      $this->stackArray[$key] = $value;
      $this->indexTop = $key;
    }
  }

  public function push($value)
  {
    if ($this->indexTop == 0) {
      $this->stackArray[0] = $value;
      $this->indexTop++;
    } else {
      $this->indexTop++;
      $this->stackArray[$this->indexTop] = $value;
    }

    return $this->stackArray;
  }

  public function pop()
  {
    if ($this->indexTop == 0) {
      return null;
    } else {
      unset($this->stackArray[$this->indexTop]);
      $this->indexTop--;

      return $this->stackArray;
    }
  }
}

$stack = new StackArray([1, 2, 3]);

echo '<pre>';
print_r($stack->stackArray);
echo $stack->indexTop;
print_r($stack->push(4));
print_r($stack->push(5));
print_r($stack->push(6));
print_r($stack->pop());
print_r($stack->push(7));
echo '</pre>';
