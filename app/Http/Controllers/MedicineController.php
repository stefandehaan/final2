<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;


class MedicineController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:medicine-list');
        $this->middleware('permission:medicine-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:medicine-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:medicine-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Medicine::all();
        // dd($data);
        return view('medicine/index', \compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('medicine/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = \request()->all();

        $medicine = new Medicine($data);
        $medicine->save();

        return redirect()->route('medicine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Medicine::find($id);

        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);

        // $medicine = new Medicine($data);
        $medicine = Medicine::where('id', '=', $id);
        $medicine->update($data);

        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::find($id)->delete();

        return redirect()->route('medicine.index');
    }
}
