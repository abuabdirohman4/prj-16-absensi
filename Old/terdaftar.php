<?php
require 'function.php';
$data = query("SELECT * FROM terdaftar");
?>

<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR MUDA-MUDI ABCD</title>
</head>
<body>

	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>Kelompok</th>
			<th>Desa</th>
		</tr>

	<?php $i = 1; ?>
	<?php foreach($data as $row): ?>

	<tr>
		<td><?= $i; ?></td>

		<td><?= $row["nama"]; ?></td>
		<td><?= $row["gender"]; ?></td>
		<td><?= $row["kelompok"]; ?></td>
		<td><?= $row["desa"]; ?></td>
	</tr>

	<?php $i++; ?>
	<?php endforeach; ?>

	</table>
</body>
</html>