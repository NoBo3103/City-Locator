<?php
include 'config.php';

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($con,"select * from india_map_excel order by city limit 5");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($con,"select * from india_map_excel where city like '%".$search."%' limit 5");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $data[] = array("id"=>$row['id'], "text"=>$row['city'], "lat" => $row['lat'] , "lng" => $row["lng"], "country" => $row['country'] , "iso2" => $row['iso2'] , "state" => $row['admin'], "population" => $row['population_proper'], "capital" => $row['capital']);
}

echo json_encode($data);