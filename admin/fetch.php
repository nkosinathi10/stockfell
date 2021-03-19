<?php
//fetch.php
require_once '../init.php';
$query = "
 SELECT * FROM mydesc ORDER BY parent_id ASC
";
$result = mysqli_query($conn, $query);
//$output = array();
while($row = mysqli_fetch_array($result))
{
 $sub_data["id"] = $row["id"];
 $sub_data["name"] = $row["name"];
 $sub_data["text"] = "Name: ".$row["name"] ." - Master ID: ". $row["parent_id"];
 $sub_data["parent_id"] = $row["parent_id"];
 $data[] = $sub_data;
}
foreach($data as $key => &$value)
{
 $output[$value["id"]] = &$value;
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  $output[$value["parent_id"]]["nodes"][] = &$value;
 }
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  unset($data[$key]);
 }
}
echo json_encode($data);
/*echo '<pre>';
print_r($data);
echo '</pre>';*/

?>