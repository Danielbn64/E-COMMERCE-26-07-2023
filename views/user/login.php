<span class="strip">
    <a href="<?= base_url ?>">
        <img class="logo-mobile" src="<?= base_url ?>/assets/svg/logo.svg" />
    </a>
</span>
<h1 class="title">Ingresar</h1>
<p>Puedes ingresar con: cuentadeprueba@gmail.com</p>
<p>Contraseña: Contraseñadeprueba0</p>
<div class="form-container">
    <form action="<?= base_url ?>user/login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" value="cuentadeprueba@gmail.com" />
        <label for="password">Contraseña</label>
        <input type="password" name="password" value="Contraseñadeprueba0" />
        <input class="button button-submit" type="submit" value="Enviar" />
        <?php if(isset($_SESSION['error_login']) && $_SESSION['error_login'] == "true") : ?>
            <span>Indentificación fallida</span>
        <?php endif ?>
    </form>
</div>
<a class="button" href="<?= base_url ?>user/register">
    Registrarse
</a>