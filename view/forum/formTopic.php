<?php
    $category = $result["data"]['post']; 
    
?>
<html>
<form class="input" action="index.php?ctrl=forum&action=addTopictoCategory&id=">
<button type="submit">Crée un topic</button>
</form>
</html>
<?php 
foreach($categories as $category) { ?>
    <tr>
           <input><?= $category["title"] ?></input>
           <input><?= $category["content"]?></td>
           

       </tr> <?php } ?>











<?php
require "view/forum/formTopic.php";