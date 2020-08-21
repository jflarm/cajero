<?php  
	
	require_once '../core/config.php';

	class Main_model{
		
		protected function singleton(){
			
			try{
				$options = array(
					PDO::ATTR_PERSISTENT => true,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				); $connection = new PDO(PDO_SDN, SERVER_USER, SERVER_PASS, $options);
			}catch(PDOException $e){
			    echo $error = '<script>alert("'.$e->getMessage().'");</script>';
			}

			return $connection;
		}

		protected function singleQuery($query){
			$connection = self::singleton();
			$response = $connection->prepare($query);
			$response->execute();
			return $response;
		}

		protected function addUser($data){
			
			$connection = Main::singleton();
			$sql = $connection->prepare('
				INSERT INTO admin (AdminDNI, AdminNombre, AdminApellido, AdminTelefono, AdminDireccion, CuentaCodigo)
				VALUES (:DNI, :Nombre, :Apellido, :Telefono, :Direccion, :Codigo)
			');

			$codigo = randomCode(strtoupper($data['nombre'][0]), 6, 1);

			$sql->bindParam(':DNI', $data['dni']);
			$sql->bindParam(':Nombre', $data['nombre']);
			$sql->bindParam(':Apellido', $data['apellido']);
			$sql->bindParam(':Telefono', $data['telefono']);
			$sql->bindParam(':Direccion', $data['direccion']);
			$sql->bindParam(':Codigo', $codigo);
			$sql->execute();
			return $sql;

		}

		protected function getUser($id){
			$connection = Main::singleton();
			$sql = $connection->prepare('SELECT * FROM users where id = :Id');
			$sql->bindParam(':Id', $id);
			$sql->execute();
			return $sql;
		}

		private function encription($str){
			$output = false;
			$key = hash('sha256', SECRET_KEY);
			$iv = substr(hash('sha256', SECRET_IV), 0, 16);
			$output = openssl_encrypt($str, METHOD, $key, 0, $iv);
			$output = base64_encode($output);
			return $output;
		}

		private function decription($str){
			$key = hash('sha256', SECRET_KEY);
			$iv = substr(hash('sha256', SECRET_IV), 0, 16);
			$output = openssl_decrypt(base64_decode($str), METHOD, $key, 0, $iv);
			return $output;
		}

		private function randomCode($char, $long, $num){
			for($i = 1; $i <= $long; $i++){
				$rand = rand(0,9);
				$char.= $rand;
			}
			return $char.'-'.$num;
		}

	}