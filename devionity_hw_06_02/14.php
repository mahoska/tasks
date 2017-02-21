<a href ="index.php">return to menu</a>
<br>
<?php

/* 
Как можно упростить функцию test() в данном скрипте?

function test($x, $y)
{
	if ($y == 0) {
		return false;
	}

	return $x / $y;

}

echo test(1, 0) or die('Error');
echo 'Unreached line';


 */

//смотря где мы хотим остановить скрипт
//////////////////////////вариант 1///////////////////////////////////
function test($x, $y)
{
    return !$y ? die('Error') : $x / $y;
}

echo test(1, 0) ;

/////////////////////////вариант 2/////////////////////////////////
function test1($x, $y)
{
    return !$y ? false : $x / $y;
}

echo test1(1, 0) or die('Error');

?>
    
 
