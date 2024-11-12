<?php
    $categories = $result["data"]['categories']; 
    var_dump($categories);
?>

<h2>Ajout Categorie</h2>
<form action="index.php?ctrl=forum&action=addCategory" method="POST">
    <label for="NameCategory">Nom de la catégorie</label>
    <input type="text" id="NameCategory" name="nameCategory" required>
    <button id="submit"type=submit name="submit">Ajouter une catégorie</button>
</form>

<?php
foreach($categories as $category ){ ?>
    <p class="uk-child-width-1-2@s uk-text-center"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?><?= $category->getContent() ?></a></p>
<?php  } 


  
