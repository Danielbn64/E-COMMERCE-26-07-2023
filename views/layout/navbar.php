<?php if (!Utils::hideNavbar()) : ?>
	<header class="header">
		<nav class="navigation">
			<?php $categories = Utils::showCategories(); ?>
			<div class="menu">
				<div class="menu-left">
					<div id="menu_icon" class="menu-icon" onclick="toggleMenu()">
						<span></span>
						<span></span>
						<span></span>
					</div>
					</label>
					<div class="logo-container">
						<iframe class="logo-desktop" scrolling="no" frameborder="0" height="80px" src="<?= base_url ?>assets/svg/logo.html"></iframe>
						<iframe class="logo-mobile" scrolling="no" frameborder="0" height="30px" src="<?= base_url ?>assets/svg/logo-mobile.html"></iframe>
					</div>
					<div id="categories_menu" class="categories">
						<div class="menu-icon menu-icon-deployed" onclick="toggleMenu()">
							<span class="filled"></span>
							<span class="filled"></span>
							<span class="filled"></span>
						</div>
						<div class="menu-deploy-right">
						</div>
						<span id="close_menu" onclick="closeMenu()"></span>
						<a class="categories-buttom" href="<?= base_url ?>">Inicio</a>
						<?php while ($cat = $categories->fetch_object()) : ?>
							<a class="categories-buttom" href="<?= base_url ?>category/see&id=<?= $cat->id ?>"><?= $cat->name ?></a>
						<?php endwhile ?>
					</div>
				</div>
				<div class="menu-right">
					<?php if (!isset($_SESSION['identity'])) : ?>
						<div class="user">
							<div class="in-icon-out">
								<iframe src="<?= base_url ?>assets/svg/user-out.html" scrolling="no" frameborder="0" height="43" width="55"></iframe>
								<a href="<?= base_url ?>user/ingresar">
									<div>
										Ingresar
									</div>
								</a>
							</div>
							<div class="cart-icon-out">
								<iframe src=" <?= base_url ?>assets/svg/cart.html" scrolling="no" frameborder="0" height="52" width="65"></iframe>
								<a href="<?= base_url ?>cart/index"">										
								<div>
									Mi carrito
								</div>
							</a>
						</div>
				</div>
					<?php else : ?>
				<div class=" user">
									<div class="in-icon">
										<iframe src="<?= base_url ?>/assets/svg/user.html" scrolling="no" frameborder="0" height="43" width="55"></iframe>
										<div id="in_icon">
											Mi Cuenta
										</div>
									</div>
									<div id="user_menu" class="user-acount">
										<p class="user-name"><?= $_SESSION['identity']->name ?> <?= $_SESSION['identity']->surnames ?></p>
										<a href="<?= base_url ?>order/my_orders">
											<p class="options">- Mis pedidos</p>
										</a>
										<div class="button close-session-button">
											<a href="<?= base_url ?>user/logout">
												Cerrar sesión
											</a>
										</div>
									</div>
									<div class="cart-icon-out">
										<iframe src="<?= base_url ?>/assets/svg/cart.html" scrolling="no" frameborder="0" height="52" width="65"></iframe>
										<a href="<?= base_url ?>cart/index">
											<div id="cart">
												Mi carrito
											</div>
										</a>
									</div>
									<?php $stats = Utils::statsCart() ?>
									<div id="cart_menu" class="cart-menu">
										<a href="<?= base_url ?>cart/index">
											<p>Productos (<?= $stats['count'] ?>)</p>
										</a>
										<a href="<?= base_url ?>cart/index">
											<p>Total: <?= $stats['total'] ?> €</p>
										</a>
									</div>
								<?php endif ?>
							</div>
							<?php if (isset($_SESSION['admin'])) : ?>
								<div class="user">
									<div class="admin-icon">
										<iframe src="<?= base_url ?>/assets/svg/admin.html" scrolling="no" frameborder="0" height="50" width="50"></iframe>
										<div id="admin">
											Administrar
										</div>
									</div>
								</div>
								<div id="admin_menu" class="admin-menu">
									<a class="option" href="<?= base_url ?>category/index">
										<p>Gestionar categorias</p>
									</a></li>
									<a class="option" href="<?= base_url ?>product/managment">
										<p>Gestionar productos</p>
									</a></li>
									<a class="option" href="<?= base_url ?>order/managment">
										<p>Gestionar pedidos</p>
									</a></li>
								</div>
							<?php endif ?>
						</div>
				</div>
		</nav>
	</header>
<?php endif ?>
<!-- CONTENIDO CENTRAL -->
<div class="central">
	<span id="darkening"></span>