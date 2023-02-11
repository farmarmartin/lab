<?php
interface Pushable{
    public function push(mixed $value);
    public function pop(): mixed;
}

class Lifo implements Pushable{
    private $lifo = [];
    public function __construct(){
        $this->lifo = [];
    }
    public function push(mixed $value){
        array_push($this->lifo, $value);
        return $this;
    }
    public function pop(): mixed{
        echo array_pop($this->lifo);
        return $this;
    }
} 
$lifo = (new Lifo)->push(4)->push(6)->push(2)->pop();


class Fifo implements Pushable{
    public $fifo = [];

    public function __construct(){
        $this->fifo = [];
    }
    public function push(mixed $value){
        array_push($this->fifo, $value);
        return $this;
    }

    public function pop(): mixed{
        /*echo $this->fifo[0];
        unset($this->fifo[0]);
        array_values($this->fifo)[0];
        */
        echo array_shift($this->fifo);
        array_values($this->fifo);
        return $this;
    }
}

$fifo = (new Fifo)->push(1)->push(2)->push(3)->push(4)->pop();;
var_dump($fifo);
