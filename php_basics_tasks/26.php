<?php

/* 
26. Объявите константу DAYS_COUNT равную 7 и константу MONTH_COUNT равную 12 
 * двумя разными способами объявления констант.
 */

define(DAYS_COUNT,7);
//if (!defined("DAYS_COUNT")) define(DAYS_COUNT, 7);
echo DAYS_COUNT;
//define("DAYS_COUNT",12,true);//true  чтоб не учитывать регистр букв
//echo days_count;

const MONTH_COUNT  = 12;
echo MONTH_COUNT;
?>
<br>
<a href="index.php">General</a>