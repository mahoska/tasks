<?php

/* 
10. Написать функцию, которая считает количество уникальных слов в тексте. 
 * Слова разделяются пробелами. Текст должен вводиться с формы.
 */

function isFormValid(){
    return trim($_POST['text'])!='' ;
}

function requestPost($key, $default = null){
    return isset($_POST[$key])? $_POST[$key] : $default;
}

function requestGet($key, $default = null){
    return isset($_GET[$key])? $_GET[$key] : $default;
}

function redirect($to){
   header("Location: {$to}");
   die;
}

function print_array($arr){
    echo"<pre>";
    print_r($arr);
    echo"</pre>";
}

function CountUniqueWords($text){
    $all = [];
    $temp = explode(" ", $text);
    foreach ($temp as &$value) {
       $value = trim($value);
       if($value!="")
           $all[]=$value;
    }
    //print_array($all);
    $unique = array_unique($all); 
    //print_array($unique);
    
    return count($unique);
}
    

$flashMessage = requestGet('flash');
$err = false;

if($_POST){
    if(isFormValid()){
        $flashMessage  = "You message was send";
        $text = $_POST['text'];
        $result = CountUniqueWords($text);
        redirect("10.php?flash={$flashMessage}&text={$text}&res={$result}");
    }
    else{
        $flashMessage = "Fill the field";
        $err = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>task 10</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <b><?=$flashMessage;?></b>
        <form method="post">
            <textarea name="text"></textarea>
            <button>Go</button>
        </form>
        <?php if(!$err):?>
            <b><?=requestGet('text')."<br><br>"?></b>
            <b><?="Unique words:".requestGet('res')?></b> 
        <?php endif; ?>
            
        <br>
        <a href ="index.html">return to menu</a>    
    </body>
</html>