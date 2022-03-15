<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\VetClinic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class VetClinicController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VetClinic  $vetClinic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vetClinic = User::find($id);

        if(Auth::user()->type == 'vetClinic'){
            return view('vetClinic.profile', compact('vetClinic'), [
                "title" => "Vet Clinic Dashboard"
            ]);
        }else{
            return redirect()->route('vetClinic.dashboard')
                ->with('error','Sorry, you cant access this data!');
        }
    }

    public function showMedicine()
    {
        return view('vetClinic.medicine', [
            "title" => "Manage Medicine"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VetClinic  $vetClinic
     * @return \Illuminate\Http\Response
     */
    public function edit(VetClinic $vetClinic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VetClinic  $vetClinic
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
     * @param  \App\Models\VetClinic  $vetClinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(VetClinic $vetClinic)
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
