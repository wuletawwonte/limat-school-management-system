<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="limatschool.wuletaw system login page">
    <meta name="author" content="Wuletaw Wonte">

    <title>Limatschool.com</title>

    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="dist/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">


  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <form class="card p-4" method="post" action="<?php echo base_url(); ?>welcome/user_validation">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>

<!--             <?php if($error) {  ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?php echo $error;?>
            </div>
          <?php } ?>
 -->

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" placeholder="Username" id='username' name="username">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Welcome</h2>
                  <p>Arbaminch Limat School management system only registered and allowed accounts are
                  permited to login here like any other system.</p>
                  <!-- <button class="btn btn-primary active mt-3" type="button">Register Now!</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </body>
</html>