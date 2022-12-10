<?php include ("../includes/header.php") ?>
<?php include ("navbar.php") ?>
<center>
    <div id="home_table" class="mt-3">
        <h1 class="text-warning">Company Profile</h1>
        <div class="container">
            <div class="row">
                <table class="table table-bordered table-sm">
                    <thead>
                    <?php
                    echo "<tr><th scope='col'>Company Name: </th> <td>$company_name</td></tr>";
                    echo "<tr><th scope='col'>Email: </th> <td>$company_email</td></tr></tr>";
                    echo "<tr><th scope='col'>City: </th> <td>$city</td></tr></tr>";
                    echo "<tr><th scope='col'>Address: </th> <td>$address</td></tr></tr>";
                    echo "<tr><th scope='col'>Weblink: </th> <td> <a href='$weblink'>$weblink</a> </td></tr></tr>";
                    echo "<tr><th scope='col'>Brief Background: </th> <td>$brief</td></tr></tr>";
                    ?>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</center>


</div>
<?php include ("../includes/footer.php"); ?>

