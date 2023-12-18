<?php
$con = new mysqli("localhost", "root", "", "medulla");
//$pickup = $_POST['pickup_address'];
// echo "<br>";
//$drop = $_POST['drop_address'];
$query="SELECT * FROM tbl_ambulance ORDER BY estimated_time, price ASC;";
    $res=mysqli_query($con,$query);
   

?>
<h2>Available Ambulance : </h2>
<!-- <table>
                <tr>
                    <th>S. No.</th>
                    <th>Driver Name</th>
                    <th>Mobile Number</th>
                    <th>Type</th>
                    <th>Estimated Time</th>
                    <th>Price</th>
                </tr> -->
                <?php
                 $i = 1;
                while($row = mysqli_fetch_array($res))

             {
                ?>

                <div class="card-body border border-2 bg-secondry rounded">
                    <h5 class="card-title">Driver Name : <?php echo strtoupper($row['driver_name']); ?></h5>
                    <p class="card-text">Mobile No. : <?php echo $row['mobile']; ?></p><span>
                    <p class="card-text"><?php echo $row['estimated_time']; ?> Min.</p></span>
                                <p class="card-text">Price : RS. <?php echo $row['price']; ?></p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>

            <?php
                $i++;
             }
             ?>
