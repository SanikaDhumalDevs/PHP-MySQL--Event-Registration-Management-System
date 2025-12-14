<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your DB password if any
$database = "event_system"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total registered users
$user_query = "SELECT COUNT(*) AS total_users FROM users";
$user_result = $conn->query($user_query);
if (!$user_result) {
    die("User query failed: " . $conn->error);
}
$user_row = $user_result->fetch_assoc();
$total_users = $user_row['total_users'];

// Fetch total contact messages
$message_query = "SELECT COUNT(*) AS total_messages FROM contact_messages";
$message_result = $conn->query($message_query);
$message_row = $message_result->fetch_assoc();
$total_messages = $message_row['total_messages'];

$feedback_query = "SELECT COUNT(*) AS total_feedbacks FROM feedback";
$feedback_result = $conn->query($feedback_query);
$feedback_row = $feedback_result->fetch_assoc();
$total_feedbacks = $feedback_row['total_feedbacks'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #2c3e50;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .main {
            margin-left: 210px;
            padding: 20px;
        }
        .logout-button {
            float: right;
            margin: 10px;
            padding: 8px 16px;
            background-color: tomato;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .card h2 {
            margin: 0 0 10px;
            font-size: 24px;
        }
        .card p {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
<main>
<div class="sidebar">
 <h2 style="color:white;margin-left:20px;">Dashboard</h2>
    <a href="register-users.php">Registered Users</a>
    <a href="contact_messages.php">Contact Messages</a>
	<a href="event_participants.php">Event Registered Users</a>
	<a href="admin-feedback.php">Feedback</a>
</div>

<div class="main">
    <form method="post" action="index.php">
        <button class="logout-button">Logout</button>
    </form>

    <h1>Welcome Admin</h1>

    <div class="card">
        <h2>Today's Date and Time</h2>
        <p><?php
date_default_timezone_set('Asia/Kolkata');
?>
 <?php echo date("d-m-Y h:i:s A"); ?>
</p>
    </div>

    <div class="card">
        <h2>Quick Stats</h2>
        <p>Total Registered Users: <?php echo $total_users; ?></p>
        <p>Total Contact Messages: <?php echo $total_messages; ?></p>
		 <p>Total Feedbacks: <?php echo $total_feedbacks; ?></p>
    </div>

</div>
</main>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>

