<?php

use Illuminate\Database\Seeder;
use App\Pengurus;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengurus::insert([
            [
                'id_bumdes' => 1,
                'nama' => "Isgiyanto",
                'jabatan' => "Ketua",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
