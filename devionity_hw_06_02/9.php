<?php
 /*
Создать алгоритм определения всех простых чисел в промежутке от 1 до 100 при помощи for.
 *  Простое число - это число которое делится только на себя и на 1
 */
$prime_numbers = [2,3];
for ($i = 4; $i <= 100; $i++) {
    $result = true;
        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $result = false;
                    break;
            }
        }
    if ($result) 
        $prime_numbers[] = $i; 
}

$prime_numbers = implode(', ', $prime_numbers);
echo($prime_numbers); 

?>
    
    <br>
    <a href ="index.php">return to menu</a>
