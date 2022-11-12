<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_sewalap";


	$conn = new mysqli($servername, $username, $password, $dbname);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$id = $_POST["id"];
	$action = $_POST["action"];
	$namaEvent = $_POST["namaEvent"];
	$tanggalMulai = $_POST["tanggalMulai"];
    $tanggalSelesai = $_POST["tanggalSelesai"];
    $deskripsiEvent = $_POST["deskripsiEvent"];
	
	
	switch ($action) {
	case 'addEvent':
		$sql = "INSERT INTO tbl_event (namaEvent, tanggalMulai, tanggalSelesai, deskripsiEvent) VALUES ('$namaEvent', '$tanggalMulai', '$tanggalSelesai', '$deskripsiEvent')";
		if ($conn->query($sql) === TRUE) {
  			echo "Event Berhasil ditambahkan";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}
			$conn->close();
		break;

	case 'editEvent':
		$sql = "UPDATE tbl_event set namaEvent = '$namaEvent', tanggalMulai='$tanggalMulai', tanggalSelesai='$tanggalSelesai', deskripsiEvent='$deskripsiEvent'  WHERE id = ' $id'";
		if ($conn->query($sql) === TRUE) {
  			echo "Event Berhasil diedit";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}
			$conn->close();
		break;

	case 'deleteBooking':
		$sql = "DELETE FROM tbl_event WHERE id = ".$_POST["id"];
		if ($conn->query($sql) === TRUE) {
  			echo "Event Berhasil dihapus";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}
			$conn->close();
		break;
	
	default:
		break;
	}
?>