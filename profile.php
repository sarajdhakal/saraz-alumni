<?php include 'head/header.php' ?>


  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Profile</h2>
        <p>Edit and Update your Profile </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section style="background-color: #eee;">
  <div class="container py-5" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="assets/img/2.png" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">Saraj Dhakal</h5>
            <p class="text-muted mb-1 small">Student</p>
            <p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">Bharatpur-15,Chitwan</p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Update Profile</button>
                </div>
          </div>
        </div>
             </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Saraj Dhakal</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">sarajdhakal@gmail.com</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">9876543210</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Batch</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">2020</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Bharatpur-15, Chitwan</p>
              </div>
            </div>
          </div>
        </div>
        <div class="list-group-item d-flex justify-content-between align-items-center p-3">
        <h5>Contact Details</h5>
        </div>
                <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                               <p class="mb-0">facebook.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                               <p class="mb-0">instagram.com</p>
              </li>
            
             </ul>
          </div>
        </div>
          <!-- <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
        </div> -->
      </div>
    </div>
  </div>
</section>
    <!-- End of profile section -->

    <div class="modal fade-out" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action class="row g-3">
  <div class="col-md-6">
  <form action="">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" class="form-control-plaintext" id="inputEmail4" value="Saraj Dhakal" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Email</label>
    <input type="text" class="form-control-plaintext" id="inputPassword4" value="sarajdhakal@gmail.com" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Batch</label>
    <input type="text" class="form-control-plaintext" id="inputPassword4" value="2020" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="9876543210" >
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4" class="form-label">Role</label>
    <select class="form-control col-md-6">
  <option>Student</option>
  <option>Alumni</option>
</select>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Passout Year</label>
    <input type="date" class="form-control" id="address"  >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" placeholder=" Address" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">University</label>
    <input type="text" class="form-control" id="address" placeholder=" University" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">College</label>
    <input type="text" class="form-control" id="address" placeholder=" College" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Faculty</label>
    <input type="text" class="form-control" id="address" placeholder=" Faculty" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Work(If any)</label>
    <input type="text" class="form-control" id="address" placeholder=" Work" >
  </div>
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Profile Picture</label>
    <input type="file" class="form-control" id="inputimage" name="banner" accept="image/*">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Social Media Contact</label>
    <input type="text" class="form-control" id="inputimage" name="banner" placeholder="Add your Social Media Profile Link">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Social Media Contact</label>
    <input type="text" class="form-control" id="inputimage" name="banner" placeholder="Add your Social Media Profile Link(Any Other)">
  </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
</form>
</form>
    </div>
  </div>
</div>


  </main><!-- End #main -->

<?php include('head/footer.php') ?>
