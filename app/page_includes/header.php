<header class="header">
    <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
        <div class="navigation-trigger__inner">
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
        </div>
    </div>

    <div class="header__logo hidden-sm-down">
		<a href="index.php"><p style="color: #ffffff;">IKWILFACTUREREN.NL</p></a>
    </div>

    <ul class="top-nav">
        <li class="hidden-xl-up"><a href="" data-ma-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

        <li class="dropdown top-nav__notifications">
            <a href="" data-toggle="dropdown" class="top-nav__notify">
                <i class="zmdi zmdi-notifications"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                <div class="listview listview--hover">
                    <div class="listview__header">
                        Notificaties

                        <div class="actions">
                            <a href="" class="actions__item zmdi zmdi-check-all" data-ma-action="notifications-clear"></a>
                        </div>
                    </div>

                    <div class="listview__scroll scrollbar-inner">
						
						<?php
						//Het selecteren van de notificaties voor de gebruiker
							$sql = "SELECT * FROM ikwil_notifications WHERE notification_user_id = '$user_id'";
							$result = mysqli_query($con, $sql);

							if($result -> num_rows >0){

							while($row = $result->fetch_assoc()) {

								  $notification_id = $row['notification_id'];
								  $notification_title = $row['notification_title'];
								  $notification_content = $row['notification_content'];
								  $notification_date = $row['notification_date'];

						echo"
						 <a href='notifications.php' class='listview__item'>
                            <img src='app_data/demo/img/profile-pics/1.jpg' class='listview__img' alt=''>

                            <div class='listview__content'>
                                <div class='listview__heading'>$notification_title</div>
                                <p>$notification_content</p>
                            </div>
                        </a>
					   ";}
							} 	
						else {
								echo"<div class='alert alert-danger alert-dismissable' role='alert'><i class='zmdi zmdi-comment-alt-text zmdi-hc-f'></i>
								<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> U heeft nog geen notificaties.</div>";
							 }
								?>

                       
                    </div>

                    <div class="p-1"></div>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                <div class="row app-shortcuts">
                    <a class="col-4 app-shortcuts__item" href="index.php">
                        <i class="zmdi zmdi-trending-up bg-blue-grey"></i>
                        <small class="">Dashboard</small>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="notifications.php">
                        <i class="zmdi zmdi-view-headline bg-orange"></i>
                        <small class="">Notificaties</small>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="">
                        <i class="zmdi zmdi-email bg-teal"></i>
                        <small class="">Mijn berichten</small>
                    </a>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="profile-settings.php" class="dropdown-item"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> Persoonlijke instellingen</a>
                <a href="logout.php" class="dropdown-item"><i class="zmdi zmdi-power zmdi-hc-fw"></i> Uitloggen</a>
            </div>
        </li>

     
    </ul>
</header>