<?php
	require_once 'koneksi.php';
	
	if ($con) {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		$insert = "INSERT INTO tbl_user(nama, telepon, username, password , email) VALUES ('$nama', '$telepon', '$username', '$password', '$email')";
		
		if($nama != "" && $telepon != "" && $username != "" &&  $password != "" && $email != "") {
			$result = mysqli_query($con, $insert);
			$response = array();
			
			if($result) {
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
	} else {
		array_push($response, array(
			'status' => 'FAILED'
		));
	}
	
	echo json_encode(array("server_response" => $response));
	mysqli_close($con);
?>