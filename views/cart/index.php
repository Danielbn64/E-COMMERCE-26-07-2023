<h1 class="title">Carrito de la compra</h1>
<div class="container">
	<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1) : ?>
		<table class="table">
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
				<th>Eliminar</th>
			</tr>
			<?php
			foreach ($cart as $indice => $elemento) :
				$product = $elemento['product'];
			?>

				<tr>
					<td>
						<?php if ($product->image != null) : ?>
							<img class="image-cart" width="200px" height="auto" src="<?= base_url ?>uploads/images/<?= $product->image ?>" class="img_carrito" />
						<?php else : ?>
							<img class="image-cart" width="200px" height="auto" src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" />
						<?php endif; ?>
					</td>
					<td>
						<a href="<?= base_url ?>product/see&id=<?= $product->id ?>"><?= $product->name ?></a>
					</td>
					<td>
						<?= $product->price ?>€
					</td>
					<td>
						<?= $elemento['units'] ?>
						<div class="updown-unities">
							<a href="<?= base_url ?>cart/up&index=<?= $indice ?>" class="button adjust-size">+</a>
							<a href="<?= base_url ?>cart/down&index=<?= $indice ?>" class="button adjust-size">-</a>
						</div>
					</td>
					<td>
						<a href="<?= base_url ?>cart/delete&index=<?= $indice ?>" class="button warning adjust-size">Quitar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<br />
		<div class="options-container">
			<div class="options-wrapper">
				<a class="link-button" href="<?= base_url ?>order/make">Hacer pedido</a>
				<a href="<?= base_url ?>cart/delete_all" class="link-button warning">Vaciar carrito</a>
				<div class="total-carrito">
					<?php $stats = Utils::statsCart(); ?>
					<h3>Precio total: <?= $stats['total'] ?> €</h3>
				</div>
			</div>
		</div>
	<?php else : ?>
		<p class="empty">El carrito está vacio, añade algún producto</p>
	<?php endif; ?>
</div>