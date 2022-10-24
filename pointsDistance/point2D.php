<?php 
class Point2D{
    public $x;
    public $y;


    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
    }

    public function setPosition(int $x, $y){
        $this->x = $x;
        $this->y = $y;
    }

    static public function dist(Point2D $A, Point2D $B){
        return sqrt(abs(pow($A->x, 2) - pow($B->x, 2)) + abs(pow($A->y, 2) - pow($B->y, 2)));
    }

    public function distTo(Point2D $B){
        return self::dist($this, $B);
    }
}

?>