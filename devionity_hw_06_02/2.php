
<?php

/* 
Вычислить количество секунд в году и присвоить это значение переменной.
Вычислить остаток от деления этого значения на 2
 */
$date = getdate();
$current_year = $date['year'];

if($_POST){
    $year = $_POST['year'];
    //Год високосный, если он кратен 4, но при этом не кратен 100, либо кратен 400.
    $year_days =($year%4 == 0 && $year%100 != 0 || $year%400 == 0)? 366 : 365;
    $sec = $year_days*24*60*60;
    echo " Seconds in $year year: $sec <br>";
    $res = $sec % 2;
    echo " Seconds%2 = $res <br>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>arithmetic operators</title>
</head>
<body>
    <form method="post">
        <input type="number" min="1" step="1" name="year" max="<?=$current_year;?>" required/>
        <button>Count</button>
    </form>
    
    <br><a href="index.php">return to menu</a>
</body>
</html>