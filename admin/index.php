<?php 
    include 'top_admin.php';
    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
         $idgiuong= $_POST['id_giuong'];
        $dt->command("DELETE FROM sinhvien WHERE sinhvien.id_sinhvien = '$id'");
        $dt->command("UPDATE giuong SET trangthai = 1 WHERE giuong.id_giuong = '$idgiuong'");
        echo '<meta http-equiv="refresh" content="0">';
    } 
     if(isset($_POST['trangthai'])) {
        $trangthai = $_POST['trangthai'];
        $idsinhvien = $_POST['id_sinhvien'];
        $password=md5($_POST['cmnd']);
        $cmnd=$_POST['cmnd'];
        if ($trangthai == 0) {
            $dt->command("UPDATE sinhvien SET trang_thai = 1 ,user_name = '$cmnd',password='$password' WHERE sinhvien.id_sinhvien = '$idsinhvien'");
        } else {
            $dt->command("UPDATE sinhvien SET trang_thai = 0 WHERE sinhvien.id_sinhvien = '$idsinhvien'");
        }
        echo '<meta http-equiv="refresh" content="0">';
    } 
?>
          <!-- / .main-navbar -->
              <div class="main-content-container container-fluid px-4">
                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                </div>
                <!-- End Page Header -->
                <!-- Small Stats Blocks -->
                <div class="row">
                  <div class="col-lg col-md-6 col-sm-6 mb-4">
                    <div class="stats-small stats-small--1 card card-small">
                      <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                          <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Tổng Số Phòng</span>
                            <h6 class="stats-small__value count my-3">
                                <?php 
                                    $dt->select("SELECT COUNT(id_phong) AS tong FROM phong");
                                    $row = $dt->fetch();
                                    echo $row['tong'];
                                ?>
                            </h6>
                          </div>
                        </div>
                        <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg col-md-4 col-sm-6 mb-4">
                    <div class="stats-small stats-small--1 card card-small">
                      <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                          <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Số Giường Còn Trống</span>
                            <h6 class="stats-small__value count my-3">
                                <?php 
                                    $dt->select("SELECT COUNT(id_giuong) AS tong FROM giuong WHERE id_trangthai=1");
                                    $row = $dt->fetch();
                                    echo $row['tong'];
                                ?>
                            </h6>
                          </div>
                        </div>
                        <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg col-md-4 col-sm-6 mb-4">
                    <div class="stats-small stats-small--1 card card-small">
                      <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                          <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Số Giường Đã Có Người </span>
                            <h6 class="stats-small__value count my-3">
                                <?php 
                                    $dt->select("SELECT COUNT(id_giuong) AS tong FROM giuong WHERE id_trangthai=0");
                                    $row = $dt->fetch();
                                    echo $row['tong'];
                                ?>  
                            </h6>
                          </div>
                        </div>
                        <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg col-md-4 col-sm-12 mb-4">
                    <div class="stats-small stats-small--1 card card-small">
                      <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                          <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Sinh Viên Đang Chờ Xác Nhận</span>
                            <h6 class="stats-small__value count my-3">
                                <?php 
                                    $dt->select("SELECT COUNT(id_sinhvien) AS tong FROM sinhvien WHERE trang_thai=0");
                                    $row = $dt->fetch();
                                    echo $row['tong'];
                                ?>
                            </h6>
                          </div>
                        </div>
                        <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                
              <!-- Thêm code -->
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                    <div class="card card-small blog-comments">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Sinh Viên Đang Chờ Xác Nhận Đăng Kí KTX</h6>
                        </div>
                        <div class="card-body p-0" >
                            <!-- single -->
                             <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">#</th> 
                              <th scope="col" class="border-0">Mã SV</th>
                              <th scope="col" class="border-0">Họ và Tên</th>
                             <th scope="col" class="border-0">Ngày Sinh</th>
                            <th scope="col" class="border-0">Giới Tính</th> 
                            <th scope="col" class="border-0">Khoa</th> 
                              <th scope="col" class="border-0">Email</th>  
                              <th scope="col" class="border-0">CMND</th> 
                               <th scope="col" class="border-0">Trạng Thái</th>
                              <th scope="col" class="border-0">Thao tác</th>                           
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $dt->select("SELECT * FROM sinhvien INNER JOIN khoa ON sinhvien.id_khoa = khoa.id_khoa WHERE sinhvien.trang_thai=0");
                                $i = 0;
                                while($r = $dt->fetch()){
                                    $i++;
                                    $id = $r['id_sinhvien'];
                                    $name = $r['ho']." ".$r['ten'];
                                    $ngaysinh=$r['ngaysinh'];
                                    $khoa=$r['khoa'];
                                    $masv=$r['ma_sv'];
                                    $email = $r['email'];
                                    $gioitinh = $r['gioitinh'];
                                    $cmnd=$r['cmnd'];
                                    $trangthai=$r['trang_thai'];
                                   
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        
                                        echo "<td>$masv</td>";
                                        echo "<td>$name</td>";
                                        echo "<td>$ngaysinh</td>";
                                        echo "<td>$gioitinh</td>";
                                        echo "<td>$khoa</td>";
                                        echo "<td>$email</td>";
                                        
                                        echo "<td>$cmnd</td>";
                                        echo "<td>
                                        <form method='post'>";
                                      
                                        echo "<input type='hidden' name='id_sinhvien' value='$id'>
                                        <input type='hidden' name='cmnd' value='$cmnd'>";
                                         if ($trangthai==0) {
                                        echo "<button class='mb-2 btn btn-outline-success mr-2' name='trangthai' value='$trangthai' type='submit' onclick='reload'>Đang Xử Lý</button>";
                                        } else {
                                        echo "<button class='mb-2 btn btn-success mr-2' name='trangthai' value='$trangthai' type='submit' onclick='reload'>Đã Xác Nhận</button>";
                                        }
                                        echo "

                                       

                                        </form>
                                        </td>";

                                        echo "<td>
                                        <form method='post'>";
                                        echo "<input type='hidden' name='id' value='$id'>";
                                  
                                        echo "
                                          <button class='mb-2 btn btn-success mr-2 btn-outline-secondary' name='#' value='' type='submit' onclick='reload'><b>Chi Tiết</b></button>
                                            <button class='mb-2 btn btn-danger mr-2' name='delete' type='submit' onclick='reload'>XÓA</button>
                                        </form>
                                        </td>";
                                    echo "</tr>";
                                }
                            ?>
                          </tbody>
                        </table>
                      </div>
                            
                        </div>
                    </div>
              </div> 
            </div>
                  
             <!-- Thêm code -->

                  
          </div>
        </main>
      </div>
    </div>
<?php 
    if(isset($_POST['chapnhan'])) {
        $id = $_POST['chapnhan'];
        $dt->command("UPDATE blog SET trangthai=1 WHERE idBlog=$id");
        echo '<meta http-equiv="refresh" content="0">';
    }
    if(isset($_POST['tuchoi'])) {
        $id = $_POST['tuchoi'];
        $dt->command("DELETE FROM blog WHERE blog.idBlog = '$id'");
        echo '<meta http-equiv="refresh" content="0">';
    }
    include 'bottom_admin.php';
    
?>
