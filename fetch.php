<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "learning_hub");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM course_description WHERE topic_title LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["topic_title"];
 }
 echo json_encode($data);
}

?>
