<?php

$email = filter_var(trim($_POST['email']),
         FILTER_SANITIZE_STRING);

$password = filter_var(trim($_POST['password']),
            FILTER_SANITIZE_STRING);	

$last_name = filter_var(trim($_POST['last_name']),
            FILTER_SANITIZE_STRING);

$first_name = filter_var(trim($_POST['first_name']),
            FILTER_SANITIZE_STRING);

$middle_name = filter_var(trim($_POST['middle_name']),
            FILTER_SANITIZE_STRING);




$password = md5($password."AmericanStyleCar");



$mysql = new mysqli('localhost','root','','db');

$mysql->query("INSERT INTO `users` (`email`, `password`, `last_name`, `first_name`, `middle_name`) VALUES('$email', '$password', '$last_name', '$first_name', '$middle_name')");

$mysql->close();

header('Location: index.php');

?>