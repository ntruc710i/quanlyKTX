<?php 
  include("top.php");
  include("../data.php");
  $db = new database;
	if(filter_input(INPUT_GET,"tb",FILTER_VALIDATE_INT)) {
	$tb = filter_input(INPUT_GET,"tb",FILTER_VALIDATE_INT);
?>
    <div class="d-flex toggled" id="wrapper">
      <div id="page-content-wrapper">
        <div class="container-fluid ">
          <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">
                        <!-- Single Post -->
                        
                        <div class="col-10 col-sm-11">
                            <div class="single-post" style="margin-top: 30px;">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img class="banner" src="../img/safe_image.jpg" alt="">
                                </div>
                                <!-- Post Content -->
								<?php 
								$db->select("SELECT * FROM thongbao WHERE id_thongbao=$tb");
								$r = $db->fetch();
								?>
                                <div class="post-content" style="margin-top: 30px;">
                                    <a>
                                        <h2 class="post-headline"><?php echo $r["tieude"] ?></h2>
                                    </a>

                                    <p> <?php echo $r["noidung"]?></p>
                                    <p style="text-align: right; font-style: italic;"><?php echo $r["nguoidang"]?></p>
                                   
                                </div>
                            </div>

                            
                    </div>
                </div>

                
            </div>
        </div>
    </section>
        </div>
      </div>
    </div>
<?php
} else {
        echo '<meta http-equiv="refresh" content="0; url=/ktx2/sinhvien/">';
    }
?>
      