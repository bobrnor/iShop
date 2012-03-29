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
    <div class="single_news" id="new_news"> <!-- admin -->
    
        <form method="post" name="emptyNews">
            	<input name="n_title" type="text" id="in_title">
                <a href="javascript:void(0);"><img class="buttons" src="/images/admin_add.png" onClick="emptyNews.submit();" border="0"></a>
                <a href="javascript:CloseFields()"><img class="buttons" src="/images/admin_delete.png" /></a>
                <div class="news_info">
                    <img src="/images/date.png" width="22" height="22" align="absmiddle"/>
                    <input name="n_date" type="text" id="in_date">
	            </div>
                <textarea spellcheck="false" name="n_text" wrap="hard" value ="" id="in_TA"></textarea>
                <?php
                    $hide = false;
                    if (isset($_POST['n_title']) || isset($_POST['n_date']) || isset($_POST['n_text'])){
                        $title = $_POST["n_title"];
                        $date = $_POST["n_date"];
                        $text = $_POST["n_text"];
                        unset($_POST["n_title"]);
                        unset($_POST["n_date"]);
                        unset($_POST["n_text"]);
                        if (($title == "")||($date == "")||($text == "")):?>
                            <script type="text/javascript">alert("Остались пустые поля!")</script>
                        <?php else:
                            $nInfo = new NewsInfo();
                            $nInfo->date = $date;
                            $nInfo->text = $text;
                            $nInfo->title = $title;
                            $newsStuff = new NewsStuff();
                            $newsStuff->addNews($nInfo);
                            $newsStuff = $newsStuff->getNews(NULL, 0, 100);
                            $hide = true;
                       endif;
                    }
                    if ($hide == true):?>
                            <script type="text/javascript">CloseFields(); alert("Запись успешно добавлена!")</script>
                    <?php endif;?>
                   
        </form>
    </div> <!-- end_admin -->
    <?php
        $n = count($newsStuff);
        $i=1;
        foreach ($newsStuff as $new)
        {
            $data['new'] = $new;
            $this->load->view('single_news',$data); 
        }
        
    ?>
    <!--admin-->
    <a href="javascript:ShowFields()" id="add_news" onClick="scroll(0,0);">Добавить новость</a>
</div><!-- #content-->