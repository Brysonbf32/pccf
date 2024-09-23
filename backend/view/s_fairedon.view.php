
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
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">NOS DONS</h6>
                            <div class="dropdown no-arrow">
                                <a class="p-2" data-toggle="modal" data-target="#adduser">
                                    <!--<i class="fa fa-plus fa-sm fa-fw text-gray-400" ></i>-->
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Donnateur</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Commentaire</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Donnateur</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Commentaire</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $recupedata = $my_bd->query("SELECT * FROM tbl_fairedon ORDER BY id_don DESC");
                                        if ($recupedata->rowCount() > 0) {
                                            while ($checkdata = $recupedata->fetch()) {
                                                $id_don = $checkdata['id_don'];
                                                $nom_don = $checkdata['nom_don'];
                                                $email_don = $checkdata['email_don'];
                                                $address_don = $checkdata['address_don'];
                                                $phone_don = $checkdata['phone_don'];
                                                $commentaire_don = $checkdata['commentaire_don'];
                                                $date_don = $checkdata['date_don'];
                                        ?>
                                                <tr>
                                                    <td><?= $nom_don ?></td>
                                                    <td><?= $email_don ?></td>
                                                    <td><?= $address_don ?></td>
                                                    <td><?= $phone_don ?></td>
                                                    <td>
                                                        <a class="p-2" data-toggle="collapse" href="#collapseExample<?= $id_don ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <i class="fa fa-eye fa-sm fa-fw text-gray-400"></i>
                                                        </a>

                                                        <div class="collapse" id="collapseExample<?= $id_don ?>">
                                                            <div class="card card-body">
                                                                <?= $commentaire_don ?>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td><?= $date_don ?></td>
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