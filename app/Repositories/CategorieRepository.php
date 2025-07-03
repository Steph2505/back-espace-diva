<?php
 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Repositories\ResourceRepository;
use App\Models\Categorie;


 
class CategorieRepository extends ResourceRepository
{
     public function __construct(Categorie $categorie) {
        $this->model = $categorie;
    }

    //Get user by Id
    public function getById($id)
    {
        return $this->model->with('article')->where('id',$id)->first();
    }

    //created users
    public function created($data = array())
    {
        $categorie = new Categorie();
        
        $categorie->entitled = $data['entitled'];
        $categorie->code = $data['code'];
        $categorie->save();

        return $categorie;
    }

    //updated categegorie
    public function updated($id, $data = array())
    {
        return $this->model->where('id',$id)->update($data);
    }

    //Listing categ with pagination
    public function pagination($limit, $search = null){

        $categorie = $this->model;

        if(isset($categorie)){

            if($search){
                $categorie = $categorie->where(function ($query) use ($search){
                    $query->where('entitled','LIKE', "%$search%")
                          ->whereor('code','LIKE', "%$search%");
                });
            }

            $categorie = $categorie->paginate($limit);

            return $categorie;
        }

        return null;
    }


}
