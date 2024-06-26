<?php if (!Utils::hideNavbar()) : ?>
	<span id="darkening"></span>
	<span id="darkening_categories_deploy"></span>
	<header class="header">
		<nav class="navigation">
			<?php $categories = Utils::showCategories(); ?>
			<div class="menu">
				<div class="menu-left">
					<img id="menu_icon" src="<?= base_url ?>assets/svg/menu-icon.svg" class="menu-icon" onclick="toggleMenu()">
					</label>
					<div class="logo-container">
						<a href="<?= base_url ?>">
							<img class="logo-desktop" src="<?= base_url ?>assets/svg/logo.svg" />
						</a>
						<a href="<?= base_url ?>">
							<img class="logo-mobile" src="<?= base_url ?>assets/svg/logo-mobile.svg" />
						</a>
					</div>
					<div id="categories_menu" class="categories">
						<img src="<?= base_url ?>assets/svg/menu-icon.svg" class="menu-icon-deployed" onclick="toggleMenu()">
						<div class="menu-deploy-right">
						</div>
						<div class="home-button">
							<a href="<?= base_url ?>">Inicio</a>
						</div>
						<?php while ($cat = $categories->fetch_object()) : ?>
							<div class="categories-button">
								<a href="<?= base_url ?>category/see&id=<?= $cat->id ?>"><?= $cat->name ?></a>
							</div>
						<?php endwhile ?>
					</div>
				</div>
				<?php if (!isset($_SESSION['identity'])) : ?>
					<div class="menu-right">
						<div class="user">
							<a href="<?= base_url ?>user/ingresar">
								<?php
								require_once 'views/includes/in_icon.php';
								?>
							</a>
							<?php
							require_once "views/includes/cart_icon.php";
							?>
						</div>
					</div>
				<?php elseif (isset($_SESSION['admin'])) : ?>
					<?php require_once "views/includes/menu_right.php"; ?>
					<?php require_once "views/includes/user_menu.php"; ?>
					<?php require_once "views/includes/cart_info.php"; ?>
					<script type="text/javascript" src="<?= base_url ?>assets/js/in_icon.js" defer="defer"></script>
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
				<?php else : ?>
					<div class="menu-right">
						<div class=" user">
							<?php require_once "views/includes/in_icon.php"; ?>
							<?php require_once "views/includes/user_menu.php"; ?>
							<?php require_once "views/includes/cart_icon.php"; ?>
							<?php require_once "views/includes/cart_info.php"; ?>
							<script type="text/javascript" src="<?= base_url ?>assets/js/in_icon.js" defer="defer"></script>
							<script type="text/javascript" src="<?= base_url ?>assets/js/cart_icon.js" defer="defer"></script>
						</div>
					</div>
				<?php endif ?>
			</div>
		</nav>
	</header>
<?php endif ?>
<!-- CONTENIDO CENTRAL -->
<div class="central">