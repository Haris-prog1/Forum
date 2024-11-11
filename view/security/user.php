<?php 
$users = $result['data']['users'];

?>

    <h2>Utilisateur :</h2>


<?php foreach ($users as $user): ?>
    <p>Utilisateurs : <?= $user->getNickName()?> inscrit le <?= $user->getDateRegistration()?></p>
    <form action="index.php?ctrl=forum&action=anonymizeAndDeleteUser&id=<?= htmlspecialchars($user->getId()) ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->getId()); ?>">
        <button type="submit">Supprimer</button>
        
    </form>
<?php endforeach; ?>