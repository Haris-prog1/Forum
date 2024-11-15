<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;
use Model\Managers\PostManager;

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
        $userManager = new UserManager();
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
    public function listPostsByTopic($id) {
        $postManager = new PostManager();
        $topicManager = new TopicManager();

        $posts = $postManager->findPostsByTopic($id);
        $topic = $topicManager->findOneById($id);

        return [
            "view" => VIEW_DIR."forum/detailTopic.php",
            "meta_description" => "Liste des posts par topic : ",
            "data" => [
               "posts" => $posts,
                "topic" => $topic
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






  







// Fonction d'ajout de catégorie
    public function addCategory() {
        //Vérification que le formulaire à bien été soumis en POST
        if (isset($_POST['submit'])) {
            // Filtrage des caractères de l'input
            $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS);
            // Instance de la classe Category Manager
            $categoryManager = new CategoryManager();
            // Vérification que $categoryName contient bien une donné
            if ($categoryName) {
                // Data sous forme de tableau
                        $data = [
                            'categoryName' => $categoryName,
                            
                            
                        ];
                        // Ajout de la data en base de données
                        $categoryManager->add($data);
                        
                
                        }
                        
                   
        
        $categories = $categoryManager->findAll(["categoryName", "DESC"]);
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Ajouter une catégorie : ",
            "data" => [
                "categories" => $categories,
            ]
            ];
        }
    
    }
    
    

    
    public function addTopicByCategory($id){

        // Vérifie si le formulaire a été soumis
        if (isset($_POST['submit'])) {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
            // Création de l'instance de CategoryManager TopicManger PostManager
            $categoryManager = new CategoryManager();
            $topicManager = new TopicManager();
            // La fonction PHP filter_input() permet d'effectuer une validation ou un nettoyage de chaque donnée transmise par le formulaire en employant divers filtres. FILTER_SANITIZE_SPECIAL_CHARS permet d'afficher la chaîne en toute sécurité dans un contexte HTML sans exécuter de code malveillant inséré par un utilisateur.
            if ($title){
                $data = [
                    'title' => $title,
                    
                    
                  
     
                    

                ];
                $topicManager->add($data);
            }

         

       

         // récupère tous les topics d'une catégorie spécifique (par son id)
         $topics = $topicManager->findTopicsByCategory($id);
        //  var_dump($topicId);
        //  $topicId = $topic->getId();

         // récupère les catégories spécifique (par son id)
         $category = $categoryManager->findOneById($id);
        
        //  var_dump($categoryId);
 
        //  var_dump($creationDate);
        

        // vérifier si chaque variable contient une valeur jugée positive par PHP
        

            // on construit pour chaque valeur un tableau associatif $data : 
               

        //  on enregistrer ce produit nouvellement créé en session à l'aide de la fonction add dans Manager.php
        
        

      

      

        
         // Affiche un message de succès
         Session::addFlash("success", "Le topic a été rajouté avec succès.");
         // Redirige vers la liste des topics
         $this->redirectTo('forum', 'listTopics.php'); 


        }
        // Affiche un message de d'erreur
        Session::addFlash("error", "Le topic n'a pas été rajouté ");

        // le controller communique avec la vue "listTopics" (view) pour lui envoyer la liste des topics (data)
        return [
            "view" => VIEW_DIR."forum/listTopics",
            "meta_description" => "Ajouter un topic : ",
            "data" => [
                "topics" => $topics,
               
            ]
        ];

        }
        public function detailTopic($id){
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();
            $category = $categoryManager->findOneById($id);
            $topic = $topicManager->findOneById($id);


            return [
                "view" => VIEW_DIR."forum/detailTopic.php",
                "meta_description" => "Liste des Topics par catégorie : ",
                "data" => [
                    "topics" => $topic,
                    "category" => $category,
                    
                ]
                ];
        }
        public function detailCategory(){
            $categoryManager = new CategoryManager();

            $category = $categoryManager->findOneById($id);

            return[
                "view" => VIEW_DIR."forum/detailCategory.php",
                "meta_description" => "Detail topic de la catégorie :",
                "data" => [
                    "category" => $category,
                ]
                ];
        }

      


    public function updatePost($postId){

        
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

       
        $postManager = new PostManager();
        
      
        $data = [
            'content' => $content,
            'id_post' => $postId
        ];

   
        $postManager->update($postId, $content);
        
      
        Session::addFlash('success', 'Le post a été modifié');

       
        $this->redirectTo('forum', 'listCategories'); 

    }



}