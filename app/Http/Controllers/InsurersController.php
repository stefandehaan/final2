<?php

namespace App\Http\Controllers;

use App\Insurer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class InsurersController extends Controller
{

    public function __construct()
    {
        $this->middleware('role_or_permission:insurer-list', ['only' => ['index']]);
        $this->middleware('role_or_permission:insurer-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('role_or_permission:insurer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:insurer-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $insurers = Insurer::all();
//        dd($insurers);

        return view('insurers.index', compact('insurers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $hasInsurer = Insurer::all()->pluck('user_id');

//        dd($hasInsurer);
        $insurers = User::all()->where('user_role', 3)->except($hasInsurer->all())->pluck('name', 'id');

//        dd($insurers);
        return view('insurers.create', compact('insurers'));
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

            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'zip' => ['required'],
            'tel' => ['required'],
            'email' => ['required'],
        ]);

        $input = $request->except(['_token', '_method']);
//        $input['user_id'] = $id;
//dd($id);
        $insurer = Insurer::create($input);
//        dd($disease->first());
        $insurer->save();


        return redirect('insurers');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Insurer $insurers
     * @return Response
     */
    public function edit($user_id)
    {
//        dd(Insurer::find($user_id));
        $insurers = Insurer::where('user_id',$user_id);
//        dd($insurers->first()->user_id);


        return view('insurers.edit', compact('insurers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Insurer $insurers
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'zip' => ['required'],
            'tel' => ['required'],
            'email' => ['required'],
        ]);

        $input = $request->except(['_token', '_method']);
//        $input['user_id'] = $id;
//dd($id);
        $disease = Insurer::where('user_id', $id);
//        dd($disease->first());
        $disease->update($input);


        return redirect('insurers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Insurer $insurers
     * @return Response
     */
    public function destroy(Insurer $insurers)
    {
        //
    }

    public function validateInsurer()
    {
        return \request()->validate([
            'name',
            'address',
            'zip',
            'tel',
            'email',
        ]);
    }
}
