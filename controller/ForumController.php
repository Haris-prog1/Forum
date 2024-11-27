<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface
{

    public function index()
    {
        // Affichage listes catégories
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $category = $categoryManager->findAll();

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "category" => $category,
            ]
        ];
    }

    

    // Liste des topics par catégories
    public function listTopicsByCategory($id)
    {
        //Fonction qui permets de lister la liste des topics par catégorie
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $userManager = new UserManager();
        //On instancie les deux classes, topic et category
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);


        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : " . $category,
            "data" => [
                "category" => $category,
                "topics" => $topics,
            ]
        ];

    }

    // Détail d'un topic d'une catégorie
    public function detailTopic($id)
    {
        //On instancie Topic, Post, Category manager
        $topicManager = new TopicManager();
        $postManager = new PostManager();
      


        //On récupère les id topic et post
        $topic = $topicManager->findOneById($id);
        
        $posts = $postManager->findPostsByTopic($id);
        
        
        
       
    


        return [
            "view" => VIEW_DIR . "forum/detailTopic.php",
            "meta_description" => "Résumé topic : ",
            "data" => [
                "topic" => $topic,
              

                "posts" => $posts

            ]
        ];
    }
public function profile(){
    $userManager = new UserManager();
    $users = $userManager->findOneByEmail($id);
    


    return[
        "view" => VIEW_DIR. "forum/profile.php",
        "meta_description" => "Profile : ",
        "data" => [
            "user" => $users
        ]
        ];
}


// 
    public function listUsers()
    {

        $userManager = new UserManager();
        $users = $userManager->findAll(["nickName", "ASC"]);


        return [
            "view" => VIEW_DIR . "forum/listUsers.php",
            "meta_description" => "Liste des users : ",
            "data" => [
                "user" => $users

            ]
        ];

    }














    // Fonction d'ajout de catégorie
    public function addCategory()
    {
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
                "view" => VIEW_DIR . "forum/listCategories.php",
                "meta_description" => "Ajouter une catégorie : ",
                "data" => [
                    "categories" => $categories,
                ]
            ];
        }

    }


    public function addPost($id){
        // $this->restrictTo("ROLE_USER");
       
        if(!empty($_POST)){
         
            
            $content = filter_input(INPUT_POST, "content", FILTER_UNSAFE_RAW);
            if($content){
                
                $postManager = new PostManager();
                $topicManager = new TopicManager();
                $topic = $topicManager->findOneById($id);

                
                $data = [
                    'content' => $content,
                    'topic_id' => $id,
                    
                ];
                // Ajout de la data en base de données
                $postManager->add($data);


            }

               
                // $this->newPost($content, $id);
                Session::addFlash("success", "Nouveau message ajouté !");
                $this->redirectTo("forum", "detailPost", $id);
            // }
            // else{
            //     Session::addFlash("error", "Un problème est survenu, veuillez réessayer.");
            }
           
        // }
        $this->redirectTo("forum", "detailPost", $id);
    }





    public function addTopicByCategory($id){
       
        // Vérifie si le formulaire a été soumis
        
        if (isset($_POST['submit'])) 
         {
           
            // La fonction PHP filter_input() permet d'effectuer une validation ou un nettoyage de chaque donnée transmise par le formulaire en employant divers filtres. FILTER_SANITIZE_SPECIAL_CHARS permet d'afficher la chaîne en toute sécurité dans un contexte HTML sans exécuter de code malveillant inséré par un utilisateur.

        
       
        $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content',FILTER_SANITIZE_SPECIAL_CHARS);
        
         // Création de l'instance de CategoryManager TopicManager PostManager
         $categoryManager = new CategoryManager();
         $topicManager = new TopicManager();
         $postManager = new PostManager();
         

        

         // récupère tous les topics d'une catégorie spécifique (par son id)
         
         $topics = $topicManager->findTopicsByCategory($id);
         

    
         //Récupération de l'user en session si il y en à un
        
         $userId = Session::getUser()->getId();

          


        //  Vérification si il y a des données dans la varaible $content
        if($title){

            // Création d'une variable data sous forme de tableau, et attribution des différentes données
                $data = [
                    
                   'title' => $title,
                //    'category_id' => $postId
                    
                   
                ];

       

        // On ajout les données du tableau via la fonction add et comme pour valeur $data
       
        $topic = $topicManager->add($data);
        $dataContent = [
            'content' => $content,
            
            

        ];
        $post = $postManager->add($dataContent);


        // var_dump($dataContent);
        // var_dump($data);
        // die;

        // Affiche un message de succès si le processus est réussi
         Session::addFlash("success", "Le topic a été rajouté avec succès.");

         // Redirige vers le detail des Posts

         $this->redirectTo('forum', 'detailPost.php'); 



        //  Sinon....
        } else {
        // Affiche un message de d'erreur en cas d'échec d'ajout.
        Session::addFlash("error", "Le topic n'a pas été rajouté ");
        }

       //Communication avec le controlleur pour renvoyer la vue de la liste des topics et des différentes données à affichés.
        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Ajoute d'un topic : ",
            "data" => [
                "topic" => $topics,
                "content" => $content
               
            ]
        ];

        }

    }

    


  


    public function updatePostForm($postId){
            
       
        $postManager = new PostManager();

    
        $post = $postManager->findOneById($postId);

        
        return [

            "view" => VIEW_DIR."forum/updatePost.php",
            "meta_description" => "Modifier un post : ",
            "data" => [
                "post" => $post
            ]

        ];

    }

    public function updatePost($postId)
    {


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

    public function deletePost($id) {
        $postManager = new PostManager();
       
        // Récupère le post à supprimer
        $posts = $postManager->findOneById($id);

        // Supprime le post
        $postManager->delete($id);
        Session::addFlash("success", "Le post a été supprimé avec succès.");

        $this->redirectTo('forum', 'listCategories'); 
        Session::addFlash("error", "Le post n'a pas été supprimé. ");
    }
    public function deleteTopic($id){

        $topicManager = new TopicManager();
        $topicManager->delete($id);

        Session::addFlash('error', "Le topic a été supprimé avec succès.");

        $this->redirectTo('forum', 'listCategories'); 
      
        Session::addFlash("error", "Le topic n'a pas été supprimé. ");
    }


}