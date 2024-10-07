//SHOW CODE DEMONSTRATING UPDATING OF RECORD FROM YOUR DATABASE

<?php
require_once 'core/dbConfig.php';
global $pdo; // Access the global $pdo
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<body>


    <?php
    // The name of the creator to update
    $old_creator_name = 'GamingQueen';  
    $new_creator_name = 'Kyedae';
    $new_profile_description = 'Valorant live streaming';
    $new_category = 'Gaming';
    $new_subscription_price = 25.00;
    $new_created_at = date('Y-m-d H:i:s'); // Current datetime


    // Prepare the SQL statement to update the record in the Creators table
    $stmt = $pdo->prepare("UPDATE creators SET
                            creator_name = :new_creator_name,
                            profile_description = :new_profile_description,
                            category = :new_category,
                            subscription_price = :new_subscription_price,
                            created_at = :new_created_at
                            WHERE creator_name = :old_creator_name");


    // Bind the data to the parameters
    $stmt->bindParam(':new_creator_name', $new_creator_name);
    $stmt->bindParam(':new_profile_description', $new_profile_description);
    $stmt->bindParam(':new_category', $new_category);
    $stmt->bindParam(':new_subscription_price', $new_subscription_price);
    $stmt->bindParam(':new_created_at', $new_created_at);
    $stmt->bindParam(':old_creator_name', $old_creator_name);


    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record.";
    }
    ?>


</body>
</html>
