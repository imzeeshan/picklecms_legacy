<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Modules\Roles\Entities\Permission;
use Modules\User\Entities\User;
use Modules\Roles\Entities\Role;
use Modules\Settings\Entities\Setting;
use Modules\User\Http\Exports\UsersExport;
use Modules\User\Http\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;


class UserController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $is_api     = \Request::is('api*');
        $site_title = Setting::where('key','Site Title')->get()->pluck('value')[0];
        $site_desc  = Setting::where('key','Site Description')->get()->pluck('value')[0];
        $users      = User::with('role')->sortable()->paginate(10);

        if($is_api){
            return $users;
        }
        else {
            return view('user::index', compact('users', 'site_title', 'site_desc'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {

        /* No Longer needed, since we introduced the permission middleware

        $permissions    =  Permission::where('role_id',Auth::user()->role->id)->get();
        $current_module = "user";

        foreach($permissions as $permission)
        {
            if($permission->entity==$current_module)
            {
                $current_module_write_permission  =  Str::substr($permission->permissions,1,1);
                if($current_module_write_permission==1){
                    echo "The logged in user has permissions to create a new user.";
                }
                else{
                    echo "The logged in user does not have permissions to create a new user.";
                }
            }
        }
        */

        $roles = Role::all();
        return view('user::create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        $user = new User();

        if ($request->name)
            $user->name = $request->name;

        if ($request->email)
            $user->email = $request->email;

        $user->password = bcrypt($request->password);

        if ($request->role_id)
            $user->role_id = $request->role_id;

        $user->save();

        $is_api     = \Request::is('api*');
        if($is_api){
            return $user;
        }
        else {
            return Redirect::route('user.index')->with('message', 'User ' . $request->name . '  has been added successfully!');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        $user       = User::with('role')->findOrFail($id);
        $is_api     = \Request::is('api*');
        if($is_api){
            return $user;
        }else {
            return view('user::show', compact('user'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        $user  = User::findOrFail($id);
        $roles = Role::all();

        return view('user::edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        if ($request->get('name'))
            $user->name = $request->get('name');

        if ($request->get('email'))
            $user->email = $request->get('email');

        if ($request->get('password'))
            $user->password = bcrypt($request->get('password'));

        if ($request->role_id)
            $user->role_id = $request->role_id;

        $user->save();

        $is_api     = \Request::is('api*');
        if($is_api){
            return $user;
        }
        else {
            return Redirect::route('user.index')->with('message', 'User updated!');
        }
    }

    /**
 * Remove the specified resource from storage.
 * @param int $id
 * @return Response
 */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        $user->status="deleted";

        $is_api     = \Request::is('api*');
        if($is_api){
            return response($user, 200)
                   ->header('Content-Type', 'text/json');


        }else {
            return Redirect::route('user.index')->with('message', 'User deleted!');
        }
    }

    /**
     * Logout the specified user from the system.
     * @param int $id
     * @return Response
     */
    public function logout() {
        auth()->logout();
        return Redirect::route("home");
    }

    /**
     * Download all users as an excel file.
     *
     * @return Excel
     */
    public function download() {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'users-import-template.xlsx');

        return Redirect::route('user.index')->with('message', 'Users imported successfully!');
    }

    public function create_token(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user   = Auth::user();
            $token  = $user->createToken('login');
            $user->token = $token;
            return response($user, 200);
        }else{
            return response("User Not Found",404)
                   ->header('Content-Type', 'text/json');
        }
    }


    public function revoke_token(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user   = Auth::user();
            $user->tokens()->delete();
            $user->token = "";
            return response($user, 200);
        }else{
            return response("User Not Found",404)
                ->header('Content-Type', 'text/json');
        }

    }


}
