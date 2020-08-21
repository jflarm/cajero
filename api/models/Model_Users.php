<?php  

	require_once './models/Main_model.php';

	class Model_users extends Main_model{

		//CRUD
		//-------------------------------------------------------------------------------------------------------
		protected function addUser($data){
			return json_encode(array('status'=>'OK','message'=>'metodo addUser: crea usuario','data'=>$data));
		}

		protected function getUser($id){
			return json_encode(array('status'=>'OK','message'=>'metodo getUser: busca usuario con id '.$id));
		}

		protected function getAllUsers(){
			return json_encode(array('status'=>'OK','message'=>'metodo getAllUsers: devuelbe todos los usuarios'));
		}

		protected function updateUser($id){
			return json_encode(array('status'=>'OK','message'=>'metodo updateUser: actualiza usuario con id '.$id));
		}

		protected function deleteUser($id){
			return json_encode(array('status'=>'OK','message'=>'metodo deleteUser: borra usuario con id '.$id));
		}

		protected function getLastUser(){
			return json_encode(array('status'=>'OK','message'=>'metodo getLastUser: obtiene ultimo usuario'));
		}

	}