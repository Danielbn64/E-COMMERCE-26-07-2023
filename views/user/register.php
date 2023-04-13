<h1 class=title>Registrarse</h1>
<div class="container">
	<?php 
	if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
		<strong class="alert_green">Registro completado correctamente</strong>
	<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
		<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
	<?php endif; ?>
	<?php Utils::deleteSession('register'); ?>

</div>
<form action="<?= base_url ?>user/save" method="POST">
	<label for="name">Nombre</label>
	<input type="text" name="name" required />

	<label for="surnames">Apellidos</label>
	<input type="text" name="surnames" required />

	<label for="email">Email</label>
	<input type="email" name="email" required />

	<label for="password">Contraseña</label>
	<input type="password" name="password" required />

	<input class="buttom" type="submit" value="Registrarse" />
</form>