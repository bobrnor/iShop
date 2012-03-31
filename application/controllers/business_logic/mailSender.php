<?php

include "/system/helpers/email_helper.php";

include_once "orderInfo.php";

include_once "userInfo.php";

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mailSender
 *
 * @author Demid
 */
class MailSender {
    //put your code here
    public static function sendMail(OrderInfo $orderInfo){
        //самая тяжелая часть работы :'(
        $userInfo=$orderInfo->userInfo;
        $recipient=$userInfo->email;
        
        $subject="Спасибо за покупку в интернет магазине NoNameShoes.ru!";
        $message="Здравствуйте, $userInfo->fio!\n
            Вы приобрели:\n";
        foreach ($orderInfo->orderedProductsInfo as $product){
            $message.="$product->name $product->orderedSize размера по цене $product->price руб.\n";
        }
        $message.="Большое спасибо за совершение покупки в нашем интернет магазине!";
        send_email($recipient, $subject, $message);
    }
}

?>
