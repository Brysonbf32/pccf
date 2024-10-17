
<style>

    
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
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">NOS PROGRAMMES</h6>
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
                                                        <th>Titre</th>
                                                        <th>Contenus</th>
                                                        <th>Date</th>
                                                        <th>Editeur</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th>Titre</th>
                                                        <th>Contenus</th>
                                                        <th>Date </th>
                                                        <th>Editeur</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                        $datetoday = date("d/m/y");
                                                        $recupedata=$my_bd->query("SELECT * FROM tbl_programs ORDER BY id_pro DESC");
                                                        if($recupedata->rowCount()>0){
                                                        while($checkdata=$recupedata->fetch()){
                                                            $id_pro=$checkdata['id_pro'];
                                                            $abouttitre=$checkdata['titre_pro'];
                                                            $aboutimage=$checkdata['image_pro'];
                                                            $aboutcontent=$checkdata['content_pro'];
                                                            $aboutdatepub=$checkdata['datepub_pro'];
                                                            $status=$checkdata['status_pro'];
                                                    ?>
                                                    <tr>
                                                        <td><img class="imagetable rounded-sm" src="../assets/img/projects/<?=$aboutimage?>">
                                                            <a class="p-2 "  data-toggle="modal" data-target="#image<?=$id_pro?>">
                                                                <i class="fa fa-camera fa-md  facolor " ></i>
                                                            </a>
                                                        </td>
                                                        <td><?=$abouttitre?></td>
                                                        <td class="pt-3">
                                                        <a class="p-2 pt-2"  data-toggle="collapse" href="#coll<?=$id_pro?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                
                                                        <div class="collapse" id="coll<?=$id_pro?>">
                                                            <div class="card card-body">
                                                            <?=$aboutcontent?>
                                                            </div>
                                                        </div>
                                                        
                                                        </td>
                                                        <td><?=$aboutdatepub?></td>
                                                        <td><?=$user_nom?></td>
                                                        <td>
                                                        <a class="p-2"  data-toggle="modal" data-target="#modif<?=$id_pro?>">
                                                            <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                        <a class="p-2"  data-toggle="modal" data-target="#suprim<?=$id_pro?>">
                                                            <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                        <span class="missioabout pb-1"  data-toggle="modal" data-target="#mission<?=$id_pro?>"> &nbsp;  <i class="fa fa-plus fa-xs"></i> mission&nbsp;</span>
                                                        </td>
                                                    </tr>
                                                            <!-- Modifier Programmes -->
                                                            <div class="modal fade" id="modif<?=$id_pro?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Modifier Programme </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-12">
                                                                                    <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                                                                    <input type="text" class="modal_input" name="input_titre" value="<?=$abouttitre?>">
                                                                                    <input type="hidden" name="input_idpro" value=<?=$id_pro?>>
                                                                                </div>
                                                                                <div class="col-12 col-lg-12">
                                                                                    <label for="recipient-name" class="modal_labeltext">Description:</label>
                                                                                    <textarea class="modal_input" name="content_pro" cols="30" rows="7" placeholder="Tapez Texte" value="<?=$aboutcontent?>"><?=$aboutcontent?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="modifierprogram" class="btn btn-secondary btn-sm add_modalitemsrh">Modifier</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <!-- Modifier Imag -->
                                                            <div class="modal fade" id="image<?=$id_pro?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Modifier Image </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-6">
                                                                                    <div>
                                                                                    <img class="imagetables rounded-sm" src="../assets/img/projects/<?=$aboutimage?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Image:</label>
                                                                                    <input type="hidden" class="modal_input" name="input_id_pro" value="<?=$id_pro?>">
                                                                                    <input type="file" class="modal_input" name="input_image">
                                                                                    <input type="hidden" class="modal_input" name="old_image" value="<?=$aboutimage?>">

                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="modifierimage" class="btn btn-secondary btn-sm add_modalitemsrh">Modifier</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <!-- AJOUTER MISSION -->
                                                            <div class="modal fade" id="mission<?=$id_pro?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Ajouter Mission </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 1:</label>
                                                                                    <input type="hidden" class="modal_input" name="input_id_pro" value="<?=$id_pro?>">
                                                                                    <input type="text" class="modal_input" name="input_mission1">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 2:</label>
                                                                                    <input type="text" class="modal_input" name="input_mission2">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 3:</label>
                                                                                    <input type="text" class="modal_input" name="input_mission3">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 4:</label>
                                                                                    <input type="text" class="modal_input" name="input_mission4">
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="ajoutermission" class="btn btn-secondary btn-sm add_modalitemsrh">Ajouter</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Delete Programmes -->
                                                            <div class="modal fade bd-example-modal-sm" id="suprim<?=$id_pro?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                            <h2 class="modal_suprimtitre">Veux-tu suprimer cette section About <span class="span_nomutil"><?=$abouttitre?></span></h2>
                                                                            <input type="hidden" name="input_blogid" value=<?=$id_pro?>>
                                                                            <input type="hidden" name="input_image" value=<?=$aboutimage?>>
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
                        </div>
                    </div>
                    <!-- DataTales Example -->
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
                    <h5 class="modaltitle" id="exampleModalLabel">Ajouter Programme</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Image:</label>
                                <input type="file" class="modal_input" name="input_image">
                                <input type="hidden" name="datepub" value="<?=$datetoday?>">
                                <input type="hidden" name="authorname" value="<?=$user_nom?>">
 
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_titreabout">
                            </div>
                            <div class="col-12 col-lg-12">
                                <label for="recipient-name" class="modal_labeltext">Description:</label>
                                <textarea class="modal_input" name="content_pro" cols="30" rows="7" placeholder="Tapez Texte"></textarea>
                            </div>                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajouterpro">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
