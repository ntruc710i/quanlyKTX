<?php
    include 'data.php';
    $dt = new database;
	$dt2 = new database;
	$dt3 = new database;
    
    $khu = filter_input(INPUT_GET, 'khu');
    $nha = filter_input(INPUT_GET, 'nha');
    $tang = filter_input(INPUT_GET, 'tang');
    $gioitinh = filter_input(INPUT_GET, 'gioitinh');
    $loaiphong = filter_input(INPUT_GET, 'loaiphong');
	
	include 'top.php'
?>

                <div class="breadcrumbs" id="breadcrumbs">
                    <ul class="breadcrumb"></ul>
                </div> 
				<!-- center -->
                <div id="center" class="page-content row">
					
					<div class="row" id="search">
					<?php 
						include("chuc-nang/Search.php");
						if($dt->checknull($nha)){
							include("chuc-nang/RoomInfo.php");
						} else{
							include("chuc-nang/Info.php");
						}
					?>
					</div>
					
				  	<div class="row" id="room" style=""></div>
					<div class="row form-horizontal clearfix" id="StudentInfo" style=""></div>
                </div>
				<!-- end center -->
            </div>
        </div>
    </div>

	<script src="js/bootstrap.min.js"></script>
</body>
</html>