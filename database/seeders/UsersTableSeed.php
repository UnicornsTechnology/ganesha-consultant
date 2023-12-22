<?php

namespace Database\Seeders;

use App\Models\tbl_improt_data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

         $users = [];        
             for($i = 0; $i < 100; $i++)
             {
                    $users[] = [
                        "improt_name" => $faker->name(),
                        "improt_number" => $faker->phoneNumber(),
                        'created_at' => now(),
                'updated_at' => now(),
                    ] ;
            }
            tbl_improt_data::insert($users);
    }
}
