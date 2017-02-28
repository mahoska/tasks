<?php

/* 
7. Создать гостевую книгу, где любой человек может оставить комментарий в
 *  текстовом поле и добавить его. Все добавленные комментарии выводятся над 
 * текстовым полем.
 */


function isFormValid(){
    return trim($_POST['comment'])!='' && trim($_POST['username'])!='';
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
    
function saveComment($user,$text,$filename){
    $f = fopen($filename, 'ab');
    if(!$f) die("Невозможно открыть файл для записи");
    fwrite($f, $user.":".$text.PHP_EOL);
    fclose($f);
}

function readComments($filename){
    $contents = file_get_contents($filename);
    if (strlen($contents) != 0){
        $temp =  explode(PHP_EOL,$contents);
        $temp=array_filter($temp, function($element) {
            return !empty($element);
        });
        //var_dump($temp);
         for($i=0, $count=count($temp); $i<$count; $i++){
             $pos = strpos($temp[$i],":");
             $username = substr($temp[$i], 0,$pos);
             $comment = substr($temp[$i], $pos+1);
             $user_comment= compact('username','comment');
             $comments[]=$user_comment;
         }
        
         return $comments;
    }     
    return null;
}

$flashMessage = requestGet('flash');

if($_POST){
    if(isFormValid()){
        $flashMessage ="";
        $comment = $_POST['comment'];
        $username = $_POST['username'];
        saveComment($username,$comment,'comments_7.txt');
        redirect("7.php");
    }
    else $flashMessage = "Заполните поля!";
}

$comments = readComments('comments_7.txt');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>task 7</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .err{
                color:red;
                font-weight: bold;
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <?php 
        if(!is_null($comments)):?>
            <b>Оставленные комментарии:</b>
            <ul type="none">    
                <?php foreach ($comments as $com):?>
                    <li><b><?=$com['username']?>:</b><?=$com['comment']?></li>
                <?php  endforeach;?>
            </ul>
        <?php endif;?>
        
        
        <div class='err'><?=$flashMessage?></div>
        <form method="post">
            <table cellspasing="0" cellpadding="3" border="0">
                <tr>
                    <td><label>Имя:</label></td>
                    <td><input type="text" name="username" value="<?=requestPost('username')?>" size="24"/></td>
                </tr>
                <tr>
                    <td><label>Текст комментария:</label></td>
                    <td><textarea name="comment"><?=requestPost('comment')?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><button>Отправить</button></td>
                </tr>
            </table>
        </form>
        
        
        
        
        <br>
        <a href ="index.html">return to menu</a>
    </body>
</html>