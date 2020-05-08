<?php
include "../Model/dbconfig.php";

if(isset($_POST['soumettre'])){

// Prepared statement
$query = "INSERT INTO docATraduire (name,doc) VALUES(?,?)";

$statement = $DB_con->prepare($query);
// File name
$filename = $_FILES['files']['name'][0];
//$filename=$_POST['name1'];
$extension=explode(".", $filename);

// Get extension
$ext = end($extension);

// Valid image extension
$valid_ext = array("pdf","doc");

if(in_array($ext, $valid_ext)){

    // Upload file
    if(move_uploaded_file($_FILES['files']['tmp_name'][0],'../upload/'.$filename)){

        // Execute query
        $statement->execute(array($filename,'../upload/'.$filename));

    }
}
}
