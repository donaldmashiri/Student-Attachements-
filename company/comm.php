<?php include ("../includes/header.php") ?>
<?php include ("navbar.php");
if (isset($_POST['submit'])) {

    $feed_id = $_POST['feed_id'];
    $comment = $_POST['comment'];

    $query = "UPDATE feedbacks SET ";
    $query .= "comment  = '{$comment}' ";
    $query .= "WHERE feed_id = $feed_id ";

    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}


?>
<center>
    <div id="home_table" class="mt-3">
        <h1 class="text-dark">Communication</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" bg-light card">
                        <div class="card">
                            <div class="card-header">Communication</div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th scope='col'>FD#: </th>
                                        <th scope='col'>Fullnames: </th>
                                        <th scope='col'>Message: </th>
                                        <th scope='col'>Date: </th>
                                        <th scope='col'>Your Reply: </th>
                                        <th scope='col'></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
//                                    WHERE comp_id = '{$_SESSION['comp_id']}' ORDER BY vacancy_id DESC
                                    $sql = "SELECT * FROM feedbacks WHERE comp_id = {$_SESSION['comp_id']} ORDER BY feed_id DESC ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $feed_id = $row["feed_id"];
                                            $comp_id = $row["comp_id"];
                                            $username = $row["username"];
                                            $description = $row["description"];
                                            $date = $row["date"];
                                            $comment = $row["comment"];
                                            ?>

                                            <tr>
                                                <td>FD<?php echo $feed_id ?></td>
                                                <td><?php echo $username?></td>
                                                <td><?php echo $description ?></td>
                                                <td><?php echo $date ?></td>
                                                <td><?php echo $comment ?></td>
                                                <form method="post" action="">
                                                    <td>
                                                        <input type="hidden" name="feed_id" value="<?php echo $feed_id ?>">
                                                        <input type="text" name="comment" value="<?php echo $comment ?>" placeholder="Comment :">
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="submit" class="float-left mt-1 btn btn-outline-primary btn-sm">comment</button>
                                                    </td>
                                                </form>
                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        echo "<p class='alert alert-danger'>No Messages</p>";
                                    }
                                    ?>
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

