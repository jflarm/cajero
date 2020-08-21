<?php 

    //  3 lineas muestran errores de PHP en el browser
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// $_REQUEST sirve para tratar $_GET y $_POST simultaneamente
	// Usuario hara peticcion (JSON) con forma:
	// method = getUsers, data= ???

	header("Access-Control-Allow-Origin: *"); //-->permite acceso desde cualquier sitio - Cross-Origin Resource Sharing (CORS)
	header("Content-Type: application/json"); //--> envia como JSON los echos

	$method = $_SERVER['REQUEST_METHOD'];
	$request = json_decode(file_get_contents('php://input'));
	
	require_once './core/Allowed_Methods.php';
	require_once './Init_Api.php';

	Init_Api::sendRequest($method, $request, $method_list);
 ?>