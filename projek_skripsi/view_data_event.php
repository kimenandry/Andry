<?php
	require_once 'koneksi.php';
	
	if($con){
		$query = "SELECT * FROM tbl_event";
		$result = mysqli_query($con, $query);
		$row = mysqli_num_rows($result);
		$response = array(
			'status' => "",
			'data' => array(),
		);
		
		
		if ($row > 0) {
			$hasil = array();
			
			while($col = mysqli_fetch_assoc($result)) {
				$event = array(
					'id' => $col['id'],
					'namaEvent' => $col['namaEvent'],
					'tanggalMulai' => $col['tanggalMulai'],
					'tanggalSelesai' => $col['tanggalSelesai'],
                    'deskripsiEvent' => $col['deskripsiEvent']
				);
				$hasil[$col['id']] = $event;
				$response['status'] = "Berhasil";
				$response['data'] = $hasil;
			}
		}
	} else {
		$response['status'] = "Gagal Koneksi";
	}
	
	echo json_encode($response);
	mysqli_close($con);
		
?>