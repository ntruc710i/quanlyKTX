 <?php
$connect = new mysqli('localhost', 'root', '', 'ktx');
    mysqli_set_charset($connect, "utf8");
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
    }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idphong=$_POST['phong'];
        $id_dien=$_POST['id_dien'];
        $thang=$_POST['thang'];
        $dienthangtruoc=$_POST['dienthangtruoc'];                    
        $dienhientai = $_POST['dienhientai']; 
        $diensudung = $dienhientai-$dienthangtruoc;
        $tiennuoc=$_POST['tiennuoc'];
        $gia = 3000;
        $tiendien=$diensudung*$gia;
        $tongtien=$tiendien+$tiennuoc;
        $trangthai=0;
        $s1="INSERT INTO dien(id_dien,so_dien_thang_truoc,so_dien_hien_tai,so_dien_su_dung,giadien) VALUES('$id_dien','$dienthangtruoc','$dienhientai','$diensudung','$gia')";
      
        $s2="INSERT INTO hoadon(id_hoadon,id_phong,id_dien,thang,tien_nuoc,tong_tien,trangthai) VALUES(NULL,'$idphong','$id_dien','$thang','$tiennuoc','$tongtien','$trangthai')";
        
        if ($rs1 = mysqli_query($connect, $s1) === TRUE) {
        
        if ($rs2 = mysqli_query($connect, $s2) === TRUE) {
           echo "<script>history.go(-1);</script>"; 
           
        }
            else {
        echo "Error: " . $s2 . "<br>" . $connect->error;
    }
    } else {
        echo "Error: " . $s1 . "<br>" . $connect->error;
    }
       

        
    }
    ?>