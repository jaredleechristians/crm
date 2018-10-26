  <?php include 'assets.php';?>
  <?php
      session_start();
      if (isset($_SESSION['logout'])) {
          session_destroy();
          $error = "You've been logged out";
          $conn->close();
      }               

      if ($_POST['username'] != null & $_POST['password'] != null){

        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];

        $login = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
        $result = $conn->query($login);
        if (mysqli_num_rows($result) == 1) {
          $user = $result->fetch_assoc();
          $_SESSION['username'] = $user['display_name'];
          $_SESSION['userid'] = $user['id'];            
          header('location: index.php');
        }else {
            $error = "authentication error";
        }
      }


      
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
<div class="main-content-container container-fluid py-4">
  <div class="row"">
              <div class="col-lg-4 col-md-8 col-sm-12" style="width:800px; margin:0 auto;">
                <div class="card card-small card-post mb-4">
                   <?php
                    if($error != null){
                      echo myinfo($error,"info","info");
                    }
                  ?>
                  <div class="card-body">
                    <form action="login.php" id="loginForm" method="post">
                      <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">person</i>
                              </span>
                            </span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"> </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <span class="input-group-append">
                              <span class="input-group-text">
                                <i class="material-icons">lock</i>
                              </span>
                            </span>
                          </div>
                        </div>
                  </div>
                  <div class="card-footer border-top d-flex">
                    <div class="my-auto ml-auto">
                      <button type="submit" class="mb-2 btn btn-sm btn-white mr-1"><i class="fa fa-lock"></i> Login </a></button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
  </div>
</div>
</body>