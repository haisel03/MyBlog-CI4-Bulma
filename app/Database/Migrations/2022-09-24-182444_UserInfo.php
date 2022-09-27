<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserInfo extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            "id_user" => [
                "type"              => "INT",
                "constraint"        => 12,
                "unsigned"          => true,
                "auto_increment"    => true,
                "null"              => false
            ],
            "name" => [
                "type"              => 'VARCHAR',
                "constraint"        => '100',
                "null"              => false,
            ],
            "lastname" => [
                "type"              => 'VARCHAR',
                "constraint"        => '100',
                "null"              => false,
            ],
            "id_country" => [
                "type"              => "INT",
                "constraint"        => "12",
                "unsigned"          => true,
                "null"              => true
            ],
            "created_at"     => [
                "type"              => 'DATETIME',
                "null"              => false 
            ],
            "updated_at"     => [
                "type"              => 'DATETIME',
                "null"              => true 
            ]
        ]);
        $this->forge->addKey("id_user", true);
        $this->forge->addForeignKey('id_country', 'countries', 'id_country', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_info');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('user_info');
    }
}
