<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
    
?>
<div >

<h1 class="uk-child-width-1-2@s uk-text-center uk-text-secondary">Liste des topics de la catégorie <?=$category ?></h1>


<?php
if (!empty($topics)) { // Vérifie si $topics n'est pas vide

    //On boucle tous les topics et on affiche
   foreach ($topics as $topic) { ?>
<p class="uk-child-width-1-2@s uk-text-center uk-text-uppercase uk-text-secondary">
<a href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>"><?= $topic->getTitle() ?> par <?= $topic->getUser();?></a>
</p>
<?php
   } //Si il y a pas de topic, on affiche
} else { ?>
<p class="uk-text-center uk-text-uppercase uk-text-secondary">Il n'y a aucun topic pour le moment.</p>
<?php
}
?>





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
            <button class="uk-button uk-button-secondary uk-width-1-1" name="submit" type="submit">Ajouter un nouveau topic</button>
            </div>
</div>
</form>


