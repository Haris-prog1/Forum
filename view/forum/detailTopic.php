<?php
    
    $topic = $result["data"]['topics']; 
    $post = $result["data"]["posts"]


?>


<?php 

    
    
    
    ?>
    <p class="uk-heading-line uk-text-center uk-text-uppercase">Résumé du post <br><br>
        <?php echo($topic->getTitle().'<br>');
    echo($post->getContent());?></p>
    <?php
    
    
    

?>

 
<h3 class="uk-heading-line uk-text-center"><span>Modifier un post</span></h3>

<form action="index.php?ctrl=forum&action=updatePost&id=<?=$post->getId()?>" method="POST" class="uk-form-stacked uk-margin-large-top">
        <div class="uk-margin">
            <label class="uk-form-label uk-text-center" for="content">Contenu du post :</label>
            <div class="uk-form-controls">
                <textarea class="uk-textarea uk-text-center" id="content" rows="10" name="content" placeholder="Content" required><?=$post->getContent()?></textarea>
            </div>
        </div>
        <div class="uk-margin">
            <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Modifier</button>
        </div>
    </form>
</div>
 
<h2 class="uk-heading-line uk-text-center"><span></span></h2>

<form action="index.php?ctrl=forum&action=deleteTopic&id=<?=$post->getId()?>" method="POST" class="uk-form-stacked uk-margin-large-top">
    
        
        <div class="uk-margin">
            <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Supprimer le post</button>
        </div>
    </div>
</form>









   