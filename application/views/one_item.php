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
			/*document.getElementsByName("cursize")[0].value = parseInt(size_id);*/
		}
</script>

<div id="content">
    <?php $stuff = $_SESSION['currentStuff']; ?>
    <div id="back_arrow"><a href="javascript:javascript:history.go(-1)"><img src="/images/back_arrow.png" width="78" height="78" /></a></div>
    <table><tr>
    	<td class="arrow">
            <?php 
                if (($id>1)&&(count($stuff)>1))
                {
                    echo "<a href='/index.php/items/item/".((string)($id-1))."'><img src='/images/grey_left_arrow.png' width=48 height=95 /></a>";
                }
            ?>
        </td>
        <td id="shoes"><img src= <?php echo $stuff[$id]->getImageUrl(); ?> /> </td>
        <td id="shoe-info">
        	<h1> <?php echo $stuff[$id]->name; ?></h1>
            <p> <?php echo $stuff[$id]->description; ?> </p>
            <form>
            	<input type="hidden" name="cursize" value="0">  
                <?php 
                    $curSizes = $stuff[$id]->sizes;
                    foreach ($curSizes as $key=>$value)
                    {
                        $current=(string)$curSizes[$key]->value;
                        echo "<a href='#'><div class='av_size' onClick='clickSize(".chr(34).$current.chr(34).")' id=".chr(34).$current.chr(34).">".$current."</div></a>";
                    }
                ?>
            </form>
            
            <div id="tovar_line"></div>
            <div id="price"> <?php echo ($stuff[$id]->price)." P."; ?></div>
            <div id="to_bas"><a href="#"><img src="/images/to_basket.png" /></a></div>
        </td>
        
        <td> 
            <?php 
                if (($id<count($stuff))&&(count($stuff)>1))
                {
                    echo "<a href='/index.php/items/item/".((string)($id+1))."'><img src='/images/grey_right_arrow.png' width=48 height=95 /></a>";
                }
            ?>
        
        </td>    
    </tr></table>
</div><!-- #content-->
