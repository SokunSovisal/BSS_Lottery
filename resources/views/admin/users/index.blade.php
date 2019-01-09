@extends('layouts.admin')

@section('css')
	<style type="text/css">
		table *{
			/*font-family: 'khmerbtb';*/
			font-family: 'roboto_r';
		}
		table .img{
			width: 35px; height: 35px;
			display: inline-block;
			border-radius: 2px;
		}
		table .img span{
			font-size: 14px;
			text-align: center;
			line-height: 30px;
			opacity: 0.2;
			transition: .3s ease-out;
			display: block;
			height: 100%;
		}
		table .img span:hover{
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
					<th width="5%">{{ __('users.tableNumber') }}</th>
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
					<td><a href="{{ route('admin.users.image',$user->id) }}" title="Click to Change Image"><span class="img" style="background: url('/images/users/{{$user->image}}') center center; background-size: cover;" /><span class="fa fa-pencil-alt text-success"/></span></span></a></td>
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
						<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
					</td>
					
					<form id="status-form" action="{{ route('logout') }}" method="POST" class="d-none">
						<input type="hidden" class="d-none" >
					</form>
					<form id="delete-form" action="{{ route('logout') }}" method="POST" class="d-none">
						
					</form>
				
				</tr>
				@endforeach
			</tbody>
		</table>
	</section>
@endsection

@section('js')
	<script type="text/javascript">

	</script>
@endsection
