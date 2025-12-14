<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
		.card {
          transition: transform 0.3s ease, box-shadow 0.3s ease;
		  
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.card-price {

  color: black;
  font-weight: 600;
  font-size: 24px;
  
}
        
    </style>
</head>
<body>
<main>
<br><br>
<center>
  	<section class="location-section">
        <h2>Know More</h2>
		</section>
</center>



<!-- Event Cards -->
<div class="container my-5">
    <div class="row g-4">

       		 <!-- Quiz Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <img src="images/im6.jpeg" class="card-img-top" alt="Quiz">
                <div class="card-body">
                    <h5 class="card-title">Quiz</h5>
                    <p class="card-text">A tech-based quiz competition to test your knowledge on programming and technical awareness.</p>
                    <p><strong>Team Size:</strong> 2 to 4 members</p>
					<a href="event1.php?event=Quiz" style="position: absolute; bottom: 10px; right: 10px; background-color: #5a2a82; color: white; padding: 8px 14px; border-radius: 5px; text-decoration: none;">Register</a>
                <div class="card-price">&#8377;100</div>
				</div>
            </div>
        </div>

       

        <!-- Treasure Hunt Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <img src="images/im8.jpeg" class="card-img-top" alt="Treasure Hunt">
                <div class="card-body">
                    <h5 class="card-title">Treasure Hunt</h5>
                    <p class="card-text">A tech-based treasure hunt adventure where participants solve clues in a fun format.</p>
                    <p><strong>Team Size:</strong> 3 to 4 members</p>
					<a href="event1.php?event=Treasure Hunt"  style="position: absolute; bottom: 10px; right: 10px; background-color: #5a2a82; color: white; padding: 8px 14px; border-radius: 5px; text-decoration: none;">Register</a>
               <div class="card-price">&#8377;300</div>
			   </div>
            </div>
        </div>

        <!-- Coding Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <img src="images/im7.jpeg" class="card-img-top" alt="Coding">
                <div class="card-body">
                    <h5 class="card-title">Coding</h5>
                    <p class="card-text">An individual programming contest to solve problems quickly and efficiently.</p>
                    <p><strong>Team Size:</strong> Solo (1 member)</p>
					<a href="event1.php?event=Coding"  style="position: absolute; bottom: 10px; right: 10px; background-color: #5a2a82; color: white; padding: 8px 14px; border-radius: 5px; text-decoration: none;">Register</a>
					<div class="card-price">&#8377;200</div>
                </div>
            </div>
        </div>
		 <!-- Hackathon Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <img src="images/im4.jpeg" class="card-img-top" alt="Hackathon">
                <div class="card-body">
                    <h5 class="card-title">Hackathon</h5>
                    <p class="card-text">A time-bound coding challenge where teams build software or hardware solutions. Test your innovation and teamwork.</p>
                    <p><strong>Team Size:</strong> 2 to 4 members</p>
					<a href="event1.php?event=Hackathon" style="position: absolute; bottom: 10px; right: 10px; background-color: #5a2a82; color: white; padding: 8px 14px; border-radius: 5px; text-decoration: none;">Register</a>
             <div class="card-price">&#8377;500</div>
			 </div>
            </div>
        </div>


        <!-- Tech Talk Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <img src="images/im5.jpeg" class="card-img-top" alt="Tech Talk">
                <div class="card-body">
                    <h5 class="card-title">Tech Talk</h5>
                    <p class="card-text">Attend expert talks on technology trends, innovations, and industry insights.</p>
                    <p><strong>Team Size:</strong> Individual or Group</p>
					<a href="event1.php?event=Tech Talk" style="position: absolute; bottom: 10px; right: 10px; background-color: #5a2a82; color: white; padding: 8px 14px; border-radius: 5px; text-decoration: none;">Register</a>
              <div class="card-price">&#8377;150</div>
			  </div>
            </div>
        </div>

    </div>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</main>

</body>
</html>

<?php include 'footer.php'; ?>