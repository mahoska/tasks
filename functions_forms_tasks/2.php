<?php

/* 
2. Создать форму с элементом textarea. При отправке формы скрипт должен выдавать
 *  ТОП3 длинных слов в тексте. Реализовать с помощью функции.
 */


function isFormValid(){
    return trim($_POST['text'])!='';
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

function my_sort(&$key, &$val){
    for($j = 0; $j<3; $j++){
        $pos_min = $j; 
	for($k=$j+1; $k<3;$k++){
            if ($key[$k] < $key[$pos_min] )
		$pos_min = $k;
	    }

            $buf = $key[$j];
            $key[$j] = $key[$pos_min];
            $key[$pos_min] = $buf;
                
            $buf = $val[$j];
            $val[$j] = $val[$pos_min];
            $val[$pos_min] = $buf;
	}
}

function longerWords($text){
    $keywords = splitStringIntoWords($text, "/[\s,!?:;]+|(-)+/");
    
    if(count($keywords)<=3) return $keywords;
    
    //хотелось создать ассоц массив длина_слова=>слово, но длины могут совпасть
    //а одинаковых ключей быть не может, поэтому работаю с 2-мя массивами параллельно
    $res_len = [
        strlen($keywords[0]),
        strlen($keywords[1]),
        strlen($keywords[2])
    ];
    $res = [
        $keywords[0],
        $keywords[1],
        $keywords[2]
    ];
    my_sort($res_len,$res);
    
    for($i = 3, $count = count($keywords); $i < $count; $i++ ){
        $cur_len = strlen($keywords[$i]);
        if($cur_len>$res_len[0]){
            array_push($res_len,$cur_len);
            array_push($res,$keywords[$i]);
            array_shift($res_len);
            array_shift($res);
            my_sort($res_len,$res);
        }
    } 
    //print_array($res);
    return $res;
}

$flashMessage = requestGet('flash');
$result = null;
$err = false;

if($_POST){
    if(isFormValid()){
        $flashMessage  = "You message was send";
        $text = $_POST['text'];
        $result = longerWords($text);
        print_array($result);
        $result = serialize($result);
        //print_array($result);
        redirect("2.php?flash={$flashMessage}&res={$result}");
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
        <title>task 2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <b><?=$flashMessage;?></b>
        <form method="post">
            <textarea name="text"><?=requestPost('text')?></textarea>
            <button>Go</button>
        </form>
        <b><?php !$err?print_array(unserialize(requestGet('res'))):""?></b>
        <br>
        <a href ="index.html">return to menu</a>
    </body>
</html>