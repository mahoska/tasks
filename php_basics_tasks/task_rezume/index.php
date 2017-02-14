<!DOCTYPE html>
<!--
страничка с резюме: использовать  хтмл, стили + если кто это знает,
то бустрап или материалайз
Должны быть заголовки, картинки, теги p, ul, ссылки на соцсети в виде картинок,
таблица...etc, плюс добавляйте стили и т.д..

резюме про помощи шаблонизации
-->
<?php
$surname = "Маховский";
$name = " Андрей";
$patronymic = "Анатольевич";
$gender = "Мужчина";
$age = 39;
$date_of_birth = "13 декабря 1977";
$phone =  "+380671168604";
$email = "andreymak01313@gmail.com";
$country_from = "Украина";
$town_from = "Николаев"; 
$career_objective = [
    "начальник тех. отдела",
    "ведущий инженер-конструктор",
    "инженер-конструктор"
];
$career_department = ["Производство","Судостроение","Машиностроение"];
$references_contacts = [
   "facebook"=>"pfcflfnet",
   "ok"=>"200462788778",
   "male"=>"andreymak01313@gmail.com"
    ];
$now = getdate();
$monthes = ["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
$experience = [
     [
        "from_month"=>4,
        "from_year"=>2002,
        "to_month"=>4,
        "to_year"=>2008,
        "company"=>'ГП НПКГ "Зоря" - "Машпроект"(Николаев)',
        "position"=>"Инженер - конструктор отдела систем смазки и коробок приводов.",
        "occupation"=>[
            "Проектирование систем смазки двигателей, редукторов,генераторов, нагнетателей.",
            "Проектирование агрегатов и других элементов систем смазки.",
            "Разработка и выдача в производство технических заданий.",
            "Проведение испытаний двигателей на испытательных стендах предприятия и на объектах эксплуатации.",
            "Выпуск расчетно-конструкторской документации (РКД) (чертежи, инструкции).",
            "Проверка и согласование РКД.",
            "Участие в работе по согласованию технических проектов с заказчиками.",
            "Участие в научно – технических конференциях.",
            "Обучение производственного персонала и представителей заказчика устройству маслосистем газотурбинных установок."
         ]
     ], 
    [
        "from_month"=>5,
        "from_year"=>2008,
        "to_month"=>($now["month"]+1),
        "to_year"=>$now["year"],
        "company"=>'ООО MDEM (Николаев)',
        "position"=>"Ведущий инженер - конструктор отдела судовых систем",
        "occupation"=>[
            "Проектирование судовых систем, подбор агрегатов и арматуры, трассировка судовых систем по судну в 3D модели (CADMATIC).",
            "Моделирование оборудования, арматуры и других элементов судовых систем.",
            "Выпуск рабочей документации (чертежи) для изготовления,трассировки и монтажа судовых систем на судне.",
            "Координация работ и распределение задач по проекту.",
            "Проверка и согласование с Заказчиком трассировки судовых систем и рабочей документации.",
            "Конструкторское сопровождение изготовления и монтажа,судовых систем при постройке судна на заводе."
         ]
    ]
];

$education =[
    [
        "level"=>"Высшее",
        "year"=>2002,
        "university"=>"Национальный университет кораблестроения им. адмирала Макарова, Николаев",
        "department"=>"машиностроительный ф-т",
        "specialty"=>"Судовое энергетическое оборудование"
    ]
];
$languages = [
    [
        "lan"=>"Русский",
        "level"=>"родной"
    ],
    [
        "lan"=>"Английский",
        "level"=>"средний уровень, читаю профессиональную литературу"
    ]
];
$professional_skills=[
    "ЕСКД",
    "ADMATIC",
    "AutoCAD",
    "C Компас-3D",
    "SolidWorks",
    "3D Моделирование",
    "разработка проектной документации",
    "разработка чертежей",
    "проектная документация",
    "разработка технических заданий",
    "разработка инструкций",
    "проектно-конструкторская деятельность",
    "управление проектами",
    "управление персоналом",
    "обучение персонала"
];

$datetime1 = date_create($experience[0]["from_year"]."-0".$experience[0]["from_month"]."-01");
$datetime2 = date_create($experience[count($experience)-1]["to_year"]."-0".$experience[count($experience)-1]["to_month"]."-01");
$interval = date_diff($datetime2, $datetime1);
?>
<html>
    <head>
        <title>Резюме</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/mystyle.css"/>
    </head>
    <body>
        <div id="main_container">
            <div id="container">
                <h1><?=$surname," ",$name," ",$patronymic;?></h1>
                <div id="contacts">
                    <img src="image/portrait.jpg" alt="portrait"  class ="portrait" />
                    <ul>
                        <li><?=$gender,", ",$age,", ",$date_of_birth; ?></li>
                        <li><?=$phone;?></li>
                        <li><?=$email;?></li>
                        <li><?=$town_from,", ",$country_from;?></li>
                    </ul>
                    <div>
                        <h2>Желаемая должность и зарплата:</h2>
                        <?php foreach($career_objective as $obj):?>
                            <strong><?=$obj;?>,</strong>
                        <?php endforeach;?>
                        <ul>
                            <?php foreach($career_department as $dep):?>
                                
                            <li><?=$dep;?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div>
                        <a href="https://www.facebook.com/<?=$references_contacts["facebook"];?>"><img src="image/FB.png" class="icon" alt="fb_icon"/></a>
                        <a href="https://ok.ru/profile/<?=$references_contacts["ok"];?>"><img src="image/Odnoklasniki.png" class="icon" alt="Odnoklasniki_icon"/></a>
                        <a href="mailto:<?=$references_contacts["mail"];?>"><img src="image/post.png" class="icon" alt="post_icon"/></a>
                    </div>
                </div>
                
                <div class="clear"></div>
                <div>
                    <h2>Опыт работы —<?=$interval->format('%y лет %m месяцев');?></h2>
                    <table>
                        <tr>
                            <th>Период</th>
                            <th>Месть работы и род деятельности</th>
                        </tr>
                        <?php foreach($experience as $exp):?>
                        <tr>
                            <td class="even"><?=$monthes[$exp["from_month"]]." ".$exp["from_year"]." — ".($monthes[$exp["to_month"]])." ".$exp["to_year"];?></td>
                            <td>
                                <h3><?=$exp["company"];?></h3>
                                <strong><?=$exp["position"];?></strong>
                                <ul>
                                    <?php foreach ($exp["occupation"] as $oc):?>
                                        <li><?=$oc;?></li>
                                    <?php endforeach;?>
                                </ul>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div>
                <div class="clear"></div>
                <div id="education">
                    <h2>Образование</h2>
                    <?php foreach($education as $ed ):?>
                    <p><strong><?=$ed["level"];?></strong></p>
                    <ul>
                        <li>год выпуска: <?=$ed["year"];?></li>	
                        <li><?=$ed["university"];?>,</li>
                        <li><?=$ed["department"];?>,</li>
                        <li><?=$ed["specialty"];?></li>
                    </ul>
                    <?php endforeach;?>
                </div>
                <div id="attainments">
                    <h2>Ключевые навыки</h2>
                    <ol>
                        <li>Знание языков:
                            <ul>
                                 <?php foreach($languages as $lang ):?>
                                    <li><?=$lang['lan']." — ".$lang['level'];?></li>   
                                 <?php endforeach;?>
                            </ul>
                        </li>
                        <li>Профессиональные:
                            <ul>
                                <?php for($skill=0,$count=count($professional_skills); $skill<$count; $skill++ ):?>
                                   <li><?=$professional_skills[$skill].($skill!=$count-1?",":"");?></li>   
                                 <?php endfor;?>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </body>
</html>
