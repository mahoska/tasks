<?php

/* 
Создать алгоритм для определения первого найденного простого числа 
 * в промежутке от 200 до 400.
 */

for ($i = 200; $i <= 400; $i++) {
    $result = true;
        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $result = false;
                    break;
            }
        }
    if ($result){ 
        echo  $i; 
        break;
    }
}

?>
    
    <br>
    <a href ="index.php">return to menu</a>