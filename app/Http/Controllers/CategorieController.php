<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\CategorieRepository;
use Illuminate\Validation\ValidationException;



class CategorieController extends Controller
{
    protected $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository) {
        $this->categorieRepository = $categorieRepository;
    }
    //


    public function index($limit, $search = null){

        $categorie = $this->categorieRepository->pagination($limit, $search);

        if(isset($categorie)){

            return response()->json([
                    "success" => true,
                    "categories" => $categorie
                ]);
        }
        else{
            return response()->json([
                "success" => false,
                "categories" => "Erreur contacter votre administrateur..."
            ]);
        }
    }


    // Store categorie
    public function store(Request $request)
    {

        try{
            $request->validate([
                'entitled'=>'required|min:3|max:12',
                'code'=>'required|min:3',
            ]);

            // Stock dans une instance du model Categorie
            $categories = $this->categorieRepository->created($request->all());
            

            if($categories){
                return response()->json([
                    "success" => true,
                    "message" => "Catégorie enregistrée avec success !!!",
                    "class" => "bg-success"
                ]);
            }
            else{
                return response()->json([
                    "success" => false,
                    "message" => "Catégorie non enregistrée...",
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


    //Show categorie
    public function show( $id_cat){

        try {

            $categorie = $this->categorieRepository->getById($id_cat);

            if(isset($categorie)){

                return response()->json([
                    "success" => true,
                    "categorie" => $categorie,
                ]);

            }
            else{

                return response()->json([
                    "success" => false,
                    "categorie" => null,
                    "message" => "Cet catégorie n'existe pas...",
                ]);
                
            }
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    //Update Categorie
    public function update(Request $request, $id_cat)
    {
        try {

            $request->validate([
                'entitled'=>'required|min:3|max:12',
                'code'=>'required|min:3',
            ]);

            $categorie = $this->categorieRepository->getById($id_cat);

            if ($categorie) {

                $categorie = $this->categorieRepository->updated($id_cat, $request->all());
    
                if(isset($categorie)){
                    return response()->json([
                        "success" => true,
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

    //function destroy categorie
    public function destroy($id_cat)
    {
        try {

            $categorie = $this->categorieRepository->getById($id_cat);

            if ($categorie) {

                if ( 1 > count($categorie->article)) { // Attaché à aucun article supprimer
                    $categorie = $this->categorieRepository->destroy($id_cat);
                    return response()->json([
                        "success" => true,
                        "message" => "Catégorie supprimer avec success !!!",
                        "class" => "bg-success"
                    ]);
                }

                return response()->json([
                    "success" => false,
                    "message" => "Impossible cet catégorie appartient déjà à un article",
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
