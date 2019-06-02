<?php

namespace App\Http\Controllers;

use App\Blood_type;
use App\BloodType;
use App\ClientInfo;
use App\Doctor;
use App\Insurer;
use App\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('role_or_permission:admin|insurance|user-list');
        $this->middleware('role_or_permission:admin|doctor|insurance|user-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('role_or_permission:admin|doctor|insurance|user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:admin|doctor|insurance|user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {

            $data = User::orderBy('id', 'DESC')->paginate(100);
        } else {
            $data = User::whereHas('roles', function ($q) {
                $q->where('name', '!=', 'admin');
            })->get();
        }
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasRole('insurance')) {
            $role = Role::pluck('name', 'name')->all();
            $roles = Arr::except($role, ['admin']);
        } else {
            $roles = Role::pluck('name', 'name')->all();
        }

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        if ($user->hasRole('client')) {
            return redirect()->route('create.info.client', $user->id);
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (auth()->user()->hasRole('insurance')) {
            $role = Role::pluck('name', 'name')->all();
            $roles = Arr::except($role, ['admin']);
        } else {
            $roles = Role::pluck('name', 'name')->all();
        }


        $user = User::find($id);

        $userRole = $user->roles->pluck('name', 'name')->all();



        return view('users.edit', compact('user', 'roles', 'userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();


        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function createInfo($id)
    {
        $user = User::find($id);

        $doctors = Doctor::pluck('email', 'id');
        $insurers = Insurer::pluck('email', 'user_id');
        $bloodtypes = Blood_type::pluck('blood_type', 'id');

        return view('users.client', compact('user', 'doctors', 'insurers', 'bloodtypes'));
    }

    public function storeInfo(Request $request, $id)
    {
//        dd($request);
        $request->validate([

            'doctor_id' => 'required',
            'insurance_id' => 'required',
            'blood_type' => 'required',
            'phone' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'bsn' => 'required',

        ]);

        $data = $request->all();

        $data['client_id'] = $id;

        $info = new ClientInfo($data);

        $info->save();

        return redirect()->route('users.create')
            ->with('success', 'client created successfully');
    }
}
