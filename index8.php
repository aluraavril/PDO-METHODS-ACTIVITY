//SHOW CODE DEMONSTRATING AN SQL QUERY’S RESULT SET IS RENDERED ON AN HTML TABLE

<?php
require_once 'core/dbConfig.php';
global $pdo; // Access the global $pdo
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creators List</title>
</head>
<body>


    <h1>Creators List</h1>


    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Creator ID</th>
                <th>Creator Name</th>
                <th>Profile Description</th>
                <th>Category</th>
                <th>Subscription Price</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Prepare the SQL statement to select all records from the Creators table
            $stmt = $pdo->prepare("SELECT * FROM creators");


            // Execute the statement
            if ($stmt->execute()) {
                // Fetch all results as an associative array
                $creators = $stmt->fetchAll(PDO::FETCH_ASSOC);


                // Loop through the records and render each in a table row
                foreach ($creators as $creator) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($creator['creator_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($creator['creator_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($creator['profile_description']) . "</td>";
                    echo "<td>" . htmlspecialchars($creator['category']) . "</td>";
                    echo "<td>" . htmlspecialchars($creator['subscription_price']) . "</td>";
                    echo "<td>" . htmlspecialchars($creator['created_at']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Error fetching data.</td></tr>";
            }
            ?>
        </tbody>
    </table>


</body>
</html>


