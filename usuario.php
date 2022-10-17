<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	include('database.php');

	$conn = mysqli_connect($hostname, $host_user, $host_password, $database);

	switch ($_POST['opcion']) {
		
		case 'login':
			$email = $_POST['email'];
			$password = $_POST['password'];

			$query = "SELECT *FROM usuarios WHERE email = '$email' AND password = MD5('$password')";
			$res = mysqli_fetch_array(mysqli_query($conn,$query));

				if (isset($res)) {
					$response["error"] = false;
					$response["mensaje"] = "Datos correctos";
				}
				else{
					$response["error"] = true;
					$response["mensaje"] = "Datos incorrectos";
				}
			break;
	}
	mysqli_close($conn);
	echo json_encode($response);

}
?>