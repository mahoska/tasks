<?php

/* 
Создать текстовый файл, в котором будет 10 строк. В первой строке записать 1,
 *  во второй 22, в третьей 33, ..., в десятой - десять десяток
 */

$f = fopen('test.txt', 'w');
for($i=1; $i<=10; $i++){
    $str = null;
    for($j=1; $j<=$i; $j++){
        $str.= $i;
    }
    fwrite($f, $str . PHP_EOL );
}
fclose($f);

//$f = fopen('test.txt', 'r');
//$text = fread($f, filesize('test.txt'));

$text = file_get_contents('test.txt');
echo $text."<br><br>OR<br><br>";

$find  = PHP_EOL;
$pos = strpos($text, $find);
while($pos!==false){
    $temp = substr ($text,0, $pos);
    echo $temp."<br>";
    $text = substr ($text,$pos+1);
    $pos = strpos($text, $find);
}

?>
<br>
<a href ="index.php">return to menu</a>
