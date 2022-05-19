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
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Trimoxal",
                'medicineAmount' => '100',
                'medicinePrice' => '110000',
                'medicineDetail' => "Exp date bln 01 th 2023
                                    Trimoxal Suspension 250ml
                                    Product Diasham Resource
                                    Contents per ml:
                                    Trimethoprim 10mg
                                    Sulfamethoxazole 50mg",
                'image' => 'Trimoxal.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Advocate",
                'medicineAmount' => '100',
                'medicinePrice' => '90000',
                'medicineDetail' => "Advocate kills fleas, flea larvae, roundworms and hookworms and also treats ear mite infections and prevents heartworm in cats and dogs.",
                'image' => 'advocate.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Herba Take Pet",
                'medicineAmount' => '100',
                'medicinePrice' => '110000',
                'medicineDetail' => "HerbaTake pet syrup is a Powerful Liver Tonic & Appetite Booster. It is a clinically proven herbal formulation investigated over a decade. It contains 10 herbs. HerbaTake Pet syrup is helpful in treating liver dysfunction, stress, and non-specific anorexia.",
                'image' => 'herbatakepet.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Homeo Pet",
                'medicineAmount' => '100',
                'medicinePrice' => '130000',
                'medicineDetail' => "Hepar Sulphuris Calcareum 6c & 30c, Natrum Arsenicosum 6c & 30c, Gelsemium Sempervirens 6c & 30c, Muriaticum Acidum 6c & 30c, Kali Iodatum 6c & 30c, 20% USP alc. in purified water.",
                'image' => 'homeopet.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Pet Alive",
                'medicineAmount' => '100',
                'medicinePrice' => '50000',
                'medicineDetail' => "PetAlive ComfyPet Pain Relief - Natural Homeopathic Formula for Minor Aches and Pains in Dogs and Cats - Temporarily Reduces Minor Discomfort in The Muscles and Joints - 59 mL",
                'image' => 'petalive.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Pet Vit Power",
                'medicineAmount' => '100',
                'medicinePrice' => '70000',
                'medicineDetail' => "Nama produk : Vit Power PhoenixManfaat : Meningkatkan stamina Untuk menaikkan birahi pada burung Mengatasi burung macet bunyi Meningkatkan kecerdasan burung Menjernihkan suara Menjaga daya tahan tubuh Meningkatkan intensitas kicauan Menjaga stabilitas mental Menambah durasi kicauan Meningkatkan performa burungSaran pemakaian : Berikan 3-4 tetes Vit Power pada 10 ml air minum burungKomposisi : Vitamin A, B kompleks, C, D3, E, folid acid, dllCocok untuk semua jenis burungCatatan penting : - Order sebelum Jam 4 Sore Pesanan dikirim di hari yang sama - Jika pesan lewat dari jam 4 sore maka barang dikirim dihari berikutnya - Waktu pengiriman Senin-sabtu (Hari Minggu & tgl merah libur) - Resi otomatis ter update sistem di malam hari setelah pengiriman atau maksimal H+1",
                'image' => 'petvitpower.png'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Septafine",
                'medicineAmount' => '100',
                'medicinePrice' => '90000',
                'medicineDetail' => "SEPTAFINE DROPS for pets is the best remedy for treating conditions of sepsis anywhere in the body with exceptional improvement in metritis and pyometra conditions. It cures septic or septic-like symptoms in any part of the body. SEPTAFINE DROPS for PETS is an excellent remedy that reduces the pus formation in the body and heals the injury or internal wound fast.",
                'image' => 'septafine.png'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Immuno Sky",
                'medicineAmount' => '100',
                'medicinePrice' => '60000',
                'medicineDetail' => "Sky-Ec ImmunoSky is a clinically proven product to boost your pet’s immunity and fight against pathogens (disease causing bacteria, virus or microorganism). ",
                'image' => 'immunosky.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Viusid",
                'medicineAmount' => '100',
                'medicinePrice' => '80000',
                'medicineDetail' => "Indikasi Umum
                                        Untuk meningkatkan sistem kekebalan tubuh, membantu memulihkan stamina saat sakit, dan sebagai nutrisi tambahan untuk meningkatkan kondisi tubuh.",
                'image' => 'viusid.jpg'
            ],
        ]);
        DB::table('medicines')->insert([
            [
                'userID' => '3',
                'medicineName' => "Pet Booster",
                'medicineAmount' => '100',
                'medicinePrice' => '100000',
                'medicineDetail' => "kegunaan :
                                    menjaga kesehatan pencernaan
                                    memberikan energi dan nutrisi
                                    meningkatkan kekebalan tubuh",
                'image' => 'petbooster.png'
            ],
        ]);
    }
}
