<?php
require "point2D.php";

$pointOne = new Point2D();
$pointOne->setPosition(1, 3);

$pointTwo = new Point2D();
$pointTwo->setPosition(5, -1);

echo Point2D::dist($pointOne, $pointTwo)." ";
echo $pointTwo->distTo($pointOne);