<?php

namespace App\Http\Controllers;

use App\Client;
use App\Consult;
use App\Disease;
use App\Doctor;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class ConsultController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('role_or_permission:admin|doctor|insurance|consult-list');
        $this->middleware('role_or_permission:admin|doctor|consult-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('role_or_permission:admin|doctor|consult-edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:admin|doctor|consult-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $client_consults = Consult::orderBy('date', 'ASC')->paginate(5);
            $doctor_consults = Consult::all()->where('doctor', '=', auth()->user()->id);

        } elseif (auth()->user()->hasRole('client')) {
            $client_consults = Consult::orderBy('date', 'ASC')->where('client', '=', auth()->user()->id);
            $doctor_consults = Consult::orderBy('date', 'ASC')->where('doctor', '=', auth()->user()->id);

        } elseif (auth()->user()->hasRole('doctor')) {
            $client_consults = Consult::orderBy('date', 'ASC')->where('doctor', '=', auth()->user()->id)->paginate(5);
            $doctor_consults = Consult::all()->where('doctor', '=', auth()->user()->id);
        }
        return view('consults.index', compact('client_consults', 'doctor_consults'));
    }


    public function create()
    {
//dd(auth()->user());
        if ($this->getGuard() !== 'admin') {
            $clients = Doctor::find(Auth()->user()->id)->Clients->pluck('name', 'id');
            $user = Doctor::all()->where('id', '=', auth()->user()->id)->pluck('name', 'id');

//            $user = Doctor::find(auth()->user()->id)->pluck('name', 'id');
            $disease = Disease::all()->pluck('name', 'id');
            $medics = '';
        } else {
            $clients = Client::all()->pluck('name', 'id');
            $medics = Doctor::all()->pluck('name', 'id');
        }

        return view('consults.create', compact('clients', 'medics', 'user', 'disease'));
    }


    function getGuard()
    {
        $test = auth()->user()->getRoleNames()['0'];
        return $test;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        $this->validate($request, [
            'client' => 'required',
            'doctor' => 'required',
            'subject' => 'required',
            'summary' => 'required',
            'disease' => 'required',
            'date' => 'required',
            'time' => 'required',
            'duration' => 'required',
        ]);

        $data = $request->all();

        $consult = new Consult($data);
        $consult->save();


        return redirect()->route('consults.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Consult $consult
     * @return \Illuminate\Http\Response
     */
    public
    function show(Consult $consult)
    {
        return view('consults.show',compact('consult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Consult $consult
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Consult $consult)
    {
        if ($this->getGuard() !== 'admin') {
            $clients = Doctor::find(Auth()->user()->id)->Clients->pluck('name', 'id');
            $user = Doctor::all()->where('id', '=', auth()->user()->id)->pluck('name', 'id');

//            $user = Doctor::find(auth()->user()->id)->pluck('name', 'id');
            $disease = Disease::all()->pluck('name', 'id');
            $medics = '';
        } else {
            $clients = Client::all()->pluck('name', 'id');
            $medics = Doctor::all()->pluck('name', 'id');
        }

        return view('consults.edit', compact('consult', 'clients', 'medics', 'user', 'disease'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Consult $consult
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Consult $consult)
    {
        $this->validate($request, [
            'client' => 'required',
            'doctor' => 'required',
            'subject' => 'required',
            'summary' => 'required',
            'disease' => 'required',
            'date' => 'required',
            'time' => 'required',
            'duration' => 'required',
        ]);

        $data = $request->all();


        $consult->update($data);


        return redirect()->route('consults.index')
            ->with('success', 'consult aangemaakt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Consult $consult
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Consult $consult)
    {
       $consult->delete();
        return redirect()->route('consults.index')
            ->with('success','User deleted successfully');
    }
}
