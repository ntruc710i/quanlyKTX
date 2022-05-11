<?php
	include("top.php");


	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://corona.lmao.ninja/v2/countries/vn",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_CUSTOMREQUEST => "GET",
	));

	$response = curl_exec($curl);



	curl_close($curl);
	$r = json_decode($response,true);
?>
<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb"></ul>
</div>

<div class="container" >
	<!--PAGE CONTENT BEGINS HERE-->
	<style>
		select:disabled {
			color: #939192;
			background: #f5f5f5 !important;
			cursor: default;
		}

		.field-validation-error {
			color: #f00;
		}

		.items-center {
			align-items: center;
		}

		.justify-center {
			justify-content: center;
		}
		.hr-login {
			height: 1px;
			width: 2.4rem;
			background-color: rgba(0, 0, 0, 0.12);
			margin: 14px 0px;
		}

		.header-login {
			width: 120px;
			display: flex;
			margin: 0 auto;
		}

		.a-login {
			color: #f79d2d;
			text-decoration: none;
			font-weight: 700;
		}

		.g-recaptcha div {
			width: auto !important;
		}

		img {
			border-radius: 10px;
		}
	</style>


	<div class="row justify-content-center" >
		<!--PAGE CONTENT BEGINS HERE-->
		<div class="col-8 col-sm-7 col-md-8 col-lg-8 top-40">
			<div class="widget-body widget-box" style="border-radius: 10px; background-color:#f5f5f5; ">
				<div class="widget-main">
					<h3 class="orange text-center" style="margin-top:0px; font-weight:700">THÔNG TIN DỊCH TỄ</h3>
					<div class="row">
						<div class="col-sm-12">
							<ul class="list-unstyled spaced">
							
								<li style="margin-left:20px;">
									<img src="<?php echo $r['countryInfo']['flag'] ?>" style="height: 10px">
									<strong>Việt Nam</strong>
									<ul class="list-unstyled spaced">
									 
										<li style="margin-left:20px;"><i class="fa fa-hand-o-right orange2" aria-hidden="true"></i><strong>Nhiễm:</strong> <?php echo number_format($r['cases']) ?></li>
										<li style="margin-left:20px;"><i class="fa fa-hand-o-right orange2" aria-hidden="true"></i><strong>Chết:</strong> <?php echo number_format($r['deaths']) ?></li>
										<li style="margin-left:20px;"><i class="fa fa-hand-o-right orange2" aria-hidden="true"></i><strong>Hồi phục:</strong> <?php echo number_format($r['active']) ?></li>
									</ul>
								</li>
								
								
							</ul>
						</div>
						<div class="col-sm-12">
							<div class="red" style="font-size:14px;text-align: justify;">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
		<div class="col-4 col-sm-5 col-md-4 col-lg-4 top-40">
			<div id="login-box" class="login-box visible widget-box" style="">
				<div class="widget-body">
					<div class="widget-main">
						<h1 class="orange header" style="padding-top:10px; text-align:center">ĐĂNG NHẬP</h1>
						<div class="space-6"></div>
						<form action="chuc-nang/login.php" class="form-horizontal bottom-30 clearfix" method="post" novalidate="novalidate">      
							<fieldset>
								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										<input class="form-control" data-val="true" data-val-required="Bắt buộc nhập CMND/CCCD" id="StudentCode" name="StudentCode" placeholder="CMND/CCCD" type="text" value="">
										<i class="ace-icon fa fa-user"></i>
									</span>
									<span class="field-validation-valid" data-valmsg-for="StudentCode" data-valmsg-replace="true"></span>
								</label>

								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										<input class="form-control" data-val="true" data-val-required="Bắt buộc nhập mật khẩu" id="PIN" name="PIN" placeholder="Mật khẩu" type="password">
										<i class="ace-icon fa fa-lock"></i>
									</span>
									<span class="field-validation-valid" data-valmsg-for="PIN" data-valmsg-replace="true"></span>
								</label>

								<div class="space"></div>

								<div class="clearfix">
									<button class="btn btn-primary" style="width:100%; border-radius: 4px;" onclick="return FormSubmit();">
										<i class="ace-icon fa fa-key"></i>
										<span class="bigger-110">Đăng nhập</span>
									</button>
								</div>

								<div class="space-4"></div>

								<div class="clearfix items-center justify-center header-login">
									<hr class="hr-login">
									<span style="font-weight:700; margin:0px 8px;">Hoặc</span>
									<hr class="hr-login">
								</div>
								<div class="clearfix" style="margin-top: 5px; text-align:center">
										<a class="btn btn-xs btn-info" style="width:50%; border-radius: 4px;font-weight: 700; " href="Register.php">Đăng ký ở KTX </a>
								</div>
							</fieldset>
						</form>     
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--PAGE CONTENT ENDS HERE-->
</div>
<!--/.page-content-->
</div>
</div>
<!--/.main-content-->
</div>
    
    <script src="Scripts/jquery.validate.js?v=11092020"></script>
    <script src="Scripts/jquery.validate.unobtrusive.js?v=11092020"></script>

</body>
</html>