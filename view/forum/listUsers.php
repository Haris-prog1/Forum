<?php 
$users = $result["data"]["user"];

?>
<h1 class="uk-heading-line uk-text-center">Liste des users</h1>
<div>
<?php 
foreach ($users as $user){ ?>

<p class="uk-child-width-1-2@s uk-text-center uk-text-secondary"><a href="index.php?ctrl=forum&action=profile"><?=$user->getNickName()?></a> </p>
<?php } ?>
</div>


