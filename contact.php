<?php include 'header.php'; ?>
<?php
include 'db.php'; // Your DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages (email, message) VALUES ('$email', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  @keyframes slideIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    body {
        background: linear-gradient(to right, #e0c3fc, #8ec5fc);
         animation: slideIn 1s ease-in-out;
    }
    .contact-form {
      background: #e7e3fa;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      margin-top: 10px;
      margin-bottom: 50px;
	  width:450px;
	  justify-content:center;
    }
   
  </style>
</head>
<body>
<br><br>
<main>

<center>
  	<section class="location-section">
        <h2>Talk To Us</h2>
		</section>
</center>


<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-6 contact-form">
      <h3 class="text-center mb-4">Contact Us</h3>
      <form method="post" action="">
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message:</label>
          <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Send Message</button>
        </div>
      </form>
    </div>
  </div>
</div>


</main>
</body>
</html>

<?php include 'footer.php'; ?>
