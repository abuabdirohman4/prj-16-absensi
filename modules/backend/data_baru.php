<?php
require '../../config/function.php';
$data = query("SELECT * FROM registrasi");
?>

<!DOCTYPE html>
<html>
<head>
	<title>DATA BARU</title>
</head>
<body>

    <div><a href="admin.php">KEMBALI KE HALAMAN ADMIN</a></div>
    <br/>
	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>Desa</th>
			<th>Kelompok</th>
		</tr>

	<?php $i = 1; ?>
	<?php foreach($data as $row): ?>

	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["gender"]; ?></td>
		<td><?= $row["desa"]; ?></td>
		<td><?= $row["kelompok"]; ?></td>
	</tr>

	<?php $i++; ?>
	<?php endforeach; ?>

	</table>
</body>
</html>