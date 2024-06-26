<div id="user-menu" class="user-account">
    <div class="close-button-wrapper">
        <button class="button-close">
            <img src="<?= base_url ?>assets/svg/close-button.svg" />
        </button>
    </div>
    <p class="user-name"><?= $_SESSION['identity']->name ?> <?= $_SESSION['identity']->surnames ?></p>
    <a href="<?= base_url ?>order/my_orders">
        <p class="options">Mis pedidos</p>
    </a>
    <hr>
    </hr>
    <div class="wrapper">
        <a href="<?= base_url ?>user/logout">
            <div class="button close-session-button">
                Cerrar sesión
            </div>
        </a>
    </div>
</div>