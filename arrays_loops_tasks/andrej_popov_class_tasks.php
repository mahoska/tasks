<!--
задание данное Адреем Поповым на занятии - увеличить количество людей в массиве
вывести инф-цию о них в таблице,
четные/нечетные строки сделать разными цветами(средствами css и php)
-->
<?php
    $employees = [
        [
            'name'=>'Mike',
            'surname'=>'Kuk',
            'age'=>22,
            'weight'=>57.5,
            'canSwim'=>true
        ],
        [
            'name'=>'Petr',
            'surname'=>'Bugget',
            'age'=>38,
            'weight'=>89.2,
            'canSwim'=>true
        ],
        [
            'name'=>'Alex',
            'surname'=>'Torr',
            'age'=>5,
            'weight'=>12,
            'canSwim'=>false
        ],
        [
            'name'=>'Tina',
            'surname'=>'Bajron',
            'age'=>12,
            'weight'=>25.5,
            'canSwim'=>false
        ],
        [
            'name'=>'Richi',
            'surname'=>'Murrej',
            'age'=>41,
            'weight'=>77.34,
            'canSwim'=>true
        ],
        [
            'name'=>'Karla',
            'surname'=>'Josef',
            'age'=>52,
            'weight'=>50.5,
            'canSwim'=>false
        ]
    ];
?> 
<!--вариант установки цвета строк средствами css-->
<style>
    .var1 tr:nth-child(even){
        background: #6168FC;
    }
    .var1 tr:nth-child(odd){
        background: #0080FF;
    }
    th{
        color: #fff;
    }
</style>
    <table class="var1" border="1" cellpadding = "3" cellspacing="0">   
    <tr>
        <?php foreach($employees[0] as $key=>$val):?>
            <th><?= $key;?></th>
        <?php endforeach; ?>
    </tr>
    <!--body-->
    <?php foreach($employees as $employee):?> 
        <tr>  
            <td><?= $employee['name']; ?></td>
            <td><?= $employee['surname']; ?></td>
            <td><?= $employee['age']; ?></td>
            <td><?= $employee['weight']; ?></td>
            <td><?= $employee['canSwim']?"yes":"no"; ?></td>
        </tr>
    <?php endforeach; ?>
</table>



<br>
<!--вариант установки цвета строк средствами php-->
<table  border="1" cellpadding = "3" cellspacing="0">   
    <tr>
        <?php foreach($employees[0] as $key=>$val):?>
            <th style="background: #0080FF"><?= $key;?></th>
        <?php endforeach; ?>
    </tr>
    <!--body-->
    <?php for($i = 0; $i < count($employees); $i++):?> 
        <tr style = "background:<?= $i%2==0? '#6168FC':'#0080FF';?>">  
            <td><?= $employees[$i]['name']; ?></td>
            <td><?= $employees[$i]['surname']; ?></td>
            <td><?= $employees[$i]['age']; ?></td>
            <td><?= $employees[$i]['weight']; ?></td>
            <td><?= $employees[$i]['canSwim']?"yes":"no"; ?></td>
        </tr>
    <?php endfor; ?>
</table>