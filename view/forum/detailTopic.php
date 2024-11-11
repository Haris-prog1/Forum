<?php
    $posts = $result["data"]['posts'];
    $topics = $result["data"]['topic']; 




 foreach ($posts as $post): { ?>
  
?>
<p class="uk-child-width-1-2@s uk-text-center"><a href="index.php?ctrl=forum&action=detailTopic="<?= $post->getUser() ?>"><?= $post->getContent() ?></a></p> 
   <?php };?>