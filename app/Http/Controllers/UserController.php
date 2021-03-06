<?php

namespace App\Http\Controllers;

use App\Blood_type;
use App\ClientInfo;
use App\Doctor;
use App\Insurer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {

            $data = User::all();
        } else {
            $data = User::whereHas('roles', function ($q) {
                $q->where('name', '!=', 'admin')->where('name', '!=', 'insurance');
            })->get();
        }

        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role_user',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        if ($user->hasRole('client')) {
            DB::update('update users set role_user = 2 where id = ?', [$user->id]);
            return redirect()->route('create.info.client', $user->id);
        }
        if ($user->hasRole('doctor')) {
            DB::update('update users set role_user = 4 where id = ?', [$user->id]);

        }
        if ($user->hasRole('insurance')) {

            DB::update('update users set role_user = 3 where id = ?', [$user->id]);
            return redirect()->route('create.info.insurer', $user->id);

        }
        if ($user->hasRole('hospital')) {
            DB::update('update users set role_user = 6 where id = ?', [$user->id]);
        }
        if ($user->hasRole('pharmacy')) {
            DB::update('update users set role_user = 5 where id = ?', [$user->id]);
        }
        if ($user->hasRole('admin')) {
            DB::update('update users set role_user = 1 where id = ?', [$user->id]);
        }
        if ($user->hasRole('specialist')) {
            DB::update('update users set role_user = 7 where id = ?', [$user->id]);
        }


        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
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
     * @return Response
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
     * @return Response
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

        $doctors = Doctor::all()->where('role_user', '4')->pluck('name', 'id');
        $insurers = Insurer::pluck('email', 'insurance_id');
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
            ->with('success', 'verzekeraar created successfully');
    }

    public function createInsurance($id)
    {
        $user = User::find($id);

        return view('users.insurer', compact('user'));
    }

    public function storeInsurance(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'tel' => 'required',
            'email' => 'required',

        ]);

        $data = $request->all();

        $data['insurance_id'] = $id;

        $info = new Insurer($data);

        $info->save();

        return redirect()->route('users.create')
            ->with('success', 'client created successfully');
    }
}
