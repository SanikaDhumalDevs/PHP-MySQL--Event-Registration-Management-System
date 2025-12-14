<?php
session_start();
include 'db.php'; // only include db.php, not header.php (it likely outputs HTML)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Check if Admin
        if ($email == 'satara123@gmail.com' && $password == 'admin123') {
            $_SESSION['email'] = $email;
            echo "<script>alert('Welcome Admin!'); window.location.href='admin.php';</script>";
            exit();
        }

        // Check password for normal user
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['login_success'] = true;
            header("Location: user.php");
            exit();
        } else {
            echo "<script>
                alert('Invalid Password!');
                setTimeout(function(){ window.location.href='login.php'; }, 1000);
            </script>";
        }
    } else {
        echo "<script>
            alert('Invalid Email!');
            setTimeout(function(){ window.location.href='login.php'; }, 1000);
        </script>";
    }
}
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
<link rel="stylesheet" href="style.css">
<style>
  @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
body {
      background: linear-gradient(to right, #fbc2eb, #a6c1ee);
    animation: fadeIn 1s ease-in-out;
    }

</style>
</head>
<body class="login-page">
<main>
<br><br>
<center>
  	<section class="location-section">
        <h2>Find Us Here</h2>
		</section>
</center>
<form method="POST" id="reg1">
 <label>Email:</label><br> <input type="email" name="email" id="name" placeholder="Enter Your Email" required><br><br>
 <label>Password:</label><br><input type="password" name="password" id="name" placeholder="Enter Your Password" required><br><br>
    <input type="submit" value="Login" id="new">
</form>
</main>
</body>
</html>

<?php include 'footer.php'; ?>