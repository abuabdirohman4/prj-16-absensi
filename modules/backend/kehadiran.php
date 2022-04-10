<?php
require '../../config/function.php';

$listPengajian = $conn->query("SELECT * FROM pengajian");

if($listPengajian->num_rows <= 0)
	die("Tidak ada pengajian terdaftar.");

$listPengajian = $listPengajian->fetch_all(MYSQLI_ASSOC);

$query = isset($_GET["idPengajian"]) ? "SELECT * FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]' ORDER BY id DESC" : "SELECT * FROM kehadiran ORDER BY id DESC";
$data = query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>KEHADIRAN</title>
	<script src="../../assets/js/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<link rel="stylesheet" href="../../assets/library/datatable/DataTables-1.10.18/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../../assets/library/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
	
	<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />-->

    <!--<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>-->


	<script>
    
        var cekOtomatis = true;
        
		function startAjax(defaultTableContent) {

			$("#table").html = defaultTableContent;

            if(cekOtomatis)
    			setTimeout(() => {
                    
    				$.ajax({
    					url: "../../assets/API/kehadiran.php?<?php if(isset($_GET["idPengajian"])) echo "idPengajian=" . $_GET["idPengajian"] ?>"
    				}).done((res) => {
    
    					var jsonResponse = JSON.parse(res);
    
    					if(json != jsonResponse) {
    
    						$("tbody").html = "";
    						var htmlContent = "";
    
    						$.each(jsonResponse["data"], (k, v) => {
    
    							htmlContent += "<tr>" +
    								"<td>" + (k+1) + "</td>" +
    								"<td>" + v.nama + "</td>" +
    								"<td>" + v.gender + "</td>" +
    								"<td>" + v.angkatan + "</td>" +
    								"<td>" + v.kelompok + "</td>" +
    								"<td>" + v.desa + "</td>" +
    								"<td>" + v.daerah + "</td>" +
    								"<td>" + v.tanggal + "</td>" +
    								"<td>" + v.time + "</td>" +
    							"</tr>"
    
    						})
    
    						$("#tbody").html(htmlContent);
    						$("#table").DataTable();
    
    						// jumlah pria/perempuan
    						$("#total-peserta").html(jsonResponse["total"])
    						$("#total-pria").html(jsonResponse["totalPria"])
    						$("#total-pr").html(jsonResponse["totalPerempuan"])
    
    						$("#total-bs2").html(jsonResponse["totalBS2"])
    						$("#total-bs2-pria").html(jsonResponse["totalBS2_L"])
                            $("#total-bs2-pr").html(jsonResponse["totalBS2_P"])
                            
    						$("#total-bs1").html(jsonResponse["totalBS1"])
    						$("#total-bs1-pria").html(jsonResponse["totalBS1_L"])
                            $("#total-bs1-pr").html(jsonResponse["totalBS1_P"])
    						
    						$("#total-bt").html(jsonResponse["totalBT"])
    						$("#total-bt-pria").html(jsonResponse["totalBT_L"])
                            $("#total-bt-pr").html(jsonResponse["totalBT_P"])
    						
    						$("#total-bu").html(jsonResponse["totalBU"])
    						$("#total-bu-pria").html(jsonResponse["totalBU_L"])
                            $("#total-bu-pr").html(jsonResponse["totalBU_P"])
    						
    						$("#total-bb").html(jsonResponse["totalBB"])
    						$("#total-bb-pria").html(jsonResponse["totalBB_L"])
                            $("#total-bb-pr").html(jsonResponse["totalBB_P"])

    						$("#total-tua").html(jsonResponse["totalTua"])
    						$("#total-muda").html(jsonResponse["totalMuda"])

    						var total = parseInt(jsonResponse["totalPerempuan"]) + parseInt(jsonResponse["totalPria"]);
    
    						$("#total").html("<b>Total Semua:</b> " + total)
    
    						startAjax();
    
    					}
    
    				})
    
    			}, 300)

		}

		var json = JSON.parse("{}");

		$(document).ready(function() {

			var defaultTableContent = $("#table").html;

			startAjax(defaultTableContent);
            
            $("#cekOtomatis").click(function(e) {
            
                e.preventDefault()
                
                if(cekOtomatis) {
                    cekOtomatis = false;
                    $("#cekOtomatis").html("Cek data masuk otomatis: OFF")
                    $("#cekOtomatis").addClass("btn-secondary")
                    $("#cekOtomatis").removeClass("btn-success")
                } else {
                    cekOtomatis = true;
                    $("#cekOtomatis").html("Cek data masuk otomatis: ON")
                    
        	    	var defaultTableContent = $("#table").html;
    			    startAjax(defaultTableContent);
                    $("#cekOtomatis").addClass("btn-success")
                    $("#cekOtomatis").removeClass("btn-secondary")
                }
            
            })    
            
            $("#back-button").click(() => { window.location = "admin.php"})
            
		})

	</script>
	<style>
	    #summary * {
	        justify-content: center;
	    }
	    #summary {
            margin: 24px 0;
            font-size: 20px;
        }
        #summary .col {
            padding: 20px 10px;
        }
        .summary-title {
            font-size: small;
        }
	</style>
