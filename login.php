<?php
include_once 'assets/util.php';
include_once 'assets/sql/connect.php';
include_once 'assets/sessions.php';


if(isset($_POST['homeBtn'])){
  header("location: index.php");
}

if(isset($_POST['loginBtn'])){

  //empty array to hold all errors
  $signupErr = array();

  //using the functions to validate the form
  $requiredFields = array('username', 'password');
  $signupErr = array_merge($signupErr, empty_field_val($requiredFields));

  if(empty($signupErr)){
      // checcing id the user exists
      $loggedInUser = $_POST['username'];
      $password = $_POST['password'];

      // cconfirming the user exists
      //$sql = "SELECT * FROM storyteller_tb WHERE username = :username";
      $sql = "SELECT * FROM users WHERE username = :username";
      $statement = $conn->prepare($sql);
      $statement->execute(array(':username' => $loggedInUser));
      $row = $statement->fetch();

      while($row){
        $id = $row['id'];
        $hashed_password = $row['password'];
        $username = $row['username'];
        $is_Admin = $row['is_Admin'];

        if(password_verify($password, $hashed_password)){
          $_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['is_Admin'] = $is_Admin;
          switch ($is_Admin) {
            case "1":
                header("location: admin.php");
                break;

            case "0":
                header("location: loggedIn.php");
            }
        }else{
          $result = "<p>Invalid username or password</p>";
        }
      }

  }else{
    if(count($signupErr) == 1){
      $result = "<p style='color: red;'> There was one error in the form </p>";
    }
    else{
      $result = "<p style='color: red;'> There were " .count($signupErr). " errors in the form </p>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="login-body">
    <style>
    .login-body{
    background: url(assets/images/bkpIc.jpg);
    background-repeat: no-repeat;
    background-size: cover ;
    }

    .login-form{
    width: 350px;
    top: 50%;
    left: 50%;
    transform: translate(-50% ,-50%);
    position: absolute;
    color:#fff;
    }
    </style>

        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($signupErr)) echo display_errors($signupErr); ?>

        <form method="post" action="">
            <section class="vh-100 gradient-custom">
              
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div >
                        <div class="card-body p-5 text-center">

                            <div class="login-form">

                            <h1 class="fw-bold mb-2 text-uppercase">Login</h1>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="username" id="typeEmailX" class="form-control form-control-lg" name="username" placeholder="Enter Username"/>
                                <label class="form-label" for="typeEmailX"></label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" placeholder="Enter Password"/>
                                <label class="form-label" for="typePasswordX"></label>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!"></a></p>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="loginBtn">Login</button>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="homeBtn">Home</button> <br><br>

                              <p class="mb-0">Don't have an account? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>