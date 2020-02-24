<?php
	// Есть способы "валидации" данных и получше, но и это сойдёт. В будущем желательно этот момент изменить
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
	$first_name = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
	$middle_name = filter_var(trim($_POST['middle_name']), FILTER_SANITIZE_STRING);

	// Ты конечно молодец, что используешь md5, но есть вариант получше, ибо в данный вариант ты ещё можешь добавить "соль". Загугли "php hash соль"
	$password = hash('SHA512', $passowrd);

	$mysql = new mysqli('localhost', 'root', '', 'db');

	// При помощи PHP функции sprintf ты можешь очень удобно составить запрос
	$query = sprintf('INSERT INTO `users`(`email`, `password`, `last_name`, `first_name`, `middle_name`)
		VALUES("%s", "%s", "%s", "%s", "%s")', $email, $password, $last_name, $first_name, $middle_name);

	$mysql->query($query);
	$mysql->close();

	// Теперь, когда ты добавил пользователя в базу данных - тебе нужно создать "куку", ибо нормальная практика сразу после регистрации авторизовать пользователя
	// И да, тут лучше указать его email, ибо по нему ты будешь его авторизовать. Как вариант - хранить массив информаци о нём, чтобы минимально дёргать БД
	$user = [
		'email' => $email,
		'last_name' => $last_name,
		'first_name' => $first_name,
		'middle_name' => $middle_name,
		'status' => 1
	];
	setcookie('user', $user, time() + 3600 * 24, '/');

	header('Location: index.php');
?>