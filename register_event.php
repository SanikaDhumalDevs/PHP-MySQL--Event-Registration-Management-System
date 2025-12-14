<?php
include 'db.php'; // Include your DB connection file

$event = isset($_GET['event']) ? $_GET['event'] : '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure password
    $contact = $_POST['contact'];
    $event   = $_POST['event'];
    $role    = 'user'; // default

    $query = "INSERT INTO users (name, email, password, contact, event, role)
              VALUES ('$name', '$email', '$password', '$contact', '$event', '$role')";

    if ($conn->query($query)) {
        echo "<script>alert('Registered successfully for $event'); window.location.href='info.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }
        .form-box {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            background-color: #6a1b9a;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #4a148c;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Register for <?php echo htmlspecialchars($event); ?></h2>
        <form method="POST">
            <input type="hidden" name="event" value="<?php echo htmlspecialchars($event); ?>">

            <label for="name">Name</label>
            <input type="text" name="name" required>

            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <label for="contact">Contact</label>
            <input type="tel" name="contact" required>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>