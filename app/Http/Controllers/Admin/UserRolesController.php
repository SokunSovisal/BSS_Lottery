<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserRolesController extends Controller
{


    public function __construct()
    {
        $this->data=[
            'm'=>'manage_users',
            'sm'=>'user_roles',
            'title'=> ''.__('components.userRoles').'',
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
            'breadcrumb'=>'<li class="breadcrumb-item"><a href="'. route('admin.dashboard') .'"><i class="fa fa-home"></i> '.__('components.dashboard').'</a></li><li class="breadcrumb-item active"><i class="fa fa-user-cog"></i> '.__('components.userRoles').'</li>',

            // Select Data From Table
            'users' => Users::orderBy('user_role_id', 'desc')->get(),
        ];
        return view('admin.roles.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data+=[
            'user' => Users::find($id),
            'roles' => userRoles::orderBy('id', 'asc')->get(),
            'breadcrumb'=>'<li class="breadcrumb-item"><a href="'. route('admin.dashboard') .'"><i class="fa fa-home"></i> '.__('components.dashboard').'</a></li><li class="breadcrumb-item"><a href="'. route('admin.roles.index') .'"><i class="fa fa-user-cog"></i> '.__('components.userRoles').'</a></li><li class="breadcrumb-item active"><i class="fa fa-pencil"></i> '.__('breadcrumb.edit').' '. Users::find($id)->name.'</li>',
        ];
        return view('admin.roles.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, UserRoles $userRoles, $id)
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

		if (Auth::user()->user_role_id ==1) {
            // Update Item
            $roles = Users::find($id);
            $roles->user_role_id = $r->user_role_id;
            $roles->save();
            // redirect
            return redirect()->route('admin.roles.index')
                ->with('success', __('alert.updateSuccess') . $r->name);
		}else{
			return redirect()->route('admin.users.index')
				->with('error', __('alert.userPermission') );
		}
    }

}
