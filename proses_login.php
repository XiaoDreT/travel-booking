<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the authentication
    if (authenticateOperator($username, $password)) {
        // Authentication successful, redirect to the operator dashboard
        header('Location: index.php');
        exit;
    } else {
        // Authentication failed, display an error message
        echo 'Invalid username or password';
    }
}

// Function to authenticate the operator
function authenticateOperator($username, $password) {
    // Replace this with your own authentication logic
    // For example, you can check against a database of operators
    $validUsername = 'operator';
    $validPassword = 'password';

    if ($username === $validUsername && $password === $validPassword) {
        return true;
    } else {
        return false;
    }
}