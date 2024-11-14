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
        $category = $categoryManager->findAll();

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "category" => $category,
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
                "topics" => $topics,
            ]
        ];

    }


    

    public function listUsers() {
        
        $userManager = new UserManager();
        $users = $userManager->findAll(["nickName", "ASC"]);
       

        return [
            "view" => VIEW_DIR."forum/listUsers.php",
            "meta_description" => "Liste des users : ",
            "data" => [
                "user" =>$users
                
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

                        Session::addFlash("success", "La catégorie a été rajoutée avec succès."),
                        $this->redirectTo('forum/listCategories'),
                        ];
                        }
                    else {

                Session::addFlash("error", "Veuillez entrer un nom de catégorie valide.");
            
        
        $categories = $categoryManager->findAll(["nameCategory", "DESC"]);
        return [
            "view" => VIEW_DIR."forum/addCategory.php",
            "meta_description" => "Ajouter une catégorie : ",
            "data" => [
                "categories" => $categories,
            ]
            ];
        }
    
    }
    }
    public function addTopicByCategory($id){

        // Vérifie si le formulaire a été soumis
        if (isset($_POST['submit'])) {
            // La fonction PHP filter_input() permet d'effectuer une validation ou un nettoyage de chaque donnée transmise par le formulaire en employant divers filtres. FILTER_SANITIZE_SPECIAL_CHARS permet d'afficher la chaîne en toute sécurité dans un contexte HTML sans exécuter de code malveillant inséré par un utilisateur.
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content',FILTER_SANITIZE_SPECIAL_CHARS);

         // Création de l'instance de CategoryManager TopicManger PostManager
         $categoryManager = new CategoryManager();
         $topicManager = new TopicManager();
         $postManager = new PostManager();

        //  Pour vérifier
        //  var_dump($title);

         // récupère tous les topics d'une catégorie spécifique (par son id)
         $topics = $topicManager->findTopicsByCategory($id);
        //  var_dump($topicId);
        //  $topicId = $topic->getId();

         // récupère les catégories spécifique (par son id)
         $category = $categoryManager->findOneById($id);
         $categoryId = $category->getId();
        //  var_dump($categoryId);
 
        //  var_dump($creationDate);
         $userId = Session::getUser()->getId();

        // vérifier si chaque variable contient une valeur jugée positive par PHP
        if($title){

            // on construit pour chaque valeur un tableau associatif $data : 
                $data = [
                    'title' => $title,
                    'user_id' => $userId,
                    'category_id' => $categoryId,
     
                    

                ];

        //  on enregistrer ce produit nouvellement créé en session à l'aide de la fonction add dans Manager.php
        
        $topicId = $topicManager->add($data);

        $dataContent = [
            'content' => $content,
            'user_id' => $userId,
            'topic_id' => $topicId,
            

        ];

        //  on enregistrer ce produit nouvellement créé en session à l'aide de la fonction add dans Manager.php
        $postManager->add($dataContent);

        
         // Affiche un message de succès
         Session::addFlash("success", "Le topic a été rajouté avec succès.");
         // Redirige vers la liste des topics
         $this->redirectTo('forum', 'profile.php'); 


        }
        // Affiche un message de d'erreur
        Session::addFlash("error", "Le topic n'a pas été rajouté ");

        // le controller communique avec la vue "listTopics" (view) pour lui envoyer la liste des topics (data)
        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Ajouter un topic : ",
            "data" => [
                "topics" => $topics,
               
            ]
        ];

        }

    }




    public function detailTopic() {
        
        $topicManager = new TopicManager();
        $topics = $topicManager->findAll();
        return [
            "view" => VIEW_DIR."forum/detailTopic.php",
            "meta_description" => "Liste des topics : ",
            "data" => [
                "topics" =>$topics,
                
            ]
        ];
        
    }



}