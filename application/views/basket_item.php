<div class="itemInfo">
    <form name="orderItem" method="post">
        <input type="hidden" name="pr" value="<?=$key?>" />
        <?php 
            if (@fopen($product->getImageUrl(),'r'))
                    echo "<img src='".$product->getImageUrl()."' class='orderImg' />";
            else
                echo "<img src='/images/no_image_small.png' class='orderImg' />";
        ?>
            
                
        <!--<a href="javascript:void(0);"><img onCLick="orderItem.submit();" src="/images/basket_remove.png" class="btnRmv"  align="right"/></a>
        -->
        <input type="image" name="btnDel" src="/images/basket_remove.png" class="btnRmv"  align="right" />
        <h1> <?php echo $product->name; ?> </h1>
        <p><?php echo $product->description; ?></p>
        <div id="choosen">Выбранный размер:</div><div class="ch_size" ><?php echo $product->orderedSize; ?></div>
        <div id="price"> <?php echo ($product->price)." Р."; ?></div>
        
        <?php 
            if (isset($_POST['btnDel_x'])){
                 unset($_POST['btnDel_x']);
                 $key = $_POST['pr'];
               
                 $orderInfo = $_SESSION['basketStuff']->getOrderInfo();
                 $orderProducts = $orderInfo->orderedProductsInfo;
                 $product = $orderProducts[$key]; 
               
                $_SESSION['basketStuff']->removeProduct($product);
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }
        ?>
    </form>
</div>
