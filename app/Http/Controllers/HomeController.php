<?php

namespace App\Http\Controllers;

use App\Client;
use App\Consult;
use App\Insurer;
use App\User;
use Illuminate\Contracts\Support\Renderable;

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
     * @return Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('client')) {
            $consult = Consult::all()->where('client', '=', auth()->user()->id);
            $client = Client::all()->where('client_id', '=', auth()->user()->id);
            $insurance = User::all()->where('id', '=', $client->first()->insurance_id);

            $doctor = User::all()->where('id', '=', $client->first()->doctor_id);


            $insurance_info = Insurer::all()->where('insurance_id', '=', $client->first()->insurance_id);
        }

        if (auth()->user()->hasRole('admin')) {
            $consult = Consult::all();
            $doctor = User::all()->where('id', '=', 4);

            $client = Client::all();
            $insurance = User::all();

            $insurance_info = Insurer::all();
        }
        if (auth()->user()->hasRole('insurance')) {
            $consult = Consult::all();
            $doctor = User::all()->where('id', '=', 4);

            $client = Client::all();
            $insurance = User::all();

            $insurance_info = Insurer::all();
        }
        if (auth()->user()->hasRole('doctor')) {
            $consult = Consult::all();
            $doctor = User::all()->where('id', '=', 4);

            $client = Client::all();
            $insurance = User::all();

            $insurance_info = Insurer::all();
        }
        if (auth()->user()->hasRole('pharmacy')) {
            $consult = Consult::all();
            $doctor = User::all()->where('id', '=', 4);

            $client = Client::all();
            $insurance = User::all();

            $insurance_info = Insurer::all();
        }
        if (auth()->user()->hasRole('hospital')) {
            $consult = Consult::all();
            $doctor = User::all()->where('id', '=', 4);

            $client = Client::all();
            $insurance = User::all();

            $insurance_info = Insurer::all();
        }
        if (auth()->user()->hasRole('specialist')) {
            $consult = Consult::all();
            $doctor = User::all()->where('id', '=', 4);

            $client = Client::all();
            $insurance = User::all();

            $insurance_info = Insurer::all();
        }



        return view('home', compact('consult', 'client', 'insurance', 'insurance_info', 'doctor'));


    }
}
