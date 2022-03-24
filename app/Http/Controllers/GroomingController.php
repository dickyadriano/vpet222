<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $show = Grooming::where('userID', '=', Auth::user()->id)->get();
        return view('petShop.grooming', compact('show'),[
            "title" => "Grooming"
        ]);
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
        $grooming = Grooming::create($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/groomingImages/', $request->file('image')->getClientOriginalName());
            $grooming->image = $request->file('image')->getClientOriginalName();
            $grooming->save();
        }
        return redirect()->route('grooming.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grooming  $grooming
     * @return \Illuminate\Http\Response
     */
    public function show(Grooming $grooming)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grooming  $grooming
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Grooming $grooming)
    {
        return view('petShop.modal.editGrooming', compact('grooming'),[
            "title" => "Grooming"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grooming  $grooming
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Grooming $grooming)
    {
        $grooming->update($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/groomingImages/', $request->file('image')->getClientOriginalName());
            $grooming->image = $request->file('image')->getClientOriginalName();
            $grooming->save();
        }
        return redirect()->route('grooming.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grooming  $grooming
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Grooming $grooming)
    {
        Grooming::destroy($grooming->id);
        return redirect()->route('grooming.index');
    }
}
