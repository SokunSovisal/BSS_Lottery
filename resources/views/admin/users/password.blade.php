@extends('layouts.admin')

@section('css')
	<style type="text/css">

	</style>
@endsection

@section('content')
	{!! Form::open(['url' => route('admin.users.password_update', $user->id)]) !!}
		{{ Form::hidden('_method', 'PUT') }}
		<section class="bg-white-content">
			@component('comps.btnBack')
				@slot('btnBack')
					{{route('admin.users.index')}}
				@endslot
			@endcomponent

			<br/>
			<br/>
				<div class="row">
					<div class="col-sm-6">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">{{ __('users.email') }}</label>
								<input class="form-control" type="text" name="email" placeholder="email" value="{{ $user->email }}" autocomplete="off" required="" disabled />
							</div>
						</div>
					</div><!-- /.column -->

					<div class="col-sm-6">
						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('current_password'))?'has-error':'')}}">
								<label for="">{{ __('users.current_password') }} <small>*</small></label>
								<input class="form-control" type="password" name="current_password" placeholder="current password" autocomplete="off" required/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('password'))?'has-error':'')}}">
								<label for="">{{ __('users.new_password') }} <small>*</small></label>
								<input class="form-control" type="password" name="password" placeholder="password" autocomplete="off" required/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('confirm_password'))?'has-error':'')}}">
								<label for="">{{ __('users.confirm_password') }} <small>*</small></label>
								<input class="form-control" type="password" name="confirm_password" placeholder="re-password" autocomplete="off" required/>
							</div>
						</div>
					</div><!-- /.column -->
				</div><!--  /.row -->
		</section>
		<br/>

		@include('comps.btnsubmit')
	{!! Form::close() !!}

@endsection

@section('js')
	<script type="text/javascript">

	</script>
@endsection
