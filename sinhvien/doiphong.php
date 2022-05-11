<?php 
  include("top.php");
  include("../data.php");
  $db = new database;
	
$id_phong = $_SESSION["id_phong"];
$id_sinhvien = $_SESSION["id_sinhvien"];
if(filter_input(INPUT_POST,"lydo")){
	$lydo = filter_input(INPUT_POST,"lydo");
	$db->command("INSERT INTO doiphong (id_doiphong, id_phong, id_sinhvien, lydo_doiphong, trangthai) VALUES (NULL, $id_phong, $id_sinhvien, '$lydo', '0')");
}


?>
    
    <div class="d-flex toggled" id="wrapper">
      <div id="page-content-wrapper">
        
        <div class="container-fluid" style="margin-top: 20px; max-width: 100%;">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Đổi Phòng</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                      <table class="table mb-0">
                        <thead class="bg-light">
                          <tr>                        
                          </tr>
                        </thead>
                        <tbody style="text-align: center;">
                          <tr>
							  <form action="" method="post">
								<td style="font-weight: bold; text-align: left; padding-left: 50px;">Lý do đổi phòng</td>
								<td>
									
									<input type="text" name="lydo" class="form-control" placeholder="Nhập lí do đổi phòng">
								</td>
								<td>
									<button class="btn btn-outline-success " type="submit" onclick="alert('Yêu Cầu Của Bạn Đã Được Gửi')">Gửi yêu cầu</button>
								</td>
							  </form>
                            </tr>                         
						  </tbody>
                      </table>
                    </div>
                  </div>
              </div>
        </div>
      </div>
    </div>
     
