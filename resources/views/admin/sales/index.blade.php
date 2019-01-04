@extends('layouts.admin')

@section('css')
	<style type="text/css">
		table.calculator{

		}
		table.calculator tr.font-size-normal td .btn{
			font-size: 15px;
		}
		table.calculator tr td .btn{
			border-radius: 2px;
			font-size: 18px;
		}
		table.calculator tr td .btn i{
			font-size: 14.5px;
		}
		table.calculator tr td{
			min-width: 100px;
		}
		#input_source{
			font-size: 25px;
		}
	</style>
@endsection

@section('content')
	<!-- Header -->
	<div class="header pb-3 pt-3">
		<div class="container-fluid">
			<form>
				<div class="row justify-content-center">
	        
	        <div class="form-group col-sm-3">
	          <label class="form-control-label" for="input_result">Button</label>
	        	<table class="calculator">
	        		<tr class="font-size-normal">
	        			<td  colspan="1"><button class="btn btn-primary btn-block" onclick="getSign(' ')" type="button">Space</button></td>
	        			<td  colspan="2"><button class="btn btn-primary btn-block" onclick="getSign('\n')" type="button">Enter</button></td>
	        		</tr>
	        		<tr>
	        			<td><button class="btn btn-warning btn-block" onclick="getSign('*')" type="button"><i class="fa fa-star-of-life"></i></button></td>
	        			<td><button class="btn btn-warning btn-block" onclick="getSign('x')" type="button"><i class="fa fa-times"></i></button></td>
	        			<td><button class="btn btn-warning btn-block" onclick="getSign('>')" type="button"><i class="fa fa-angle-right"></i></button></td>
	        		</tr>
	        		<tr>
	        			<td><button class="btn btn-warning btn-block" onclick="getSign('.')" type="button">.</button></td>
	        			<td><button class="btn btn-warning btn-block" onclick="getSign('|')" type="button"><strong>|</strong></button></td>
	        			<td><button class="btn btn-warning btn-block" onclick="getSign('=>')" type="button"><i class="fa fa-arrow-right"></i></button></td>
	        		</tr>
	        		<tr>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('1')" type="button">1</button></td>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('2')" type="button">2</button></td>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('3')" type="button">3</button></td>
	        		</tr>
	        		<tr>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('4')" type="button">4</button></td>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('5')" type="button">5</button></td>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('6')" type="button">6</button></td>
	        		</tr>
	        		<tr>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('7')" type="button">7</button></td>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('8')" type="button">8</button></td>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('9')" type="button">9</button></td>
	        		</tr>
	        		<tr>
	        			<td><button class="btn btn-danger btn-block" onclick="$('#input_source').val('')" type="button">C</button></td>
	        			<td><button class="btn btn-info btn-block" onclick="getSign('0')" type="button">0</button></td>
	        			<td><button class="btn btn-danger btn-block" onclick="delete_num()" type="button"><i class="fa fa-backspace"></i></button></td>
	        		</tr>
	        	</table>
	        </div>
	        <div class="form-group col-sm-4">
	          <label class="form-control-label" for="input_source">Input</label>
	          <textarea class="form-control rounded-0" id="input_source" style="height: 358px;" onkeyup="analyze_input(this.value)"></textarea>
	        </div>
	        <div class="form-group col-sm-1 text-center pt-9 mt-4">
	        	<span class="btn btn-primary"><i class="fa fa-angle-double-right"></i></span>
	        </div>
	        <div class="form-group col-sm-4">
	          <label class="form-control-label" for="input_result">Output</label>
	          <textarea class="form-control rounded-0" id="input_result" style="height: 358px;"></textarea>
	        </div>
				</div>
      </form>
		</div>
	</div>

