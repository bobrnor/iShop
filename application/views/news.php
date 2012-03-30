 <link rel='stylesheet' href='/style/news_style.css' type='text/css' media='screen, projection' /> 
 
 <script type="text/javascript">
 function ShowFields(){
       document.getElementById("new_news").style.display="block";
  }
 
 function CloseFields(){
       document.getElementById("in_title").value=""; 
       document.getElementById("in_date").value=""; 
       document.getElementById("in_TA").value=""; 
       document.getElementById("new_news").style.display="none";
       
 }
 
 </script>

<div id="content">
    
    <?php
        if (isset($_SESSION['basketStuff'])) {
           $userInfo = $_SESSION['basketStuff']->getUserInfo();
           if (!($userInfo == NULL) && ($userInfo->isAdmin==1) )
            $this->load->view('newNews');
        }
    
        $n = count($newsStuff);
        $i=1;
        foreach ($newsStuff as $new)
        {
            $data['new'] = $new;
            $this->load->view('single_news',$data); 
        }
        
        if (isset($_SESSION['basketStuff'])) {
           $userInfo = $_SESSION['basketStuff']->getUserInfo();
           if (!($userInfo == NULL) && ($userInfo->isAdmin==1) )
            echo "<a href='javascript:ShowFields()' id='add_news' onClick='scroll(0,0);'>Добавить новость</a>";
        }
        
    ?>
    
</div><!-- #content-->