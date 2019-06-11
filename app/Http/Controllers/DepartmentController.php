<?php

namespace App\Http\Controllers;

use App\Bed;
use App\Client;
use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:department-list');
        $this->middleware('permission:department-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:department-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


        $departments = Department::all();
//            ->where('hospital', '=', auth()->user()->id);

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//        dd(User::all()->where('role_user', '=', 6));
        $hospital = User::all()->where('role_user', '=', 6)->pluck('name', 'id');

        return view('departments.create', compact('hospital'));
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
            'hospital' => 'required',
        ]);

        $input = $request->except(['_token', '_method']);

        $department = new Department($input);
        $department->save();

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function show(Department $department)
    {
        $usages = Bed::all();
//        dd($usages);
//        $usages = $bed->usages->sortByDesc('id');
        $beds = $department->beds;

        $clients = User::all()->where('role_user', '=', 2)->pluck('name', 'id');

        return view('departments.show', compact('beds', 'clients', 'usages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
