<?php
	if(!$user_ok) {
?>
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<a class="navbar-brand waves-light" href="<?php echo$mg_dir['root']?>login.php"><?php echo$mg_branding['name']['value']?></a>
	</nav>
<?php
	} else {
?>
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<a id="menu-toggle" class="menu-toggle waves-light" data-toggle="offcanvas">
			<i class="material-icons menu-toggle-icon">menu</i>
		</a>
		<a class="navbar-brand waves-light" href="<?php echo$mg_dir['root']?>home.php">
			<?php echo$mg_branding['name']['value']?>
		</a>
		<a href="logout.php" id="logout" class="navbar-logout waves-light">
			<i class="material-icons">exit_to_app</i>
		</a>
	</nav>
	<div class="container-fluid">
		<div class="fixed-nav">
			<div class="fixed-nav-inner">
				<ul class="text-center">
					<?
						$sql = "SELECT * FROM `var_pages` ORDER BY `id` asc;";
						$query = mysqli_query($db_conx, $sql);
						foreach($query as $row) {
							echo '
								<a href="#" class="waves-light" onClick="bringtofront('.$row['id'].')">
									<li><i class="material-icons">person_outline</i></li>
									<li>'.$row['title'].'</li>
								</a>';
						}
					?>
				</ul>
			</div>
		</div>
	</div>
<?php
	}
?>