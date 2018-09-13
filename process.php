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
		<div class="container">
			<div class="row">
				<div class="col">
					<img src="public/images/printi.jpg" class="img-fluid" alt="Printi">
					<br /><br />					
				</div>
			</div>
			<div class="row">
				<div class="col text-center">
					<h4>RESULTADO DA BUSCA</h4>
					<br />				
				</div>
			</div>
			<?php
			include_once 'class/API.php';
						
			//FUNÇÃO PARA ORDERNAR
			function comparar($a, $b) {
				return $a['cost'] > $b['cost'];
			}
			
			$objAPI = new API();
			
			//GET THE VALUES
			$origin 		= $_POST['origin_zip_code'];
			$destination 	= $_POST['destination_zip_code​'];
			$weight 		= $_POST['weight​'];
			$cost_of_goods 	= $_POST['cost_of_goods​'];
			$width 			= $_POST['width​'];
			$height 		= $_POST['height​'];
			$length 		= $_POST['length​'];
			
			$retorno = $objAPI->getIntelipost($origin, $destination, $weight, $cost_of_goods, $width, $height, $length);
			$objResposta = json_decode($retorno);
			
			if($objResposta->status == 'OK'){
			?>
			<div class="row">
				<div class="col text-center">
					<table class="table">
						<thead class="thead-light">
							<th scope="col">#</th>
							<th scope="col">Estimate Business Days</th>
							<th scope="col">Shipping Cost</th>
							<th scope="col">Description</th>
						</thead>
						<tbody>
						<?php 
							$i = 1;
							$ordernar = array();
							foreach($objResposta->content->delivery_options as $chave => $valor){
								$id = $valor->final_shipping_cost;
								$ordernar[$id]['days'] = $valor->delivery_estimate_business_days;
								$ordernar[$id]['cost'] = $valor->final_shipping_cost;
								$ordernar[$id]['description'] = $valor->description;
							}
							
							// ORDENAR O ARRAY
							usort($ordernar, 'comparar');
							
 							foreach($ordernar as $chave => $valor){
 								echo "<tr>
 										<th scope='row'><input type='checkbox' value='$i' id='check{$i}'></th>
 										<th scope='row'>{$valor['days']}</th>
 										<th scope='row'>{$valor['cost']}</th>
 										<th scope='row'>{$valor['description']}</th>
 									  </tr>";
 								$i++;
 							}
						?>
					</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<button type="submit" name="confirmar" id="confirmar" class="btn btn-primary">OK</button>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-12 text-center">
					<?php 
						$z = 1;
						foreach($objResposta->content->delivery_options as $c => $v){
							echo "<div style='display:none' class='option$z bg-success text-white'>" . $v->description . ', ' . $v->final_shipping_cost . ' $, ' . $v->delivery_estimate_business_days." day</div>";
						}
					?>
				</div>
			</div>
			<?php 
			}else{
			?>
				<div class="row">
					<div class="col-12 p-3 mb-2 bg-danger text-white erro text-center">
						<h5><?php echo $objResposta->messages[0]->text;?></h5>
					</div>
				</div>
			<?php 
			}
			?>
			<br />
			<div class="row">
				<div class="col-12">
					<button type="submit" onclick="javascript:history.go(-1)" class="btn btn-primary">Voltar</button>
				</div>
			</div>
		</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
	    $(document).ready(function(){
			$('#confirmar').click(function() {
				$("input[type=checkbox]:checked").each(function() {
					$('.option'+$(this).val()).show();
				});
			});
	    });
    </script>
	</body>
</html>