<?php

namespace App\Http\Controllers;

use App\Client;
use App\Consult;
use App\Insurers;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('client')) {
            $consult = Consult::all()->where('client', '=', auth()->user()->id);

            $client = Client::all()->where('client_id', '=', auth()->user()->id);
            $insurance = User::all()->where('id', '=', $client->first()->insurance_id);

            $insurance_info = Insurers::all()->where('user_id', '=', $client->first()->insurance_id);
        }

        if (auth()->user()->hasRole('admin')) {
            $consult = Consult::all();

            $client = Client::all();
            $insurance = User::all();

            $insurance_info = Insurers::all();
        }



        return view('home', compact('consult', 'client', 'insurance', 'insurance_info'));


    }
}
