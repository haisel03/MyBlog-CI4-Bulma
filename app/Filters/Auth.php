<?php namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use Codeigniter\HTTP\RequestInterface;
  use Codeigniter\HTTP\ResponseInterface;
  use CodeIgniter\Filters\FilterInterface;

  class Auth implements FilterInterface
  {
    public function before(RequestInterface $request, $arguments = null)
    {
      if(!session()->is_logged) {
        return redirect()->route('login')->with('msg', [
          'type' => 'warning',
          'body' => 'Para acceder a este lugar primero debe logearse con su cuenta'
        ]);
      }

      $model = model('UsersModel');
      $user = $model->getUserBy('id', session()->id_user);
      if(!$user){
        session()->destroy();
        return redirect()->route('login')->with('msg', [
          'type' => 'danger',
          'body' => 'El usuario actualmente no está disponible'
        ]);
      }
      if(!in_array($user->getRole()->name_group, $arguments)){
        throw PageNotFoundException::forPageNotFound();
      }
    }

    public function after(RequestInterface $request, ResponseInterface $response,  $arguments = null)
    {
      
    }
  }
  
?>