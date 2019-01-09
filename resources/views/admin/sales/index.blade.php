@extends('layouts.admin')

@section('css')
	<style type="text/css">
	
	</style>
@endsection

@section('content')
	<!-- Header -->
	<div class="header pb-3 pt-3">
		<div class="container-fluid">
			<form>
				<div class="row justify-content-center">
	        <div class="form-group col-sm-4">
	          <label class="form-control-label" for="input_source">Input</label>
	          <textarea class="form-control rounded-0" id="input_source" rows="10" onkeyup="analyze_input(this.value)"></textarea>
	        </div>
	        <div class="form-group col-sm-2 text-center pt-8">
	        	<span class="btn btn-primary"><i class="fa fa-angle-right"></i></span>
	        </div>
	        <div class="form-group col-sm-4">
	          <label class="form-control-label" for="input_result">Output</label>
	          <textarea class="form-control rounded-0" id="input_result" rows="10"></textarea>
	        </div>
				</div>
      </form>
		</div>
	</div>

@endsection
@section('js')
	<script type="text/javascript">
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
				alert('treng');
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
				alert('ors kbal');		
			}else if(input_text.indexOf("||")>0 && input_text.indexOf("|||")<=0){
				v_ors_column_2 = true;		
				alert('ors kandal');	
			}else if(input_text.indexOf("|||")>0){
				v_ors_column_3 = true;		
				alert('ors kon tuy');	
			}else if(input_text.indexOf("==")>0){
				v_ors_double = true;		
				alert('ors double');	
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