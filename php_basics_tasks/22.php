<?php

/* 
22. Приведите число -20 к типу boolean. Объясните результат.
 */

$num = -20;
$res = (boolean)$num;
echo $res;
/*
 * любое отличное от нуля число(как положительное так и отрицательное)
 * при приведении к булевому типу будет давать значение true и при распечатке выводится как 1
 * 0 приводится к значению false и при распечатке дает "пустоту"
 */
?>
<br>
<a href="index.php">General</a>