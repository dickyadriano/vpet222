<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Medicine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('petShop')->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
//        $data_product = Product::all();
//
//        $data_cart = Cart::all();
//
//        $userId = Auth::user()->id;
//        $products_data = DB::table('carts')
//            ->join('products', 'carts.productID', '=', 'products.id')
//            ->join('users', 'carts.userID', '=', $userId)
//            ->select('products.*', 'carts.*')->get();
//
//        return view('customer.dashboard', compact('data_product', 'data_cart', 'products_data'));
        return redirect()->back();
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    function cartItem()
    {
        $userId = Auth::user()->id;
        return DB::table('carts')
            ->where('carts.orderType', '=', 'product')
            ->where('carts.userID', '=', $userId)
            ->count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('petShop.modal.editProduct', compact('product'),[
            "title" => "Edit Product"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, ['image' => 'mimes:jpeg,png,jpg,gif,svg']);

        $product->update($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/productImage/', $request->file('image')->getClientOriginalName());
            $product->image = $request->file('image')->getClientOriginalName();
            $product->save();
        }
        return redirect()->route('petShop-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('petShop-product');
    }

    public function search(){
        $search_text = $_GET['query'];
        $data_product = Product::where('productName','LIKE', '%'.$search_text.'%')->get();

        $data_cart = Cart::all();
        $userId = Auth::user()->id;
        $productInCart_data = DB::table('carts')
            ->join('products', 'carts.productID', '=', 'products.id')
            ->where('carts.userID', '=', $userId)
            ->select('products.*', 'carts.*')->get();

//        return redirect()->route('customer.index', compact('data_product', 'productInCart_data', 'data_cart'));
        return view('customer.dashboard', compact('data_product', 'productInCart_data', 'data_cart','search_text'));
    }
}
