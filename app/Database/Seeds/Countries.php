<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
class Countries extends Seeder
{
    public function run()
    {
        //Para insertar los paises
        $faker = Factory::create();
        $countries = [];

        for ($i = 0; $i < 20; $i++) {

            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);

            $countries[] = [
                "name" => $faker->country(),
                "created_at" => $created_at->format('Y-m-d H:i:s'),
                "updated_at" => $updated_at->format('Y-m-d H:i:s')
            ];
        }

        $tbl = $this->db->table('countries');
        $tbl->insertBatch($countries);
    }
}
