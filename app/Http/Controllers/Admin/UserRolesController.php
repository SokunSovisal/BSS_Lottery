<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRolesController extends Controller
{


    public function __construct()
    {
        $this->data=[
            'm'=>'manage_users',
            'sm'=>'user_roles',
            'title'=>'កំណត់ឋានៈ',
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data += [
            'breadcrumb'=>'<li><a href="'. route('home') .'"><i class="fa fa-home"></i> ផ្ទាំងដើម</a></li><li class="active"><i class="fa fa-user-cog"></i> កំណត់ឋានៈ</li>',

            // Select Data From Table
            'users' => Users::orderBy('user_role_id', 'desc')->get(),
        ];
        return view('roles.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data+=[
            'user' => Users::find($id),
            'roles' => userRoles::orderBy('id', 'asc')->get(),
            'breadcrumb'=>'<li><a href="'. route('home') .'"><i class="fa fa-home"></i> ផ្ទាំងដើម</a></li><li><a href="'. route('roles.index') .'"><i class="fa fa-user-cog"></i> កំណត់ឋានៈ</a></li><li class="active"><i class="fa fa-pencil"></i> កែប្រែ៖ '. Users::find($id)->name.'</li>',
        ];
        return view('roles.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, UserRoles $userRoles)
    {
        // Validate Post Data
        $validator = Validator::make($r->all(), [
            'user_role_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update Item
        $roles = Users::find($id);
        $roles->user_role_id = $r->user_role_id;
        $roles->save();

    // redirect
        return redirect()->route('roles.index')
            ->with('success', 'ឋានៈបានកែប្រែដោយជោគជ័យ៖ ' . $r->name);
    }

}
