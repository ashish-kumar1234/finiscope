<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href=<?php echo base_url('Assest/vendors/bootstrap/dist/css/bootstrap.min.css')?> rel="stylesheet">
    <!-- Font Awesome -->
    <link href=<?php echo base_url('Assest/vendors/font-awesome/css/font-awesome.min.css')?> rel="stylesheet">
    <!-- NProgress -->
    <link href=<?php echo base_url('Assest/vendors/nprogress/nprogress.css')?> rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href=<?php echo base_url('Assest/build/css/custom.min.css')?> rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <form action="<?php echo base_url('admin_controller/loginUser');?>" method="post">
             
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email"  name="email"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password"   name="password"/>
              </div>
              <div>
                <!-- <a class="btn btn-default submit" name="submit">Log in</a> -->
                <button class="btn btn-primary" name="submit">Login</button>

                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href=" " class="to_register"> Create Account </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
