<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientInfo;
use App\Disease;
use App\Insurer;
use App\Receipt;
use App\TreatmentInfo;
use App\Treatments;
use HieuLe\Alert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function getGuard()
    {
        $test = auth()->user()->getRoleNames()['0'];
        return $test;
    }

    function getUserID()
    {
        $userId = Auth::user()->id;

        return $userId;
    }

    public function index()
    {



        $clients = Client::all()->where('insurance_id', '=', auth()->user()->id);
//        dd($clients);
        return view('clients.index', compact('clients'));
    }

    public function show($id)
    {
//        $user = ClientInfo::where(['bsn' => $bsn, 'doctor' => Auth::user()->id])->firstOrFail()->getClient;
//        $info = ClientInfo::where(['bsn' => $bsn, 'doctor' => Auth::user()->id])->first();
        $user = ClientInfo::where(['id' => $id])->first()->getClient;
        $info = ClientInfo::where(['id' => $id])->first();
        $diseases = Disease::all()->pluck('name', 'id');

        return view('clients.show', compact('user', 'info', 'diseases'));
    }

    public function edit($id)
    {
        $user = ClientInfo::where(['bsn' => $id])->first()->getClient;
        $info = ClientInfo::where(['bsn' => $id])->first();

        return view('client.edit', compact('user', 'info'));
    }

    public function update(Request $request, $id)
    {
        if (empty($request['password'])) {
            $data = $request->except('password');
        }
        else {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
        }
        $client = ClientInfo::where(['id' => $id])->first()->getClient;
        $client->update($data);


        return redirect()->route('edit.client', $id);
    }

    public function history()
    {
        $receipts = Receipt::onlyTrashed()->where('client',Auth()->user()->id)->get();
        $treatments = Treatments::has('getInfo')->where('client',Auth()->user()->id)->get();

        return view('history', compact('receipts', 'treatments'));
    }


}
