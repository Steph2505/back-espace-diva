<?php

namespace App\Handlers;

use App\Notifications\SendLearnerRegistrationNotification;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Exception;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;

class UserHandler  {

    protected $userRepository;

    public  function __construct(UserRepository $userRepository){

        $this->userRepository = $userRepository;

    }

    public function store ($inputs){
        // dd('handle');
        function genererPasswordAleatoire($longueur) {
            return bin2hex(random_bytes($longueur / 2));
        }

      
        try {

            $result = DB::transaction( function() use ($inputs){

                // $password = genererPasswordAleatoire(8);
                $password ="password";

                $user= $inputs;
                $user['password']= Hash::make($password);
                
                $user->save();
                // dd('handle', $user);
                
                return $user;
            });
    
            DB::commit();

        }catch(Exception $e) {

            DB::rollBack();
            
        }

        if(isset($result)){

            return $result;

        }else{
            return null;
        }

    }

}