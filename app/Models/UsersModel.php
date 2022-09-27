<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;
use App\Entities\UserInfo;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';

    protected $returnType       = User::class;
    protected $useSoftDeletes   = true;

    protected $allowedFields    = ['username', 'email', 'password', 'id_group'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //Custom
    protected $assignGroup;
    protected $infoUser;

    // Callbacks
    protected $beforeInsert   = ['addGroup'];
    protected $afterInsert    = ['storeUserInfo'];
    
    protected function addGroup($data){
        $data['data']['id_group'] = $this->assignGroup;
        return $data;
    }

    protected function storeUserInfo($data){
        $this->infoUser->id_user = $data['id'];
        $model = model('UserInfoModel');
        $model->insert($this->infoUser);
    }

    //Se usa para traer el grupo por defecto
    public function withGroup(string $group){
        $row = $this->db->table('groups')
                    ->where('name_group', $group)
                    ->get()->getFirstRow();

        if($row !== null){
            $this->assignGroup = $row->id_group;
        }
    }

    public function addInfoUser(UserInfo $ui)
    {
        $this->infoUser = $ui;
    }

    public function getUserBy(string $column , string $value)
    {
        return $this->where($column, $value)->first();
    }





    /*protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];*/
}
