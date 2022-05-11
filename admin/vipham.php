<?php 
    include 'top_admin.php';
    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
         $idgiuong= $_POST['id_giuong'];
        $dt->command("DELETE FROM vipham WHERE vipham.id_vipham = '$id'");
        
    } 
      if(isset($_POST['trangthai'])) {
        $trangthai = $_POST['trangthai'];
        $idsinhvien = $_POST['id_sinhvien'];
        $password=$_POST['pass'];
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
                
                <a class="" href="">
                      <button type="button" class="btn btn-outline-secondary dangtb"><i class="material-icons">note_add</i> Vi Phạm</button></a>
                <h3 class="page-title"></h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">
                      <div class="card-header border-bottom">
                        <h6 class="m-0">Danh sách Sinh Viên Vi Phạm</h6>
                      </div>
                       <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">#</th> 
                              <th scope="col" class="border-0">Mã SV</th>
                              <th scope="col" class="border-0">Họ và Tên</th>
                            <th scope="col" class="border-0">Giới Tính</th> 
                             <th scope="col" class="border-0">Phòng</th> 
                              <th scope="col" class="border-0">Vi Phạm </th>
                              <th scope="col" class="border-0">Ngày Vi Phạm </th>    
                              <th scope="col" class="border-0">Hình Thức Kĩ Luật</th> 
                              <th scope="col" class="border-0">Thao tác</th>                           
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $dt->select("SELECT * FROM vipham INNER JOIN sinhvien ON vipham.id_sinhvien = sinhvien.id_sinhvien INNER JOIN phong ON vipham.id_phong=phong.id_phong ");
                                $i = 0;
                                while($r = $dt->fetch()){
                                    $i++;
                                    $id = $r['id_vipham'];
                                    
                                    $name = $r['ho']." ".$r['ten'];
                                    $ngaysinh=$r['ngaysinh'];
                                  
                                    $masv=$r['ma_sv'];
                                    $phong=$r['phong'];
                                    $gioitinh = $r['gioitinh'];
                                    $ngayvipham=$r['ngay_vp'];
                                    $ndvipham=$r['noidung_vp'];
                                    $hinhthuckl=$r['hinhthuc_kl'];
                                    $sotiennop=$r['sotiennop'];
                                   
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        
                                        echo "<td>$masv</td>";
                                        echo "<td>$name</td>";
                                        echo "<td>$gioitinh</td>";
                                        
                                        echo "<td>$phong</td>";
                                        echo "<td>$ndvipham</td>";
                                        
                                        echo "<td>$ngayvipham</td>";
                                        echo "<td>$hinhthuckl</td>";
                                        

                                        echo "<td>
                                        <form method='post'>";
                                        echo "<input type='hidden' name='id' value='$id'>
                                        ";
                                  
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