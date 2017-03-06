<?php

/* 
1. Создать контактную форму. Сделать так, чтобы один посетитель не мог 
 * отправить форму больше 3 раз за одну минуту.
 */

session_start();

$flashMessage = requestGet('flash');
$if_autoriz = true;
$if_reg = false;

$count = 0;
if(isset($_SESSION['user']) && isset($_COOKIE[$_SESSION['user']])){
    $user_info = unserialize($_COOKIE[$_SESSION['user']]);
    $count = (int) $user_info['count'];
}

$is_send = $count>=3 ? false : true;

if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    setcookie('login', '', time()-1000);
    setcookie('password', '', time()-1000);
    unset($_COOKIE['login']);
    unset($_COOKIE['password']);
    $flashMessage = "";
    redirect("1.php?flash={$flashMessage}");
    //header("Location:1.php?flash=$flashMessage");
}

if(isset($_COOKIE['login'])&& isset($_COOKIE['password'])) {
    $log_cook=$_COOKIE['login'];
    $pas_cook=$_COOKIE['password'];
     
    $users = get_db('users.txt');
    if($users && log_check($log_cook, $pas_cook, $users)==true) {
       $_SESSION['user'] = $log_cook;
       output_settings($flashMessage, $if_autoriz, $if_reg, "", false, false);
    }
    
}

if($_POST){
    //если идет попытка входа
    $data_entry = requestPost('log_data');
    if($data_entry){
        $log=$data_entry['login'];
        $pas=$data_entry['password'];
    
        if(isset($data_entry['check'])){
            setcookie("login", $log, time()+60*60*24*30);//на месяц
            setcookie("password", $pas, time()+60*60*24*30);
        }
    
        $users = get_db('users.txt');
        if ($users && log_check($log, $pas, $users)){
            $_SESSION['user'] = $log;
            output_settings($flashMessage, $if_autoriz, $if_reg, "", false,  false);  
        }
        else{
            $flashMessage = "Вам необходимо пройти регистрацию";
            //header("Location:1.php?flash=$flashMessage");
            redirect("1.php?flash={$flashMessage}");
        }
    }
    
    //регистрация
    $data_reg = requestPost('data');
    if($data_reg){
        $log=$data_reg['login'];
        $pas=$data_reg['password'];
        $sname=$data_reg['sname'];
        $name=$data_reg['name'];
        $pat=$data_reg['patronymic'];
      
        hesh_password($pas);
        
        $is_user = false;
        $db = get_db('users.txt');
        $users = is_null($db)?[]:$db;
        
        if(!empty($users)){
            $is_user = if_user_in_db($log, $users);
        }
        if(!$is_user){
            add_user($log,$pas,$name, $sname, $pat, $users);
            put_db('users.txt',$users); 
            $_SESSION['user'] = $log;
            output_settings($flashMessage, $if_autoriz, $if_reg, "", false,  false);   
        }else{
            output_settings($flashMessage, $if_autoriz, $if_reg, "логин занят",true, false);
        }
    }
    
    //отправка сообщения
    $data_mess = requestPost('mess');
    if($data_mess){
       $time = time();
        //идентифицируем пользователя
        $user_log = $_SESSION['user'];        
//        setcookie($user_log,0,time() - 60);
//        die();
        
        //--проверяем существуют ли записи о прошлых отправках
        $info = requestCookie($user_log);

        //еще не прошла минута и записи были - куки есть
        if($info){
            $info = unserialize($info);

            $count = (int)$info['count'];
            $last_send = (int)$info['last_send'];  

            $count++;
            if($count>=3){ 
                $is_send = false;
            }
            
            //отправляю отредактированные куки (увеличив кол-во отправок)
            $info['count']=$count;    
            $info_send_str = serialize($info);
            //время жизни сокращаю - до оставшегося с минуты
            setcookie($user_log,$info_send_str, time() + $time - $last_send);
//          echo "сколько времени осталось для отправки сообщений ".($time - $last_send)/60;
            //можно делать сохранение сообщения (в файл, бд)
                
        //--нет отправляем инфу о первичной
        }else{
            //echo"кук сообщений еще нет";
            $info_send = [
                'count'=>1,
                'last_send'=>$time
            ];
            $info_send_str = serialize($info_send);
            setcookie($user_log,$info_send_str,time() + 60);
            //можно делать сохранение сообщения (в файл, бд)
        }       
        
    }
}



