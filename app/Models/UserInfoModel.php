<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\UserInfo;

class UserInfoModel extends Model
{
    protected $table            = 'user_info';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = UserInfo::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'lastname', 'id_country'];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
