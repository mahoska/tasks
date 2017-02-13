<?php

/* 
22. Нарисуйте пирамиду, как показано на рисунке, воспользовавшись циклом for или while.
xx
xxxx
xxxxxx
xxxxxxxx
xxxxxxxxxx
 */

for($i = 1; $i <= 5; $i++){
    for($j = 1; $j <= $i*2; $j++){
        echo 'x';
    }
    echo "<br>";
}