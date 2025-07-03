<?php
 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Repositories\ResourceRepository;
use App\Models\User;


 
class UserRepository extends ResourceRepository
{
     public function __construct(User $user) {
        $this->model = $user;
    }

    //Get user by Id
    public function getById($id)
    {
        return $this->model->with('profils')->where('id',$id)->first();
    }

    //Get all user
    public function getAll()
    {
        return $this->model->with('profils')->get();
    }

    
    //created users
    public function created($data = array())
    {
        $user = new User();
        
        $user->name = $data['name'];
        $user->last_name = $data['last_name'];
        $user->first_name = $data['first_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->profil_id = $data['profil_id'];
        return $user;
    }

    //updated users
    public function updated($id, $data = array())
    {
        return $this->model->where('id',$id)->update($data);
    }

    //Listing users with pagination
    public function pagination($limit, $search = null){

        $users = $this->model;

        if(isset($users)){

            if($search){
                $users = $users->where(function ($query) use ($search){
                    $query->where('name','LIKE', "%$search%");
                });
            }

            $users = $users->paginate($limit);

            return $users;
        }

        return null;
    }


}
