<?php

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="university";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

  
  

  echo 'Connected to the database.<br>';

$output = '';

if (isset ($_POST ['search']))   {
      $searchq = $_POST ['search'];
      $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

$query = mysql_query ("SELECT * FROM student WHERE firstname LIKE '%searchq%' OR lastname LIKE '%searchq%'") or die("Could not Search");
$count = mysql_num_rows ($query);
if ($count == 0) {
      $ouput = 'There was no search result';
}else {
while ($row = mysql_fetch_array ($query)) {
   $fname = $row ['firstname'];
   $lname = $row ['lastname'];
   $id = $row ['id'];

$output .='<div> '.$fname.' '.$lname.'</div>';

       }
   } 
}
?>
