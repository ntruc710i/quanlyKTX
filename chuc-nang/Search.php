<div id="search">
	<select id="khu" name="khu">
		<option value="">- Khu -</option>
			<?php
				$dt->select("SELECT * FROM khu");
				while($r = $dt->fetch()){
					$id_khu = $r['id_khu'];
					$dt2->select("
					SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_khu=$id_khu
					");
					$x = $dt2->fetch();
					if($x['SL'] != 0){
			?>
					<option <?php if($khu == $r['id_khu']) echo 'selected' ?> value="<?php echo $r['id_khu'] ?>">
					<?php echo $r['khu']; ?>
					</option>
			<?php
					}
				}
			?>
	</select>

	<select id="nha" name="nha">
		<option value="">- Nhà -</option>
		<?php
			if(isset($khu))
			$dt->select("SELECT * FROM nha WHERE id_khu=$khu");
			while($r = $dt->fetch()){
				
				$id_nha = $r['id_nha'];
				$dt2->select("
				SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_nha=$id_nha
				");
				$x = $dt2->fetch();
				if($x['SL'] != 0){
		?>
					<option <?php if($nha == $r['id_nha']) echo 'selected' ?> value="<?php echo $r['id_nha'] ?>">
					<?php echo $r['nha']; ?>
					</option>
		<?php
				}
		}
		?>
	</select>

	<select id="gioitinh" name="gioitinh">
		<option value="">- Giới tính -</option>
		<?php
			if(isset($nha)) 
			$dt->select("SELECT * FROM gioitinh");
			while($r = $dt->fetch()){
				$id_gioitinh = $r['id_gioitinh'];
				$dt2->select("
				SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_gioitinh=$id_gioitinh AND id_nha=$nha
				");
				$x = $dt2->fetch();
				if($x['SL'] != 0){
		?>
					<option <?php if($gioitinh == $r['id_gioitinh']) echo 'selected' ?> value="<?php echo $r['id_gioitinh'] ?>">
					<?php echo $r['gioitinh']; ?>
					</option>
		<?php
				}
		}
		?>
	</select>

	<select id="loaiphong" name="loaiphong">
		<option value="">- Loại phòng -</option>
		<?php
			if(isset($nha)) 
			$dt->select("SELECT * FROM loaiphong");
			while($r = $dt->fetch()){
				$id_loaiphong = $r['id_loaiphong'];
				$dt2->select("
				SELECT COUNT(*) AS SL FROM giuong INNER JOIN phong ON giuong.id_phong = phong.id_phong WHERE id_loaiphong=$id_loaiphong AND id_nha=$nha
				");
				$x = $dt2->fetch();
				if($x['SL'] != 0){
		?>
					<option <?php if($loaiphong == $r['id_loaiphong']) echo 'selected' ?> value="<?php echo $r['id_loaiphong'] ?>">
					<?php echo $r['loaiphong']; ?>
					</option>
		<?php
				}
		}
		?>
	</select>
</div>

