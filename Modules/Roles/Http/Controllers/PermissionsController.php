<?php

namespace Modules\Roles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Roles\Entities\Permission;
use Modules\Roles\Entities\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);

        return view('roles::permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('roles::permissions.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $permission        = new Permission();
        $read_permission   = 0;
        $write_permission  = 0;
        $edit_permission   = 0;

        if ($request->read_permission) {
            $read_permission = 1;
        }

        if ($request->write_permission)
            $write_permission = 1;

        if ($request->edit_permission)
            $edit_permission = 1;

        $permission->permissions = $read_permission . $write_permission . $edit_permission;

        if($request->entity)
            $permission->entity =$request->entity;

        if($request->entity_type)
            $permission->entity_type =$request->entity_type;

        if($request->role_id)
            $permission->role_id =$request->role_id;

        $permission->save();
        return Redirect::route('permissions.index')->with('message', 'New Permission has been added successfully!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('role::permissions.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $permission                    =  Permission::findOrFail($id);
        $permission->read_permission   =  Str::substr($permission->permissions,0,1);
        $permission->write_permission  =  Str::substr($permission->permissions,1,1);
        $permission->edit_permission   =  Str::substr($permission->permissions,2,2);

        $roles = Role::all();
        return view('roles::permissions.edit', compact('permission','roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $permission        = Permission::findOrFail($id);
        $read_permission   = 0b0;
        $write_permission  = 0b0;
        $edit_permission   = 0b0;

        if ($request->read_permission) {
            $read_permission = 0b100;  // Binary 4
        }

        if ($request->write_permission)
            $write_permission = 0b010; // Binary 2

        if ($request->edit_permission)
            $edit_permission = 0b001; // Binary 1

        $permission->permissions = decbin($read_permission + $write_permission + $edit_permission);

        if($request->entity)
            $permission->entity =$request->entity;

        if($request->entity_type)
            $permission->entity_type =$request->entity_type;

        if($request->role_id)
            $permission->role_id =$request->role_id;

        $permission->save();
        return Redirect::route('permissions.index')->with('message', 'Permission has been dated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return Redirect::route('permissions.index')->with('message', 'Permission deleted!');
    }
}
