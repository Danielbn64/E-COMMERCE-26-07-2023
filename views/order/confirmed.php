<?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'complete') : ?>
	<h1 class="title title-movil">Tu pedido se ha confirmado</h1>
	<h3 class="title-movil-three">Tu pedido ha sido realizado exitosamente</h3>
	<br />
	<div class="invoice invoice-movil">
		<?php if (isset($order)) : ?>
			<h3>Datos de facturación:</h3>
			Nombre: <?= $identity->name ?><br>
			Apellidos: <?= $identity->surnames ?>
			<h4>Direccion del envio:</h4>
			Provincia: <?= $invoice_info->province ?><br>
			localidad: <?= $invoice_info->location ?><br>
			Dirección: <?= $invoice_info->address ?><br>
			<h4>Datos del pedido:</h4>
			Fecha del pedido: <?= $invoice_info->date . " ha las " . $invoice_info->hour ?><br>
			Número de pedido: <?= $invoice_info->id ?> <br />

			Productos:
			<table>
				<tr>
					<th>Nombre</th>
					<th>Unidades</th>
					<th>Precio</th>
				</tr>
				<?php while ($product = $products->fetch_object()) : ?>
					<tr>
						<td>
							<a href="<?= base_url ?>product/see&id=<?= $product->id ?>"><?= $product->name ?></a>
						</td>
						<td>
							<?= $product->units ?>
						</td>
						<td>
							<?= $product->price ?>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
			<div>
				Total a pagar: <?= $order->cost ?> $ <br />
			</div>
		<?php endif; ?>
	<?php elseif (isset($_SESSION['order']) && $_SESSION['order'] != 'complete') : ?>
		<h1>Tu pedido NO ha podido procesarse</h1>
	<?php endif; ?>
	</div>