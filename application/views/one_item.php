<script type="text/javascript">
		function clickSize(size_id){
			var c = document.getElementsByClassName('av_size');
			for (var key in c) {
				var val = c [key];
				if ((key!='length') && (key!='item') && (val.id!=size_id)){
					val.style.backgroundImage = 'url(/images/grey_circle.png)';
					val.style.color = "#999999";
				}
			}
			var c_size = document.getElementById(size_id);
			c_size.style.backgroundImage = 'url(/images/grey_full_circle.png)';
			c_size.style.color = "#343434";
			document.getElementsByName("cursize")[0].value = parseInt(size_id);
		}
</script>

<link rel='stylesheet' href='/style/tovar_style.css' type='text/css' media='screen, projection' /> 

<?php
    function findPlace($stuff,$id)
    {
        $n = count($stuff);
        for ($i=0; $i<$n; $i++)
        {
            if($stuff[$i]->id == $id)
                return $i;
        }
    }
?>

<div id="content">
    <?php 
        $stuff = $_SESSION['currentStuff']; 
    ?>
    <div id="back_arrow"><a href="javascript:javascript:history.go(-1)"><img src="<?=base_url()?>images/back_arrow.png" width="78" height="78" /></a></div>
    <table><tr>
    	<td class="arrow">
            <?php 
                $idInStuff = findPlace($stuff, $id);
                if (($idInStuff>0)&&(count($stuff)>1))
                {
                    echo "<a href='/index.php/items/item/".((string)($stuff[$idInStuff-1]->id)).
                            "'><img src='/images/grey_left_arrow.png' width=48 height=95 /></a>";
                }
                
                $productsStuff = new ProductsStuff();
                $product=$productsStuff->getProductById($id);
                
            ?>
        </td>
        <td id="shoes">
            <?php if (@fopen($product->getImageUrl(),'r'))
                    echo "<img src='".$product->getImageUrl()."' />"; ?>
            
            <img src= <?php echo $product->getImageUrl(); ?> /> </td>
        <td id="shoe-info">
        	<h1> <?php echo $product->name; ?></h1>
            <p> <?php echo $product->description; ?> </p>
            <form name="itemInfo" method="post">
                <input type="hidden" name="stuff_id" value="<?=$id ?>" />
            	<input type="hidden" name="cursize" value="0" />  
                <?php 
                    $curSizes = $product->sizes;
                    foreach ($curSizes as $key=>$value)
                    {
                        $current=(string)$curSizes[$key]->value;
                        echo "<a href='#'><div class='av_size' onClick='clickSize(".chr(34).$current.chr(34).")' id=".chr(34).$current.chr(34).">".$current."</div></a>";
                    }
                ?>
                 <div id="tovar_line"></div>
                 <div id="price"> <?php echo ($product->price)." P."; ?></div>
                 <div id="to_bas"><a href="javascript:void(0);"><img onClick="itemInfo.submit();" src="<?=base_url()?>images/to_basket.png" /></a></div>
                 <?php
                    if (isset($_POST['stuff_id']) && isset($_POST['cursize'])){
                        if ($_POST['cursize'] == 0): ?>
                            <script type="text/javascript">alert("Размер не выбран!");</script>
                        <?php else:
                           if (isset($_SESSION['basketStuff'])==false){
                                $_SESSION['basketStuff'] = new basketStuff();
                            }
                            $_SESSION['basketStuff']->addProduct($product, $_POST['cursize']);
                            echo "<p>Товар добавлен в корзину</p>";                            
                        endif;
                    }
                 ?>
            </form>
            
           
        </td>
        
        <td> 
            <?php 
                if (($idInStuff<count($stuff)-1)&&(count($stuff)>1))
                {
                    echo "<a href='/index.php/items/item/".((string)$stuff[$idInStuff+1]->id).
                            "'><img src='/images/grey_right_arrow.png' width=48 height=95 /></a>";
                }
            ?>
        
        </td>            
    </tr>
        <?php
        $productStuff = new ProductsStuff();
        $relItems = $productStuff->getRelatedProducts($product);
               
        if (count($relItems) > 0){
            $data['relItems'] = $relItems; 
            $this->load->view('related_items', $data); 
        }?>
    
    </table>
</div><!-- #content-->
