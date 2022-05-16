<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VaccineController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $show = Vaccine::where('userID', '=', Auth::user()->id)->get();

        $vaccine_data = DB::table('vaccines')
            ->join('users', 'vaccines.userID', '=', 'users.id')
            ->select('users.*', 'vaccines.*')->get();

        if (Auth::user()->type == 'vetClinic'){
            return view('vetClinic.vaccine', compact('show'),[
                "title" => "Manage Vaccine"
            ]);
        }
        elseif (Auth::user()->type == 'customer'){
            return view('customer.marketplace.vaccine', compact('vaccine_data'));
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

        $data = Vaccine::create($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/vaccineImages/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('vaccine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Vaccine $vaccine)
    {
        return view('vetClinic.modal.editVaccine', compact('vaccine'),[
            "title" => "Manage Vaccine"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        $this->validate($request, ['image' => 'mimes:jpeg,png,jpg,gif,svg']);

        $vaccine->update($request->all());

        if ($request->hasFile('image')){
            $request->file('image')->move('img/vaccineImages/', $request->file('image')->getClientOriginalName());
            $vaccine->image = $request->file('image')->getClientOriginalName();
            $vaccine->save();
        }
        return redirect()->route('vaccine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Vaccine $vaccine)
    {
        Vaccine::destroy($vaccine->id);
        return redirect()->route('vaccine.index');
    }

    public function search(){
        $search_text = $_GET['query'];
        $vaccine_data = Vaccine::where('vaccineName','LIKE', '%'.$search_text.'%')
            ->join('users', 'vaccines.userID', '=', 'users.id')
            ->select('users.*', 'vaccines.*')->get();

        return view('customer.marketplace.vaccine', compact('vaccine_data', 'search_text'));
    }
}
