   <?php
      session_start();
      // inactive in seconds
      $inactive = 900;
      if( !isset($_SESSION['timeout']) )
      $_SESSION['timeout'] = time() + $inactive; 

      $session_life = time() - $_SESSION['timeout'];

      if($session_life > $inactive)
      {  session_destroy(); header("Location:index.php");     }

      $_SESSION['timeout']=time();

      include 'assets.php';
      
      if(!isset($_SESSION['userid']) ) {
        header("Location: login.php");
        exit;
      }

      if (isset($_GET['logout'])) {
          $_SESSION['logout'] = true;
          header("Location: login.php");
      }

      $user_id = $_SESSION['userid'];
      $user_diplay_name = $_SESSION['username'];

    ?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width user-scalable=0">
    <title>myCRM</title>
    <link rel="icon"  type="image/png" href="images/favicon/icons8-save-64.png" />
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <!--<i class="fas fa-search"></i>-->
                    </div>
                  </div>
                  <!--<input class="navbar-search form-control" type="text" placeholder="Search..." aria-label="Search" id="myInput"> --></div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="new_client.php" role="button">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">person_add</i>
                    </div>
                  </a>
                </li>
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="index.php" role="button">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">view_list</i>
                    </div>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatars/00.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?php echo $user_diplay_name ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="user-profile-lite.html">
                      <!--<i class="material-icons">&#xE7FD;</i> Profile</a> 
                    <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item text-danger" href="index.php?logout=true">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
          <!-- / .main-navbar -->
