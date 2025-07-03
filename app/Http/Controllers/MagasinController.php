<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\MagasinRepository;
use App\Repositories\UserRepository;
use Illuminate\Validation\ValidationException;



class MagasinController extends Controller
{
    protected $magasinRepository;
    protected $userRepository;

    public function __construct(MagasinRepository $magasinRepository, UserRepository $userRepository) {
        $this->magasinRepository = $magasinRepository;
        $this->userRepository = $userRepository;
    }
    //


    public function index($limit, $search = null){
        try {
            $magasin = $this->magasinRepository->pagination($limit, $search);
    
            if(isset($magasin)){
    
                return response()->json([
                        "success" => true,
                        "message" => $magasin
                    ]);
            }
            else{
                return response()->json([
                    "success" => false,
                    "message" => "Erreur contacter votre administrateur..."
                ]);
            }
        } catch (\Exception $th) {
            return response()->json([
                "success" => false,
                "error" => $th,
                "message" => "Erreur de traitement..."
            ]);
        }

    }

    //**Création */
    public function create()
    {
        try {            
            $user = $this->userRepository->getAll();
    
            if($user)
            {
                return response()->json([
                    "success" => true,
                    "data" => $user,
                    "message" => "Liste des utilisateurs"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "error" => $th,
                "message" => "Erreur de traitement..."
            ]);
        }
    }
    // Store magasin
    public function store(Request $request)
    {

        try{
            $request->validate([
                'entitled'=>'required',
                'description'=>'required',
                'localisation'=>'required',
                'user_id'=>'required',
            ]);

            
            // Stock dans une instance du model magasin
            $magasins = $this->magasinRepository->created($request->all());
            

            if($magasins){
                return response()->json([
                    "success" => true,
                    "message" => "Magasin enregistrée avec success !!!",
                    "class" => "bg-success"
                ]);
            }
            else{
                return response()->json([
                    "success" => false,
                    "message" => "Magasin non enregistrée...",
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


    //Show magasin
    public function show( $id_mag){

        try {

            $magasin = $this->magasinRepository->getById($id_mag);

            if(isset($magasin)){

                return response()->json([
                    "success" => true,
                    "magasin" => $magasin,
                ]);

            }
            else{

                return response()->json([
                    "success" => false,
                    "magasin" => null,
                    "message" => "Cet Magasin n'existe pas...",
                ]);
                
            }
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    //Update magasin
    public function update(Request $request, $id_mag)
    {
        try {

            $request->validate([
                'entitled'=>'required',
                'description'=>'required',
                'localisation'=>'required',
                'user_id'=>'required',
            ]);

            $magasin = $this->magasinRepository->getById($id_mag);
            if ($magasin) {
                $magasin = $this->magasinRepository->updated($id_mag, $request->all());
    
                if(isset($magasin)){
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

    //function destroy magasin
    public function destroy($id_mag)
    {
        try {

            $magasin = $this->magasinRepository->getById($id_mag);

            if ($magasin) {

                if ( 1 > count($magasin->article)) { // Attaché à aucun article supprimer
                    $magasin = $this->magasinRepository->destroy($id_mag);
                    return response()->json([
                        "success" => true,
                        "message" => "Magasin supprimer avec success !!!",
                        "class" => "bg-success"
                    ]);
                }

                return response()->json([
                    "success" => false,
                    "message" => "Impossible ce Magasin contient déjà à un article",
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
