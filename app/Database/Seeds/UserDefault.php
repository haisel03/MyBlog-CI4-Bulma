<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserDefault extends Seeder
{
    public function run()
    {
        $pass = password_hash('admin123', PASSWORD_DEFAULT);
        $id_user = 1;
        $user = [
            'username' => 'hramirez',
            'email'     => 'haiselramirez@gmail.com',
            'password'  => $pass,
            'id_group'  => 1,
            'created_at'    => date('Y-m-d H:i:s')
        ];

        $tbl = $this->db->table('users');
        $tbl->insert($user);

        $userinfo = [
            'id_user' => $id_user,
            'name'  => 'Haisel',
            'lastname'=>'Ramirez Brito',
            'id_country'    => 1,
            'created_at'    => date('Y-m-d H:i:s')
        ];

        $tbl = $this->db->table('user_info');
        $tbl->insert($userinfo);
    }
}
