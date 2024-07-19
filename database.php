<?php 

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "coffelover";
$conn = null; // Initialize to null

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        throw new Exception("Could not connect to the database: " . mysqli_connect_error());
    }

    // If you reach here, the connection is successful
    echo "Connected to the database successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
