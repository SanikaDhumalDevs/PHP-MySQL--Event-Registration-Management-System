<?php include 'header.php'; ?>

<?php
// Step 1: Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: On form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Step 3: Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $team_name = $_POST['team_name'];
    $event = $_POST['event'];
    $team_size = intval($_POST['team_size']);
    // Step 4: Define event prices
    $event_prices = [
        "Hackathon" => 500,
        "Ideathon" => 300,
        "Code Wars" => 400
    ];
    $amount = $event_prices[$event] ?? 0;

    // Step 5: Team member info (optional)
    $m2_name = $_POST['member_2_name'] ?? null;
    $m2_email = $_POST['member_2_email'] ?? null;
    $m3_name = $_POST['member_3_name'] ?? null;
    $m3_email = $_POST['member_3_email'] ?? null;
    $m4_name = $_POST['member_4_name'] ?? null;
    $m4_email = $_POST['member_4_email'] ?? null;

    // Step 6: Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, contact, event, role, submitted_at, location, amount, team_size, member_2_name, member_2_email, member_3_name, member_3_email, member_4_name, member_4_email, team_name)
        VALUES (?, ?, ?, ?, ?, 'user', NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Step 7: Bind and execute
    $stmt->bind_param("ssssssdiissssss", $name, $email, $password, $contact, $event, $location, $amount, $team_size,
        $m2_name, $m2_email, $m3_name, $m3_email, $m4_name, $m4_email, $team_name);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Event Registration</title>
  <style>
  @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
  body{
   background: linear-gradient(to right, #8e2de2, #f272d7);
    animation: fadeIn 1s ease-in-out;
  }
form {
  background: #ffffff;
  padding: 40px ;
  border-radius: 12px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
  width: 100%;
  max-width: 600px;
  box-sizing: border-box;
  transition: all 0.3s ease;
  margin: 100px auto 0 auto;
  
}
   

h2 {
  text-align: center;
  font-size: 32px;
  margin-bottom: 30px;
  color: #333;
}

input, select, button {
  width: 100%;
  padding: 14px 16px;
  margin: 12px 0;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  box-sizing: border-box;
}

input:focus, select:focus {
  border-color: #4a90e2;
  box-shadow: 0 0 6px rgba(74, 144, 226, 0.3);
  outline: none;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #444;
}

button {
background: #6a11cb;
  color: white;
  border: none;
  font-weight: bold;
  font-size: 18px;
  cursor: pointer;
  border-radius: 8px;
  transition: background-color 0.3s ease;
}

button:hover {
 background: #531b93;
}

.member {
  display: none;
}

.price {
  font-size: 18px;
  color: #111;
  font-weight: bold;
  margin-top: 10px;
  padding: 8px 0;
  border-top: 1px solid #eee;
}

.form-group {
  margin-bottom: 16px;
}

#teamSizeDiv {
  display: none;
}

/* Responsive Design */
@media (max-width: 600px) {
  form {
    padding: 25px 20px;
  }

  h2 {
    font-size: 26px;
  }

  input, select, button {
    font-size: 15px;
    padding: 12px;
  }
}
</style>
  <script>
    const teamEvents = {
      "Quick Competition": [2, 4],
      "Treasure Hunt": [3, 4],
      "Hackathon": [2, 4],
      "Coding Competition": [1, 1],
      "Tech Talk": [1, 1]
    };

    const eventPrices = {
      "Quick Competition": 150,
      "Treasure Hunt": 300,
      "Coding Competition": 400,
      "Hackathon": 500,
      "Tech Talk": 200
    };

    function onEventChange() {
      const event = document.getElementById("event").value;
      const teamSizeDiv = document.getElementById("teamSizeDiv");
      const priceDiv = document.getElementById("priceDiv");
      const teamSize = teamEvents[event];

      // Display the team size dropdown based on event selection
      if (teamSize[1] > 1) {
        teamSizeDiv.style.display = "block";
        const select = document.getElementById("team_size");
        select.innerHTML = "";
        for (let i = teamSize[0]; i <= teamSize[1]; i++) {
          select.innerHTML += `<option value="${i}">${i}</option>`;
        }
      } else {
        teamSizeDiv.style.display = "none";
        showMembers(1); // Default to showing one member input
      }

      // Display the price of the selected event
      if (eventPrices[event]) {
        priceDiv.style.display = "block";
        priceDiv.innerHTML = `Price: ₹${eventPrices[event]}`;
      } else {
        priceDiv.style.display = "none";
      }
    }

    function onTeamSizeChange() {
      const size = parseInt(document.getElementById("team_size").value);
      showMembers(size);
    }

    function showMembers(n) {
      for (let i = 2; i <= 4; i++) {
        document.getElementById("member_" + i).style.display = i <= n ? "block" : "none";
      }
    }
  </script>
</head>
<body>
<form method="POST">
    <h2>Event Registration Form</h2>

    <!-- Personal Info Section -->
    <div class="form-group">
      <input type="text" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
      <input type="email" name="email" placeholder="Email Address" required>
    </div>
    <div class="form-group">
      <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
      <input type="text" name="contact" placeholder="Contact Number" required>
    </div>
    <div class="form-group">
      <input type="text" name="location" placeholder="Location" required>
    </div>

    <!-- Team Name Section -->
    <div class="form-group">
      <input type="text" name="team_name" placeholder="Team Name" required>
    </div>

    <!-- Event Selection -->
    <div class="form-group">
      <label>Select Event:</label>
      <select name="event" id="event" onchange="onEventChange()" required>
        <option value="">-- Choose an Event --</option>
        <option value="Quick Competition">Quiz Competition</option>
        <option value="Treasure Hunt">Treasure Hunt</option>
        <option value="Coding Competition">Coding Competition</option>
        <option value="Hackathon">Hackathon</option>
        <option value="Tech Talk">Tech Talk</option>
      </select>
    </div>

    <!-- Price Display -->
    <div id="priceDiv" class="price" style="display:none;"></div>

    <!-- Team Size Selection -->
    <div id="teamSizeDiv" class="form-group">
      <label>Team Size:</label>
      <select name="team_size" id="team_size" onchange="onTeamSizeChange()"></select>
    </div>

    <!-- Optional Team Members Section -->
    <div id="member_2" class="member">
      <input type="text" name="member_2_name" placeholder="Member 2 Full Name">
      <input type="email" name="member_2_email" placeholder="Member 2 Email">
    </div>
    <div id="member_3" class="member">
      <input type="text" name="member_3_name" placeholder="Member 3 Full Name">
      <input type="email" name="member_3_email" placeholder="Member 3 Email">
    </div>
    <div id="member_4" class="member">
      <input type="text" name="member_4_name" placeholder="Member 4 Full Name">
      <input type="email" name="member_4_email" placeholder="Member 4 Email">
    </div>

    <!-- Submit Button -->
    <button type="submit">Register</button>
  </form>
</body>
</html>