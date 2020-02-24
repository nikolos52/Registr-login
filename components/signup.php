<!-- Наверное ты всё-таки делаешь регистрацию, поэтому путь желательно поменять -->
<form action="signup.php" method="POST">
	<!-- Общий совет - не забывай про атрибут required -->
	<input type="email" name="email" placeholder="Введите EMail" required>

	<input type="password" name="password" placeholder="Введите пароль"><br>

	<input type="text" name="last_name" placeholder="Введите фамилию"><br>

	<input type="text" name="first_name" placeholder="Введите имя"><br>

	<input type="text" name="middle_name" placeholder="Введите отчество"><br>

	<!-- Не забывай указывать тип кнопки -->
	<button type="submit">Дальше</button>
</form>