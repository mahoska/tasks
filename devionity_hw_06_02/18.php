<?php
error_reporting(E_ALL);
/* 
 Создать функцию, которая принимает один аргумент в виде массива и дописывает в
 *  него последним элементом количество значений массива
 */

function add_to_array(&$arr){
    $arr[] = count($arr);
}

$test = [1,2,3,5];
add_to_array($test);
var_dump($test);
?>
<br>
<a href ="index.php">return to menu</a>