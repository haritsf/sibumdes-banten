<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'username' => "adminsibumdes",
                'password' => Hash::make("adminweb"),
                'email' => "admin@bumdes.banten.prov",
                'name' => "Administrator",
                'role' => "admin",
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => "operatorsibumdes",
                'password' => Hash::make("operatorweb"),
                'email' => "operator@bumdes.banten.prov",
                'name' => "Operator",
                'role' => "admin",
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => "cvsukses",
                'password' => Hash::make("cvsukses"),
                'email' => "sukses@bumdes.banten.prov",
                'name' => "CV. Sukses Makmur Jaya",
                'role' => "bumdes",
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
