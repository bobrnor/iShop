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
                <form name="rel_items" method="post">
                    <input type="hidden" name="flag" value="1"/>
                 <?php
                    $n = count($relItems);
                    $i=0;
                    while ($i<$n)
                    {
                        echo "<div>";
                        $j=0;
                        while(($j<3)and($i<$n))
                        {
                            if (@fopen($relItems[$i]->getImageUrl(),'r'))
                                echo "<input type='image' name='im' src='".($relItems[$i]->getImageUrl())."' width='216' height='270' />";
                            else
                                echo "<input type='image' name='im' src='/images/no_image_small.png' width='216' height='270' />";
                           
                            if (isset($_POST['im_x'])){
                               $_SESSION['currentStuff']=$relItems;
                               header("Location: /index.php/items/item/".((string)$relItems[$i]->id));
                            }
                            
                            $j++;
                            $i++;
                        }

                         echo "</div>";
                    }
                 ?>
                </form>
           
            </div> <!-- items -->

            </div> <!-- #scrollable-->
    
     <!-- "next page" action -->
	<a class="next browse right"></a>
        </td>
    </tr>
