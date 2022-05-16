<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Auth;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\PetShop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class PetShopController extends Controller
{
    public function __construct()
    {
        $this->middleware(['petShop', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $data = Product::create($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/productImage/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('petShop-product');
    }

    public function productData($id){
        $data = Product::find($id);
        return view('petShop.modal.editProduct', compact('data'));
    }

    public function productDelete($id){
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('petShop-product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetShop  $petShop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $petShop = User::find($id);

        if(Auth::user()->type == 'petShop'){
            return view('petShop.profile',
                compact('petShop'), [
                    "title" => "Pet Shop Profile"
                ]);
        }else{
            return redirect()->route('petShop.dashboard')
                ->with('error','Sorry, you cant access this data!');
        }
    }

    public function showProduct()
    {
        $data = Product::where('userID', '=', Auth::user()->id)->get();
        return view('petShop.product', compact('data'),[
            "title" => "Manage Product"
        ]);
    }

//    public function showEditProduct($id)
//    {
//        $petShop = Product::find($id);
//        return view('petShop.modal.editProduct', compact('petShop'),[
//            "title" => "Edit Product"
//        ]);
//    }

    public function showService()
    {
//        $petShop = User::find($id);
        $data = Product::all();
        return view('petShop.product', compact('data'),[
            "title" => "Manage Product"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetShop  $petShop
     * @return \Illuminate\Http\Response
     */
    public function edit(PetShop $petShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetShop  $petShop
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
     * @param  \App\Models\PetShop  $petShop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $petShop)
    {
        Product::destroy($petShop->id);
        return redirect('/users')->with('success', 'Success delete user!!!');
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
