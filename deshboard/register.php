<?php
session_start();
if(isset($_SESSION['auth'])){
    header('Location: ../deshboard/index');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yummy Foods | Register</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

</head>


<!-- Add denided notifacation -->
<?php
if(isset($_SESSION['denided_massage'])){
    ?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
    <div class="toast-header">
    <img src="./img/no_check_circle.png" style="width:40px;">
      <strong class="me-auto">POST STATUS:</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-white bg-danger">
      <?= $_SESSION['denided_massage'] ?>
    </div>
  </div>
  <?php
  }
?>


<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                    <img src="./img/register_image.svg" style="width:450px ; height:600px;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h2 text-gray-900 ">Yummy<span class="text-danger">.</span>  Deshboard</h1>
                                <h2 class="text-gray-900  h4">Create an Account!</h2>
                            </div>
                            <form class="user" method="POST" action="../controllers/register_backend.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="first_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                        <span class="text-danger">
                                            <?php
                                                if(isset($_SESSION['errors']['first_name_error'])){
                                                    echo $_SESSION['errors']['first_name_error'];
                                                }
                                            ?>
                                        </span>
                                        </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                            <span class="text-danger">
                                            <?php
                                                if(isset($_SESSION['errors']['last_name_error'])){
                                                    echo $_SESSION['errors']['last_name_error'];
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="user_email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                        <span class="text-danger">
                                            <?php
                                                if(isset($_SESSION['errors']['user_email_error'])){
                                                    echo $_SESSION['errors']['user_email_error'];
                                                }
                                            ?>
                                        </span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                            <span class="text-danger">
                                            <?php
                                                if(isset($_SESSION['errors']['password_error'])){
                                                    echo $_SESSION['errors']['password_error'];
                                                }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repeat_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                            <span class="text-danger">
                                                <small>
                                                <?php
                                                if(isset($_SESSION['errors']['repeat_password_error'])){
                                                    echo $_SESSION['errors']['repeat_password_error'];
                                                }
                                            ?>
                                                </small>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" name="register_button" class="btn btn-primary btn-user btn-block"">Register Account</button>
                                <hr>
                            </form>

                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>

<!-- Registron page all error massage unset -->
<?php
unset($_SESSION['errors']['first_name_error']);
unset($_SESSION['errors']['last_name_error']);
unset($_SESSION['errors']['user_email_error']);
unset($_SESSION['errors']['password_error']);
unset($_SESSION['errors']['repeat_password_error']);
unset($_SESSION['denided_massage']);

?>