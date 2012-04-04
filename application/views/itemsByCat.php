 <link rel='stylesheet' href='/style/catalog-style.css' type='text/css' media='screen, projection' /> 

<div id="container">
    <div id="content">
        <?php 
        $stuff=$_SESSION['currentStuff'];
        $isAdmin=false;
        if (isset($_SESSION['basketStuff'])) {
            $userInfo = $_SESSION['basketStuff']->getUserInfo();
            if (!($userInfo == NULL) && ($userInfo->isAdmin==1))
                    $isAdmin=true;
        }
        
        foreach ($stuff as $good): ?>
            <div class="catalogItem">
                <form method="post">
                <?php 
                    if ($isAdmin){ 
                        echo "<input type='hidden' name='itemId' value='<?=$good->id?>' />";
                        echo "<input name='btnDel$good->id' class='delItem' type='image' src='/images/admin_delete.png' />";   
                    }
                    echo "<a href='/index.php/items/item/".(string)$good->id."'>";
                    if (@fopen($good->getImageUrl(),'r'))
                        echo "<img src='".$good->getImageUrl()."' width='216' height='270' />";
                    else
                        echo "<img src='/images/no_image_small.png' width='216' height='270' />";
                    echo "<p>".$good->name."</p></a>";
                    
                    $s = 'btnDel'.$good->id.'_x';
                    if (isset($_POST['btnDel'.$good->id.'_x'])){
                        unset($_POST['btnDel'.$good->id.'_x']);
                        $productStuff = new ProductsStuff();
                        $productStuff->removeProduct($good);
                        header("Location: /index.php/items/itemsByCat/$catId");
                        
                    }

                ?>
                <div id='price-in-catalog'>
                <?php 
                   /* if ($isAdmin)
                        echo "<a href='/index.php/items/addedititem/$good->id'><img src='/images/admin_edit.png' align='right'/></a>";*/?>
                    <p><?=$good->price?> P.</p>
                </div>
                </form>
            </div> <!-- .catalogItem -->
        <? endforeach; 
        if ($isAdmin):?>
            <a href="/index.php/items/addedititem/0/"><div class="catalogItem" id="newItem">
            	<img src="/images/admin_add_pic.png" align="middle"/>	
            </div> </a>
        <? endif;?>
            
            
 
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