
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
                 ?>
                <!-- End of Topbar -->

                <div class="container-fluid">

    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Utilisateurs</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="p-2"  data-toggle="modal" data-target="#adduser">
                                            <i class="fa fa-plus fa-sm fa-fw text-gray-400" ></i>
                                        </a>
                                    </div>
                                </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th></th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th></th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $recupedata=$my_bd->query("SELECT * FROM tbl_utilisateurs ORDER BY util_id");
                                            if($recupedata->rowCount()>0){
                                            while($checkdata=$recupedata->fetch()){
                                                $iduse=$checkdata['util_id'];
                                                $nomutilisa=$checkdata['util_nom'];
                                                $imageutil=$checkdata['util_image'];
                                                $emilutil=$checkdata['util_email'];
                                                $passwordutil=$checkdata['util_password'];
                                                $roleutil=$checkdata['util_role'];
                                        ?>
                                        <tr>
                                            <td><img class="imagetable rounded-circle" src="../assets/img/team/<?=$imageutil?>"></td>
                                            <td><?=$nomutilisa?></td>
                                            <td><?=$emilutil?></td>
                                            <td><?=$passwordutil?></td>
                                            <td><?=$roleutil?></td>
                                            <td>
                                            <a class="p-2"  data-toggle="modal" data-target="#modif<?=$iduse?>">
                                                <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                            </a>
                                            <a class="p-2"  data-toggle="modal" data-target="#suprim<?=$iduse?>">
                                                <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                            </a>
                                            </td>
                                        </tr>
                                                 <!-- Modifier user -->
                                                <div class="modal fade" id="modif<?=$iduse?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal_foterbar">
                                                            <h5 class="modal_labeltext" id="exampleModalLabel">Modifier Utilisateur</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-6">
                                                                        <img class="imagetable rounded-sm" src="../assets/img/team/<?=$imageutil?>">
                                                                    </div>
                                                                    <div class="col-12 col-lg-6">
                                                                        <label for="recipient-name" class="modal_labeltext">Profile:</label>
                                                                        <input type="file" class="modal_input" name="input_image" value="<?=$imageutil?>">
                                                                        <input type="hidden" class="modal_input" name="input_oldimage" value="<?=$imageutil?>">

                                                                    </div>
                                                                    <div class="col-12 col-lg-6">
                                                                        <label for="recipient-name" class="modal_labeltext">Nom Utilisateur:</label>
                                                                        <input type="text" class="modal_input" name="input_nonutili" value="<?=$nomutilisa?>">
                                                                        <input type="hidden" class="modal_input" name="input_idutili" value="<?=$iduse?>">
                                                                    </div>
                                                                    <div class="col-12 col-lg-6">
                                                                        <label for="recipient-name" class="modal_labeltext">Mot de passe:</label>
                                                                        <input type="text" class="modal_input" name="input_password" value="<?=$passwordutil?>">
                                                                    </div>
                                                                    <div class="col-12 col-lg-6">
                                                                        <label for="recipient-name" class="modal_labeltext">E-mail:</label>
                                                                        <input type="text" class="modal_input" name="input_mail" value="<?=$emilutil?>">
                                                                    </div>
                                                                    <div class="col-12 col-lg-6">
                                                                        <label for="recipient-name" class="modal_labeltext">Role:</label>
                                                                        <select  class="modal_input" name="input_role" >
                                                                            <option>Choose your Role</option>
                                                                            <option value="Administrateur">Administrateur</option>
                                                                            <option value="Encadreur">Encadreur</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer modal_foterbar">
                                                                <button type="submit" name="modifier" class="btn btn-secondary btn-sm add_modalitemsrh">Modifier</button>
                                                                <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete user -->
                                                <div class="modal fade bd-example-modal-sm" id="suprim<?=$iduse?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog bd-example-modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal_foterbar">
                                                            <h5 class="modal_labeltext" id="exampleModalLabel">Suprimer Utilisateur</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <h2 class="modal_suprimtitre">Veux-tu suprimer l'utilisateur <span class="span_nomutil"><?=$nomutilisa?></span></h2>
                                                                <input type="hidden" name="input_user_id" value=<?=$iduse?>>
                                                                <div class="modal-footer modal_foterbar">
                                                                <button type="submit" name="delete" class="btn btn-secondary btn-sm add_modalitemsrh">Supprim</button>
                                                                <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Cancel</button>
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
 
                    <!-- Logout Modal-->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Utilisateur</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-12 col-lg-12">
                            <label for="recipient-name" class="modal_labeltext">Utilisateur:</label>
                            <input type="file" class="modal_input" name="input_image">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="recipient-name" class="modal_labeltext">Nom Utilisateur:</label>
                            <input type="text" class="modal_input focus:outline-none" name="input_nonutili">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="recipient-name" class="modal_labeltext">Mot de passe:</label>
                            <input type="text" class="modal_input" name="input_password">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="recipient-name" class="modal_labeltext">E-mail:</label>
                            <input type="text" class="modal_input" name="input_mail">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="recipient-name" class="modal_labeltext">Role:</label>
                            <select  class="modal_input" name="input_role" >
                                <option class="modal_option">Choisie le Role</option>
                                <option class="modal_option" value="administrateur">Administrateur</option>
                                <option class="modal_option" value="encadreur">Particulier</option>
                            </select>
                        </div>                 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajouteruser">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
