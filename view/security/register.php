<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Inscription</h1>
</head>
<body>
    <form action="index.php?ctrl=security&action=register" method="POST">
        <div>
            <input id="nickName" name="nickName" type="text" required>Utilisateur
        </div>
        <div>
            <input id="mail" name="mail" type="mail" required>Adresse Email
        </div>
        <div>
            <input id="password" name="password" type="password" required>Mot de passe
        </div>
        <div>
            <button  name="submit" type="submit">Inscription
        </div>
    </form>
</body>
</html>