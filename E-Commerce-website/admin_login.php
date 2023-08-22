<!-- Admin Login Form -->

<?php
include "./header.php";
include "./db.php";

// If the admin_login session is not available between the browser and the server, enter it on the login page, otherwise redirect to the admin dashboard.
  if(isset($_SESSION['admin_name'])){
    $name = $_SESSION['admin_name'];
    $email = $_SESSION['admin_email'];

    // Check to get admin info in DB
    $sql = "SELECT * FROM admin_info WHERE admin_name='$name' AND admin_email='$email'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if($count==1){
      echo "<script>window.location.href='admin/index.php'</script>";
    }
  }
?>


<div class="container" style="padding:5rem 0rem">
  <!-- Content here -->
  <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
            <div style="text-align:center; padding:1.5rem 0rem">
                <h2>Admin Login</h2>
            </div>
            <div class="main main-raised" style="padding:6rem">
                <form action="admin_login_verify.php" method="post" >
                  <div class="form-group">
                    <label for="adminEmail">Email address</label>
                    <input type="email" class="form-control form-control-lg" id="adminEmail" name="email" />
                  </div>
                  <div class="form-group">
                    <label for="adminPassword">Password</label>
                    <input type="password" class="form-control form-control-lg" id="adminPassword" name="password" />
                  </div>
                  <button type="submit" class="btn btn-primar" name="admin_login_form" >Login</button>
                </form>        
            </div>
      </div>
      <div class="col-sm-2"></div>
  </div>
</div>

<?php
include "./footer.php"
?>


