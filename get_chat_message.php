<?php
// your-endpoint.php
include 'config.php';

$response = [];

if (isset($_GET['key1']) && isset($_GET['key2'])) {
    $id = $_GET['key1'];  // Get the 'id' value
    $name = $_GET['key2']; // Get the 'name' value

    // Escape the values to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $id);
    $name = mysqli_real_escape_string($connection, $name);

    // Log the input values for debugging
    error_log("Received id: $id, name: $name");

    // Do something with the data, e.g., fetch comments or store in the database
    $sql = "SELECT * FROM chat_messages WHERE image_id = '$id' AND image_name = '$name'";
    $result = mysqli_query($connection, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        $messages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $messages[] = $row;  // Store each message in the array
        }

        // Send the fetched messages in the response
        $response = [
            'status' => 'success',
            'data' => $messages
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'No records found'
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'Missing parameters'
    ];
}

// Send the response as JSON
echo json_encode($response);
