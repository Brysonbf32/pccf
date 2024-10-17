
<style>
    .logodash{
        width: 30%!important;
        height: 30%!important;
        border: 1px solid #7D7D7D!important;
        border-radius: 2px!important; 
        outline: none; 
              
    }

    
</style>
    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php 
    include('includes/sidebar.php')
    ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php
                include('includes/nav.php');
                $date = "2024-5-2"
                 ?>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card shadow mb-4">
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">SUBSCRIBES</h6>
                                <div class="dropdown no-arrow">
                                    <a class="p-2"  data-toggle="modal" data-target="#adduser">
                                        <!--<i class="fa fa-plus fa-sm fa-fw text-gray-400" ></i>-->
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Content</th>
                                                <th>Date</th>
                                                <th>Author</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Content</th>
                                                <th>Date </th>
                                                <th>Author</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $datetoday = date("d/m/y");
                                                $recupedata=$my_bd->query("SELECT * FROM tbl_subscribe ORDER BY id_sub DESC");
                                                if($recupedata->rowCount()>0){
                                                while($checkdata=$recupedata->fetch()){
                                                    $id_sub =$checkdata['id_sub'];
                                                    $nom_sub=$checkdata['nom_sub'];
                                                    $email_sub=$checkdata['email_sub'];
                                                    $message_sub=$checkdata['message_sub'];
                                                    $subject_sub=$checkdata['subject_sub'];

                                            ?>
                                            <tr>
                                                <td><?=$nom_sub?></td>
                                                <td>
                                                <a class="p-2"  data-toggle="collapse" href="#collapseExample<?=$id_sub ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                </a>
                                        
                                                <div class="collapse" id="collapseExample<?=$id_sub ?>">
                                                    <div class="card card-body">
                                                    <?=$message_sub?>
                                                    </div>
                                                </div>
                                                
                                                </td>
                                                <td><?=$subject_sub?></td>
                                                <td><?=$user_nom?></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->
            <?php
            include('includes/footer.php')
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
 

