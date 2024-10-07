// SHOW CODE DEMONSTRATING FETCH_ALL(). USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 

<?php
require_once 'core/dbConfig.php';
global $pdo; // Access the global $pdo
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>


    <?php
   
    $stmt = $pdo->prepare("SELECT * FROM creators");  // Prepare the statement to fetch all data from the Creators table


    // Execute the statement
    if ($stmt->execute()) {
        // Fetch all results and print them inside <pre> tags for better readability
        echo "<pre>";
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));  // Fetching as associative array for better output readability
        echo "</pre>";
    } else {
        echo "Error executing query.";
    }
    ?>


</body>
</html>
