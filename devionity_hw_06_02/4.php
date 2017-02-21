<?php

/* 
Вычислить значение выражения: false && true || false && true || !false && true

false && true || false && true || !false && true = false || false || true && true = 
false || false || true = true

Ответ: true

*/

/*
Вывести на экран true/false в зависимости о того, делится переменная $x на 2 или нет.
 */
if($_POST){
    $x = $_POST['number'];
    echo ($x % 2 == 0 ? true : false),"<br>";
    //так как false не отображается - вывожу еще просто строкой
    echo ($x % 2 == 0 ? "true" : "false"),"<br>";
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
        <input type="number" min="1" step="1" name="number"  required/>
        <button>Send</button>
    </form>
    
    <br><a href="index.php">return to menu</a>
</body>
</html>

