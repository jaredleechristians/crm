<?php include 'header.php';?>

<?php

if($_GET['action'] == 'delete'){
  $get_said = $_GET['said'];
  $delete_comments = "DELETE FROM comments WHERE client_said='$get_said'";
  $delete_query = "DELETE FROM clients WHERE said='$get_said'";
  //echo $delete_query;
  if ($conn->query($delete_query) === TRUE) {
    $conn->query($delete_comments);
    $success = "client deleted";
  }
  else {
    $error =  "Error: ". $conn->error;}
}


$all_clients_sql = "SELECT * FROM clients ORDER BY surname, name";
$clients = $conn->query($all_clients_sql);

if($error != null){
  echo myinfo($error,"info","info");
}
if($success != null){
  echo myinfo($success,"success","check");
}

?>
   <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title"></h3>
              </div>
            </div>
            <div class="row">
              <!-- Users Stats -->
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header ">
                    <h6 class="m-0"></h6>
                  </div>
                  <div class="card-body pt-0 table-responsive">
                    <table class="table" id="table_id">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Products</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if ($clients->num_rows > 0) {
                              while($row = $clients->fetch_assoc()) {
                                echo "<tr><td>" . $row["said"]. "</td><td>" . strtoupper($row["name"]). "</td><td>" . strtoupper($row["surname"]) . "</td><td>" .$row["phone"]. "<br>". $row["phone_alt"] . "</td><td>" .$row["email"] . "</td>";

                                echo "<td>";
                                if($row["garnish"] == true){
                                  echo "<p class='badge badge-pill badge-secondary' style='margin-bottom:0px'>removal</p>";
                                }
                                if($row["review"] == true){
                                  echo "<p class='badge badge-pill badge-dark' style='margin-bottom:0px'>review</p>";
                                }
                                if($row["recision"] == true){
                                  echo "<p class='badge badge-pill badge-warning' style='margin-bottom:0px'>recision</p>";
                                }
                                if($row["mediation"] == true){
                                  echo "<p class='badge badge-pill badge-primary' style='margin-bottom:0px'>mediation</p>";
                                }
                                 if($row["rewards"] == true){
                                  echo "<p class='badge badge-pill badge-success' style='margin-bottom:0px'>rewards</p>";
                                }

                                echo "</td>";

                                echo "<td>";
                                if ($row["status"] == "active"){
                                    echo "<p class='badge badge-pill badge-primary' style='margin-bottom:0px'>active</p>";
                                }

                                if ($row["status"] == "pending"){
                                    echo "<p class='badge badge-pill badge-info' style='margin-bottom:0px'>pending</p>";
                                }
                                if ($row["status"] == "complete"){
                                    echo "<p class='badge badge-pill badge-success' style='margin-bottom:0px'>complete</p>";
                                }
                                if ($row["status"] == "canceled"){
                                    echo "<p class='badge badge-pill badge-danger' style='margin-bottom:0px'>canceled</p>";
                                }
                                
                                echo "</td><td><a href='update_client.php?said=" . $row["said"] . "'>Edit</a></td></tr>";
                              }
                            }
                          ?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- End Users Stats -->
              
            </div>
          </div>


<?php include 'footer.php';?>