@endsection
@section('js')
	<script type="text/javascript">

		$('#input_source').val('');

		function getSign(sign) {
			$('#input_source').val($('#input_source').val()+sign).focus();
			analyze_input($('#input_source').val())
		}

		function delete_num (){
	    $('#input_source').val($('#input_source').val().slice(0, -1));
		}


		function analyze_input(input_text){
			v_treng = false;
			v_kun = false;
			v_ors = false;
			v_ching = false;
			ching_no_douple = false;
			v_ors_column_1 = false;
			v_ors_column_2 = false;
			v_ors_column_3 = false;
			v_ors_double = false;
			if(input_text.indexOf(".") >0){
				v_treng = true;
				// alert('treng');
			}else if(input_text.indexOf("*") >0){
				v_kun = true;
				// alert('kun');
				v_num = input_text.split('*')[0];
				v_amount = input_text.split('*')[1];
				kun_3number(v_num);
			}else if(input_text.indexOf(">")>0 && !((input_text.indexOf("=>")>0)) && !((input_text.indexOf("=>=>")>0)) ){
				v_ors = true;		
				// alert('ors');
				v_num = input_text.split('>')[0];
				v_amount = input_text.split('>')[1];
				ors(v_num);	
			}else if(input_text.indexOf("=>")>0  && !(input_text.indexOf("=>=>")>0)){
				v_ching = true;		
				// alert('ching');	
				v_num = input_text.split('=>')[0];
				v_amount = input_text.split('=>')[1];
				var lines = v_num.toString().split('\n');
				if(lines[0].length==2){
					ching_2number(v_num);
				}else if(lines[0].length==3){
					ching_3number(v_num);
				}
			}else if(input_text.indexOf("=>=>")>0){
				ching_no_douple = true;
				// alert('ching but no double');		
				var lines = v_num.toString().split('\n');
				if(lines[0].length==2){
					ching_2number_no_doub(v_num);
				}else if(lines[0].length==3){
					ching_3number_no_doub(v_num);
				}
			}else if(input_text.indexOf("|")>0 && input_text.indexOf("||")<=0 && input_text.indexOf("|||")<=0){
				v_ors_column_1 = true;	
				// alert('ors kbal');		
			}else if(input_text.indexOf("||")>0 && input_text.indexOf("|||")<=0){
				v_ors_column_2 = true;		
				// alert('ors kandal');	
			}else if(input_text.indexOf("|||")>0){
				v_ors_column_3 = true;		
				// alert('ors kon tuy');	
			}else if(input_text.indexOf("==")>0){
				v_ors_double = true;		
				// alert('ors double');	
			}
		}


		function ching_3number(n){
			$('#input_result').html('');
			var lines = n.toString().split('\n');
			var col_1 = [];
			var col_2 = [];
			var col_3 = [];
			var result = [];
			for(var i=0; i<lines.length; i++){
				col_1.push(lines[i].charAt(0).toString());
				col_2.push(lines[i].charAt(1).toString());
				col_3.push(lines[i].charAt(2).toString());
			}
			if(col_1.length == col_2.length && col_1.length == col_3.length){
				for (var i=0; i<(col_1.length); i++) {
					for (var j=0; j<(col_2.length); j++) {
						for (var k=0; k<(col_3.length); k++) {
							if(col_1[i].trim()=="" || col_2[j].trim()=="" || col_3[k].trim()==""){ continue; }
							if( result.includes(col_1[i]+col_2[j]+col_3[k]) ){ continue; }
							result.push(col_1[i]+col_2[j]+col_3[k]);
						}
					}
				}
			}
			$('#input_result').html("["+result.length+"]\n"+result);
		}
		function ching_3number_no_doub(n){
			$('#input_result').html('');
			var lines = n.toString().split('\n');
			var col_1 = [];
			var col_2 = [];
			var col_3 = [];
			var result = [];
			for(var i=0; i<lines.length; i++){
				col_1.push(lines[i].charAt(0).toString());
				col_2.push(lines[i].charAt(1).toString());
				col_3.push(lines[i].charAt(2).toString());
			}
			if(col_1.length == col_2.length && col_1.length == col_3.length){
				for (var i=0; i<(col_1.length); i++) {
					for (var j=0; j<(col_2.length); j++) {
						for (var k=0; k<(col_3.length); k++) {
							if(col_1[i]==col_2[j] && col_1[i]==col_3[k]){ continue; }
							if(col_1[i].trim()=="" || col_2[j].trim()=="" || col_3[k].trim()==""){ continue; }
							if( result.includes(col_1[i]+col_2[j]+col_3[k]) ){ continue; }
							result.push(col_1[i]+col_2[j]+col_3[k]);
						}
					}
				}
			}
			$('#input_result').html("["+result.length+"]\n"+result);
		}
		function ching_2number(n){
			$('#input_result').html('');
			var lines = n.toString().split('\n');
			var col_1 = [];
			var col_2 = [];
			var result = [];
			for(var i=0; i<lines.length; i++){
				col_1.push(lines[i].charAt(0).toString());
				col_2.push(lines[i].charAt(1).toString());
			}
			if(col_1.length == col_2.length){
				for (var i=0; i<(col_1.length); i++) {
					for (var j=0; j<(col_2.length); j++) {
						if(col_1[i].trim()=="" || col_2[j].trim()==""){ continue; }
						if( result.includes(col_1[i]+col_2[j]) ){ continue; }
						result.push(col_1[i]+col_2[j]);
					}
				}
			}
			$('#input_result').html("["+result.length+"]\n"+result);
		}
		function ching_2number_no_doub(n){
			$('#input_result').html('');
			var lines = n.toString().split('\n');
			var col_1 = [];
			var col_2 = [];
			var result = [];
			for(var i=0; i<lines.length; i++){
				col_1.push(lines[i].charAt(0).toString());
				col_2.push(lines[i].charAt(1).toString());
			}
			if(col_1.length == col_2.length){
				for (var i=0; i<(col_1.length); i++) {
					for (var j=0; j<(col_2.length); j++) {
						if(col_1[i]==col_2[j]){ continue; }
						if(col_1[i].trim()=="" || col_2[j].trim()==""){ continue; }
						if( result.includes(col_1[i]+col_2[j]) ){ continue; }
						result.push(col_1[i]+col_2[j]);
					}
				}
			}
			$('#input_result').html("["+result.length+"]\n"+result);
		}
		function kun_3number(n){
			$('#input_result').html('');
			n=n.toString();
			var result = [];
			for (var i=0; i<(n.length); i++) {
				for (var j=0; j<(n.length); j++) {
					if(i==j){ continue; }
					for (var k=0; k<(n.length); k++) {
						if(k==i || k== j){ continue; }
						// if(==0){ continue; }
						if(result.includes(n.charAt(i)+n.charAt(j)+n.charAt(k))){ continue; }
						result.push(n.charAt(i)+n.charAt(j)+n.charAt(k));	
					}
				}
			}
			$('#input_result').html("["+result.length+"]\n"+result);
		}
	</script>
@endsection