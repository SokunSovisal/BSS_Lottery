@extends('layouts.admin')

@section('css')
	<style type="text/css">

	</style>
@endsection

@section('content')
	{!! Form::open(['url' => route('admin.users.update', $user->id)]) !!}
		{{ Form::hidden('_method', 'PUT') }}
		<section class="bg-white">
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
								<label for="">{{ __('users.name') }}</label>
								<input class="form-control nbr" type="text" name="name" placeholder="name" value="{{ $errors->has('name') ? old('name') : $user->name }}" autocomplete="off" required="" />
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('name'))?'has-error':'')}}">
								<label for="">{{ __('users.gender') }} <small>*</small></label>
								<select name="gender" class="form-control nbr select2" required>
									<option value="">-- {{ __('users.chooseGender') }} --</option>
										<option value="1" {{ (($user->gender == 1) || ((count($errors) > 0) && (old('gender') == 1))) ? 'selected':'' }}>{{ __('users.male') }}</option>
										<option value="2" {{ (($user->gender == 2) || ((count($errors) > 0) && (old('gender') == 1))) ? 'selected':'' }}>{{ __('users.female') }}</option>
										<option value="3" {{ (($user->gender == 3) || ((count($errors) > 0) && (old('gender') == 1))) ? 'selected':'' }}>{{ __('users.other') }}</option>
								</select>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group {{(($errors->has('phone'))?'has-error':'')}}">
								<label for="">{{ __('users.phone') }} <small>*</small></label>
								<input class="form-control nbr" type="text" name="phone" placeholder="phone" value="{{ $errors->has('phone') ? old('phone') : $user->phone }}" autocomplete="off" required="" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">{{ __('users.description') }}</label>
								<textarea class="form-control nbr" name="description" style="height: 108px;" placeholder="description">{{ ((count($errors) > 0) ? old('description') : $user->description) }}</textarea>
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
