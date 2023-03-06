<?php
require("config.php")
$sql = "INSERT INTO custtbl('Fullname', 'Gender', 'CivilStatus')VALUES(".$_REQUEST["code"].")";

$select_sql = "SELECT * FROM custtbl";
$sql = str_replace("\\",sql");
$select_sql = str_replace("\\","", $select_sql);
try {
  $dbrecords = mysqli_query($connect, $select_sql);
  if (mysqli_num_rows($dbrecords) >0) {
    if (mysqli_query($connect, $sql)) {
      $response["success"] = 1;
        $response["Message"] = "DATA INSERTED";
        die(json_encode($response));
      }else {
        $response["success"] = 0;
          $response["Message"] = "Database error. please try again".$sql;
          die(json_encode($response));
      }

    }
  }
  catch (Exception $e){
    $response["success"] = 0;
      $response["Message"] = "Database error. please try again";
      die(json_encode($response));
  }
    $response["success"]= 1;
      $response["Message"] = "DATA ->". $seleect_sql;
         $response["Message"] =  "Record saved";
         die(json_encode($response));



?>
