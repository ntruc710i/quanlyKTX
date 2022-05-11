<?php 
	include '../data.php';
	$sql = new database;

	$giuong = filter_input(INPUT_POST, 'giuong');
	$sql->select("SELECT id_gioitinh FROM giuong INNER JOIN phong on giuong.id_phong = phong.id_phong WHERE id_giuong = $giuong");
	$r = $sql->fetch();
	$gioitinh = $r['id_gioitinh'];
	$sql->select("SELECT gioitinh FROM gioitinh WHERE id_gioitinh = $gioitinh");
	$r = $sql->fetch();
	$gioitinh = $r['gioitinh'];
?>
<div class="col-sm-12">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="smaller">THÔNG TIN ĐĂNG KÝ <span id="dormitoryFullName"></span></h4>
		</div>
		<div class="widget-body">
			<div class="widget-main clearfix">
				<div class="row">
					<div class="col-sm-3 col-xs-0 top-5"></div>
					<div class="col-sm-6 col-xs-12 top-5">
						<div class="edit-view" style="border:solid 1px #cccccc; border-radius:3px; padding:10px;">
							<h5 class="green"><b>THÔNG TIN CHUNG</b></h5>
							<div class="control-group form-group ">
								<label class="control-label no-padding-right col-sm-3 col-xs-12">CMND/Thẻ căn cước <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input class="col-sm-6" id="IdCardNumber" name="IdCardNumber" placeholder="" type="text" value="">
										
									</div>
								</div>
							</div>



							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="FirstName">Họ &amp; Tên lót <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-required="Bắt buộc nhập" id="FirstName" maskformat="" name="FirstName" placeholder="Ghi đầy đủ tên, dấu" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="LastName">Tên <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-required="Bắt buộc nhập" id="LastName" maskformat="" name="LastName" placeholder="Ghi đầy đủ tên, dấu" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3" for="Birthday">Ngày sinh <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9">
									<div class="clearfix">


										<div class="input-append">
											<input style="width: 180px" class="date-input col-sm-12" data-date-format="dd/mm/yyyy" data-val="true" data-val-date="The field Ngày sinh must be a date." data-val-required="Bắt buộc nhập" id="Birthday" name="Birthday" placeholder="Ngày sinh" style="width:100px" type="date" value="">
										</div>

										<script type="text/javascript">
											$(document).ready(function () {
												$("[name='Birthday']").mask('99/99/9999');
											});
										</script>

									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="Birthday" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3 col-xs-12" for="Gender">Giới tính <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input disabled autocomplete="off" class="col-sm-6" data-val="true" data-val-required="Bắt buộc nhập" id="Gender" maskformat="" name="Gender" placeholder="" type="text" value="<?php echo $gioitinh ?>">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="Gender" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3" for="IdCardDate">Ngày cấp CMND/CC <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9">
									<div class="clearfix">


										<div class="input-append">
											<input class="date-input col-sm-12" data-date-format="dd/mm/yyyy" data-val="true" data-val-date="The field Ngày cấp CMND/CC must be a date." data-val-required="Bắt buộc nhập" id="IdCardDate" name="IdCardDate" placeholder="dd/mm/yyyy" style="width:180px" type="date" value="">
										</div>

										<script type="text/javascript">
											$(document).ready(function () {
												$("[name='IdCardDate']").mask('99/99/9999');
											});
										</script>

									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="IdCardDate" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3 col-xs-12" for="IdCardIssuedName">Nơi cấp CMND/CC <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<select class="col-sm-6 " data-val="true" data-val-required="Bắt buộc nhập" id="IdCardIssuedName" name="IdCardIssuedName">			<?php 
												include("thanhpho.php");
											?>
										</select>
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="IdCardIssuedName" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="Email">Email <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-email="Không đúng định dạng Email" data-val-length="Email không được vượt quá 50 ký tự." data-val-length-max="50" data-val-required="Bắt buộc nhập" id="Email" maskformat="" name="Email" placeholder="Nhập đúng để nhận mã xác thực" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="Email" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="Phone">Điện thoại <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-length="Điện thoại không được vượt quá 10 ký tự." data-val-length-max="10" data-val-required="Bắt buộc nhập" id="Phone" maskformat="" name="Phone" placeholder="SĐT của sinh viên" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>




                                    


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="StudentCode">Mã số sinh viên</label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" id="StudentCode" maskformat="" name="StudentCode" placeholder="Mã SV" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="StudentCode" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    
                                    


							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3 col-xs-12" for="DepartmentId">Khoa</label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<select class="col-sm-6 " data-val="true" data-val-number="The field Khoa must be a number." id="DepartmentId" name="DepartmentId">
											<option value="">- Rỗng -</option>
											<?php 
												$sql->select("SELECT * FROM khoa");
												while($r = $sql->fetch()){
											?>
													<option value="<?php echo $r['id_khoa'] ?>"><?php echo $r['khoa'] ?></option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="DepartmentId" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                    


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="YearStudent">SV năm <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-2" data-val="true" data-val-number="The field SV năm must be a number." data-val-required="Bắt buộc nhập" id="YearStudent" maskformat="" max="6" min="1" name="DepartmentId" placeholder="" style="text-align: right;" type="number" value="1">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="YearStudent" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



							<input data-val="true" data-val-number="The field Học kỳ đăng ký must be a number." data-val-required="Bắt buộc nhập" id="SemesterId" name="SemesterId" type="hidden" value="35">
							<input id="IsEntireScholastic" name="IsEntireScholastic" type="hidden" value="True">
                                    
                                    




							<h5 class="green"><b>HỘ KHẨU THƯỜNG TRÚ</b></h5>
							<div class="edit-view">
								
								
							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3 col-xs-12" for="ProvineId">Tỉnh/Thành phố <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<select class="col-sm-6 " data-val="true" data-val-required="Bắt buộc nhập" id="ProvineId" name="ProvineId">
											<?php 
												include("thanhpho.php");
											?>
										</select>
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="ProvineId" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                        


							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3 col-xs-12" for="DistrictId">Quận/Huyện <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<select class="col-sm-6 " data-val="true" data-val-required="Bắt buộc nhập" id="DistrictId" name="DistrictId">
											<option value="">- Rỗng -</option>
										</select>
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="DistrictId" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                        


							<div class="control-group form-group">
								<label class="control-label no-padding-right col-sm-3 col-xs-12" for="WardsId">Phường/Xã <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<select class="col-sm-6 " data-val="true" data-val-required="Bắt buộc nhập" id="WardsId" name="WardsId">
											<option value="">- Rỗng -</option>
										</select>
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="WardsId" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                        


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="Address">Số nhà/Tên đường <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-required="Bắt buộc nhập" id="Address" maskformat="" name="Address" placeholder="" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="Address" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>




							</div>
                                    
							<h5 class="green"><b>THÔNG TIN LIÊN HỆ</b></h5>
							<div class="edit-view">
                                        


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="FamilyName">Tên người liên hệ <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-required="Bắt buộc nhập" id="FamilyName" maskformat="" name="FamilyName" placeholder="Họ và tên người liên hệ" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="FamilyName" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                        


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="FamilyPhone">SĐT người liên hệ <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-length="SĐT người liên hệ không được vượt quá 10 ký tự." data-val-length-max="10" data-val-required="Bắt buộc nhập" id="FamilyPhone" maskformat="" name="FamilyPhone" placeholder="SĐT người thân" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="FamilyPhone" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



                                        


							<div id="" class="control-group form-group ">
								<label class="control-label col-sm-3 col-xs-12" for="FamilyAddress">Địa chỉ người liên hệ <span class="text-danger">(*)</span></label>
								<div class="control-value col-sm-9 col-xs-12">
									<div class="clearfix">
										<input autocomplete="off" class="col-sm-6" data-val="true" data-val-required="Bắt buộc nhập" id="FamilyAddress" maskformat="" name="FamilyAddress" placeholder="Địa chỉ người thân" type="text" value="">
									</div>
									<div class="clearfix">
										<span class="field-validation-valid help-inline" data-valmsg-for="FamilyAddress" data-valmsg-replace="true"></span>
									</div>
								</div>
							</div>



							</div>
						</div>
					</div>
                           
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-sm-12">
	<ul class="pager" style="float: right !important;">
		<li class="previous">
			<a class="btn btn-white btn-default btn-xlg" onclick="return Previous_Slot()">← Trở lại</a>
		</li>
		<li>
			<a class="btn btn-white btn-default btn-xlg" href="#"><i class="fa fa-exchange"></i></a>
		</li>
		<li class="next">
			<a class="btn btn-white btn-success btn-xlg" onclick="SubmitForm()"><i class="ace-icon fa fa-save"></i>Lưu</a>
		</li>
	</ul>
</div>
<div class="col-sm-12" id="test"> </div>
<script type="text/javascript">
$(function(){
	$("#ProvineId").change(function(){
		var	ProvineId = $("#ProvineId").val();
		$.post('chuc-nang/quanhuyen.php',{"ProvineId":ProvineId}, function(data){
			$("#DistrictId").html(data);
		});
	});

	$("#DistrictId").change(function(){
		var	DistrictId = $("#DistrictId").val();
		$.post('chuc-nang/phuongxa.php',{"DistrictId":DistrictId}, function(data){
			$("#WardsId").html(data);
		});
	});
})
	 	 
</script>

