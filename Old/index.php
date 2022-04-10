<?php

if(isset($_GET["idPengajian"])) {

  $idPengajian = $_GET["idPengajian"];

}

$conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");

$listPengajian = $conn->query("SELECT * FROM pengajian");

if($listPengajian->num_rows <= 0)
  die("Tidak ada pengajian terdaftar.");

$listPengajian = $listPengajian->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
 <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ABSENSI</title>
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
 </head>

 <body>

    <!-- <div class="page-inner"> -->
    <nav class="gtco-nav" role="navigation">
      <div class="gtco-container">

        <div class="row">
          <div class="col-sm-4 col-xs-12">
            <div id="gtco-logo"><a href="index.php">GAMA</a></div>
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
              <div style="margin-top: 200px" class="col-md-15 mt-text animate-box" data-animate-effect="fadeInUp">
                <?php
                  foreach($listPengajian as $v) {
                ?>
                <center><a href="http://geelia.space/mm/absensi-pengajian.php?idPengajian=<?php echo $v["id"] ?>"<h2 style="font-size: 45px" class="cursive-font"><?php echo $v["namaPengajian"] ?></h2> </center>
                <?php } ?>
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


<script>
  $(document).ready(function(){
   $.ajaxSetup({ cache: false });
   $('#search').keyup(function(){
    $('#result').html('');
    $('#state').val('');
    var searchField = $('#search').val();
    var expression = new RegExp(searchField, "i");
    $.getJSON('data.json', function(data) {
     $.each(data, function(key, value){
      if (value.name.search(expression) != -1 || value.desa.search(expression) != -1 || value.kelompok.search(expression) != -1)
      {
       /*$('#result').append('<li class="list-group-item link-class"> </> '+value.name+' | <span class="text-muted">'+value.kelompok+', <span class="text-muted">'+value.desa+'</li>');*/
       $('#result').append('<li class="list-group-item link-class">'+value.name+' | '+value.kelompok+', <span class="text-muted">'+value.desa+'</span></li>');
      }
     });
    });
   });

   $('#result').on('click', 'li', function() {
    var click_text = $(this).text().split('|');
    $('#search').val($.trim(click_text[0]));
    $("#result").html('');
   });
  });
  </script>
