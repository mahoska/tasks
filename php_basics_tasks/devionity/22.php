<?php

/* 
 Определить константы, которые соответствуют названиям нескольких стран мира.
 *  Используя эти константы, сформировать массив из соответствующих значений 
 */

define('Ukraine', "Ukraine");
define('Rissia', "Rissia");
define('Poland', "Poland");

$countries=[Ukraine,Rissia,Poland];

echo '<pre>';
print_r($countries);
echo '</pre>';