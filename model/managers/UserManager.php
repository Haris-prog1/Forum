<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }


    
    public function findOneByMail($email) {
        $sql = "SELECT * FROM ".$this->tableName." WHERE mail = :mail";

        // la requête renvoie un seul enregistrement --> getOneOrNullResult
        return $this->getOneOrNullResult(
            DAO::select($sql, ['mail' => $email], false),
            $this->className
    
        );
    
     }
     public function findPassword($email){

        $sql = "SELECT u.password FROM ".$this->tableName."u WHERE u.mail = :mail";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['mail' => $email], false),
            $this->className
        );
    }
}

 
     