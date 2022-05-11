<?php 
  include("top.php");
  include("../data.php");
  $sql = new database;
?>
    <div class="d-flex toggled" id="wrapper">
      <div id="page-content-wrapper">
        
        <div class="container-fluid" style="margin-top: 20px; max-width: 100%;">
            <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Danh sách hóa đơn điện nước</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th style="text-align: center;" scope="col" class="border-0">STT</th>
                          <th style="text-align: center;" scope="col" class="border-0">Tháng</th>
                          <th style="text-align: center;" scope="col" class="border-0">Tiền Nước</th>
                          <th style="text-align: center;" scope="col" class="border-0">Tiền Điện</th> 
                          <th style="text-align: center;" scope="col" class="border-0">Tổng Tiền</th> 
                          <th style="text-align: center;" scope="col" class="border-0">Trạng Thái</th> 
                                                 
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">
                      <?php 
							$sql->select("SELECT * FROM hoadon INNER JOIN dien ON hoadon.id_dien = dien.id_dien  INNER JOIN phong on hoadon.id_phong=phong.id_phong");
						  	$dem = 0;
							while($r = $sql->fetch()){	
								$dem++;
                $tiendien=$r['tong_tien']-$r['tien_nuoc'];

						?> 
						  <tr>
							<td><?php echo $dem ?></td>
							<td><?php echo $r['thang'] ?></td>
							<td><?php echo number_format($r['tien_nuoc'])." vnđ" ?></td>

						  <td><?php echo number_format ($tiendien)." vnđ";  ?></td>
						  <td><?php echo number_format($r['tong_tien'])." vnđ" ?></td>
						  <td>
							 <?php if($r['trangthai']==1)
							{?>
							  <button type="button" class="mb-2 btn btn-success mr-2" disabled>Đã thanh toán</button>
							<?php
							} else {
							?>
							  <button type="button" class="mb-2 btn btn-sm btn-danger mr-1" disabled>Chưa thanh toán</button>
							<?php
							}
							?>
						</td>
							<td>
								<form method="post"><input type="hidden" name="id" value="20">

								</form>
                            </td>
						  </tr>
						  
						<?php
							}
            ?>
            <tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>