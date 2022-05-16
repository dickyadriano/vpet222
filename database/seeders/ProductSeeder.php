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
                'productName' => 'Whiskas Adult 1+ Years',
                'quantity' => '5',
                'price' => '45000',
                'detail' => 'Whiskas is the best cat food product and is highly nutritious to support its health and growth.',
                'image' => 'wish.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Whiskas Junior 2-12 Months',
                'quantity' => '5',
                'price' => '50000',
                'detail' => 'Whiskas is the best cat food product and is highly nutritious to support its health and growth.',
                'image' => 'wish2.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Cat Bed',
                'quantity' => '10',
                'price' => '150000',
                'detail' => 'Soft and fluffy cat bed.',
                'image' => 'bed.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Cat/Dog Necklace',
                'quantity' => '12',
                'price' => '10000',
                'detail' => 'A comfortable cat necklace that can be used by kittens to adults.
                Include color in product details.',
                'image' => 'kalung.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Me O Persian',
                'quantity' => '12',
                'price' => '60000',
                'detail' => 'Special cat food that helps cat growth and endurance.',
                'image' => 'Me_O_Persian.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Dog Bed',
                'quantity' => '12',
                'price' => '170000',
                'detail' => 'Soft and fluffy dog bed.',
                'image' => 'bed_dog.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Dog Food - Pedigree Adult',
                'quantity' => '12',
                'price' => '100000',
                'detail' => 'Special dog food that helps dog growth and endurance.',
                'image' => 'pedigree_adult.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Cat Travel Bag',
                'quantity' => '12',
                'price' => '120000',
                'detail' => 'A bag for carrying a cat, comfortable and not stuffy.',
                'image' => 'travel_bag.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Royal Canin Puppy',
                'quantity' => '12',
                'price' => '83000',
                'detail' => 'Dog food to support puppy growth and strengthen bones',
                'image' => 'royal_canin_puppy.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Pedigree Small Dog',
                'quantity' => '12',
                'price' => '83000',
                'detail' => 'Dog food to support puppy growth and strengthen bones',
                'image' => 'pedigree_small_dog.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Dog Collars',
                'quantity' => '12',
                'price' => '50000',
                'detail' => 'Collar, strong and thick material',
                'image' => 'dog_collars.jpg'
            ],
        ]);
        DB::table('products')->insert([
            [
                'userID' => '4',
                'productName' => 'Dog Water Bottle',
                'quantity' => '12',
                'price' => '83000',
                'detail' => 'special animal water bottle, easy to carry and use when outside the house',
                'image' => 'water_bottle.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Dog's Vitamin - PetHonesty",
                'medicineAmount' => '5',
                'medicinePrice' => '150000',
                'medicineDetail' => "PetHonesty is good for your animal's health",
                'image' => 'Pethonesty.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Revolution Selamectin Adult Cat",
                'medicineAmount' => '5',
                'medicinePrice' => '120000',
                'medicineDetail' => "Selamectin is for Adult Cat only",
                'image' => 'Revolution_Selamectin_Adult_Cat.jpg'
            ],
        ]);
    }
}
