<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $show = Medicine::all();
        return view('vetClinic.medicine', compact('show'),[
            "title" => "Manage Medicine"
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
        return view('vetClinic.modal.editMedicine', compact('medicine'));
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
}
