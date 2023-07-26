<div class="container">
	<div class="slider-container">
		<div class="arrow back-arrow">
			&#8249
		</div>
		<div class="slider">
			<ul>
				<li><img src="uploads/images/sample-1.jpg" alt="ejemplo 1"></li>
				<li><img src="uploads/images/sample-2.jpg" alt="ejemplo 2"></li>
				<li><img src="uploads/images/sample-3.jpg" alt="ejemplo 3"></li>
			</ul>
		</div>
		<div class="arrow next-arrow">
			&#8250
		</div>
	</div>
	<h1 class="title margin-top">Algunos de nuestros productos</h1>
	<div class="products-container">
		<?php while ($product = $products->fetch_object()) : ?>
			<article class="product">
				<a href="<?= base_url ?>product/see&id=<?= $product->id ?>">
					<h4 class="product-name-desktop"><?= $product->name ?></h4>
				</a>
				<div class="description-container">
					<?php if ($product->image != null) : ?>
						<div class="image-container">
							<a href="<?= base_url ?>product/see&id=<?= $product->id ?>">
								<img class="image" src="<?= base_url ?>uploads/images/<?= $product->image ?>" />
							</a>
						<?php else : ?>
							<img src="<?= base_url ?>assets/img/placeholder.png" />
						<?php endif; ?>
						</div>
						<a href="<?= base_url ?>product/see&id=<?= $product->id ?>">
							<div class="product-preview">
								<h4 class="product-name"><?= $product->name ?></h4>
								<p class="description"><?= $product->description ?></p>
								<p class="price"><?= $product->price . "€" ?></p>
							</div>
						</a>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</div>