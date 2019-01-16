<?php
    $key=$_GET['cari'];
    $array = array();
    $con=mysqli_connect("localhost","root","","db_smk");

    $query = "(select * from smk where nama_sekolah LIKE '%{$key}%')
           UNION
           (select * from perguruan_tinggi where nama_sekolah LIKE '%{$key}%')
           ";

    $query=mysqli_query($con, $query);
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = array(
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

 foreach ($array as $key=>$val) {
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
        'X' => $x,
        'Y' => $y,
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




    echo json_encode($response);
    mysqli_close($con);
?>
