<h1 class=title>Crear nueva categoria</h1>
<div class="container spacing">
	<form action="<?= base_url ?>category/save" method="POST">
		<label for="name">Nombre</label>
		<input type="text" name="name" required />
		<input class="buttom" type="submit" value="Guardar" />
	</form>
</div>