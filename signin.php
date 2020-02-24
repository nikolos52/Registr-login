<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);	
		$password = md5($password."AmericanStyleCar");

		$mysql = new mysqli('localhost', 'root', '', 'db');

		$query = sprintf('SELECT * FROM `users` WHERE `email`="%s" AND `password`="%s"', $email, $password);
		
		$result = $mysql->query($query);
		$user = $result->fetch_assoc();

		$mysql->close();

		if(count($user) > 0){
			$data = [
				'email' => $user['email'],
				'last_name' => $user['last_name'],
				'first_name' => $user['first_name'],
				'middle_name' => $user['middle_name'],
				'status' => 1
			];

			setcookie('user', $data, time() + 3600 * 24, '/');
			header('Location: /');
		}
	}

	if(!empty($_COOKIE['user'])){
		header('Location: /');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<title></title>
	</head>
	<body>
		<?php include('components/signin.php'); ?>
	</body>
</html>