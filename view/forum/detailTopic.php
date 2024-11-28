<?php
    
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]["posts"];
    
    

?>



     <p class="uk-heading-line uk-text-left uk-text-uppercase uk-text-muted uk-text-center">Résumé du post </p><br><br>

   




     <?php
     if (!empty($posts)){
     foreach ($posts as $post){ ?>
        <p class="uk-heading-line uk-text-left uk-text-uppercase uk-text-muted uk-text-center uk-child-width-1-2@s uk-text-center"><?= $topic->getTitle()?></a></p></div>
        
        <p class="uk-heading-line uk-text-left uk-text-uppercase uk-text-muted uk-text-center uk-child-width-1-2@s uk-text-center"><?= $post->getContent()?></a></p></div>
      
        <?php
        
        
       
    

    
    
 }}
 else {
  ?>  <p>Aucun post disponible.</p>
   
<?php } ?>

    
    
<?php
if (App\Session::isAdmin()) { ?>
<form action="index.php?ctrl=forum&action=addPost&id=<?=$topic->getId()?>" method="POST">
    <div class="uk-margin">
        <label class="uk-form-label" for="content">Résumé :</label>
        <div class="uk-form-controls">
            <input class="uk-textarea" id="content" name="content" rows="5" placeholder="Résumé du sujet" required>
        </div>
    </div>

    <div class="uk-margin">
        <button class="uk-button uk-button-danger uk-width-1-1" name="submit" type="submit">Publier le post</button>
    </div>

</form>

<?php } elseif(App\Session::getUser()){ ?>
    <form action="index.php?ctrl=forum&action=addPost&id=<?=$topic->getId()?>" method="POST">
    <div class="uk-margin">
        <label class="uk-form-label" for="content">Résumé :</label>
        <div class="uk-form-controls">
            <input class="uk-textarea" id="content" name="content" rows="5" placeholder="Résumé du sujet" required>
        </div>
    </div>

    <div class="uk-margin">
        <button class="uk-button uk-button-danger uk-width-1-1" name="submit" type="submit">Publier le post</button>
    </div>

</form>
<?php } ?>








<?php
if (App\Session::isAdmin()) { ?>
    <h3 class="uk-heading-line uk-text-center uk-text-secondary"><span>Modifier un post</span></h3>
    
    <form action="index.php?ctrl=forum&action=updatePost&id=<?=$post->getId()?>" method="POST" class="uk-form-stacked uk-margin-large-top">
            <div class="uk-margin">
                <label class="uk-form-label uk-text-center" for="content">Contenu du post :</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-text-center" id="content" rows="10" name="content" placeholder="Content" required><?=$post->getContent()?></textarea>
                </div>
            </div>
            <div class="uk-margin">
                <button class="uk-button uk-button-secondary uk-width-1-1" type="submit">Modifier</button>
            </div>
        </form>
    </div>
     
    <h2 class="uk-heading-line uk-text-center"><span></span></h2>
    
    <form action="index.php?ctrl=forum&action=deleteTopic&id=<?=$post->getId()?>" method="POST" class="uk-form-stacked uk-margin-large-top">
        
            
            <div class="uk-margin">
                <button class="uk-button uk-button-secondary uk-width-1-1" type="submit">Supprimer le post</button>
            </div>
        </div>
    </form>


<?php } ?>