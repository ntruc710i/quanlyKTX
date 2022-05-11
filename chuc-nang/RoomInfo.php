
<div id="DormitoryRoom_List">
	<div class="widget-box dormitory-area" style="margin-bottom:10px;">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">
				<b>
					<?php
						$dt->select("SELECT * FROM nha WHERE id_nha=$nha");
						$r = $dt->fetch();
						echo $r['nha'];
					?>
				</b>&nbsp;
				<span>Tổng số giường 
					<span class="badge badge-info total-number">
					<?php
						$dt->select("SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_nha=$nha");
						$r = $dt->fetch();
						echo $r['SL'];
					?>
					</span>
				</span> - 
				<span>Tổng số giường trống 
					<span class="badge badge-info total-minus">
					<?php
						$dt->select("SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_nha=$nha AND id_trangthai=1");
						$r = $dt->fetch();
						echo $r['SL'];
					?>
					</span>
				</span> - 
				<span>Tổng số sinh viên thuê 
					<span class="badge badge-info total-rent">
					<?php
						$dt->select("SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_nha=$nha AND id_trangthai=0");
						$r = $dt->fetch();
						echo $r['SL'];
					?>
					</span>
				</span>
			</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div>
                            
					<style>
						.dormitory-room-item.selected
						{
							border-color:#dd5a43
						}
					</style>
					
					
					
					<ul class="nav nav-tabs" id="FloorTab">
						<?php
							$dt->select("SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_nha=$nha");
							$r = $dt->fetch();
							$num = $r['SL'];
							if($num != 0){
								$dt->select("SELECT * FROM tang WHERE id_nha=$nha");
								$i = 0;
								while($r = $dt->fetch()){
									$i++;
									$tang = $r['id_tang'];

									if($dt2->checknull($gioitinh)  && $dt2->checknull($loaiphong)){
										$dt2->select("
										SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_gioitinh=$gioitinh AND id_loaiphong=$loaiphong AND id_tang=$tang
										");
									}	elseif($dt2->checknull($loaiphong)){
										$dt2->select("
										SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_loaiphong=$loaiphong AND id_tang=$tang
										");
									}	elseif($dt2->checknull($gioitinh)){
										$dt2->select("
										SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_gioitinh=$gioitinh AND id_tang=$tang
										");
									}	else{
										$dt2->select("SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_tang=$tang");
									}

									$x = $dt2->fetch();
									if($x['SL'] != 0){
										
						?>
										<li class="<?php if($i==1) echo "active" ?>">
											<a class="" data-target="#floor-tab<?php echo $r['id_tang'] ?>" data-toggle="tab" aria-expanded="false">
												<?php echo $r['tang'] ?> 
												<b>
													(<?php echo $i ?> )
												</b>
											</a>
										</li>
					
						<?php
										}
									}
								}
						?>
					</ul>
	
					
					<div class="tab-content">
						<?php 
							if($num != 0){
								$dt->select("SELECT * FROM tang WHERE id_nha=$nha");
								$n = 0;
								while($r = $dt->fetch()){
								$n++;
								$tang = $r['id_tang'];
						?>
						<div class="tab-pane <?php if($n==1) echo "active" ?>" id="floor-tab<?php echo $r['id_tang'] ?>">
							<div class="dormitory-room-wrap">
								<?php 
									if($dt->checknull($gioitinh)  && $dt->checknull($loaiphong)){
										$dt2->select("SELECT * FROM phong WHERE id_tang=$tang AND id_gioitinh=$gioitinh AND id_loaiphong=$loaiphong");
									}	elseif($dt->checknull($loaiphong)){
										$dt2->select("SELECT * FROM phong WHERE id_tang=$tang AND id_loaiphong=$loaiphong");
									}	elseif($dt->checknull($gioitinh)){
										$dt2->select("SELECT * FROM phong WHERE id_tang=$tang AND id_gioitinh=$gioitinh");
									}	else{
										$dt2->select("SELECT * FROM phong WHERE id_tang=$tang");
									}
								
								while($x = $dt2->fetch()){
									$phong = $x['phong'];
									$dt3->select("SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE phong='$phong'"); 
									$n2 = $dt3->fetch();
									if($n2['SL'] != 0){
								?>
								<div class="col-sm-2 room-grid">
									<div style="" class="dormitory-room-item dormitory-room-item-<?php echo $x['id_phong'] ?>" onclick="room(<?php echo $x['id_phong'] ?>)">
										
										<p class="name"><?php echo $x['phong'] ?></p>
										<p style="text-align: center; margin-bottom: 5px; border-bottom: 1px dotted #e2e2e2; padding-bottom:5px"><b>Phòng <?php echo $x['id_loaiphong'] ?> giường</b></p>
										
										<div class="clearfix" style="text-align: center; padding-bottom:5px">
											<?php 
											$dt3->select("SELECT * FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE phong='$phong'"); 
											while($q = $dt3->fetch()){
											?>
											
											<div class="col-xs-3 top-5"><i class="ace-icon fa fa-user <?php if($q['id_trangthai']==0) echo "red" ?> bigger-120" aria-hidden="true" <?php if($q['id_trangthai']==1) echo 'style="color:#ccc"' ?>></i></div>
											<?php 
											}
											?>
										</div>

									</div>
								</div>
								<?php 
									}
								}
								?>
							</div>
						</div>
						
						<?php 
									}
								}
						?>

    				</div>




				</div>
			</div>
		</div>
	</div>
</div>