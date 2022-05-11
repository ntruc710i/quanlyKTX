<?php 
    include 'top_admin.php';

?>

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <a class="" href="thongbao.php?t=10">
                      <button type="button" class="btn btn-outline-secondary dangtb"><i class="material-icons">note_add</i> Đăng Thông Báo Mới </button></a>
                <span class="text-uppercase page-subtitle"><h6 style="font-weight: bold;"> DANH SÁCH THÔNG BÁO</h6></span>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <?php 
                   
                        $dt->select("SELECT * FROM thongbao");
                    
                    while ($r = $dt->fetch()) {
                        $id = $r['id_thongbao'];
                        $tieude = $r['tieude'];
                        $anh = $r['anh'];
                        $nguoidang = $r['nguoidang'];
                        $thoigiandang = $r['thoigiandang'];
                        
                        
                        echo "<div class='col-lg-3 col-md-6 col-sm-12 mb-4'>";
                            echo "<div class='card card-small card-post card-post--1'>";
                                echo "<div class='card-post__image' style='background-image: url($anh);'>";
                                  
                                echo "</div>";
                                echo "<div class='card-body'>";
                                    echo "<h5 class='card-title'><a class='text-fiord-blue' href='' target='_blank'> $tieude</a></h5>";
                                    
                                    echo "<span class='text-muted'>Bởi $nguoidang | $thoigiandang</span> <br>";
                                    
                                    echo "<form action='admin_update.php' method='post' target='_blank'>";
                                        echo "<button type='submit' name='edit' value='$id' class='mb-2 btn btn-sm btn-outline-primary mr-1' style='float: right;'>Sửa</button>";
                                    echo "</form>";
                                    echo "<form action='' method='post'>";
                                        echo "<button type='submit' name='delete' value='$id' onclick='reload' class='mb-2 btn btn-sm btn-outline-danger mr-1' style='float: right;' >Xóa</button>";
                                    echo "</form>";
                        
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </main>
      </div>
    </div>

<?php 
    if(isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $dt->command("DELETE FROM thongbao WHERE thongbao.id_thongbao = '$id'");
        //Update số bài viết cho account
        
    }
    include 'bottom_admin.php';
?>