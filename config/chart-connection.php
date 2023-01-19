<?php
  $conn = mysqli_connect("localhost","root","","eka_magang");
  $query = "SELECT DATE(tanggal_masuk) as date, COUNT(*) as total FROM dokumen WHERE tanggal_masuk BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() GROUP BY DATE(tanggal_masuk)";
  $result = mysqli_query($conn, $query);
  $data = array();
  while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
  }

  $max = max(array_column($data, 'total'));
  json_encode(array('data'=>$data, 'max'=>$max));
  // echo json_encode($data);
?>
