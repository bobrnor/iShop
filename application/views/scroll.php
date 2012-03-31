 <link rel="stylesheet" href="/style/scrollable-horizontal.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="/style/scrollable-buttons.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="/style/scrollable-navigator.css" media="screen, projection"/>

<div id="w_content">

<!-- "previous page" action -->
<a class="prev browse left"></a>
    
<!-- root element for scrollable -->
<div class="scrollable">
    
<!-- root element for the items -->
<div class="items">
    
    <?php
        $n = count($stuff);
//        $j=0;
//        foreach($stuff as $item){
//            if ($j==0)
//                echo "<div>";
//            echo "<a href='/index.php/items/item/".((string)$item->id)."'><img src='".($item->getPreviewImageUrl())."' /></a>";
//            $j++;
//            if ($j==4){
//                echo "</div>";
//                $j=0;
//            }
//        }
        $i=1;
        while ($i<=$n)
        {
            echo "<div>";
            $j=0;
            while(($j<4)and($i<=$n))
            {
               echo "<a href='".base_url()."index.php/items/item/".((string)$i)."'>
                    <img src='".($stuff[$i]->getPreviewImageUrl())."' /></a>";
              
                $j++;
                $i++;
            }
         
             echo "</div>";
        }
    ?>
          
</div>

</div> <!-- #scrollable-->
    
<!-- "next page" action -->
<a class="next browse right"></a>

<!-- wrapper for navigator elements -->
<div class="navi"></div>

 <div id="line"></div>
    
    <div id="bonus">
    <table width="960px">
    <tr>
    	<td class="tab_td">
            <table><tr>
                <td class="num">1</td>
                <td class="info"><h1>БЕСПЛАТНАЯ ДОСТАВКА</h1>
                    <p>Оформи заказ с 2.00 до 4.00 ночи и мы доставим его бесплатно!</p>
                </td>
            </tr></table>
        </td>

        <td class="tab_td">
            <table><tr>
                <td class="num">2</td>
                <td class="info"><h1>СКИДКА</h1>
                    <p>Оформи заказ на сумму от 10 т.р и получи скидку 5%!</p>
                </td>
            </tr></table>
        </td>
        
        <td class="tab_td">
            <table><tr>
                <td class="num">3</td>
                <td class="info"><h1>ПОДАРОК</h1>
                    <p>Каждому покупателю фирменный брелок в подарок =)</p>
                </td>
            </tr></table>
        </td>
    </tr>
    </table>
    </div>
 
 </div><!-- #content-->