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
            <h1>ЗАКАЗЧИК:</h1>
            <form name="log-reg" method="post" id="regForm" >
        	<p id="comment">Поля со звездочкой (*) обязательны для заполнения</p>
        	
                <div class="req-labels">ФИО:*</div><input name="FIO" type="text" class="regTxtBox"
                    <?php if (!is_null($userInfo))  echo "value='$userInfo->fio'"; ?> />
                <div class="req-labels">Адрес:*</div><input name="adress" type="text" class="regTxtBox"
                     <?php if (!is_null($userInfo)) echo "value='$userInfo->address'"; else echo"";?> />
                <div class="labels">e-mail:</div><input name="email" type="text" class="regTxtBox" 
                     <?php if (!is_null($userInfo)) echo "value='$userInfo->email'"; else echo"";?> />
                <input name="btnNext" type="image" src="/images/next.png" id="btnReg"/>
                <?php
                    if (isset($_POST['btnNext_x'])){
                        unset($_POST['btnNext_x']);
                        
                        if (($_POST['FIO']=="")||($_POST['adress']=="")):?>
                            <script type="text/javascript">alert("Некоторые обязательные поля остались незаполнеными!");</script>
                        <?php 
                            exit;
                        else:
                            if ($userInfo == NULL){
                                $userInfo = new UserInfo();
                            }
                            $userInfo->fio = $_POST['FIO'];
                            $userInfo->address = $_POST['adress'];
                            $userInfo->email = $_POST['email'];
                            
                           // $orderInfo->userInfo = $userInfo;
                            
                            $_SESSION['basketStuff']->setUserInfo($userInfo);
                            
                            header("Location: /index.php/basket/makePay");
                            
                            //$data['orderInfo']=$orderInfo;
                            //$this->load->view('orderInfo',$data);
                           /* if (!($userInfo->email == '')){
                               
                                $mSender = new MailSender();
                                $mSender->sendMail($orderInfo);
                            }*/
                            
                        endif;
                        
                    }
                ?>
            </form>
        </td>
    
    </tr></table>
  
    </div><!-- #content-->
