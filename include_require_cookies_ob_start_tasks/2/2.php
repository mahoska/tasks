<?php
error_reporting(E_ALL);
/* 
2. Воспроизвести сообщение "headers already sent"
 */
include_once 'info.html';
//возвращает текущее содержимое буфера, затем обнуляет его 
//и отключает буферизацию вывода
ob_get_flush(); 

 if(!headers_sent()) {
    header('Location: ../index.php');
    die();
}else{
    echo "<h1>headers already sent</h1>";
    die();
}
?>