<?php include 'db.php';?>
<?php

// If logout button clicked
if (isset($_GET['logout'])) {
    session_destroy(); // destroy the session
    header("Location: index.php"); // redirect to index page
    exit();
}
?>
<?php
session_start();
if(isset($_SESSION['login_success'])&&$_SESSION['login_success']==true){
	echo"<script>
	alert('Login Successful!');
	</script>";
	unset($_SESSION['login_success']);
}


// Get counts
$total_feedbacks = $conn->query("SELECT COUNT(*) as total FROM feedback")->fetch_assoc()['total'];

?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }

        h2 {
            text-align: center;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            width: 25%;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        table {
            width: 85%;
            margin-left:200px;
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background: #333;
            color: white;
        }

        .logout {
            float: right;
            margin: 20px;
        }

        .logout a {
            text-decoration: none;
            background: red;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
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
    </style>
</head>
<body>
<main>
<div class="sidebar">
 <h2 style="color:white;margin-left:20px;">Dashboard</h2>
    <a href="register-users.php">Registered Users</a>
    <a href="contact_messages.php">Contact Messages</a>
	<a href="event_participants.php">Event Registered Users</a>
	<a href="admin-feedback.php">Feedbacks</a>
</div>
<div class="logout">
    <a href="admin.php?logout=true">Logout</a>
</div>
<h2>Admin Dashboard</h2>
<div class="dashboard">
    <div class="card">
        <h3>Total Feedbacks</h3>
        <p><?php echo $total_feedbacks; ?></p>
    </div>
</div>

<h2>Feedbacks</h2>
<?php
date_default_timezone_set('Asia/Kolkata');
?>

<div style="text-align: right; margin-bottom: 10px; font-weight: bold; font-size: 16px;">
    Current Date and Time: <?php echo date("d-m-Y h:i:s A"); ?>
</div>
<table>
    <tr>
        <th>Sr. No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Event</th>
        <th>Rating</th>
		 <th>Comments</th>
		 <th>Submitted At</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM feedback");
    if ($res->num_rows > 0) {
		$sr_no = 1;
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
			echo  "<td>" .$sr_no++ . "</td>";
               echo" <td>{$row['name']}</td>";
               echo"<td>{$row['email']}</td>";
               echo"<td>{$row['event']}</td>";
				echo"<td>{$row['rating']}</td>";
                
				echo"<td>{$row['comments']}</td>";
				 echo"<td>{$row['submitted_at']} </td>";   
           echo"</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No feedbacks found</td></tr>";
    }
    ?>

</table>
</main>
</body>
</html>

