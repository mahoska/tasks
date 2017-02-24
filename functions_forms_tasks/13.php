<?php

/* 
13. Есть строка $string = 'яблоко черешня вишня вишня черешня груша яблоко 
 * черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня
 *  яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня
 *  яблоко вишня вишня черешня черешня груша яблоко черешня вишня';

Подсчитайте, сколько раз каждый фрукт встречается в этой строке.
 *  Выведите в виде списка в порядке уменьшения количества:

Пример вывода:
яблоко – 12
черешня – 8
груша – 5
слива - 3
 */

function print_array($arr){
    echo"<pre>";
    print_r($arr);
    echo"</pre>";
}

function array_words($string, &$all, &$unique){
    $all=[];
    $tok = strtok($string, " \n\t");

    while ($tok !== false) {
        $tok = trim($tok);
        if($tok!="") $all[] = $tok;
        $tok = strtok(" \n\t");
    }
    //print_array($all);
    $unique = array_unique($all); 
    //print_array($unique);
}

function count_unique_words($string){
    $all=[];
    $unique=[];
    array_words($string, $all, $unique);
    
    $res = [];
    foreach ($unique as $key=>$val){
        $res[$val] = 0;
    }
    //var_dump($res);
    //echo"<br>";
    for($i = 0, $count = count($all); $i < $count; $i++){
        foreach ($res as $key=>&$val){
            if($all[$i] == $key) $val++;
        }
    }
    //print_array($res);
    arsort($res);

    return $res;
}

$string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко 
вишня вишня черешня груша яблоко черешня черешня вишня
яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня
яблоко вишня вишня черешня черешня груша яблоко черешня вишня';
echo $string,"<br>";

$res = count_unique_words($string);
print_array($res);

?>
<br>
<a href ="index.html">return to menu</a>