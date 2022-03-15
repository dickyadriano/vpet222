<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'admin1',
                'avatar' => '1646565347.jpg',
                'phoneNo' => '66666666666',
                'address' => 'admin',
                'type' => 'admin'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'custom',
                'username' => 'custom',
                'email' => 'custom@gmail.com',
                'password' => 'custom',
                'avatar' => 'default.png',
                'phoneNo' => '08217777777',
                'address' => 'Jalan Stasiun',
                'type' => 'customer'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'clinic',
                'username' => 'clinic',
                'email' => 'clinic@gmail.com',
                'password' => 'clinic',
                'avatar' => '1645600197.jpg',
                'phoneNo' => '12312312312',
                'address' => 'clinic',
                'type' => 'vetClinic'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'shop',
                'username' => 'shop',
                'email' => 'shop@gmail.com',
                'password' => 'shop12',
                'avatar' => 'default.png',
                'phoneNo' => '12121212121',
                'address' => 'shop',
                'type' => 'petShop'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'veteri',
                'username' => 'veteri',
                'email' => 'veteri@gmail.com',
                'password' => 'veteri',
                'avatar' => 'default.png',
                'phoneNo' => '12121212122',
                'address' => '12312123121',
                'type' => 'veterinary'
            ]
        ]);
    }
}
