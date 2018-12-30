@extends('layouts.login')

@section('css')
	<style type="text/css">
    .login-form{
      margin-top: 20vh;
    }
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-sm-7">
				<div class="card login-form">
					<div class="card-header text-primary pb-4 pt-4">
						<h3 class="card-title mb-0"><i class="fa fa-User"></i> LOGIN</h3>
					</div>
					<div class="card-body mt-2">
						<form id="LoginForm" novalidate="novalidate" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="vs-form-group mb-4">
								<label for="email" class="bmd-label-floating"><i class="fa fa-envelope"></i> Email Address</label>
								<input type="email" class="vs-form-control vs-form-control-success {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" required="true" aria-required="true" value="{{ old('email') }}" required>

								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="vs-form-group mb-4">
								<label for="password" class="bmd-label-floating"><i class="fa fa-lock"></i> Password</label>
								<input type="password" class="vs-form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" required="true" name="password" aria-required="true" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
								</label>
							</div>
							<div class="mt-5 mb-1">
								<button type="submit" class="btn btn-primary waves-effect waves-light btn-block" ><i class="fa fa-sign-in-alt"></i> Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript">
		function setFormValidation(id) {
			$(id).validate({
				highlight: function(element) {
					$(element).closest('.vs-form-group').removeClass('has-success mb-4').addClass('has-danger mb-0');
					$(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
				},
				success: function(element) {
					$(element).closest('.vs-form-group').removeClass('has-danger mb-0 mb-4').addClass('has-success mb-0');
					$(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
				},
				errorPlacement: function(error, element) {
					$(element).closest('.vs-form-group').append(error);
				},
			});
		}

		$(document).ready(function() {
			setFormValidation('#LoginForm');
		});
	</script>
@endsection
