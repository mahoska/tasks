    <?php header("Content-Type: text/html; charset=utf-8");

/* 
11. С помощью конструкции switch выведите фразу: "Это выходной день", 
 * если значение переменной day попадает в диапазон чисел от 6 до 7 (включительно).
 */

$day = 5;
switch($day){
    case ($day>=1 && $day<=5):
        echo "Это рабочий день";
        break;
    case ($day>=6 && $day<=7):
        echo "Это выходной день";
}


//если не расширять предыдущее задание
switch($day){
    case ($day>=6 && $day<=7):
        echo "Это выходной день";
}
?>
<br>
<a href="index.php">General</a>