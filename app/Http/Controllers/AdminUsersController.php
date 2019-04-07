<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Displays a list of users
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /*
     *Stores a newly created user to the DB and then redirects tto the user page
     * on Admin where the user will be visible.
     */
    public function store(StoreUserRequest $request)
    {

        $input = $request->all();

        Session::flash('user_created', 'New User Created');

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        /*Brings in data from roles table */
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the user details in the database
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        Session::flash('user_updated', 'User has been updated');

        /*Check to see if the password section is blank and if it is, persist
        * everything except password to DB. If it is not blank persist all.
        */
        if(trim($request->password)== ''){

            $input = $request->except('password');

        } else{

            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        $user->update($input);

        return redirect('/admin/users');
    }

    /**
     * Deletes a user from the database
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        Session::flash('user_deleted', 'User Deleted');

        return redirect('/admin/users');
    }

    public function scopeProjectmanager($query){
        return $query->where('role_id', '=', '2');
    }
}
