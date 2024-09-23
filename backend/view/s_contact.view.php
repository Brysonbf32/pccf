
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
                                    <h6 class="m-0 font-weight-bold text-primary">NOS CONTACTS</h6>
                                    <?php
                                        if(isset($_SESSION['status']) && $_SESSION != ''){
                                            ?>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <strong>Hey!</strong> <?=$_SESSION['status']; ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            unset($_SESSION['status']);
                                        }
                                    ?>
                                    <div class="dropdown no-arrow">
                                        <a class="p-2"  data-toggle="modal" data-target="#ajoutercontact">
                                            <i class="fa fa-plus fa-sm fa-fw text-gray-400" ></i>
                                        </a>
                                    </div>
                                </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $datetoday = date("d/m/y");
                                            $recupedata=$my_bd->query("SELECT * FROM tbl_contact ORDER BY id_co DESC");
                                            if($recupedata->rowCount()>0){
                                            while($checkdata=$recupedata->fetch()){
                                                $id_co=$checkdata['id_co'];
                                                $email_co=$checkdata['email_co'];
                                                $address_co=$checkdata['address_co'];
                                                $numero_co=$checkdata['numero_co'];
                                        ?>
                                        <tr>
                                            <td><?=$email_co?></td>
                                            <td><?=$address_co?></td>
                                            <td><?=$numero_co?></td>
                                            <td>
                                            <a class="p-2"  data-toggle="modal" data-target="#modif<?=$id_co?>">
                                                <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                            </a>
                                            <a class="p-2"  data-toggle="modal" data-target="#suprim<?=$id_co?>">
                                                <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                            </a>
                                            </td>
                                        </tr>
                                                <!-- MODIFIER CONTACT-->
                                                <div class="modal fade" id="modif<?=$id_co?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modaltitle" id="exampleModalLabel">Contact</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-12">
                                                                        <label for="recipient-name" class="modal_labeltext">Email:</label>
                                                                        <input type="mail" class="modal_input focus:outline-none" value="<?=$email_co?>" name="input_email">
                                                                        <input name="id_co" value="<?=$id_co?>" type="hidden">
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                        <label for="recipient-name" class="modal_labeltext">Addres:</label>
                                                                        <input type="text" class="modal_input focus:outline-none" value="<?=$address_co?>" name="input_addresse">
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                        <label for="recipient-name" class="modal_labeltext">Contact:</label>
                                                                        <input type="text" class="modal_input focus:outline-none" value="<?=$numero_co?>" name="input_contact">
                                                                        </div>                
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="modifier">Modifier</button>
                                                                    <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- SUPPRIMER CONTACT-->
                                                <div class="modal fade bd-example-modal-sm" id="suprim<?=$id_co?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog bd-example-modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal_foterbar">
                                                            <h5 class="modal_labeltext" id="exampleModalLabel">Suprimer About</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <h2 class="modal_suprimtitre">Veux-tu suprimer cette section About <span class="span_nomutil"><?=$email_co?></span></h2>
                                                                <input type="hidden" name="input_blogid" value=<?=$id_co?>>
                                                                <div class="modal-footer modal_foterbar">
                                                                <button type="submit" name="delete" class="btn btn-secondary btn-sm add_modalitemsrh">Supprim</button>
                                                                <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
 
        <!-- AJOUTER CONTACT-->
    <div class="modal fade" id="ajoutercontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Contact</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <label for="recipient-name" class="modal_labeltext">Email:</label>
                                <input type="mail" class="modal_input focus:outline-none" name="input_email">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Addres:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_addresse">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Contact:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_contact">
                            </div>                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajoutercontact">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
