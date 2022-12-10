<?php include ("indexheader.php") ?>
<center>
    <div id="home_table" class="mt-5">
        <h1 class="text-primary"> Company Register To Use The Platform</h1>
        <div class="container-fluid row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white fw-bold">Company / Business Registration</div>
                    <div class="card-body">
                        <?php

                        if(isset($_POST['company_register'])){
                            $company_name = $conn -> real_escape_string($_POST['company_name']);
                            $company_email = $conn -> real_escape_string($_POST['company_email']);
                            $company_password = $conn -> real_escape_string($_POST['password']);
                            $city = $conn -> real_escape_string($_POST['city']);
                            $company_brief = $conn -> real_escape_string($_POST['company_brief']);
                            $weblink = $conn -> real_escape_string($_POST['weblink']);
                            $address = $conn -> real_escape_string($_POST['address']);

                            $sql = "SELECT * FROM companies WHERE company_email = '$email'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<p style='background-color: lightcoral' class='alert alert-dark text-white         text-center'>The email  already exists</p>";
                            }else{
                                $sql = "INSERT INTO companies (company_name, company_email, password, city, brief, weblink, address)
                            VALUES ('{$company_name}', '{$company_email}','{$company_password}', '{$city}', '{$company_brief}', '{$weblink}', '{$address}')";

                                if ($conn->query($sql) === TRUE) {
                                    echo "<p style='background-color: green' class='alert text-white alert-info'>Your company Was successfully created</p>";
                                }else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                        }
                        ?>
                        <form class="user" method="post">
                            <div class="form-group m-3">
                                <input type="text" name="company_name" class="form-control form-control-user" id="MsuEmail" aria-describedby="emailHelp" placeholder="Enter Company Name" minlength="4" maxlength="25" required>
                            </div>
                            <div class="form-group m-3">
                                <input type="email" name="company_email" class="form-control form-control-user"
                                       id="MsuEmail" aria-describedby="emailHelp"
                                       placeholder="Enter Company Email Address..." minlength="4" required>
                            </div>
                            <div class="form-group m-3">
                                <select name="city" class="form-control" id="">
                                    <option selected>Choose City</option>
                                    <option value="Harare">Harare</option>
                                    <option value="Kadoma">Kadoma</option>
                                    <option value="Kwekwe">Kwekwe</option>
                                    <option value="Victoria Falls">Victoria Falls</option>
                                    <option value="Norton">Norton</option>
                                </select>
                            </div>
                            <div class="form-group m-3">
                                        <textarea name="address" id="" cols="5" rows="3" class="form-control form-control-user"
                                                  placeholder="Address :" minlength="4"></textarea>
                            </div>
                            <div class="form-group m-3">
                                        <textarea name="company_brief" id="" cols="5" rows="3" class="form-control form-control-user"
                                                  placeholder="Company Brief background :" minlength="4"></textarea>
                            </div>
                            <div class="form-group m-3">
                                <input type="text" name="weblink" class="form-control form-control-user"
                                       id="MsuPassword" placeholder="Weblink (optional)" minlength="4" required>
                            </div>
                            <div class="form-group m-3">
                                <input type="password" name="password" class="form-control form-control-user"
                                       id="MsuPassword" placeholder="Password" minlength="4" required>
                            </div>


                            <button type="submit" name="company_register" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white fw-bold">Company Login</div>
                    <div class="card-body">
                        <?php
                        if(isset($_POST['company_login'])){
                            $email = $conn -> real_escape_string($_POST['email']);
                            $password = $conn -> real_escape_string($_POST['password']);

                            $query = "select * from companies where company_email = '$email' and password = '$password'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $count = mysqli_num_rows($result);

                            if ($count == 1) {
                                $_SESSION['comp_id'] = $row['comp_id'];
                                header('location: company/index.php');
                            } else {
                                echo "<p style='background-color: red' class='alert text-white alert-danger'>Incorrect Password</p>";
                            }
                        }

                        ?>

                        <form class="user" method="post">
                            <div class="form-group m-3">
                                <input type="email" name="email" class="form-control form-control-user"
                                       id="MsuEmail" aria-describedby="emailHelp"
                                       placeholder="Enter Company Email Your Address..." required>
                            </div>
                            <div class="form-group m-3">
                                <input type="password" name="password" class="form-control form-control-user"
                                       id="MsuPassword" placeholder="Password" required>
                            </div>
                            <button type="submit" name="company_login" class="btn btn-primary float-right btn-user">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</center>


</div>
<footer class="footer">
    <p>Copyright©2021. Business Locator</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

