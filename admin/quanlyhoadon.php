<?php 
    include 'top_admin.php';
    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $iddien=$_POST['iddien'];
        $dt->command("DELETE FROM hoadon WHERE hoadon.id_hoadon = '$id'");
        $dt->command("DELETE FROM dien WHERE dien.id_dien = '$iddien'");
        echo '<meta http-equiv="refresh" content="0">';
    } 
     if(isset($_POST['trangthai'])) {
        $trangthai = $_POST['trangthai'];
        $id_hoadon = $_POST['id_hoadon'];
        if ($trangthai == 0) {
            $dt->command("UPDATE hoadon SET trangthai = 1 WHERE hoadon.id_hoadon = '$id_hoadon'");
        } else {
            $dt->command("UPDATE hoadon SET trangthai = 0 WHERE hoadon.id_hoadon = '$id_hoadon'");
        }
        echo '<meta http-equiv="refresh" content="0">';
    } 
    
    
?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
         
            <div class="contact-area section_padding_80">
    <div class="container">
        <!-- Contact Form  -->
        <div class="row" style="text-align: center;margin-top: 20px;">
           
        </div>
        <div class="contact-form-area">
          

             <div>
                    <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                       
                                <span class="text-uppercase page-subtitle"><h6 style="font-weight: bold; ">Tạo Hóa Đơn:</h6></span>
                                
                        <div class="col-md-12">
                        <form action="taohoadon.php" method="post">
                            <div class="row">
                              <div class="row">
                        
                                  <div class="form-group">
                                  <select name="thang" style="margin-top: 5px;">

                                        <option value="1">Tháng 1</option>
                                        <option value="2">Tháng 2</option>
                                        <option value="3">Tháng 3</option>
                                        <option value="4">Tháng 4</option>
                                        <option value="5">Tháng 5</option>
                                        <option value="6">Tháng 6</option>
                                        <option value="7">Tháng 7</option>
                                        <option value="8">Tháng 8</option>
                                        <option value="9">Tháng 9</option>
                                        <option value="10">Tháng 10</option>
                                        <option value="11">Tháng 11</option>
                                        <option value="12">Tháng 12</option>
                                      </select>
                                
                          </div>
                             
                              <div class="col-sm-1">
                              </div>
                                <div class="col-sm-3">
                        <div class="form-group" >
                         <?php
                         $id_dien=rand(2, 10000);
                           echo "
                                        <input type='hidden' name='id_dien' value='$id_dien'>";
                           $dt->select("SELECT * FROM phong");
                             
                                echo " <select class='form-group' name='phong' style='margin-top: 5px;'>";

                                while ($r = $dt->fetch()) {
                                    $idphong=$r['id_phong'];
                                    $tenphong=$r['phong'];
                                    echo "<option value='$idphong' selected>$idphong.Phòng $tenphong </option>";
                            }
                           echo "</select>"; 
                             ?><br>
                            </div>
                        </div>
                        
                              </div>
                        <div class="col-sm-2">
                             <div class="form-group">

                              
                                 <input type="text" class="form-control" name="dienthangtruoc" placeholder="Nhập số điện tháng trước">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="dienhientai" placeholder="Nhập số điện hiện tại">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="tiennuoc" placeholder="Tiền nước " >
                            </div>
                        </div>

                            

                            
                        <div class="col-sm-2">
                            <div class="form-group">
                            <button type="submit" class="btn btn-success " name="hoadon" onclick="alert('Thành công')">Tạo Hóa Đơn</button></div>
                        </div>
                       
                    </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
       
    </div>
</div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">
                      <div class="card-header border-bottom">
                        <h6 class="m-0">Hóa Đơn Điện Nước Tháng</h6>
                      </div>
                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">#</th>
                              <th scope="col" class="border-0">Tên Phòng</th>
                              <th scope="col" class="border-0">Tháng</th>
                              <th scope="col" class="border-0">Tiền Điện</th> 
                              <th scope="col" class="border-0">Tiền Nước</th> 
                              <th scope="col" class="border-0" style="color: #324bf8;">Tổng Tiền</th> 
                              <th scope="col" class="border-0">Trạng Thái</th> 
                              <th scope="col" class="border-0">Thao tác</th>                           
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $dt->select("SELECT * FROM hoadon INNER JOIN dien ON hoadon.id_dien = dien.id_dien  INNER JOIN phong on hoadon.id_phong=phong.id_phong");
                                $i = 0;
                                while($r = $dt->fetch()){
                                    $i++;
                                    $id = $r['id_hoadon'];
                                    $iddien=$r['id_dien'];
                                    $tenphong = $r['phong'];
                                      $thang = $r['thang'];
                                    $tiennuoc=$r['tien_nuoc'];
                                    $tongtien=$r['tong_tien'];
                                    $tiendien=number_format($tongtien-$tiennuoc);
                                    $trangthai=$r['trangthai'];
                                   $tien=number_format($tongtien);
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        
                                        echo "<td>$tenphong</td>";
                                         echo "<td>Tháng $thang</td>";
                                        echo "<td>$tiendien</td>";
                                        echo "<td>$tiennuoc</td>";
                                        echo "<td style='color: #324bf8;'>$tien</td>";
                                        
                                        
                                       
                                        echo "<td>
                                        <form method='post'>";
                                      
                                        echo "<input type='hidden' name='id_hoadon' value='$id'>";
                                         if ($trangthai==0) {
                                        echo "<button class='mb-2 btn btn-outline-success mr-2' name='trangthai' value='$trangthai' type='submit' onclick='reload'>Đang Xử Lý</button>";
                                        } else {
                                        echo "<button class='mb-2 btn btn-success mr-2' name='trangthai' value='$trangthai' type='submit' onclick='reload'>Đã Thanh Toán</button>";
                                        }
                                        echo "

                                       

                                        </form>
                                        </td>";

                                        echo "<td>
                                        <form method='post'>";
                                        echo "<input type='hidden' name='id' value='$id'>
                                        <input type='hidden' name='iddien' value='$iddien'>";
                                  
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
<script type="text/javascript">
  function hoadon(){
   alert('Thành công');
   history.go(-1);
  }
</script>
<?php
   
    include 'bottom_admin.php';
?>