<h1 class="title">Gestionar categorias</h1>
<div class="container">
	<a href="<?= base_url ?>category/create" class="button">
		Nueva
	</a>
	<table>
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
		</tr>
		<?php while ($cat = $category->fetch_object()) : ?>
			<tr>
				<td><?= $cat->id; ?></td>
				<td><?= $cat->name; ?></td>
			</tr>
		<?php endwhile; ?>
	</table>
</div>