<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Handlers\UserHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    protected $userRepository;
    protected $userHandler;

    public function __construct(UserRepository $userRepository, UserHandler $userHandler) {
        $this->userRepository = $userRepository;
        $this->userHandler = $userHandler;
    }
    //

    public function verifylog($user){
        if ($user->status) {
            // connecter ce user
            Auth::login($user);
            // Création du token d'API pour l'utilisateur
            $token = $user->createToken('token_name')->plainTextToken;

            $profil = Profil::where('id',$user->profil_id)->first();
            $user->profil_name = $profil->name;
            $user->profil_code = $profil->code;
                
            return response()->json([
                'success' => true,
                'data' => $user,
                'token' => $token,
                // 'redirect_url' => route('dashboard_admin', ['id' => $user])
            ]);

        }else{
            return response()->json([
                'success' => false,
                'message' => "Ce compte a été bloqué...",
            ]);
        }
    }

    //Login
    public function login(Request $request){

        try {
            $request->validate([
                'identifiant' => 'required',
                'password' => 'required|string|min:8'
            ],
            [
                'error' => 'Erreur...',
            ]);
            
            $user = User::where('email', $request->identifiant)->first();

            if (($user && Hash::check($request->password, $user->password))) {
                return $this->verifylog($user);
            }

            $user = User::where('name', $request->identifiant)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $this->verifylog($user);
            }

            return response()->json([
                'success' => false,
                'message' => 'Les informations d\'identification ne sont pas correctes.',
            ]);
           
        } catch (ValidationException $e) {
            // Récupérer les erreurs
            $errors = $e->validator->errors();

            // Retourner les erreurs en réponse JSON ou autre objet
            return response()->json([
                'success' => false,
                'message' => 'Erreur de connexion',
                'errors' => $errors
            ], 422);
        }
    }

    public function index($limit, $search = null){

        $user = $this->userRepository->pagination($limit, $search);

        if(isset($user)){

            return response()->json([
                    "success" => true,
                    "users" => $user
                ]);
        }
        else{
            return response()->json([
                "success" => false,
                "users" => "Erreur contacter votre administrateur..."
            ]);
        }
    }


    // Store users
    public function store(Request $request)
    {

        try{
            $request->validate([
                'last_name'=>'required',
                'first_name'=>'required',
                'email'=>'required|unique:users,email',
                'phone'=>'required',
                'profil_id'=>'required',
                'name'=>'required',
            ]);

            // Stock dans une instance du model User
            $user = $this->userRepository->created($request->all());
            
            //Vérification des données avant stockage
            $result = $this->userHandler->store($user);

            if($result){
                return response()->json([
                    "success" => true,
                    "message" => "Utilisateur enregistré avec success !!!",
                    "class" => "bg-success"
                ]);
            }
            else{
                return response()->json([
                    "success" => false,
                    "message" => "Utilisateur non enregistré...",
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


    //Show user
    public function show( $id_user ){

        try {

            $user = $this->userRepository->getById($id_user);

            if(isset($user)){

                return response()->json([
                    "success" => true,
                    "user" => $user,
                ]);

            }
            else{

                return response()->json([
                    "success" => false,
                    "user" => null,
                ]);
                
            }
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    //Update user
    public function update(Request $request, $id_user)
    {
        try {

            $request->validate([
                'last_name'=>'required',
                'first_name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'profil_id'=>'required',
                'name'=>'required',
            ]);

            $user = $this->userRepository->getById($id_user);

            if ($user) {
                
                $user = $this->userRepository->updated($id_user, $request->all());
    
                if(isset($user)){
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

    //function destroy user
    public function destroy($id_user)
    {
        try {

            $user = $this->userRepository->getById($id_user);
            if ($user) {
                // $all_users = $this->userRepository->destroy($id_user)
                return response()->json([
                    "alert" => "Utilisateur supprimer avec success !!!"
                ]);
            }else {
                return response()->json([
                    "alert" => "Erreur contacter votre administrateur !!!"
                ]);
            }

        }
        catch(Exception $e){
            return response()->json($e);
        }
    }
}
