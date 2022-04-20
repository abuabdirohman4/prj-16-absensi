<?php

require '../../config/function.php';

if(!isset($_GET["idPengajian"])) {

  header("Location: ../../index.php");
  die();

}

$idPengajian = $_GET["idPengajian"];

// Development
// $conn = mysqli_connect("localhost", "root", "root", "prj-16-absensi-gama");

// Production
// $conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");

$a = 0;
$namad = "";
$gender = "";

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

  $result = mysqli_query($conn, "SELECT * FROM terdaftar");
  $nama = $conn->real_escape_string($_POST["nama"]);
  while($row = mysqli_fetch_assoc($result)) {
    if (strtolower($row["nama"]) == strtolower($nama)){
      $a = 1;
      $namad=$row["nama"];
      $kelompok=$row["kelompok"];
      $desa=$row["desa"];
      $gender=$row["gender"];
    }
  }

  // check existence
  $exist = $conn->query("SELECT * FROM kehadiran WHERE nama = '$namad' AND idPengajian='$idPengajian'");

  if($a == 1 && $exist->num_rows <= 0){
      $query = "INSERT INTO kehadiran VALUES ('', '$idPengajian', '$namad','$date','$time','$kelompok','$desa', '$gender')";
      mysqli_query($conn, $query);
      ?><script type="text/javascript">location.href = 'berhasil_absen.php?idPengajian=<?php echo $dataPengajian["id"] ?>';</script><?php

  }else{
      ?><script type="text/javascript">location.href = 'absensi-pengajian.php?idPengajian=<?php echo $dataPengajian["id"] ?>';</script><?php
    }
}

?>

<!DOCTYPE html>
<html>
 <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
    #result {
     position: relative;
     width: 100%;
     max-width:1053px;
     cursor: pointer;
     overflow-y: scroll;
     max-height: 400px;
     box-sizing: border-box;
     z-index: 1001;
    }
    .link-class:hover{
     background-color:#e36565;
    }

    .list-group-item {
      position: relative;
      display: block;
      padding: 10px 15px;
      margin-bottom: -1px;
      background-color: transparent;
      border: 1px solid #0066cc;
    }
    </style>

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ABSENSI</title>
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

    <!-- Bootstrap DateTimePicker -->

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Modernizr JS -->
 </head>

 <body>

    <!-- <div class="page-inner"> -->
    <nav class="gtco-nav" role="navigation">
      <div class="gtco-container">

        <div class="row">
          <div class="col-sm-4 col-xs-12">
            <div id="gtco-logo"><a href=""><?php echo $dataPengajian["namaPengajian"] ?></a></div>
          </div>
          <div class="col-xs-8 text-right menu-1">
            <div id="gtco-logo"><a href="registration.php?idPengajian=<?php echo $dataPengajian["id"]?>">REGISTRASI BARU</a></div>
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
              <div style="margin-top: 200px" class="col-md-15 mt-text animate-box" data-animate-effect="fadeInUp">
                <center><h2 style="font-size: 59px" class="cursive-font">Silahkan Masukkan Nama Anda</h2> </center>
              </div>

              <div class="col-md-12 col-md-push-0 animate-box" data-animate-effect="fadeInRight">
                <div class="form-wrap">
                  <div class="tab">
                    <div class="tab-content">
                      <div class="tab-content-inner active" data-content="signup">
                        <div>
                          <div class="row form-group">
                            <div class="col-md-12">
                              <label for="nama">Nama</label>
                              <input type="text" name="nama" id="search" class="form-control" style="text-transform: uppercase" autocomplete="off">
                                <ul class="list-group" style="padding-left: 15px;" id="result"></ul>
                              <!--<div class="alert alert-danger alert-dismissible fade in">-->
                              <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                              <input type="hidden" id="kelompok" class="form-control" autocomplete="off"> 
                              <input type="hidden" id="desa" class="form-control" autocomplete="off"> 
                              <input type="hidden" id="gender" class="form-control" autocomplete="off"> 
                            </div>
                            </div>
                          </div>
                          <div class="row form-group">
                                <div class="col-md-12">
                            	    <label for="gender">Angkatan</label>
                                	<select id="angkatan" class="form-control">
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
                          <div class="row form-group">
                            <div class="col-md-12">
                              <button id="submit-form" class="btn btn-primary btn-block">Submit</button>
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


          </div>
        </div>
      </div>
    </header>

    <!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.min.js"></script>

 </body>

</html>


<script>

    var selectedName;
    var selectedKelompok;
    var selectedDesa;
    var selectedDaerah;
    var selectedGender;
    var selectedAngkatan;
    var fieldAngkatan;
    var data;

  $(document).ready(function(){
      
   $.ajaxSetup({ cache: false });
   
   $.getJSON('API/data_mahasiswa.php', function(res) {
    
        data = res;
    
    });
    
   $('#search').keyup(function(){
    
    if($("#search").val() == "") {
        $('#result').html('');
        return;
    }
       
    $('#result').html('');
    $('#state').val('');
    
    var searchField = $('#search').val();
    var expression = new RegExp(searchField, "i");
    
    $.each(data, function(key, value){
         
      if (value.Nama.search(expression) != -1 || value.Desa.search(expression) != -1 || value.Kelompok.search(expression) != -1)
      {
       /*$('#result').append('<li class="list-group-item link-class"> </> '+value.name+' | <span class="text-muted">'+value.kelompok+', <span class="text-muted">'+value.desa+'</li>');*/
       $('#result').append('<li class="list-group-item link-class" data-gender="' + value.Gender + '" data-name="' + value.Nama + '" data-kelompok="' + value.Kelompok + '" data-desa="' + value.Desa + '" data-daerah="' + value.Daerah + '" data-angkatan="' + value.Angkatan + '">'+value.Nama+' | '+ value.Kelompok+', ' + value.Desa + ', ' + value.Daerah + '</li>');
      }
      
     });
    
   });

   $('#result').on('click', 'li', function() {
       
    selectedName = $(this).attr("data-name")
    selectedKelompok = $(this).attr("data-kelompok")
    selectedDesa = $(this).attr("data-desa")
    selectedDaerah = $(this).attr("data-daerah")
    selectedGender = $(this).attr("data-gender")
    
    $('#search').val(selectedName + " | " + selectedKelompok + ", " + selectedDesa + ", " + selectedDaerah);
    
        $("#result").html('');
    
   });
   
   $("#submit-form").click(function() {
       
       $.ajax({
           method: "POST",
           url: "http://geelia.space/mm/modules/frontend/API/submit_absensi.php",
           data: {nama: selectedName, kelompok: selectedKelompok, desa: selectedDesa, daerah: selectedDaerah, angkatan: $("#angkatan").val(), gender: selectedGender, idPengajian: <?php echo $idPengajian ?>},
       }).success(function(res) {
           alert(res)
            if(res == "success") {
                alert("Berhasil submit presensi")
                $("#search").val("")
                selectedName = ""
                selectedKelompok = ""
                selectedDesa = ""
                selectedDaerah = ""
                selectedAngkatan = ""
                selectedGender = ""
            }
            else if(res == "duplicate") {
                alert("Anda sudah absensi")
                $("#search").val("")
                selectedName = ""
                selectedKelompok = ""
                selectedDesa = ""
                selectedDaerah = ""
                selectedAngkatan = ""
                selectedGender = ""
            } else {
                alert("Terjadi kesalahan. Segera hubungi mas-mas yg jaga!!!")
            }
               
       })
       
   })
   
  });
  </script>
