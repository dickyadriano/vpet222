<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        Review::create($request->all());

        if ($request->orderType == 'service'){
            DB::table('orders')->where('orders.serviceID', '=', $request['serviceID'])
                ->update(['orderStatus' => 'Reviewed']);
        }
        elseif ($request->orderType == 'product'){
            DB::table('orders')->where('orders.productID', '=', $request['productID'])
                ->update(['orderStatus' => 'Reviewed']);
        }
        elseif ($request->orderType == 'medicine'){
            DB::table('orders')->where('orders.medicineID', '=', $request['medicineID'])
                ->update(['orderStatus' => 'Reviewed']);
        }
        elseif ($request->orderType == 'grooming'){
            DB::table('orders')->where('orders.groomingID', '=', $request['groomingID'])
                ->update(['orderStatus' => 'Reviewed']);
        }
        elseif ($request->orderType == 'petCare'){
            DB::table('orders')->where('orders.petCareID', '=', $request['petCareID'])
                ->update(['orderStatus' => 'Reviewed']);
        }
        elseif ($request->orderType == 'vaccine'){
            DB::table('orders')->where('orders.vaccineID', '=', $request['vaccineID'])
                ->update(['orderStatus' => 'Reviewed']);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
