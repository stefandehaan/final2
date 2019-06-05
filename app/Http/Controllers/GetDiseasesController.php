<?php

namespace App\Http\Controllers;

use App\Consult;
use App\Disease;
use Illuminate\Http\Request;

class GetDiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $results = Disease::all()->pluck('name', 'id');

        $test = $request->input();


        $consult = Consult::all();

//        dd($consult);

        return view('getDiseases.index', compact('results', 'consult'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $result = $request->all();

        return view('results.show', compact('result'));
    }


}
