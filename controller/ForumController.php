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
        //Fonction qui permets de lister la liste des topics par catégorie
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        //On instancie les deux classes, topic et category
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
    public function listUsers() {
        
        $userManager = new UserManager();
        $users = $userManager->findAll();
       

        return [
            "view" => VIEW_DIR."forum/listUser.php",
            "meta_description" => "Liste des users : ",
            "data" => [
                "users" =>$users,
                
            ]
            ];
        
    }
    public function formTopic($category_id){
            //Je crée une instance de ma classe classe Categorie Manager
            $categoryManager = new CategoryManager();
            //Je fais appel à la fonction find one by Id, de mon catégorieManager afin de récuperer un objet catégorie correspondant à l'id injecté en paramètre de la fonction
            $category = $categoryManager->findOneById($category_id);
        return [
            "view" => VIEW_DIR."forum/formTopic.php",
            "data" => [
                "category" => $category,
            ]
            ];

           
    }






    public function addCategory() {
        if (isset($_POST['submit'])) {
            $nameCategory = filter_input(INPUT_POST, 'nameCategory', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoryManager = new CategoryManager();
            
            if ($nameCategory) {
                        $data = [
                            'nameCategory' => $nameCategory,
                        
                        $categoryManager->add($data),

                        Session::addFlash("success", "La catégorie a été rajoutée avec succès.");
                        $this->redirectTo('forum/listCategories');
            } else {
                Session::addFlash("error", "Veuillez entrer un nom de catégorie valide.");
            }
        }
        $categories = $categoryManager->findAll(["nameCategory", "DESC"]);
        return [
            "view" => VIEW_DIR."forum/addCategory.php",
            "meta_description" => "Ajouter une catégorie : ",
            "data" => [
                "categories" => $categories
            ]
            ];
    
    public function detailTopic() {
        
        $userManager = new UserManager();
        $users = $userManager->findOneById();
        
       

        return [
            "view" => VIEW_DIR."forum/detailTopic.php",
            "meta_description" => "Liste des topics : ",
            "data" => [
                "topics" =>$topics,
                
            ]
            ];
        
    }


