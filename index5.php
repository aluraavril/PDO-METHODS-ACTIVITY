//SHOW CODE DEMONSTRATING INSERTION OF RECORD TO YOUR DATABASE

<?php
require_once 'core/dbConfig.php';
global $pdo; // Access the global $pdo
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Record</title>
</head>
<body>


    <?php
    // Data to insert
    $creator_name = 'Gelay Consumisyon';
    $profile_description = 'Exclusive content about photography.';
    $category = 'Photography';
    $subscription_price = 11.50;
    $created_at = date('Y-m-d H:i:s');  // Current datetime


    // Prepare the SQL statement to insert a new record into the Creators table
    $stmt = $pdo->prepare("INSERT INTO creators (creator_name, profile_description, category, subscription_price, created_at)
                           VALUES (:creator_name, :profile_description, :category, :subscription_price, :created_at)");


    // Bind the data to the parameters
    $stmt->bindParam(':creator_name', $creator_name);
    $stmt->bindParam(':profile_description', $profile_description);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':subscription_price', $subscription_price);
    $stmt->bindParam(':created_at', $created_at);


    // Execute the statement
    if ($stmt->execute()) {
        echo "New record inserted successfully!";
    } else {
        echo "Error inserting record.";
    }
    ?>


</body>
</html>
