<?php

    $topics = $result["data"]['topics']; 


 foreach ($topics as $topic) {  ?>

 <?=$topics->getText();
 }



