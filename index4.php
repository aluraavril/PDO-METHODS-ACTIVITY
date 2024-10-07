//SHOW CODE DEMONSTRATING HOW FETCH() IS USED. USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 

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
    // Prepare the statement to fetch a single record from the Creators table
    $stmt = $pdo->prepare("SELECT * FROM creators LIMIT 1");


    // Execute the statement
    if ($stmt->execute()) {
        // Fetch one result and print it inside <pre> tags for better readability
        echo "<pre>";
        print_r($stmt->fetch(PDO::FETCH_ASSOC));  // Fetching a single row as an associative array
        echo "</pre>";
    } else {
        echo "Error executing query.";
    }
    ?>


</body>
</html>
