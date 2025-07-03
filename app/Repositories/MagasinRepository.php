<?php
 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Repositories\ResourceRepository;
use App\Models\Magasin;
use Illuminate\Support\Facades\Auth;


 
class MagasinRepository extends ResourceRepository
{
     public function __construct(Magasin $magasin) {
        $this->model = $magasin;
    }

    //Get categorie by Id
    public function getById($id)
    {
        return $this->model->where('id',$id)->first();
    }

    //created categorie
    public function created($data = array())
    {
        $magasin = new magasin();
        
        $magasin->entitled = $data['entitled'];
        $magasin->description = $data['description'];
        $magasin->localisation = $data['localisation'];
        $magasin->user_id = $data['user_id'];
        
        $user = Auth::user();

        if (isset($data['manager'])) {// Magasin est géré par un gestionnaire lambda
            $magasin->manager = $data['manager'];
        }
        else{// Sinon par le createur
            // $magasin->manager = $user->id;
        }
        $magasin->save();

        return $magasin;
    }

    //updated categegorie
    public function updated($id, $data = array())
    {
        return $this->model->where('id',$id)->update($data);
    }

    //Listing categ with pagination
    public function pagination($limit, $search = null){

        $user = Auth::user();

        $magasin = $this->model;
        
        if(isset($magasin)){

            if($search){
                $magasin = $magasin->where(function ($query) use ($search){
                    $query->where('entitled','LIKE', "%$search%");
                });
            }
            
            $magasin = $magasin->whereIn( 'id', json_decode($user->magasins) )->get();

            return $magasin;
        }

        return null;
    }


}
