<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('admin1'),
                'avatar' => '1646565347.jpg',
                'phoneNo' => '66666666666',
                'address' => 'admin',
                'type' => 'admin'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Bagus Jatem',
                'username' => 'bagus_jatem',
                'email' => 'bagusJtm@gmail.com',
                'password' => Hash::make('bagusJ'),
                'avatar' => 'default.png',
                'phoneNo' => '08217777777',
                'address' => 'Jalan Stasiun',
                'type' => 'customer'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Clinic Sahari',
                'username' => 'cSahari',
                'email' => 'cSahari@gmail.com',
                'password' => Hash::make('cSahari'),
                'avatar' => 'default.png',
                'phoneNo' => '12312312312',
                'address' => 'Jl.Raya Sesetan No.132',
                'type' => 'vetClinic'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Happy Pet Shop',
                'username' => 'happyPS',
                'email' => 'happypetshop@gmail.com',
                'password' => Hash::make('happyPS'),
                'avatar' => 'default.png',
                'phoneNo' => '12121212121',
                'address' => 'Sea Road no.23',
                'type' => 'petShop'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'drh. Aidil Calvianto',
                'username' => 'aidilClv',
                'email' => 'aidilClv@gmail.com',
                'password' => Hash::make('aidilClv'),
                'avatar' => 'default.png',
                'phoneNo' => '12121212122',
                'address' => 'Jl. Alianyang No.5',
                'type' => 'veterinary'
            ]
        ]);
        DB::table('users')->insert([
            [
                'name' => 'drh. M.Adam',
                'username' => 'mAdam',
                'email' => 'mAdam@gmail.com',
                'password' => Hash::make('mAdam1'),
                'avatar' => 'default.png',
                'phoneNo' => '234234234234',
                'address' => 'Jl. Pasar Baru no.9',
                'type' => 'veterinary'
            ]
        ]);
        DB::table('users')->insert([
            [
                'name' => 'drh. Chole Smite',
                'username' => 'choleSmite',
                'email' => 'choleSmite@gmail.com',
                'password' => Hash::make('choleSmite'),
                'avatar' => 'default.png',
                'phoneNo' => '345345345345',
                'address' => 'Jl. Gunung Api No.5',
                'type' => 'veterinary'
            ]
        ]);
    }
}
