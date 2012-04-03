<link rel='stylesheet' href='/style/basket-style.css' type='text/css' media='screen, projection' />
<?php 
    if ($payOk == 1)
        echo "<div id='empty'> Заказ успешно оплачен! </div>";
    else
        echo "<div id='empty'> Заказ не был оплачен =( </div>";
?>