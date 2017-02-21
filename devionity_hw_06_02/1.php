<?php

/* 
 Создать форму с полями username, email, message. 
 Сериализовать данные, полученные при отправке формы и вывести
 полученную строку на экран.
 */
$serialize_str=null;
if($_POST){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    
    $user_info = compact('username','email','message');
    $serialize_str = serialize($user_info);    
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Serialize</title>
</head>
<body>
    <form method="post">
        <table cellspacing="0" style="border:0">
        <thead style="background-color:grey">
                <tr>
                     <td colspan="2" align="center">Регистрациoнная форма</td>
                </tr>
        </thead>
        <tbody style="background-color:#7DFFF6">
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input name="username" type="text" size="26" id="username"/></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input name="email" type="email" size="26" id="email" /></td>
                </tr>
                <tr>
                    <td><label for="message">Message:</label></td>
                    <td><textarea name="message" rows="6" cols="22" id="message"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button>Send</button></td>
                </tr>
        </tbody>
        </table>
        <br>
            <?php if($serialize_str!=null):?>
             <div>serialize string:<br><?=$serialize_str;?></div>   
            <?php endif;?>
        
        <br><a href="index.php">return to menu</a>
</body>
</html>
