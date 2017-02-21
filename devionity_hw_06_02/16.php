<?php

/* 
Создать функцию, которая будет выводить на экран массив внутри тегов <pre></pre>
 */

function print_array($arr){
    echo "<pre>";
    print_r($arr);
    echo "<pre>";
}

$man = ["name"=>"Alex", "age"=>22, "from"=>"Nokolaev"];
print_array($man);

?>
<br>
<a href ="index.php">return to menu</a>
