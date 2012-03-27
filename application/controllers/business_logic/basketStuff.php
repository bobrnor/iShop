<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of basketStuff
 *
 * @author bobrnor
 */

include_once "orderedProductInfo.php";
include_once "orderInfo.php";

class basketStuff {
    
    private $userInfo;
    private $orderedProducts;
    
    public function addProduct($productInfo, $size) {
        
        $orderedProduct = new OrderedProductInfo();
        $orderedProduct->initWithProductInfo($productInfo);
        $orderedProduct->orderedSize = $size;
        
        $orderedProducts[] = $orderedProduct;
    }
    
    public function removeProduct($orderedProductInfo) {
        
        foreach ($this->orderedProducts as $key => $orderedProduct) {
            if ($orderedProduct == $orderedProductInfo) {
                unset($this->orderedProducts[$key]);
            }
        }
    }
    
    public function clear() {
        
        $this->orderedProducts = array();
    }
    
    public function getOrderInfo() {
        
        $orderInfo = new orderInfo();
        $orderInfo->userInfo = $this->userInfo;
        $orderInfo->orderedProductsInfo = $this->orderedProducts;
        
        return $orderInfo;
    }
    
    public function setUserInfo($userInfo) {
     
        $this->userInfo = $userInfo;
    }
    
    public function getUserInfo() {
        
        return $this->userInfo;
    }
}

?>
