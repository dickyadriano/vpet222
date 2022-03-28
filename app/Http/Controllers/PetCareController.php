<?php

namespace App\Http\Controllers;

use App\Models\PetCare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $show = PetCare::where('userID', '=', Auth::user()->id)->get();
        return view('petShop.petCares', compact('show'));
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
        $petcare = PetCare::create($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/careImages/', $request->file('image')->getClientOriginalName());
            $petcare->image = $request->file('image')->getClientOriginalName();
            $petcare->save();
        }
        return redirect()->route('petCare.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function show(PetCare $petCare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(PetCare $petCare)
    {
        return view('petShop.modal.editCare', compact('petCare'),[
            "title" => "Edit Care"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PetCare $petCare)
    {
        $petCare->update($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/careImages/', $request->file('image')->getClientOriginalName());
            $petCare->image = $request->file('image')->getClientOriginalName();
            $petCare->save();
        }
        return redirect()->route('petCare.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PetCare $petCare)
    {
        PetCare::destroy($petCare->id);
        return redirect()->route('petCare.index');
    }
}
