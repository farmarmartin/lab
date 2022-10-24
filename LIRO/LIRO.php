<?php
class LIRO{
    public $stack = [];

    public function __construct()
    {
        $this->stack = null;
    }

    public function push($where, $value){
        $this->stack = $where;
        return array_push($where, $value);
    }

    public function pop($where){
        $r = rand(0, count($where));
        echo $where[$r];
        unset($where[rand(0, $r)]);
    }

    public function clear(){
        $this->stack = null;
    }
}
