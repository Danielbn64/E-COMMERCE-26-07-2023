<h1 class="title">Ingresar</h1>
<form action="<?= base_url ?>user/login" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" />
    <label for="password">Contraseña</label>
    <input type="password" name="password" />
    <input class="buttom" type="submit" value="Enviar" />
</form>