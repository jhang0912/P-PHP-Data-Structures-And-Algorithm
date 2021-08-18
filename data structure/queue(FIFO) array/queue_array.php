<?php

class QueueArray
{
  public $queueArray;
  public $arrayLimit;
  public $i_front = null;
  public $i_end = null;

  public function __construct(array $array)
  {
    $this->arrayLimit = count($array);

    $this->i_front = 0;

    for ($i = 0; $i < $this->arrayLimit; $i++) {
      $this->queueArray[$i] = $array[$i];
      $this->i_end = $i;
    }
  }

  public function offer(int $value)
  {
    if (count(array_filter($this->queueArray)) == $this->arrayLimit) { //陣列位置已滿
      $new_array = [];
      $count = count(array_filter($this->queueArray));

      for ($i = 0; $i < $count; $i++) {
        $new_array[$i] = $this->poll();
      }

      $new_array[] = $value;

      $this->queueArray = $new_array;
      $this->arrayLimit++;
      $this->i_front = 0;
      $this->i_end = count($new_array);

      return;
    }

    if ($this->i_end == $this->arrayLimit - 1) { //i_end 位置在陣列最後一項
      $this->queueArray[0] = $value;
      $this->i_end = 0;
    } else {
      $this->i_end++;
      $this->queueArray[$this->i_end] = $value;
    }
  }

  public function poll()
  {
    if (count(array_filter($this->queueArray)) == 0) {
      return null;
    }

    $poll_number = null;

    if ($this->i_front == $this->i_end) { //陣列內剩一項值
      $poll_number = $this->queueArray[$this->i_front];
      $this->queueArray[$this->i_front] = null;
      $this->i_front = null;
      $this->i_end = null;
    } elseif ($this->i_front == $this->arrayLimit - 1) { //i_front 位置在陣列最後一項
      $poll_number = $this->queueArray[$this->i_front];
      $this->queueArray[$this->i_front] = null;
      $this->i_front = 0;
    } else {
      $poll_number = $this->queueArray[$this->i_front];
      $this->queueArray[$this->i_front] = null;
      $this->i_front++;
    }

    return $poll_number;
  }
}

$queue = new QueueArray([1, 2, 3, 4, 5]);

echo '<pre>';
$queue->poll();
$queue->poll();
$queue->poll();
$queue->poll();
for ($i = 6; $i < 10; $i++) {
  $queue->offer($i);
}
print_r($queue->queueArray) . '<br>';
echo 'front：' . $queue->i_front . '<br>';
echo 'end：' . $queue->i_end . '<br>';
echo 'limit：' . $queue->arrayLimit . '<br>';
echo 'count：' . count(array_filter($queue->queueArray));
echo '</pre>';
