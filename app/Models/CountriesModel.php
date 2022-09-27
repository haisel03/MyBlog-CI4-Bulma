<?php

namespace App\Models;

use CodeIgniter\Model;

class CountriesfoModel extends Model
{
    protected $table            = 'countries';
    protected $primaryKey       = 'id_country';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['name',];
    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
