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
    public $article;
    public $imageUrl;
    public $price;
    public $category;
    public $sizes;
}

?>
