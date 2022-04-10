<?php

require '../function.php';

$listPengajian = $conn->query(isset($_GET["idPengajian"]) ? "SELECT * FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]'" : "SELECT * FROM kehadiran");
$totalPria = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as totalPria FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND gender='L'" : "SELECT * FROM kehadiran WHERE gender='L'");
$totalPerempuan = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as totalPerempuan FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND gender='P'" : "SELECT * FROM kehadiran WHERE gender='P'");
$totalBjr = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND desa='BANJARAN'" : "SELECT COUNT(*) as total FROM kehadiran WHERE desa='BANJARAN'");
$totalBe = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND desa='BALEENDAH'" : "SELECT COUNT(*) as total FROM kehadiran WHERE desa='BALEENDAH'");
$totalCpr = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND desa='CIPARAY'" : "SELECT COUNT(*) as total FROM kehadiran WHERE desa='CIPARAY'");
$totalSyt = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND desa='SAYATI'" : "SELECT COUNT(*) as total FROM kehadiran WHERE desa='SAYATI'");
$totalSrg = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND desa='SOREANG'" : "SELECT COUNT(*) as total FROM kehadiran WHERE desa='SOREANG'");
$totalMjy = $conn->query(isset($_GET["idPengajian"]) ? "SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND desa='MAJALAYA'" : "SELECT COUNT(*) as total FROM kehadiran WHERE desa='MAJALAYA'");
$data = array();

if($listPengajian->num_rows <= 0)
	die("nothing");

$listPengajian = $listPengajian->fetch_all(MYSQLI_ASSOC);

$data["data"] = $listPengajian;
$data["totalPria"] = $totalPria->fetch_assoc()["totalPria"];
$data["totalPerempuan"] = $totalPerempuan->fetch_assoc()["totalPerempuan"];;

$data["totalBanjaran"] = $totalBjr->fetch_assoc()["total"];;
$data["totalBaleendah"] = $totalBe->fetch_assoc()["total"];;
$data["totalCiparay"] = $totalCpr->fetch_assoc()["total"];;
$data["totalSayati"] = $totalSyt->fetch_assoc()["total"];;
$data["totalSoreang"] = $totalSrg->fetch_assoc()["total"];;
$data["totalMajalaya"] = $totalMjy->fetch_assoc()["total"];;

echo json_encode($data);

 ?>
