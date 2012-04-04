<link rel="stylesheet" href="/style/tovar_style.css" type="text/css" media="screen, projection" />
<?php 
    function sizeById($sizes,$id){
        foreach ($sizes as $size){
            if ($size->id == $id)
                return $size;
        }      
    }
    
    function categoryById($cats,$id){
        foreach ($cats as $cat){
            if ($cat->id == $id)
                return $cat;
        }      
    }
    
    
?>


<div id="content">
    <table id="itemInfo"><tr>
    	<!--<td class="arrow"><a href="#"><img src="images/grey_left_arrow.png" width="48" height="95" /></a></td>-->
        <td id="shoes"><a href="#"><img src="/images/admin_add_bigpic.png" /></a> </td>
        <td id="shoe-info">
            
        <form method="post">
            <input required name="fName" type="text" placeholder="модель..." id="in_name" /> 
            <select name="fCat" required id="in_cat">
                <option disabled>Выберите категорию</option>
            <?php 
                $productStuff = new ProductsStuff();
                $cats = $productStuff->getAllCategories();
                foreach ($cats as $cat):?>
                    <option value="<?=$cat->id?>"><?=$cat->name?></option>
                <? endforeach; ?>
            </select>
            <textarea spellcheck="false" name="fText" wrap="hard" value ="" placeholder="описание..." id="in_TA"></textarea>
            
            <select name="fSizes[]" required id="in_siz" multiple>
                <option disabled>Выберите размеры</option>
            <?php
                $sizes = $productStuff->getAllSizes();
                
                foreach ($sizes as $size):?>
                    <option value="<?=$size->id?>"><?=$size->value?></option>
                <? endforeach; ?>
            </select>
            
            <input required name="fPrice" type="text" placeholder="цена..." id="in_price" /> 
            <input name="addItem" type="image" src="/images/admin_additem.png" />
            
            <?php
                if (isset($_POST['addItem_x'])){
                    unset($_POST['addItem_x']);
                    $product = new ProductInfo();
                    $product->name = $_POST['fName'];
                    $product->category = categoryById($cats, $_POST['fCat']);
                    $product->description = $_POST['fText'];
                    $product->price = $_POST['fPrice'];
                    $product->setImageUrl("nothing");
                    
                    $ch_sizes=$_POST['fSizes'];
                    foreach($ch_sizes as $size){
                        $sizeInfo = sizeById($sizes,$size);
                        $product->sizes[$sizeInfo->id] = $sizeInfo; 
                    }
                    $productStuff->addProduct($product); 
                    $_SESSION['currentStuff']=$productStuff->getProducts(NULL, -1, 0, 100);
                    header("Location: /index.php/items/");
                }
            ?>
        </form>
        </td>
      <!--  <td class="arrow"><a href="#"><img src="images/grey_right_arrow.png" width="48" height="95" /></a></td>    -->
    </tr>
   
    </table>
    
    
    
    
 
		
	</div><!-- #content-->
