<?php
require "B.php";
try {
    echo "| a | b | f1| f2|xor| or|nor|and|nand|\n";
    echo "|---|---|---|---|---|---|---|---|----|\n";
    for ($a = 0; $a <= 1; $a++) {
        for ($b = 0; $b <= 1; $b++) {
            echo "| $a | $b | ";
            $f = B::or(B::and($a, $b), B::and(B::not($a), B::not($b)));
            echo (int)$f . " | ";
            $f = B::and(B::or(B::not($a), $b), B::or($a, B::not($b)));
            echo (int)$f . " | ";
            echo (int)B::xor($b, $a) . " | ";
            echo (int)B::or($b, $a) . " | ";
            echo (int)B::nor($a, $b) . " | ";
            echo (int)B::and($a, $b) . " |  ";
            echo (int)B::nand($a, $b) . " |";
            echo "\n";
        }
    }
} catch (Exception $e) {
    echo 'Mess: ' . $e->getMessage();
}