<h1 class="title">Algunos de nuestros productos</h1>
<div class="container">
	<?php while ($product = $products->fetch_object()) : ?>
		<div class="product">
			<a href="<?= base_url ?>product/see&id=<?= $product->id ?>">
				<?php if ($product->image != null) : ?>
					<div class="image-container">
						<img class="img" src="<?= base_url ?>uploads/images/<?= $product->image ?>" />
					<?php else : ?>
						<img src="<?= base_url ?>assets/img/placeholder.png" />
					<?php endif; ?>
					</div>
			</a>
			<div class="product-preview">
				<h2><?= $product->name ?></h2>
				<p class="price"><?= $product->price . "$" ?></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Pellentesque egestas iaculis orci varius gravida. Donec ullamcorper
					accumsan ipsum, in pellentesque lorem accumsan sed. Sed pellentesque
					sed nisl quis aliquam. Fusce
				</p>
				<a class="buy-link" href="<?= base_url ?>cart/add&id=<?= $product->id ?>" class="button">Comprar</a>
			</div>
		</div>
	<?php endwhile; ?>
</div>