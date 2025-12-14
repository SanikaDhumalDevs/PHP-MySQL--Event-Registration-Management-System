
<?php
 include 'header.php'; 
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "event_system");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name     = $conn->real_escape_string($_POST["name"]);
    $email    = $conn->real_escape_string($_POST["email"]);
    $event    = $conn->real_escape_string($_POST["event"]);
    $rating   = intval($_POST["rating"]);
    $comments = $conn->real_escape_string($_POST["comments"]);

    $sql = "INSERT INTO feedback (name, email, event, rating, comments)
            VALUES ('$name', '$email', '$event', '$rating', '$comments')";

    if ($conn->query($sql) === TRUE) {
        $success = "Feedback submitted successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }

    $conn->close();
}
?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Feedback Form</title>
  <style>
  @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    :root {
      --primary-color: #0077b6;
      --background-color: #f6f9fc;
      --text-color: #333;
      --card-bg: #ffffff;
      --border-radius: 12px;
      --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
	 body {
      background: linear-gradient(to right, #fbc2eb, #a6c1ee);
animation: fadeIn 1s ease-in-out;

    }

    .form-container {
      max-width: 500px;
      margin: auto;
      padding: 40px;
  background: #e7e3fa;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow);
    }

    h2 {
      text-align: center;
      color: #4c284d;
      margin-bottom: 30px;
    }

    .message {
      text-align: center;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 6px;
      font-weight: bold;
    }

    .success {
      background: #d4edda;
      color: #155724;
    }

    .error {
      background: #f8d7da;
      color: #721c24;
    }

    label {
      display: block;
      margin: 15px 0 5px;
      font-weight: 600;
    }

    input, select, textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }

    textarea {
      resize: vertical;
    }

    .stars {
      display: flex;
      flex-direction: row-reverse;
      justify-content: flex-start;
      gap: 5px;
      margin-bottom: 20px;
    }

    .stars input {
      display: none;
    }

    .stars label {
      font-size: 25px;
      color: gray;
      cursor: pointer;
      transition: color 0.3s;
    }

    .stars input:checked ~ label,
    .stars label:hover,
    .stars label:hover ~ label {
      color: gold;
    }

    button {
      width: 100%;
      padding: 14px;
      background: #4c284d;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background: #8960a1;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Event Feedback</h2>

    <?php if (isset($success)): ?>
      <div class="message success"><?= $success ?></div>
    <?php elseif (isset($error)): ?>
      <div class="message error"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="POST">
      <label for="name">Full Name</label>
      <input type="text" name="name" id="name" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>

      <label for="event">Event</label>
      <select name="event" id="event" required>
        <option value="" disabled selected>Select Event</option>
        <option value="Hackathon">Hackathon</option>
        <option value="Quiz">Quiz Competition</option>
        <option value="Treasure Hunt">Treasure Hunt</option>
		<option value="Coding">Coding Challenge</option>
		<option value="Tech Talk">Tech Talk</option>
      </select>

      <label>Rating</label>
      <div class="stars">
        <input type="radio" name="rating" id="star5" value="5"><label for="star5">&#9733;</label>
        <input type="radio" name="rating" id="star4" value="4"><label for="star4">&#9733;</label>
        <input type="radio" name="rating" id="star3" value="3"><label for="star3">&#9733;</label>
        <input type="radio" name="rating" id="star2" value="2"><label for="star2">&#9733;</label>
        <input type="radio" name="rating" id="star1" value="1"><label for="star1">&#9733;</label>
      </div>
	
      <label for="comments">Comments</label>
      <textarea name="comments" id="comments" rows="4" placeholder="Your feedback..."></textarea>

      <button type="submit">Submit Feedback</button>
    </form>
  </div>
</body>
</html>
