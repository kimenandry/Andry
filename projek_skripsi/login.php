<?php
	require_once 'koneksi.php';
	
	if ($con) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/*Membuat query untuk ke localhost myadmin*/
		$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($con, $query);
		$response = array();
		
		/*Membuat variabel baris atau rows dari result*/
		$row = mysqli_num_rows($result);
		if ($row > 0) {
			array_push($response, array(
				'status' => 'OK'
			));
		} else {
			array_push($response, array(
				'status' => 'FAILED'
			));
		}
	} else {
		array_push($response, array(
				'status' => 'FAILED'
			));
	}
	
	echo json_encode(array("server_response" => $response));
	mysqli_close($con);
?>