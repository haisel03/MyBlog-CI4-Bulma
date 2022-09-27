<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $post = model('PostsModel');
        helper('text');
        return view('Front/Home',[
            'posts' => $post->paginate(4),
            'pager' => $post->pager
        ]);
    }

    public function article($slug)
    {
        $pModel = model('PostsModel');
        $post = $pModel->where('slug', $slug)->first();
        if(!$post){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        return view('Front/article', ['post' => $post]);
    }

    public function filter(array $args)
    {
        $post = model('PostsModel');
        helper('text');
        return view('Front/Filter', [
            'posts' => $post->getPostsByCategories($args['category'])
                            ->findAll($arg['limit'] ?? 0)
        ]);
    }
}
