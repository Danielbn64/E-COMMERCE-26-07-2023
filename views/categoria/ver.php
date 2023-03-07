<?php if (isset($categoria)) : ?>
	<h1 class="title"><?= $categoria->nombre ?></h1>
	<?php if ($productos->num_rows == 0) : ?>
		<p class="empty">No hay productos para mostrar</p>
	<?php else : ?>
		<div class="container">
			<?php while ($note = $notes->fetch_object()) : ?>
				<?php while ($product = $productos->fetch_object()) : ?>
					<div class="product">
						<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
							<div class="image-container">
								<?php if ($product->imagen != null) : ?>
									<img class="img" width="330px" height="auto" src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
								<?php else : ?>
									<img src="<?= base_url ?>assets/img/placeholder.png" />
								<?php endif; ?>
							</div>
						</a>
						<div class="product-preview">
							<h2><?= $product->nombre ?></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
								Pellentesque egestas iaculis orci varius gravida. Donec ullamcorper
								accumsan ipsum, in pellentesque lorem accumsan sed. Sed pellentesque
								sed nisl quis aliquam. Fusce
							</p>
							<p><?= $product->precio ?></p>
							<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="button">Comprar</a>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endwhile; ?>
		</div>
		<div class="pagination-wrapper">
			<?php $pagination->render() ?>
		</div>
	<?php endif; ?>
<?php else : ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>
<div>