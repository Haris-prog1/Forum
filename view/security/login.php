
<h1>Se connecter</h1>

<form action="index.php?ctrl=security&action=login" method="POST">
    <div>
        <label for="mail">Email</label>
        <input id="mail" name="mail" type="mail" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>
    </div>  
    <div>
        <button class="uk-button uk-button-primary" type="submit" name="submit">Se connecter</button>
    </div>
</form>