<?php 
	//số bản ghi trong 1 trang
	$soluong = 6;
	//tổng số bản ghi
	$dt->select("SELECT COUNT(id_thongbao) AS tong FROM thongbao WHERE id_phong=$_SESSION['id_sinhvien']");
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
	$dt->select("SELECT * FROM blog WHERE idNhom=1 AND trangthai=1 ORDER BY blog.idBlog DESC LIMIT $start,$soluong");
	while ($rn = $dt->fetch()) {
		$id = $rn['idBlog'];
		$idn = $rn['idNhom'];
		$tieude = $rn['tieude'];
		$anhtrichdan = $rn['anhtrichdan'];
		$nguoidang = $rn['nguoidang'];
		$thoigiandang = $rn['thoigiandang'];


		echo "<div class='col-12 col-md-6 col-lg-4'>";
			echo "<div class='single-post wow fadeInUp' data-wow-delay='0.1s'>";
				echo "<div class='post-thumb'><img src='$anhtrichdan' alt=''></div>";
				echo "<div class='post-content'>";
					echo "<div class='post-meta d-flex'>";
						echo "<div class='post-author-date-area d-flex'>";
							echo "<div class='post-author'><a href=''>Bởi $nguoidang</a></div>";
							echo "<div class='post-date'><a href=''>$thoigiandang</a></div>";
						echo "</div>";
					echo "</div>";
					echo "<a href='blogdetaill.php?id=$id&idn=$idn&t=2'><h4 class='post-headline'>$tieude</h4></a>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}
	//hiển thị link trang
	echo "<div class='col-12'>";
		echo "<div class='pagination-area d-sm-flex mt-15'>";
			echo "<nav aria-label='#'>";
				echo "<ul class='pagination'>";
					//nút prev
					if($page > 1) {
						$prev = $page - 1;
						echo "<li class='page-item'><a class='page-link' href='blog.php?page=$prev&t=2'><i class='fa fa-angle-double-left' aria-hidden='true'></i>Trang trước</a></li>";
					}
					//nút số
					for($i=1; $i<=$sotrang; $i++) {
						if($page != $i){
							echo "<li class='page-item'><a class='page-link' href='blog.php?page=$i&t=2'>$i</a></li>";
						} else {
							echo "<li class='page-item active'><a class='page-link' href='#'>$i<span class='sr-only'>(current)</span></a></li>";
						}
					}
					//nút next
					if($page < $sotrang) {
						$next = $page + 1;
						echo "<li class='page-item'><a class='page-link' href='blog.php?page=$next&t=2'>Trang kế<i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
					}
				echo "</ul>";
			echo "</nav>";
			echo "<div class='page-status'><p>Trang $page/$sotrang</p></div>";
		echo "</div>";
	echo "</div>";
?>