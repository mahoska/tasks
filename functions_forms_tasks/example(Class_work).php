<?php
error_reporting(E_ALL);
/* 
class work
 */

function createMessage($username, $email, $message){
    return compact($username,$email,$message);
}

function redirect($to){
   header("Location: {$to}");
   die;
}


function requestPost($key, $default = null){
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function requestGet($key, $default = null){
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function isRequestPost(){
    return (bool) $_POST;
}

function ifFormValide(){
    return  trim($_POST['username']) != '' && trim($_POST['email']) != '' && trim($_POST['message']) != '';
}

//logic
$flashMessage = requestGet('flash');
if(isRequestPost()){
    if(ifFormValide()){
        $flashMessage = 'Your message was send';
        
        $message = createMessage(requestPost($username), requestPost($email), requestPost($message));
        redirect("/tasks/functions/example.php?flash={$flashMessage}");
    }
    else{
        $flashMessage = "Fill the fields";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Class work</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Form</h1>
        <b><?=$flashMessage;?></b>
        <form method="post">
            <input type="text" name="username" value="<?=requestPost('username');?>"/><br>
            <input type="text" name="email" value="<?=requestPost('email');?>"/><br>
            <textarea name="message"><?=requestPost('message');?></textarea><br>
            <button>Go</button>
        </form>
    </body>
</html>
