<?php

/* 
6. Создать страницу, на которой можно загрузить несколько фотографий в галерею.
 *  Все загруженные фото должны помещаться в папку gallery и
 *  выводиться на странице в виде таблицы.
 */
function isFormValid(){
    return !empty($_FILES['data']);
}

function requestGet($key, $default = null){
    return isset($_GET[$key])? $_GET[$key] : $default;
}

function redirect($to){
   header("Location: {$to}");
   die;
}

function isTypeValide($filename){
    $file_permissible_type = ['jpg','png','gif','bmp']; 
    $file_type = pathinfo($filename, PATHINFO_EXTENSION);
    //var_dump($file_type);
    $flag_ok_type = false;
    foreach($file_permissible_type as $type){
        if(strcasecmp($type, $file_type)== 0) {
            $flag_ok_type = true;
            break;
        }
    }
    return $flag_ok_type?$file_type:null;
    
}

function read_files_from_directory($dir_path,&$to){
    // Открываем директорию 
  $dir = opendir($dir_path); 
  if(!$dir) 
      echo "не удалось найти каталог";
  else{
    // В цикле считываем её содержимое 
    while(($filename = readdir($dir)) !== false) 
    { 
      // Если текущий объект является файлом - 
      if(!is_dir($filename)) $to[] = "gallery/".$filename; 
    } 
    // Закрываем директорию 
    closedir($dir); 
}
}

function uplode_files($data,&$to){
    $is_upl = false;
        $len = count($to);
        for($i = 0, $count = count($data['tmp_name']); $i < $count; $i++){
            //проверяем загружен ли файл
            if(is_uploaded_file($data['tmp_name'][$i])){
                    //проверяем загружено ли изображение(файл на нужный нам тип)
                    $file_type = isTypeValide($data['name'][$i]);
                    if($file_type){
                        //файл успешно загружен, перемещаем его в текущий каталог
                        $new_file_name = "gallery".DIRECTORY_SEPARATOR."pic".(++$len).".".$file_type;
                         if(move_uploaded_file($data['tmp_name'][$i], $new_file_name )){
                            echo "Файл успешно загружен<br>";
                            $to[]= $new_file_name;
                            $is_upl = true;
                        }
                        else 
                            echo "Файл не удалось загрузить<br>";
                    }
                    else 
                        echo "Файл ".$data['name'][$i]." недопустимого типа<br>";
            }
        }
        return $is_upl;
    
}

$pictures = [];
$dir_path = __DIR__. DIRECTORY_SEPARATOR ."gallery";
//echo $dir_path,"<br>";
read_files_from_directory($dir_path,$pictures);
//echo '<pre>';
//var_dump($pictures);
$flashMessage = requestGet('flash');

if($_FILES){
    if(isFormValid()){
        //    echo"<pre>";
        //    var_dump($_FILES);
        $data =   $_FILES['data'];
        $flashMessage  = uplode_files($data,$pictures)?"Загрузка прошла успешно":"Ошибка загрузки";
        redirect("6_1.php?flash={$flashMessage}");
    }
}




  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>task 6</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{
                margin:0;
                padding:0;
                border:0;
            }
            #container{
                width:1000px;
                margin:0 auto;
                height:auto;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <b><?=$flashMessage;?></b>
            <h2>Загрузить файлы:</h2>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="data[]" required multiple/><br>
                <button>Добавить файлы</button>
            </form>


            <?php if(!empty($pictures)):?>
            <table>
                <?php 
                    $i = 0;
                    foreach($pictures as $pic):
                        if ($i % 4 == 0 || $i == 0)echo"<tr>";
                ?>            
                    <td><div style='
                                    background:url(<?=$pic;?>) no-repeat;
                                    width: 200px;
                                    height:200px;
                                    min-height:200px;
                                    min-width:200px;
                                    max-height:200px;
                                    max-width:200px;
                                    background-size:cover;
                                    background-position: center;
                                    margin:20px;'
                        ></div></td>
                <?php        
                        $i++;
                        if ($i % 4 == 0) echo"</tr>"; 
                    endforeach;
                ?>
            </table>
            <?php endif;?>
        </div> 
        <br>
        <a href ="index.html">return to menu</a>  
    </body>
</html>