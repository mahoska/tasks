<?php

/* 
 1. Создать контактную форму. Сделать так, чтобы один посетитель не мог 
 * отправить форму больше 3 раз за одну минуту.
 */
function requestPost($key, $default=null){
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function requestCookie($key, $default=null){
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
}

function isformValide(){
    return trim($_POST['username'])!='' && trim($_POST['phone'])!='';
}

$code_operators = ["093","063","098","096","050"];
$is_send = true;

if($_POST){
    $time = time();
    $info_send = [];
        //получили информацию из формы
        $user_name = requestPost('username');
        $code = requestPost('code');
        $phone = requestPost('phone');
        if($code && $phone) $user_phone = "+({$code}){$phone}";
        
        
        //проверяем существуют ли записи о прошлых отправках
        $info = requestCookie('info_send');
        
        //если записи были
        if($info){
            //setcookie('info_send',1,time() -1);
            $info = unserialize($info);
            echo"<pre>";
            var_dump($info);
            echo"</pre>";
            
            $is_user = false;

            foreach ($info as $username=>&$user){
                if($username == $user_name){
                    $count = (int)$user['count'];
                    echo "count:$count<br>";

                    $last_send = (int)$user['last_send'];
                    echo "time_last_send:$last_send<br>";  
                    
                    //если прошло больше 1 минуты - обнуляю счетчик-
                    //он уже может отправлять сообщения снова
                    //отсчет периода времени меняю на текущее
                    $period = ($time - $last_send)/60;
                    if($period>1){
                        $user['count'] = 0; 
                        $user['last_send'] = time();
                    }else{
                        if($count==2) 
                            $user['is_send'] = false;
                        
                            $user['count']++;
                    }
                    
                    $is_send = $user['is_send'];
                    
                    //отправляю отредактированные куки (увеличив кол-во отправок)
                    $info_send_str = serialize($info);
                    setcookie('info_send',$info_send_str,time() + 60 * 60 * 24 * 366);
                
                    $is_user = true;
                    break;
                }
            } 
            //если отправку сделал другой/новый пользователь
            if(!$is_user){
                    $info[$user_name] = [
                        'count'=>0,
                        'last_send'=>$time,
                        'is_send'=>true
                    ];
                    $info_send_str = serialize($info);
                    setcookie('info_send',$info_send_str,time() + 60 * 60 * 24 * 366);
                
            }
        //нет отправляем инфу о первичной
        }else{
            $info_send [$user_name] = [
                'count'=>0,
                'last_send'=>$time,
                'is_send'=>true
            ];
            $info_send_str = serialize($info_send);
            setcookie('info_send',$info_send_str,time() + 60 * 60 * 24 * 366);
        }      
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>task 3</title>
    </head>
    <body>
        <form method="post">
            Username: <input type="text" name="username"/><br>
            Contact phone: 
            +(<select>
                <?php foreach($code_operators as $code):?>
                    <option value="<?=$code?>"><?=$code?></option>
                <?php endforeach; ?>
            </select>)
            <input type="text" name="phone" placeholder="2345567"/><br>
            <button style="display:<?=$is_send ? "block" : "none"?>">Send</button>
        </form>
    </body>
</html>

        