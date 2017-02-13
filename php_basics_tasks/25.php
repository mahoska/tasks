<?php header("Content-Type: text/html; charset=utf-8");
/* 
25. Приведите пример, чем отличается <?php от <?=.
 */

//пусть есть переменная
$num =6.7;
?>

<?php
echo $num;
?>

<!-- такой вид тега включет в себя команду echo --> 
<?= $num;?>


<!--возможно не самый лучший пример... ?= удобно использовать при выводе в html коде-->
<!DOCTYPE html>
<html>
    <head>
        <title>пример использования тегов</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="post">
            Введите своё имя: <input type="text" name="name"/><br>
            <input type="submit" value="отправить"/>
        </form>
        <?php 
        if($_POST && isset($_POST['name'])):
            $name = $_POST['name'];
        ?>
        <p>
            Рады знакомству, <?= $name?> 
        </p>
        <?php endif; ?>
        
        <br>
        <a href="index.php">General</a>
    </body>
</html>