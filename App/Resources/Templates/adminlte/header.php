<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo APP_NAME; ?> | Panel</title>
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/adminlte/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/adminlte/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/adminlte/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/adminlte/bootstrap-timepicker.min.css">
    <!-- toastr notifications -->
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/toastr.css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/style.css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/members.css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/croppie.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter page. However, you can choose any other skin. Make sure you apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/adminlte/skins/skin-red.min.css">
    <link rel="icon" type="image/ico" href="<?php echo RUTA_URL; ?>/favicon.ico">
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo RUTA_URL; ?>/icons/favicon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo RUTA_URL; ?>/icons/favicon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo RUTA_URL; ?>/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo RUTA_URL; ?>/icons/favicon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo RUTA_URL; ?>/icons/favicon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo RUTA_URL; ?>/icons/favicon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo RUTA_URL; ?>/icons/favicon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo RUTA_URL; ?>/icons/favicon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA_URL; ?>/icons/favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo RUTA_URL; ?>/icons/favicon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA_URL; ?>/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo RUTA_URL; ?>/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA_URL; ?>/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo RUTA_URL; ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo RUTA_URL; ?>/icons/favicon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-red sidebar-mini">

    <?php 
    if( isset( $_SESSION['id'] ) && !empty( $_SESSION['id'] ) ){
        ?>
        <input type='hidden' id='user_auth_id' name='user_auth_id' value='<?php echo $this->Auth()->user()->id(); ?>' />
        <form id="logout-iniactividad-form" action="<?php echo RUTA_URL; ?>/auth/inactividad_logout" method="POST" style="display: none;">
            <input type="hidden" name="logout" value="yes">
        </form>
        <?php
        echo $this->csrfToken();
    }
    ?>


    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo RUTA_URL; ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>DS</b>B</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Dash</b>Board</span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="bar-toggle" data-toggle="push-menu" role="button">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo RUTA_IMG; ?>/adminlte/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li> /.messages-menu -->
                        <!-- Notifications member Menu -->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="label label-warning cant-notifications"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <span class="cant-notifications"></span> notifications</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu container-notifications">
                                        <!-- SPACE FOR NOTIFICATIONS -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?php echo RUTA_URL; ?>/General/Notification/usernotificationlist">View all</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->
                        <?php if( $this->Auth()->user()->role() == 2 ){ ?>
                        <!-- Notifications club Menu -->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag"></i>
                                <span class="label label-warning cant-notifications-club"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <span class="cant-notifications-club"></span> new notifications</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu container-notifications-club">
                                        <!-- SPACE FOR NOTIFICATIONS -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?php echo RUTA_IMG.'/users/'.$this->Auth()->user()->photo(); ?>" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">
                                    <?php echo ucwords( $this->Auth()->user()->name() ); ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?php echo RUTA_IMG.'/users/'.$this->Auth()->user()->photo(); ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo ucwords( $this->Auth()->user()->name() ); ?>
                                        <small>
                                            Member since 
                                            <?php
                                                //  we get the registration date and we convert it to the whole
                                                $date_as_integer = strtotime( $this->Auth()->user()->created_at() );
                                                // we get the month
                                                $month = date("M", $date_as_integer);
                                                // we get the year
                                                $year = date("Y", $date_as_integer);
                                                // we show the data
                                                echo $month.'. '.$year;
                                            ?>
                                        </small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo RUTA_URL; ?>/Members/User/Profile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#">
                                            <form id="form-logout" name="form-logout" method="POST" action="<?php echo RUTA_URL; ?>/auth/logout" class="d-inline">
                                                <input type="hidden" name="logout" value="yes">
                                                <button type="submit" class="btn btn-default btn-flat">Log out</button>
                                            </form>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <?php if( $this->Auth()->user()->role() == 1 or $this->Auth()->user()->role() == 4 ){ ?>
                    <div class="pull-left image">
                        <img src="<?php echo RUTA_IMG.'/users/'.$this->Auth()->user()->photo(); ?>" class="img-circle" alt="User Image" style="max-height: 45px !important;">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php echo ucwords( $this->Auth()->user()->name() ); ?>
                        </p>
                        <a><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                    <?php }else if( $this->Auth()->user()->role() == 2 ){
                        $club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() )  );
                    ?>
                    <div class="logo">
                        <div class="row">
                            <div class="col-sm-12">
                                <img class="img-responsive img-circle" src="<?php echo RUTA_IMG.'/clubs/'.$club['slug'].'/'.$club['logo']; ?>" style="padding: 10px;" alt="">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <?php if( $this->Auth()->user()->role() == 1 ){ ?>
                        <li class="header">Clubs</li>
                        <li class="<?php echo $this->validateUrl( 'Members/Welcome' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Members/Welcome">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( '/Members/Club/My-clubs' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Members/Club/My-clubs">
                                <i class="fa fa-vihara"></i>
                                <span>My clubs</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( '/Members/Club/Find' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Members/Club/Find">
                                <i class="fa fa-search"></i> 
                                <span>Find clubs</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( '/Members/Club/Found' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Members/Club/Found">
                                <i class="fa fa-plus-circle"></i> 
                                <span>Found a club</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( '/Members/Training' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Members/Training">
                                <i class="fa fa-dumbbell"></i>
                                <span>Training</span>
                            </a>
                        </li>   
                    <?php } elseif( $this->Auth()->user()->role() == 2 ){ ?> 
                        <li class="header">Generals</li>
                        <li class="<?php echo $this->validateUrl( 'Clubs/Welcome' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Welcome">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( 'Clubs/Member' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Member">
                                <i class="fa fa-users"></i>
                                <span>Members</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( 'Clubs/Training' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Training">
                                <i class="fa fa-dumbbell"></i>
                                <span>Attendence</span>
                            </a>
                        </li> 
                        <li class="<?php echo $this->validateUrl( 'Clubs/Schedule' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Schedule">
                                <i class="fa fa-clock"></i>
                                <span>Schedule</span>
                            </a>
                        </li> 
                        <li class="<?php echo $this->validateUrl( 'Clubs/Notification' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Notification">
                                <i class="fa fa-bell"></i> 
                                <span>Notifications</span>
                            </a>
                        </li> 
                        <!-- <li>
                            <a href="#">
                                <i class="fa fa-pen-alt"></i> 
                                <span>Publications</span>
                            </a>
                        </li> -->
                        <li class="<?php echo $this->validateUrl( 'Clubs/Information' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Information">
                                <i class="fa fa-vihara"></i> 
                                <span>Club information</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( 'Clubs/Trainner' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Trainner">
                                <i class="fa fa-user-tie"></i> 
                                <span>Trainners</span>
                            </a>
                        </li>
                        <li class="header">Sales</li>
                        <li class="<?php echo $this->validateUrl( 'Clubs/Stock' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Stock">
                                <i class="fa fa-box"></i> 
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( 'Clubs/Sale' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Sale">
                                <i class="fa fa-shopping-cart"></i> 
                                <span>Sales</span>
                            </a>
                        </li>
                        <li class="<?php echo $this->validateUrl( 'Clubs/Suscription' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Clubs/Suscription">
                                <i class="fa fa-gem"></i> 
                                <span>Suscriptions</span>
                            </a>
                        </li>
                        <!-- <li class="header">Championships</li>
                        <li>
                            <a href="#">
                                <i class="fa fa-plus-circle"></i> 
                                <span>New championship</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle"></i>
                                <span>Active championships</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-stopwatch"></i>
                                <span>Record of championships</span>
                            </a>
                        </li> -->
                    <?php } elseif( $this->Auth()->user()->role() == 4 ){ ?>  
                        <!-- Optionally, you can add icons to the links -->
                        <li class="header">Generals</li>
                        <li class="<?php echo $this->validateUrl( 'Administrators/Welcome' ); ?>">
                            <a href="<?php echo RUTA_URL; ?>/Administrators/Welcome">
                                <i class="fa fa-vihara"></i>
                                <span>Clubs</span>
                            </a>
                        </li>
                    <?php } ?>
  				</ul>
  				<!-- /.sidebar-menu -->
  			</section>
  			<!-- /.sidebar -->
  		</aside>

  		<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
            <?php if( $this->Auth()->user()->email_verified_at() == "0000-00-00 00:00:00" or $this->Auth()->user()->email_verified_at() == NULL ){ ?>
             <!-- Content Header (Page header) -->
             <section class="content-header verify-account">
              <div class="alert alert-danger">
                <strong>Warning!</strong> Your account has not yet been verified, please check your email.
                <a href="<?php echo RUTA_URL; ?>/Auth/newSendMailVerify" class="new-verify-account" title="Clic for to request new verification email">
                    Request new verification email
                </a>.
                <a href="" class="pull-right close-verify-account">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </section>
    <?php } ?>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php if( $this->Auth()->user()->role() == 2 ){ ?> 
            <section class="content-header" style="margin-bottom: 25px;">
                <h1>
                    Dashboard
                    <small>Version Beta</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a title="My data" href="<?php echo RUTA_URL; ?>/Members/User/Profile">
                            <i class="fa fa-user-tie"></i> <?php echo ucwords( $this->Auth()->user()->name() ); ?></a>
                    </li>
                    <?php if( isset($params['breadcrumb_data']) && !empty($params['breadcrumb_data']) ){ echo $params['breadcrumb_data']; } ?>
                </ol>
            </section>
        <?php } ?>