<?php include ("../includes/header.php") ?>
<?php include ("navbar.php") ?>
<center>
    <div id="home_table" class="mt-3">
        <h1 class="text-dark">Vacancies Created</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" bg-light card">
                        <div class="card">
                            <div class="card-header">Vacancies Created</div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">Vacancy#:</th>
                                        <th scope="col">Duties</th>
                                        <th scope="col">Field</th>
                                        <th scope="col">Qualification</th>
                                        <th scope="col">Date Entered</th>
                                        <th scope="col">Closing Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $sql = "SELECT * FROM vacancies WHERE comp_id = '{$_SESSION['comp_id']}' ORDER BY vacancy_id DESC ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            $vacancy_id = $row["vacancy_id"];
                                            $comp_id = $row["comp_id"];
                                            $duties = $row["duties"];
                                            $field = $row["field"];
                                            $qualifications = $row["qualifications"];
                                            $closing_date = $row["closing_date"];
                                            $date_entered = $row["date_entered"];

                                            ?>
                                            <tr>
                                                <th scope="row">VAC00<?php echo $vacancy_id ?></th>
                                                <td><?php echo $duties ?></td>
                                                <td><?php echo $field ?></td>
                                                <td><?php echo $qualifications ?></td>
                                                <td><?php echo $date_entered ?></td>
                                                <td><?php echo $closing_date ?></td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        <?php  }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</center>

</div>
<?php include ("../includes/footer.php"); ?>

