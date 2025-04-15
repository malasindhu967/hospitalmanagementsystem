<?php
include "connection.php"; // Include your database connection settings

$firstname = mysqli_real_escape_string($connection, $_POST['fname']);
$secondname = mysqli_real_escape_string($connection, $_POST['sname']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

$query = "INSERT INTO form (firstname, secondname, email, password) VALUES ('$firstname', '$secondname', '$email', '$password')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Registration successful.";
} else {
    echo "Error during registration: " . mysqli_error($connection);
}

$query = "SELECT * FROM form;";
$check = mysqli_query($connection, $query);

if ($check) {
    if (mysqli_num_rows($check) > 0) {
        echo "Number of rows: " . mysqli_num_rows($check) . "<br>";

        while ($row = mysqli_fetch_assoc($check)) {
            echo "<b style='color: orange'>" . $row["firstname"] . "</b>" . "  " . "<b style='color: blue'>" . $row["secondname"] . "</b><br>"
                . "<b style='color: orange'>" . $row["email"] . "</b>" . "  " . "<b style='color: blue'>" . $row["password"] . "</b><br>";
        }
    } else {
        echo "No rows found.";
    }
} else {
    echo "Error retrieving data: " . mysqli_error($connection);
}

mysqli_close($connection);
echo $firstname;
?>

