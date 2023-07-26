<?php if (isset($category)) : ?>
	<h1 class="title"><?= $category->name ?></h1>
	<?php if ($products->num_rows == 0) : ?>
		<p class="empty">No hay productos para mostrar</p>
	<?php else : ?>
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
									<img class="image" width="330px" height="auto" src="<?= base_url ?>uploads/images/<?= $product->image ?>" />
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
		<div class="pagination-wrapper">
			<?php pagination::render(); ?>
		</div>
	<?php endif; ?>
<?php else : ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>
<div>