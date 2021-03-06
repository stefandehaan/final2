<?php

namespace App\Http\Controllers;

use App\Client;
use App\Medicine;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:prescription-list', ['only' => ['index']]);
        $this->middleware('permission:prescription-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:prescription-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:prescription-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('pharmacy') || auth()->user()->hasRole('admin')) {
            $prescriptions = Prescription::all();
        } else {
            return redirect('prescriptions/create');
        }


        return view('prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user()->hasRole('doctor')) {

            $clients = Client::all()->where('doctor_id', auth()->user()->id);
//dd($clients->first()->getClient);

            foreach ($clients as $client)
            {
                $test = User::all()->where('id', '=', $client->client_id)->pluck('name', 'id');
            }

            $medicine = Medicine::all()->pluck('name', 'id');

        }

        if (auth()->user()->hasRole('specialist') || auth()->user()->hasRole('admin')) {
            $clients = User::all()->where('role_user', '=', 2)->pluck('name', 'id');
            $medicine = Medicine::all()->pluck('name', 'id');
            $test = null;
        }
        return view('prescriptions.create', compact('clients', 'medicine', 'test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'client',
            'medicine',
            ]);

        $input = $request->all();
        Prescription::create($input);

        return redirect()->route('prescriptions.index')
            ->with('success', 'User created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
//        dd($id);
        DB::update('update client_medicine set retrieved = 1 where client = ?', [$id]);

        return redirect('prescriptions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
