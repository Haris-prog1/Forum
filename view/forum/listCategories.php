<?php
    $categories = $result["data"]['categories']; 
    var_dump($categories);
?>

<h1>Liste des catégories</h1>

<?php
foreach($categories as $category ){ ?>
    <p class="uk-child-width-1-2@s uk-text-center"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
<?php  } 


  