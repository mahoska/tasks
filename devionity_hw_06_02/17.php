<?php

/* 
Создать функцию, которая будет выводить на экран массив внутри тегов <pre></pre>
 *  В зависимости от значения второго аргумента функции, выводить используя 
 * var_dump или print_r. По умолчанию использовать print_r
 */

function print_array($arr, $flag = true){
    echo "<pre>";
    $flag ? print_r($arr) : var_dump($arr);
    echo "<pre>";
}

$man = ["name"=>"Alex", "age"=>22, "from"=>"Nokolaev"];
print_array($man,false);


$woman = ["name"=>"Alice", "age"=>35, "from"=>"Odessa"];
print_array($woman);
?>
<br>
<a href ="index.php">return to menu</a>