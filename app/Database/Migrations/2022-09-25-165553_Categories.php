<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type"              => 'INT',
                "constraint"        => 12,
                "auto_increment"    => true,
                "unsigned"          => true,
                "null"              => false
            ],
            "name" => [
                "type"              => 'VARCHAR',
                "constraint"        => '120',
                "null"              => false,
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
