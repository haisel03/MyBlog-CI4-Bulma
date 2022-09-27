<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserInfo extends Entity
{

    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];


    public function getFullName(){
        $fullName = trim($this->name . " ". $this->lastname);
        return $fullName;
    }
}
