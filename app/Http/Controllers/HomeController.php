<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Medicine;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        Message::dispatch('lorem ipsum dolor sit amet');
        return view('welcome', [
            "title" => "Welcome "
        ]);
    }

    public function handleAdmin(){
        return view('admin.dashboard', [
            "title" => "Admin Dashboard"
        ]);
    }

    public function handleCustomer(){
        $data_product = Product::all();
        return view('customer.dashboard', compact('data_product'));
    }

    public function handlePetShop(){
        return view('petShop.dashboard', [
            "title" => "Pet Shop Dashboard"
        ]);
    }

    public function handleVetClinic(){
        return view('vetClinic.dashboard', [
            "title" => "Vet Clinic Dashboard"
        ]);
    }

    public function handleVeterinary(){
        $data_vetService = Service::all();
        return view('veterinary.dashboard', compact('data_vetService'), [
            "title" => "Veterinary Dashboard"
        ]);
    }
}
