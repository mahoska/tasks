<?php

/* 
18. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели,
 выходные дни следует вывести жирным.
 */

$weekdays = ["Monday","Tuesday","Wednesday","Thursday","Friday","Satuday","Sunday"];

foreach ($weekdays as $w){
    if($w == "Satuday" || $w == "Sunday")
        echo "<strong>",$w,"</strong> ";
    else echo $w," ";
}

    