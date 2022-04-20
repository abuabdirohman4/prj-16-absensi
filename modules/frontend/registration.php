<?php

$idPengajian = $_GET["idPengajian"];

// Development
$conn = mysqli_connect("localhost", "root", "root", "prj-16-absensi-gama");

// Production
// $conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");

$dataPengajian = $conn->query("SELECT * FROM pengajian WHERE id = '$idPengajian'");

if($dataPengajian->num_rows <= 0) {
  // halaman error
  echo "Pengajian tidak ditemukan.";
  die();
}

$dataPengajian = $dataPengajian->fetch_array(MYSQLI_ASSOC);

if ( isset($_POST["submit"]) ){

	$date = date('Y-m-d H:i:s');
	date_default_timezone_set("Asia/Jakarta");
	$time = date("h:i:sa");

	$nama = strtoupper($conn->real_escape_string($_POST["nama"]));
	$gender = $_POST["gender"];
	$daerah = $_POST["daerah"];
	$angkatan = $_POST["angkatan"];
	$exist = false;
	$query1 = false;
	$query2 = false;

    $check = $conn->query("SELECT * FROM terdaftar WHERE nama='$nama' AND daerah='$daerah'");
    
    if($check->num_rows <= 0) {
    
    	$query1 = $conn->query("INSERT INTO terdaftar (id, nama, gender, daerah, angkatan)
    				VALUES
    				('', '$nama', '$gender', '$daerah', '$angkatan')
    			");
    	
    }
    
    $check = $conn->query("SELECT * FROM kehadiran WHERE nama='$nama' AND idPengajian='$idPengajian'");
    
    if($check->num_rows <= 0) {
        
    	$query2 = $conn->query("INSERT INTO kehadiran
				VALUES
				('', '$idPengajian', '$nama','$date','$time','','','$daerah', '$gender', '$angkatan')");
    
    } else {
        
        $exist = true;
        
    }

	if( $query1 && $query2 ) {
        
        echo '<script>alert("Berhasil registrasi. Silakan mengaji! :)")</script>';
        
	} else {
	    
	    if($exist)
            echo '<script>alert("Anda sudah absensi. Silakan mengaji! :)")</script>';
        else
            echo '<script>alert("Gagal registrasi. Harap segera hubungi penjaga!")</script>';

	}
}
?>


<!DOCTYPE HTML>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
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
    <link rel="stylesheet" href="../../assets/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="../../assets/css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">

    <!-- Bootstrap DateTimePicker -->
    <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Modernizr JS -->
    <script src="../../assets/js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">


	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href=""><?php echo $dataPengajian["namaPengajian"] ?></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<div id="gtco-logo"><a href="absensi-pengajian.php?idPengajian=<?php echo $dataPengajian["id"]?>">INPUT KEHADIRAN</a></div>
				</div>
			</div>

		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(../../assets/background/abcd.jpg)" data-stellar-background-ratio="0.5" >
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
														<input type="text" id="nama" name="nama" class="form-control" style="text-transform: uppercase" autocomplete="off">
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
														<label for="desa">Daerah</label>
														<select id="daerah" name="daerah" class="form-control">
														<option value=""></option>
														<option value="BS1">BANDUNG SELATAN 1</option>
														<option value="BS2">BANDUNG SELATAN 2</option>
														<option value="BT">BANDUNG TIMUR</option>
														<option value="BU">BANDUNG UTARA</option>
														<option value="BB">BANDUNG BARAT</option>
													</select>
													</div>
												</div>
												<div class="row form-group">
                                                    <div class="col-md-12">
                                                	    <label for="angkatan">Angkatan</label>
                                                    	<select id="angkatan" name="angkatan" class="form-control">
                                                    	  <option value="2013">2013</option>
                                                    	  <option value="2014">2014</option>
                                                    	  <option value="2015">2015</option>
                                                    	  <option value="2016">2016</option>
                                                    	  <option value="2017">2017</option>
                                                    	  <option value="2018">2018</option>
                                                    	  <option value="2019">2019</option>
                                                    	</select>
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
    <script src="../../assets/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="../../assets/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="../../assets/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="../../assets/js/jquery.countTo.js"></script>

    <!-- Stellar Parallax -->
    <script src="../../assets/js/jquery.stellar.min.js"></script>

    <!-- Magnific Popup -->
    <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/../../assets/js/magnific-popup-options.js"></script>

    <script src="../../assets/js/moment.min.js"></script>
    <script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>


    <!-- Main -->
    <script src="../../assets/js/main.js"></script>

	</body>
</html>
