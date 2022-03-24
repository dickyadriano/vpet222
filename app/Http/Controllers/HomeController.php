<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Product;
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
        return view('customer.dashboard', compact('data_product'), [
            "title" => "Customer Dashboard"
        ]);
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
        return view('veterinary.dashboard', [
            "title" => "Veterinary Dashboard"
        ]);
    }
}
