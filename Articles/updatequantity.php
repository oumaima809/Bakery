<?php
header('Content-Type: application/json'); // Set the content type to JSON

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the JSON input
    $input = json_decode(file_get_contents('php://input'), true);

    // Check if quantity and item_id are set
    if (isset($input['quantity']) ) {
        $quantity = intval($input['quantity']);
   

        // Simulate a successful update response
        echo json_encode([
            'status' => 'success',
            'message' => 'Quantity updated successfully',
            'quantity' => $quantity
        ]);
    } else {
        // Return an error response if quantity or item_id is missing
        echo json_encode([
            'status' => 'error',
            'message' => 'Quantity or item ID not provided'
        ]);
    }
} else {
    // Return an error if the request method is not POST
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}
?>
