
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
                <div class="container-fluid">
                    <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">COMMENTAIRES BLOGS</h6>
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
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Categorie</th>
                                                <th>Envoyeur</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Reponses</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Categorie</th>
                                                <th>Envoyeur</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Reponses</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $datetoday = date("d/m/y");
                                                $recupedata=$my_bd->query("SELECT * FROM tbl_comentblog ORDER BY com_id DESC");
                                                if($recupedata->rowCount()>0){
                                                while($checkdata=$recupedata->fetch()){
                                                    $com_id =$checkdata['com_id'];
                                                    $blog_id=$checkdata['blog_id'];
                                                    $com_nom=$checkdata['com_nom'];
                                                    $com_mail=$checkdata['com_mail'];
                                                    $com_date=$checkdata['com_date'];
                                                    $com_comment=$checkdata['com_comment'];
                                                    
                                                    if(isset($blog_id)){
                                                        $fetchblog=$my_bd->query("SELECT * FROM tbl_blog WHERE blog_id='$blog_id'");
                                                        $fetchblog->rowCount();
                                                        $checkblog=$fetchblog->fetch();
                                                          if($checkblog >0){
                                                            $categorie_blog=$checkblog['categorie_blog'];                                    
                                                          }
                                                    }
                                            ?>
                                            <tr>
                                                <td><?=$categorie_blog?></td>
                                                <td><?=$com_nom?></td>
                                                <td><?=$com_mail?></td>
                                                <td><?=$com_date?></td>                                   
                                                <div class="collapse" id="collapseExample<?=$com_id?>">
                                                    <div class="card card-body">
                                                    <?=$com_comment?>
                                                    </div>
                                                </div>
                                                
                                                </td>
                                                <td>
                                                <a class="p-2"  data-toggle="modal" data-target="#modif<?=$com_id?>">
                                                    <i class="fa fa-eye fa-sm fa-fw text-gray-400" ></i>
                                                </a>
                                                </td>                                               
                                            </tr>
                                                    <!-- MODIFIER BLOG -->
                                                    <div class="modal fade" id="modif<?=$com_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content modal-md">
                                                            <div class="modal-header modal_foterbar">
                                                                <h5 class="modal_labeltext" id="exampleModalLabel">Repondre Au Commentaires</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button> 
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-12">
                                                                            <p>Commentaire de <span class="messagmutu">Mr,Mme <?=$com_nom?></span></p>
                                                                            <div class="encerclco">
                                                                                <p><?=$com_comment?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-12 pt-1">
                                                                            <label for="recipient-name" class="modal_labeltext">Reponse:</label>
                                                                            <textarea class="modal_input" name="blog_text" cols="30" rows="7" placeholder="Donnez Votre Reponse ici !!!" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="modal-footer modal_foterbar">
                                                                    <button type="submit" name="repondreco" class="btn btn-secondary btn-sm add_modalitemsrh">Reponse</button>
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
 
 
