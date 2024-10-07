<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>


<?php
// var_dump($topics);
// var_dump($result);
foreach($topics as $topic ){ var_dump($topic); ?>
    <p><a href="index.php?ctrl=forum&action=listPostsByTopic"><?= $topic->getTitle() ?></a> par <?= $topic->getUser()->getNickName() ?></p>
<?php }
