<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Treatment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TreatmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:treatment-list');
        $this->middleware('permission:treatment-create', ['only' => ['create','store']]);
        $this->middleware('permission:treatment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:treatment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $test = Treatment::all();

        if (auth()->user()->hasRole('client')){
            $treatments = Treatment::all()->where('client','=', auth()->user()->id);

        }else {

        $treatments = Treatment::all();
        }
//        dd($treatments);
        $client = User::all()->where('id', '=', $treatments->first()->client);
        $specialist = User::all()->where('id', '=', $treatments->first()->specialist);
        $disease = Disease::all()->where('id', '=', $treatments->first()->disease);
//        dd($client->first()->name);

        return view('treatments.index', compact('treatments', 'client', 'specialist', 'disease'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $client = User::all()->where('role_user', '=', 2)->pluck('name', 'id');
        $specialist = User::all()->where('role_user', '=', 7)->pluck('name', 'id');
        $disease = Disease::all()->pluck('name', 'id');

        return view('treatments.create', compact('client', 'specialist', 'disease'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'client' => ['required'],
            'specialist' => ['required'],
            'description' => ['required'],
            'disease' => ['required'],

        ]);

        $input = $request->except(['_token', '_method']);
//        $input['user_id'] = $id;
//dd($id);
        $treatment = Treatment::create($input);
//        dd($disease->first());
        $treatment->save();


        return redirect('treatments');
    }

    /**
     * Display the specified resource.
     *
     * @param Treatment $treatment
     * @return Response
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Treatment $treatment
     * @return Response
     */
    public function edit(Treatment $treatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Treatment $treatment
     * @return Response
     */
    public function update(Request $request, Treatment $treatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Treatment $treatment
     * @return Response
     */
    public function destroy(Treatment $treatment)
    {
        //
    }
}
