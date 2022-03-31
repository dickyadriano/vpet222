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
                'name' => 'custom',
                'username' => 'custom',
                'email' => 'custom@gmail.com',
                'password' => Hash::make('custom'),
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
                'password' => Hash::make('clinic'),
                'avatar' => 'default.png',
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
                'password' => Hash::make('shop12'),
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
                'password' => Hash::make('veteri'),
                'avatar' => 'default.png',
                'phoneNo' => '12121212122',
                'address' => '12312123121',
                'type' => 'veterinary'
            ]
        ]);
        DB::table('users')->insert([
            [
                'name' => 'veteri1',
                'username' => 'veteri1',
                'email' => 'veteri1@gmail.com',
                'password' => Hash::make('veteri1'),
                'avatar' => 'default.png',
                'phoneNo' => '234234234234',
                'address' => 'veteri1',
                'type' => 'veterinary'
            ]
        ]);
        DB::table('users')->insert([
            [
                'name' => 'veteri2',
                'username' => 'veteri2',
                'email' => 'veteri2@gmail.com',
                'password' => Hash::make('veteri2'),
                'avatar' => 'default.png',
                'phoneNo' => '345345345345',
                'address' => 'veteri2',
                'type' => 'veterinary'
            ]
        ]);

        DB::table('information')->insert([
            [
                'title' => 'Consumer bureau vet who battled Trump will lead Biden plans to overhaul agency',
                'information' => 'The former deputy director of the Consumer Financial Protection Bureau (CFPB), who lost a legal battle for control of the agency to the Trump administration, will lead President-elect Joe Biden’s preparations to overhaul the powerful financial watchdog. ',
                'image' => 'Vitol.jpg',
            ]
        ]);

        DB::table('information')->insert([
            [
                'title' => 'Valley couple mourns loss after dog dies during vet visit',
                'information' => '“The  radiologist noted Harley was suffering from an enlarged heart that had developed between the previous visit and this one, a condition which was unknown to both the owners and to us prior to this time,” a statement read. “This is a serious medical condition that likely caused Harley’s sudden and tragic passing. “Although we can’t say for certain without the benefit of an autopsy that Harley’s death was caused by his heart condition, we can say for sure that Harley did not die from choking or a broken neck.”',
                'image' => 'Vitol.jpg',
            ]
        ]);
    }
}
