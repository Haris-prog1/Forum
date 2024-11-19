<?php 
$users = $result["data"]["user"];

?>
<h1 class="uk-heading-line uk-text-center">Liste des users</h1>
<div>
<?php 
foreach ($users as $user){ ?>

<p class="uk-heading-line uk-text-center"><?=$user->getNickName()?> </p>
<?php } ?>
</div>


