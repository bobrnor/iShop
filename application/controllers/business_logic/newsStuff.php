<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newsStuff
 *
 * @author bobrnor
 */

include_once "newsInfo.php";

class NewsStuff {
    
    function connectDb() {
        
        mysql_connect("localhost", "root", "");
        mysql_select_db("ishop");
        mysql_set_charset("utf8");
    }
    
    function disconnectDb() {
        
        mysql_close();
    }
    
    public function getNews($searchString, $from, $to) {
        
        $query = "SELECT n.id, n.title, n.text, n.date
            FROM news n";
        
        if ($searchString != NULL) {
            $query .= " WHERE n.title LIKE \"%$searchString%\" 
            OR n.text LIKE \"%$searchString%\"";
        }
        
        $query .= " LIMIT $from, $to";
        
        print_r($query);
        
        $this->connectDb();
        
        $results = mysql_query($query);
        
        $news = array();
        
        while ($row = mysql_fetch_array($results)) {
            $singleNews = new NewsInfo();
            $singleNews->id = $row["id"];
            $singleNews->title = $row["title"];
            $singleNews->text = $row["text"];
            $singleNews->date = $row["date"];
            
            $news[] = $singleNews;
        }
        
        $this->disconnectDb();
        
        print_r($news);
        
        return $news;
    }
    
    public function getNews1($from, $to) {
        
        return $this->getNews(NULL, $from, $to);
    }
    
    public function getNews2() {
        
        return $this->getNews(NULL, 0, 10);
    }
}

?>
