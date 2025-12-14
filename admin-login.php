

<?php 
session_start();
include 'header.php'; 
include 'db.php';
$connection = mysqli_connect('localhost', 'root', '', 'event_system');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check admin credentials
    if ($email == 'satara123@gmail.com' && $password == 'admin123') {
        $_SESSION['admin_email'] = $email;
        echo "<script>alert('Welcome Admin!'); window.location.href='admin.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid Admin Email or Password!'); window.location.href='admin-login.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
	@keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
	body{
		 background: linear-gradient(to right, #fbc2eb, #a18cd1);
    animation: fadeIn 1s ease-in-out;


	
	}
	
        
        .login-container {
            width: 350px;
          
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.2);
			margin-left:550px;
			margin-top:100px;
			justify-content:center;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            width: 100%;
            background-color: #0072ff;
            color: white;
            padding: 12px 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }
        .login-container input[type="submit"]:hover {
            background-color: #005bb5;
        }
		::placeholder{
	color:#999;
	opacity:1;
	font-size:14px;
	font-style:italic;
		}
    </style>
</head>
<body>
<main>

<div class="login-container">
    <h2>Admin Login</h2>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Enter Admin Email" required>
        <input type="password" name="password" placeholder="Enter Admin Password" required>
        <input type="submit" name="login" value="Login">
    </form>
</div>
</main>
</body>
</html>

<?php include 'footer.php'; ?>