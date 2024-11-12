<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1 class="uk-child-width-1-2@s uk-text-center">Liste des topics de la catégorie <?=$category ?></h1>


<?php
// var_dump($topics);
// var_dump($result);
foreach($topics as $topic ){ ?>
    <p class="uk-child-width-1-2@s uk-text-center"><a href="index.php?ctrl=forum&action=detailTopic&Id="><?= $topic->getTitle() ?></a> par <?= $topic->getUser() ?></p>
<?php }?>
Ajouter topic
</a>

