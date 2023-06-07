<?php
// Define your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmudorm";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables to store user input
$userId = $first_name = $last_name = $user_type = $age = $address = $resource = $phone = $email = $password = $confirm_password = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $userId = sanitizeInput($_POST["userId"]);
    $first_name = sanitizeInput($_POST["first_name"]);
    $last_name = sanitizeInput($_POST["last_name"]);
    $user_type = sanitizeInput($_POST["user_type"]);
    $age = sanitizeInput($_POST["age"]);
    $address = sanitizeInput($_POST["address"]);
    $resource = sanitizeInput($_POST["resource"]);
    $phone = sanitizeInput($_POST["phone"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);
    $confirm_password = sanitizeInput($_POST["confirm_password"]);

    // Validate password and confirm password
    if ($password != $confirm_password) {
        $error_message = "Password and Confirm Password do not match.";
    } else {
        // Passwords match, proceed with storing data in the database
        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO adduser (UserId, first_name, last_name, user_type, age, address, resource, phone, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisssss", $userId, $first_name, $last_name, $user_type, $age, $address, $resource, $phone, $email, $password);
        if ($stmt->execute()) {
            $success_message = "User registration successful.";
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Function to sanitize user input
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
</head>

<body>
    <h2>User Registration</h2>

    <?php if (isset($success_message)) { ?>
        <p style="color: green;">
            <?php echo $success_message; ?>
        </p>
    <?php } ?>

    <?php if (isset($error_message)) { ?>
        <p style="color: red;">
            <?php echo $error_message; ?>
        </p>
    <?php } ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="userId">User ID:</label>
        <input type="text" name="userId" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="user_type">User Type:</label>
        <input type="text" name="user_type" required><br>

        <label for="age">Age:</label>
        <input type="number" name="age" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <label for="resource">Resource:</label>
        <input type="text" name="resource" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>
