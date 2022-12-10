<?php include "indexheader.php"?>
			
	<div id="">
		<img src="images/76771545_2442636822500605_5671403425586216960_n.jpg" alt="">
	</div>	
</div>
	<center>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <ul>
                            <li>
                                <h6>Search or Filter for the attachment you want</h6>
                                <form class="row gx-3 gy-2 align-items-center" action="search.php" method="get">
                                    <div class="col-sm-5">
                                        <input type="text" name="sfield" class="form-control" id="specificSizeInputName" placeholder="Enter Filed Name :">
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-select" name="squl" id="specificSizeSelect">
                                            <option selected>Choose...</option>
                                            <option value="Information Technology Or Computer Science">Information Technology / Computer Science</option>
                                            <option value="Accounting">Accounting / Banking And Finance</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Electrical Engineering">Electrical Engineering</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="search" class="btn btn-primary">Filter</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	<div id="home_table">
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

