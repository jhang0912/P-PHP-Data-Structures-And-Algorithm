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
    if (empty($this->stackArray[0])) {
      $this->stackArray[0] = $value;
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

$stack = new StackArray([]);

echo '<pre>';
print_r($stack->stackArray);
print_r($stack->push(4));
print_r($stack->push(5));
print_r($stack->push(6));
print_r($stack->pop());
print_r($stack->pop());
print_r($stack->push(7));
print_r($stack->push(8));
print_r($stack->pop());
echo '</pre>';
