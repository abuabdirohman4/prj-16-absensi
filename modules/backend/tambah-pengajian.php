<?php

require '../../config/function.php';

if(isset($_POST["namaPengajian"])) {

  $namaPengajian = $_POST["namaPengajian"];

  $pengajianBaru = $conn->query("INSERT INTO pengajian (namaPengajian) VALUES ('$namaPengajian')");

  if($pengajianBaru)
    echo "Success";

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah Pengajian</title>
  </head>
  <body>

    <form class="" action="" method="post">
      <input type="text" name="namaPengajian" placeholder="Nama Pengajian"/>
      <input type="submit" value="Submit"/>
    </form>
    
    <br/>
    <div><a href="admin.php">KEMBALI KE HALAMAN ADMIN</a></div>

  </body>
</html>
