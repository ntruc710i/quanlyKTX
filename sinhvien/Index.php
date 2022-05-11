<?php 
  include("top.php");
  include("../data.php");
  $dt = new database;
?>
    <style>
	.h4,.post-headline{
		font-family: 'Quicksand', sans-serif;
		font-weight: 700;
		color: #232d37;
		line-height: 1.25;
		text-transform: capitalize;
	}   
	.post-headline{
	text-decoration: none;
    }
    .post-thumb img {
    border-radius: 30px;
    margin-bottom: 30px;
}


    </style>
    

    <div class="d-flex toggled" id="wrapper">
      <div id="page-content-wrapper">

        <div class="container-fluid ">
            <section class="archive-area section_padding_80">
                <div class="container">
                    <div class="row" style="margin-top: 30px;">
 <?php 
	//số bản ghi trong 1 trang
	$soluong = 6;
	//tổng số bản ghi
	$id_giuong= $_SESSION['id_giuong'];
	$dt->select("SELECT * FROM giuong WHERE id_giuong='$id_giuong'");
	$row = $dt->fetch();
	$id_phong= $row['id_phong'];
	$_SESSION["id_phong"] = $id_phong;
						
	$dt->select("SELECT COUNT(id_thongbao) AS tong FROM thongbao WHERE id_phong=$id_phong");
	$row = $dt->fetch();
	$tong = $row['tong'];
	//số lượng trang
	if($tong > $soluong) {
		$sotrang = ceil($tong/$soluong);
	}
	//xác định trang hiện tại
	if(isset($_GET['page']) && $dt->checknum($_GET['page']) && (int)$_GET['page'] >=1 && (int)$_GET['page'] <= $sotrang) {
		$page = $_GET['page'];   
	} else {
		$page = 1;
	}
	//xác định bản ghi đầu tiên của trang
	$start = ($page-1)*$soluong;
	//truy vấn và hiển thị nội dung của trang
	$dt->select("SELECT * FROM thongbao WHERE id_phong=$id_phong ORDER BY id_thongbao DESC LIMIT $start,$soluong");
	while ($r = $dt->fetch()) {
	?>
		<div class="col-12 col-md-6 col-lg-4">
			<div class="single-post wow fadeInUp" data-wow-delay="0.1s" style="/* visibility: visible; */animation-delay: 0.1s;animation-name: fadeInUp;">
				<!-- Post Thumb -->
				<div class="post-thumb">
					<img src="<?php echo $r['anh'] ?>" alt="">
				</div>
				<!-- Post Content -->
				<div class="post-content">
					<a href="single.php?tb=<?php echo $r['id_thongbao'] ?>">
						<h4 class="post-headline"><?php echo $r['tieude'] ?></h4>
					</a>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	<div class="col-12">
		<div class="pagination-area d-sm-flex mt-15">
			<nav aria-label="#">
				<ul class="pagination">
					<?php 
					if($page > 1) {
						$prev = $page - 1;
					?>
						<li class='page-item'><a class='page-link' href='Index.php?page=<?php echo $prev ?>'><i class='fa fa-angle-double-left' aria-hidden='true'></i>Trang trước</a></li>
					<?php
					}
					//nút số
					for($i=1; $i<=$sotrang; $i++) {
						if($page != $i){
							echo "<li class='page-item'><a class='page-link' href='Index.php?page=$i'>$i</a></li>";
						} else {
							echo "<li class='page-item active'><a class='page-link' href='#'>$i<span class='sr-only'>(current)</span></a></li>";
						}
					}
					//nút next
					if($page < $sotrang) {
						$next = $page + 1;
						echo "<li class='page-item'><a class='page-link' href='Index.php?page=$next'>Trang kế<i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
					}
					?>
				</ul>
			</nav>
			<div class="page-status">
				<p>Trang <?php echo $page."/".$sotrang?></p>
			</div>
		</div>
	</div>				
                        
                        <!-- Single Post -->
                        
                        
        
                    </div>
                </div>
            </section>
        </div>
      </div>
    </div>
    