<?php 
    include 'top_admin.php';
?>

          <!-- / .main-navbar -->    
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Blog Update</span>
                <h3 class="page-title">Chỉnh Sửa Bài Viết</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <!-- Add New Post Form -->
                
                  <div class="card-body">
                    <form class="add-new-post" action="" method="post">
                        <?php 
                            if(isset($_POST['edit'])) {
                                $id = $_POST['edit'];
                                $dt->select("SELECT * FROM thongbao WHERE id_thongbao='$id'");
                                $r = $dt->fetch();
                                
                                $tieude = $r['tieude'];
                        
                                $noidung = $r['noidung'];
                                
                                echo "<input class='form-control form-control-lg mb-3' type='text' placeholder='Tiêu Đề' name='tieude' value='$tieude'>";
                                echo "<div class='form-group'>
                                <span style='margin-left: 5px; font-size: 12px; margin-right: 5px;'>Ảnh :</span><br>
                                <input type='file' name='fileUpload' value='' >
                            </div>";
                                
                                echo "<textarea class='form-control' name='noidung'>$noidung</textarea>";
                                echo "<script type='text/javascript'>CKEDITOR.replace('noidung')</script><br>";
                                echo "<button type='submit' class='form-control  mb-2 btn btn-success mr-2' name='id' value='$id'>Success</button>";
                                
                                
                            }
                        ?>
                    </form>
                  </div>
            </div>
          </div>
        </main>
      </div>
    </div>

<?php 
    if (isset($_POST['id'])) {
        if(isset($_POST['id'])) $id = $_POST['id'];
        if(isset($_POST['tieude'])) $tieude = $_POST['tieude'];
        if(isset($_POST['noidung'])) $noidung = $_POST['noidung'];
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../images/' . $_FILES['fileUpload']['name']);
                                   
        $anh=$_FILES['fileUpload']['name'];
        
        $dt->command("UPDATE thongbao SET tieude='$tieude',anh='$anh',noidung='$noidung' WHERE id_thongbao=$id");
       echo '<script language="javascript"> alert("Update Thành Công!"); window.location="admin.php?t=1";</script>';
        
    }
    include 'bottom_admin.php';
?>