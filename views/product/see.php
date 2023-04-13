<?php if (isset($product)) : ?>
	<h1 class=title><?= $product->name ?></h1>
	<div class="container">
		<div class="see-container">
			<div class="image-container-see">
				<?php if ($product->image != null) : ?>
					<img class="img-see" src="<?= base_url ?>uploads/images/<?= $product->image ?>" />
				<?php else : ?>
					<img src="<?= base_url ?>assets/img/placeholder.png" />
				<?php endif; ?>
				<div class=buy>
					<a href="<?= base_url ?>cart/add&id=<?= $product->id ?>" class="button">Comprar</a>
					<p class="price"><?= $product->price ?>$</p>
				</div>
			</div>
			<div class="data">
				<p class="description"><?= $product->description ?></p>
			</div>
		</div>
	</div>
<?php else : ?>
	<h1></h1>
<?php endif; ?>