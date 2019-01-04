@extends('layouts.admin')

@section('css')
	<style type="text/css">
		.btn-file {
		    position: relative;
		    overflow: hidden;
		}
		.btn-file input[type=file] {
		    position: absolute;
		    top: 0;
		    right: 0;
		    min-width: 100%;
		    min-height: 100%;
		    font-size: 100px;
		    text-align: right;
		    filter: alpha(opacity=0);
		    opacity: 0;
		    outline: none;
		    background: white;
		    cursor: inherit;
		    display: block;
		}

		#img-upload{
			width: 100%;
		}
	</style>
@endsection

@section('content')
	<br/>
	{!! Form::open(['enctype'=>'multipart/form-data', 'url' => route('admin.users.image_update', $user->id)]) !!}
		{{ Form::hidden('_method', 'PUT') }}
			@component('comps.btnBack')
				@slot('btnBack')
					{{route('admin.users.index')}}
				@endslot
			@endcomponent
			<br/>
			<br/>
			<div class="row justify-content-center">
				<div class="col-sm-6">
					<section class="bg-white-content">
						<img id='img-upload' style="border: 1px solid red;" src="/images/users/{{$user->image}}" />
						<div class="input-group mt-2">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse… <input type="file" id="imgInp" name="user_image">
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
					</section>
				</div>
			</div>
		<br/>
		<br/>

		@include('comps.btnsubmit')
	{!! Form::close() !!}
		<br/>
		<br/>
		<br/>
		<br/>

@endsection

@section('js')
	<script type="text/javascript">
		window.addEventListener('DOMContentLoaded', function() {
        (function($) {
          $(document).on('change', '.btn-file :file', function() {
					var input = $(this),
						label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
					input.trigger('fileselect', [label]);
					});

					$('.btn-file :file').on('fileselect', function(event, label) {
					    
					    var input = $(this).parents('.input-group').find(':text'),
					        log = label;
					    
					    if( input.length ) {
					        input.val(log);
					    } else {
					        if( log ) alert(log);
					    }
				    
					});
					function readURL(input) {
					    if (input.files && input.files[0]) {
					        var reader = new FileReader();
					        
					        reader.onload = function (e) {
					            $('#img-upload').attr('src', e.target.result);
					        }
					        
					        reader.readAsDataURL(input.files[0]);
					    }
					}

					$("#imgInp").change(function(){
					    readURL(this);
					}); 	
        })(jQuery);
    });
	  	
	</script>
@endsection
