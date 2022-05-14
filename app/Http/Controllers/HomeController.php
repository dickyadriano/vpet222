<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Medicine;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//        $this->middleware('customer')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
//        Message::dispatch('lorem ipsum dolor sit amet');
        if (Auth::user()->type == 'customer')
            return view('welcome');
        else
            return redirect()->back();
    }

    public function direction()
    {
//        $role = Auth::user()->type;
//        $checkrole = explode(',', $role);
//        if (in_array('admin', $checkrole)) {
//            return redirect('dog/indexadmin');
//        }
//        else if () {
//            return redirect('pet/index');
//        }
        if (Auth::user()->type == 'customer'){
            return redirect('/welcome');
        }
        elseif (Auth::user()->type == 'admin'){
            return redirect('/admin/dashboard');
        }
        elseif (Auth::user()->type == 'petShop'){
            return redirect('/petShop/dashboard');
        }
        elseif (Auth::user()->type == 'vetClinic'){
            return redirect('/vetClinic/dashboard');
        }
        elseif (Auth::user()->type == 'veterinary'){
            return redirect('/veterinary/dashboard');
        }
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
