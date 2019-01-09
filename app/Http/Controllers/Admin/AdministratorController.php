<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{

	public function __construct()
	{
		$this->data=[
			'title'=>'សូមស្វាគមន៍',
		];
	}
	
	
	public function index(){
		$this->data=[
			'breadcrumb'=>'',
			'm'=>'home',
			'sm'=>'home',
		];
		return view('admin.home',$this->data);
	}
	
	public function dashboard(){
		$this->data=[
			'breadcrumb'=>'<li class="breadcrumb-item active">Dashboards</li>',
			'm'=>'dashboard',
			'sm'=>'home',
		];
		return view('admin.dashboard',$this->data);
	}
}
