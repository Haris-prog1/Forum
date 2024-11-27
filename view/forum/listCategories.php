<?php
    $categories = $result["data"]["category"]; 
    
    
?>
<div>
<?php
if (!empty($categories)) {
// Liste des catégories affichés
foreach($categories as $category ){ 
    ?>
    <p class="uk-child-width-1-2@s uk-text-center uk-text-secondary uk-flex-bottom"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getcategoryName() ?></a></p>
<?php  }}
else{ ?>
    <p class="uk-text-center uk-text-uppercase uk-text-secondary">Il n'y a aucun topic pour le moment.</p>
    
<?php } ?>

<h1 class= "uk-heading-line uk-text-center">Liste des catégories</h1>
<!-- Formulaire d'ajouts de catégorie -->
<form action="index.php?ctrl=forum&action=addCategory"<?= $category->getId()?> method= "POST">
<div class="uk-margin">
            <label class="uk-form-label" for="categoryName">Titre :</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" id="categoryName" name="categoryName" placeholder="Titre de la catégorie" required>
            </div>
        </div>
        <div class="uk-margin">
            <button class="uk-button uk-button-success uk-text-secondary uk-width-1-1" name="submit" type="submit">Ajouter une nouvelle catégorie</button>
        </div>
    </form>




  
