<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">

</head>
<div class="background"></div>
<h1 class="titlePage">BIENVENUE SUR FORUM</h1>

<?php

$topics = $result['data']['topic'];
$posts = $result['data']['post'];






?>





<header id="#top">
    <div class="row">
      
       
    </div>
    
   

  
   <?php
    $user = App\Session::getUser();
    if ($user) {

                                ?>
                               <div class="row">
        <div class="large-6 column lpad top-msg breadcrumb">
            
        </div>
        <div class="large-6 small-12 column lpad top-msg ar ">
            Bienvenue,
            <!-- Ici on devrait rajouter soit Welcome ... User si connecté, autrement Welcome, Visiteur                      -->
            <a href="#" class="underline"><?=$user ?></a>
           
        </div>
    </div>
                                
                                <?php
                            }elseif (App\Session::isAdmin()) { ?>
                                <div class="row">
                                <div class="large-6 column lpad top-msg breadcrumb">
                                    
                                </div>
                                <div class="large-6 small-12 column lpad top-msg ar ">
                                    Bienvenue,
                                    <!-- Ici on devrait rajouter soit Welcome ... User si connecté, autrement Welcome, Visiteur                      -->
                                    <a href="#" class="underline"><?=$user?></a>
                                </div>
                            </div>
                         <?php   } else { ?>
                            <div class="row">
                                <div class="large-6 column lpad top-msg breadcrumb">
                                    
                                </div>
                                <div class="large-6 small-12 column lpad top-msg ar ">
                                    Bienvenue,
                                    <!-- Ici on devrait rajouter soit Welcome ... User si connecté, autrement Welcome, Visiteur                      -->
                                    <a href="#" class="underline">Visiteur </a>
                                </div>
                      <?php   }
                            ?>




        

        <div class="toggleview">
            <div class="large-12 forum-head">
                <div class="large-8 small-8 column lpad">
                    Dernier topics 
                </div>

                <?php foreach ($topics as $topic){?>

                    

<div class="large-12 forum-topic">
    <div class="large-1 column lpad">
        <i class="icon-file"></i>
    </div>
 
    <div class="large-7 small-8 column lpad">
        <span class="overflow-control">
    
        <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId()?>"><?= $topic->getTitle()?></a>
        
        </span>
        <span>Posté le :<?= $topic->getcreationDate() ?></span>
        <span>Par <?=$topic->getUser()?></span>
        <span class="overflow-control">
            
        </span>
    </div>
 




              <?php  } ?>
              <div class="toggleview">
            <div class="large-12 forum-head">
                <div class="large-8 small-8 column lpad">
                    Dernier posts
                </div>

                <?php foreach ($posts as $post){?>
                <div class="large-12 forum-topic">
    <div class="large-1 column lpad">
        <i class="icon-file"></i>
    </div>
 
    <div class="large-7 small-8 column lpad">
        <span class="overflow-control">
    
        <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $post->getId()?>"><?= $post->getContent()?></a>
        </span>
        <span>Posté le :<?= $post->getcreationDate() ?></span>
        <span>Par <?=$post->getUser()?></span>
        <span class="overflow-control">
            
        </span>
    </div>
           <?php } ?>

</header>

<body>


    </thead>
    <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    <!-- <p class= "uk-text-center"> <a href="index.php?ctrl=security&action=login">Se connecter</a></p>
       <p class= "uk-text-center"> <a href="index.php?ctrl=security&action=register">S'inscrire</a></p> -->