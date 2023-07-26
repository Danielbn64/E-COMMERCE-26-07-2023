<?php if (isset($product)) : ?>
	<div class="container">
		<div class="see-container">
		<h1 class="product-name-see-tablet"><?= $product->name ?></h1>
			<div class="image-container-see">
				<?php if ($product->image != null) : ?>
					<img class="image-see" src="<?= base_url ?>uploads/images/<?= $product->image ?>" />
				<?php else : ?>
					<img src="<?= base_url ?>assets/img/placeholder.png" />
				<?php endif; ?>
				<div class=buy>
					<p class="product-price"><?= $product->price ?>€</p>
					<a href="<?= base_url ?>cart/add&id=<?= $product->id ?>" class="button buy-link">Comprar</a>
				</div>
			</div>
			<div class="data">
				<h1 class="product-name-see-desktop"><?= $product->name ?></h1>
				<p class="see-description"><?= $product->description ?></p>
			</div>
		</div>
	</div>
<?php else : ?>
	<h1></h1>
<?php endif; ?>