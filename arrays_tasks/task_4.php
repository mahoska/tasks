<?php

/* 
 отработка ф-ции array_walk() 
 * Создать массив случайных чисел от 1 до 10
 * с помощью  ф-ции array_walk()  все числа - элементы массива
 *  переделать на числительные - 1=>first,2=>second...
 */
function fill_array(&$arr, $count, $from, $to){
    for($i = 0; $i < $count; $i++)
    $arr[] = rand($from, $to);
}

function array_transform(&$arr){
    array_walk($arr, 'change_element');
}

function print_array($arr){
    echo"<pre>";
    print_r($arr);
    echo"</pre>";
}

function change_element(&$el){
    switch($el){
        case 1:
            $el = 'first';
            break;
        case 2:
            $el = 'second';
            break;
        case 3:
            $el = 'third';
            break;
        case 4:
            $el = 'fourth';
            break;
        case 5:
            $el = 'fifth';
            break;
        case 6:
            $el = 'sixth';
            break;
        case 7:
            $el = 'seventh';
            break;
        case 8:
            $el = 'eighth';
            break;
        case 9:
            $el = 'ninth';
            break;
        case 10:
            $el = 'tenth';
            break;
    }
}


$arr = [];
fill_array($arr, 8, 1, 10);
echo "Before:<br>";
print_array($arr);
array_transform($arr);
echo "After:<br>";
print_array($arr);

?>
<br>
    <a href ="index.php">return to menu</a>