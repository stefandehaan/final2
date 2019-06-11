<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission-list');
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id','ASC')->paginate(500);
        return view('permissions.index',compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 500);
    }
    public function create()
    {
        $permission = Permission::get();
        return view('permissions.create', compact('permission'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|unique:roles,name'
            ]);
        } catch (ValidationException $e) {
        }


        $permission = Permission::create(['name' => $request->input('name')]);
        $permission->syncPermissions($request->input('permission'));


        return redirect()->route('permissions.create')
            ->with('success','Permission created successfully');
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id','=','permissions.id')
            ->where('role_has_permissions.role_id',$id)
            ->get();


        return view('permissions.show',compact('permission','rolePermissions'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('permissions.edit',compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);


        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();


        $permission->syncPermissions($request->input('permission'));


        return redirect()->route('permissions.index')
            ->with('success','Permissions updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::table('permissions')->where('id',$id)->delete();
        return redirect()->route('permissions.index')
            ->with('success','Permission deleted successfully');
    }

}
