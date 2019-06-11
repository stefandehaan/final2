<?php

namespace App\Http\Controllers;

use App\BedUsage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedusageController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:bedusage-list', ['only' => ['index']]);
        $this->middleware('permission:bedusage-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:bedusage-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bedusage-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new BedUsage([
            'client' => $request->get("client"),
            "bed" => $request->get("bed"),
            "start" => Carbon::now(),
        ]);
//dd($request);
        // dump($model);
        $model->save();
        return redirect('beds/'. $request->bed);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($id);

        DB::update('update bed_usage set until = ? where id = ?', [Carbon::now(), $id]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
