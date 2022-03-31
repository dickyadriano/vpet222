<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'userID' => '5',
                'serviceName' => 'aidilClv',
                'price' => '150000',
                'detail' => 'Pengalaman selama 9 tahun bekerja dengan rumah sakit hewan jakarta',
                'idCard' => '977913.jpg',
                'vetLicense' => 'pexels-maxime-francis-2246476.jpg',
                'image' => 'default.png',
                'verificationStatus' => 'Verified'
            ],
        ]);
        DB::table('services')->insert([
            [
                'userID' => '6',
                'serviceName' => 'mAdam',
                'price' => '50000',
                'detail' => 'PENGALAMAN 3 TAHUN',
                'idCard' => 'Screenshot (34).png',
                'vetLicense' => '977913.jpg',
                'image' => 'default.png',
                'verificationStatus' => 'Pending'
            ],
        ]);
        DB::table('services')->insert([
            [
                'userID' => '7',
                'serviceName' => 'choleSmite',
                'price' => '120000',
                'detail' => 'Pengalaman 5 tahun praktek di rumah sakit hewan denpasar dan Dokter hewan terproduktif tahun 2018',
                'idCard' => 'Screenshot (39).png',
                'vetLicense' => 'Screenshot 2022-02-03 151138.png',
                'image' => 'default.png',
                'verificationStatus' => 'Pending'
            ],
        ]);
    }
}
