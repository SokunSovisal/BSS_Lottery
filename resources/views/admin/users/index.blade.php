@extends('layouts.admin')

@section('css')
	<style type="text/css">
		table .img{
			width: 35px; height: 35px;
			display: inline-block;
			border-radius: 2px;
		}
		table .img i{
			font-size: 14px;
			text-align: center;
			line-height: 35px;
			opacity: 0.2;
			transition: .3s ease-out;
			display: block;
			height: 100%;
		}
		table .img i:hover{
			opacity: 1;
		}
		
		table > td{
			padding: 0 !important;
		}
		input, select{
			border-radius: 2px !important;
		}
	</style>
@endsection

@section('content')
	

	<section class="bg-white-content">
		<!-- Add Button & Error Message -->
		@component('comps.btnAdd')
			@slot('btnAdd')
				{{route('admin.users.create')}}
			@endslot
		@endcomponent
		
		<br/>
		<br/>
		<table class="table table-striped table-hover" id="dataTable">
			<thead>
				<tr>
					<th width="5%">{{ __('components.tableNumber') }}</th>
					<th>{{ __('users.name') }}</th>
					<th>{{ __('users.phone') }}</th>
					<th>{{ __('users.role') }}</th>
					<th>{{ __('users.image') }}</th>
					<th>{{ __('users.status') }}</th>
					<th width="135px">{{ __('users.action') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $i => $user)
				<tr>
					<td class="text-center">{{ $i+1 }}</td>
					<td>{{ $user->name}}</td>
					<td>{{ $user->phone }}</td>
					<td>{{ $user->role->ur_name }}</td>
					<td><a href="{{ route('admin.users.image',$user->id) }}" title="Click to Change Image"><span class="img" style="background: url('/images/users/{{$user->image}}') center center; background-size: cover;" /><i class="fa fa-pencil-alt text-success"/></i></span></a></td>
					<td>
						{!! Form::open(['url' => route('admin.users.status',$user->id), 'class'=>'mb-0']) !!}
							{{ Form::hidden('_method', 'PUT') }}
							<div class="togglebutton">
								<label>
									<input type="hidden" name="status" value="{{(($user->status==1)?'0':'1')}}" />
									<input type="checkbox" onChange="this.form.submit()" {{(($user->status==1)?'checked':'')}}/>
									<span class="toggle toggle-active"></span>
								</label>
							</div>
						{!! Form::close() !!}
					</td>
					<td class="action">
						<a href="{{route('admin.users.password',$user->id)}}" title="Chang Password" data-uid="{{$user->id}}" class="btn btn-warning btn-sm mr-0"><i class="fa fa-key"></i></a>
						<a href="{{route('admin.users.edit',$user->id)}}" title="Edit Information" data-uid="{{$user->id}}" class="btn btn-info btn-sm mr-0"><i class="fa fa-pencil-alt"></i></a>
						<button type="button" class="btn btn-danger btn-sm" title="Delete User" onclick="alertDelete({{$user->id}})" ><i class="fa fa-trash-alt"></i></button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<!-- Submit DELETE -->
		<form id="form_delete" action="" method="POST" accept-charset="UTF-8" class="hello">
			@csrf
			<input name="_method" type="hidden" value="DELETE">
			<div id="swalDeleteLang" data-ftitle="{{ __('swal.delftitle') }}" data-ftext="{{ __('swal.delftext') }}" data-ftype="warning" data-fbtnyes="{{ __('swal.btnyes') }}" data-fbtncancel="{{ __('swal.btncancel') }}" data-rstitle="{{ __('swal.delrstitle') }}" data-rstext="{{ __('swal.delrstext') }}" data-rstype="success"></div>
		</form>
	</section>
@endsection

@section('js')
	<script type="text/javascript">

	</script>
@endsection
