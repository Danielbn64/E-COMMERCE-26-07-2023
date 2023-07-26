<?php if (isset($_SESSION['identity'])) : ?>
	<h1 class="title title-movil">Hacer pedido</h1>
	<a class="title-a" href="<?= base_url ?>cart/index">Ver los productos y el precio del pedido</a>
	<br />
	<h3 class="title-movil-three">Dirección para el envio:</h3>
	<form action="<?= base_url . 'order/add' ?>" method="POST">
		<label for="province">Provincia</label>
		<input type="text" name="province" value="<?php echo 'default' ?>" />
		<spam class="disabled"></spam>
		<label for="location">Ciudad</label>
		<input type="text" name="location" value="<?php echo 'default' ?>" />
		<spam class="disabled"></spam>
		<label for="address">Dirección</label>
		<input type="text" name="address" value="<?php echo 'default' ?>" />
		<spam class="disabled"></spam>
		<input class="button" type="submit" value="Confirmar pedido" />
	</form>
<?php else : ?>
	<h1 class="title">Necesitas estar identificado</h1>
	<p class="empty">Necesitas estar logueado en la web para poder realizar tu pedido.</p>
<?php endif; ?>