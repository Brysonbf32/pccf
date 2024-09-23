
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
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">BLOGS</h6>
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
                                                <th>Contnus</th>
                                                <th>Date</th>
                                                <th>Categorie</th>
                                                <th>Author</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Titre</th>
                                                <th>Contenus</th>
                                                <th>Date </th>
                                                <th>Categorie</th>
                                                <th>Author</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $datetoday = date("d/m/y");
                                                $recupedata=$my_bd->query("SELECT * FROM tbl_blog ORDER BY blog_id DESC");
                                                if($recupedata->rowCount()>0){
                                                while($checkdata=$recupedata->fetch()){
                                                    $idblog=$checkdata['blog_id'];
                                                    $titreblog=$checkdata['blog_titre'];
                                                    $imageblog=$checkdata['blog_image'];
                                                    $blogcontent=$checkdata['blog_content'];
                                                    $blogdatepub=$checkdata['blog_date'];
                                                    $blogcateg=$checkdata['categorie_blog'];
                                                    $util_id =$checkdata['util_id'];
                                                    
                                                    if(isset($util_id)){
                                                        $fetchutilisate=$my_bd->query("SELECT * FROM tbl_utilisateurs WHERE util_id='$util_id'");
                                                        $fetchutilisate->rowCount();
                                                        $checkutili=$fetchutilisate->fetch();
                                                          if($checkutili >0){
                                                            $util_nom=$checkutili['util_nom'];                                    
                                                          }
                                                    }
                                            ?>
                                            <tr>
                                                <td>
                                                    <img class="imagetable rounded-sm" src="../assets/img/blog/<?=$imageblog?>">
                                                        <a class="p-2 "  data-toggle="modal" data-target="#image<?=$idblog?>">
                                                            <i class="fa fa-camera fa-md  facolor " ></i>
                                                        </a>
                                                </td>
                                                <td><?=$titreblog?></td>
                                                <td>
                                                <a class="p-2"  data-toggle="collapse" href="#collapseExample<?=$idblog?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                </a>
                                        
                                                <div class="collapse" id="collapseExample<?=$idblog?>">
                                                    <div class="card card-body">
                                                    <?=$blogcontent?>
                                                    </div>
                                                </div>
                                                
                                                </td>
                                                <td><?=$blogdatepub?></td>
                                                <td><?=$blogcateg?></td>
                                                <td><?=$util_nom ?></td>
                                                <td>
                                                <a class="p-2"  data-toggle="modal" data-target="#modif<?=$idblog?>">
                                                    <i class="fa fa-pencil fa-sm fa-fw text-gray-400" ></i>
                                                </a>
                                                <a class="p-2"  data-toggle="modal" data-target="#suprim<?=$idblog?>">
                                                    <i class="fa fa-trash fa-sm fa-fw text-gray-400" ></i>
                                                </a>
                                                </td>
                                            </tr>
                                                        <!-- MODIFIER IMAGE -->
                                                    <div class="modal fade" id="image<?=$idblog?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                            <img class="imagetables rounded-sm" src="../assets/img/blog/<?=$imageblog?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                            <label for="recipient-name" class="modal_labeltext">Image:</label>
                                                                            <input type="hidden" class="modal_input" name="input_idblog" value="<?=$idblog?>">
                                                                            <input type="file" class="modal_input" name="input_image">
                                                                            <input type="hidden" class="modal_input" name="old_image" value="<?=$imageblog?>">

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
                                                    <!-- MODIFIER BLOG -->
                                                    <div class="modal fade" id="modif<?=$idblog?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header modal_foterbar">
                                                                <h5 class="modal_labeltext" id="exampleModalLabel">Modifier Blog</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button> 
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-6">
                                                                            <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                                                            <input type="text" class="modal_input" name="input_titreblog" value="<?=$titreblog?>">
                                                                            <input type="hidden" class="modal_input" name="input_idblog" value="<?=$idblog?>">
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                            <label for="recipient-name" class="modal_labeltext">Role:</label>
                                                                            <select  class="modal_input" name="input_catego" >
                                                                                <option value="<?=$blogcateg?>"><?=$blogcateg?></option>
                                                                                <option value="Microfinance">Microfinance</option>
                                                                                <option value="Agriculture">Agriculture</option>
                                                                                <option value="Entreprenariat">Entreprenariat</option>
                                                                            </select>
                                                                        </div> 
                                                                        <div class="col-12 col-lg-12">
                                                                            <label for="recipient-name" class="modal_labeltext">Content:</label>
                                                                            <textarea class="modal_input" name="blog_text" cols="30" rows="7" placeholder="Tapez Texte" value="<?=$blogcontent?>"><?=$blogcontent?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="modal-footer modal_foterbar">
                                                                    <button type="submit" name="modifier" class="btn btn-secondary btn-sm add_modalitemsrh">Modifier</button>
                                                                    <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- SUPPRIMMER BLOG -->
                                                    <div class="modal fade bd-example-modal-sm" id="suprim<?=$idblog?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog bd-example-modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header modal_foterbar">
                                                                <h5 class="modal_labeltext" id="exampleModalLabel">Suprimer Blog</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button> 
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST">
                                                                    <h2 class="modal_suprimtitre">Veux-tu suprimer l'Blog <span class="span_nomutil"><?=$titreblog?></span></h2>
                                                                    <input type="hidden" name="input_blogid" value=<?=$idblog?>>
                                                                    <input type="text" name="input_image" value=<?=$imageblog?>>

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
 
        <!-- AJOUTER BLOG-->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modaltitle" id="exampleModalLabel">Ajouter Blog</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <label for="recipient-name" class="modal_labeltext">Image:</label>
                                <input type="file" class="modal_input" name="input_image">
                                <input type="hidden" name="datepub" value="<?=$datetoday?>">
                                <input type="hidden" name="authorname" value="<?=$user_nom?>">

                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Titre:</label>
                                <input type="text" class="modal_input focus:outline-none" name="input_titreblog">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="recipient-name" class="modal_labeltext">Role:</label>
                                <select  class="modal_input" name="input_catego" >
                                    <option>Choisie le Categorie</option>
                                    <option value="Microfinance">Microfinance</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Entreprenariat">Entreprenariat</option>
                                </select>
                            </div> 
                            <div class="col-12 col-lg-12">
                                <label for="recipient-name" class="modal_labeltext">Content:</label>
                                <textarea class="modal_input" name="blog_text" cols="30" rows="7" placeholder="Tapez Texte"></textarea>
                            </div>                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm add_modalitemsrh"  type="submit" name="ajouterblog">Ajouter</button>
                        <button class="btn btn-secondary btn-sm btn_modalclose" type="button" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
