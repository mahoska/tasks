<?php

/* 
 Определить рекурсивную функцию - аналог функции print_r
 */

//работает для простых массивов
function my_print($arr)
{
    static $str =  "Array(" ;
    static $i=0;
    if($str == null) $str =  "Array(" ;
    $count = count($arr);
   
    if($i==$count || $count == 0){ $str .= ")"; echo $str; $str = null; $i=0; return;}
    $str .= "[$i] => $arr[$i]";
    $i++;
    my_print($arr);
}

$arr1 = [1,2,5,8,9,0,7,99];
my_print($arr1);
echo "<br>";

$arr2 = [];
my_print($arr2);
echo "<br>";

$arr3 = [10,55];
my_print($arr3);

 ?>
    <br>
    <a href ="index.php">return to menu</a>