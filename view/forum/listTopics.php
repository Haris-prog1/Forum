<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
    
?>

<h1 class="uk-child-width-1-2@s uk-text-center">Liste des topics de la catégorie <?=$category ?></h1>


<?php
// var_dump($topics);
// var_dump($result);
foreach($topics as $topic ){ ?>

    <p class="uk-child-width-1-2@s uk-text-center uk-text-uppercase
    "><a href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>"><?= $topic->getTitle() ?></a> par <?= $topic->getUser()?></p>
<?php }?>





<form action="index.php?ctrl=forum&action=addTopicByCategory&Id=<?= $category->getId()?>" method= "POST" enctype="multipart/form-data">
<div class="uk-margin">
            <label class="uk-form-label" for="title">Titre :</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="title" id="title" name="title" placeholder="Titre du sujet" required <?= $category->getcategoryName()?>>
            </div>
        
        <div class="uk-margin">
            <label class="uk-form-label" for="content">Résumé :</label>
            <div class="uk-form-controls">
                <textarea class="uk-textarea" id="content" name="content" rows="5" placeholder="Résumé du sujet" required></textarea>
            </div>
        </div>
        <div class="uk-margin">
            <button class="uk-button uk-button-primary uk-width-1-1" name="submit" type="submit">Ajouter un nouveau topic</button>
            </div>
</div>
</form>


