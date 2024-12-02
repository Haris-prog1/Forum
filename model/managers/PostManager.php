<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{ 

   // on indique la classe POO et la table correspondante en BDD pour le manager concerné
   protected $className = "Model\Entities\Post";
   protected $tableName = "post";

   public function __construct(){
    parent::connect();
}

//fonction de recherche des posts par topic
public function findPostsByTopic($topicId) {

    $sql = "SELECT * 
            FROM ".$this->tableName." t 
            WHERE t.topic_id = :topicId";
   
    // la requête renvoie plusieurs enregistrements --> getMultipleResults
    return  $this->getMultipleResults(
        DAO::select($sql, ['topicId' => $topicId]), 
        $this->className
    );
}





//fonction de mise à jour du post dans la bdd
public function update($id, $content){
   //requête SQL
    $sql = "UPDATE post
            SET content = :content
            WHERE id_post = :id";
            
    DAO::select($sql, [
        'content'=>$content,
        'id'=>$id,
    ]);
    
}
public function listPostsByUser($id){
            
        

    $sql = "SELECT * FROM ". $this->tableName." WHERE user_id = :id";
    
    return $this->getMultipleResults(
        DAO::select($sql, ["id"=>$id]),
        $this->className
    );
}

// Récupérer les posts par utilisateur
public function findPostsByUser($userId) {
    $sql = "SELECT * FROM ".$this->tableName." WHERE user_id = :user_id";

    return $this->getMultipleResults(
        DAO::select($sql, ['user_id' => $userId]),
        $this->className
    );
}
public function findLastFivePosts(){
    $sql = "SELECT *
     FROM ".$this->tableName." t
     ORDER BY t.creationDate DESC
     LIMIT 5";
    
  
  
     return $this->getMultipleResults(
    
     DAO::select($sql),
     $this->className
 );

}

}