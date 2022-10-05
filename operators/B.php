<?php
class B{
    public static function and($x, $y){
        return ($x and $y);
    }

    public static function or($x, $y){
        return $x or $y;
    }

    public static function xor($x, $y){
        return !($x xor $y);
    }

    public static function nor($x, $y){
        return !B::or($x, $y);
    }

    public static function nand($x, $y){
        return !B::and($x, $y);
    }

    public static function not($x){
        return !$x;
    }
}
?>