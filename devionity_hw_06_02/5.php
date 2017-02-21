<?php

/* 
Создать алгоритм обмена значениями двух переменных не используя третьей. 
 */

$a = 6;
$b = 10;
 
echo '$a='.$a.'<br>$b='.$b.'<br>';

$a = $a + $b;
$b = $b - $a;
$b = -$b;
$a = $a - $b;

echo 'After swap:<br> $a='.$a.'<br>$b='.$b.'<br>';

?>
<br><a href="index.php">return to menu</a>