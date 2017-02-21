<?php

/* 
Создать алгоритм вычисления максимального значения двух переменных при помощи switch
 */

function maximum($a,$b){
    switch($a == $b){
        case true:
            echo "числа равны";
            break;
        case false:
            switch($a>$b){
                case true:
                    echo $a;
                    break;
                case false:
                    echo $b;
                    break;
    }
}
}

if($_POST){
    $a = $_POST['number1'];
    $b = $_POST['number2'];
     
    maximum($a,$b);
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

