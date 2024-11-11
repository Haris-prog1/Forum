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
            <input id="Username" name="Utilisateur" type="text" required>Utilisateur
        </div>
        <div>
            <input id="Email" name="Mail" type="Mail" required>Adresse Email
        </div>
        <div>
            <input id="Password" name="Password" type="Password" required>Mot de passe
        </div>
        <div>
            <button  name="submit" type="submit">Inscription
        </div>
    </form>
</body>
</html>