<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Location | KBP Polytechnic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
     

        /* Location Section */
        .location-section {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: auto;
            text-align: center;
        }

        .location-section h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #9c27b0;
        }

        .map-wrapper {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .map-container iframe {
            width: 100%;
            height: 450px;
            border: none;
            border-radius: 8px;
        }

        
    </style>
</head>
<body>
<main>

 

    <!-- Map Section -->
    <section class="location-section">
        <h2>Find Us Here</h2>
        <div class="map-wrapper">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799.765916243713!2d73.98898977421835!3d17.755665492093343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2387901a0b25b%3A0x8dc73a3bcb2e332a!2sKBP%20Polytechnic%20College%20Satara!5e0!3m2!1sen!2sin!4v1746866920242!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</main>
</body>
</html>

<?php include 'footer.php'; ?>