</head>
<body>

    <!-- As a heading -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <ion-icon id="back-button" name="arrow-round-back" style="margin-right: 15px;"></ion-icon>
      <span class="navbar-brand mb-0 h1">Laporan</span>
    </a>
  </nav>
    
    <div class="container" style="padding-top: 25px">
        
        <form action="" style="margin-bottom: 10px">
            <div class="row" style="margin-left:0">
                <div class="" style="margin-right:10px">
                    <select name="idPengajian" class="form-control">
            			<option disabled selected>Pilih Pengajian</option>
            			<?php
            				foreach($listPengajian as $v) {
            			?>
            				<option value="<?php echo $v["id"] ?>" <?php if(isset($_GET["idPengajian"])) if($_GET["idPengajian"] == $v["id"]) echo "selected"; ?>><?php echo $v["namaPengajian"]; ?></option>
            			<?php } ?>
            		</select>
        		</div>
                <div class="" style="margin-right:10px">
        		    <input type="submit" value="Cek Kehadiran" class="btn btn-primary">
    		    </div>
                <div class="" style="margin-right:10px">
        		    <button type="button" id="cekOtomatis" class="btn btn-success">Cek data masuk otomatis: ON</button>
    		    </div>
            </div>
    		
    	</form>
        
        <div id="summary" class="container">
            <div class="row">
                <div class="col" style="background: #a0edff">
                    <div class="row summary-title">
                        Total peserta
                    </div>
                    <div class="row" id="total-peserta">
                        1400
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background: #bbffa0">
                    <div class="row summary-title">
                        Laki-laki
                    </div>
                    <div class="row" id="total-pria">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #ffa0a0">
                    <div class="row summary-title">
                        Perempuan
                    </div>
                    <div class="row" id="total-pr">
                        1400
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background: #ffa0b5">
                    <div class="row summary-title">
                        BANUT
                    </div>
                    <div class="row" id="total-bu">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #f5a0ff">
                    <div class="row summary-title">
                        BANTIM
                    </div>
                    <div class="row" id="total-bt">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #a0a2ff">
                    <div class="row summary-title">
                        BANBAR
                    </div>
                    <div class="row" id="total-bb">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #a0ffcf">
                    <div class="row summary-title">
                        BANSEL1
                    </div>
                    <div class="row" id="total-bs1">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #fdffa0">
                    <div class="row summary-title">
                        BANSEL2
                    </div>
                    <div class="row" id="total-bs2">
                        1400
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background: #f9ffa0">
                    <div class="row summary-title">
                        L
                    </div>
                    <div class="row" id="total-bu-pria">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #ffd5a0">
                    <div class="row summary-title">
                        P
                    </div>
                    <div class="row" id="total-bu-pr">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #f9ffa0">
                    <div class="row summary-title">
                        L
                    </div>
                    <div class="row" id="total-bt-pria">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #ffd5a0">
                    <div class="row summary-title">
                        P
                    </div>
                    <div class="row" id="total-bt-pr">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #f9ffa0">
                    <div class="row summary-title">
                        L
                    </div>
                    <div class="row" id="total-bb-pria">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #ffd5a0">
                    <div class="row summary-title">
                        P
                    </div>
                    <div class="row" id="total-bb-pr">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #f9ffa0">
                    <div class="row summary-title">
                        L
                    </div>
                    <div class="row" id="total-bs1-pria">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #ffd5a0">
                    <div class="row summary-title">
                        P
                    </div>
                    <div class="row" id="total-bs1-pr">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #f9ffa0">
                    <div class="row summary-title">
                        L
                    </div>
                    <div class="row" id="total-bs2-pria">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #ffd5a0">
                    <div class="row summary-title">
                        P
                    </div>
                    <div class="row" id="total-bs2-pr">
                        1400
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background: #bbffa0">
                    <div class="row summary-title">
                        Angkatan Muda
                    </div>
                    <div class="row" id="total-muda">
                        1400
                    </div>
                </div>
                <div class="col" style="background: #ffa0a0">
                    <div class="row summary-title">
                        Angkatan Tua
                    </div>
                    <div class="row" id="total-tua">
                        1400
                    </div>
                </div>
            </div>
        </div>
    
    	<table border="1" cellpadding="10" cellspacing="0" id="table">
    		<thead>
    			<tr>
    				<th>No.</th>
    				<th>Nama</th>
    				<th>Gender</th>
    				<th>Angkatan</th>
    				<th>Kelompok</th>
    				<th>Desa</th>
    				<th>Daerah</th>
    				<th>Tanggal</th>
    				<th>Waktu</th>
    
    			</tr>
    		</thead>
    		<tbody id="tbody">
    		<?php $i = 1; ?>
    		<?php
    
    		if(isset($_GET["idPengajian"]))
    		foreach($data as $row): ?>
    
    		<tr>
    			<td><?= $i; ?></td>
    			<td><?= $row["nama"]; ?></td>
    			<td><?= $row["gender"]; ?></td>
    			<td><?= $row["angkatan"]; ?></td>
    			<td><?= $row["kelompok"]; ?></td>
    			<td><?= $row["desa"]; ?></td>
    			<td><?= $row["daerah"]; ?></td>
    			<td><?= $row["tanggal"]; ?></td>
    			<td><?= $row["time"]; ?></td>
    		</tr>
    
    		<?php $i++; ?>
    		<?php endforeach; ?>
    		</tbody>
    	</table>
	
        
    </div>
	
	<script>
		$(document).ready(function() {
			$("#table").DataTable();
		})
	</script>
</body>
</html>
