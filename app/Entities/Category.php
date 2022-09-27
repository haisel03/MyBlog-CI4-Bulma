<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Hashids\Hashids;

class Category extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];


    public function getEditLink()
    {
        return base_url(route_to('categories_edit', $this->id));
    }

    public function getDeleteLink()
    {
        $hash = new Hashids();
        return base_url(route_to('categories_delete',$hash->encode($this->id)));
    }
}
