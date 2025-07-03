<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\OperationRepository;
use Illuminate\Validation\ValidationException;



class OperationController extends Controller
{
    protected $operationRepository;

    public function __construct(OperationRepository $operationRepository) {
        $this->operationRepository = $operationRepository;
    }
    //


    public function index($limit, $search = null){

        $operation = $this->operationRepository->pagination($limit, $search);

        if(isset($operation)){

            return response()->json([
                    "success" => true,
                    "operations" => $operation
                ]);
        }
        else{
            return response()->json([
                "success" => false,
                "operations" => "Erreur contacter votre administrateur..."
            ]);
        }
    }

    public function getAjaxArticle( $magasin_id, $typeTrans ){
        // dd("bien");
        $operation = $this->operationRepository->ajaxArticle( $magasin_id, $typeTrans );
        
        if(isset($operation)){

            return response()->json([
                    "success" => true,
                    "article" => $operation
                ]);
        }
        else{
            return response()->json([
                "success" => false,
                "operations" => "Erreur contacter votre administrateur..."
            ]);
        }
    }


    // Store operation
    public function store(Request $request)
    {

        try{
            return response()->json([
                "success" => true,
                "donnee" => $request->all(),
                "message" => "operation enregistré avec success !!!",
                "class" => "bg-success"
            ]);
            $request->validate([
                'article_id'=>'required',
                'magasin_id'=>'required',
                'in'=>'required',
                'out'=>'required',
                'type_operation'=>'required',
                'do_by'=>'required',
            ]);

            // Stock dans une instance du model operation
            $operations = $this->operationRepository->created($request->all());
            

            if($operations){
                return response()->json([
                    "success" => true,
                    "message" => "operation enregistré avec success !!!",
                    "class" => "bg-success"
                ]);
            }
            else{
                return response()->json([
                    "success" => false,
                    "message" => "operation non enregistré...",
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


    //Show operation
    public function show( $id_art){

        try {

            $operation = $this->operationRepository->getById($id_art);
            dd($operation);
            if(isset($operation)){

                return response()->json([
                    "success" => true,
                    "operation" => $operation,
                ]);

            }
            else{

                return response()->json([
                    "success" => false,
                    "operation" => null,
                    "message" => "Cet operation n'existe pas...",
                ]);
                
            }
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    //Update operation
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

            $operation = $this->operationRepository->getById($id_art);
            if ($operation) {
                $operation = $this->operationRepository->updated($id_art, $request->all());
    
                if(isset($operation)){
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

    //function destroy operation
    public function destroy($id_art)
    {
        try {

            $operation = $this->operationRepository->getById($id_art);

            if ($operation) {

                if ( 1 > count($operation->magasins)) { // Attaché à aucun operation supprimer
                    $operation = $this->operationRepository->destroy($id_art);
                    return response()->json([
                        "success" => true,
                        "message" => "operation supprimé avec success !!!",
                        "class" => "bg-success"
                    ]);
                }

                return response()->json([
                    "success" => false,
                    "message" => "Impossible une opération a déjà été effectuée avec cet operation",
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
