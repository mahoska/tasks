<!-- 
Создать форму, которая содержит поля name, email, phone.
 *  Задать скрипт, который выведет на экран отправленные данные -
 *  $_POST или $_GET (в зависимости от свойств формы) 
 -->
<?php
$code = ['093','067','096','050'];
function check_phone($phone){
    if(strlen($phone)!=7)return false; 
    for($i=0, $count=strlen($phone);$i<$count; $i++){
       if($phone[$i]!='0'){
        if((int)$phone[$i]==0){
            return false;
        }
    }
    }
    return true;
}
?>
 
 
<form  method="post">
    Name:<input type="text" name="data[name]" /><br>
    Email:<input type="email" name="data[email]" /><br>
    Phone:<select name="data[code]">
        <?php foreach($code as $c):?>
            <option value=<?=$c;?>><?=$c;?></option>
        <?php endforeach;?>
    </select>
    <input type="text" name="data[phone]" /><br>
    <input type="submit" value="Send"/>
</form>
<br><br>
<?php
if($_POST && $_POST['data']['name']&& $_POST['data']['email']&& $_POST['data']['phone']
        && check_phone($_POST['data']['phone'])){
    $name = $_POST['data']['name'];
    $email = $_POST['data']['email'];
    $phone = "+(".($_POST['data']['code']).")".$_POST['data']['phone'];
    echo "Your name:$name<br>Your email:$email<br>Your phone:$phone<br>";
}
else echo "some error value";
?>