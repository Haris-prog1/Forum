<?php

    $topics = $result["data"]['topics']; 


 foreach ($topics as $topic) {  ?>

<p class="uk-child-width-1-2@s uk-text-center"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topic->getUser() ?>"><?= $topic->getTitle() ?></a></p>

 <?php }?>



