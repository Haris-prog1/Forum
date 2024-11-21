<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use App\Session;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
    $user = filter_input(INPUT_POST, "nickName", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,"mail", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // var_dump($user);
    // var_dump($email);
    // var_dump($password);

    $userManager = new UserManager();

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    if ($user){
    //Ajoute de l'utilisateur à la base de données
    $userManager->add(["nickName" => $user, "mail" =>$email, "password" => $passwordHash,]);

}
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
        $mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = $userManager->findOnebyEmail($mail);
      
        
         

    

        //             //on stocke l'user en Session (setUser dans App\Session)
                Session::setUser($user);
                 
        //             $this->redirectTo('forum', 'login');                  
        //          }else {

        //                 // Message d'erreur en cas d'erreur
        //                 Session::addFlash('error', 'mot de passe ou email invalide');

        //                 $this->redirectTo('forum');

                    return [
                "view" => VIEW_DIR."security/login.php", 
                "meta_description" => "Connexion",
                    ];
                
                }  
            // }
        // }
    // }
    // Fonction de deconnexion
    public function logout() {
        
        if(isset($_SESSION["user"])) {
            //Vérification de l'utilisateur en session

            unset($_SESSION['user']);
            // Deconnexion


            // Message flash indiquant que la deconnexion à bien été effectué
            // Session::addFlash('error', 'Vous êtes déconnecté.');


            // Redirection
            $this->redirectTo('forum');
            
                
        }
    }
     public function deleteUser($userId) {
       
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation du token CSRF
            if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
                if (isset($_POST['user_id'])) {
                    $userId = intval($_POST['user_id']);
                    $userManager = new UserManager();
                    $userManager->deleteUser($userId);
                }
                 // Redirection ou message de confirmation
        return [
            "view" => VIEW_DIR."security/users.php", 
            "meta_description" => "Utilisateur supprimé et posts anonymisés",
            "data" => [
            
                "users" => $users
            ]
        ];
            } else {
                die('Échec de la validation du token CSRF');
            }
        }
    }


}
    








  //Fin

