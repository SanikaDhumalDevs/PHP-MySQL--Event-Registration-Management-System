<?php
// Event details array
$eventDetails = [
    'quiz' => ['price' => 100, 'teamSizes' => [1, 2]],
    'treasure hunt' => ['price' => 300, 'teamSizes' => [2, 3, 4]],
    'coding' => ['price' => 200, 'teamSizes' => [1, 2]],
    'hackathon' => ['price' => 500, 'teamSizes' => [2, 3, 4]],
    'tech talk' => ['price' => 150, 'teamSizes' => [1]]
];

// Get event from URL
$event = isset($_GET['event']) ? strtolower(trim($_GET['event'])) : '';
$price = $eventDetails[$event]['price'] ?? 0;
$teamSizes = $eventDetails[$event]['teamSizes'] ?? [1];

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "event_system");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $event = $_POST['event'];
    $amount = $_POST['amount'];
    $team_name = $_POST['team_name'];
    $team_size = $_POST['team_size'];

    $member_2_name = $_POST['member_2_name'] ?? '';
    $member_2_email = $_POST['member_2_email'] ?? '';
    $member_3_name = $_POST['member_3_name'] ?? '';
    $member_3_email = $_POST['member_3_email'] ?? '';
    $member_4_name = $_POST['member_4_name'] ?? '';
    $member_4_email = $_POST['member_4_email'] ?? '';

    $stmt = $conn->prepare("INSERT INTO users 
        (name, email, password, contact, event, role, submitted_at, location, amount, team_size, member_2_name, member_2_email, member_3_name, member_3_email, member_4_name, member_4_email, team_name) 
        VALUES (?, ?, ?, ?, ?, 'user', NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
    $stmt->bind_param("ssssssiisssssss", 
        $name, $email, $pass, $contact, $event, $location, $amount, $team_size,
        $member_2_name, $member_2_email, $member_3_name, $member_3_email,
        $member_4_name, $member_4_email, $team_name
    );

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Registration</title>
    <style>
    /* Fade-in animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 55%, #fad0c4 100%);
        margin: 0;
        padding: 20px;
        animation: fadeIn 1s ease-in-out;
    }

    .form-container {
        max-width: 500px;
        background: rgba(255, 255, 255, 0.95);
        margin: auto;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-radius: 20px;
        animation: fadeIn 1.2s ease;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 28px;
        color: #6d1b7b;
    }

    .form-group {
        margin-bottom: 18px;
        animation: fadeIn 1.4s ease;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
        color: #333;
    }

    input, select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        box-sizing: border-box;
        transition: 0.3s ease;
    }

    input:focus, select:focus {
        border-color: #d86cc7;
        box-shadow: 0 0 8px #e3a2e3;
        outline: none;
    }

    button {
        background: linear-gradient(to right, #c471f5, #fa71cd);
        color: white;
        padding: 12px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
        transition: 0.4s;
        animation: fadeIn 1.6s ease;
    }

    button:hover {
        background: linear-gradient(to right, #a94ac2, #ff6ec4);
        transform: scale(1.03);
    }

    #members_container .form-group {
        animation: fadeIn 1.8s ease;
    }
	.back-button {
    position: absolute;
    top: 20px;
    right: 30px;
    background: rgba(255, 255, 255, 0.85);
    color: #6d1b7b;
    padding: 10px 15px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    transition: background 0.3s ease, transform 0.2s ease;
    font-size: 14px;
}

.back-button:hover {
    background: #ffe6f3;
    transform: scale(1.05);
}
</style>
</head>
<body>
<a href="javascript:history.back()" class="back-button">← Back</a>

<div class="form-container">
    <h2>Register for <?php echo ucfirst($event); ?></h2>
    <form method="POST">
        <input type="hidden" name="event" value="<?php echo htmlspecialchars($event); ?>">

        <div class="form-group"><label>Full Name</label><input type="text" name="name" required></div>
        <div class="form-group"><label>Email</label><input type="email" name="email" required></div>
        <div class="form-group"><label>Password</label><input type="password" name="password" required></div>
        <div class="form-group"><label>Contact Number</label><input type="text" name="contact" required></div>
        <div class="form-group"><label>Location</label><input type="text" name="location" required></div>
        <div class="form-group"><label>Event</label><input type="text" value="<?php echo ucfirst($event); ?>" disabled></div>
        <div class="form-group"><label>Price</label><input type="text" name="amount" value="<?php echo $price; ?>" readonly></div>
        <div class="form-group"><label>Team Name</label><input type="text" name="team_name" required></div>

        <div class="form-group">
            <label>Team Size</label>
            <select name="team_size" id="team_size" required onchange="updateMembers(this.value)">
                <option value="">Select Team Size</option>
                <?php foreach ($teamSizes as $size): ?>
                    <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id="members_container"></div>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
function updateMembers(size) {
    let container = document.getElementById('members_container');
    container.innerHTML = '';
    size = parseInt(size);
    for (let i = 2; i <= size; i++) {
        container.innerHTML += `
            <div class="form-group"><label>Member ${i} Full Name</label><input type="text" name="member_${i}_name" required></div>
            <div class="form-group"><label>Member ${i} Email</label><input type="email" name="member_${i}_email" required></div>
        `;
    }
}
</script>

</body>
</html>