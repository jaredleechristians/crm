<?php include 'header.php';?>
  <?php

    $get_said = $_GET['said'];

    if($_GET['said'] &&  !$_GET['action']){
      $get_said = $_GET['said'];
      $get_query = "SELECT * FROM clients WHERE said = '$get_said'";
      $client = $conn->query($get_query);
      while($row = $client->fetch_assoc()) {
        $record_said =  $row['said'];
        $record_title = $row['title'];
        $record_gender = $row['gender'];
        $record_name = $row['name'];
        $record_surname = $row['surname'];
        $record_phone = $row['phone'];
        $record_phone_alt = $row['phone_alt'];
        $record_email = $row['email'];
        $record_address = $row['address'];
        $record_city = $row['city'];
        $record_consultant = $row['consultant'];
        $record_mediation = $row['mediation'];
        $record_review = $row['review'];
        $record_recision = $row['recision'];
        $record_garnish = $row['garnish'];
        $record_rewards = $row['rewards'];
        $record_status = $row['status'];
      }
  }

  if($_GET['action'] == "update"){

      $said = $_POST['said'];
      $title = $_POST['title'];
      $gender = $_POST['gender'];
      $name =  $_POST['name'];
      $surname =  $_POST['surname'];
      $phone =  $_POST['phone'];
      $phone_alt =  $_POST['phone_alt'];
      $email =  $_POST['email'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $consultant = $_POST['consultant'];
      $mediation = 0;
      $review = 0;
      $recision = 0;
      $garnish = 0;
      $rewards = 0;

      if($_POST['p1'] == "on"){
        $mediation = 1;
      }
      if($_POST['p2'] == "on"){
       $review = 1;
      }
      if($_POST['p3'] == "on"){
        $recision = 1;
      }
      if($_POST['p4'] == "on"){
        $garnish = 1;
      }
      if($_POST['p5'] == "on"){
        $rewards = 1;
      }
      $status = $_POST['status'];
      $comments = $_POST['comments'];

      $update_query = "UPDATE clients SET said = '$said', title = '$title', gender='$gender', name='$name', surname='$surname', phone='$phone', phone_alt='$phone_alt', email='$email', address='$address', city='$city', consultant='$consultant', mediation='$mediation', review='$review', recision='$recision', garnish='$garnish', rewards='$rewards', status='$status' WHERE said = '$get_said'";

        if ($conn->query($update_query) === TRUE) {
          $success = "client updated";
          $comment_title = "Update:";
          $insert_comments ="INSERT INTO comments (user_id, client_said, title, description) VALUES('$user_id', '$said', '$comment_title', '$comments')";
          $conn->query($insert_comments);

        } 
          else {
          $error =  "Error: ". $conn->error;
        }

      $record_said = $said;
      $record_title = $title;
      $record_gender = $gender;
      $record_name = $name;
      $record_surname = $surname;
      $record_phone = $phone;
      $record_phone_alt = $phone_alt;
      $record_email = $email;
      $record_address = $address;
      $record_city = $city;
      $record_consultant = $consultant;
      $record_mediation = $mediation;
      $record_review = $review;
      $record_recision = $recision;
      $record_garnish = $garnish;
      $record_rewards = $rewards;
      $record_status = $status;
        

      }



    if($_GET['action']=='add'){
        $said = $_POST['said'];
        $title = $_POST['title'];
        $gender = $_POST['gender'];
        $name =  $_POST['name'];
        $surname =  $_POST['surname'];
        $phone =  $_POST['phone'];
        $phone_alt =  $_POST['phone_alt'];
        $email =  $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $consultant = $_POST['consultant'];
        $mediation = 0;
        $review = 0;
        $recision = 0;
        $garnish = 0;
        $rewards = 0;
        if($_POST['p1'] == "on"){
          $mediation = 1;
        }
        if($_POST['p2'] == "on"){
          $review = 1;
        }
        if($_POST['p3'] == "on"){
          $recision = 1;
        }
        if($_POST['p4'] == "on"){
          $garnish = 1;
        }
        if($_POST['p5'] == "on"){
          $rewards = 1;
        }
        $status = $_POST['status'];
        $comments = $_POST['comments'];

        $insert_client = "INSERT INTO clients (said, title, gender, name, surname, phone, phone_alt, email, address, city, consultant, mediation,review,recision,garnish,rewards,status) VALUES('$said','$title', '$gender','$name','$surname','$phone','$phone_alt','$email','$address','$city','$consultant','$mediation','$review','$recision','$garnish','$rewards','$status');";


        if ($conn->query($insert_client) === TRUE) {
            $success = "new client added";
            $comment_title = "";
            $comments = "client was added on: " . date("Y-m-d") . ". " . $comments;
            $insert_comments ="INSERT INTO comments (user_id, client_said, title, description) VALUES('$user_id', '$said', '$comment_title', '$comments')";

            if($conn->query($insert_comments) == TRUE){
               $success .= "";
            }
            else{
              $error =  "Error: ". $conn->error;
            }
        }
        else {
            $error =  "Error: ". $conn->error;
        }

        $record_said = $said;
        $record_title = $title;
        $record_gender = $gender;
        $record_name = $name;
        $record_surname = $surname;
        $record_phone = $phone;
        $record_phone_alt = $phone_alt;
        $record_email = $email;
        $record_address = $address;
        $record_city = $city;
        $record_consultant = $consultant;
        $record_mediation = $mediation;
        $record_review = $review;
        $record_recision = $recision;
        $record_garnish = $garnish;
        $record_rewards = $rewards;
        $record_status = $status;
    }

    

      if($error != null){
              echo myinfo($error,"info","info");
              $error = nulll;
      }
      if($success != null){
              echo myinfo($success,"success","check");
              $success = null;
      }

  ?>
        

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row py-3">

            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-9">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="update_client.php?said=<?php echo $get_said ?>&action=update" method="post">
                          	 <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="said">ID Number</label>
                                <input type="text" maxlength='13' minlength='13' class="form-control" id="said" name="said" placeholder="ID Number" value="<?php echo $record_said ?>" required> </div>
                              <div class="form-group col-md-4">
                                <label for="title">Title</label>
                                <select id="title" name="title" class="form-control" required>
                                  <option></option>
                                  <?php if($record_title == 'Mr'){
                                          echo "<option selected>Mr</option>";
                                        }
                                        else{
                                          echo "<option>Mr</option>";
                                        }
                                        if($record_title == 'Mrs'){
                                          echo "<option selected>Mrs</option>";
                                        }
                                        else{
                                          echo "<option>Mrs</option>";
                                        }
                                        if($record_title == 'Miss'){
                                          echo "<option selected>Miss</option>";
                                        }
                                        else{
                                          echo "<option>Miss</option>";
                                        }
                                        if($record_title == 'Dr'){
                                          echo "<option selected>Dr</option>";
                                        }
                                        else{
                                          echo "<option>Dr</option>";
                                        }

                                  ?>
                                </select></div>
                               <div class="form-group col-md-4">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control" required>
                                  <option ></option>
                                  <?php 
                                        if($record_gender == 'Male'){
                                          echo "<option selected>Male</option>";
                                        }
                                        else{
                                          echo "<option>Male</option>";
                                        }
                                        if($record_gender == 'Female'){
                                          echo "<option selected>Female</option>";
                                        }
                                        else{
                                          echo "<option>Female</option>";
                                        }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="First Name" value="<?php echo $record_name?>" required> </div>
                              <div class="form-group col-md-6">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Last Name" value="<?php echo $record_surname?>" required> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="(555) 555-5555" value="<?php echo $record_phone?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="phone_alt">Alternative Number</label>
                                <input type="tel" class="form-control" id="phone_alt" name="phone_alt" placeholder="(555) 555-5555" value="<?php echo $record_phone_alt?>" > </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $record_email?>" > </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Address</label>
                              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="<?php echo $record_address?>"required> </div>
                            <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="feInputState">City</label>
                                <select id="city" name="city" class="form-control" required>
                                  <option></option>
                                  <?php 
                                      if($record_city == "Eastern Cape"){
                                          echo "<option selected>Eastern Cape</option>";
                                      }
                                      else{
                                        echo "<option>Eastern Cape</option>";
                                      }
                                      if($record_city == "Free State"){
                                          echo "<option selected>Free State</option>";
                                      }
                                      else{
                                        echo "<option>Free State</option>";
                                      }
                                      if($record_city == "Gauteng"){
                                          echo "<option selected>Gauteng</option>";
                                      }
                                      else{
                                        echo "<option>Gauteng</option>";
                                      }
                                      if($record_city == "KwaZulu-Natal"){
                                          echo "<option selected>KwaZulu-Natal</option>";
                                      }
                                      else{
                                        echo "<option>KwaZulu-Natal</option>";
                                      }
                                      if($record_city == "Mpumalanga"){
                                          echo "<option selected>Mpumalanga</option>";
                                      }
                                      else{
                                        echo "<option>Mpumalanga</option>";
                                      }
                                      if($record_city == "North West"){
                                          echo "<option selected>North West</option>";
                                      }
                                      else{
                                        echo "<option>North West</option>";
                                      }
                                      if($record_city == "Western Cape"){
                                          echo "<option selected>Western Cape</option>";
                                      }
                                      else{
                                        echo "<option>Western Cape</option>";
                                      }

                                  ?>
                                </select>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="feInputCity">Consultant</label>
                                <input type="text" class="form-control" id="consultant" name="consultant" value="<?php echo $record_consultant?>"> </div>
                            </div>
                          
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Product Details</h6>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item px-3 pb-2">
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category1" name="p1" 
                          <?php if($record_mediation=="1"){ echo " checked";}?>
                          >
                          <label class="custom-control-label" for="category1">Mediation</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category2" name="p2"
                          <?php if($record_review=="1"){ echo " checked";}?>
                          >
                          <label class="custom-control-label" for="category2">Review</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category3" name="p3"
                          <?php if($record_recision=="1"){ echo " checked";}?>
                          >
                          <label class="custom-control-label" for="category3">Recision</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category4" name="p4"
                          <?php if($record_garnish=="1"){ echo " checked";}?>
                          >
                          <label class="custom-control-label" for="category4">Removal</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category5" name="p5"
                          <?php if($record_rewards=="1"){ echo " checked";}?>
                          >
                          <label class="custom-control-label" for="category5">Rewards</label>
                        </div>
                      </li>
                      <li class="list-group-item d-flex px-3">
                                <select id="status" name="status" class="form-control" required>
                                  <option></option>
                                  <?php 
                                      if($record_status == "active"){
                                        echo "<option selected>active</option>";
                                      }else{
                                        echo "<option>active</option>";
                                      }
                                       if($record_status == "pending"){
                                        echo "<option selected>pending</option>";
                                      }else{
                                        echo "<option>pending</option>";
                                      }
                                       if($record_status == "complete"){
                                        echo "<option selected>complete</option>";
                                      }else{
                                        echo "<option>complete</option>";
                                      }
                                       if($record_status == "canceled"){
                                        echo "<option selected>canceled</option>";
                                      }else{
                                        echo "<option>canceled</option>";
                                      }
                                  ?>
                                </select>
                        </div>
                      </li>
                    </ul>
                  </div>

                  <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Comments</h6>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <div class="form-group">
                        <textarea class="form-control" id="comments" name="comments" style="height: 125px" placeholder="" required></textarea>
                      </div>
                      <div class="form-group mb-0">
                        <button type="submit" class="btn btn-accent">Update</button>
                        <a class="btn btn-danger text-white text-center" data-toggle="modal" data-target="#delete_client">Delete</a>
                      </div>
                  </div>

              	</div>
              </div>
            </form>
            </div>

            <!-- End Default Light Table -->
            <?php
              if($_GET['said']){
                $comments_id = $_GET['said'];
              }else{
                $comments_id = $_POST['said'];
              }
              $comments_query = "SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id WHERE client_said='$comments_id'";
              $comments = $conn->query($comments_query);
              if ($comments->num_rows > 0) {
                while($row = $comments->fetch_assoc()) {
              ?>

              <div class="row">
              <div class="col-lg-12">
                <div class="card card-small card-post mb-4">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text text-muted"> <?php echo $row['description']; ?></p>
                  </div>
                  <div class="card-footer border-top d-flex">
                    <div class="card-post__author d-flex">
                      <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('images/avatars/00.jpg');"> <?php echo $row['description']; ?></a>
                      <div class="d-flex flex-column justify-content-center ml-3">
                        <span class="card-post__author-name"><?php echo $row['display_name']; ?></span>
                        <small class="text-muted"><?php echo $row['date_time']; ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              </div>

              <?php
                }
              }

            ?>
            
            </div>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="delete_client" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete this client? This action is irreversible.  
                  </div>
                  <div class="modal-footer">
                    <form action="index.php?said=<?php echo $get_said ?>&action=delete"  method="post">
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

<?php include 'footer.php';?>
