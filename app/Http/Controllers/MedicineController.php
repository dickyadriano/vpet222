<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\medicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    public function __construct()
    {
        $this->middleware('vetClinic')->only('edit');
        $this->middleware('customer')->only('search');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $show = Medicine::where('userID', '=', Auth::user()->id)->get();

        $data_medicine = Medicine::all();

        $data_users = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.userID')
            ->join('services', 'orders.serviceID', '=', 'services.id')
            ->where('services.userID', '=', Auth::user()->id)
            ->where('orders.orderStatus', '!=', 'Completed')
            ->select('users.id', 'users.name')
            ->get();

        $medicineInCart_data = DB::table('carts')
            ->join('medicines', 'carts.medicineID', '=', 'medicines.id')
            ->where('carts.userID', '=', Auth::user()->id)
            ->where('carts.orderType', '=', 'medicine')
            ->select('medicines.*', 'carts.*')->get();

        if (Auth::user()->type == 'vetClinic'){
            return view('vetClinic.medicine', compact('show'),[
                "title" => "Manage Medicine"
            ]);
        }
        elseif (Auth::user()->type == 'customer'){
            return view('customer.marketplace.medicine', compact('medicineInCart_data', 'data_medicine'));
        }
        elseif (Auth::user()->type == 'veterinary'){
            return view('veterinary.medicine', compact('medicineInCart_data','data_medicine', 'data_users'));
        }
        else{
            return redirect()->back();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['image' => 'required|mimes:jpeg,png,jpg,gif,svg']);

        $data = Medicine::create($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/medicineImage/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('medicine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(medicine $medicine)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        return view('vetClinic.modal.editMedicine', compact('medicine'),[
            "title" => "Manage Medicine"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Medicine $medicine)
    {
        $this->validate($request, ['image' => 'mimes:jpeg,png,jpg,gif,svg']);

        $medicine->update($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/medicineImage/', $request->file('image')->getClientOriginalName());
            $medicine->image = $request->file('image')->getClientOriginalName();
            $medicine->save();
        }
        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(medicine $medicine)
    {
        Medicine::destroy($medicine->id);
        return redirect()->route('medicine.index');
    }

    function cartItem()
    {
        $userId = Auth::user()->id;
        return Cart::select('*')
            ->where('userID', '=', $userId)
            ->where('orderType', '=', 'medicine')
            ->count();
    }

    public function search(){
        $search_text = $_GET['query'];
        $data_medicine = Medicine::where('medicineName','LIKE', '%'.$search_text.'%')->get();

        $data_cart = Cart::all();
        $medicineInCart_data = DB::table('carts')
            ->join('medicines', 'carts.medicineID', '=', 'medicines.id')
            ->where('carts.userID', '=', Auth::user()->id)
            ->where('carts.orderType', '=', 'medicine')
            ->select('medicines.*', 'carts.*')->get();

//        return redirect()->route('customer.index', compact('data_product', 'productInCart_data', 'data_cart'));
        return view('customer.marketplace.medicine', compact('data_medicine', 'medicineInCart_data', 'data_cart','search_text'));
    }
}
