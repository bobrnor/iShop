<form method="post" id="newComment">
    <h2>Оставить комментарий:</h2>
    <textarea required spellcheck="false" name="fText" wrap="hard" value ="" id="in_TA"></textarea>
    <input name="btnAddCom" type="image" src="/images/leave_comment.png" onClick="javascript:void(0);" />
    <?php 
        if (isset($_POST['btnAddCom_x'])){
            unset($_POST['btnAddCom_x']);
            $comment = new CommentInfo();
            $comment->text = $_POST['fText'];
            $comment->product = $product;
            $comment->author = $userInfo;
            $ps = new ProductsStuff();
            $ps->addComment($comment);
            //die((string)$id);
            //header("Location: /index.php/items/item/$id/");
            header("Location: {$_SERVER['HTTP_REFERER']}");
            
        }
    ?>
    
</form>
