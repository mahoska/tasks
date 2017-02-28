<?php

/* 
5. Написать функцию, которая выводит список файлов в заданной директории, 
 * которые содержат искомое слово. Директория и искомое слово задаются как
 *  параметры функции.
 */

function readDirectory($dir_name, $string){
    $dir = opendir($dir_name);
    if(!$dir) die("Указанный каталог не найден");
    while(($file = readdir($dir)) !== false){
        if(is_file("$dir_name/$file")){
            isWordInFile($dir_name.DIRECTORY_SEPARATOR.$file, $string);
        }
        else if(is_dir("$dir_name/$file") && $file != "." && $file != "..")
            readDirectory("$dir_name/$file",$string);
    }
    closedir($dir);
}

function isWordInFile($file_name, $string){
            $file_content = file_get_contents($file_name);
            if($file_content){
                //нестрогое соответствие - может быть частью слова
                /*
                if(strpos($file_content,$string)!==false){
                        echo $file."<br>";
                }
                */
                preg_match_all("/\b$string\b/", $file_content,$out);
                if(!empty($out[0]))
                    echo $file_name."<br>";
            }
}    


echo"<pre>";
readDirectory(__DIR__,"video");

?>
<br>
<a href ="index.html">return to menu</a>  