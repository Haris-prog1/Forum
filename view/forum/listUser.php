<?php 
$users = $result ["data"]["users"];

?>
<h1>Liste des users</h1>

<?php
foreach($users as $user ){ ?>
    <p class="uk-background-default uk-padding uk-panel"><a href="index.php?ctrl=forum&action=listUser&id="?> <?= $user->getNickName() ?></a></p>
<?php  } 