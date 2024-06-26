<?php $stats = Utils::statsCart() ?>
<div id="cart_menu" class="cart-menu">
    <a href="<?= base_url ?>cart/index">
        <p>Productos <?= $stats['count'] ?></p>
    </a>
    <a href="<?= base_url ?>cart/index">
        <p>Total: <?= $stats['total'] ?> €</p>
    </a>
</div>