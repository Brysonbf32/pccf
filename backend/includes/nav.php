<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link class=" rounded-full" href="assets/img/logo.jpg" rel="icon">

    <link type="text/css" href="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></link>
    <link rel="stylesheet" href="assets/fontawesome-free-6.2.1-web/css/all.css">
    <script defer src="assets/js/script.js"></script>


    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script defer src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

</head>
<?php

require('../config/databases.php');
error_reporting(0);
session_start();
$recupcookies = $_COOKIE['alluser_email'];
$idsession = $_SESSION['util_id'];
if(isset($recupcookies)){
    $connectdonne = $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_email=?");
    $connectdonne->execute(array($recupcookies));
    $connectdonne->rowCount();
    $cheks = $connectdonne->fetch();
    if($cheks > 0 ){
        $user_id = $cheks['util_id'];
        $user_nom = $cheks['util_nom'];
        $user_passsword = $cheks['util_password'];
        $user_mail = $cheks['util_email'];
        $user_role = $cheks['util_role'];
        $util_image = $cheks['util_image'];

    }
    else{
        header('Location: index.php');
    }
}



?>

        <body id="page-top">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                    
                            <div class="input-group-append ">
                                <p class=""><i class=" fa fa-clock facolor"></i> : <span class="heured"><?=date("h:i")?></span></p>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary searchbara" type="button">
                                                <i class="fas fa-search fa-sm searchbara"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$user_nom?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/team/<?=$util_image?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../index.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Deconnection
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Veux-tu te deconnecter?</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="index.php">Deconnexion</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   
                </div>
            </div>
        </div>
    </div>