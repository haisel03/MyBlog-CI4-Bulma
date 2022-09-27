<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        if(!session()->is_logged){

            return view('Auth/login');
        }
        return redirect()->route('posts');
    }

    public function signin(){
        //Validar requeridos
        if (!$this->validate([
          'email' => 'required|valid_email',
          'password' => 'required'  
        ])) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }

        $email = $this->request->getVar('email');
        $pass = trim($this->request->getVar('password'));
        $model = model('UsersModel');
        $user = $model->getUserBy('email', $email);
        //Validar si hay un resgitro con el email en el sistema
        if(!$user){
            return redirect()->back()
            ->with('msg',[
                "type" => "danger",
                "body" => "Este usuario no se encuentra registrado"
            ]);
        }
        //Validar si la contraseña es correcta
        if(!password_verify($pass, $user->password)){
            return redirect()->back()
            ->with('msg',[
                "type" => "danger",
                "body" => "Credenciales invalidas"
            ]);
        }

        session()->set([
            'id_user' => $user->id,
            'username' => $user->username,
            'is_logged' => true
        ]);

        return redirect('')->route('posts')->with('msg',[
            "type" => "success",
            "body" => "bienvenvenido nuevamente "  .  $user->username
        ]);
    }

    public function signout()
    {
        session()->destroy();
        return redirect()->route('login');
    }
}
