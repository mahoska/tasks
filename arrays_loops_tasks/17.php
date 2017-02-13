<?php

/* 
17.Составьте массив месяцев. С помощью цикла foreach выведите все месяцы, 
а текущий месяц выведите жирным. Текущий месяц должен храниться в переменной $month.
 */

$monthes = ["January","February","March","April","May","June","July","August","September",
        "October","November","December"];

//1 вариант - мы не знаем функций работы с датами
$month = "February";
foreach ($monthes as $m){
    if($m == $month)
        echo "<strong>",$m,"</strong> ";
    else echo $m," ";
}

echo"<br>";
//2 вариант
$today  = getdate();
//    echo "<pre>";
//    print_r($today);
//    echo "</pre>";
$month  =   $monthes[$today['mon']-1];
foreach ($monthes as $m){
    if($m == $month)
        echo "<strong>",$m,"</strong> ";
    else echo $m," ";
}    
    