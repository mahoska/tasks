    <?php header("Content-Type: text/html; charset=utf-8");

/* 
10. С помощью конструкции switch выведите фразу: "Это рабочий день", 
 * если значение переменной day попадает в диапазон чисел от 1 до 5 (включительно).
 */
$day = 4;
switch($day){
    case ($day>=1 && $day<=5):
        echo "Это рабочий день";
}
?>
<br>
<a href="index.php">General</a>