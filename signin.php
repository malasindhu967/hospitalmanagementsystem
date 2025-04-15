<?php
include "connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
//$address = $_POST['address'];
$username = $_POST['username'];

// Perform data validation and sanitization
$name = mysqli_real_escape_string($connection, $name);
$email = mysqli_real_escape_string($connection, $email);
$phone = mysqli_real_escape_string($connection, $phone);
//$address = mysqli_real_escape_string($connection, $address);
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);



// Check if the user is already signed up
$query = "SELECT name, phone FROM sign WHERE name = '$name' AND phone = '$phone';";
$check = mysqli_query($connection, $query);

if (mysqli_num_rows($check) > 0) {
    echo "<script> alert('User already signed up');
          window.location.href='login.html';
          </script>";
    exit();
} else {
    // Insert the user data into the database
    $query = "INSERT INTO sign (name, email, phone, username, password) 
              VALUES ('$name', '$email', '$phone', '$username', '$password');";

    if (mysqli_query($connection, $query)) {
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
        // Or provide a user-friendly error message like "Registration failed. Please try again later."
    }
}

mysqli_close($connection);
?>

