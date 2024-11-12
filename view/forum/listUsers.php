<?php 
$users = $result["data"]["user"];

?>
<h1>Liste des users</h1>
<div>
<?php 
foreach ($users as $user){ ?>

<p><?=$user->getNickName()?> </p>
<?php } ?>
</div>


