<?php
require 'function.php';

$listPengajian = $conn->query("SELECT * FROM pengajian");

if($listPengajian->num_rows <= 0)
	die("Tidak ada pengajian terdaftar.");

$listPengajian = $listPengajian->fetch_all(MYSQLI_ASSOC);

$query = isset($_GET["idPengajian"]) ? "SELECT * FROM kehadiran WHERE idPengajian = '$_GET[idPengajian]'" : "SELECT * FROM kehadiran";
$data = query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>KEHADIRAN</title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="library/datatable/DataTables-1.10.18/css/jquery.dataTables.min.css"/.>
	<script src="library/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>


	<script>

		function startAjax(defaultTableContent) {

			$("#table").html = defaultTableContent;

			setTimeout(() => {

				$.ajax({
					url: "API/kehadiran.php?<?php if(isset($_GET["idPengajian"])) echo "idPengajian=" . $_GET["idPengajian"] ?>"
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
								"<td>" + v.kelompok + "</td>" +
								"<td>" + v.desa + "</td>" +
								"<td>" + v.tanggal + "</td>" +
								"<td>" + v.time + "</td>" +
							"</tr>"

						})

						$("#tbody").html(htmlContent);
						$("#table").DataTable();

						// jumlah pria/perempuan
						$("#totalPria").html("Total Pria: " + jsonResponse["totalPria"])
						$("#totalPerempuan").html("Total Perempuan: " + jsonResponse["totalPerempuan"])

						$("#totalBjr").html("Total Banjaran: " + jsonResponse["totalBanjaran"])
						$("#totalBe").html("Total Baleendah: " + jsonResponse["totalBaleendah"])
						$("#totalCpr").html("Total Ciparay: " + jsonResponse["totalCiparay"])
						$("#totalSyt").html("Total Sayati: " + jsonResponse["totalSayati"])
						$("#totalSrg").html("Total Soreang: " + jsonResponse["totalSoreang"])
						$("#totalMjy").html("Total Majalaya: " + jsonResponse["totalMajalaya"])

						var total = parseInt(jsonResponse["totalPerempuan"]) + parseInt(jsonResponse["totalPria"]);

						$("#total").html("Total Semua: " + total)

						startAjax();

					}

				})

			}, 300)

		}

		var json = JSON.parse("{}");

		$(document).ready(function() {

			var defaultTableContent = $("#table").html;

			startAjax(defaultTableContent);

		})

	</script>
</head>
<body>

	<form action="">
		<select name="idPengajian">
			<option disabled selected>Pilih Pengajian</option>
			<?php
				foreach($listPengajian as $v) {
			?>
				<option value="<?php echo $v["id"] ?>" <?php if(isset($_GET["idPengajian"])) if($_GET["idPengajian"] == $v["id"]) echo "selected"; ?>><?php echo $v["namaPengajian"]; ?></option>
			<?php } ?>
		</select>
		<input type="submit" value="Cek Kehadiran">
	</form>

	<span id="total">Total Semua: </span>
	<span id="totalPria">Total Pria: </span>
	<span id="totalPerempuan">Total Perempuan: </span>

	<span id="totalBjr">Total Banjaran: </span>
	<span id="totalBe">Total Baleendah: </span>
	<span id="totalCpr">Total Ciparay: </span>
	<span id="totalSyt">Total Sayati: </span>
	<span id="totalSrg">Total Soreang: </span>
	<span id="totalMjy">Total Majalaya: </span>


	<table border="1" cellpadding="10" cellspacing="0" id="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th >Gender</th>
				<th>Kelompok</th>
				<th>Desa</th>
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
			<td><?= $row["kelompok"]; ?></td>
			<td><?= $row["desa"]; ?></td>
			<td><?= $row["tanggal"]; ?></td>
			<td><?= $row["time"]; ?></td>
		</tr>

		<?php $i++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
	<script>
		// $(document).ready(function() {
		// 	$("#table").DataTable();
		// })
	</script>
</body>
</html>
