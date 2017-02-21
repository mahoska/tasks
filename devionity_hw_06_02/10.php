<?php
 /*
Создать алгоритм определения всех простых чисел в промежутке от 1 до 100 при помощи while.
 *  Простое число - это число которое делится только на себя и на 1
 */
$prime_numbers = [2,3];
$i = 4;
while ($i <= 100) {
    $result = true;
        $j = 2;
        while ( $j < $i) {
            if ($i % $j == 0) {
                $result = false;
                    break;
            }
            $j++;
        }
    if ($result) 
        $prime_numbers[] = $i; 
    
    $i++;
}

$prime_numbers = implode(', ', $prime_numbers);
echo($prime_numbers); 

?>
    
    <br>
    <a href ="index.php">return to menu</a>
