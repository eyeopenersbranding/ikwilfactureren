<aside class="sidebar">
	<div class="scrollbar-inner">
		<div class="user">
			<a href="profile-settings.php"><div class="user__info">
				<img class="user__img" src="app_data/demo/img/profile-pics/8.jpg" alt="">
				<div>
					<div class="user__name"><?php echo $_SESSION['usr_name'];  ?> <?php echo $_SESSION['usr_surname'];  ?></div>
					<div class="user__email"><?php echo $_SESSION['usr_email'];  ?></div>
				</div>
			</div>
			</a>
		</div>
		<?php if ($Page_id == $define_launch_page){ } else{ ?>
		
			<?php if ($user_role == $admin) { ?>
				<ul class="navigation">
					<li <?php if ($Page_id=="dashboard") echo " class=\"navigation__active\""; ?>><a href="ad-dashboard.php"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> <strong>Dashboard</strong></a></li>
					<li <?php if ($Page_id=="charts") echo " class=\"navigation__active\""; ?>><a href="ad-charts.php"><i class="zmdi zmdi-trending-up"></i> <strong>Aanvullende grafieken</strong></a></li>
					<li <?php if ($Page_id=="leads") echo " class=\"navigation__active\""; ?>><a href="ad-leads.php"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i> <strong>Mijn leads</strong></a></li>
					<li <?php if ($Page_id=="customers") echo " class=\"navigation__active\""; ?>><a href="ad-customers.php"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i> <strong>Mijn klanten</strong></a></li>
					<li <?php if ($Page_id=="invoice") echo " class=\"navigation__active\""; ?>><a href="ad-posts.php"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> <strong>Berichten</strong></a></li>
				</ul>
			<?php } if ($user_role == $basis) { ?>
				<ul class="navigation">
					<li <?php if ($Page_id=="dashboard") echo " class=\"navigation__active\""; ?>><a href="index.php"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> <strong>Dashboard</strong></a></li>
					<li <?php if ($Page_id=="admin") echo " class=\"navigation__active\""; ?>><a href="admin.php"><i class="zmdi zmdi-store zmdi-hc-fw"></i> <strong>Mijn klanten</strong></a></li>
					<li <?php if ($Page_id=="invoice") echo " class=\"navigation__active\""; ?>><a href="invoices.php"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> <strong>Berichten</strong></a></li>
				</ul>


			<?php } if ($user_role == $extra) { ?>
				<ul class="navigation">

					<li <?php if ($Page_id=="dashboard") echo " class=\"navigation__active\""; ?>><a href="index.php"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> <strong>Dashboard (PRO)</strong></a></li>
					<li <?php if ($Page_id=="persons") echo " class=\"navigation__active\""; ?>><a href="customers.php"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i> <strong>Mijn klanten</strong></a></li>
					<li <?php if ($Page_id=="company") echo " class=\"navigation__active\""; ?>><a href="companies.php"><i class="zmdi zmdi-store zmdi-hc-fw"></i> <strong>Bedrijven</strong></a></li>
					<li <?php if ($Page_id=="project") echo " class=\"navigation__active\""; ?>><a href="projects.php"><i class="zmdi zmdi-codepen zmdi-hc-fw"></i> <strong>Projecten</strong></a></li>
					<li <?php if ($Page_id=="invoice") echo " class=\"navigation__active\""; ?>><a href="invoices.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> <strong>Verkoop facturen</strong></a></li>
					<li <?php if ($Page_id=="invoice") echo " class=\"navigation__active\""; ?>><a href="invoices.php"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> <strong>Offertes</strong></a></li>
					<hr>

					<li <?php if ($Page_id=="invoice") echo " class=\"navigation__active\""; ?>><a href="invoices.php"><i class="zmdi zmdi-square-down zmdi-hc-fw"></i> <strong>Inkoop facturen</strong></a></li>
					<li <?php if ($Page_id=="invoice") echo " class=\"navigation__active\""; ?>><a href="invoices.php"><i class="zmdi zmdi-border-color zmdi-hc-fw"></i> <strong>Mijn notities</strong></a></li>
					<li <?php if ($Page_id=="invoice") echo " class=\"navigation__active\""; ?>><a href="invoices.php"><i class="zmdi zmdi-email zmdi-hc-fw"></i> <strong>Mijn berichten</strong> <span class="badge badge-default">0</span></a></li>

				</ul>

			<?php } else { ?>

			<?php } ?>
		
		<?php } ?>
	</div>
</aside>