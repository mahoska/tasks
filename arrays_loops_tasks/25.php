<?php

/* 
25. Ваше задание создать массив, наполнить это случайными значениями (функция rand),
найти максимальное и минимальное значение и поменять их местами.
 */

$arr = [];
$count = rand(2,100);
for($i = 0; $i < $count; $i++){
    $arr[] = rand(-100,100);
}
echo "<pre>";
print_r($arr);
echo "</pre>";

$min = $max = $arr[0];
$pos_min = $pos_max = 0;
for($i = 0; $i < $count; $i++){
    if($min < $arr[$i]){
        $min = $arr[$i];
        $pos_min = $i;
    }
    if($max > $arr[$i]){
        $max = $arr[$i];
        $pos_max = $i;
    }
}
$temp = $arr[$pos_min];
$arr[$pos_min] = $arr[$pos_max];
$arr[$pos_max] = $temp;

echo "<pre>";
print_r($arr);
echo "</pre>";


