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
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Blog Account</span>
                <h3 class="page-title">Danh Sách Thành Viên</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">
                      <div class="card-header border-bottom">
                        <h6 class="m-0">Danh sách thành viên</h6>
                      </div>
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
                                $dt->select("SELECT * FROM sinhvien INNER JOIN khoa ON sinhvien.id_khoa = khoa.id_khoa ");
                                $i = 0;
                                while($r = $dt->fetch()){
                                    $i++;
                                    $id = $r['id_sinhvien'];
                                    $idgiuong = $r['id_giuong'];
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
                                        <form action='thongtinsv.php' method='post'>";
                                        echo "<input type='hidden' name='id' value='$id'>";
                                  
                                        echo "
                                          <button class='mb-2 btn btn-success mr-2 btn-outline-secondary' name='chitiet' value='' type='submit' ><b>Chi Tiết</b></button>
                                          </form>";
                                           echo "
                                        <form method='post'>";
                                        echo "<input type='hidden' name='id' value='$id'>
                                        <input type='hidden' name='id_giuong' value='$idgiuong'>";
                                        echo "
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
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
            
            <!-- End Default Dark Table -->
          </div>
        </main>
      </div>
    </div>

<?php 
    include 'bottom_admin.php';
?>