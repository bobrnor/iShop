<!-- "previous page" action -->
<a class="prev browse left"></a>
    
<!-- root element for scrollable -->
<div class="scrollable">
    
<!-- root element for the items -->
<div class="items">
    
    <?php
        $n = count($pr);
        $i=0;
        while ($i<$n)
        {
            echo "<div>";
            $j=0;
            while(($j<4)and($i<$n))
            {
                echo "<a href='#'><img src='".$pr[$i]."' /></a>";
                $j++;
                $i++;
            }
             echo "</div>";
        }

    ?>
       
  <!-- 1-4 
  <div>
     <a href="#"><img src="/images/items/Bravo-07_prev.png" /></a>
     <img src="/images/items/Dynamite-03_prev.png" />
     <img src="/images/items/stomp-101_prev.png" />
     <img src="/images/items/Bravo-07_prev.png" />
  </div>-->

          <!-- 5-8 
          <div>
          	 <img src="/images/items/Dynamite-03_prev.png" />
             <img src="/images/items/stomp-101_prev.png" />
             <img src="/images/items/Bravo-07_prev.png" />
             <img src="/images/items/Dynamite-03_prev.png" />
          </div>-->
          
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