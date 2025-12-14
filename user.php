<?php
session_start();
 include 'header.php'; 
 include 'db.php';
if (!isset($_SESSION['email'])) {
    header('Location:login.php'); // Redirect to login if not logged in
    exit();
}

// Fetch user data
$user_email= $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email= '$user_email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        
        .dashboard {
            margin: 50px auto;
            padding: 20px;
            background: white;
            width: 400px;
            box-shadow: 0 0 10px gray;
            text-align: center;
        }
        .dashboard h2 {
            color: #333;
        }
        .dashboard p {
            font-size: 18px;
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-logout {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<br><br>
   <center>
  	<section class="location-section">
        <h2>Welcome User !!!</h2>
		</section>
</center>


<div class="dashboard">
    <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Contact:</strong> <?php echo htmlspecialchars($user['contact']); ?></p>
    <p><strong>Registered Event:</strong> <?php echo htmlspecialchars($user['event']); ?></p>
    
    <a href="logout.php" class="btn btn-logout">Logout</a>
</div>

</body>
</html>