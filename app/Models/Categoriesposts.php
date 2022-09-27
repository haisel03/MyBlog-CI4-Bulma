<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoriesposts extends Model
{
    protected $table            = 'categories_posts';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_post', 'id_category'];
}
