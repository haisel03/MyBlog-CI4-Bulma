<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Groups extends Seeder
{
    public function run()
    {
        //Insertar los grupos de usuarios
        $groups = [
            [
                'name_group' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name_group' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        $tbl = $this->db->table('groups');
        $tbl->insertBatch($groups);
    }
}
