<?php
 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Repositories\ResourceRepository;
use App\Models\Article;
use Illuminate\Support\Carbon;

class ArticleRepository extends ResourceRepository
{

     public function __construct(Article $article) {
        $this->model = $article;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function created($data = array())
    {

        $article = new Article();
        
        $article->entitled = $data['entitled'];
        $article->description = $data['description'];
        $article->couleur = $data['couleur'];
        $article->code = $data['code'];
        $article->type_stock = $data['type_stock'];
        $article->categorie_id = $data['categorie_id'];
        $article->user_id = $data['user_id'];
        return  $article->save();
    }

    
    //updated Article
    public function updated($id, $data = array())
    {
        $data['updated_at'] = now();
        $data['created_at'] = Carbon::parse($data['created_at']);
        return $this->model->where('id',$id)->update($data);
    }

    //Listing categ with pagination
    public function pagination($limit, $search = null){

        $article = $this->model->with('categories');

        if(isset($article)){

            if($search){
                $article = $article->where(function ($query) use ($search){
                    $query->where('entitled','LIKE', "%$search%")
                        ->whereor('code','LIKE', "%$search%");
                });
            }

            $article = $article->paginate($limit);

            return $article;
        }

        return null;
    }

}
