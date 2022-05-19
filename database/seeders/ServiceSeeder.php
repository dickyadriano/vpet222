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
                'image' => 'doctor.jpg',
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
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Rabipur',
                'vaccinePrice' => '100000',
                'stock' => '50',
                'vaccineDetail' => 'RABIPUR VACCINE 1ML contains immunoglobulins, i.e. antibodies that act against rabies disease. It helps to prevent the rabies disease post-exposure by neutralizing the rabies virus. It is usually not required in people who have been vaccinated against rabies disease. RABIPUR VACCINE 1ML is given as an injection.',
                'image' => 'rabipur.png'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Actiza',
                'vaccinePrice' => '130000',
                'stock' => '50',
                'vaccineDetail' => 'Actiza VACCINE 1ML contains immunoglobulins, i.e. antibodies that act against rabies disease. It helps to prevent the rabies disease post-exposure by neutralizing the rabies virus. It is usually not required in people who have been vaccinated against rabies disease. Actiza VACCINE 1ML is given as an injection.',
                'image' => 'Actiza.png'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Verocell',
                'vaccinePrice' => '140000',
                'stock' => '50',
                'vaccineDetail' => 'Vero cells are a lineage of cells used in cell cultures. The Vero lineage was isolated from kidney epithelial cells extracted from an African green monkey.',
                'image' => 'verocell.png'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Frontline',
                'vaccinePrice' => '110000',
                'stock' => '50',
                'vaccineDetail' => 'How often should I use FRONTLINE PLUS? Treat all your dogs and cats every month for optimal flea control. When applied correctly, FRONTLINE PLUS remains active against fleas for at least one month.',
                'image' => 'frontline.png'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Raksharab',
                'vaccinePrice' => '120000',
                'stock' => '50',
                'vaccineDetail' => 'Raksharab is recommended for immunization in dogs and other domestic animals against rabies for prophylactic use and post bite therapy. Download Full Details. Megavac 7. Live Canine Distemper, Adenovirus (CAV-2), Parvovirus, Parainfluenza and Inactivated Adenovirus (CAV-1), Leptospirosis Vaccine.',
                'image' => 'raksharab.jpg'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Canine Spectra',
                'vaccinePrice' => '140000',
                'stock' => '50',
                'vaccineDetail' => 'An economical annual booster containing four strains of Lepto, Spectra® 9 offers protection and aids in the reduction of diseases caused by Canine Distemper, Canine Adenovirus Types 1 & 2, Parainfluenza and Parvovirus.',
                'image' => 'caninespectra.jpg'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Vencosix',
                'vaccinePrice' => '50000',
                'stock' => '50',
                'vaccineDetail' => 'Vencosix is a live attenuated freeze-dried vaccine for the immunization of dogs against canine parvovirus (CPV) , canine distemper virus (CDV), Serovars of Leptospira: L. canicola and L.',
                'image' => 'vencosix.jpg'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Nobivac',
                'vaccinePrice' => '50000',
                'stock' => '50',
                'vaccineDetail' => 'Nobivac DP Plus is a veterinary vaccine used to protect dogs against two separate infections caused by canine distemper virus and canine parvovirus. Nobivac DP Plus contains the active substances live attenuated (weakened) canine distemper virus (CDV) and canine parvovirus (CPV).',
                'image' => 'nobivac.jpg'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Hexadog',
                'vaccinePrice' => '70000',
                'stock' => '50',
                'vaccineDetail' => 'It is a combination vaccine that protects the dog against 6 major viral and bacterial infections i.e Canine Parvovirus, Canine Distemper, Infectious Canine Hepatitis, Rabies, Leptospira canicola and Leptospira icterohaemorrhagiae).',
                'image' => 'hexadog.jpeg'
            ],
        ]);
        DB::table('vaccines')->insert([
            [
                'userID' => '3',
                'vaccineName' => 'Canine Distemper-Adenovirus',
                'vaccinePrice' => '90000',
                'stock' => '50',
                'vaccineDetail' => 'Canine adenovirus type 2 (CAV-2) is related to the hepatitis virus, canine adenovirus type 1 (CAV-1). CAV-2 is used in vaccines to provide protection against canine infectious hepatitis. CAV-2 is also one of the causes of infectious tracheobronchitis, also known as canine cough.',
                'image' => 'caninedistemperadenovirus.jpg'
            ],
        ]);

        DB::table('pet_cares')->insert([
            [
                'userID' => '4',
                'packageName' => 'One Day Package',
                'price' => '170000',
                'packageDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => 'one day.jpg'
            ],
        ]);
        DB::table('pet_cares')->insert([
            [
                'userID' => '4',
                'packageName' => 'Two Days Package',
                'price' => '270000',
                'packageDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => 'two days.jpg'
            ],
        ]);
        DB::table('pet_cares')->insert([
            [
                'userID' => '4',
                'packageName' => 'Three Days Package',
                'price' => '380000',
                'packageDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => 'three days.jpg'
            ],
        ]);
        DB::table('pet_cares')->insert([
            [
                'userID' => '4',
                'packageName' => 'One Week Package',
                'price' => '800000',
                'packageDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => 'one week.jpg'
            ],
        ]);
        DB::table('pet_cares')->insert([
            [
                'userID' => '4',
                'packageName' => 'One Month Package',
                'price' => '2000000',
                'packageDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => 'one month.jpg'
            ],
        ]);

        DB::table('groomings')->insert([
            [
                'userID' => '4',
                'groomingName' => 'First Package Happy PetShop',
                'price' => '70000',
                'groomingDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => 'one day.jpg'
            ],
        ]);
        DB::table('groomings')->insert([
            [
                'userID' => '4',
                'groomingName' => 'Second Package Happy PetShop',
                'price' => '80000',
                'groomingDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => '2days.jpg'
            ],
        ]);
        DB::table('groomings')->insert([
            [
                'userID' => '4',
                'groomingName' => 'Third Package Happy PetShop',
                'price' => '90000',
                'groomingDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => '3days.jpg'
            ],
        ]);
        DB::table('groomings')->insert([
            [
                'userID' => '4',
                'groomingName' => 'Fourth Package Happy PetShop',
                'price' => '90000',
                'groomingDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => '1week.png'
            ],
        ]);
        DB::table('groomings')->insert([
            [
                'userID' => '4',
                'groomingName' => 'Fifth Package Happy PetShop',
                'price' => '100000',
                'groomingDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => '2week.jpg'
            ],
        ]);
        DB::table('groomings')->insert([
            [
                'userID' => '4',
                'groomingName' => 'Sixth Package Happy PetShop',
                'price' => '110000',
                'groomingDetail' => 'Services include (but are not limited to) feeding, exercising, grooming, providing company, monitoring health, administering medications or other special care. Less commonly, pet sitters offer live-in care which can also include the service of house sitting and property maintenance.',
                'image' => '1 month.jpg'
            ],
        ]);
    }
}
