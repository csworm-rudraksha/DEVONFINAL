<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <title>Facility</title>

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
    }

    .navbar {
      background-color: #122853;
      color: white;
      padding: 10px;
      text-align: center;
      width: 100%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      position: relative;
      z-index: 2;
    }

    .logo img {
      width: 100px; /* Adjust the size of the logo as needed */
      height: auto;
      margin-right: 10px;
    }

    .site-name {
      margin-right: auto;
    }

    .blocks-wrapper {
      margin-top: 80px; /* Adjust the margin to account for the fixed navbar height */
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      max-width: 900px; /* Set a maximum width to limit the number of cards per row */
      margin-left: 3%;
    }

    .block {
      width: calc(33.33% - 30px); /* 3 cards in one row with margins */
      height: 280px;
      background-color: #c7d0eb;
      margin: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border-radius: 30px;
      border: 5px solid #ffffff;
      box-sizing: border-box;
    }

    .fixed-card {
      width: 35%;
      margin-top: 100px;
      height: 100%;
      background-color: #F2F1EB;
      display: flex;
      flex-direction: column;
      padding:15px;
      overflow:scroll;
      /* align-items: center; */
      /* justify-content: center; */
      position: absolute;
      top: 115px;
      right: 30px;
      z-index: 1;
      border-radius: 30px;
    }

    .fixed-card p {
      color: white;
      font-size: 1.4rem;
      margin-top: 20px;
    }

    .fixed-card button {
      margin-top: 10px;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      background-color: #ffffff; /* White */
      color: red;
      font-size: 14px;
      cursor: pointer;
    }

    .block p, .fixed-card p {
      color: #122853;
      font-size: 1.4rem;
      margin-top: 20px;
    }

    .block button, .fixed-card button {
      margin-top: 10px;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50; /* Green */
      color: white;
      font-size: 14px;
      cursor: pointer;
    }

    @media screen and (max-width: 600px) {
      .block {
        width: 100%;
        max-width: 300px;
      }
      .fixed-card {
        width: 100%;
      }
    }
    h1{
        font-size: 50px;
    }
    .i{
      width:100px;
    }
    .home-button {
            text-decoration: none;
            color: #3498db; /* Text color for the home button */
            display: flex;
            align-items: center;
        }
  </style>
</head>
<body>

<!-- Modal Start -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Enter City : </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="hospitallist.php" method="post">
      <div class="modal-body">
        <input class="form-control" type="text" placeholder="Enter City" aria-label="input example">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="loadContentBtn" class="btn btn-primary">Available Hospitals</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Modal Ends  -->

  <div class="navbar">
    <div class="logo">
      <img src="assets/images/logo.png" alt="Your Logo">
    </div>
    <div class="site-name">
      <h1>Medulla</h1>
    </div>
    <a href="index.php" class="home-button">
            <svg class="home-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 2L2 12h3v8h6v-6h6v6h6v-8h3z"/>
            </svg>
            Home
        </a>
  </div>
  

  <div class="blocks-wrapper">
    <div class="block">
        <i class="fa-solid fa-bed"></i>
        <img class="i" src="assets/images/bed ven.jpg" alt="hello">
      <p>ICU with ventilator </p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Click Here
</button>
      <!-- <a href="search.html"><button>Click Here</button></a> -->
    </div>
    <div class="block">
      <img class="i" src="assets/images/bed4.jpg" alt="">
      <p>ICU without ventilator</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Click Here
</button>
      <!-- <a href="search.html"><button>Click Here</button></a> -->
    </div>
    <div class="block">
      <img class="i" src="assets/images/nicu.jpg" alt="">
      <p>NICU with ventilator </p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Click Here
</button>
      <!-- <a href="search.html"><button>Click Here</button></a> -->
    </div>
  </div>
  <div class="blocks-wrapper">
    <div class="block">
      <img src="assets/images/nicu2.jpg" alt="" class="i">
      <p>NICU without ventilator</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Click Here
</button>
      <!-- <a href="search.html"><button>Click Here</button></a> -->
    </div>
    <div class="block">
      <img src="assets/images/gene.jpg" alt="" class="i">
      <p>General Bed with AC</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Click Here
</button>
      <!-- <a href="search.html"><button>Click Here</button></a> -->
    </div>
    <div class="block">
      <img src="assets/images/bed3.jpg" alt="" class="i">
      <p>General Bed without AC</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Click Here
</button>
      <!-- <a href="search.html"><button>Click Here</button></a> -->
    </div>
  


  <!-- Fixed card at the rightmost side -->
  
  <div class="fixed-card" id="contentDiv">
   <h2>Available beds :-</h2>

   <div class="card-body border border-2 bg-secondry rounded px-3">
    <p><span style="color:green">Beds Available :</span> 12 beds</p>
      <h5 class="card-title">Hospital Name : Sharda Hospital</h5>
      <p class="card-text">Contact No. : 9856743423</p>
      <span class="text-right"><a href="#" class="btn btn-primary text-right">Book Now</a></span>
    </div>

    <div class="card-body border border-2 bg-secondry rounded px-3">
    <p><span style="color:green">Beds Available :</span> 7 beds</p>
      <h5 class="card-title">Hospital Name : Kailash Hospital</h5>
      <p class="card-text">Contact No. : 9556843453</p>
      <span class="text-right"><a href="#" class="btn btn-primary text-right">Book Now</a></span>
    </div>

    <div class="card-body border border-2 bg-secondry rounded px-3">
    <p><span style="color:green">Beds Available :</span> 15 beds</p>
      <h5 class="card-title">Hospital Name : Yatharth Hospital</h5>
      <p class="card-text">Contact No. : 7356743423</p>
      <span class="text-right"><a href="#" class="btn btn-primary text-right">Book Now</a></span>
    </div>

    <div class="card-body border border-2 bg-secondry rounded px-3">
    <p><span style="color:green">Beds Available :</span> 10 beds</p>
      <h5 class="card-title">Hospital Name : Arogaya Hospital</h5>
      <p class="card-text">Contact No. : 6356743423</p>
      <span class="text-right"><a href="#" class="btn btn-primary text-right">Book Now</a></span>
    </div>






  </div>



</body>
</html>