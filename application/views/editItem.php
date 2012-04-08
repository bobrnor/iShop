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
   
        <form method="post" style="width:530px; margin: 0 auto 0;" id="shoe-info" enctype="multipart/form-data">
            <div class="lbls">Модель:</div><input required name="fName" type="text" placeholder="модель..." id="in_name" /> 
            <div class="lbls">Категория:</div><select name="fCat" required id="in_cat">
                <option disabled>Выберите категорию</option>
            <?php 
                $productStuff = new ProductsStuff();
                $cats = $productStuff->getAllCategories();
                foreach ($cats as $cat):?>
                    <option value="<?=$cat->id?>"><?=$cat->name?></option>
                <? endforeach; ?>
            </select>
            <div class="lbls">Описание:</div><textarea spellcheck="false" name="fText" wrap="hard" value ="" placeholder="описание..." id="in_TA"></textarea>
            
            <div class="lbls">Фото:</div><input name="foto" type="file"  id="in_foto" />
            <div class="lbls">Фото-превью:</div><input type="file" name="prefoto" id="in_foto" />
            <div class="lbls">Размеры:</div><select name="fSizes[]" required id="in_siz" multiple>
                <option disabled>Выберите размеры</option>
            <?php
                $sizes = $productStuff->getAllSizes();
                
                foreach ($sizes as $size):?>
                    <option value="<?=$size->id?>"><?=$size->value?></option>
                <? endforeach; ?>
            </select>
            
            <div class="lbls">Цена:</div><input required name="fPrice" type="text" placeholder="цена..." id="in_price" /> 
            
            <input name="addItem" type="image" src="/images/admin_additem.png" />
            
            <?php
                if (isset($_POST['addItem_x'])){
                    unset($_POST['addItem_x']);
                    $product = new ProductInfo();
                    if(is_uploaded_file($_FILES["foto"]["tmp_name"])){
                         $upfile = getcwd()."\\images\\items\\".basename($_FILES["foto"]["name"]);
                         $product->setImageUrl($_FILES["foto"]["name"]);   
                         move_uploaded_file($_FILES["foto"]["tmp_name"], $upfile);
                   }
                   else {
                      echo("Error =(");
                   }
                   if(is_uploaded_file($_FILES["prefoto"]["tmp_name"])){
                     $upfile = getcwd()."\\images\\items\\preview_".basename($_FILES["prefoto"]["name"]);
                     move_uploaded_file($_FILES["prefoto"]["tmp_name"], $upfile);
                   }
                   else {
                      echo("Error =(");
                   }
                    
                    $product->name = $_POST['fName'];
                    $product->category = categoryById($cats, $_POST['fCat']);
                    $product->description = $_POST['fText'];
                    $product->price = $_POST['fPrice'];
                    
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
</div><!-- #content-->
