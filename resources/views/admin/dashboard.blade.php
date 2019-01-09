@extends('layouts.admin')

@section('css')
	<style type="text/css">
	
		/*============= Clock ==============*/
		#clock *{
			font-family: 'lato_r' !important;
		}
		/*============= Clock ==============*/
		#clock{
			margin-top: -1vh;
			text-align: center;
			user-select: none;
		}
		#clock .time .hour-min{
			line-height: 170px;
			font-size: 150px;
			margin-right: 20px;
		}
		#clock .time ul{
			display: inline-block;
		}
		#clock .time ul li{
			line-height: 60px;
			font-size: 65px;
		}
		#clock .time ul .am-pm{
			font-size: 60px;
		}
		#clock .date{
			line-height: 35px;
			font-size: 42px;
		}

		@media (max-width: 768px) {
			#main{
				padding: 0 15px;
			}
			/*====== When sidebar Mobile ======*/
			/*============= Clock ===============*/
			#clock{
				margin-top: 0;
			}
			#clock .time .hour-min{
				line-height: 1em;
				font-size: 85px;
				margin-right: 10px;
				padding: 0;
			}
			#clock .time ul{
				display: inline-block;
			}
			#clock .time ul .am-pm{
				font-size: 35px;
				line-height: 60px;
			}
			#clock .time ul .sec{
				line-height: 10px;
				font-size: 45px;
			}
			#clock .date{
				line-height: 20px;
				font-size: 25px;
			}

		}
	</style>
@endsection

@section('content')
	<div class="container-fluid mt-1 text-purple">
		<div id="clock">
			<div class="time">
				<span class="hour-min"></span>
				<ul class="list-unstyled">
					<li class="am-pm"></li>
					<li class="sec">asdf</li>
				</ul>
			</div>
			<div class="date"></div>
		</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript">
		var interval = setInterval(function() {
			var momentNow = moment();
			$('#clock .date').html(momentNow.format('dddd') +', '+ momentNow.format('DD') +'-'+ momentNow.format('MMM') +'-'+ momentNow.format('YYYY'));
			$('#clock .hour-min').html(momentNow.format('hh:mm'));
			$('#clock .am-pm').html(momentNow.format('A'));
			$('#clock .sec').html(momentNow.format('ss'));
		}, 100);
	</script>
@endsection