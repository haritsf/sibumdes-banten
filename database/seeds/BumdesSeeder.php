<?php

use Illuminate\Database\Seeder;
use App\Bumdes;

class BumdesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bumdes::insert([
            [
                'id_user' => 3,
                'nama' => "CV. Sukses Makmur Jaya",
                'kabupaten' => "Serang",
                'kecamatan' => "Lebakwangi",
                'desa' => "Kebonratu",
                'alamat' => "Dusun Satu",
                'telp' => "021123456789",
                'musyawarah' => "2020-01-01",
                'perdes' => "PERDES-30-12-2019",
                'sk' => "SK-KADES-30-12-2019",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
