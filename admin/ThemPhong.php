 <?php
$connect = new mysqli('localhost', 'root', '', 'ktx');
    mysqli_set_charset($connect, "utf8");
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
    }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tenphong=$_POST['tenphong'];
        $idkhu=$_POST['khu'];
        $idnha=$_POST['nha'];                    
        $idtang = $_POST['tang']; 
        $idgioitinh=$_POST['gioitinh'];
        $idloaiphong=$_POST['loaiphong'];
        $idnha=$_POST['nha'];                    
        $idphong=rand(50,10000);

        $s1="INSERT INTO phong(id_phong,phong,id_loaiphong,id_gioitinh,id_tang,id_nha,id_khu) VALUES('$idphong','$tenphong','$idloaiphong','$idgioitinh','$idtang','$idnha','$idkhu')";
        if ($rs1 = mysqli_query($connect, $s1) === TRUE) {
           
           
        }
            else {
        echo "Error: " . $s1 . "<br>" . $connect->error;
    }
        for($i=1;$i<=$idloaiphong;$i++){
            $giuong="0".$i;
        
        $s2="INSERT INTO giuong(id_giuong,giuong,id_phong,id_trangthai) VALUES(NULL,'$giuong','$idphong','1')";
             if ($rs2 = mysqli_query($connect, $s2) === TRUE) {
          echo "<script>history.go(-1);</script>"; 
           
        }
            else {
        echo "Error: " . $s2 . "<br>" . $connect->error;
    }
        }
        
       

        
    }
    ?>