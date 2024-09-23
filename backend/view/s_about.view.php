
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
                 <style>
                    .message{
                        color: red!important;
                    }
                 </style>
                        <!-- =====================================SECTION APROPOS=========================================-->
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">APROPOS DE NOUS</h6>
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
                                        <a class="p-2"  data-toggle="modal" data-target="#apropos">
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
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    $datetoday = date("d/m/y");
                                                    $recupedata=$my_bd->query("SELECT * FROM tbl_about ORDER BY id_about DESC");
                                                    if($recupedata->rowCount()>0){
                                                    while($checkdata=$recupedata->fetch()){
                                                        $idabout=$checkdata['id_about'];
                                                        $abouttitre=$checkdata['titre_about'];
                                                        $aboutimage=$checkdata['image_about'];
                                                        $aboutcontent=$checkdata['text_about'];
                                                        $aboutdatepub=$checkdata['datepub_blog'];
                                                        $status=$checkdata['status_blog'];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img class="imagetable rounded-circle" src="../assets/img/about/<?=$aboutimage?>">
                                                        <a class="p-2 "  data-toggle="modal" data-target="#image<?=$idabout?>">
                                                            <i class="fa fa-camera fa-md  facolor " ></i>
                                                        </a>
                                                    </td>
                                                    <td><?=$abouttitre?></td>
                                                    <td>
                                                    <a class="p-2"  data-toggle="collapse" href="#collapseExample<?=$idabout?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                    </a>
                                            
                                                    <div class="collapse" id="collapseExample<?=$idabout?>">
                                                        <div class="card card-body">
                                                        <?=$aboutcontent?>
                                                        </div>
                                                    </div>
                                                    
                                                    </td>
                                                    <td>
                                                    <a class="p-2"  data-toggle="modal" data-target="#modif<?=$idabout?>">
                                                        <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                                    </a>
                                                    <a class="p-2"  data-toggle="modal" data-target="#suprim<?=$idabout?>">
                                                        <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                                            <!-- Modifier Imag -->
                                                    <div class="modal fade" id="image<?=$idabout?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                            <img class="imagetables rounded-sm" src="../assets/img/about/<?=$aboutimage?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                            <label for="recipient-name" class="modal_labeltext">Image:</label>
                                                                            <input type="hidden" class="modal_input" name="input_idabout" value="<?=$idabout?>">
                                                                            <input type="file" class="modal_input" name="input_image">
                                                                            <input type="hidden" class="modal_input" name="old_image" value="<?=$aboutimage?>">

                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="modal-footer modal_foterbar">
                                                                    <button type="submit" name="modifierimageabout" class="btn btn-secondary btn-sm add_modalitemsrh">Modifier</button>
                                                                    <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <!-- Modifier Apropos -->
                                                        <div class="modal fade" id="modif<?=$idabout?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header modal_foterbar">
                                                                    <h5 class="modal_labeltext" id="exampleModalLabel">Modifier Apropos </h5>
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
                                                                                <input type="hidden" class="modal_input" name="input_idabout" value="<?=$idabout?>">
                                                                            </div>
                                                                            <div class="col-12 col-lg-12">
                                                                                <label for="recipient-name" class="modal_labeltext">Contenu:</label>
                                                                                <textarea class="modal_input" name="about_text" cols="30" rows="7" placeholder="Tapez Texte" value="<?=$aboutcontent?>"><?=$aboutcontent?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="modifierabout" class="btn btn-secondary btn-sm add_modalitemsrh">Modifier</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Delete Apropos -->
                                                        <div class="modal fade bd-example-modal-sm" id="suprim<?=$idabout?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog bd-example-modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Suprimmer Apropos</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST">
                                                                            <h2 class="modal_suprimtitre">Veux-tu Suprimmer Cette Section d'Apropos <span class="span_nomutil"><?=$abouttitre?></span></h2>
                                                                            <input type="hidden" name="input_blogid" value=<?=$idabout?>>
                                                                            <input type="hidden" name="image_text" value="<?=$aboutimage?>">
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="delete" class="btn btn-secondary btn-sm add_modalitemsrh">Supprim</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
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
                        <!-- =====================================SECTION EQUIPE=========================================-->
                        <div class="col-12 col-lg-6">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> EQUIPE </h6>
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
                                        <a class="p-2"  data-toggle="modal" data-target="#adduserequip">
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
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    $datetoday = date("d/m/y");
                                                    $recupedata=$my_bd->query("SELECT * FROM tbl_equipe ORDER BY id_tim DESC");
                                                    if($recupedata->rowCount()>0){
                                                    while($checkdata=$recupedata->fetch()){
                                                        $idequipe=$checkdata['id_tim'];
                                                        $titre=$checkdata['titre_tim'];
                                                        $equiprole=$checkdata['role_tim'];
                                                        $aboutimage=$checkdata['image_tim'];
                                                        $linkf_tim=$checkdata['linkf_tim'];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img class="imagetable rounded-circle" src="../assets/img/team/<?=$aboutimage?>">
                                                        <a class="p-2 "  data-toggle="modal" data-target="#image<?=$idequipe?>">
                                                            <i class="fa fa-camera fa-md  facolor " ></i>
                                                        </a>
                                                    </td>
                                                    <td><?=$titre?></td>
                                                    <td><?=$equiprole?></td>                                                                                                                                            
                                                    <td>
                                                    <a class="p-2"  data-toggle="modal" data-target="#modifierquip<?=$idequipe?>">
                                                        <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                                    </a>
                                                    <a class="p-2"  data-toggle="modal" data-target="#suprimequip<?=$idequipe?>">
                                                        <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                                        <!-- Modifier Imag -->
                                                    <div class="modal fade" id="image<?=$idequipe?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                            <img class="imagetables rounded-sm" src="../assets/img/team/<?=$aboutimage?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                            <label for="recipient-name" class="modal_labeltext">Image:</label>
                                                                            <input type="hidden" class="modal_input" name="input_equi" value="<?=$idequipe?>">
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
                                                        <!-- Modifier Equipe -->

                                                        <div class="modal fade" id="modifierquip<?=$idequipe?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modaltitle" id="exampleModalLabel">Modifier Profile</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">                           
                                                                                <div class="col-12 col-lg-12">
                                                                                    <label for="recipient-name" class="modal_labeltext">Nom Complet:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" name="input_noequi" value="<?=$titre?>">
                                                                                    <input type="hidden" name="idprofile" value="<?=$idequipe?>">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Poste:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" name="input_posteequi" value="<?=$equiprole?>">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Link Fb:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" name="input_linkfb" value="<?=$linkf_tim?>" >
                                                                                </div>              
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="modifierquipe">Modifier</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Delete Equipe -->
                                                        <div class="modal fade bd-example-modal-sm" id="suprimequip<?=$idequipe?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog bd-example-modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Suprimer</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST">
                                                                            <h2 class="modal_suprimtitre">Veux-tu suprimer cette section About <span class="span_nomutil"><?=$titre?></span></h2>
                                                                            <input type="hidden" name="input_id" value=<?=$idequipe?>>
                                                                            <input type="hidden" name="image_text" value="<?=$aboutimage?>">
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="deleteequip" class="btn btn-secondary btn-sm add_modalitemsrh">Supprim</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
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
                <div class="container">
                    <div class="row">
                        <!-- =====================================SECTION VISION=========================================-->
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">VISION </h6>
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
                                        <a class="p-2"  data-toggle="modal" data-target="#vision">
                                            <i class="fa fa-plus fa-sm fa-fw text-gray-400" ></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <p class="message"><?=$message?></p>
                                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    $datetoday = date("d/m/y");
                                                    $recupedata=$my_bd->query("SELECT * FROM tbl_vision ORDER BY id_vi DESC LIMIT 4");
                                                    if($recupedata->rowCount()>0){
                                                    while($checkdata=$recupedata->fetch()){
                                                        $idvision=$checkdata['id_vi'];
                                                        $titre=$checkdata['titre_vi'];
                                                        $desc=$checkdata['descri_vi'];
                                                        $detail_vi1=$checkdata['detail_vi1'];
                                                        $detail_vi2=$checkdata['detail_vi2'];
                                                        $detail_vi3=$checkdata['detail_vi3'];
                                                        $detail_vi4=$checkdata['detail_vi4'];
                                                ?>
                                                <tr>
                                                    <td><?=$titre?></td>
                                                    <td>
                                                    <a class="p-2"  data-toggle="collapse" href="#collapseExamples<?=$idvision?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                    </a>
                                            
                                                    <div class="collapse" id="collapseExamples<?=$idvision?>">
                                                        <div class="card card-body">
                                                        <?=$desc?>
                                                        </div>
                                                    </div>
                                                    
                                                    </td>
                                                    <td>
                                                        <a class="p-2"  data-toggle="modal" data-target="#modifvision<?=$idvision?>">
                                                            <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                        <a class="p-2"  data-toggle="modal" data-target="#suprimevision<?=$idvision?>">
                                                            <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                        <!-- Modifier blog -->
                                                        <div class="modal fade" id="modifvision<?=$idvision?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modaltitle" id="exampleModalLabel">Modifier Vision</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                                                                    <input type="text" value="<?=$titre?>" class="modal_input focus:outline-none" name="input_titre">
                                                                                    <input type="hidden" value="<?=$idvision?>" name="id_vis">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Description:</label>
                                                                                    <input type="text" value="<?=$desc?>" class="modal_input focus:outline-none" name="input_descri">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Vision 1:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi1?>" name="input_vision1">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Vision 2:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi2?>" name="input_vision2">
                                                                                </div> 
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Vision 3:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi3?>" name="input_vision3">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Vision 4:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi4?>" name="input_vision4">
                                                                                </div>              
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="modificationvision">Modifier</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- SUPPRESSION VISION-->
                                                        <div class="modal fade bd-example-modal-sm" id="suprimevision<?=$idvision?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog bd-example-modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Suprimer</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST">
                                                                            <h2 class="modal_suprimtitre">Veux-tu suprimer cette Vision <span class="span_nomutil"><?=$titre?></span></h2>
                                                                            <input type="hidden" name="id_vis" value=<?=$idvision?>>
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="deletevisions" class="btn btn-secondary btn-sm add_modalitemsrh">Supprim</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
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
                        <!-- =====================================SECTION MISSION=========================================-->
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">MISSION </h6>
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
                                        <a class="p-2"  data-toggle="modal" data-target="#missions">
                                            <i class="fa fa-plus fa-sm fa-fw text-gray-400" ></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <p class="message"><?=$message?></p>
                                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    $datetoday = date("d/m/y");
                                                    $recupedata=$my_bd->query("SELECT * FROM tbl_mission ORDER BY id_mi DESC LIMIT 4");
                                                    if($recupedata->rowCount()>0){
                                                    while($checkdata=$recupedata->fetch()){
                                                        $idmi=$checkdata['id_mi'];
                                                        $titre=$checkdata['titre_mi'];
                                                        $desc=$checkdata['descri_mi'];
                                                        $detail_vi1=$checkdata['detail_mi1'];
                                                        $detail_vi2=$checkdata['detail_mi2'];
                                                        $detail_vi3=$checkdata['detail_mi3'];
                                                        $detail_vi4=$checkdata['detail_mi4'];
                                                ?>
                                                <tr>
                                                    <td><?=$titre?></td>
                                                    <td>
                                                        <a class="p-2"  data-toggle="collapse" href="#collapseExamples<?=$idmi?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                
                                                        <div class="collapse" id="collapseExamples<?=$idmi?>">
                                                            <div class="card card-body">
                                                            <?=$desc?>
                                                            </div>
                                                        </div>
                                                    
                                                    </td>
                                                    <td>
                                                        <a class="p-2"  data-toggle="modal" data-target="#modifmission<?=$idmi?>">
                                                            <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                        <a class="p-2"  data-toggle="modal" data-target="#suprimmision<?=$idmi?>">
                                                            <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                        <!-- MODIFIER MISSION -->
                                                        <div class="modal fade" id="modifmission<?=$idmi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modaltitle" id="exampleModalLabel">Modifier Mission</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                                                                    <input type="hidden" value="<?=$idmi?>" name="id_mi">
                                                                                    <input type="text" value="<?=$titre?>" class="modal_input focus:outline-none" name="input_titre">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Description:</label>
                                                                                    <input type="text" value="<?=$desc?>" class="modal_input focus:outline-none" name="input_descri">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 1:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi1?>" name="input_mission1">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 2:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi2?>" name="input_mission2">
                                                                                </div> 
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 3:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi3?>" name="input_mission3">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Mission 4:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi4?>" name="input_mission4">
                                                                                </div>              
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="modifiermission">Modifier</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- SUPPRESSION MISSION -->
                                                        <div class="modal fade bd-example-modal-sm" id="suprimmision<?=$idmi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog bd-example-modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Suprimer</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST">
                                                                            <h2 class="modal_suprimtitre">Veux-tu suprimer cette section Mission <span class="span_nomutil"><?=$titre?></span></h2>
                                                                            <input type="hidden" name="id_mi" value=<?=$idmi?>>
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="deletemission" class="btn btn-secondary btn-sm add_modalitemsrh">Supprim</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
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
                        <!-- =====================================SECTION VALEUR========================================= -->

                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">NOS VALEURS </h6>
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
                                        <a class="p-2"  data-toggle="modal" data-target="#valeur">
                                            <i class="fa fa-plus fa-sm fa-fw text-gray-400" ></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <p class="message"><?=$message?></p>
                                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Contenu</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    $datetoday = date("d/m/y");
                                                    $recupedata=$my_bd->query("SELECT * FROM tbl_valeurs ORDER BY id_va DESC LIMIT 4");
                                                    if($recupedata->rowCount()>0){
                                                    while($checkdata=$recupedata->fetch()){
                                                        $idva=$checkdata['id_va'];
                                                        $titre=$checkdata['titre_va'];
                                                        $desc=$checkdata['descri_va'];
                                                        $detail_vi1=$checkdata['detail_va1'];
                                                        $detail_vi2=$checkdata['detail_va2'];
                                                        $detail_vi3=$checkdata['detail_va3'];
                                                        $detail_vi4=$checkdata['detail_va4'];
                                                ?>
                                                <tr>
                                                    <td><?=$titre?></td>
                                                    <td>
                                                        <a class="p-2"  data-toggle="collapse" href="#collapseExamples<?=$idva?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                
                                                        <div class="collapse" id="collapseExamples<?=$idva?>">
                                                            <div class="card card-body">
                                                            <?=$desc?>
                                                            </div>
                                                        </div>
                                                    
                                                    </td>
                                                    <td>
                                                        <a class="p-2"  data-toggle="modal" data-target="#valeur<?=$idva?>">
                                                            <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                        <a class="p-2"  data-toggle="modal" data-target="#supprimervaleur<?=$idva?>">
                                                            <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                        <!-- MODIFIER VALEURS -->
                                                        <div class="modal fade" id="valeur<?=$idva?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modaltitle" id="exampleModalLabel">Modifier Valeur</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                                                                    <input type="text" value="<?=$titre?>" class="modal_input focus:outline-none" name="input_titre">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Description:</label>
                                                                                    <input type="text" value="<?=$desc?>" class="modal_input focus:outline-none" name="input_descri">
                                                                                    <input type="hidden" name="id_va" value="<?=$idva?>">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Valeur 1:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi1?>" name="input_valeur1">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Valeur 2:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi2?>" name="input_valeur2">
                                                                                </div> 
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Valeur 3:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi3?>" name="input_valeur3">
                                                                                </div>
                                                                                <div class="col-12 col-lg-6">
                                                                                    <label for="recipient-name" class="modal_labeltext">Valeur 4:</label>
                                                                                    <input type="text" class="modal_input focus:outline-none" value="<?=$detail_vi4?>" name="input_valeur4">
                                                                                </div>              
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="modifiervaleur">Modifier</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Delete blog -->
                                                        <div class="modal fade bd-example-modal-sm" id="supprimervaleur<?=$idva?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog bd-example-modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal_foterbar">
                                                                        <h5 class="modal_labeltext" id="exampleModalLabel">Suprimer</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button> 
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST">
                                                                            <h2 class="modal_suprimtitre">Veux-tu suprimer cette section Valeur <span class="span_nomutil"><?=$titre?></span></h2>
                                                                            <input type="hidden" name="input_id" value=<?=$idva?>>
                                                                            <div class="modal-footer modal_foterbar">
                                                                            <button type="submit" name="deletavaleur" class="btn btn-secondary btn-sm add_modalitemsrh">Supprim</button>
                                                                            <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
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
                </div>
                <div class="container-fluid">

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
 
         <!-- AJOUTER APROPOS -->
    <div class="modal fade" id="apropos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Ajouter Apropos</h5>
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
                                <label for="recipient-name" class="modal_labeltext">Contenu:</label>
                                <textarea class="modal_input" name="about_text" cols="30" rows="7" placeholder="Tapez Texte"></textarea>
                            </div>                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajouterabout">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- Ajouter EQUIPE-->
    <div class="modal fade" id="adduserequip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Ajouter Equipe</h5>
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
                                <label for="recipient-name" class="modal_labeltext">Nom Complet:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_titreabout">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Poste:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_poste">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Link Fb:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_linkfb">
                            </div>              
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajouterequipe">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- AJOUTER VISION-->
    <div class="modal fade" id="vision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Ajouter Vision</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_titre">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Description:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_descri">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Vision 1:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision1">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Vision 2:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision2">
                            </div> 
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Vision 3:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision3">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Vision 4:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision4">
                            </div>              
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajoutervision">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
         <!-- AJOUTER MISSION-->
    <div class="modal fade" id="missions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Ajouter Mission</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_titre">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Description:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_descri">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Mission 1:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_mission1">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Mission 2:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_mission2">
                            </div> 
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Mission 3:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_mission3">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Mission 4:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_mission4">
                            </div>              
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajoutermisson">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
         <!-- AJOUTER VALEURS-->
    <div class="modal fade" id="valeur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Ajouter Valeurs</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_titre">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Description:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_descri">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Valeur 1:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision1">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Valeur 2:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision2">
                            </div> 
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Valeur 3:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision3">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Valeur 4:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_vision4">
                            </div>              
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajoutervaleur">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>