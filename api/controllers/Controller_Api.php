<?php  

	class Controller_Api{

		protected function send($request){


			$request = self::inspectedRequest($request);
			$controller = ucwords($request->controller); 
			$file = './controllers/Controller_'.$controller.'.php';

			if(is_file($file)){
				
				require_once $file;

				if(method_exists($class, $request->method)){
					$method = strval($request->method);
					$param = $request->param;
					return $class->$method($param);
				}
				
				return json_encode(array(
					'status'=>'KO', 
					'message'=>'Error: Method not found!'
				));
				
			}	

			return json_encode(array(
				'status'=>'KO', 
				'message'=>'Error: Controller not found!'
			));
			
		}

		private function inspectedRequest($request){
			
			//Pendiente de validacion...
			return $request;

		}
	
	}