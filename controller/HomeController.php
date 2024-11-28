<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\PostManager;
use Model\Managers\UserManager;

class HomeController extends AbstractController implements ControllerInterface {

    public function index(){
        $postManager = new PostManager();
        var_dump($id);
        die;
        $posts = $postManager->findLastFivePosts($id);

      
        $topicManager = new TopicManager();

        $topics = $topicManager->findLastFiveTopics($id);
        
        return [
            "view" => VIEW_DIR."home.php",
            "meta_description" => "Page d'accueil du forum",
            "data" => [ 
                "topic" => $topics,
                "post" => $posts,

            ]
        ];
    }
    public function listCategorie(){
        return [
            "view" => VIEW_DIR."listCategories.php",
            "meta_description" => "Liste des catégories"
        ];
    }
        
    public function users(){
        $this->restrictTo("ROLE_ADMIN");

        $manager = new UserManager();
        $users = $manager->findAll(['register_date', 'DESC']);

        return [
            "view" => VIEW_DIR."security/users.php",
            "meta_description" => "Liste des utilisateurs du forum",
            "data" => [ 
                "users" => $users 
            ]
        ];
    }
    public function findLastFiveTopics($id){

        $topicManager = new TopicManager();

        $topics = $topicManager->findLastFiveTopics($id);
        

        return [
            "view" => VIEW_DIR . "forum/index.php",
            "meta_description" => "Dernier topics :",
            "data" => [
                "topic" => $topics
            ]
            ];



    }
public function findLastFivePosts($id){
    $postManager = new PostManager();

    $posts = $postManager->findLastFivePosts($id);

    return [
        "view" => VIEW_DIR . "forum/index.php",
        "meta_description" => "Dernier posts :",
        "data" => [
            "post" => $posts
        ]
        ];
}
}
