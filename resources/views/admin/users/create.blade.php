@extends('layouts.admin')

@section('css')
	<style type="text/css">

	</style>
@endsection

@section('content')
	{!! Form::open(['url' => route('admin.users.store')]) !!}
		<section class="bg-white-content">
			
			<!-- Back Button & Error Message -->
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
							<div class="form-group {{(($errors->has('name'))?'has-error':'')}}">
								<label class="control-label">{{ __('users.name') }} <small>*</small></label>
								<input class="form-control" type="text" name="name" placeholder="name" value="{{ ((count($errors) > 0) ? old('name') : '') }}" autocomplete="off" required />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('email'))?'has-error':'')}}">
								<label>{{ __('users.email') }} <small>*</small></label>
								<input class="form-control" type="text" name="email" placeholder="email" value="{{ ((count($errors) > 0) ? old('email') : '') }}" autocomplete="off" required="" />
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('password'))?'has-error':'')}}">
								<label>{{ __('users.password') }} <small>*</small></label>
								<input class="form-control" type="password" name="password" placeholder="password" autocomplete="off" required="" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('confirm_password'))?'has-error':'')}}">
								<label>{{ __('users.confirm_password') }} <small>*</small></label>
								<input class="form-control" type="password" name="confirm_password" placeholder="re-password" autocomplete="off" required="" />
							</div>
						</div>

					</div>

					<div class="col-sm-6">
						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('gender'))?'has-error':'')}}">
								<label>{{ __('users.gender') }} <small>*</small></label>
								<select name="gender" class="form-control" required>
									<option value="">-- {{ __('users.chooseGender') }} --</option>
										<option value="1" {{ ((count($errors) > 0) && (old('gender') == 1)) ? 'selected':'' }}>{{ __('users.male') }}</option>
										<option value="2" {{ ((count($errors) > 0) && (old('gender') == 2)) ? 'selected':'' }}>{{ __('users.female') }}</option>
										<option value="3" {{ ((count($errors) > 0) && (old('gender') == 3)) ? 'selected':'' }}>{{ __('users.other') }}</option>
								</select>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('phone'))?'has-error':'')}}">
								<label>{{ __('users.phone') }} <small>*</small></label>
								<input class="form-control" type="text" name="phone" placeholder="phone" value="{{ ((count($errors) > 0) ? old('phone') : '') }}" autocomplete="off" required="" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>{{ __('users.description') }}</label>
								<textarea class="form-control" name="description" style="height: 145px;" placeholder="description">{{ ((count($errors) > 0) ? old('description') : '') }}</textarea>
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
