<?php 

// Development
$conn = mysqli_connect("localhost", "root", "root", "prj-16-absensi-gama");

// Production
// $conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}

?>