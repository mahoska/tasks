<!-- 
 Реализовать функцию, которая определяет, будет ли число простым числом
-->
<?php 
    function isCheck(&$num,&$error_str){
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
    
    function isPrime($number){
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
          return $result;  
        
    }
    
    
    ?>
    
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>prime number</title>
</head>
<body>
    <form method='post'>
        <input type="text" name="number" />
        <button>Check</button>
    </form>
    
    <?php 
    if ($_POST) {
        $error_str = null;
        $number = $_POST['number'];
        if (!isCheck($number,$error_str)) 
            echo "Error: $error_str";
        else
            echo "Result: $number - " . (isPrime($number) ? '' : 'Not ') . 'prime'; 
    }
    ?>
    <br>
    <a href ="index.php">return to menu</a>
</body>
</html>