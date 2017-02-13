<?php

/* 
Создать генератор случайных таблиц. Есть переменные: 
 $row - кол-во строк в таблице, $cols - кол-во столбцов в таблице.
 Есть список цветов, в массиве: 
 $colors = array('red','yellow','blue','gray','maroon','brown','green'). 
 Необходимо создать скрипт, 
 который по заданным условиям выведет таблицу размера $rows на $cols, 
 в которой все ячейки будут иметь цвета, выбранные случайным образом из
 массива $colors. В каждой ячейке должно находиться случайное число. 
 */

$arr = [];
$cols = rand(1,10);
$row = rand(1,10);
$colors = array('red','yellow','blue','gray','maroon','brown','green');
?>

<table border="1" cellpadding = "3" cellspacing="0">
    <?php for($i=0; $i<$row; $i++):?>
    <tr>
        <?php for($j=0; $j<$cols; $j++):?>
        <td style="width:50px; text-align:center;
                   background:<?= $colors[rand(0,count($colors))]; ?>">
            <?= rand(0,10000); ?>
        </td>
        <?php endfor; ?>
    </tr>
    <?php endfor; ?>
</table>
