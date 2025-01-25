<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    // Get date from user
    $date = $_POST['date'];
    $plant_name = $_POST['plant'];

    // Sanitize the plant name to prevent directory traversal attacks
    $plant_name = preg_replace('/[^a-zA-Z0-9_-]/', '', $plant_name);

    // Define the target directory based on the plant name
    $target_dir = "uploads/$plant_name/";

    // Initialize an array to store the image names
    $imageNames = [];

    // Array of image fields
    $imageFields = ['image1', 'image2', 'image3', 'image4'];

    foreach ($imageFields as $index => $imageField) {
        // Check if the file was uploaded
        if (isset($_FILES[$imageField]) && $_FILES[$imageField]['error'] == 0) {
            // Create a new file name with the current date and the format 'data-image-1', 'data-image-2', etc.
            $newFileName = 'image-' . ($index + 1) . '.' . strtolower(pathinfo($_FILES[$imageField]["name"], PATHINFO_EXTENSION));

            // Set the full path for the file
            $target_file = $target_dir . $newFileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES[$imageField]["tmp_name"], $target_file)) {
                $imageNames[$index] = $newFileName;
            } else {
                $imageNames[$index] = null; // In case of an error, store null
            }
        } else {
            $imageNames[$index] = null; // If no file was uploaded, store null
        }
    }

    // Prepare the SQL query
    $sql = "INSERT INTO plant_image(date,plant, image_1, image_2, image_3, image_4) VALUES(?, ?, ?, ?, ?, ?)";
    $statment = $connection->prepare($sql);

    // Bind parameters to the SQL query
    $statment->bind_param("ssssss", $date,$plant_name, $imageNames[0], $imageNames[1], $imageNames[2], $imageNames[3]);

    // Execute the query
    $statment->execute();

    // Redirect back to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
