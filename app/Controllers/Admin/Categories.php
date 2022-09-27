<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Hashids\Hashids;

class Categories extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = model('CategoriesModel');
    }

    public function index()
    {
        
        return view('Admin/categories', [
            'categories' => $this->model->orderBy('created_at', 'DESC')->paginate(Config('Pager')->perPage),
            'pager'      => $this->model->pager
        ]);
        //config('Blog')->regPerPage
    }

    public function create()
    {
        return view('Admin/categories_create');
    }

    public function store()
    {
        if(!$this->validate([
            'name' => 'required|max_length[120]'
        ])){
            return redirect()->back()->withInput()
                            ->with('msg', [
                                'type' => 'danger',
                                'body' => 'Tiene campos incorrectos'])
                            ->with('errors', $this->validator->getErrors());
        }

        $this->model->save([
            'name' => $this->request->getVar('name')
        ]);

        return  redirect('categories')->with('msg', [
            'type' => 'success',
            'body' => 'la categoria fue guardada correctamente']);
    }

    public function edit(string $id){
        $category = $this->model->find($id);
        if(!$category){
            throw PageNotFoundException::forPageNotFound();
        }
        
        return view('Admin/categories_edit',['category' => $category]);
    }

    public function update()
    {
        if(!$this->validate([
            'name' => 'required|max_length[120]',
            'id'   => 'required|is_not_unique[categories.id]'
        ])){
            return redirect()->back()->withInput()
                            ->with('msg', [
                                'type' => 'danger',
                                'body' => 'Tiene campos incorrectos'])
                            ->with('errors', $this->validator->getErrors());
        }

        $this->model->save([
            'id' => trim($this->request->getVar('id')),
            'name' => trim($this->request->getVar('name'))
        ]);

        return  redirect('categories')->with('msg', [
            'type' => 'success',
            'body' => 'la categoria fue actualizada correctamente']);
    }



    public function delete(string $id){
        $hash = new Hashids();
        $id = $hash->decode($id);
        $this->model->delete($id);
        return redirect('categories')->with('msg',[
            'type' => 'success',
            'body' => 'La categoria fué eliminada correctamente!'
        ]);
    }
}
