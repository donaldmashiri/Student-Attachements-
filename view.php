<?php include "indexheader.php";

$id = $_GET['view'];


$sql = "SELECT * FROM vacancies JOIN companies ON vacancies.comp_id = companies.comp_id WHERE vacancies.vacancy_id = $id ";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
        $vacancy_id = $row["vacancy_id"];
        $comp_id = $row["comp_id"];
        $company_name = $row["company_name"];
        $company_email = $row["company_email"];
        $duties = $row["duties"];
        $field = $row["field"];
        $qualifications = $row["qualifications"];
        $closing_date = $row["closing_date"];
        $date_entered = $row["date_entered"];
        $address = $row["address"];
        $city = $row["city"];
        $weblink = $row["weblink"];
        $brief = $row["brief"];

?>
?>
</div>
<center>
    <div id="home_table" class="mt-5">
        <h1>Available Attachement Vacancies</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card mt-2">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h5 class="m-0 font-weight-bold text-dark fw-bolder"><?php echo $company_name ?></h5>
                            <p class=" justify-content-end text-info fw-bolder"><?php echo $field ?></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 bg-secondary text-white">Expiry Date: <?php echo $closing_date ?></div>
                                <div class="col-md-6 bg-secondary text-white">Date Entered: <?php echo $date_entered ?></div>
                                <div><h6 class="text-center">Duties And Responsibilities</h6>
                                    <p>
                                        <?php echo $duties ?>
                                    </p></div>
                                <div><h6 class="text-center">Qualifications</h6>
                                    <p>
                                        <?php echo $qualifications ?>
                                    </p></div>
                                <ul class="list-group">
                                    <li class="card-header bg-dark text-white">Company Information</li>
                                    <li class="list-group-item"><strong>Company Email : <?php echo $company_email ?></strong> </li>
                                    <li class="list-group-item">Location: <?php echo $address ?>
                                    </li>
                                    <li class="list-group-item">Website link: <a href="<?php echo $weblink ?>"><?php echo $weblink ?></a> </li>
                                    <li class="list-group-item"><strong>Company Brief:</strong> <?php echo $brief ?></li>
                                    <li>
                                        <a href="https://www.google.com/maps/dir/Gweru/<?php echo $city ?>/" target="_blank" class="btn btn-success">open Company location</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-body">

                        <?php
                        if(isset($_POST['submit'])){

                            $description = $conn -> real_escape_string($_POST['description']);
                            $username = $conn -> real_escape_string($_POST['username']);

                            $sql = "INSERT INTO feedbacks (comp_id, username, description, date)
                            VALUES ({$comp_id}, '{$username}', '{$description}',now())";

                            if ($conn->query($sql) === TRUE) {

                                echo "<h4 class='alert alert-success'>Message sent</h4>";

                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }

                        ?>

                        <form action="" method="post">
                               <div class="form-group">
                                   <input type="text" class="form-control" name="username" placeholder="Username">
                               </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Enter Message" rows="3"></textarea>
                            </div>

                           <div class="col">
                               <button type="submit" name="submit" class="btn btn-warning btn-sm float-right">Send</button>
                           </div>
                        </form>

                        <div class="card-body">
                            <div class="card-body">
                                <hr>
                                <?php

                                $sql = "SELECT * FROM feedbacks ORDER BY feed_id DESC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                        $feed_id = $row["feed_id"];
                                        $comp_id = $row["comp_id"];
                                        $username = $row["username"];
                                        $description = $row["description"];
                                        $date = $row["date"];
                                        $comment = $row["comment"];

                                        ?>
                                        <div class="border border-dark p-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="text-info fw-bold"><?php echo $username; ?></p>
                                                    <div class="mb-2 ng-binding bg-light">
                                                        <span class="font-weight-bold text-dark">Message :</span> <?php echo $description; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $date; ?></p>
                                                    <small class="text-info font-weight-bold text-capitalize">Reply: <?php echo $comment; ?></small>
                                                </div>
                                            </div>


                                        </div>
                                        <?php
                                    }
                                }else{
                                    echo "<p class='text'>No Messages Yet </p>";
                                }
                                ?>

                            </div>
                </div>
            </div>
        </div>

    </div>
</center>
</body>

<footer class="footer">
    <p>Copyright©2021. Business Locator</p>
</footer>
</body>
</html>

