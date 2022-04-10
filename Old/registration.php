<?php

$idPengajian = $_GET["idPengajian"];

$conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");
if ( isset($_POST["submit"]) ){

	$date = date('Y-m-d H:i:s');
	date_default_timezone_set("Asia/Jakarta");
	$time = date("h:i:sa");

	$nama = $_POST["nama"];
	$gender = $_POST["gender"];
	$desa = $_POST["desa"];
	$kelompok = $_POST["kelompok"];

	$query = "INSERT INTO registrasi (id, nama, kelompok, desa, gender)
				VALUES
				('', '$nama', '$kelompok', '$desa', '$gender')
			";
	mysqli_query($conn, $query);

	$query = "INSERT INTO terdaftar
				VALUES
				('', '$nama','$kelompok','$desa', '$gender')
			";
	mysqli_query($conn, $query);

	$query = "INSERT INTO kehadiran
				VALUES
				('', '$idPengajian', '$nama','$date','$time','$kelompok','$desa', '$gender')
			";
	mysqli_query($conn, $query);

	if( mysqli_affected_rows($conn) > 0 ) {
		echo "
			<script>
				document.location.href = 'berhasil2.php?idPengajian=$idPengajian';
			</script>
		";
	}
}

?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>REGISTRASI</title>

	<script>
	function tampilkan(){
	  var nama_desa=document.getElementById("form1").desa.value;
	  if (nama_desa=="BANJARAN")
	    {
	        document.getElementById("kelompok").innerHTML="<option value='CIJULANG'>CIJULANG</option><option value='CIMAUNG'>CIMAUNG</option><option value='NAMBO'>NAMBO</option><option value='PANGGALENGAN'>PANGGALENGAN</option>";
	    }
	  else if (nama_desa=="BALEENDAH")
	    {
	        document.getElementById("kelompok").innerHTML="<option value='CIPBAR'>CIPBAR</option><option value='CIPTIM'>CIPTIM</option><option value='DAYEUH KOLOT'>DAYEUH KOLOT</option><option value='KERTAMANAH'>KERTAMANAH</option><option value='MANGGAHANG'>MANGGAHANG</option><option value='MUNJUL'>MUNJUL</option><option value='PALASARI'>PALASARI</option><option value='PPM'>PPM</option><option value='KPM'>KPM</option>";
	    }
	  else if (nama_desa=="CIPARAY")
	    {
	        document.getElementById("kelompok").innerHTML="<option value='BARUJATI'>BARUJATI</option><option value='CIDAWOLONG'>CIDAWOLONG</option><option value='CIPAKU'>Cipaku</option><option value='KBSI'>KBSI</option>";
	    }
	  else if (nama_desa=="MAJALAYA")
	    {
	        document.getElementById("kelompok").innerHTML="<option value='BOJONG'>BOJONG</option><option value='HAURBUYUT'>HAURBUYUT</option><option value='MUARA'>MUARA</option><option value='PONGPORANG'>PONGPORANG</option><option value='SUKMA 1'>SUKMA 1</option><option value='SUKMA 2'>SUKMA 2</option><option value='SUKMA 3'>Sukamanah 3</option>";
	    }
	  else if (nama_desa=="SAYATI")
	    {
	        document.getElementById("kelompok").innerHTML="<option value='BURUJUL'>BURUJUL</option><option value='CIBADUYUT'>CIBADUYUT</option><option value='KOPER'>KOPER</option><option value='MARKEN'>MARKEN</option><option value='MAPER'>MAPER</option><option value='PERMAKO'>PERMAKO</option><option value='TKI'>TKI</option>";
	    }
	  else if (nama_desa=="SOREANG")
	    {
	        document.getElementById("kelompok").innerHTML="<option value='CIWIDEY'>CIWIDEY</option><option value='JUNTI'>JUNTI</option><option value='SOREANG 1'>SOREANG 1</option><option value='SOREANG 2'>SOREANG 2</option><option value='WARLOB 1'>WARLOB 1</option><option value='WARLOB 2'>WARLOB 2</option>";
	    }
	}
	</script>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Bootstrap DateTimePicker -->
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">


	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">MUDA-MUDI</a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<div id="gtco-logo"><a href="index.php">Bandung Selatan 2</a></div>
				</div>
			</div>

		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(background/abcd.jpg)" data-stellar-background-ratio="0.5" >
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-14 col-md-offset-0 text-left">
					<div class="row row-mt-10em">
						<div class="col-md-15 mt-text animate-box" data-animate-effect="fadeInUp">
							<center><h2 style="font-size: 28px" class="cursive-font">Silahkan Masukkan Data Pribadi Anda</h2></center>
						</div>

						</div>
						<div class="col-md-10 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="">

											<form action="" method="post" id="form1" name="form1" autocomplete="off">

												<div class="row form-group">
													<div class="col-md-12">
														<label for="nama">Nama Lengkap</label>
														<input type="text" id="nama" name="nama" class="form-control" autocomplete="off">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="gender">Jenis Kelamin</label>
														<select name="gender" id="gender" class="form-control">
														  <option value="L">Laki Laki</option>
														  <option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="desa">Desa</label>
														<select id="desa" name="desa" onchange="tampilkan()" class="form-control">
														<option value=""></option>
														<option value="BANJARAN">BANJARAN</option>
														<option value="BALEENDAH">BALEENDAH</option>
														<option value="CIPARAY">CIPARAY</option>
														<option value="MAJALAYA">MAJALAYA</option>
														<option value="SAYATI">SAYATI</option>
														<option value="SOREANG">SOREANG</option>
													</select>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="kelompok">Kelompok</label>
														<select id="kelompok" name="kelompok" class="form-control"></select>
														<!--<input type="text" id="alamat" name="alamat" class="form-control">-->
													</div>
												</div>


												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<!--<input type="submit" name="register" class="btn btn-primary btn-block" value="Submit">-->
														<button type="submit" name="submit" class="btn btn-primary btn-block" >Submit</button>
													</div>
												</div>
											</form>
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
	</header>


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<script src="js/moment.min.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>


	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
