<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
       	<title></title>
       	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<style>
		div.bg{
			background-color:#e6f3ff;
		}
	</style>
	<body>
	<form name="form_printi" id="form_printi" method="POST" action="process.php">
		<div class="container">
			<div class="row bg">
				<div class="col">
					<img src="public/images/printi.jpg" class="img-fluid" alt="Printi">
					<br /><br />					
				</div>
			</div>
			<div class="row bg">
				<div class="col text-center">
					<h4>SISTEMA PARA CÁLCULO DE FRETE</h4>
					<br />				
				</div>
			</div>
			<div class="row bg">
					<div class="form-group col-3">
						<label for="origin_zip_code">Origin Zip Code</label>
						<input type="text" class="form-control" name="origin_zip_code" id="origin_zip_code" required>
					</div>
					<div class="form-group col-3">
						<label for="destination_zip_code​">Destination Zip Code</label>
						<input type="text" class="form-control" name="destination_zip_code​" id="destination_zip_code​" required>
					</div>
					<div class="form-group col-3">
						<label for="weight​">Weight</label>
						<input type="text" class="form-control format" name="weight​" id="weight​" class="float" required>
					</div>
					<div class="form-group col-3">
						<label for="cost_of_goods​">Cost of Goods</label>
						<input type="number" step=0.01 class="form-control" name="cost_of_goods​" id="cost_of_goods​" required>
					</div>
			</div>
			<div class="row bg">
					<div class="form-group col-3">
						<label for="width​">Width</label>
						<input type="number" class="form-control" name="width​" id="width​" required>
					</div>
					<div class="form-group col-3">
						<label for="height​">Height</label>
						<input type="number" class="form-control" name="height​" id="height​" required>
					</div>
					<div class="form-group col-3">
						<label for="length​">Length</label>
						<input type="number" class="form-control" name="length​" id="length​" required>
					</div>
					<div class="form-group col-3">
						&nbsp;	
					</div>
			</div>
			<div class="row bg">
					<div class="col-12 text-center"">
						<input type="submit" class="btn btn-primary" value="Calcular">
					</div>
			</div>
			<div class="row bg center-block">
				<div class="col-12 center-block">
					<span><strong>Desenvolvedor</strong></span><br />
					<span> Rodrigo Ruy Oliveira</span><br />
					<span><img src="public/images/skype.png" width="20" height="20" class="img-fluid" alt="Skype" title="Skype">&nbsp;rodrigo.ruy.oliveira</span><br />
					<span><img src="public/images/whatsapp.png" width="20" height="20" class="img-fluid" alt="WhatsApp" title="WhatsApp">&nbsp;(11) 98209-5120</span>
					<br /><br />		
				</div>
			</div>		
		</div>
	</form>					
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="public/js/jquery.mask.min.js"></script>
    <script>
    	$(document).ready(function(){
    		$('#origin_zip_code').mask('99999-999');
    		$('#destination_zip_code​').mask('99999-999');

    		$('.format').mask("#,##0.00", {reverse: true});

    		$('#form_printi').submit(function(){    	
        		var zip_origin = $('#origin_zip_code').val();
        		var zip_dest   = $('#destination_zip_code​').val();

        		if(zip_origin.length == 9 && zip_dest.length == 9){
					if(zip_origin === zip_dest){
						alert('The origin and destination zip codes are equals.');
						return false;
					}
        		}else{
        			alert('Please, fill the origin and destination zip codes correctly.');
					return false;
            	}
        	});
		});

    </script>
   </body>
</html>