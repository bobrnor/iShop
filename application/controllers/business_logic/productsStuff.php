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
        mysql_set_charset("utf8");
    }
    
    function disconnectDb() {
        
        mysql_close();
    }
    
    public function getProducts($searchString, $category, $from, $to) {
        
        $query = "SELECT p.id as pid, p.name, p.description, p.image_url, 
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
                $products[$row["pid"]] = $product;
                
                $product->id = $row["pid"];
                $product->name = $row["name"];
                $product->description = $row["description"];
                $product->setImageUrl($row["image_url"]);
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
    
    public function addProduct(ProductInfo $productInfo) {
        
        $this->connectDb();        
        $result = mysql_query($query);
        
        $category = $productInfo->category;
        $categoryQuery = "INSERT INTO IGNORE categories (name) VALUES ($category->name)";
        mysql_query($categoryQuery);
        
        $categoryQuery = "SELECT id FROM categories WHERE name = $category->name";
        $result = mysql_query($categoryQuery);
        $row = mysql_fetch_array($result);
        
        $category->id = $row["id"];

        $productQuery = "INSERT INTO products 
            (name, image_url, price, category, description) 
            VALUES ($productInfo->name, 
                $productInfo->getImageURL(), 
                $productInfo->price, 
                $category->id, 
                $productInfo->description)";
        
        mysql_query($productQuery);
        
        $pid = mysql_insert_id();
        
        $sizesQuery = "INSERT INTO products_sizes (pid, sid) VALUES ";
        
        foreach ($productInfo->sizes as $i => $size) {
            if ($i > 0) {
                $sizesQuery .= ", ";
            }
            $sizesQuery .= " ($pid, $size->id)";
        }
        
        mysql_query($sizesQuery);
        
        $this->disconnectDb();
    }
    
    public function removeProduct(ProductInfo $productInfo) {
        
        $this->connectDb();        
        $result = mysql_query($query);
        
        $query = "DELETE FROM products_sizes WHERE pid = $productInfo->id";
        mysql_query($query);
        
        $query = "DELETE FROM products WHERE id = $productInfo->id";
        mysql_query($query);
        
        $this->disconnectDb();
    }
    
    public function editProduct(ProductInfo $productInfo) {
        
        $this->connectDb();        
        $result = mysql_query($query);
        
        $category = $productInfo->category;
        $categoryQuery = "INSERT INTO IGNORE categories (name) VALUES ($category->name)";
        mysql_query($categoryQuery);
        
        $categoryQuery = "SELECT id FROM categories WHERE name = $category->name";
        $result = mysql_query($categoryQuery);
        $row = mysql_fetch_array($result);
        
        $category->id = $row["id"];

        $productQuery = "UPDATE products 
            SET 
            (name = $productInfo->name, 
            image_url = $productInfo->getImageURL(), 
            price = $productInfo->price,  
            category = $category->id, 
            description = $productInfo->description)";
        
        mysql_query($productQuery);
        
        $query = "DELETE FROM products_sizes WHERE pid = $productInfo->id";
        mysql_query($query);
        
        $sizesQuery = "INSERT INTO products_sizes (pid, sid) VALUES ";
        
        foreach ($productInfo->sizes as $i => $size) {
            if ($i > 0) {
                $sizesQuery .= ", ";
            }
            $sizesQuery .= " ($productInfo->id, $size->id)";
        }
        
        mysql_query($sizesQuery);
        
        $this->disconnectDb();
    }
}

?>
