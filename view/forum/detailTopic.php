<?php
    
    $topic = $result["data"]['topics']; 
    


?>


<?php 

    
    
    
    
    echo($topic->getTitle());
    
    $topic->getCreationDate();
    

?>

 
    










    <!-- Formulaire pour rajouter un nouveau post -->
    <form class="uk-form-stacked uk-margin-large-top" action="index.php?ctrl=forum&action=addPostByTopic&id=<?= $topic->getId() ?>" method="POST">
        <div class="uk-margin">
            <label class="uk-form-label" for="content">Ajouter un commentaire :</label>
            <div class="uk-form-controls">
                <textarea class="uk-textarea" id="content" name="content" rows="5" placeholder="Votre commentaire..." required></textarea>
            </div>
        </div>
        <div class="uk-margin">
            <button class="uk-button uk-button-primary uk-width-1-1" name="submit" type="submit">Ajouter un nouveau post</button>
        </div>
    </form> 
</div>