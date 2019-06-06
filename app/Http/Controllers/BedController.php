<?php

namespace App\Http\Controllers;

use App\Bed;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BedController extends Controller{

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
     * @param Bed $bed
     * @return Response
     */
    public function show(Bed $bed)
    {

        $usages = $bed->usages;

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
