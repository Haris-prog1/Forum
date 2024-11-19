<?php
    $categories = $result["data"]["category"]; 
    
    
?>

<h1 class="uk-text-center">Liste des catégories</h1>

<?php
// Liste des catégories affichés
foreach($categories as $category ){ 
    ?>
    <p class="uk-child-width-1-2@s uk-text-center"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getcategoryName() ?></a></p>
<?php  } ?>




<!-- Formulaire d'ajouts de catégorie -->
<form action="index.php?ctrl=forum&action=detail"<?= $category->getId()?> method= "POST">
<div class="uk-margin">
            <label class="uk-form-label" for="categoryName">Titre :</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" id="categoryName" name="categoryName" placeholder="Titre de la catégorie" required>
            </div>
        </div>
        <div class="uk-margin">
            <button class="uk-button uk-button-primary uk-width-1-1" name="submit" type="submit">Ajouter une nouvelle catégorie</button>
        </div>
    </form>

  
