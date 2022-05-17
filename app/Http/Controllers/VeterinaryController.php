<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Auth;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Veterinary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class VeterinaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data_vetService = Service::all();
        return view('veterinary.dashboard', compact('data_vetService'));
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
        $data = Service::create($request->all());

        if ($request->hasFile('idCard', 'vetLicense')){
            $request->file('idCard', )->move('img/vetImage/idCard', $request->file('idCard', )->getClientOriginalName());
            $request->file('vetLicense')->move('img/vetImage/license', $request->file('vetLicense')->getClientOriginalName());
            $data->idCard = $request->file('idCard')->getClientOriginalName();
            $data->vetLicense = $request->file('vetLicense')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('vet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Veterinary  $veterinary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veterinary = User::find($id);

        if(Auth::user()->type == 'veterinary'){
            return view('veterinary.profile', compact('veterinary'));
        }else{
            return redirect()->route('veterinary.dashboard')
                ->with('error','Sorry, you cant access this data!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Veterinary  $veterinary
     * @return \Illuminate\Http\Response
     */
    public function edit(Veterinary $veterinary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Veterinary  $veterinary
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function updateVetService(Request $request, Service $veterinary)
    {
        $this->validate($request, ['idCard' => 'mimes:jpeg,png,jpg,gif,svg']);
        $this->validate($request, ['vetLicense' => 'mimes:jpeg,png,jpg,gif,svg']);

        $veterinary->update($request->all());

        if ($request->hasFile('idCard', 'vetLicense')){
            $request->file('idCard', )->move('img/vetImage/idCard', $request->file('idCard', )->getClientOriginalName());
            $request->file('vetLicense')->move('img/vetImage/license', $request->file('vetLicense')->getClientOriginalName());
            $veterinary->idCard = $request->file('idCard')->getClientOriginalName();
            $veterinary->vetLicense = $request->file('vetLicense')->getClientOriginalName();
            $veterinary->save();
        }

        dd($request->all());

//        if ($request->hasFile('idCard')){
//            $request->file('idCard')->move('img/vetImage/idCard', $request->file('idCard')->getClientOriginalName());
//            $veterinary->idCard = $request->file('idCard')->getClientOriginalName();
//            $veterinary->save();
//        }
//        if ($request->hasFile('vetLicense')){
//            $request->file('vetLicense')->move('img/vetImage/license', $request->file('vetLicense')->getClientOriginalName());
//            $veterinary->vetLicense = $request->file('vetLicense')->getClientOriginalName();
//            $veterinary->save();
//        }

        return redirect()->route('vet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Veterinary  $veterinary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veterinary $veterinary)
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
