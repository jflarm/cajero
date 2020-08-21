<?php

	require_once '../api/models/Model_users.php';  

	class Users extends Model_users{

		//USERS CRUD
		//-------------------------------------------------------------------------------------------------------
		public function addUser($data){
			return Model_users::addUser($data);
		}

		public function getUser($id){
			return Model_users::getUser($id);
		}

		public function getAllUsers(){
			return Model_users::getAllUsers();
		}

		public function getLastUser(){
			return Model_users::getLastUser();
		}

		public function updateUser($id){
			return Model_users::updateUser($id);
		}

		public function deleteUser($id){
			return Model_users::deleteUser($id);
		}

			

	}

	$class = new Users;