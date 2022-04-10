<?php

$conn = mysqli_connect("localhost", "u7714918_abu", "Abu3546210", "u7714918_infoabcd");

$data = $conn->query("SELECT * FROM terdaftar");
$r = array();

if($data->num_rows > 0) {
    
    $data = $data->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);

} else {
    
    $r["status"] = "no_data";
    echo json_encode($r);
    
}

?>