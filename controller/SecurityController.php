<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
    $user = filter_input(INPUT_POST, "nickName", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $userManager = new UserManager();

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    //Ajoute de l'utilisateur à la base de données
    $userManager->add(["nickName" => $user, "email" =>$email, "password" => $passwordHash]);

        $this->redirectTo('security', "register");
        return [
          // Retourne la vue register
          "view" => VIEW_DIR."security/register.php", 
          "meta_description" => "Inscription",
        ];


    }
        //fonction de login
     public function login () {
        $userManager = new UserManager();
        //on filtre les champs de saisie
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = $userManager->findOnebyMail($email);
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
                 }else {

                        // Message d'erreur en cas d'erreur
                        Session::addFlash('error', 'mot de passe ou email invalide');

                        $this->redirectTo('forum');

                    return [
                "view" => VIEW_DIR."security/login.php", 
                "meta_description" => "Connexion",
                    ];
                
                }  
            }
        }
    }
    // Fonction de deconnexion
    public function logout() {
        
        if(isset($_SESSION["user"])) {
            //Vérification de l'utilisateur en session

            unset($_SESSION['user']);
            // Deconnexion


            // Message flash indiquant que la deconnexion à bien été effectué
            Session::addFlash('error', 'Vous êtes déconnecté.');


            // Redirection
            $this->redirectTo('forum');
            
                
        }
    }

    }








  //Fin

