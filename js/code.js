$(function() { 
	
	var khu = $('#khu');
	var nha = $('#nha');
	var gioitinh = $('#gioitinh');
	var loaiphong = $('#loaiphong');

	$(khu).change(function(){
		window.location = window.location.href.split("?")[0] + "?khu=" + $(this).val();
		
	});
	$(nha).change(function(){
		window.location = window.location.href.split("?")[0] + "?khu=" + khu.val() + "&nha=" +  $(this).val();
	});
	$(gioitinh).change(function(){
		window.location = window.location.href.split("?")[0] + "?khu=" + khu.val() + "&nha=" + nha.val() + "&gioitinh=" + $(this).val();
	});
	$(loaiphong).change(function(){
		window.location = window.location.href.split("?")[0] + "?khu=" + khu.val() + "&nha=" + nha.val() + "&gioitinh=" + gioitinh.val() + "&loaiphong=" + $(this).val();
	});
	
	
	
}); 

function SubmitForm(){
	var giuong = null;
	var checkbox = document.getElementsByName("data");
	for (var i = 0; i < checkbox.length; i++){
		if (checkbox[i].checked === true){
			giuong = checkbox[i].value;
		}
	}
	
    
	var str = $("#IdCardNumber").val();
	var n = str.length;
	if (n < 9 || n > 12){
		alert("CMND/Thẻ căn cước không hợp lệ");
	} else if($('#FirstName').val() == '') {
		alert("Chưa nhập Họ và tên lót");
	} else if($('#LastName').val() == '') {
		alert("Chưa nhập Tên ");
	} else if($('#Birthday').val() == '') {
		alert("Chưa nhập Ngày sinh");
	} else if($('#IdCardDate').val() == '') {
		alert("Chưa nhập Ngày cấp CMND");
	} else if($('#IdCardIssuedName').val() == '') {
		alert("Chưa chọn Nơi cấp CMND");
	} else if($('#Email').val() == '') {
		alert("Chưa nhập Email");
	} else if($('#Phone').val().length < 9 || $('#Phone').val().length > 11) {
		alert("SĐT không hợp lệ");
	} else if($('#StudentCode').val() == '') {
		alert("Chưa nhập Mã số sinh viên");
	} else if($('#DepartmentId').val() == '') {
		alert("Chưa chọn Khoa");
	} else if($('#ProvineId').val() == '') {
		alert("Chưa chọn Tỉnh/Thành phố");
	} else if($('#DistrictId').val() == '') {
		alert("Chưa chọn Quận/Huyện");
	} else if($('#WardsId').val() == '') {
		alert("Chưa chọn Phường/Xã");
	} else if($('#Address').val() == '') {
		alert("Chưa nhập Địa chỉ");
	} else if($('#FamilyName').val() == '') {
		alert("Chưa nhập Tên người liên hệ");
	} else if($('#FamilyPhone').val().length < 9 || $('#FamilyPhone').val().length > 11) {
		alert("SĐT không hợp lệ");
	} else if($('#FamilyAddress').val() == '') {
		alert("Chưa nhập Địa chỉ người liên hệ");
	} else{
		//thongtinchung
		var cmnd = $('#IdCardNumber').val();
		var holot = $('#FirstName').val();
		var ten = $('#LastName').val();
		var ngaysinh = $('#Birthday').val();
		var gioitinh = $('#Gender').val();
		var ngaycapcmnd = $('#IdCardDate').val();
		var noicapcmnd = $('#IdCardIssuedName').val();
		var email = $('#Email').val();
		var sdt = $('#Phone').val();
		var masv = $('#StudentCode').val();
		var khoa = $('#DepartmentId').val();
		var svnam = $('#YearStudent').val();
		//hokhau
		var tinhtp = $('#ProvineId').val();
		var quanhuyen = $('#DistrictId').val();
		var phuongxa = $('#WardsId').val();
		var diachi = $('#Address').val();
		//thongtinlienhe
		var FamilyName = $('#FamilyName').val();
		var FamilyPhone = $('#FamilyPhone').val();
		var FamilyAddress = $('#FamilyAddress').val();
		
		$.ajax({
			type: "POST",
			url: 'chuc-nang/submit.php',
			data: {
				cmnd: cmnd,
				holot: holot,
				ten: ten,
				ngaysinh: ngaysinh,
				gioitinh: gioitinh,
				ngaycapcmnd: ngaycapcmnd,
				noicapcmnd: noicapcmnd,
				email: email,
				sdt: sdt,
				masv: masv,
				khoa: khoa,
				svnam: svnam,
				tinhtp: tinhtp,
				quanhuyen: quanhuyen,
				phuongxa: phuongxa,
				diachi: diachi,
				FamilyName: FamilyName,
				FamilyPhone: FamilyPhone,
				FamilyAddress: FamilyAddress,
				giuong: giuong
			}  
		})
		.done(function (rs){
			alert("Bạn đã đăng ký thành công!");
			window.location="Index.php";
		});
	}
	
	
	
	
	
	
}

function room(id){
	$(".dormitory-room-item").removeClass("selected");
	$.ajax({
		type: "POST",
		url: 'chuc-nang/RoomDetail.php',
		data: { id: id }
	})
	.done(function (rs){
		$(".dormitory-room-item-" + id).addClass("selected");
		$("#room").html(rs);
		$("#room").show();
		$("#search").hide();
	});
}

function Previous_ListRoom()
{
	$("#room").hide();
	$("#search").show();
}

function Previous_Slot()
{
	$("#StudentInfo").hide();
	$("#room").show();
}

function Next_StudentInfo()
{
	var check = null;
	var checkbox = document.getElementsByName("data");
	for (var i = 0; i < checkbox.length; i++){
		if (checkbox[i].checked === true){
			var check = checkbox[i].value;
			break;
		}
	}
	if(check == null || check ==""){
		alert("Vui lòng chọn giường!");
	} else {
		$.ajax({
			type: "POST",
			url: 'chuc-nang/StudentInfo.php',
			data: { giuong: check }
		})
		.done(function (rs){
			$("#StudentInfo").html(rs);
			$("#StudentInfo").show();
			$("#room").hide();
		});
	}
	
	
	
}



