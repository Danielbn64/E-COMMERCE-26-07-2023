<?php require_once('controllers/UserController.php') ?>
<span class="strip">
	<a href="<?= base_url ?>">
		<img class="logo-mobile" src="<?= base_url ?>/assets/svg/logo.svg" />
	</a>
</span>
<h1 class=title>Registrarse</h1>
<div class="form-container">
	<?php
	if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
		<strong class="alert_green">Registro completado correctamente</strong>
	<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
		<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
	<?php endif; ?>
	<?php Utils::deleteSession('register'); ?>

	<form action="<?= base_url ?>user/save" method="POST">
		<label for="name">Nombre</label>
		<input type="text" name="name" />
		<?php if (isset($_SESSION['error_name']) && $_SESSION['error_name'] == "true") : ?>
			<span>El nombre no es válido</span>
		<?php endif ?>

		<label for="surnames">Apellidos</label>
		<input type="text" name="surnames" />
		<?php if (isset($_SESSION['error_surnames']) && $_SESSION['error_surnames'] == "true") : ?>
			<span>Los apellidos no son válido</span>
		<?php endif ?>

		<label for="email">Email</label>
		<input type="email" name="email" />
		<?php if (isset($_SESSION['error_email']) && $_SESSION['error_email'] == "true") : ?>
			<span>El correo no es válido</span>
		<?php endif ?>

		<label for="password">Contraseña</label>
		<input type="password" name="password" require />
		<?php if (isset($_SESSION['error_password']) && $_SESSION['error_password'] == "true") : ?>
			<span>La contraseña debe tener minimo 6 caracteres una letra mayuscula y un numero sin espacios en blanco</span>
		<?php endif ?>
		<input class="button button-margin" type="submit" value="Registrarse" />
	</form>
</div>