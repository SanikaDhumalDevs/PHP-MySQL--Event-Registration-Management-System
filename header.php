<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
		

        /* Navbar */
        .navbar {
            background-color: #9c27b0;
            padding: 1rem 0;
            color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
			 z-index:999;
	        position:relative;
        }

        .navbar .container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
			flex-wrap:nowrap;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
			white-space:nowrap;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 1.5rem;
			align-items:center;
			margin:0;
			padding:0;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s ease;
			font-size:20px;
        }

        .nav-links a:hover,
        .nav-links .active {
            color: #ffd54f;
        }

        /* Login Dropdown */
        .login-dropdown {
            position: relative;
        }

        .login-btn {
            background-color: #9c27b0;
            color: white;
            padding: 0.4rem 1rem;
            border: 2px solid white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: white;
            color: #9c27b0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            border-radius: 6px;
            z-index: 1;
        }

        .dropdown-content a {
            color: #9c27b0;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-weight: 500;
        }

        .dropdown-content a:hover {
            background-color: #f0f0f0;
        }

        .login-dropdown:hover .dropdown-content {
            display: block;
        }
		 .location-section h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #9c27b0;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar .container {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .login-dropdown {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
<div class="logo">            
			Event Registration</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="info.php">Events</a></li>
				 <li><a href="feedback.php">Feedback</a></li>
                <li><a href="locate.php" >Location</a></li>
            </ul>
            <div class="login-dropdown">
                <div class="login-btn">Login</div>
                <div class="dropdown-content">
                    <a href="login.php">User Login</a>
                    <a href="admin-login.php">Admin Login</a>
                </div>
            </div>
        </div>
    </nav>



</body>
</html>