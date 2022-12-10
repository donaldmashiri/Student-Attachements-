<?php include ("indexheader.php") ?>
        <center>
	<div id="home_table" class="mt-3">
<h1>Register To Use The Platform</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning text-white fw-bold">Student Registration</div>
                    <div class="card-body">
                        <?php

                        if(isset($_POST['student_register'])){
                            $full_names = $conn -> real_escape_string($_POST['full_names']);
                            $gender = $conn -> real_escape_string($_POST['gender']);
                            $email = $conn -> real_escape_string($_POST['email']);
                            $address = $conn -> real_escape_string($_POST['address']);
                            $password = $conn -> real_escape_string($_POST['password']);
                            $con_password = $conn -> real_escape_string($_POST['con_password']);

                            $sql = "SELECT * FROM students WHERE email = '$email' OR reg_number = '$reg_number'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h4 style='background-color: lightcoral' class='alert alert-dark text-white         text-center'>The email/reg number  already exists</h4>";
                            }else{
                                if($password === $con_password){
                                    $sql = "INSERT INTO students (full_names, email, gender, address, password)
                            VALUES ('{$full_names}','{$email}', '{$gender}', '{$address}','{$password}')";

                                    if ($conn->query($sql) === TRUE) {
                                        echo "<p style='background-color: green' class='alert text-white alert-success'>Your Account Was successfully created</p>";
                                    }else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }else{
                                    echo "<p style='background-color: red' class='alert alert-dark text-white text-center'>Password did not match</p>";
                                }
                            }
                        }
                        ?>

                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="text" name="full_names" class="form-control form-control-user"
                                       id="MsuEmail" aria-describedby="emailHelp"
                                       placeholder="Enter Full Names" minlength="4" maxlength="25" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                       id="MsuEmail" aria-describedby="emailHelp"
                                       placeholder="Enter Email Address..." minlength="4" required>
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control" id="">
                                    <option value="not selected">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                        <textarea name="address" id="" cols="5" rows="3" class="form-control form-control-user"
                                                  placeholder="Address" minlength="4"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user"
                                       id="MsuPassword" placeholder="Password" minlength="4" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="con_password" class="form-control form-control-user"
                                       id="MsuPassword" placeholder="Confirm Password" minlength="4" required>
                            </div>
                            <button type="submit" name="student_register" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white fw-bold">Company Registration</div>
                    <div class="card-body">
                        <?php

                        if(isset($_POST['company_register'])){
                            $company_name = $conn -> real_escape_string($_POST['company_name']);
                            $company_email = $conn -> real_escape_string($_POST['company_email']);
                            $company_password = $conn -> real_escape_string($_POST['password']);

                            $sql = "SELECT * FROM companies WHERE company_email = '$email'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<p style='background-color: lightcoral' class='alert alert-dark text-white         text-center'>The email  already exists</p>";
                            }else{
                                    $sql = "INSERT INTO companies (company_name, company_email, password)
                            VALUES ('{$company_name}', '{$company_email}','{$company_password}')";

                                    if ($conn->query($sql) === TRUE) {
                                        echo "<p style='background-color: green' class='alert text-white alert-info'>Your company Was successfully created</p>";
                                    }else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }
                        }
                        ?>
                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="text" name="company_name" class="form-control form-control-user" id="MsuEmail" aria-describedby="emailHelp" placeholder="Enter Company Name" minlength="4" maxlength="25" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="company_email" class="form-control form-control-user"
                                       id="MsuEmail" aria-describedby="emailHelp"
                                       placeholder="Enter Company Email Address..." minlength="4" required>
                            </div>
                            <div class="form-group">
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

