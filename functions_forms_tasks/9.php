<?php

/* 
9. Написать функцию, которая переворачивает строку. 
 * Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
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

function print_array($arr){
    echo"<pre>";
    print_r($arr);
    echo"</pre>";
}

function redirect($to){
   header("Location: {$to}");
   die;
}

function mb_str_split($string)
{
    preg_match_all('/.{1}/uis', $string, $arr);
    return $arr[0];
}
    
function reverse_string(&$string){
    //$arr = str_split($string);//только латиница
    $arr = mb_str_split($string); 
    //print_array($arr);
    $arr = array_reverse($arr);
    $string = implode("", $arr);
}

$flashMessage = requestGet('flash');
$err = false;
$string = null;

if($_POST){
    if(isFormValid()){
        $flashMessage  = "You message was send";
        $string = $_POST['text'];
        $input_string = $string;
        reverse_string($string);
        redirect("9.php?flash={$flashMessage}&str={$input_string}&res={$string}");
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
        <title>TODO supply a title</title>
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
        <b><?="Input string:<br>".requestGet('str').
            "<br>Reverse string:<br>".requestGet('res')."<br>"?>
        </b> 
        <?php endif; ?>
        
        <br>
        <a href ="index.html">return to menu</a>
    </body>
</html>