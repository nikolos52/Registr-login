<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 	
	<title>
	</title>
</head>
<body>
	<div>
        
        <?php 

        if ($_COOKIE['user'] == ''):       	
         ?>



		<form action="check.php" method="post">

		<input type="email" name="email" placeholder="Введите email"><br>			
		
		<input type="password" name="password" placeholder="Введите парольчик"><br>

		<input type="text" name="last_name" placeholder="Введите фамилию"><br>

		<input type="text" name="first_name" placeholder="Введите имя "><br>	
		
		<input type="text" name="middle_name" placeholder="Введите отчество "><br>				

        <button> Дальше </button>					


		</form>

	<?php else: ?>
    <p> Добро пожаловать <?=$_COOKIE['user']?>. Что бы выйти нажмите <a href="/exit.php"> здесь </a></p>
	<?php endif; ?>

	</div>
</body>
</html>