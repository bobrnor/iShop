<link rel='stylesheet' href='/style/basket-style.css' type='text/css' media='screen, projection' /> 
<div id="content">
<?php 
    if (isset($_SESSION['basketStuff'])){
       // $basketStuff = $_SESSION['basketStuff'];
        $orderInfo = $_SESSION['basketStuff']->getOrderInfo();
        $orderProducts = $orderInfo->orderedProductsInfo;
        if (count($orderInfo->orderedProductsInfo) == 0)
            echo "<div id='empty'> Корзина пуста </div>";
        else{
            echo "в корзине ".(string)count($orderInfo)." товаров";
        }
    }
    else //ни разу не добавляли товар в корзину
        echo "<div id='empty'> В корзину ничего не добавлено </div>";
?>
</div>