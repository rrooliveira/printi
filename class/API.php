<?php 
/*
 *	Developer  : Rodrigo Ruy Oliveira
 *	Date	   : 2018-09-13
 *	Description: Class for get data from Intelipost 
 */
class API{
	public function getIntelipost($origin, $destination, $weight, $cost_of_goods, $width, $height, $length){	
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.intelipost.com.br/api/v1/quote",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "{\"origin_zip_code\":\"$origin\",\"destination_zip_code\":\"$destination\",\"volumes\":[{\"weight\":$weight,\"volume_type\":\"BOX\",\"cost_of_goods\":$cost_of_goods,\"width\":$width,\"height\":$height,\"length\":$length}],\"additional_information\":{\"free_shipping\":false,\"extra_cost_absolute\":0,\"extra_cost_percentage\":0,\"lead_time_business_days\":0,\"sales_channel\":\"hotsite\",\"tax_id\":\"22337462000127\",\"client_type\":\"gold\",\"payment_type\":\"CIF\",\"is_state_tax_payer\":false,\"delivery_method_ids\":[1,2,3]},\"identification\":{\"session\":\"04e5bdf7ed15e571c0265c18333b6fdf1434658753\",\"page_name\":\"carrinho\",\"url\":\"http://www.intelipost.com.br/checkout/cart/\"}}",
				CURLOPT_HTTPHEADER => array(
						"api-key: 9009f95101bf48b01a50928a2a71ed1ae9083fc1d3c08439b0613dfc38e656c5",
						"content-type: application/json",
						"platform: intelipost-docs",
						"platform-version: v1.0.0",
						"plugin: intelipost-plugin",
						"plugin-version: v2.0.0"
				),
		));
		
		$response = curl_exec($curl);
		$err 	  = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return false;
		} else {
			return $response;
		}
	}
}
?>