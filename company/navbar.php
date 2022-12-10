<?php
if(empty($_SESSION['comp_id'])){
    header("location: ../business.php");
}

$sql = "SELECT * FROM companies WHERE comp_id = '{$_SESSION['comp_id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $comp_id = $row["comp_id"];
    $company_name = $row["company_name"];
    $company_email = $row["company_email"];
    $address = $row["address"];
    $city = $row["city"];
    $weblink = $row["weblink"];
    $brief = $row["brief"];
}
?>

?>

<div id="Business_Locator">
    <div class="menu">
        <h1>Business Locator</h1>
        <div id="menu">
            <ul  class="bg-primary">
                <li>
                    <a href="index.php" class="text-white"><p>Profile</p></a>
                </li>
                <li>
                    <a href="vacancies.php" class="text-white"><p>Create Vaccancies</p></a>
                </li>
                <li>
                    <a href="view_vacancies.php" class="text-white"><p>View Vacancies</p></a>
                </li>
                <li>
                    <a href="comm.php" class="text-white"><p>Communications</p></a>
                </li>
                <li>
                    <a href="business.php" class="text-white "><p class="fw-bold">Logout</p></a>
                </li>
            </ul>
            <div class="buttons">
                <center>
                    <a href="../index.php" class="btn btn-primary" >Go Home</a>
                </center>
            </div>
        </div>
    </div>
</div>