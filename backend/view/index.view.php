<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pccf</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .loginbtn{
        background-color: #71A82A!important;
        color: white!important;
    }
    .bg-gradient-primary{
        background-color: white!important;
    }
    .incorect{
    font-size: 15px;
    color: #089BF4!important;
  }
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenu!</h1>
                                        <?php
                                            if(isset($_SESSION['status']) && $_SESSION != ''){
                                                ?>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Pardon Erreur!!!</strong> <?=$_SESSION['status']; ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php
                                                unset($_SESSION['status']);
                                            }
                                        ?>
                                    </div>
                                    <form method="POST">
                                        <div class="form-group">
                                            <input name="input_email" type="email" class="modal_input"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Entrer Email Address..." >
                                        </div>
                                        <div class="form-group">
                                            <input name="input_password" type="password" class="modal_input"
                                                id="exampleInputPassword" placeholder="Mot de passe" >
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                        <button class=" btn-user btn-block modal_input loginbtn" type="submit" name="loginpccf">Connecter</button>
                                    </form>
                                </div>
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

</body>

</html>