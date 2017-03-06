<?php
/* 
Сделать выпадающий список со списком цветов (красный, синий, желтый и т.д.).
После выбора цвета и отправки формы надо:
1) запоминать цвет в cookies и выводить на странице текст Lorem Ipsum 
в выбранном цвете; 
2) если был выбран цвет, например, желтый, то при следующей загрузке страницы
должен быть тоже выбран желтый в выпадающем списке. 
То есть, необходимо проставлять selected="seleted" для выбранного пункта 
в выпадающем списке. То есть, сохранять выбранное значение при перезагрузке
страницы. 
 */
function requestPost($key, $default = null){
    return isset($_POST[$key])? $_POST[$key] : $default;
}

function requestCookie($key, $default = null){
    return isset($_COOKIE[$key])? $_COOKIE[$key] : $default;
}

$colors = ["red","blue","yellow","green"];

if($_POST){
    $send_color  = requestPost('colors','black');
    setcookie("color", $send_color, time()+60*60*24*365);
} elseif ($_COOKIE) {
    $send_color  = requestCookie('color','black');
} 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>task 3</title>
    </head>
    <body>
        <form method="post">
            <select name="colors">
                <?php foreach($colors as $color):?>
                    <option value="<?=$color?>" <?=($color == $send_color)?"selected":""?>><?=$color?></option>
                <?php endforeach; ?>
            </select>
            <button>Send</button>
        </form>
        
        <div style="color:<?=$send_color;?>">
            <h1>Lorem Ipsum</h1>
            <p>
                <i>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet,
                    consectetur, adipisci velit..."</i><br>
                <small>"Нет никого, кто любил бы боль саму по себе, кто искал бы её и 
                            кто хотел бы иметь её просто потому, что это боль.."</small>
            </p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Maecenas mattis auctor ex, et auctor libero dapibus lacinia.
                Vivamus iaculis arcu sit amet nulla porttitor placerat. 
                In non sodales arcu, nec molestie est. In condimentum enim sed
                quam consequat ornare. Mauris semper ultrices bibendum.
                Mauris bibendum neque in mauris finibus egestas. Integer sed 
                dignissim ipsum. Donec cursus vehicula sodales.
            </p>

            <p>
                Pellentesque eros metus, imperdiet sed laoreet a, dignissim eu
                turpis. Vivamus at sapien volutpat eros luctus facilisis. 
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                posuere cubilia Curae; Nunc in erat commodo, ornare tellus feugiat,
                aliquet nunc. Integer tristique odio dolor, ac luctus nisl 
                consequat efficitur. Praesent non nisi vitae mi pulvinar convallis.
                Vivamus suscipit aliquet justo, interdum porta nisl cursus eget.
                Nunc ut bibendum turpis.
            </p>

            <p>
                Proin ac sem ornare, commodo turpis at, pharetra massa. 
                Proin non justo dignissim, porttitor mauris quis, pellentesque
                erat. Integer augue risus, consequat in justo quis, vestibulum 
                commodo nibh. Praesent congue at augue ut interdum. Morbi a ex 
                eget ante scelerisque hendrerit non in erat. Morbi aliquet eu 
                turpis non tincidunt. Morbi leo diam, aliquet id venenatis vitae,
                maximus nec urna. Sed pellentesque, augue sit amet vestibulum 
                tempor, nulla nibh mattis turpis, in ornare dolor felis vitae 
                neque. Morbi porta nunc id mauris pellentesque consectetur. 
                Nulla facilisis dui vel tristique venenatis. In nisi quam, 
                interdum sit amet orci vitae, tempus auctor dui. Donec tellus
                felis, ullamcorper sit amet congue et, vestibulum nec felis.
                Sed ut fringilla neque. Donec semper nisl et nisi luctus, 
                nec ultrices mauris dapibus. Sed suscipit volutpat odio, 
                eu mattis odio. Integer sollicitudin purus odio, sit amet
                hendrerit tellus molestie eu.
            </p>
        </div>
    </body>
</html>