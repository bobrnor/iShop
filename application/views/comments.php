<tr>
    <td colspan="4" id="related" width="650px">
        <h1>Комментарии пользователей:</h1>
        <?php
        $productsStuff = new ProductsStuff();
        $comments = $productsStuff->getComments($product);
        foreach ($comments as $comment): ?>
            <h2>Пользователь <?php echo $comment->author->username;?> пишет: </h2>
            <p> <?php echo $comment->text;?> </p>
        <? endforeach;
         $data['product'] = $product;
         $data['userInfo'] = $userInfo;
         $data['id']=$id;
        $this->load->view('addcomment',$data);  ?>   
            
    </td>
</tr>
