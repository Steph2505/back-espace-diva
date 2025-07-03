<?php
 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Repositories\ResourceRepository;
use App\Models\Operation;
use App\Models\Article;


 
class Operationrepository extends ResourceRepository
{

     public function __construct(Operation $operation) {
        $this->model = $operation;
    }

    public function getById($id)
    {
        return $this->model->with('magasins')->find($id);
    }

    public function created($data = array())
    {

        $operation = new operation();

        $operation->article_id = $data['article_id'];
        $operation->magasin_id = $data['magasin_id'];
        
        $checkOperation = $this->model->where('article_id',$data['article_id'])
                                      ->where('magasin_id',$data['magasin_id'])
                                      ->orderBy('created_at','desc')->first();
        
        if (isset($checkOperation)) {//Si cet enregistrement existe déjà dans operations
            if($data['type_operation'] === 0) { //En cas d'entrée
                
                $operation->in = $data['in'];
                $operation->out = 0;
                $operation->stock = $checkOperation->stock + $data['in'];
            }
            else{// En cas de sortie
                
                $operation->in = 0;
                $operation->out = $data['out'];
                $operation->stock = $checkOperation->stock - $data['out'];
            }

            $operation->do_by = $data['do_by'];
            $operation->type_operation = $data['type_operation'];
    
            return  $operation->save();
    
        }
        else{// Si l'enregistrement n'existe pas save comme entrée
            $operation->in = $data['in'];
            $operation->out = 0;
            $operation->stock = $data['in'];
        }

        $operation->do_by = $data['do_by'];
        $operation->type_operation = $data['type_operation'];

        return  $operation->save();
    }

    
    //updated operation
    public function updated($id, $data = array())
    {
        return $this->model->where('id',$id)->update($data);
    }

    //Listing categ with pagination
    public function pagination($limit, $search = null){

        $operation = $this->model;

        if(isset($operation)){

            if($search){
                $operation = $operation->where(function ($query) use ($search){
                    $query->where('entitled','LIKE', "%$search%")
                        ->whereor('code','LIKE', "%$search%");
                });
            }

            $operation = $operation->paginate($limit);

            return $operation;
        }

        return null;
    }

    
    public function ajaxArticle($magasin_id, $typeTrans){
        
        $allArticle = Article::get();
        // dd($allArticle);
        $stateArticle = [];
        foreach($allArticle as $article) {
            $operation = $this->model->where('article_id', $article->id)->where('magasin_id', $magasin_id)->where('type_operation', $typeTrans)->first();
            if ($operation) {
                $stateArticle[]=[
                    'id' => $article->id,
                    'name' => $article->entitled,
                    'stock' => $operation->stock,
                ];
            }

            if(!$operation && $typeTrans === '0')
            {
                $stateArticle[]=[
                    'id' => $article->id,
                    'name' => $article->entitled,
                    'stock' => 0,
                ];
            }
        }

        if(count($stateArticle) > 0){
            return $stateArticle;
        }

        return null;
    }

}
