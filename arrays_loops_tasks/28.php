<!--
28. Вывести таблицу умножения с помощью двух циклов for.
 * 
P.S задание аналогично №13, поэтому вывожу таблицу Пифагора
-->

<table border="1" cellpadding = "3" cellspacing="0">
    <caption>Таблица умножения Пифагора</caption>
    <?php for($i=1; $i<=10; $i++):?>
    <tr>
         <?php for($j=1; $j<=10; $j++):?>
            <td style="width:50px; text-align:center;">
                <?= $i*$j; ?>
            </td>
        <?php endfor; ?>
    </tr>
    <?php endfor; ?>
</table>