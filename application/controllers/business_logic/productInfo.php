<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productInfo
 *
 * @author bobrnor
 */

include_once "productCategory.php";
include_once "productSize.php";

class ProductInfo {
    
    public $id;
    public $name;
    public $description;
    private $imageUrl;
    private $previewImageUrl;
    public $price;
    public $category;
    public $sizes;
    
    public function setImageUrl($value) {
        
        $this->imageUrl = $value;
    }
    
    public function getImageUrl() {
        
        return "/images/items/".$this->imageUrl;
    }
    
    public function getPreviewImageUrl() {
        
        return "/images/items/preview_".$this->imageUrl;
    }
}

?>
