 <link rel='stylesheet' href='/style/catalog-style.css' type='text/css' media='screen, projection' /> 

<div id="container">
    <div id="content">
        <?php 
        $stuff=$_SESSION['currentStuff'];
        $n = count($stuff);
        $i=1;
        
        for ($i=1; $i<=$n; $i++): ?>
            <div class="catalogItem">
                <?php
                    echo "<a href='/index.php/items/item/".(string)$i."'>";
                    echo "<img src='".$stuff[$i]->getImageUrl()."' width='216' height='270' />";
                    echo "<p>".$stuff[$i]->name."</p></a>";

                ?>
                <div id='price-in-catalog'>
                    <a href='#'><img src='/images/small_basket_hover.png' align='right'/></a>
                    <p><?=$stuff[$i]->price?> P.</p>
                </div>
            </div> <!-- .catalogItem -->
        <? endfor; ?>
 
    </div><!-- #content-->
</div><!-- #container-->

<aside id="sideLeft">
    <ul>
        <!-- здесь будет цикл, но пока нет функции =( -->
        <li class="category" <?php if ($catId == -1){echo "id='active'";} ?>><a href="/index.php/items/">Вся обувь</a></li>
        <li class="category" <?php if ($catId == 1){echo "id='active'";} ?>> <a href="/index.php/items/itemsByCat/1/">Туфельки</a> </li>
        <li class="category" > <a href="#">Сапоги</a> </li>
        <li class="category"> <a href="#">Ботинки</a></li>
    </ul>
</aside><!-- #sideLeft -->