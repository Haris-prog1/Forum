<?php 
$users = $result ["data"]["users"];

?>
<h1>Liste des users</h1>

<?php
foreach($users as $user ){ ?>
    <p><a href=""?> <?= $user->getNickName() ?></a></p>
<?php  } 