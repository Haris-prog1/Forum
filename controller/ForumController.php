<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll();

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    // public function listTopicsByCategory($id): array{
    //     $topicManager = new TopicManager();
    //     $categoryManager = new $categoryManager();
    //     $topics = $categoryManager->findTopicsByCategory($id);




    //     return [
    //         "view" => VIEW_DIR."forum/listTopics.php",
    //         "meta description" => "Liste des topics :" . $topics,
    //         "topics" => $topics
    //     ];
    // }
    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }
    public function listUsers($id) {
        $topicManager = new TopicManager();
        $userManager = new UserManager();
        $users = $userManager->findAll();
        $topics = $topicManager->findTopicsByCategory(id: $id);

        return [
            "view" => VIEW_DIR."forum/listUser.php",
            "meta_description" => "Liste des users : ",
            "data" => [
                "users" =>$users,
                "topics" => $topics
            ]
            ];
        
    }
}