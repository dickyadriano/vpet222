<?php

namespace App\Http\Controllers;

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
        return view('welcome');
    }

    public function handleAdmin(){
        return view('admin.dashboard');
    }

    public function handleCustomer(){
        return view('customer.dashboard');
    }

    public function handlePetShop(){
        return view('petShop.dashboard');
    }

    public function handleVetClinic(){
        return view('vetClinic.dashboard');
    }

    public function handleVeterinary(){
        return view('veterinary.dashboard');
    }
}
