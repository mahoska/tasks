<?php

/* 
Выполнить предыдущие задания при помощи альтернативного синтаксиса
 */

/* 
7 Создать алгоритм вычисления максимального значения двух заданных переменных при
помощи тернарного оператора 
 */

function maximum2($a,$b, &$max){
    if($a == $b): 
        return false;
    else:
        $max = $a > $b ? $a : $b;
        return true;
    endif;
}

function switch_maximum($a,$b){
    switch($a == $b):
        case true:
            echo "числа равны";
            break;
        case false:
            switch($a>$b):
                case true:
                    echo $a;
                    break;
                case false:
                    echo $b;
                    break;
            endswitch;
    endswitch;
}

function prime($from=1,$to=100){
        $isCheck = true;
        $prime_numbers = [];
        $error_str="";
        
        $max_number = $to;
        $min_number = $from;
        if ($max_number <= 0 || $min_number <= 0 ) :
            $error_str = "min number must be integer and greater than 0";
            $isCheck = false;
        
        else:
            if($max_number < $min_number):
                $temp = $max_number;
                $max_number = $min_number;
                $min_number = $temp;
            endif;
            
            if($max_number==1 && $min_number==1):$prime_numbers[] = 1;
            elseif($max_number==2 && $min_number==1):$prime_numbers = [1,2];
            else:
                for ($number = $min_number; $number <= $max_number; $number++) :
                    $result = true;

                    if ($number == 2) :
                        $result = true;
                    else :
                        for ($i = 2; $i < $number; $i++):
                            if ($number % $i == 0):
                                $result = false;
                                break;
                            endif;
                        endfor;
                    endif; 

                    if ($result) :
                       $prime_numbers[] = $number; 
                    endif;
                endfor;
            endif;
            $prime_numbers = implode(', ', $prime_numbers);
        endif;    
    


    if($isCheck):
        echo $prime_numbers; 
    else: 
        echo $error_str;
    endif;
}


if($_POST):
    $a = (int)$_POST['number1'];
    $b = (int)$_POST['number2'];
    
    $max=null;
    echo "Exact Maximum ($a,$b)=> ".(maximum2($a,$b,$max) ? $max : "числа равны");
    
    
    echo "<br><br>";
    switch_maximum($a,$b);
    echo "<br><br>";


echo "<br><br>Prime number(from $a to  $b): ";
prime($a, $b);
echo "<br><br>";

endif;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>conditions construction</title>
</head>
<body>
    <form method="post">
        <input type="number"  name="number1" step="1"  required/>
        <input type="number"  name="number2" step="1" required/>
        <button>Send</button>
    </form>
    
    <br><a href="index.php">return to menu</a>
</body>
</html>
