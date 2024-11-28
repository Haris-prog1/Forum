<?php 
$users = $result["data"]["user"];

?>
<?php if (App\Session::isAdmin()) { ?>
<h1 class="uk-heading-line uk-text-center">Liste des users</h1>
<div>
<?php 
foreach ($users as $user){ ?>

<p class="uk-child-width-1-2@s uk-text-center uk-text-secondary"><a href="index.php?ctrl=forum&action=profile"><?=$user->getNickName()?></a> </p>
<?php } ?>
<?php } else { ?>
    <h1 class="uk-child-width-1-2@s uk-text-center uk-text-danger">Error 404! <br>
        La page que vous tentez d'acceder n'existe pas!</h1>
<?php } ?>
</div>


