<?php
include('connection.php');
$pickup = $_POST['pickup_address'];
// echo "<br>";
$drop = $_POST['drop_address'];
$query="SELECT * FROM tbl_ambulance ORDER BY estimated_time, price ASC;";
    $res=mysqli_query($con,$query);
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap links  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Ambulance check</title>
    <script>
    $(document).ready(function() {
      $("#loadContentBtn").click(function() {
        // AJAX request
        $.ajax({
          url: "ambulancelist.php", // Replace with the actual URL of your page
          type: "GET",
          success: function(response) {
            // Update the content of the div with the loaded page
            $("#contentDiv").html(response);
          },
          error: function(xhr, status, error) {
            console.error("Error loading page:", error);
          }
        });
      });
    });
  </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f8f8f8; /* Background color for the body */
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background-color: #2c3e50; /* Background color for the header */
            color: #ecf0f1; /* Text color for the header */
            margin-bottom: 10px;
        }

        .logo {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .title {
            display: flex;
            align-items: center;
        }

        /* Style for the home button */
        .home-icon {
            width: 24px;
            height: 24px;
            margin-right: 5px;
        }

        .home-button {
            text-decoration: none;
            color: #3498db; /* Text color for the home button */
            display: flex;
            align-items: center;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            margin: 10px;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 40%;
            box-sizing: border-box;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #ecf0f1; /* Background color for the cards */
            margin: 0 10px 10px 0;
            height: 500px;
            overflow-x: auto; /* Added overflow-x property */
            border-radius: 10px; /* Rounded corners for the cards */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for the cards */
        }

        .card:nth-child(odd) {
            background-color: #bdc3c7; /* Background color for odd-numbered cards */
        }

        h1 {
            font-size: 50px;
        }

        /* Style for input boxes */
        .input-box {
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
        }

        /* Style for the button */
        .check-button {
            background-color: #3498db; /* Background color for the button */
            color: #fff; /* Text color for the button */
            padding: 10px 15px;
            margin-left:350px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .check-button:hover {
            background-color: #2980b9; /* Hover background color for the button */
        }

        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            
        }

        th {
            background-color: #3498db; /* Background color for header cells in the table */
            color: #fff; /* Text color for header cells in the table */
        }

        @media (max-width: 700px) {
            .card {
                width: 80%; /* Adjusted width for smaller screens */
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="title">
            <img src="assets/images/logo.png" alt="Logo" class="logo">
            <h1>Medulla</h1>
        </div>
        
        <!-- Home button with SVG vector icon -->
        <a href="#" class="home-button">
            <svg class="home-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 2L2 12h3v8h6v-6h6v6h6v-8h3z"/>
            </svg>
            Home
        </a>
    </header>

    <div class="card-container" >
        <div class="card">
            <h2>Search for Ambulance nearby</h2><br>
            <label for="input0">PICKUP LOCATION</label>
            <input type="text" id="patientname" class="input-box" value="<?php echo $pickup; ?>" readonly ><br><br>
            <label for="input1">DROP LOCATION</label>
            <input type="text" id="pickup" class="input-box" value="<?php echo $drop; ?>" readonly ><br><br>
            <label for="input2">DISTANCE</label>
            <input type="text" id="input2" class="input-box" readonly value="" placeholder="Distance">

            <!-- Button for checking nearby ambulance -->
            <button class="check-button" id="loadContentBtn" onclick="getLocation()" >Check Nearby Ambulance</button>
        </div>
        
        <div class="card" id="contentDiv">
            <h1>Available Ambulances</h1>
            <!-- table is here -->
        </div>
    </div>
    <script>
        let userLocation;

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    userLocation = [position.coords.latitude, position.coords.longitude];
                    console.log('Location coordinates:', userLocation);
                    calculateDistance();
                    // hideLocationPopup();
                }, function(error) {
                    console.error('Error getting location:', error.message);
                    // hideLocationPopup();
                });
            } else {
                console.error('Geolocation is not supported by this browser.');
                // hideLocationPopup();
            }
        }

        function calculateDistance() {
            if (userLocation) {
                // Example usage
                const distance = calculateDistanceBetween(userLocation[0], userLocation[1], 28.4745076,77.4800492);
                console.log('Distance:', distance.toFixed(2), 'km');

                document.getElementById('input2').value = distance.toFixed(2) + ' km';
            }
        }

        function calculateDistanceBetween(lat1, lon1, lat2, lon2) {
            // Radius of the Earth in kilometers
            const R = 6371;

            // Convert latitude and longitude from degrees to radians
            const dLat = (lat2 - lat1) * (Math.PI / 180);
            const dLon = (lon2 - lon1) * (Math.PI / 180);

            // Haversine formula
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);

            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c; // Distance in kilometers

            return distance;
        }
    </script>

    <!-- script for calling table of ambulances -->


</body>
</html>