<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UsersModel;
use App\Entities\UserInfo;


class Register extends BaseController
{
    protected $configs;

    public function __construct()
    {
        $this->configs = config('Blog');
    }

    public function index()
    {
        $model = model('CountriesModel');
        return view('Auth/register',[
            'countries' => $model->findAll()
        ]);
    }

    public function store()
    {
        $validacion = service('validation');
        $validacion->setRules([
            'name'          => 'required|alpha_space',
            'lastname'      => 'required|alpha_space',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'id_country'    => 'required|is_not_unique[countries.id_country]',
            'password'      => 'required|matches[c-password]'

        ]);
        if(!$validacion->withRequest($this->request)->run()){
            //dd($validacion->getErrors());
            return redirect()->back()->withInput()
                            ->with('errors', $validacion->getErrors());
        }
        
        $user = new User($this->request->getPost());
        $user->generateUsername();

        $userModel = new UsersModel();
        $userModel->withGroup($this->configs->defaultGroupUser);

        $userInfo = new UserInfo($this->request->getPost());
        $userModel->addInfoUser($userInfo);
        $userModel->save($user);
        return redirect()->route('login')->with('msg',[
            "type" => "success",
            "body" => "Usuario registrado con exito"
        ]);
    }

}
