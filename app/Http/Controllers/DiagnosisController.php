<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $resultDiagnosis = DB::table('diagnoses')
            ->where('userID', '=', Auth::user()->id)
            ->get();
        return view('customer.diagnosis', compact('resultDiagnosis'));
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
        if (!empty($request->input('symptom'))){
            $checkBox = join(', ',$request->input('symptom'));
            $userId = $request->userID;
            $petsType = $request->petsType;
            if ($petsType == 'dog') {
                if ($checkBox == 'fever, diarrhea, vomit, limp, noAppetite, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, itchy' || $checkBox == 'fever, hairLoss' || $checkBox == 'fever, wateryEyes' ||
                    $checkBox == 'diarrhea, itchy' || $checkBox == 'diarrhea, hairLoss' || $checkBox == 'diarrhea, wateryEyes' ||
                    $checkBox == 'vomit, itchy' || $checkBox == 'vomit, hairLoss' || $checkBox == 'vomit, wateryEyes' ||
                    $checkBox == 'limp, itchy' || $checkBox == 'limp, hairLoss' || $checkBox == 'limp, wateryEyes' ||
                    $checkBox == 'noAppetite, itchy' || $checkBox == 'noAppetite, hairLoss' || $checkBox == 'noAppetite, wateryEyes' ||
                    $checkBox == 'itchy, wateryEyes' || $checkBox == 'fever, diarrhea, itchy' ||
                    $checkBox == 'fever, diarrhea, hairLoss' || $checkBox == 'fever, diarrhea, wateryEyes' ||
                    $checkBox == 'fever, vomit, itchy' || $checkBox == 'fever, vomit, hairLoss' ||
                    $checkBox == 'fever, vomit, wateryEyes' || $checkBox == 'fever, limp, itchy' ||
                    $checkBox == 'fever, limp, hairLoss' || $checkBox == 'fever, limp, wateryEyes' ||
                    $checkBox == 'fever, noAppetite, itchy' || $checkBox == 'fever, noAppetite, hairLoss' ||
                    $checkBox == 'fever, noAppetite, wateryEyes' || $checkBox == 'fever, itchy, hairLoss' ||
                    $checkBox == 'fever, itchy, wateryEyes' || $checkBox == 'fever, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, itchy' || $checkBox == 'diarrhea, vomit, hairLoss' ||
                    $checkBox == 'diarrhea, vomit, wateryEyes' || $checkBox == 'diarrhea, limp, itchy' ||
                    $checkBox == 'diarrhea, limp, hairLoss' || $checkBox == 'diarrhea, limp, wateryEyes' ||
                    $checkBox == 'diarrhea, noAppetite, itchy' || $checkBox == 'diarrhea, noAppetite, hairLoss' ||
                    $checkBox == 'diarrhea, noAppetite, wateryEyes' || $checkBox == 'diarrhea, itchy, hairLoss' ||
                    $checkBox == 'diarrhea, itchy, wateryEyes' || $checkBox == 'diarrhea, hairLoss, wateryEyes' ||
                    $checkBox == 'vomit, limp, itchy' || $checkBox == 'vomit, limp, hairLoss' ||
                    $checkBox == 'vomit, limp, wateryEyes' || $checkBox == 'vomit, noAppetite, itchy' ||
                    $checkBox == 'vomit, noAppetite, hairLoss' || $checkBox == 'vomit, noAppetite, wateryEyes' ||
                    $checkBox == 'vomit, itchy, hairLoss' || $checkBox == 'vomit, itchy, wateryEyes' ||
                    $checkBox == 'vomit, hairLoss, wateryEyes' || $checkBox == 'limp, noAppetite, itchy' ||
                    $checkBox == 'limp, noAppetite, hairLoss' || $checkBox == 'limp, noAppetite, wateryEyes' ||
                    $checkBox == 'limp, itchy, hairLoss' || $checkBox == 'limp, itchy, wateryEyes' ||
                    $checkBox == 'limp, hairLoss, wateryEyes' || $checkBox == 'noAppetite, itchy, hairLoss' ||
                    $checkBox == 'noAppetite, itchy, wateryEyes' || $checkBox == 'noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'itchy, hairLoss, wateryEyes' || $checkBox == 'fever, diarrhea, vomit, itchy' ||
                    $checkBox == 'fever, diarrhea, vomit, hairLoss' || $checkBox == 'fever, diarrhea, vomit, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, limp, itchy' || $checkBox == 'fever, diarrhea, limp, hairLoss' ||
                    $checkBox == 'fever, diarrhea, limp, wateryEyes' || $checkBox == 'fever, diarrhea, noAppetite, itchy' ||
                    $checkBox == 'fever, diarrhea, noAppetite, hairLoss' || $checkBox == 'fever, diarrhea, noAppetite, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, itchy, hairLoss' || $checkBox == 'fever, diarrhea, itchy, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, hairLoss, wateryEyes' || $checkBox == 'fever, vomit, limp, itchy' ||
                    $checkBox == 'fever, vomit, limp, hairLoss' || $checkBox == 'fever, vomit, limp, wateryEyes' ||
                    $checkBox == 'fever, vomit, noAppetite, itchy' || $checkBox == 'fever, vomit, noAppetite, hairLoss' ||
                    $checkBox == 'fever, vomit, noAppetite, wateryEyes' || $checkBox == 'fever, vomit, itchy, hairLoss' ||
                    $checkBox == 'fever, vomit, itchy, wateryEyes' || $checkBox == 'fever, vomit, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, limp, noAppetite, itchy' || $checkBox == 'fever, limp, noAppetite, hairLoss' ||
                    $checkBox == 'fever, limp, noAppetite, wateryEyes' || $checkBox == 'fever, limp, itchy, hairLoss' ||
                    $checkBox == 'fever, limp, itchy, wateryEyes' || $checkBox == 'fever, limp, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, noAppetite, itchy, hairLoss' || $checkBox == 'fever, noAppetite, itchy, wateryEyes' ||
                    $checkBox == 'fever, noAppetite, hairLoss, wateryEyes' || $checkBox == 'fever, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, limp, itchy' || $checkBox == 'diarrhea, vomit, limp, hairLoss' ||
                    $checkBox == 'diarrhea, vomit, limp, wateryEyes' || $checkBox == 'diarrhea, vomit, noAppetite, itchy' ||
                    $checkBox == 'diarrhea, vomit, noAppetite, hairLoss' || $checkBox == 'diarrhea, vomit, noAppetite, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, itchy, hairLoss' || $checkBox == 'diarrhea, vomit, itchy, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, hairLoss, wateryEyes' || $checkBox == 'diarrhea, limp, noAppetite, itchy' ||
                    $checkBox == 'diarrhea, limp, noAppetite, hairLoss' || $checkBox == 'diarrhea, limp, noAppetite, wateryEyes' ||
                    $checkBox == 'diarrhea, limp, itchy, hairLoss' || $checkBox == 'diarrhea, limp, itchy, wateryEyes' ||
                    $checkBox == 'diarrhea, limp, hairLoss, wateryEyes' || $checkBox == 'diarrhea, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'diarrhea, noAppetite, itchy, wateryEyes' || $checkBox == 'diarrhea, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, itchy, hairLoss, wateryEyes' || $checkBox == 'vomit, limp, noAppetite, itchy' ||
                    $checkBox == 'vomit, limp, noAppetite, hairLoss' || $checkBox == 'vomit, limp, noAppetite, wateryEyes' ||
                    $checkBox == 'vomit, limp, itchy, hairLoss' || $checkBox == 'vomit, limp, itchy, wateryEyes' ||
                    $checkBox == 'vomit, limp, hairLoss, wateryEyes' || $checkBox == 'vomit, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'vomit, noAppetite, itchy, wateryEyes' || $checkBox == 'vomit, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'vomit, itchy, hairLoss, wateryEyes' || $checkBox == 'limp, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'limp, noAppetite, itchy, wateryEyes' || $checkBox == 'limp, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'limp, itchy, hairLoss, wateryEyes' || $checkBox == 'noAppetite, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, vomit, limp, itchy' ||
                    $checkBox == 'fever, diarrhea, vomit, limp, hairLoss' ||
                    $checkBox == 'fever, diarrhea, vomit, limp, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, vomit, noAppetite, itchy' ||
                    $checkBox == 'fever, diarrhea, vomit, noAppetite, hairLoss' ||
                    $checkBox == 'fever, diarrhea, vomit, noAppetite, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, vomit, itchy, hairLoss' ||
                    $checkBox == 'fever, diarrhea, vomit, itchy, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, vomit, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, limp, noAppetite, itchy' ||
                    $checkBox == 'fever, diarrhea, limp, noAppetite, hairLoss' ||
                    $checkBox == 'fever, diarrhea, limp, noAppetite, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, limp, itchy, hairLoss' ||
                    $checkBox == 'fever, diarrhea, limp, itchy, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, limp, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'fever, diarrhea, noAppetite, itchy, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, diarrhea, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, vomit, limp, noAppetite, itchy' ||
                    $checkBox == 'fever, vomit, limp, noAppetite, hairLoss' ||
                    $checkBox == 'fever, vomit, limp, noAppetite, wateryEyes' ||
                    $checkBox == 'fever, vomit, limp, itchy, hairLoss' ||
                    $checkBox == 'fever, vomit, limp, itchy, wateryEyes' ||
                    $checkBox == 'fever, vomit, limp, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, vomit, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'fever, vomit, noAppetite, itchy, wateryEyes' ||
                    $checkBox == 'fever, vomit, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, vomit, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, limp, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'fever, limp, noAppetite, itchy, wateryEyes' ||
                    $checkBox == 'fever, limp, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, limp, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'fever, noAppetite, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, limp, noAppetite, itchy' ||
                    $checkBox == 'diarrhea, vomit, limp, noAppetite, hairLoss' ||
                    $checkBox == 'diarrhea, vomit, limp, noAppetite, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, limp, itchy, hairLoss' ||
                    $checkBox == 'diarrhea, vomit, limp, itchy, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, limp, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'diarrhea, vomit, noAppetite, itchy, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, vomit, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, limp, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'diarrhea, limp, noAppetite, itchy, wateryEyes' ||
                    $checkBox == 'diarrhea, limp, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, limp, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'diarrhea, noAppetite, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'vomit, limp, noAppetite, itchy, hairLoss' ||
                    $checkBox == 'vomit, limp, noAppetite, itchy, wateryEyes' ||
                    $checkBox == 'vomit, limp, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox == 'vomit, limp, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'vomit, noAppetite, itchy, hairLoss, wateryEyes' ||
                    $checkBox == 'limp, noAppetite, itchy, hairLoss, wateryEyes') {

                    return redirect()->route('diagnosis.index')->with('error','There are no diagnosis of this symptom. Please call/order the vet!');
                }
                else{
                    DB::table('diagnoses')->insert([
                        'symptom' => $checkBox,
                        'userID' => $userId,
                        'petsType' => $petsType,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]);
                    return redirect()->route('diagnosis.index')->with('sucess','REMEMBER !!! NOT 100% CORRECT');
                }
            }
            elseif ($petsType == 'cat') {
                if ($checkBox ==  'fever, diarrhea, vomit, flu, limp, noAppetite, itchy, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'fever, itchy' || $checkBox ==  'fever, hairLoss' || $checkBox ==  'fever, wateryEyes' ||
                    $checkBox ==  'diarrhea, itchy' || $checkBox ==  'diarrhea, hairLoss' || $checkBox ==  'diarrhea, wateryEyes' ||
                    $checkBox ==  'vomit, itchy' || $checkBox ==  'vomit, hairLoss' || $checkBox ==  'vomit, wateryEyes' ||
                    $checkBox ==  'limp, itchy' || $checkBox ==  'limp, hairLoss' || $checkBox ==  'limp, wateryEyes' ||
                    $checkBox ==  'noAppetite, itchy' || $checkBox ==  'noAppetite, hairLoss' || $checkBox ==  'noAppetite, wateryEyes' ||
                    $checkBox ==  'itchy, wateryEyes' || $checkBox ==  'fever, thrush' || $checkBox ==  'diarrhea, thrush' ||
                    $checkBox ==  'fever, diarrhea, flu' || $checkBox ==  'fever, diarrhea, itchy' ||
                    $checkBox ==  'fever, diarrhea, hairLoss' || $checkBox ==  'fever, diarrhea, thrush' ||
                    $checkBox ==  'fever, diarrhea, wateryEyes' || $checkBox ==  'fever, vomit, flu' ||
                    $checkBox ==  'fever, vomit, itchy' || $checkBox ==  'fever, vomit, hairLoss' ||
                    $checkBox ==  'fever, vomit, thrush' || $checkBox ==  'fever, vomit, wateryEyes' ||
                    $checkBox ==  'fever, flu, itchy' || $checkBox ==  'fever, flu, hairLoss' ||
                    $checkBox ==  'fever, limp, itchy' || $checkBox ==  'fever, limp, hairLoss' ||
                    $checkBox ==  'fever, noAppetite, itchy' || $checkBox ==  'fever, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, itchy, hairLoss' || $checkBox ==  'fever, itchy, thrush' ||
                    $checkBox ==  'fever, itchy, wateryEyes' || $checkBox ==  'fever, hairLoss, thrush' ||
                    $checkBox ==  'fever, hairLoss, wateryEyes' || $checkBox ==  'fever, thrush, wateryEyes' ||
                    $checkBox ==  'diarrhea, vomit, flu' || $checkBox ==  'diarrhea, vomit, itchy' ||
                    $checkBox ==  'diarrhea, vomit, hairLoss' || $checkBox ==  'diarrhea, vomit, thrush' ||
                    $checkBox ==  'diarrhea, vomit, wateryEyes' || $checkBox ==  'diarrhea, flu, itchy' ||
                    $checkBox ==  'diarrhea, flu, hairLoss' || $checkBox ==  'diarrhea, flu, thrush' ||
                    $checkBox ==  'diarrhea, flu, wateryEyes' || $checkBox ==  'diarrhea, limp, itchy' ||
                    $checkBox ==  'diarrhea, limp, hairLoss' || $checkBox ==  'diarrhea, limp, thrush' ||
                    $checkBox ==  'diarrhea, limp, wateryEyes' || $checkBox ==  'diarrhea, noAppetite, itchy' ||
                    $checkBox ==  'diarrhea, noAppetite, hairLoss' || $checkBox ==  'diarrhea, noAppetite, thrush' ||
                    $checkBox ==  'diarrhea, noAppetite, wateryEyes' || $checkBox ==  'diarrhea, itchy, hairLoss' ||
                    $checkBox ==  'diarrhea, itchy, thrush' || $checkBox ==  'diarrhea, itchy, wateryEyes' ||
                    $checkBox ==  'diarrhea, hairLoss, thrush' || $checkBox ==  'diarrhea, hairLoss, wateryEyes' ||
                    $checkBox ==  'diarrhea, thrush, wateryEyes' || $checkBox ==  'vomit, flu, itchy' ||
                    $checkBox ==  'vomit, flu, hairLoss' || $checkBox ==  'vomit, flu, thrush' ||
                    $checkBox ==  'vomit, flu, wateryEyes' || $checkBox ==  'vomit, limp, itchy' ||
                    $checkBox ==  'vomit, limp, hairLoss' || $checkBox ==  'vomit, limp, thrush' ||
                    $checkBox ==  'vomit, limp, wateryEyes' || $checkBox ==  'vomit, noAppetite, itchy' ||
                    $checkBox ==  'vomit, noAppetite, hairLoss' || $checkBox ==  'vomit, noAppetite, thrush' ||
                    $checkBox ==  'vomit, noAppetite, wateryEyes' || $checkBox ==  'vomit, itchy, hairLoss' ||
                    $checkBox ==  'vomit, itchy, thrush' || $checkBox ==  'vomit, itchy, wateryEyes' ||
                    $checkBox ==  'vomit, hairLoss, thrush' || $checkBox ==  'vomit, hairLoss, wateryEyes' ||
                    $checkBox ==  'vomit, thrush, wateryEyes' || $checkBox ==  'flu, limp, itchy' ||
                    $checkBox ==  'flu, limp, hairLoss' || $checkBox ==  'flu, noAppetite, itchy' ||
                    $checkBox ==  'flu, noAppetite, hairLoss' || $checkBox ==  'flu, itchy, hairLoss' ||
                    $checkBox ==  'flu, itchy, thrush' || $checkBox ==  'flu, itchy, wateryEyes' ||
                    $checkBox ==  'flu, hairLoss, thrush' || $checkBox ==  'flu, hairLoss, wateryEyes' ||
                    $checkBox ==  'flu, thrush, wateryEyes' || $checkBox ==  'limp, noAppetite, itchy' ||
                    $checkBox ==  'limp, noAppetite, hairLoss' || $checkBox ==  'limp, itchy, hairLoss' ||
                    $checkBox ==  'limp, itchy, thrush' || $checkBox ==  'limp, itchy, wateryEyes' ||
                    $checkBox ==  'limp, hairLoss, thrush' || $checkBox ==  'limp, hairLoss, wateryEyes' ||
                    $checkBox ==  'limp, thrush, wateryEyes' || $checkBox ==  'noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'noAppetite, itchy, thrush' || $checkBox ==  'noAppetite, itchy, wateryEyes' ||
                    $checkBox ==  'noAppetite, hairLoss, thrush' || $checkBox ==  'noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'noAppetite, thrush, wateryEyes' || $checkBox ==  'itchy, hairLoss, thrush' ||
                    $checkBox ==  'itchy, hairLoss, wateryEyes' || $checkBox ==  'itchy, thrush, wateryEyes' ||
                    $checkBox ==  'hairLoss, thrush, wateryEyes' || $checkBox ==  'fever, diarrhea, vomit, flu' ||
                    $checkBox ==  'fever, diarrhea, vomit, itchy' || $checkBox ==  'fever, diarrhea, vomit, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, vomit, thrush' || $checkBox ==  'fever, diarrhea, vomit, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, flu, limp' || $checkBox ==  'fever, diarrhea, flu, noAppetite' ||
                    $checkBox ==  'fever, diarrhea, flu, itchy' || $checkBox ==  'fever, diarrhea, flu, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, flu, thrush' || $checkBox ==  'fever, diarrhea, flu, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, limp, noAppetite' || $checkBox ==  'fever, diarrhea, limp, itchy' ||
                    $checkBox ==  'fever, diarrhea, limp, hairLoss' || $checkBox ==  'fever, diarrhea, limp, thrush' ||
                    $checkBox ==  'fever, diarrhea, limp, wateryEyes' || $checkBox ==  'fever, diarrhea, noAppetite, itchy' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, hairLoss' || $checkBox ==  'fever, diarrhea, noAppetite, thrush' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, wateryEyes' || $checkBox ==  'fever, diarrhea, itchy, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, itchy, thrush' || $checkBox ==  'fever, diarrhea, itchy, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, hairLoss, thrush' || $checkBox ==  'fever, diarrhea, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, thrush, wateryEyes' || $checkBox ==  'fever, vomit, flu, limp' ||
                    $checkBox ==  'fever, vomit, flu, noAppetite' || $checkBox ==  'fever, vomit, flu, itchy' ||
                    $checkBox ==  'fever, vomit, flu, hairLoss' || $checkBox ==  'fever, vomit, flu, thrush' ||
                    $checkBox ==  'fever, vomit, flu, wateryEyes' || $checkBox ==  'fever, vomit, limp, noAppetite' ||
                    $checkBox ==  'fever, vomit, limp, itchy' || $checkBox ==  'fever, vomit, limp, hairLoss' ||
                    $checkBox ==  'fever, vomit, limp, thrush' || $checkBox ==  'fever, vomit, limp, wateryEyes' ||
                    $checkBox ==  'fever, vomit, noAppetite, itchy' || $checkBox ==  'fever, vomit, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, vomit, noAppetite, thrush' || $checkBox ==  'fever, vomit, noAppetite, wateryEyes' ||
                    $checkBox ==  'fever, vomit, itchy, hairLoss' || $checkBox ==  'fever, vomit, itchy, thrush' ||
                    $checkBox ==  'fever, vomit, itchy, wateryEyes' || $checkBox ==  'fever, vomit, hairLoss, thrush' ||
                    $checkBox ==  'fever, vomit, hairLoss, wateryEyes' || $checkBox ==  'fever, vomit, thrush, wateryEyes' ||
                    $checkBox ==  'fever, flu, limp, itchy' || $checkBox ==  'fever, flu, limp, hairLoss' ||
                    $checkBox ==  'fever, flu, noAppetite, itchy' || $checkBox ==  'fever, flu, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, flu, itchy, hairLoss' || $checkBox ==  'fever, flu, itchy, thrush' ||
                    $checkBox ==  'fever, flu, itchy, wateryEyes' || $checkBox ==  'fever, flu, hairLoss, thrush' ||
                    $checkBox ==  'fever, flu, hairLoss, wateryEyes' || $checkBox ==  'fever, flu, thrush, wateryEyes' ||
                    $checkBox ==  'fever, limp, noAppetite, itchy' || $checkBox ==  'fever, limp, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, limp, itchy, hairLoss' || $checkBox ==  'fever, limp, itchy, thrush' ||
                    $checkBox ==  'fever, limp, itchy, wateryEyes' || $checkBox ==  'fever, limp, hairLoss, thrush' ||
                    $checkBox ==  'fever, limp, hairLoss, wateryEyes' || $checkBox ==  'fever, limp, thrush, wateryEyes' ||
                    $checkBox ==  'fever, noAppetite, itchy, hairLoss' || $checkBox ==  'fever, noAppetite, itchy, thrush' ||
                    $checkBox ==  'fever, noAppetite, itchy, wateryEyes' || $checkBox ==  'fever, noAppetite, hairLoss, thrush' ||
                    $checkBox ==  'fever, noAppetite, hairLoss, wateryEyes' || $checkBox ==  'fever, noAppetite, thrush, wateryEyes' ||
                    $checkBox ==  'fever, itchy, hairLoss, thrush' || $checkBox ==  'fever, itchy, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, itchy, thrush, wateryEyes' || $checkBox ==  'fever, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'diarrhea, vomit, flu, limp' || $checkBox ==  'diarrhea, vomit, flu, noAppetite' ||
                    $checkBox ==  'diarrhea, vomit, flu, itchy' || $checkBox ==  'diarrhea, vomit, flu, hairLoss' ||
                    $checkBox ==  'diarrhea, vomit, flu, thrush' || $checkBox ==  'diarrhea, vomit, flu, wateryEyes' ||
                    $checkBox ==  'diarrhea, vomit, limp, noAppetite' || $checkBox ==  'diarrhea, vomit, limp, itchy' ||
                    $checkBox ==  'diarrhea, vomit, limp, hairLoss' || $checkBox ==  'diarrhea, vomit, limp, thrush' ||
                    $checkBox ==  'diarrhea, vomit, limp, wateryEyes' || $checkBox ==  'diarrhea, vomit, noAppetite, itchy' ||
                    $checkBox ==  'diarrhea, vomit, noAppetite, hairLoss' || $checkBox ==  'diarrhea, vomit, noAppetite, thrush' ||
                    $checkBox ==  'diarrhea, vomit, noAppetite, wateryEyes' || $checkBox ==  'diarrhea, vomit, itchy, hairLoss' ||
                    $checkBox ==  'diarrhea, vomit, itchy, thrush' || $checkBox ==  'diarrhea, vomit, itchy, wateryEyes' ||
                    $checkBox ==  'diarrhea, vomit, hairLoss, thrush' || $checkBox ==  'diarrhea, vomit, hairLoss, wateryEyes' ||
                    $checkBox ==  'diarrhea, vomit, thrush, wateryEyes' || $checkBox ==  'diarrhea, flu, limp, noAppetite' ||
                    $checkBox ==  'diarrhea, flu, limp, itchy' || $checkBox ==  'diarrhea, flu, limp, hairLoss' ||
                    $checkBox ==  'diarrhea, flu, limp, thrush' || $checkBox ==  'diarrhea, flu, limp, wateryEyes' ||
                    $checkBox ==  'diarrhea, flu, noAppetite, itchy' || $checkBox ==  'diarrhea, flu, noAppetite, hairLoss' ||
                    $checkBox ==  'diarrhea, flu, noAppetite, thrush' || $checkBox ==  'diarrhea, flu, noAppetite, wateryEyes' ||
                    $checkBox ==  'diarrhea, flu, itchy, hairLoss' || $checkBox ==  'diarrhea, flu, itchy, thrush' ||
                    $checkBox ==  'diarrhea, flu, itchy, wateryEyes' || $checkBox ==  'diarrhea, flu, hairLoss, thrush' ||
                    $checkBox ==  'diarrhea, flu, hairLoss, wateryEyes' || $checkBox ==  'diarrhea, flu, thrush, wateryEyes' ||
                    $checkBox ==  'diarrhea, limp, noAppetite, itchy' || $checkBox ==  'diarrhea, limp, noAppetite, hairLoss' ||
                    $checkBox ==  'diarrhea, limp, noAppetite, thrush' || $checkBox ==  'diarrhea, limp, noAppetite, wateryEyes' ||
                    $checkBox ==  'diarrhea, limp, itchy, hairLoss' || $checkBox ==  'diarrhea, limp, itchy, thrush' ||
                    $checkBox ==  'diarrhea, limp, itchy, wateryEyes' || $checkBox ==  'diarrhea, limp, hairLoss, thrush' ||
                    $checkBox ==  'diarrhea, limp, hairLoss, wateryEyes' || $checkBox ==  'diarrhea, limp, thrush, wateryEyes' ||
                    $checkBox ==  'diarrhea, noAppetite, itchy, hairLoss' || $checkBox ==  'diarrhea, noAppetite, itchy, thrush' ||
                    $checkBox ==  'diarrhea, noAppetite, itchy, wateryEyes' || $checkBox ==  'diarrhea, noAppetite, hairLoss, thrush' ||
                    $checkBox ==  'diarrhea, noAppetite, hairLoss, wateryEyes' || $checkBox ==  'diarrhea, noAppetite, thrush, wateryEyes' ||
                    $checkBox ==  'diarrhea, itchy, hairLoss, thrush' || $checkBox ==  'diarrhea, itchy, hairLoss, wateryEyes' ||
                    $checkBox ==  'diarrhea, itchy, thrush, wateryEyes' || $checkBox ==  'diarrhea, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'vomit, flu, limp, noAppetite' || $checkBox ==  'vomit, flu, limp, itchy' ||
                    $checkBox ==  'vomit, flu, limp, hairLoss' || $checkBox ==  'vomit, flu, limp, thrush' ||
                    $checkBox ==  'vomit, flu, limp, wateryEyes' || $checkBox ==  'vomit, flu, noAppetite, itchy' ||
                    $checkBox ==  'vomit, flu, noAppetite, hairLoss' || $checkBox ==  'vomit, flu, noAppetite, thrush' ||
                    $checkBox ==  'vomit, flu, noAppetite, wateryEyes' || $checkBox ==  'vomit, flu, itchy, hairLoss' ||
                    $checkBox ==  'vomit, flu, itchy, thrush' || $checkBox ==  'vomit, flu, itchy, wateryEyes' ||
                    $checkBox ==  'vomit, flu, hairLoss, thrush' || $checkBox ==  'vomit, flu, hairLoss, wateryEyes' ||
                    $checkBox ==  'vomit, flu, thrush, wateryEyes' || $checkBox ==  'vomit, limp, noAppetite, itchy' ||
                    $checkBox ==  'vomit, limp, noAppetite, hairLoss' || $checkBox ==  'vomit, limp, noAppetite, thrush' ||
                    $checkBox ==  'vomit, limp, noAppetite, wateryEyes' || $checkBox ==  'vomit, limp, itchy, hairLoss' ||
                    $checkBox ==  'vomit, limp, itchy, thrush' || $checkBox ==  'vomit, limp, itchy, wateryEyes' ||
                    $checkBox ==  'vomit, limp, hairLoss, thrush' || $checkBox ==  'vomit, limp, hairLoss, wateryEyes' ||
                    $checkBox ==  'vomit, limp, thrush, wateryEyes' || $checkBox ==  'vomit, noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'vomit, noAppetite, itchy, thrush' || $checkBox ==  'vomit, noAppetite, itchy, wateryEyes' ||
                    $checkBox ==  'vomit, noAppetite, hairLoss, thrush' || $checkBox ==  'vomit, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'vomit, noAppetite, thrush, wateryEyes' || $checkBox ==  'vomit, itchy, hairLoss, thrush' ||
                    $checkBox ==  'vomit, itchy, hairLoss, wateryEyes' || $checkBox ==  'vomit, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'vomit, hairLoss, thrush, wateryEyes' || $checkBox ==  'flu, limp, noAppetite, itchy' ||
                    $checkBox ==  'flu, limp, noAppetite, hairLoss' || $checkBox ==  'flu, limp, itchy, hairLoss' ||
                    $checkBox ==  'flu, limp, itchy, thrush' || $checkBox ==  'flu, limp, itchy, wateryEyes' ||
                    $checkBox ==  'flu, limp, hairLoss, thrush' || $checkBox ==  'flu, limp, hairLoss, wateryEyes' ||
                    $checkBox ==  'flu, limp, thrush, wateryEyes' || $checkBox ==  'flu, noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'flu, noAppetite, itchy, thrush' || $checkBox ==  'flu, noAppetite, itchy, wateryEyes' ||
                    $checkBox ==  'flu, noAppetite, hairLoss, thrush' || $checkBox ==  'flu, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'flu, noAppetite, thrush, wateryEyes' || $checkBox ==  'flu, itchy, hairLoss, thrush' ||
                    $checkBox ==  'flu, itchy, hairLoss, wateryEyes' || $checkBox ==  'flu, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'flu, hairLoss, thrush, wateryEyes' || $checkBox ==  'limp, noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'limp, noAppetite, itchy, thrush' || $checkBox ==  'limp, noAppetite, itchy, wateryEyes' ||
                    $checkBox ==  'limp, noAppetite, hairLoss, thrush' || $checkBox ==  'limp, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'limp, noAppetite, thrush, wateryEyes' || $checkBox ==  'limp, itchy, hairLoss, thrush' ||
                    $checkBox ==  'limp, itchy, hairLoss, wateryEyes' || $checkBox ==  'limp, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'limp, hairLoss, thrush, wateryEyes' || $checkBox ==  'noAppetite, itchy, hairLoss, thrush' ||
                    $checkBox ==  'noAppetite, itchy, hairLoss, wateryEyes' || $checkBox ==  'noAppetite, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'noAppetite, hairLoss, thrush, wateryEyes' || $checkBox ==  'itchy, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, vomit, flu, limp' ||
                    $checkBox ==  'fever, diarrhea, vomit, flu, noAppetite' ||
                    $checkBox ==  'fever, diarrhea, vomit, flu, itchy' ||
                    $checkBox ==  'fever, diarrhea, vomit, flu, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, vomit, flu, thrush' ||
                    $checkBox ==  'fever, diarrhea, vomit, flu, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, vomit, limp, noAppetite' ||
                    $checkBox ==  'fever, diarrhea, vomit, limp, itchy' ||
                    $checkBox ==  'fever, diarrhea, vomit, limp, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, vomit, limp, thrush' ||
                    $checkBox ==  'fever, diarrhea, vomit, limp, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, vomit, noAppetite, itchy' ||
                    $checkBox ==  'fever, diarrhea, vomit, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, vomit, noAppetite, thrush' ||
                    $checkBox ==  'fever, diarrhea, vomit, noAppetite, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, vomit, itchy, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, vomit, itchy, thrush' ||
                    $checkBox ==  'fever, diarrhea, vomit, itchy, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, vomit, hairLoss, thrush' ||
                    $checkBox ==  'fever, diarrhea, vomit, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, vomit, thrush, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, flu, limp, noAppetite' ||
                    $checkBox ==  'fever, diarrhea, flu, limp, itchy' ||
                    $checkBox ==  'fever, diarrhea, flu, limp, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, flu, limp, thrush' ||
                    $checkBox ==  'fever, diarrhea, flu, limp, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, flu, noAppetite, itchy' ||
                    $checkBox ==  'fever, diarrhea, flu, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, flu, noAppetite, thrush' ||
                    $checkBox ==  'fever, diarrhea, flu, noAppetite, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, flu, itchy, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, flu, itchy, thrush' ||
                    $checkBox ==  'fever, diarrhea, flu, itchy, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, flu, hairLoss, thrush' ||
                    $checkBox ==  'fever, diarrhea, flu, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, flu, thrush, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, limp, noAppetite, itchy' ||
                    $checkBox ==  'fever, diarrhea, limp, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, limp, noAppetite, thrush' ||
                    $checkBox ==  'fever, diarrhea, limp, noAppetite, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, limp, itchy, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, limp, itchy, thrush' ||
                    $checkBox ==  'fever, diarrhea, limp, itchy, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, limp, hairLoss, thrush' ||
                    $checkBox ==  'fever, diarrhea, limp, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, limp, thrush, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, itchy, thrush' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, itchy, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, hairLoss, thrush' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, noAppetite, thrush, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, itchy, hairLoss, thrush' ||
                    $checkBox ==  'fever, diarrhea, itchy, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'fever, diarrhea, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'fever, vomit, flu, limp, noAppetite' ||
                    $checkBox ==  'fever, vomit, flu, limp, itchy' ||
                    $checkBox ==  'fever, vomit, flu, limp, hairLoss' ||
                    $checkBox ==  'fever, vomit, flu, limp, thrush' ||
                    $checkBox ==  'fever, vomit, flu, limp, wateryEyes' ||
                    $checkBox ==  'fever, vomit, flu, noAppetite, itchy' ||
                    $checkBox ==  'fever, vomit, flu, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, vomit, flu, noAppetite, thrush' ||
                    $checkBox ==  'fever, vomit, flu, noAppetite, wateryEyes' ||
                    $checkBox ==  'fever, vomit, flu, itchy, hairLoss' ||
                    $checkBox ==  'fever, vomit, flu, itchy, thrush' ||
                    $checkBox ==  'fever, vomit, flu, itchy, wateryEyes' ||
                    $checkBox ==  'fever, vomit, flu, hairLoss, thrush' ||
                    $checkBox ==  'fever, vomit, flu, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, vomit, flu, thrush, wateryEyes' ||
                    $checkBox ==  'fever, vomit, limp, noAppetite, itchy' ||
                    $checkBox ==  'fever, vomit, limp, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, vomit, limp, noAppetite, thrush' ||
                    $checkBox ==  'fever, vomit, limp, noAppetite, wateryEyes' ||
                    $checkBox ==  'fever, vomit, limp, itchy, hairLoss' ||
                    $checkBox ==  'fever, vomit, limp, itchy, thrush' ||
                    $checkBox ==  'fever, vomit, limp, itchy, wateryEyes' ||
                    $checkBox ==  'fever, vomit, limp, hairLoss, thrush' ||
                    $checkBox ==  'fever, vomit, limp, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, vomit, limp, thrush, wateryEyes' ||
                    $checkBox ==  'fever, vomit, noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'fever, vomit, noAppetite, itchy, thrush' ||
                    $checkBox ==  'fever, vomit, noAppetite, itchy, wateryEyes' ||
                    $checkBox ==  'fever, vomit, noAppetite, hairLoss, thrush' ||
                    $checkBox ==  'fever, vomit, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, vomit, noAppetite, thrush, wateryEyes' ||
                    $checkBox ==  'fever, vomit, itchy, hairLoss, thrush' ||
                    $checkBox ==  'fever, vomit, itchy, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, vomit, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'fever, vomit, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'fever, flu, limp, noAppetite, itchy' ||
                    $checkBox ==  'fever, flu, limp, noAppetite, hairLoss' ||
                    $checkBox ==  'fever, flu, limp, itchy, hairLoss' ||
                    $checkBox ==  'fever, flu, limp, itchy, thrush' ||
                    $checkBox ==  'fever, flu, limp, itchy, wateryEyes' ||
                    $checkBox ==  'fever, flu, limp, hairLoss, thrush' ||
                    $checkBox ==  'fever, flu, limp, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, flu, limp, thrush, wateryEyes' ||
                    $checkBox ==  'fever, flu, noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'fever, flu, noAppetite, hairLoss, thrush' ||
                    $checkBox ==  'fever, flu, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, flu, noAppetite, thrush, wateryEyes' ||
                    $checkBox ==  'fever, flu, itchy, hairLoss, thrush' ||
                    $checkBox ==  'fever, flu, itchy, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, flu, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'fever, flu, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'fever, limp, noAppetite, itchy, hairLoss' ||
                    $checkBox ==  'fever, limp, noAppetite, hairLoss, thrush' ||
                    $checkBox ==  'fever, limp, noAppetite, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, limp, noAppetite, thrush, wateryEyes' ||
                    $checkBox ==  'fever, limp, itchy, hairLoss, thrush' ||
                    $checkBox ==  'fever, limp, itchy, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, limp, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'fever, limp, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'fever, noAppetite, itchy, hairLoss, thrush' ||
                    $checkBox ==  'fever, noAppetite, itchy, hairLoss, wateryEyes' ||
                    $checkBox ==  'fever, noAppetite, itchy, thrush, wateryEyes' ||
                    $checkBox ==  'fever, noAppetite, hairLoss, thrush, wateryEyes' ||
                    $checkBox ==  'fever, itchy, hairLoss, thrush, wateryEyes') {
                    return redirect()->route('diagnosis.index')->with('error','There are no diagnosis of this symptom. Please call/order the vet!');
                }
                else{
                    DB::table('diagnoses')->insert([
                        'symptom' => $checkBox,
                        'userID' => $userId,
                        'petsType' => $petsType,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]);
                    return redirect()->route('diagnosis.index')->with('sucess','REMEMBER !!! NOT 100% CORRECT');
                }
            }
        }
        else{
            return redirect()->route('diagnosis.index')->with('error','Please input at least one symptom!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosis $diagnosis)
    {
        //
    }
}
