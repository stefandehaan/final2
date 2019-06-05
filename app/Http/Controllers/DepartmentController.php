<?php

namespace App\Http\Controllers;

use App\Client;
use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function show(Department $department)
    {
        $beds = $department->beds;
//        $clients = User::all()->where('user_role', '=', 2);
        $clienten = Client::all();
        $clients = [];
        foreach($clienten as $client){
            $result = $client->getClient;
            $clients[$result->id] = $result->name;
        }

        return view('departments.show', compact('beds', 'clients'));
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
