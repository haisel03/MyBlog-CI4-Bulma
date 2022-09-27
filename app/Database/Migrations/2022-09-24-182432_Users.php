<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            "id"             => [
                "type"              => "INT",
                "constraint"        => 12,
                "unsigned"          => true,
                "auto_increment"    => true,
                "null"              => false
            ],
            "username"       => [
                "type"              => 'VARCHAR',
                "constraint"        => '100',
                "null"              => false,
                'unique'            => true,
            ],
            "email"       => [
                "type"              => 'VARCHAR',
                "constraint"        => '100',
                "null"              => false,
                'unique'            => true,
            ],
            "password"       => [
                "type"              => 'VARCHAR',
                "constraint"        => '100',
                "null"              => false,
            ],
            "id_group"          => [
                "type"              => "INT",
                "constraint"        => '12',
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
            ],
            "deleted_at"     => [
                "type"              => 'DATETIME',
                "null"              => true 
            ]
        ]);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey('id_group', 'groups', 'id_group', 'CASCADE', 'SET NULL');
        $this->forge->createTable('users');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
