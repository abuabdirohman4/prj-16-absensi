<?php

if(!isset($_POST["idPengajian"])) {

  die("noIdPengajian");

}

$idPengajian = $_POST["idPengajian"];

$conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");
$namad = "";
$gender = "";

$dataPengajian = $conn->query("SELECT * FROM pengajian WHERE id = '$idPengajian'");

if($dataPengajian->num_rows <= 0) {
  // halaman error
  echo "Pengajian tidak ditemukan.";
  die();
}

$dataPengajian = $dataPengajian->fetch_array(MYSQLI_ASSOC);

if ( isset($_POST["idPengajian"]) ){
  $date = date('Y-m-d H:i:s');
  date_default_timezone_set("Asia/Jakarta");
  $time = date("h:i:sa");

  $result = mysqli_query($conn, "SELECT * FROM terdaftar");
  $nama = ($_POST["nama"] != "undefined" ? $conn->real_escape_string($_POST["nama"]) : "");
  $kelompok = ($_POST["kelompok"] != "undefined" ? $_POST["kelompok"] : "");
  $desa = ($_POST["desa"] != "undefined" ? $_POST["desa"] : "");
  $daerah = ($_POST["daerah"] != "undefined" ? $_POST["daerah"] : "");
  $gender = ($_POST["gender"] != "undefined" ? $_POST["gender"] : "");
  $angkatan = ($_POST["angkatan"] != "undefined" ? $_POST["angkatan"] : "");

  // check existence
  $exist = $conn->query("SELECT * FROM kehadiran WHERE nama = '$nama' AND kelompok='$kelompok' AND desa='$desa' AND idPengajian='$idPengajian'");

  if($exist->num_rows <= 0){
      
      $query = $conn->query("INSERT INTO kehadiran VALUES ('', '$idPengajian', '$nama','$date','$time','$kelompok','$desa', '$daerah', '$gender', '$angkatan')");
      
      if(!!$query)
        echo "success";
      else
        echo "fail_insert_error_" . $conn->error;
        
  }else{
      echo "duplicate";
    }
}

?>