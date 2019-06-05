<?php

namespace App\Http\Controllers;

use App\Blood_type;
use App\Client;
use App\Disease;
use App\Doctor;
use App\Insurer;
use App\Receipt;
use App\TreatmentInfo;
use App\Treatments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function getGuard()
    {
        $test = auth()->user()->getRoleNames()['0'];
        return $test;
    }

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $clients = Client::all();
        } elseif (auth()->user()->hasRole('insurance')) {
            $clients = Client::all()->where('insurance_id', '=', auth()->user()->id);
        } else {

            $clients = Client::all()->where('doctor_id', '=', auth()->user()->id);
        }
        return view('clients.index', compact('clients'));
    }

    public function show($id)
    {
        $user = Client::where(['client_id' => $id])->first()->getClient;
        $info = Client::where(['client_id' => $id])->first();
        $diseases = Disease::all()->pluck('name', 'id');

        return view('clients.show', compact('user', 'info', 'diseases'));
    }

    public function edit($id)
    {
        $user = Client::find($id);
        abort_unless($user->insurance_id === auth()->user()->id, '403');

        $doctors = Doctor::all()->where('user_role', '4')->pluck('email', 'id');
        $insurers = Insurer::pluck('email', 'user_id');
        $bloodtypes = Blood_type::pluck('blood_type', 'id');

        return view('clients.edit', compact('user', 'doctors', 'insurers', 'bloodtypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required',
            'doctor_id' => 'required',
            'insurance_id' => 'required',
            'blood_type' => 'required',
            'phone' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'bsn' => 'required',

        ]);


        $info = Client::find($id);
        $input = $request->all();


        $info->update($input);

        return redirect()->route('clients.index')
            ->with('success', 'client updated successfully');
    }

    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect()->route('clients.index')
            ->with('success', 'User deleted successfully');
    }


    public function history()
    {
        $receipts = Receipt::onlyTrashed()->where('client', Auth()->user()->id)->get();
        $treatments = Treatments::has('getInfo')->where('client', Auth()->user()->id)->get();

        return view('history', compact('receipts', 'treatments'));
    }


}
