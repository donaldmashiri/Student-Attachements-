<?php include "indexheader.php"?>
</div>
<center>
    <div id="home_table" class="mt-5">
        <h1>Available Attachement Vacancies</h1>
        <div class="container">
            <div class="row">
                <?php

                $sql = "SELECT * FROM vacancies JOIN companies ON vacancies.comp_id = companies.comp_id ORDER BY vacancy_id DESC ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        $vacancy_id = $row["vacancy_id"];
                        $comp_id = $row["comp_id"];
                        $company_name = $row["company_name"];
                        $company_email = $row["comp_email"];
                        $duties = $row["duties"];
                        $field = $row["field"];
                        $qualifications = $row["qualifications"];
                        $closing_date = $row["closing_date"];
                        $date_entered = $row["date_entered"];

                        ?>
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
                                    <p>
                                    <div><?php echo $duties ?>
                                    </div></p>
                                    <a href="view.php?view=<?php echo $vacancy_id ?>" class=" btn btn-outline-info m-1">view</a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <?php
                    }
                }
                ?>
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

