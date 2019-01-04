<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{

	public function __construct()
	{
		$this->data=[
			'm'=>'dashboard',
			'sm'=>'users',
			'title'=> __('breadcrumb.users'),
		];
	}
	
	
	public function index(){
		$this->data=[
			'breadcrumb'=>'<li class="breadcrumb-item active"><i class="fa fa-home"></i> '.__('components.dashboard').'</li>',
		];
		return view('admin.home',$this->data);
	}
	
	public function dashboard(){
		$this->data +=[
			'breadcrumb'=>'<li class="breadcrumb-item active">Dashboards</li>',
		];
		return view('admin.dashboard',$this->data);
	}
}
