<?php
    include 'top_admin.php';
?>

<!-- ****** Contatc Area Start ****** -->

<div class="contact-area section_padding_80">
    <div class="container">
        <!-- Contact Form  -->
        <div class="row" style="text-align: center;">
            <span class="text-uppercase page-subtitle"><h6 style="font-weight: bold; margin-top: 20px;">Đăng thông báo</h6></span>
        </div>
        <div class="contact-form-area">
            <div class="row">

                <div class="">
                    <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                        <form action="" method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tieude" placeholder="Tiêu Đề">
                            </div>
                            
                             <div class="form-group">
                                <span style="margin-left: 5px; font-size: 12px; margin-right: 5px;">Ảnh :</span><br>
                                <input type="file" name="fileUpload" value="" >
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <textarea class="form-control" name="noidung"></textarea>
                                <script type="text/javascript">CKEDITOR.replace("noidung")</script>
                            </div>
                            <button type="submit" class="btn contact-btn2" onclick="alert('Bài Viết Của Bạn Đã Được Gửi')">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
        $nguoidang = $_SESSION['name'];
        $thoigiandang = date("Y-m-d");
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'images/' . $_FILES['fileUpload']['name']);
                                   
        $anh=$_FILES['fileUpload']['name'];
        
        $dt->command("INSERT INTO thongbao(id_thongbao,tieude,noidung,anh,thoigiandang,nguoidang) VALUES(NULL,'$tieude','$noidung','$anh','$thoigiandang','$nguoidang')");
        
        
    }
    include 'bottom_admin.php';
?>