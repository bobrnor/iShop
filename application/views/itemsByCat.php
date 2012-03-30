 <link rel='stylesheet' href='/style/catalog-style.css' type='text/css' media='screen, projection' /> 

<div id="container">
    <div id="content">
        <?php 
        $stuff=$_SESSION['currentStuff'];
        foreach ($stuff as $good): ?>
            <div class="catalogItem">
<!--                <form method="post">-->
                    <?php
                        echo "<a href='/index.php/items/item/".(string)$good->id."'>";
                        echo "<img src='".$good->getImageUrl()."' width='216' height='270' />";
                        echo "<p>".$good->name."</p></a>";

                    ?>
                    <div id='price-in-catalog'>
                       <!-- <a href='#'><img src='/images/small_basket_hover.png' align='right'/></a> -->
<!--                        <input type="image" name="btnInBas" src="/images/small_basket_hover.png" align="right" />-->
                        <p><?=$good->price?> P.</p>
                    </div>
<!--                </form>-->
            </div> <!-- .catalogItem -->
        <? endforeach; ?>
 
    </div><!-- #content-->
</div><!-- #container-->

<aside id="sideLeft">
    <ul>
        <li class="category" <?php if ($catId == -1){echo "id='active'";} ?>><a href="/index.php/items/">Вся обувь</a></li>
        <?php
            $products = new ProductsStuff();
            $cats = $products->getAllCategories();
          
            foreach ($cats as $cat):?>
                <li class="category" <?php if ($catId == $cat->id){echo "id='active'";} ?>>
                    <a href="/index.php/items/itemsByCat/<?=(string)($cat->id)?>/"><?php echo $cat->name; ?></a> </li>
        <?endforeach ?>
    </ul>
</aside><!-- #sideLeft -->