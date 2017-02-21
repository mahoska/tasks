<?php

/* 
Создать массив из 10 любых числовых значений. 
При помощи foreach вывести на экран те значения, которые делятся на 3
 */

for($i = 0; $i < 10; $i++)
    $arr[] = rand(1,100);

echo "Elements: <br>";
foreach($arr as $el)
  echo $el,"<br>";  

echo "Elements %3: <br>";
foreach($arr as $el)
    if($el % 3 == 0) 
        echo $el,"<br>";
    
?>
    
    <br>
    <a href ="index.php">return to menu</a>
    