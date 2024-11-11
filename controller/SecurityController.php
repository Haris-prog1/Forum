<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
    $Utilisateur = filter_input(INPUT_POST, "Utilisateur", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,"Email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,"Password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $userManager = new UserManager();
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    //Ajoute de l'utilisateur à la base de données
    $userManager->add(["Utilisateur" => $Utilisateur,
     "email" =>$email,
      "password" => $passwordHash]);

        $this->redirectTo('security', "register");
        return [
          // Retourne la vue register
          "view" => VIEW_DIR."security/register.php", 
          "meta_description" => "Inscription",
        ];
}
 public function login () {
        $userManager = new UserManager();
        //on filtre les champs de saisie
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user= $userManager->findOneByEmail($email);
        if($email && $password){
        //on recherche le mot de passe associé à l'adresse mail
         

            if($user){

                //récupération du mot de passe de l'user
                $hash = $user->getPassword();
                //  Vérification du mots de passe
                 if(password_verify($password, $hash)){

                    //on stocke l'user en Session (setUser dans App\Session)
                    Session::setUser($user);
                 
                    $this->redirectTo('forum', 'listTopics');                  
                 }
                 }else {

                        
                        Session::addFlash('error', 'mot de passe ou email invalide');

                        $this->redirectTo('forum');

                    return [
                "view" => VIEW_DIR."security/login.php", 
                "meta_description" => "Connexion",
                    ];
                }
                    
        

    public function logout () {
        if(isset($_SESSION["user"])){

            unset($_SESSION['user']);
            Session::addFlash('error', 'Vous êtes déconnecté.');

            $this->redirectTo('forum');
            
                
        }
    }

    }        //Fin

