<?php if (isset($_SESSION['identity'])) : ?>
<h1 class="title">Cuenta</h1>
<div class="acount">
    <h2 class="user-name"><?= $_SESSION['identity']->name ?> <?= $_SESSION['identity']->surnames ?></h2>
    <a href="<?= base_url ?>order/my_orders">
        <p class="acount-options">- Mis pedidos</p>
    </a>
</div>
<div class="button close-session-button spacing">
    <a href="<?= base_url ?>user/logout">
        Cerrar sesión
    </a>
</div>
<?php else : ?>
<?php header("Location:" . base_url. "user/ingresar"); ?>
<?php endif ?>