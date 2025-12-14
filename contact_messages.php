<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "event_system";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// fetch contact messages
$sql = "SELECT * FROM contact_messages";
$result = mysqli_query($conn, $sql);

// count total contact messages
$totalMessages = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Contact Messages</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 200px;
            background-color: #1b2a4e;
            height: 100vh;
            position: fixed;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background-color: #111;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .card {
            background-color: #f0f0f0;
            padding: 20px;
            margin-bottom: 20px;
            width: 200px;
            border-radius: 10px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        table th {
            background-color: #1b2a4e;
            color: white;
        }
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            background-color: tomato;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: red;
        }
    </style>
</head>
<body>

<div class="sidebar">
 <h2 style="color:white;margin-left:20px;">Dashboard</h2>
    <a href="register-users.php">Registered Users</a>
    <a href="contact_messages.php">Contact Messages</a>
    <a href="event_participants.php">Event Registered Users</a>
	<a href="admin-feedback.php">Feedback</a>
</div>

<a href="admin.php" class="logout-btn">Logout</a>

<div class="content">
<center>
    <h1>Admin Dashboard</h1>
    <div class="card">
        <h3>Total Contact Messages</h3>
        <h2><?php echo $totalMessages; ?></h2>
    </div>
	</center>
<center>
    <h2>Contact Messages</h2>
	</center>
	<?php
date_default_timezone_set('Asia/Kolkata');
?>

<div style="text-align: right; margin-bottom: 10px; font-weight: bold; font-size: 16px;">
    Current Date and Time: <?php echo date("d-m-Y h:i:s A"); ?>
</div>
    <table>
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Email</th>
                <th>Message</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $res = $conn->query("SELECT * FROM contact_messages");
    if ($res->num_rows > 0) {
		$sr_no = 1;
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
					echo "<td>" . $sr_no++ . "</td>";
					echo"<td>{$row['email']}</td>";
					echo"<td>{$row['message']}</td>";
					echo"<td>{$row['submitted_at']}</td>";
                     echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No contact messages found.</td></tr>";
            }
            ?>
        </body>
    </table>
</div>

</body>
</html>

<?php
// close connection
mysqli_close($conn);
?>