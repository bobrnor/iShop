<link rel='stylesheet' href='/style/item-scrollable-horizontal.css' type='text/css' media='screen, projection' /> 
<link rel='stylesheet' href='/style/item-scrollable-buttons.css' type='text/css' media='screen, projection' /> 

<tr>
    <td colspan="4" id="related">
        <div id="rel_tovar_line"></div>
            <h1> Вместе с этим товаром также покупали:</h1>
            <!-- "previous page" action -->
            <a class="prev browse left"></a>
    
             <!-- root element for scrollable -->
            <div class="scrollable">
    
            <!-- root element for the items -->
            <div class="items">
                 <?php
                    $n = count($relItems);
                    $j=0;
                    foreach($relItems as $item){
                        if ($j==0)
                            echo "<div>";
                        echo "<a href='/index.php/items/item/".((string)$item->id)."'>
                                 <img src='".($item->getImageUrl())."' /></a>";
                        $j++;
                        if ($j==3){
                            echo "</div>";
                            $j=0;
                        }
                    }
                    
                   
                 ?>
           
            </div> <!-- items -->

            </div> <!-- #scrollable-->
    
     <!-- "next page" action -->
	<a class="next browse right"></a>
        </td>
    </tr>
