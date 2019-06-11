<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class DiseaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:disease-list');
        $this->middleware('permission:disease-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:disease-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:disease-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
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
     * @return Response
     */
    public function create()
    {
        return view('diseases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'danger' => 'required',
        ]);

        $input = $request->all();

        $disease = Disease::create($input);
        $disease->save();

        return redirect()->route('diseases.index')
            ->with('success', 'Disease created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Disease $disease
     * @return Response
     */
    public function show(Disease $disease)
    {
        return view('diseases.show', compact('disease'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Disease $disease
     * @return Response
     */
    public function edit(Disease $disease)
    {

        return view('diseases.edit', compact('disease'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     * @throws ValidationException
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
     * @param Disease $disease
     * @return Response
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
