<?php

$content = [];
function generate($y){
    $wallSet = [4, 6, 8];
    $randWallSet = rand(0, 2);

    for($i = 1; $i<=$wallSet[$randWallSet]; $i++){
        for($x = 1; $x <= rand(3, 8); $x++){
            $content[$y] = 1;
        }
        
    }
}



echo "<textarea rows='20' cols='48'>";
for($i = 1; $i<=1000; $i++){
    $content[$i] = 0;
    echo $content[$i];
    generate($i);
}
echo "</textarea>";