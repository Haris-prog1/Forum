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
    public function findOneByEmail($email){

        $sql = "SELECT *
                FROM ".$this->tableName." 
                WHERE mail = :mail
                ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['mail' => $email], false), 
            $this->className
        );
    }
    // Fonction de récupération du mot de passe
     public function findPassword($mail){
        // Requète sql qui va chercher le mot de passe dans la base de données
        $sql = "SELECT u.password FROM ".$this->tableName."u WHERE u.mail = :mmail";
        // On retourne le résultat de la requête
        return $this->getOneOrNullResult(
            DAO::select($sql, ['mail' => $mail], false),
            $this->className
        );
    }
    


    // Fonction de suppresion d'un utilisateur par l'id
    public function deleteUser($userId) {
        $sql = "DELETE FROM ".$this->tableName." WHERE id_user = :id";
        DAO::delete($sql, ['id' => $userId]);

    }
}

 
     