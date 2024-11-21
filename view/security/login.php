<!-- Formulaire pour se connecter  -->
<h1 class="uk-child-width-1-2@s uk-text-center uk-text-muted">Se connecter</h1>


<p class="uk-child-width-1-2@s uk-text-center uk-text-muted">Renseignez les champs afin de vous</p>
<form action="index.php?ctrl=security&action=login" method="POST" class="uk-form-stacked uk-margin-large-top uk-text-muted">
    <div class="uk-margin uk-icon=user">
        
    <label class="uk-form-label uk-form uk-child-width-1-2@s uk-text-muted" for="mail"> <span uk-icon="user">Email</span></label>
        <div class="uk-form-controls">
            
         <input class="uk-input" id="mail" name="mail" type="mail" required>
            
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label uk-text-muted" for="password">Mot de passe</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="password" name="password" type="password" required>
        </div>
    </div>
    <div class="uk-margin">
        <button class="uk-button uk-button-secondary uk-form-controls" type="submit" name="submit">Se connecter</button>
    </div>
</form>


<!-- <a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a> -->