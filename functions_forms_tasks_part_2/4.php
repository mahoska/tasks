<?php

/* 
4. Написать функцию, которая выводит список файлов в заданной директории.
 *  Директория задается как параметр функции.
 */

function readDirectory($dir_name){
    $dir = opendir($dir_name);
    if(!$dir) die("Указанный каталог не найден");
    echo "<br><div style='position:relative; left:15px;'>";
    while(($file = readdir($dir)) !== false){
        if(is_file("$dir_name/$file")){
            echo "<b>{$dir_name}</b>/<span style=color:blue>{$file}</span></br>";
        }
        else if(is_dir("$dir_name/$file") && $file != "." && $file != "..")
            readDirectory("$dir_name/$file");
    }
    echo"</div><br>";
    closedir($dir);
    
}

readDirectory(__DIR__);

?>
<br>
<a href ="index.html">return to menu</a>  