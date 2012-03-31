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
                    $i=1;
                    while ($i<=$n){
                        echo "<div>";
                        $j=0;
                        while(($j<3)and($i<=$n)){
                            echo "<a href='/index.php/items/item/".((string)$i)."'>
                                 <img src='".($relItems[$i]->getPreviewImageUrl())."' /></a>";
                            $j++;
                            $i++;
                        }
                    echo "</div>";
                    }
                ?>
           
            </div> <!-- items -->

            </div> <!-- #scrollable-->
    
     <!-- "next page" action -->
	<a class="next browse right"></a>
        </td>
    </tr>
