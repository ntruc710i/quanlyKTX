<?php 
	include '../data.php';
	$sql = new database;

	$id = filter_input(INPUT_POST, 'id');
	
	$sql->select("SELECT phong, loaiphong, gia, khu, nha FROM (((phong INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong) INNER JOIN khu ON phong.id_khu = khu.id_khu) INNER JOIN nha ON phong.id_nha = nha.id_nha) WHERE id_phong=$id");
	$r = $sql->fetch();
?>
<div class="row" id="DormitoryRoomDetail" style="">
	<div class="col-sm-5 col-xs-12">
		<div class="tab widget-box top-10">
			<div class="widget-header">
				<h4 class="smaller">THÔNG TIN PHÒNG</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="detail-view">
						<div class="row control-group">
							<div class="col-xs-4 control-label"><label for="DormitoryAreaName">Khu</label></div><div class="col-xs-8 control-value " style="">
								<?php echo $r['khu'] ?>
							</div>
						</div>
						<div class="row control-group">
							<div class="col-xs-4 control-label"><label for="DormitoryHouseName">Nhà</label></div><div class="col-xs-8 control-value " style="">
							<?php echo $r['nha'] ?>
							</div>
						</div>
						<div class="row control-group">
							<div class="col-xs-4 control-label"><label for="Name">Phòng</label></div><div class="col-xs-8 control-value " style="">
							<?php echo $r['phong'] ?>
							</div>
						</div>
						<div class="row control-group">
							<div class="col-xs-4 control-label"><label for="DormitoryRoomTypeName">Loại phòng</label></div><div class="col-xs-8 control-value " style="">
							<?php echo $r['loaiphong'] ?>
							</div>
						</div>
						<div class="row control-group">
							<div class="col-xs-4 control-label"><label>Giá</label></div><div class="col-xs-8 control-value">
							<?php echo number_format($r['gia']); ?>/ Tháng
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-sm-7 col-xs-12">
		<div class="tab widget-box top-10">
			<div class="widget-header">
				<h4 class="smaller">DANH SÁCH GIƯỜNG</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					
					<style type="text/css">
						div.tooltip-inner {
							max-width: 350px;
						}
					</style>

					<div class="grid-mvc" data-lang="en" data-gridname="" data-selectable="false" data-multiplefilters="false">
						<div class="grid-wrap qtsc06180b1-941c-4ced-9535-0e9512893f1e">
							<table class="table table-striped grid-table ui-responsive">

								<thead>
									<tr>
										<th class="grid-header" style="width:120px;" title="Giường">
											<div class="grid-header-title">
												<span>Giường</span>
											</div>
										</th>
										<th class="grid-header" title="Tình trạng">
											<div class="grid-header-title">
												<span>Tình trạng</span>
											</div>
										</th>    
									</tr>
								</thead>
								
								<tbody>
									<?php 
										$sql->select("SELECT * FROM giuong WHERE id_phong=$id");
										while($r = $sql->fetch()){
											$tt = $r['id_trangthai'];
											$id_giuong = $r["id_giuong"];
									?>
									<tr class="grid-row ">
										<td class="grid-cell" data-name="">        
											<label>
												<input  <?php if($tt == 0) echo 'disabled=""'?> type="radio" class="ace" id="rent-item-<?php echo $id_giuong ?>" name="data" value="<?php echo $id_giuong ?>">
												<span class="lbl"></span>
											</label>
											<label class="label label-info"><b>G <?php echo $r['giuong'] ?></b></label>
										</td>
										<td class="grid-cell" data-name="">    
											<div id="text-<?php echo $id_giuong ?>">
												<?php 
												if($tt == 0){
												?>
													<p class="light-orange"><b>Đã được đăng ký</b></p>
												<?php 
												} else{
												?>
													<p>Trống</p>
												<?php 
												}
												?>
											</div>
										</td>            	
									</tr>
									<?php 
										}
									?>
									
						
									
									

									
									
									
								</tbody>
							</table>
						</div>
					</div>
					
		
					
					<div class="profile-picture-hover img-loading-wrap" style="display: none;">
						<div class="outer">
							<div class="middle">
							</div>
						</div>
					</div>
					
					<script>
						Panel_Title = "Khu A - A01 - P. 408";
					</script>



				</div>
			</div>
		</div>

	</div>
	
	
	<div>
		<ul class="pager" style="float: right !important;">
			<li class="previous">
				<a class="btn btn-white btn-default btn-xlg" onclick="Previous_ListRoom()">← Trở lại</a>
			</li>
			
			<li class="next">
				<a class="btn btn-white btn-default btn-xlg" onclick="Next_StudentInfo()">Kế tiếp →</a>
			</li>
		</ul>
	</div>


</div>