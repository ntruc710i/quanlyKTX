<?php

include '../data.php';
$sql = new database;

$cmnd = filter_input(INPUT_POST, 'cmnd');
$holot = filter_input(INPUT_POST, 'holot');
$ten = filter_input(INPUT_POST, 'ten');
$ngaysinh = filter_input(INPUT_POST, 'ngaysinh');
$gioitinh = filter_input(INPUT_POST, 'gioitinh');
$ngaycapcmnd = filter_input(INPUT_POST, 'ngaycapcmnd');
$id_noicapcmnd = filter_input(INPUT_POST, 'noicapcmnd');
$email = filter_input(INPUT_POST, 'email');
$sdt = filter_input(INPUT_POST, 'sdt');
$masv = filter_input(INPUT_POST, 'masv');
$khoa = filter_input(INPUT_POST, 'khoa');
$svnam = filter_input(INPUT_POST, 'svnam');

$id_tinhtp = filter_input(INPUT_POST, 'tinhtp');
$id_quanhuyen = filter_input(INPUT_POST, 'quanhuyen');
$id_phuongxa = filter_input(INPUT_POST, 'phuongxa');
$diachi = filter_input(INPUT_POST, 'diachi');

$FamilyName = filter_input(INPUT_POST, 'FamilyName');
$FamilyPhone = filter_input(INPUT_POST, 'FamilyPhone');
$FamilyAddress = filter_input(INPUT_POST, 'FamilyAddress');

$giuong = filter_input(INPUT_POST, 'giuong');

$response = file_get_contents('https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/tinh_tp.json');
$response = json_decode($response,true);
$noicapcmnd = $response[$id_noicapcmnd]['name'];

$response = file_get_contents('https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/tinh_tp.json');
$response = json_decode($response,true);
$tinhtp = $response[$id_tinhtp]['name'];

$response = file_get_contents('https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/quan-huyen/'.$id_tinhtp.'.json');
$response = json_decode($response,true);
$quanhuyen = $response[$id_quanhuyen]['name'];

$response = file_get_contents('https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/xa-phuong/'.$id_quanhuyen.'.json');
$response = json_decode($response,true);
$phuongxa = $response[$id_phuongxa]['name'];


$sql->command("INSERT INTO sinhvien (id_sinhvien, cmnd, ho, ten, ngaysinh, gioitinh, ngay_cmnd, noicap_cmnd, email, sdt, ma_sv, id_khoa, sv_nam, tt_tinh_tp, tt_quan_huyen, tt_phuong_xa, tt_diachi, ten_lh, sdt_lh, diachi_lh, trang_thai, id_giuong) VALUES (NULL, '$cmnd', '$holot', '$ten', '$ngaysinh', '$gioitinh', '$ngaycapcmnd', '$noicapcmnd', '$email', '$sdt', '$masv ', '$khoa', '$svnam', '$tinhtp', '$quanhuyen', '$phuongxa', '$diachi', '$FamilyName', '$FamilyPhone', '$FamilyAddress', '0','$giuong')");


$sql->command("UPDATE giuong SET id_trangthai = 0 WHERE giuong.id_giuong = $giuong");



