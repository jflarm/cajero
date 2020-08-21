<?php  
	
	class Cuenta{

		public function getCuenta($id){
			return json_encode(array('status'=>'OK','message'=>'metodo getCuenta: busca getCuenta con id = '.$id));
		}
		
	}

	$class = new Cuenta;