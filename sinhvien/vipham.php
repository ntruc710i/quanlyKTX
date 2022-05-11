<?php 
  include("top.php");
	include("../data.php");
	$sql = new database;
?>
    <div class="d-flex toggled" id="wrapper">
      <div id="page-content-wrapper" style="margin-bottom: 203px;">
        <div class="container-fluid" style="margin-top: 20px; max-width: 100%;">
            <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Danh Sách Lỗi Vi Phạm Nội Quy</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th style="text-align: center;" scope="col" class="border-0">STT</th>
                          <th style="text-align: center;" scope="col" class="border-0">Ngày Tháng</th>
                          <th style="text-align: center;" scope="col" class="border-0">Thời Gian</th>
                          <th style="text-align: center;" scope="col" class="border-0">Lỗi Vi Phạm</th> 
                          <th style="text-align: center;" style="text-align: center;" scope="col" class="border-0">Hình Thức Kỷ Luật</th> 
                          <th style="text-align: center;"  scope="col" class="border-0">Số Tiền</th> 
                                                     
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">
                      <?php 
							$sql->select("SELECT * from vipham");
						  	$dem = 0;
							while($r = $sql->fetch()){	
								$dem++;
						?> 
						  <tr>
							<td><?php echo $dem ?></td>
							<td><?php echo $r['ngay_vp'] ?></td>
							<td><?php echo $r['thoigian_vp']?></td>
							<td><?php echo $r['noidung_vp'] ?></td>
							<td><?php echo $r['hinhthuc_kl'] ?></td>
							<td><?php echo number_format($r['sotiennop'])." vnđ" ?></td>
						  </tr>
						  
						<?php
							}
						?>                       </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
      