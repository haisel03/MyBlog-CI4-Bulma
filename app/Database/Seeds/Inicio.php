<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Inicio extends Seeder
{
    public function run()
    {
        $this->call('Countries');
        $this->call('Groups');
        $this->call('Categories');
        $this->call('UserDefault');
    }
}
