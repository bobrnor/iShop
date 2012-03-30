 <link rel='stylesheet' href='/style/login-style.css' type='text/css' media='screen, projection' /> 
<div id="content">
    	<form name="log-reg" method="post" id="regForm">
            <h1>Регистрация</h1>
            <p id="comment">Поля со звездочкой (*) обязательны для заполнения</p>
            <div class="req-labels">Логин:*</div><input name="login" type="text" class="regTxtBox" />
            <div class="req-labels">Пароль:*</div><input name="pass" type="password" class="regTxtBox" />
            <div class="req-labels">ФИО:*</div><input name="FIO" type="text" class="regTxtBox" />
            <div class="req-labels">Адрес:*</div><input name="adress" type="text" class="regTxtBox" />
            <div class="labels">e-mail:</div><input name="email" type="text" class="regTxtBox" />
            
            <input name="regist" type="image" src="/images/login_reg.png" id="btnReg"/>
            <?php 
                if (isset($_POST['regist_x'])){
                    unset($_POST['regist_x']);
                    if (($_POST['login']=='')||($_POST['pass']=='')||($_POST['FIO']=='')||($_POST['adress']=='')):?>
                        <script type="text/javascript">alert("Некоторые обязательные поля остались незаполненными!");</script>
                    <?php else:
                        $userInfo = new UserInfo();
                        $userInfo->address =$_POST['adress'];
                        $userInfo->email =$_POST['email'];
                        $userInfo->fio =$_POST['FIO'];
                        $userInfo->isAdmin = 0;
                        $userInfo->password =$_POST['pass'];
                        $userInfo->username =$_POST['login'];
                        $userManager = new UserManager();
                        $uid = $userManager->addUser($userInfo);
                       // die((string)$uid);
                        if ($uid == -1): ?>
                            <script type="text/javascript">alert("Пользователь с таким именем уже существует!");</script>
                   <?php else:
                         $userInfo->uid = $uid;
                         $_SESSION['hasLogined']=true;
                         if (isset($_SESSION['basketStuff'])==false){
                            $_SESSION['basketStuff'] = new basketStuff(); 
                         }
                         $_SESSION['basketStuff']->setUserInfo($userInfo);  ?>
                          <script type="text/javascript">alert("Регистрация прошла успешно!");</script>
                 <?php
                        // header("Location: /index.php/");
                         endif;
                    endif;
                }
            ?>
            
        	
        </form>
  
    </div><!-- #content-->
