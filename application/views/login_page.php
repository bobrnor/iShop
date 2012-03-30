 <link rel='stylesheet' href='/style/login-style.css' type='text/css' media='screen, projection' /> 
 
<div id="content">
    	<form name="log-reg" method="post" id="loginForm">
            <div class="labels">Логин:</div><input name="login" type="text" class="txtBox" />
            <div class="labels">Пароль:</div><input name="pass" type="password" class="txtBox" />
            <a href="/index.php/users/register/" id="reg-link"><p align="right"> Регистрация</p></a>
            <input name="comein" type="image" src="/images/login_come-in.png" id="btnCome"/>
            <?php
                if (isset($_POST['comein_x'])){
                    unset($_POST['comein_x']);
                    $login=$_POST['login'];
                    $pass=$_POST['pass'];
                    if (($login=='')|| ($pass == '')): ?>
                        <script type="text/javascript">alert("Остались пустые поля!");</script>
                    <?php else:
                        $userManager = new UserManager();
                        $userInfo = $userManager->checkLogin($login, $pass);
                        if ($userInfo == NULL):?>
                            <script type="text/javascript">alert("Логин и пароль не верные!");</script>
                        <?php else:
                            $_SESSION['hasLogined']=true;
                            if (isset($_SESSION['basketStuff'])==false){
                                $_SESSION['basketStuff'] = new basketStuff(); 
                            }
                            $_SESSION['basketStuff']->setUserInfo($userInfo);                            
                            header("Location: /index.php/");
                        endif;
                         
                    endif;
                }
            ?>
        	
        </form>
  
    </div><!-- #content-->