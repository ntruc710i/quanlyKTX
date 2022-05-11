<?php 
  
  $connect = new mysqli('localhost', 'root', '', 'ktx');
    mysqli_set_charset($connect, "utf8");
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
    }

    include 'top_admin.php';
    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $dt->command("DELETE FROM giuong WHERE giuong.id_phong = '$id'");
        $dt->command("DELETE FROM phong WHERE phong.id_phong = '$id'");
        echo '<meta http-equiv="refresh" content="0">';
    } 
     if(isset($_POST['trangthai'])) {
        $trangthai = $_POST['trangthai'];
        $idsinhvien = $_POST['id_sinhvien'];
        if ($trangthai == 0) {
            $dt->command("UPDATE sinhvien SET trang_thai = 1 WHERE sinhvien.id_sinhvien = '$idsinhvien'");
        } else {
            $dt->command("UPDATE sinhvien SET trang_thai = 0 WHERE sinhvien.id_sinhvien = '$idsinhvien'");
        }
        echo '<meta http-equiv="refresh" content="0">';

    } 
    
    
?>
<style type="text/css">
  .design{
    padding-bottom: 10px;
    margin-left: 10px;
    height: 25px;

  }
</style>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="container">
        <!-- Contact Form  -->
        <div class="row" style="text-align: center;margin-top: 20px;">
           
        </div>
        <div class="contact-form-area">
          

             <div>
                    <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                        <div class="col-md-12">
                        <form action="ThemPhong.php" method="post"> 
                          <span class="text-uppercase page-subtitle"><h6 style="font-weight: bold; ">Thêm Phòng</h6></span>
                            <div class="row">
                              
                               
                                <div class="col-sm-1"></div>
                                <div class="'col-sm-2">
                        <div class="form-group">
                         <?php
                           $dt->select("SELECT * FROM khu");
                             
                                echo "Khu: <select class='form-group' name='khu'>";

                                while ($r = $dt->fetch()) {
                                    $idkhu=$r['id_khu'];
                                    $tenkhu=$r['khu'];
                                    echo "<option value='$idkhu' selected> $tenkhu </option>";
                            }
                           echo "</select>"; 
                             ?>
                            </div>
                        </div>
                        <div class="'col-sm-2">
                             <div class="form-group">

                              
                                <?php
                           $dt->select("SELECT * FROM nha");
                             
                                echo "Nhà: <select class='form-group' name='nha'>";

                                while ($r = $dt->fetch()) {
                                    $idnha=$r['id_nha'];
                                    $tennha=$r['nha'];
                                    echo "<option value='$idnha' selected>$idnha. $tennha </option>";
                            }
                           echo "</select>"; 
                             ?>
                            </div>
                        </div>
                        <div class="'col-sm-2">
                            <div class="form-group">
                                <?php
                           $dt->select("SELECT * FROM tang");
                             
                                echo "Tầng: <select class='form-group' name='tang'>";

                                while ($r = $dt->fetch()) {
                                    $idtang=$r['id_tang'];
                                    $tentang=$r['tang'];
                                    echo "<option value='$idtang' selected> $tentang </option>";
                            }
                           echo "</select>"; 
                             ?>
                            </div>
                        </div>
                        <div class="'col-sm-2">
                            <div class="form-group">
                                 <?php
                           $dt->select("SELECT * FROM gioitinh");
                             
                                echo "Loại Phòng: <select class='form-group' name='gioitinh'>";

                                while ($r = $dt->fetch()) {
                                    $idgt=$r['id_gioitinh'];
                                    $tengt=$r['gioitinh'];
                                    echo "<option value='$idgt' selected>$tengt </option>";
                            }
                           echo "</select>"; 
                             ?>
                            </div>
                        </div>
                        <div class="'col-sm-2">
                            <div class="form-group">
                                 <?php
                           $dt->select("SELECT * FROM loaiphong");
                             
                                echo "<select class='form-group' name='loaiphong'>";

                                while ($r = $dt->fetch()) {
                                    $idloaiphong=$r['id_loaiphong'];
                                    $tenloaiphong=$r['loaiphong'];
                                    echo "<option value='$idloaiphong' selected>$tenloaiphong</option>";
                            }
                           echo "</select>"; 
                             ?>
                            </div>
                            
                          </div>
                          <div class="'col-sm-2">
                            <div class="form-group">
                            <input type="text" name="tenphong" class="design form-control" value="" placeholder="Tên Phòng">
                        </div>
                       
                    </div>

                        <div class="'col-sm-1">
                            <div class="form-group">
                            <button type="submit" class="btn btn-success  " style="margin-left: 30px; height: 25px; padding-bottom: 20px;" name="themphong" onclick="alert('Thành công')">Thêm Phòng</button></div>
                        </div>
                       
                    </div>
                        </form>
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
                        <h6 class="m-0">Danh sách thành viên</h6>
                      </div>
                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">#</th> 
                              <th scope="col" class="border-0">Tên Phòng</th>
                              <th scope="col" class="border-0">Phòng</th>
                              <th scope="col" class="border-0">Loại Phòng</th>

                             <th scope="col" class="border-0">Tầng</th>
                            <th scope="col" class="border-0">Nhà</th> 
                            <th scope="col" class="border-0">Khu</th> 
                            <th scope="col" class="border-0">Đã Thuê</th>
                              <th scope="col" class="border-0">Thao tác</th>                           
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $dt->select("SELECT * FROM phong ");
                                $i = 0;
                                while($r = $dt->fetch()){
                                    $i++;
                                    $id = $r['id_phong'];
                                    $tenphong = $r['phong'];
                                    $idgioitinh=$r['id_gioitinh'];
                                    $idloaiphong=$r['id_loaiphong'];
                                   
                                    $idgioitinh=$r['id_gioitinh'];
                                    $idtang=$r['id_tang'];
                                    $idnha=$r['id_nha'];
                                    $idkhu = $r['id_khu'];
                                   
                                  
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                         echo "<td>$tenphong</td>";
                                        $s1="SELECT * FROM gioitinh WHERE id_gioitinh='$idgioitinh' ";
                                        $rs1 = mysqli_query($connect, $s1);
                                        $r1= mysqli_fetch_array($rs1, MYSQLI_ASSOC);
                                            $gioitinh=$r1['gioitinh'];
                                        echo "<td>$gioitinh</td>";
                                    
                                      
                                   
                                    $s1="SELECT * FROM loaiphong WHERE id_loaiphong='$idloaiphong' ";
                                        $rs1 = mysqli_query($connect, $s1);
                                        $r1= mysqli_fetch_array($rs1, MYSQLI_ASSOC);
                                            $loaiphong=$r1['loaiphong'];
                                        echo "<td>$loaiphong</td>";
                                    
                                     
                                     
                                        $s1="SELECT * FROM tang where id_tang='$idtang' ";
                                        $rs1 = mysqli_query($connect, $s1);
                                        $r1= mysqli_fetch_array($rs1, MYSQLI_ASSOC);
                                            $tang=$r1['tang'];
                                        echo "<td>$tang</td>";
                                  
                                        $s1="SELECT * FROM nha where id_nha='$idnha' ";
                                        $rs1 = mysqli_query($connect, $s1);
                                        $r1= mysqli_fetch_array($rs1, MYSQLI_ASSOC);
                                            $nha=$r1['nha'];
                                        echo "<td>$nha</td>";
                                    
                                     
                                       $s1="SELECT * FROM khu where id_khu='$idkhu' ";
                                        $rs1 = mysqli_query($connect, $s1);
                                        $r1= mysqli_fetch_array($rs1, MYSQLI_ASSOC);
                                            $khu=$r1['khu'];
                                        echo "<td>$khu</td>";

                                          
                                      $s1="SELECT COUNT(id_giuong) AS tong FROM giuong where giuong.id_phong='$id'";
                                        $rs1 = mysqli_query($connect, $s1);
                                        $r1= mysqli_fetch_array($rs1, MYSQLI_ASSOC);
                                            $tong=$r1['tong'];
                                       $s1="SELECT COUNT(id_giuong) AS tong2 FROM giuong where giuong.id_phong='$id' and giuong.id_trangthai=0";
                                        $rs1 = mysqli_query($connect, $s1);
                                        $r1= mysqli_fetch_array($rs1, MYSQLI_ASSOC);
                                            $dathue=$r1['tong2'];
                                          $thue=$dathue."/".$tong;
                                          echo "<td>$thue</td>";
                                       

                                       
                                       echo "

                                       

                                        </form>
                                        </td>";

                                        echo "<td>
                                        <form action='chitietphong.php' method='post'>";
                                        echo "<input type='hidden' name='id' value='$id'>";
                                  
                                        echo "
                                          <button class='mb-2 btn btn-success mr-2 btn-outline-secondary' name='chitiet' value='' type='submit' ><b>Chi Tiết</b></button>
                                          </form>";
                                           echo "
                                        <form method='post'>";
                                        echo "<input type='hidden' name='id' value='$id'>";
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