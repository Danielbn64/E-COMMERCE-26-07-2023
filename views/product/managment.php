<h1 class=title>Gestión de productos</h1>

<a href="<?= base_url ?>product/create" class="link-buttom">
	Nuevo
</a>

<?php if (isset($_SESSION['product']) && $_SESSION['product'] == 'complete') : ?>
	<strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['product']) && $_SESSION['product'] != 'complete') : ?>
	<strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('product'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
	<strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
	<strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<div class="container">
	<table>
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>PRECIO</th>
			<th>STOCK</th>
			<th>ACCIONES</th>
		</tr>
		<?php while ($pro = $products->fetch_object()) : ?>
			<tr>
				<td><?= $pro->id; ?></td>
				<td><?= $pro->name; ?></td>
				<td><?= $pro->price; ?></td>
				<td><?= $pro->stock; ?></td>
				<td>
					<a href="<?= base_url ?>product/edit&id=<?= $pro->id ?>" class="link-hover">Editar</a>
					<a href="<?= base_url ?>product/delete&id=<?= $pro->id ?>" class="link-hover">Eliminar</a>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>
</div>