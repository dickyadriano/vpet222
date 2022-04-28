<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Cart;
use App\Models\Medicine;
use App\Models\Product;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Customer;
use App\Models\User;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        Message::dispatch('lorem ipsum dolor sit amet');
        $data_product = Product::all();
        $data_cart = Cart::all();
        $userId = Auth::user()->id;
        $productInCart_data = DB::table('carts')
            ->join('products', 'carts.productID', '=', 'products.id')
            ->where('carts.userID', '=', $userId)
            ->where('carts.orderType', '=', 'product')
            ->select('products.*', 'carts.*')->get();

        return view('customer.dashboard', compact('data_product', 'data_cart', 'productInCart_data'));
    }
//
//    public function index()
//    {
//        $project = Customer::query();
//        if (request('term')) {
//            $project->where('name', 'Like', '%' . request('term') . '%');
//        }
//
//        return $project->orderBy('id', 'DESC')->paginate(10);
//    }

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::find($id);

        if(Auth::user()->id = $customer){
            return view('customer.profile', compact('customer'), [
                "title" => "customer-profile",
            ]);
        }else {
            return redirect()->route('customer.index')
                ->with('error', 'Sorry, you cant access this page!');
        }
    }

    public function showLocation()
    {
        return view('customer.location', [
            "title" => "Location",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function profilePicUpdate(Request $request)
    {
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().".".$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(800,800)->save(public_path('/argon/argon/img/theme/'.$filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back()->with('massage', 'Profile Picture Successfully Update!!!');
    }
}
