<div class='single_news'>
    <!-- admin -->
    <form method="post" action="/index.php/news/">
        <input type="hidden" name="newsId" value="<?=$new->id?>" />
        <input type="image" name="del" class="buttons" src="/images/admin_delete.png" />
        <!--<img class="buttons" id="<?=$new->id?>" src="/images/admin_edit.png" align="right"/>-->
        <?php
            if (isset($_POST['del_x'])){
                unset($_POST['del_x']);
                $id = intval($_POST['newsId']);
                $newsStuff = new NewsStuff();
                $newsStuff->removeNews($id);
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }
        ?>
    </form>
    <!-- end_admin -->
    
    <h1> <?php echo $new->title; ?></h1>
    <div class='news_info'>
        <img src='/images/date.png' width='22' height='22' align='absmiddle'/>
        <font color='#FFFFFF'> <?php echo $new->date; ?> </font>
    </div>
    <p> <?php echo $new->text; ?> </p>
</div>