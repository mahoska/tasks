<?php

/* 
19. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, 
а текущий день выведите курсивом. Текущий день должен храниться в переменной $day.
 */

$weekdays = ["Monday","Tuesday","Wednesday","Thursday","Friday","Satuday","Sunday"];

//1
$day = "Thursday";
foreach ($weekdays as $w){
    if($w == $day)
        echo "<i>",$w,"</i> ";
    else echo $w," ";
}

//2
echo"<br>";
$today  = getdate();
//    echo "<pre>";
//    print_r($today);
//    echo "</pre>";
    
$day  =   $weekdays[$today['wday']-1];    
foreach ($weekdays as $w){
    if($w == $day)
        echo "<i>",$w,"</i> ";
    else echo $w," ";
}