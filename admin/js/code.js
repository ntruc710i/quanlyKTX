$(function() { 
	search();
	
}); 

function search(){
	
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
	
	
}

function SubmitForm(){
	alert("Bạn đã đăng ký thành công!");
}

function room(id){
	$(".dormitory-room-item").removeClass("selected");
	$.ajax({
		type: "POST",
		url: 'RoomDetail.php',
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
	$.ajax({
		url: 'StudentInfo.php'
	})
	.done(function (rs){
		$("#StudentInfo").html(rs);
		$("#StudentInfo").show();
		$("#room").hide();
	});
}

