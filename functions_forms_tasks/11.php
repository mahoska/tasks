<?php

/* 
11. Написать функцию, которая в качестве аргумента принимает строку,
 *  и форматирует ее таким образом, что каждое новое предложение начиняется 
 * с большой буквы.
Пример:

Входная строка: 'а васька слушает да ест. а воз и ныне там. 
 * а вы друзья как ни садитесь, все в музыканты не годитесь. 
 * а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';

Строка, возвращенная функцией : 'А Васька слушает да ест.
 * А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. 
 * А король-то — голый. А ларчик просто открывался.А там хоть трава не расти.';
 */

function print_array($arr){
    echo"<pre>";
    print_r($arr);
    echo"</pre>";
}

function capital_letter(&$string){
    $arr = [];
    $temp = explode(".", $string);
    foreach ($temp as &$value) {
       $value = trim($value);
       if($value!="")
           $arr[]=$value;
    }
    
    //print_array($arr);
    foreach($arr as &$value){
        //ucfirst($value);//не работает для кириллицы
        $value =  mb_strtoupper(mb_substr($value, 0, 1, 'UTF-8'), 'UTF-8') .
                mb_substr($value, 1, mb_strlen($value), 'UTF-8');
    }
    //print_array($arr);
    $string = implode(". ", $arr);
}

$string = 'а васька слушает да ест. а воз и ныне там. '
        . 'а вы друзья как ни садитесь, все в музыканты не годитесь. '
        . 'а король-то — голый. а ларчик просто открывался.'
        . 'а там хоть трава не расти.';
echo "<b>Input string:</b><br>".$string."<br>";
capital_letter($string);
echo "<b>After transform:</b><br>".$string."<br>";

?>
<br>
    <a href ="index.html">return to menu</a>