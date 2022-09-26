<?php
class Lifo{
    $stack = [];

    public function push($value){
        array_push($stack, $value);
    }

    public function pop(){
        array_pop($stack);
    }

    public function top(){
        $lastKey = count($stack) - 1;
        echo($stack[$lastKey]);
    }

}
?>