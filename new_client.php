<?php include 'header.php';?>
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
                          <form action="update_client.php?action=add" id="clientForm" method="post">
                          	 <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="said">ID Number</label>
                                <input type="text" maxlength='13' minlength='13' class="form-control" id="said" name="said" placeholder="ID Number" value="" required> </div>
                              <div class="form-group col-md-4">
                                <label for="title">Title</label>
                                <select id="title" name="title" class="form-control" required>
                                  <option></option>
                                  <option>Mr</option>
                                  <option>Mrs</option>
                                  <option>Miss</option>
                                  <option>Dr</option>
                                </select></div>
                               <div class="form-group col-md-4">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control" required>
                                  <option></option>
                                  <option>Male</option>
                                  <option>Female</option>
                                </select></div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="First Name" value="" required> </div>
                              <div class="form-group col-md-6">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Last Name" value="" required> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="(555) 555-5555" value="" > </div>
                              <div class="form-group col-md-6">
                                <label for="phone_alt">Alternative Number</label>
                                <input type="tel" class="form-control" id="phone_alt" name="phone_alt" placeholder="(555) 555-5555" value="" > </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" > </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Address</label>
                              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required> </div>
                            <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="feInputState">City</label>
                                <select id="city" name="city" class="form-control" required">
                                  <option></option>
                                  <option>Eastern Cape</option>
                                  <option>Free State</option>
                                  <option>Gauteng</option>
                                  <option>KwaZulu-Natal</option>
                                  <option>Limpopo</option>
                                  <option>Mpumalanga</option>
                                  <option>Northern Cape</option>
                                  <option>North West</option>
                                  <option>Western Cape</option>
                                </select>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="feInputCity">Consultant</label>
                                <input type="text" class="form-control" id="consultant" name="consultant"> </div>
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
                          <input type="checkbox" class="custom-control-input" id="category1" name="p1">
                          <label class="custom-control-label" for="category1">Mediation</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category2" name="p2">
                          <label class="custom-control-label" for="category2">Review</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category3" name="p3">
                          <label class="custom-control-label" for="category3">Recision</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category4" name="p4">
                          <label class="custom-control-label" for="category4">Removal</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category5" name="p5">
                          <label class="custom-control-label" for="category5">Rewards</label>
                        </div>
                      </li>
                      <li class="list-group-item d-flex px-3">
                                <select id="status" name="status" class="form-control" required>
                                  <option></option>
                                  <option>active</option>
                                  <option>pending</option>
                                  <option>complete</option>
                                  <option>canceled</option>
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
                        <textarea class="form-control" id="comments" name="comments" style="height: 125px" placeholder=""></textarea>
                      </div>
                      <div class="form-group mb-0">
                        <button type="submit" class="btn btn-accent">Submit</button>
                      </div>
                  </div>

              	</div>
              </div>
            </form>
            </div>

            <!-- End Default Light Table -->

            
            </div>

<?php include 'footer.php';?>
