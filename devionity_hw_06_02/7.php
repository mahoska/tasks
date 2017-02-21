<?php

/* 
Создать алгоритм вычисления максимального значения двух заданных переменных при
помощи тернарного оператора 
 */

//будем выбирать большее, если числа равны - тогда принимаем за большее это значение
//вариант 1
function maximum1($a,$b){
    return $a >= $b ? $a : $b;
}

//вариант 2 (более строгий)
function maximum2($a,$b, &$max){
    if($a == $b)return false;
    else{
        $max = $a > $b ? $a : $b;
        return true;
    }
}

if($_POST){
    $a = $_POST['number1'];
    $b = $_POST['number2'];
    
    echo "Maximum ($a,$b): ".maximum1($a,$b)."<br>";
    $max=null;
    echo "Exact Maximum ($a,$b)=> ".(maximum2($a,$b,$max) ? $max : "числа равны<br><br>");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>conditions construction</title>
</head>
<body>
    <form method="post">
        <input type="number"  name="number1" step="0.1"  required/>
        <input type="number"  name="number2" step="0.1" required/>
        <button>Send</button>
    </form>
    
    <br><a href="index.php">return to menu</a>
</body>
</html>

