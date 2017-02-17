<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check if a number is prime number</title>
</head>
<body>
    
    <h1>Check if a number is prime number</h1>
    <h3>TODO: remove 'required'. Add php validation</h3>
    <form method='post'>
        <input type="text" name="number" />
        <button>Go</button>
    </form>
    
    
    <?php 
        if ($_POST) { 
            if (!is_numeric($_POST['number'])){
                die('not a number');
            } 
            
            $number = $_POST['number'];
            for($i=0, $len = strlen($number); $i< $len; $i++){
                if($number[$i]=='.')
                    die('not integer number');
            }
            
            $number = (int)$number;
            if($number<2) {
                die('number must be not less 2');
            }
            
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
            
            echo  "Result: " . ($result ? '' : 'Not ') . 'prime';
        }  
    ?>
    
    <br>
    <a href ="index.php">return to menu</a>
</body>
</html>