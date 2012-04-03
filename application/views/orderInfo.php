 <link rel='stylesheet' href='/style/zakaz-style.css' type='text/css' media='screen, projection' /> 

<div id="content">
    <table><tr>
    	<td id="basketInfo">
        	<h1>ВАШ ЗАКАЗ:</h1>
            <div id="bas_items">
                <?php 
                    $orderInfo = $_SESSION['basketStuff']->getOrderInfo();
                    $stuff = $orderInfo->orderedProductsInfo;
                    $userInfo = $orderInfo->userInfo;
                    $totally = 0;
                    foreach ($stuff as $item){
                        $totally += $item->price;
                        echo "<p class='bas_item'>$item->name</p><p align='right'>$item->price Р.</p>";
                    }
                ?>
            </div>
            <p class="bas_item"> Итого:</p><p id="bas_price" align="right"> <?php echo "$totally Р."?></p>
        </td>
        
        <td id="usrInfo">
            <h1>ОПЛАТА:</h1>
            <form name="log-reg" method="post" id="regForm" action="https://merchant.webmoney.ru/lmi/payment.asp">
        	<p id="comment">Вы точно хотите оплатить заказ? Для продолжения оплаты нажмите кнопку "Оплатить"</p>
        	
                <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="<?=$totally?>">
                <input type="hidden" name="LMI_PAYMENT_DESC" value="тестовый платеж">
                <!--<input type="hidden" name="LMI_PAYMENT_NO" value="1">-->
                <input type="hidden" name="LMI_PAYEE_PURSE" value="R205810322092">
                <input type="hidden" name="LMI_SIM_MODE" value="0">    

                
                <input name="btnPay" type="image" src="/images/basket_pay.png" id="btnReg"/>
                <?php
                    if (isset($_POST['btnPay_x'])){
                        unset($_POST['btnPay_x']);
                        
                             $productStuff = new ProductsStuff();
                             $productStuff->addRelatedProducts($stuff);
                            
                    }
                ?>
            </form>
        </td>
    
    </tr></table>
  
    </div><!-- #content-->
