<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $dates   = ['created_at', 'updated_at'];

    protected function setPassword(string $password){
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    public function generateUsername(){
        $username = substr(explode(" ", $this->name)[0],0,1) . explode(" ", $this->lastname)[0];
        $this->attributes['username'] = strtolower($username);
    }


    public function getRole()
    {
        $model = model('GroupModel');
        return  $model->where('id_group', $this->id_group)->first();
    }

}
