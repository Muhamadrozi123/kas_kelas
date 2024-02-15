<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for($i =0; $i < 10; $i++) {
            Siswa::create([
                'nama' => $faker->name,
                'kelas' => $faker->randomElement(['XII RPL', 'XII DKV', 'XII TJKT'])
            ]);
        }
    }
}
