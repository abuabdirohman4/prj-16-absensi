<?php

if(!isset($_GET["idPengajian"])) {
	// error
	die("Pengajian tidak ditemukan.");
}

$idPengajian = $_GET["idPengajian"];

$conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");

if ( isset($_POST["submit"]) ){

	$nama = $_POST["nama"];
	$jurusan = $_POST["jurusan"];
	$line = $_POST["line"];
	$hp = $_POST["hp"];
	$alamat = $_POST["alamat"];
	$asal = $_POST["asal"];
	$ortu = $_POST["ortu"];
	$hp_ortu = $_POST["hp_ortu"];

	$query = "INSERT INTO registrasi
				VALUES
				('', '$nama', '$jurusan', '$line', '$hp', '$alamat', '$asal', '$ortu', '$hp_ortu')
			";
	mysqli_query($conn, $query);

	if( mysqli_affected_rows($conn) > 0 ) {
		echo "
			<script>
				alert('Selamat Registrasi Anda Berhasil')
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf Registrasi Gagal')
			</script>
		";
		echo mysqli_error($conn);
	}
}

?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registrasi</title>
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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body onload="stateChange(5000)">

	<div class="gtco-loader"></div>

	<div id="page">

	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="login.php">GAMA</a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<div id="gtco-logo"><a href="login.php">Bandung Selatan 2</a></div>
				</div>
			</div>

		</div>
	</nav>
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(../../assets/../../assets/background/abcd.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-14 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
						<div class="col-md-15 mt-text animate-box" data-animate-effect="fadeInUp">
							<center><h2 style="font-size: 28px" class="cursive-font">SELAMAT MENGAJI!!</h2></center>
							<center><h2 style="font-size: 28px" class="cursive-font">FAHAMKAN DIRI!! BERANI AMAR MA'RUF</h2></center>
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
	<script src="../../assets/../../assets/js/jquery.easing.1.3.js"></script>
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
	<script src="j../../assets/../../assets/s/magnific-popup-options.js"></script>

	<script src="../../assets/js/moment.min.js"></script>
	<script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
		function stateChange(newState) {
			console.log(newState);
			setTimeout(function() {
			    location.href = 'absensi-pengajian.php?<?php if(isset($_GET["idPengajian"])) echo "idPengajian=$idPengajian"?>';
			}, 2000);
		}
	</script>

	<!-- Main -->
	<script src="../../assets/js/main.js"></script>


	</body>
</html>
