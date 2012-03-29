<link rel='stylesheet' href='/style/basket-style.css' type='text/css' media='screen, projection' /> 
<div id="content">
<?php 
    if (isset($_SESSION['basketStuff'])){
        $orderInfo = $_SESSION['basketStuff']->getOrderInfo();
        $orderProducts = $orderInfo->orderedProductsInfo;
        if (count($orderProducts) == 0)
            echo "<div id='empty'> Корзина пуста </div>";
        else{
            $total=0;
            foreach($orderProducts as $key=>$product){
                $data['product']=$product;
                $data['key']=$key;
                $this->load->view('basket_item', $data); 
                $total += $product->price;
            }
           echo "<div id='makeOrder'>";
           echo "<a href='#'><img src='/images/basket_make_order.png' align='left'/></a>";
           echo "<p id='totally'>".(string)$total." P.</p></div>";
        }
    }
    else //ни разу не добавляли товар в корзину
        echo "<div id='empty'> Корзина пуста </div>";
?>
</div>