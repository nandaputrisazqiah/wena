<?php

  if(!empty($_POST["jenis"])){

    $con = new mysqli("localhost", "root", "", "wena");

    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    }

    $stmt = $con->prepare("SELECT  FROM biaya WHERE id_biaya = ?");
    $stmt->bind_param("i", $_POST["id_biaya"]); 
    $stmt->execute(); 
    $stmt->bind_result($biaya); 
    $stmt->fetch(); 
    $stmt->close(); 

    echo json_encode(array("biaya" => $biaya));

  }

?>
