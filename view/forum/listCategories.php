<?php
    $categories = $result["data"]['category']; 
    
    
?>

<h1 class="uk-text-center">Liste des catégories</h1>

<?php
foreach($categories as $category ){ 
    ?>
    <p class="uk-child-width-1-2@s uk-text-center"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getCategoryName() ?></a></p>
<?php  } 


  
