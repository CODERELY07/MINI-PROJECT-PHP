<?php

session_start();

// Check if email and password match
if ($_POST['email'] == 'calpjo@gmail.com' && $_POST['password'] == "password") {
    
    // Generate a session token using the session ID
    $_SESSION['token'] = password_hash(session_id(), PASSWORD_DEFAULT);
    
    // Send the token as a JSON response
    echo json_encode(['token' => $_SESSION['token']]);
    
} else {
    // Return an error response if authentication fails
    echo json_encode(['error' => 'Invalid credentials']);
}
?>
