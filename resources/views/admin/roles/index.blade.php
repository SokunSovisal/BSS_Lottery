@extends('layouts.admin')

@section('css')
	<style type="text/css">

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
					<th>{{ __('components.userRoles') }}</th>
					<th width="10%">សកម្មភាព</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $i => $user)
				<tr>
					<td>{{ $i+1 }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->role->ur_name }}</td>
					<td class="action">
						<a href="{{route('admin.roles.edit',$user->id)}}" title="Edit" class="btn btn-info btn-sm mr-0"><i class="fa fa-pencil-alt"></i></a>
					</td>
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
