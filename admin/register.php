<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../assets/img/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../assets/img/favicon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/img/favicon.png"
    />
    <!-- Mobile Specific Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="vendors/styles/icon-font.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="src/plugins/jquery-steps/jquery.steps.css"
    />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-119386393-1");
    </script>
  </head>

  <body class="login-page">
    <div class="login-header box-shadow">
      <div
        class="container-fluid d-flex justify-content-between align-items-center"
      >
        <div class="brand-logo">
          <a href="login.php">
            <img src="../assets/img/logo.png" alt="" />
          </a>
        </div>
        <div class="login-menu">
          <ul>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-7">
            <img src="vendors/images/register-page-img.png" alt="">
          </div>
          <div class="col-md-6 col-lg-5">
            <div class="register-box bg-white box-shadow border-radius-10 p-1" >
              <?php 
              if (!isset($_GET['action'])) {
              ?>
              <h5 class="text-center my-4 text-uppercase">Account Information</h5>
                <section class="m-3">
                  <form id="user-registration">

                  <div class="form-wrap max-width-600 mx-auto">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Full Name*</label>
                      <div class="col-sm-8">
                        <input type="text" name="name"class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Email Address*</label>
                      <div class="col-sm-8">
                        <input type="email" name="email"class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Phone*</label>
                      <div class="col-sm-8">
                        <input type="phone" name="phone"class="form-control">
                      
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Password*</label>
                      <div class="col-sm-8">
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Confirm Password*</label>
                      <div class="col-sm-8">
                        <input type="password" name="confirm_password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="Register_account" class="btn btn-outline-primary w-100"> <i class="dw dw-add-user mr-2"></i>Register</button>
                  </div>
                </form>
                  </section>
                  <?php
  }
                 else {
                  ?>
                  <div id="verify-account p-4" class="mx-2">
                    <h5 class="text-center my-4 text-uppercase">Please Verify your Email</h5>
                    <p class="text-center">Your  Verification Code Is sent to <span class="font-weight-bold" id="v-email"><?php echo $_SESSION['email'] ?></span> </p>
                    <form action="" id="verification">
                       <div class="input-group custom mt-4">
                      <div class="input-group-prepend custom">
                        <span class="input-group-text"><i class="dw dw-key"></i></span>
                      </div>
                      <input type="text" id="verification_code" class="form-control text-center font-weight-bold" placeholder="Verification Code">
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" id="btn_verification" class="btn btn-outline-info w-75"> <i class="dw dw-checked mr-2"></i>  Register</button>
                    </div>
                    </form>
                   
                  </div>
                 <?php } ?>
                </div>
                
            </div>
          </div>
        </div>
      </div>

    <!-- success Popup html Start -->
   
    <!-- success Popup html End -->
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="vendors/scripts/steps-setting.js"></script>
    <script src="./scripts/register.js"></script>
  </body>
</html>
