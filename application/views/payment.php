<link rel='stylesheet' href='/style/basket-style.css' type='text/css' media='screen, projection' />
<div id="content">
<?php 
    if ($payOk == 1){
        $userInfo = $_SESSION['basketStuff']->getUserInfo();
        if (!($userInfo->email == '')){
            $mSender = new MailSender();
            $mSender->sendMail($orderInfo);
        } 
        echo "<div id='empty'> Заказ успешно оплачен! </div>";
        $_SESSION['basketStuff']->clear();
        }
    else
        echo "<div id='empty'> Заказ не был оплачен =( </div>";
?>
</div>