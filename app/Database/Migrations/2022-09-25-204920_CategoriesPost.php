<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesPost extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            "id_post" => [
                "type"              => 'INT',
                "constraint"        => 12,
                "unsigned"          => true,
                "null"              => false
            ],
            "id_category" => [
                "type"              => 'INT',
                "constraint"        => 12,
                "unsigned"          => true,
                "null"              => false
            ]
        ]);
        $this->forge->addForeignKey('id_post', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_category', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('categories_posts');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('categories_posts');
    }
}
