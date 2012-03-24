 <link rel='stylesheet' href='/style/news_style.css' type='text/css' media='screen, projection' /> 

<div id="content">
    <?php
        $n = count($newsStuff);
        $i=1;
        foreach ($newsStuff as $new)
        {
            echo "<div class='single_news'>";
            echo "<h1>".$new->title."</h1>";
            echo "<div class='news_info'>";
            echo "<img src='/images/date.png' width='22' height='22' align='absmiddle'/>";
            echo "<font color='#FFFFFF'>".$new->date."</font>";
            echo "</div>";
            echo "<p>".$new->text."</p>"; 
            echo "</div>";
        }
    ?>
</div><!-- #content-->