<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\userRoles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;
use Auth;
use Image;
use File;

class UsersController extends Controller
{

	private $path;

	public function __construct()
	{
		// Define Upload Image Path
		$this->path=public_path().'/images/users/';
		$this->data=[
			'm'=>'manage_users',
			'sm'=>'users',
			'title'=> __('breadcrumb.users'),
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
			'breadcrumb'=>'<li class="breadcrumb-item"><a href="'. route('admin.dashboard') .'"><i class="fa fa-home"></i> '.__('components.dashboard').'</a></li><li class="breadcrumb-item active"><i class="fa fa-user-friends"></i> '.__('breadcrumb.users').'</li>',

			// Select Data From Table
			'users' => Users::orderBy('user_role_id', 'desc')->get(),
		];
		return view('admin.users.index',$this->data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$this->data += [
			'breadcrumb'=>'<li class="breadcrumb-item"><a href="'. route('admin.dashboard') .'"><i class="fa fa-home"></i> '.__('components.dashboard').'</a></li><li class="breadcrumb-item"><a href="'. route('admin.users.index') .'"><i class="fa fa-user-friends"></i> '.__('breadcrumb.users').'</li></a></li><li class="breadcrumb-item active"><i class="fa fa-plus"></i> បន្ថែមថ្មី</li>',
		];
		return view('admin.users.create',$this->data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate Post Data
		$validator = Validator::make($r->all(), [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6',
			'confirm_password' => 'required_with:password|same:password|min:6',
		]);

		// if Validate Errors
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		// Insert to Table
		$user = new users;
		$user->name = $r->name;
		$user->email = $r->email;
		$user->password = Hash::make($r->password);
		$user->gender = $r->gender;
		$user->phone = $r->phone;
		$user->description = $r->description;
		$user->save();

		// Redirect
		return redirect()->route('admin.users.index')
			->with('success', __('alert.storeSuccess') . $r->name);
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
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$this->data+=[
			'user' => Users::find($id),
			'breadcrumb'=>'<li class="breadcrumb-item"><a href="'. route('admin.dashboard') .'"><i class="fa fa-home"></i> '.__('components.dashboard').'</a></li><li class="breadcrumb-item"><a href="'. route('admin.users.index') .'"><i class="fa fa-user-friends"></i> '.__('breadcrumb.users').'</a></li><li class="breadcrumb-item active"><i class="fa fa-pencil"></i> កែប្រែ៖ '. Users::find($id)->name.'</li>',
		];
		return view('admin.users.edit',$this->data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Validate Post Data
		$validator = Validator::make($r->all(), [
			'name' => 'required',
			'phone' => 'required',
			'gender' => 'required',
			'position' => 'required',
			'salary' => 'required',
			'email' => 'required|email',
		]);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		// Update Item
		$user = Users::find($id);
		$user->name = $r->name;
		$user->email = $r->email;
		$user->salary = $r->salary;
		$user->gender = $r->gender;
		$user->position = $r->position;
		$user->phone = $r->phone;
		$user->description = $r->description;
		$user->save();
		// redirect
		return redirect()->route('admin.users.index')
			->with('success', __('alert.updateSuccess') . $r->name);
	}

	public function image(Users $users, $id)
	{
    $this->data+=[
			// Select Data From Table
      'user' => Users::find($id),
      'breadcrumb'=>'<li class="breadcrumb-item"><a href="'. route('admin.dashboard') .'"><i class="fa fa-home"></i> '.__('components.dashboard').'</a></li><li class="breadcrumb-item"><a href="'. route('admin.users.index') .'"><i class="fa fa-user-friends"></i> '.__('breadcrumb.users').'</a></li><li class="breadcrumb-item active"><i class="fa fa-image"></i>'.__('breadcrumb.image'). Users::find($id)->name.'</li>',
    ];
    return view('admin.users.image',$this->data);
	}

	public function image_update(Request $r, Users $users, $id)
	{
		// Validate Post Data
		$validator = Validator::make($r->all(), [
			'user_image' => 'required|image|max:2048',
		]);

		// if Validate Errors
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		// $user_image;
		$image = $r->file('user_image');
		if ($image->extension()=='png') {
			$user_image=time().'_'.$id.'.png';
			Image::make($image->getRealPath())->save($this->path.$user_image);
		}else{
			$user_image=time().'_'.$id.'.jpg';
			Image::make($image->getRealPath())->save($this->path.$user_image);
		}
		// Update Item
		$user = Users::find($id);
		$old_user_image = $user->image;
		$user->image = $user_image;
		$user->save();

		if ($old_user_image!='default_user.png') {
			File::delete($this->path.$old_user_image);
		}
		// redirect
		return redirect()->route('admin.users.index')
			->with('success', __('alert.updateSuccess') . $r->name);
	}

	public function password(Users $users, $id)
	{
		$this->data+=[
			'user' => Users::find($id),
			'breadcrumb'=>'<li class="breadcrumb-item"><a href="'. route('admin.dashboard') .'"><i class="fa fa-home"></i> '.__('components.dashboard').'</a></li><li class="breadcrumb-item"><a href="'. route('admin.users.index') .'"><i class="fa fa-user-friends"></i> '.__('breadcrumb.users').'</a></li><li class="breadcrumb-item active"><i class="fa fa-pencil"></i> '.__('breadcrumb.edit').' '. Users::find($id)->name.'</li>',
		];
		return view('admin.users.password',$this->data);
	}

	public function password_update(Request $r, Users $users, $id)
	{
		// Validate Post Data
		$validator = Validator::make($r->all(), [
			'password' => 'required|min:6',
			'confirm_password' => 'required_with:password|same:password|min:6',
		]);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		// Update Item
		$user = Users::find($id);
		$user->password = Hash::make($r->password);
		$user->save();
		// redirect
		return redirect()->route('admin.users.index')
			->with('success', __('alert.updateSuccess') . $r->name);
	}

	public function status(Request $r, Users $users, $id)
	{
		// Validate Post Data
		$validator = Validator::make($r->all(), [
			'status' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		if (Auth::user()->user_role_id ==1) {
			// Update Item
			$user = Users::find($id);
			$name = $user->name;
			$user->status = $r->status;
			$user->save();
			// redirect
			return redirect()->route('admin.users.index')
				->with('success', __('alert.updateSuccess') . $name);
		}else{
			return redirect()->route('admin.users.index')
				->with('error', __('alert.userPermission') );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		// delete
		$user = Users::find($id);
		$name = $user->name;
		$image = $user->image;
		$user->delete();
		if ($image!='default_user.png') {
			File::delete($this->path.$image);
		}
		// redirect
		return redirect()->route('admin.users.index')
			->with('success', __('alert.deleteSuccess'). $name);
	}
}
