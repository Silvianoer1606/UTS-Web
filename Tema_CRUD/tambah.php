<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$NIP			= $_POST['NIP'];
			$Nama			= $_POST['Nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$Mata_pelajaran		= $_POST['Mata_pelajaran'];

			$cek = mysqli_query($koneksi, "SELECT * FROM admin_guru WHERE NIP='$NIP'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO admin_guru(NIP, Nama,jenis_kelamin, Mata_pelajaran) VALUES('$NIP', '$Nama', '$jenis_kelamin', '$Mata_pelajaran')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIP sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_mhs" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIP</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="NIP" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Guru</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Mata Pelajaran</label>
				<div class="col-md-6 col-sm-6">
					<select name="mata_pelajaran" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik SipilL">Teknik Sipil</option>
						<option value="Teknik Kimia">Teknik Kimia</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Akuntansi">Akuntansi</option>
						<option value="Manajemen">Manajemen</option>
						<option value="Farmasi">Farmasi</option>
						<option value="Hukum">Hukum</option>
						<option value="Kedokteran">Kedokteran</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
