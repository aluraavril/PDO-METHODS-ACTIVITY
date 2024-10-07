//SHOW CODE DEMONSTRATING DELETION OF RECORD TO YOUR DATABASE

<?php
require_once 'core/dbConfig.php';
global $pdo; // Access the global $pdo
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
</head>
<body>


    <?php
    // The name of the creator to delete
    $creator_name = 'Gelay Consumisyon';  


    // Prepare the SQL statement to delete the record from the Creators table
    $stmt = $pdo->prepare("DELETE FROM creators WHERE creator_name = :creator_name");


    // Bind the data to the parameter
    $stmt->bindParam(':creator_name', $creator_name);


    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record.";
    }
    ?>


</body>
</html>
