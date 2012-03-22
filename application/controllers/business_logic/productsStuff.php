<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productsStuff
 *
 * @author bobrnor
 */

include_once "productInfo.php";

class ProductsStuff {
    
    function connectDb() {
        
        mysql_connect("localhost", "root", "");
        mysql_select_db("ishop");
    }
    
    function disconnectDb() {
        
        mysql_close();
    }
    
    public function getProducts($searchString, $category, $from, $to) {
        
        $query = "SELECT p.id as pid, p.name, p.article, p.image_url, 
            p.price, c.id as cid, c.name as cat_name, s.id as sid, s.value as size
            FROM products p, categories c, sizes s, products_sizes ps 
            WHERE p.id = ps.pid AND s.id = ps.sid AND p.category = c.id";
        
        if ($category > 0) {
            $query .= " AND c.id = $category";
        }
        
        if ($searchString != NULL) {
            $query .= " AND p.name LIKE \"%$searchString%\"";
        }
        
        $query .= " LIMIT $from, $to";
        
        $this->connectDb();        
        $result = mysql_query($query);
        
        $products = array();
        
        while ($row = mysql_fetch_array($result)) {
            if (array_key_exists($row["pid"], $products)) {
                $product = $products[$row["pid"]];
            }
            else {
                $product = new ProductInfo();
                $products[] = $product;
                
                $product->id = $row["pid"];
                $product->name = $row["name"];
                $product->article = $row["article"];
                $product->imageUrl = $row["image_url"];
                $product->price = $row["price"];

                $category = new ProductCategory();
                $category->id = $row["cid"];
                $category->name = $row["cat_name"];

                $product->category = $category;
            }
            
            $size = new ProductSize();
            $size->id = $row["sid"];
            $size->value = $row["size"];
            
            $product->sizes[$size->id] = $size;
        }
        
        $this->disconnectDb();
        
//        print_r($products);
        
        return $products;
    }
    
    public function getProducts1($from, $to) {
        
        return $this->getProducts(NULL, -1, $from, $to);
    }
    
    public function getProducts2($searchString, $from, $to) {
        
        return $this->getProducts($searchString, -1, $from, $to);
    }
    
    public function getProducts3($category, $from, $to) {
        
        return $this->getProducts(NULL, $category, $from, $to);
    }
}

?>
