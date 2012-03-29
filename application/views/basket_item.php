<div class="itemInfo">
    <form name="orderItem" method="post">
        <img src="<?=$product->getImageUrl()?>" class="orderImg" />
        <img onCLick="orderItem.submit()" src="/images/basket_remove.png" class="btnRmv"  align="right"/>
        <h1> <?php echo $product->name; ?> </h1>
        <p><?php echo $product->description; ?></p>
        <div id="choosen">Выбранный размер:</div><div class="ch_size" ><?php echo $product->orderedSize; ?></div>
        <div id="price"> <?php echo ($product->price)." Р."; ?></div>
    </form>
</div>
