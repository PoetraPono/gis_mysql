<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_smk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM perguruan_tinggi where jenis='Swasta'";
$result = $conn->query($sql);
$dbdata = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $sekolah[] = array(
            'id_sekolah' => $row['id_sekolah'],
            'nama_sekolah' => $row['nama_sekolah'],
            'alamat' => $row['alamat'],
            'x' => $row['x'],
            'y' => $row['y'],
            'jenis' => $row['jenis'],
            'foto' => $row['foto']
            );
    }
	     // set response
	 $response = array(
	  'type'=>'FeatureCollection',
	  'features'=>array()
	 );
			 // loop marker
		 foreach ($sekolah as $key=>$val) {
		  $id_sekolah = (int) $val['id_sekolah'];
		  $nama_sekolah = $val['nama_sekolah'];
		  $alamat = $val['alamat'];
		  $x = $val['x'];
		  $y = $val['y'];
		  $jenis = $val['jenis'];
		  $foto = base64_encode($val['foto']);

		  // set properties
		  $properties = array(
		   'No'=>$id_sekolah,
		   'Nama_Sekol'=>$nama_sekolah,
		   'Alamat' => $alamat,
            'X' => (int)$x,
            'Y' => (int)$y,
            'Jenis' => $jenis,
            'Foto' => $foto,
		  );

		  // push data to features
		  array_push($response['features'], array(
		   'type'=>'Feature',
		   'geometry'=>array(
		    'type'=>'Point',
		    'coordinates'=>array((double)$y,(double)$x)
		   ),
		   'properties'=>$properties
		  ));
		 }

 // set response JSON
 		header('Content-Type: application/json');

 	echo json_encode($response);
    //echo json_encode($sekolah);
} else {
    echo "0 results";
}
$conn->close();
?>
