<!--
1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен
выдавать только те слова, которые есть и в первом и во втором поле ввода.
Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b), 
которая будет возвращать массив с общими словами.
-->
<?php
function isFormValid(){
    return trim($_POST['text1'])!='' && trim($_POST['text2'])!='';
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

function splitStringIntoWords($text, $reg_str){
    $arr = [];
    $temp =  preg_split($reg_str, $text);
    //var_dump($temp);
    for($i=0,$count = count($temp); $i<$count; $i++)
        if($temp[$i]!='')
            $arr[]=$temp[$i];
    return $arr;
}

function getCommonWords($a, $b){
    $keywords1 = splitStringIntoWords($a, "/[\s,!?:;]+|(-)+/");
    $keywords2 = splitStringIntoWords($b, "/[\s,!?:;]+|(-)+/");
    //print_array($keywords1);
    //print_array($keywords2);
    //strcasecmp - Сравнение строк без учета регистра
    //array_uintersect Вычисляет пересечение массивов, используя для сравнения значений callback-функцию
    return array_uintersect($keywords1, $keywords2, "strcasecmp");
}
    

$flashMessage = requestGet('flash');
$result = null;
$err = false;

if($_POST){
    if(isFormValid()){
        $flashMessage  = "You message was send";
        $text1 = $_POST['text1'];
        $text2 = $_POST['text2'];
        $result = getCommonWords($text1,$text2);
        //var_dump($result);
        $result = serialize($result);
        redirect("1.php?flash={$flashMessage}&res={$result}");
    }
    else{
        $flashMessage = "Fill the fields";
        $result = null;
        $err = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>task 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <b><?=$flashMessage;?></b>
        <form method="post">
            <textarea name="text1"><?=requestPost('text1')?></textarea>
            <textarea name="text2"><?=requestPost('text2')?></textarea>
            <button>Go</button>
        </form>
        <b><?php 
        if(!$err){
            $res = unserialize(requestGet('res'));
            if(!empty($res))
                print_array($res);
            else echo "совпадений не найдено";
        }
        ?></b>
        
        <br>
        <a href ="index.html">return to menu</a>
    </body>
</html>