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
			<svg class="menu-toggle-icon bi bi-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 013 11h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 3h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
			</svg>
		</a>
		<a href="<?php echo$mg_dir['root']?>home.php" class="navbar-brand waves-light">
			<?php echo$mg_branding['name']['value']?>
		</a>
		<a href="#" onClick="reloadpage()" id="reload" class="navbar-controls waves-light">
			<img src="<?php echo$mg_img['multimedia']['refresh']['image']?>">
		</a>
		<a href="#" onClick="closepage()" id="close" class="navbar-controls waves-light">
			<img src="<?php echo$mg_img['multimedia']['cancel']['image']?>">
		</a>
		<a href="#" onClick="logout()" id="logout" class="navbar-logout waves-light">
			<img src="<?php echo$mg_img['multimedia']['logout']['image']?>">
		</a>
	</nav>
	<div class="container-fluid">
		<div class="fixed-nav">
			<div class="fixed-nav-inner">
				<ul class="text-center">
					<?
						$sql = "SELECT * FROM `var_pages` ORDER BY CHAR_LENGTH(`id`), `id` asc;";
						$query = mysqli_query($db_conx, $sql);
						foreach($query as $row) {
							echo '
								<a href="#" class="waves-light" id="'.$row['title'].'-'.$row['id'].'" onClick="openpage('.$row['id'].')">
									<li><img src="'.$mg_img[$row['icon_category']][$row['icon']]['image'].'"></li>
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