<?php

/* 
3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых 
 * превыщает N символов. Значение N задавать через форму. 
 * Проверить работу на кириллических строках - найти ошибку, найти решение.
 */


function isFormValid(){
    return trim($_POST['kol'])!='' &&  is_numeric($_POST['kol']) && $_POST['kol']>1;
}

function requestPost($key, $default = null){
    return isset($_POST[$key])? $_POST[$key] : $default;
}

function requestGet($key, $default = null){
    return isset($_GET[$key])? $_GET[$key] : $default;
}

function read_from_file($file_name){
    return file_get_contents($file_name);
}

function write_to_file($text, $file_name){
    $f = fopen($file_name, 'w');
    fwrite($f, $text );
    fclose($f);
}

function text_transform($kol, &$text){
    echo "<b>Original text:</b><br>".$text."<br><br>";
    //$text = preg_replace('/[\w]{3,}/u',"",$text) ;
    //для поддержки кириллицы
    $text = preg_replace('/[\pL]{'.$kol.',}/u',"",$text) ;
    echo "<b>After replacing:</b><br>".$text."<br><br>";  
}


$flashMessage = requestGet('flash');

if($_POST){
    if(isFormValid()){
        $flashMessage  = "text Accepted";
        $kol = (int)$_POST['kol'];
        $text = read_from_file('some_info_1.txt');
        text_transform( $kol, $text);
        //записываю в другой файл,чтоб не ломать тестовый
        write_to_file($text, "test.txt");
    }
    else{
        $flashMessage = "enter the quantity letters correctly ";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>task 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <b><?=$flashMessage;?></b>
        <form method="post">
            <input name="kol"  value="<?=requestPost('kol')?>" />
            <button>Go</button>
        </form>
        <br>
        <a href ="index.html">return to menu</a>
    </body>
</html>