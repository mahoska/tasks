<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random dimension table</title>
</head>
<body>
    
    <h1>Random dimension table</h1>
    <h3>Make gradients from left to right on each row</h3>
    <?php
    
        $rows = rand(5, 15);
        $cols = rand(5, 15);
        $max_color_value = pow(16, 6);
    ?>
        <table border="0" cellspacing="0">
            <?php for ($i = 1; $i <= $rows; $i++): ?>
            <tr>
                <?php 
                    $red1 = rand(0, 255);
                    $green1 = rand(0, 255);
                    $blue1 = rand(0, 255);
                    $red2 = rand(0, 255);
                    $green2 = rand(0, 255);
                    $blue2 = rand(0, 255);
                    for($j = 1; $j <= $cols; $j++): 
                        $r = $j / $cols;
                        $red = (int)($red2 * $r + $red1 * (1 - $r));
                        $green = (int)($green2 * $r + $green1 * (1 - $r));
                        $blue = (int)($blue2 * $r + $blue1 * (1 - $r));
                 ?>
                <td style="background-color: rgb(<?=$red.",".$green.",".$blue?>);width:20px;height:20px;"></td>
            <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    
    <br>
    <a href ="index.php">return to menu</a>
</body>
</html>