function requestPost($key, $default = null){
    return isset($_POST[$key])? $_POST[$key] : $default;
}

function requestGet($key, $default = null){
    return isset($_GET[$key])? $_GET[$key] : $default;
}

function requestCookie($key, $default=null){
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
}

function log_check($log, $pas,array $arr_db){
    hesh_password($pas);
    if(!empty($arr_db)){
        foreach ($arr_db as $key => $value){
            if($key == $log && $value['pass']== $pas)
                return true;
        }
    }
    return false;
}   

function hesh_password(&$pas){
    $pas=md5($pas);
    $str='123';
    $str=md5($str);
    $pas=md5($pas . $str);
}

function get_db($filename){
    $db = file_get_contents($filename);
    if($db===false)die("невозможно прочесть файл");
    elseif($db=="")return null;
    return unserialize($db);
}

function put_db($filename, array $data){
    $data_str = serialize($data);
    $if_write = file_put_contents($filename, $data_str);
    if(!$if_write) die("ошибка записи файла");
}

function output_settings(&$flashMessage, &$if_autoriz, &$if_reg, $flash = "", $is_reg = false, $is_auth = true){
    $flashMessage = $flash;
    $if_autoriz = $is_auth;
    $if_reg = $is_reg;
}

function add_user($log,$pas,$name, $sname, $pat, array &$data){
    $data[$log] = [
        "pass"=>$pas,
        "sname"=>$sname,
        "name"=>$name,
        "patronymic"=>$pat
    ];
}

function if_user_in_db($login, $db){
    foreach ($db as $key => $value){
        if($key == $login){
            return true;
        }
    }
    return false;
}

function redirect($to){
   header("Location: {$to}");
   die;
}

?>
   


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>task 1</title>
        <!--style>
             #iden p, #authoriz, #reg{
                position:absolute;
                right:100px;
                top:25px;
            }
            #flash{
                position:absolute;
                right:120px;
                top:5px;
                color:red
            }
        </style-->
    </head>
    <body>
        <div id="flash" style="color:red"><?=$flashMessage;?></div>
        <?php if(isset($_SESSION['user'])):?>
        <!-- Подтверждение успешной авторизации польльзователя  -->
            <div id="iden">
                <p>
                    Рады приветствовать на сайте, <?php echo $_SESSION['user'];?><br>
                    <a href="1.php?logout=1">Выйти</a>
                </p>
                <p>
                    <form method="post">
                        Message: <textarea name="mess"></textarea><br>
                        <button style="display:<?=$is_send ? "block" : "none"?>">Send</button>
                    </form>
                    <a href="1.php" style="display:<?=!$is_send ? "block" : "none"?>">Проверка возобновления возможности отправки</a>
                </p>
            </div>
        <?php else: ?>
        <div id="authoriz" style="display:<?=$if_autoriz?'block':'none;'?>">
            <form method="post">
                <table>
                    <tr>
                        <th align="centre" colspan="2">Вход и регистрация</th>
                    </tr>
                    <tr>
                        <td align="left">Login:</td>
                        <td><input type="text" name="log_data[login]" /></td>
                    </tr>
                    <tr>
                        <td align="left">Password:</td>
                        <td><input type="password" name="log_data[password]" /></td>
                    </tr>
                    <tr>
                        <td align="left"><label>Запомнить<input type="checkbox" name="log_data[check]" /></label></td>
                        <td  align="left">
                            <input type="submit" value="Вход" /> 
                            <button type="button" onclick="autorization()">Регистрация</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php endif; ?> 
        
        <div id='reg' style="display:<?=$if_reg?'block':'none;'?>">
        <form method="post">
            <table>
                <tr>
                    <td><label>Логин:</label></td>
                    <td><input type="text" name="data[login]" /></td>
                </tr>
                <tr>
                    <td><label>Пароль:</label></td>
                    <td><input type="password" name="data[password]" /></td>
                </tr>
                <tr>
                    <td><label>Фамилия:</label></td>
                    <td><input type="text" name="data[sname]" /></td>
                </tr>
                <tr>
                    <td><label>Имя:</label></td>
                    <td><input type="text" name="data[name]" /></td>
                </tr>
                <tr>
                    <td><label>Отчество:</label></td>
                    <td><input type="text" name="data[patronymic]" /></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">
                        <input type="submit" value="Регистрация" />
                        <a href='1.php'>Отмена</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="script.js" ></script>   
    </body>
</html>