<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id_country" => [
                "type"              => 'INT',
                "constraint"        => 12,
                "auto_increment"    => true,
                "unsigned"          => true,
                "null"              => false
            ],
            "name" => [
                "type"              => 'VARCHAR',
                "constraint"        => '100',
                "null"              => false,
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
        $this->forge->addKey('id_country', true);
        $this->forge->createTable('countries');
    }

    public function down()
    {
        $this->forge->dropTable('countries');
    }
}
