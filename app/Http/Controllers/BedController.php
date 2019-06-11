<?php

namespace App\Http\Controllers;

use App\Bed;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BedController extends Controller{


    public function __construct()
    {
        $this->middleware('permission:bed-list', ['only' => ['index']]);
        $this->middleware('permission:bed-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:bed-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bed-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $department = Department::all()->pluck('id', 'id');
//        dd($department);
        return view('beds.create', compact('department'));
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
            'department' => 'required',
        ]);

        $input = $request->except(['_token', '_method']);

        $department = new Bed($input);
        $department->save();

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Bed $bed
     * @return Response
     */
    public function show(Bed $bed)
    {

        $usages = $bed->usages->sortByDesc('id');
        return view('beds.show', compact('usages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bed $bed
     * @return Response
     */
    public function edit(Bed $bed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bed $bed
     * @return Response
     */
    public function update(Request $request, Bed $bed, $usage)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bed $bed
     * @return Response
     */
    public function destroy(Bed $bed)
    {
        //
    }
}
