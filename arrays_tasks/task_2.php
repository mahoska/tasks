<?php 
    function check(&$num,&$error_str){
      if (!is_numeric($num)){
                $error_str .= "one value is not a number";
                return false;
            } 
            
            for($i=0, $len = strlen($num); $i< $len; $i++){
                if($num[$i]=='.'){
                    $error_str .= "one value is not integer number";
                    return false;
                }
            }
            
            $num = (int)$num;
            if($num<2) {
                 $error_str .= "number must be not less 2";
                 return false;
            } 
            return true;
    }
    
    $isFormSent = false;

    if ($_POST) { 
        
        $isFormSent = true;
        $isCheck = true;
        $prime_numbers = [];
        $error_str="";
        
        $max_number = $_POST['data']['max_number'];
        $min_number = $_POST['data']['min_number'];
        if (!check($max_number,$error_str) || !check($min_number,$error_str)) {
            $isCheck = false;
        }
        else if($max_number < $min_number){
            $error_str = "max must be more than min";
            $isCheck = false;
        }
        else{
            for ($number = $min_number; $number <= $max_number; $number++) {
                $result = true;

                if ($number == 2) {
                    $result = true;
                } else {
                    for ($i = 2; $i < $number; $i++) {
                        if ($number % $i == 0) {
                            $result = false;
                            break;
                        }
                    }
                } 

                if ($result) {
                   $prime_numbers[] = $number; 
                }
            }
            $prime_numbers = implode(', ', $prime_numbers);
        }
    }  
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get primes from range</title>
</head>
<body>
    
    <h1>Get primes from range</h1>
    <h3>TODO: add min input</h3>
    Add range:<br>
    <form method='post'>
        Minimum:<input type="text" name="data[min_number]"  /><br>
        Maximum:<input type="text" name="data[max_number]"  /><br>
        <button>Go</button>
    </form>
    
    <?php if ($isFormSent) : ?>
        <?php if (!$isCheck) : ?>
        Error: <?=$error_str; ?>
        <?php else: ?>
        Primes: <?=$prime_numbers; ?>
        <?php endif ?> 
    <?php endif ?>  
        
    <br>
    <a href ="index.php">return to menu</a>
</body>
</html>

