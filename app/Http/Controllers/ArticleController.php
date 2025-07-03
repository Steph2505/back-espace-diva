<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use Illuminate\Validation\ValidationException;



class ArticleController extends Controller
{
    protected $articleRepository;

    public function __construct(articleRepository $articleRepository) {
        $this->articleRepository = $articleRepository;
    }
    //


    public function index($limit, $search = null){

        $article = $this->articleRepository->pagination($limit, $search);

        if(isset($article)){

            return response()->json([
                    "success" => true,
                    "articles" => $article
                ]);
        }
        else{
            return response()->json([
                "success" => false,
                "articles" => "Erreur contacter votre administrateur..."
            ]);
        }
    }


    // Store article
    public function store(Request $request)
    {
        
        try{
            $request->validate([
                'entitled'=>'required',
                'description'=>'required',
                'couleur'=>'required',
                'code'=>'required',
                'type_stock'=>'required',
                'categorie_id'=>'required',
                'user_id'=>'required',
            ]);
            
            // Stock dans une instance du model article
            $articles = $this->articleRepository->created($request->all());
            

            if($articles){
                return response()->json([
                    "success" => true,
                    "message" => "Article enregistré avec success !!!",
                    "class" => "bg-success"
                ]);
            }
            else{
                return response()->json([
                    "success" => false,
                    "message" => "Article non enregistré...",
                    "class" => "bg-danger"
                ]);
            }
        }
        catch(ValidationException $e){

            // Recupérer les erreurs de validation
            $error = $e->validator->errors();

            return response()->json([
                "success" => false,
                "error" => $error,
            ]);
        }
    }


    //Show article
    public function show( $id_art){

        try {

            $article = $this->articleRepository->getById($id_art);
            // dd($article);
            if(isset($article)){

                return response()->json([
                    "success" => true,
                    "article" => $article,
                ]);

            }
            else{

                return response()->json([
                    "success" => false,
                    "article" => null,
                    "message" => "Cet Article n'existe pas...",
                ]);
                
            }
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    //Update article
    public function update(Request $request, $id_art)
    {
        try {
            $request->validate([
                'entitled'=>'required',
                'description'=>'required',
                'couleur'=>'required',
                'code'=>'required',
                'type_stock'=>'required',
                'categorie_id'=>'required',
                'user_id'=>'required',
            ]);
            
            $article = $this->articleRepository->getById($id_art);
            
            if ($article) {

                $article = $this->articleRepository->updated($id_art, $request->all());
                
                if(isset($article)){
                    return response()->json([
                        "success" => $article,
                        "message" => "Modifications effectuées...",
                        "class" => "bg-success"
                    ]);
                }
                else{
                    return response()->json([
                        "success" => false,
                        "message" => "Modification echoué...",
                        "class" => "bg-danger"
                    ]);
                }
            }

            return response()->json([
                "success" => false,
                "message" => "Identifiant non valide....",
                "class" => "bg-danger"
            ]);

        }
        catch(ValidationException $e){

            // Recupérer les erreurs de validation
            $error = $e->validator->errors();

            return response()->json([
                "success" => false,
                "error" => $error,
            ]);
        }
    }

    //function destroy article
    public function destroy($id_art)
    {
        try {

            $article = $this->articleRepository->getById($id_art);

            if ($article) {

                if ( 1 > count($article->magasins)) { // Attaché à aucun article supprimer
                    $article = $this->articleRepository->destroy($id_art);
                    return response()->json([
                        "success" => true,
                        "message" => "Article supprimé avec success !!!",
                        "class" => "bg-success"
                    ]);
                }

                return response()->json([
                    "success" => false,
                    "message" => "Impossible une opération a déjà été effectuée avec cet article",
                    "class" => "bg-info"
                ]);

            }else {
                return response()->json([
                    "success" => false,
                    "message" => "Erreur contacter votre administrateur !!!",
                    "class" => "bg-danger"
                ]);
            }

        }
        catch(Exception $e){
            return response()->json($e);
        }
    }
}
