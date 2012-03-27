<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orderedProductInfo
 *
 * @author bobrnor
 */

include_once "productInfo.php";

class OrderedProductInfo extends ProductInfo {
    
    public $orderedSize;
    
    public function initWithProductInfo(ProductInfo $productInfo) {
        
        $this->id = $productInfo->id;
        $this->name = $productInfo->name;
        $this->description = $productInfo->description;
        $this->setImageUrl($productInfo->getImageUrl());
        $this->price = $productInfo->price;
        $this->category = $productInfo->category;
        $this->sizes = $productInfo->sizes;
    }
}

?>
