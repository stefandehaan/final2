<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diseases = Disease::orderBy('id', 'ASC')->paginate(50);
        return view('diseases.index', compact('diseases'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diseases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'danger' => 'required',
        ]);

        $input = $request->all();

        $user = Disease::create($input);
        $user->save();

        return redirect()->route('diseases.index')
            ->with('success', 'Disease created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return view('diseases.show', compact('disease'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {

        return view('diseases.edit', compact('disease'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'danger' => ['required'],
        ]);

        $input = $request->all();

        $disease = Disease::find($id);
        $disease->update($input);


        return redirect('diseases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disease::find($id)->delete();
        return redirect()->route('diseases.index')
            ->with('success', 'Disease deleted successfully');
    }

    protected function validateProject()
    {
        return request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'danger' => ['required'],
        ]);
    }
}
