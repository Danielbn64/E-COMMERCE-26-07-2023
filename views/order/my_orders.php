<?php if (isset($managment)) : ?>
	<h1 class="title">Mis pedidos</h1>
	<div class="container">
	<?php else : ?>
		<h1 class="title title-movil">Mis pedidos</h1>
	<?php endif; ?>
	<table>
		<tr>
			<th>Nº Pedido</th>
			<th>Coste</th>
			<th>Fecha</th>
			<th>Estado</th>
		</tr>
		<?php
		while ($order = $orders->fetch_object()) :
		?>
			<tr>
				<td>
					<a href="<?= base_url ?>order/detail&id=<?= $order->id ?>"><?= $order->id ?></a>
				</td>
				<td>
					<?= $order->cost ?> $
				</td>
				<td>
					<?= $order->date ?>
				</td>
				<td>
					<?= Utils::showStatus($order->status) ?>
				</td>
			</tr>

		<?php endwhile; ?>
	</table>
	<div class="empty"></div>
	</div>