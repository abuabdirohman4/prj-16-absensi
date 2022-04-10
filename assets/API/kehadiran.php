<?php

require '../../config/function.php';

if(isset($_GET["idPengajian"])) {
    
    $listPengajian = $conn->query("SELECT * FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' ORDER BY id DESC");
    
    $total = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]'");
    
    $totalPria = $conn->query("SELECT COUNT(*) as totalPria FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND gender='L'");
    $totalPerempuan = $conn->query("SELECT COUNT(*) as totalPerempuan FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND gender='P'");
    
    $totalBS1 = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BS1'");
    $totalBS1_L = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BS1' AND gender='L'");
    $totalBS1_P = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BS1' AND gender='P'");
    
    $totalBS2 = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BS2'");
    $totalBS2_L = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BS2' AND gender='L'");
    $totalBS2_P = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BS2' AND gender='P'");
    
    $totalBU = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BU'");
    $totalBU_L = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BU' AND gender='L'");
    $totalBU_P = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BU' AND gender='P'");
    
    $totalBT = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BT'");
    $totalBT_L = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BT' AND gender='L'");
    $totalBT_P = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BT' AND gender='P'");
    
    $totalBB = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BB'");
    $totalBB_L = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BB' AND gender='L'");
    $totalBB_P = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND daerah='BB' AND gender='P'");
    
    $totalMuda = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND angkatan <= 2017");
    $totalTua = $conn->query("SELECT COUNT(*) as total FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' AND angkatan > 2017");
    
    $data = array();
    
    if($listPengajian->num_rows <= 0)
    	die("nothing");
    
    $listPengajian = $listPengajian->fetch_all(MYSQLI_ASSOC);
    
    $data["data"] = $listPengajian;
    $data["total"] = $total->fetch_assoc()["total"];
    $data["totalPria"] = $totalPria->fetch_assoc()["totalPria"];
    $data["totalPerempuan"] = $totalPerempuan->fetch_assoc()["totalPerempuan"];;
    
    $data["totalBS1"] = $totalBS1->fetch_assoc()["total"];
    $data["totalBS1_L"] = $totalBS1_L->fetch_assoc()["total"];
    $data["totalBS1_P"] = $totalBS1_P->fetch_assoc()["total"];
    
    $data["totalBS2"] = $totalBS2->fetch_assoc()["total"];
    $data["totalBS2_L"] = $totalBS2_L->fetch_assoc()["total"];
    $data["totalBS2_P"] = $totalBS2_P->fetch_assoc()["total"];
    
    $data["totalBU"] = $totalBU->fetch_assoc()["total"];
    $data["totalBU_L"] = $totalBU_L->fetch_assoc()["total"];
    $data["totalBU_P"] = $totalBU_P->fetch_assoc()["total"];
    
    $data["totalBT"] = $totalBT->fetch_assoc()["total"];
    $data["totalBT_L"] = $totalBT_L->fetch_assoc()["total"];
    $data["totalBT_P"] = $totalBT_P->fetch_assoc()["total"];
    
    $data["totalBB"] = $totalBB->fetch_assoc()["total"];
    $data["totalBB_L"] = $totalBB_L->fetch_assoc()["total"];
    $data["totalBB_P"] = $totalBB_P->fetch_assoc()["total"];

    $data["totalTua"] = $totalTua->fetch_assoc()["total"];
    $data["totalMuda"] = $totalMuda->fetch_assoc()["total"];

    echo json_encode($data);
    
} else {
    
    $r = array();
    $r["status"] = "no_param";
    echo json_encode($r);
    
}

 ?>
