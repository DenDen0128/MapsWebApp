<?php
// Connect to the database
$servername = "localhost";
$username = "id20881428_geotracker";
$password = "Adm!n@2023";
$dbname = "id20881428_geotracker";
$conn = mysqli_connect($servername, $username, $password, $dbname);
/*
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "leaflet_example";
$conn = mysqli_connect($servername, $username, $password, $dbname);
*/
// Query the database for markers data
$result = mysqli_query($conn, "SELECT * FROM markers ORDER BY id DESC LIMIT 1");
//$result = mysqli_query($conn, "SELECT * FROM markers");

// Format the data as GeoJSON
$geojson = array(
  'type' => 'FeatureCollection',
  'features' => array()
);
while ($row = mysqli_fetch_assoc($result)) {
  $marker = array(
    'type' => 'Feature',
    'properties' => array(
      'name' => $row['name']
    ),
    'geometry' => array(
      'type' => 'Point',
      'coordinates' => array(
        $row['lng'],
        $row['lat']
      )
    )
  );
  array_push($geojson['features'], $marker);
}

// Return the data as JSON
header('Content-type: application/json');
echo json_encode($geojson, JSON_NUMERIC_CHECK);
mysqli_close($conn);
?>
