<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Whiskas',
                'quantity' => '5',
                'price' => '45000',
                'detail' => 'Whiskas is the best cat food product and is highly nutritious to support its health and growth.',
                'image' => 'wish.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Whiskas A',
                'quantity' => '5',
                'price' => '50000',
                'detail' => 'Whiskas is the best cat food product and is highly nutritious to support its health and growth.',
                'image' => 'wish2.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Dog's Vitamin - PetHonesty",
                'medicineAmount' => '5',
                'medicinePrice' => '150000',
                'image' => 'Pethonesty.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Revolution Selamectin Adult Cat",
                'medicineAmount' => '5',
                'medicinePrice' => '120000',
                'image' => 'Revolution_Selamectin_Adult_Cat.jpg'
            ],
        ]);
    }
}
