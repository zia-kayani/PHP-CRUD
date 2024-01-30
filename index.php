<?php
include 'database.php';

$host = "localhost";
$port = "5432";
$dbname = "CRUD_DB";
$user = "postgres";
$password = "zia123";

// Create an instance of the Database class
$database = new Database($host, $port, $dbname, $user, $password);

// Read Operation
$existingUsers = $database->getAllUsers();

// Display existing users
foreach ($existingUsers as $existingUser) {
    echo "ID: " . $existingUser['id'] . ", Name: " . $existingUser['name'] . ", Email: " . $existingUser['email'] . "<br>";
}

// Create a new user
// $result = $database->createUser("ziakayani", "kiani@example.com");
// echo $result;

// Read Operation 
// $newlyInsertedUser = end($database->getAllUsers()); // Retrieve the last user (newly inserted)
// echo "Newly Inserted User: ID: " . $newlyInsertedUser['id'] . ", Name: " . $newlyInsertedUser['name'] . ", Email: " . $newlyInsertedUser['email'] . "<br>";

// $result = $database->updateUser(3, "Tahir", "tahir@example.com");
// echo $result;

$result = $database->deleteUser(17);
echo $result;

$database->closeConnection();
?>
