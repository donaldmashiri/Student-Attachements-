<?php include ("../includes/header.php") ?>
<?php include ("navbar.php") ?>
<center>
    <div id="home_table" class="mt-3">
        <h1 class="text-warning">Create Vacancies</h1>
        <div class="container">
            <div class="row">
               <div class="col-md-8">
                   <div class=" bg-light card">
                       <div class="card-body">
                           <?php

                           if(isset($_POST['create_vacancy'])){
                               $duties = $conn -> real_escape_string($_POST['duties']);
                               $field = $conn -> real_escape_string($_POST['field']);
                               $qualification = $conn -> real_escape_string($_POST['qualification']);
                               $closing_date = $conn -> real_escape_string($_POST['closing_date']);

                               $sql = "INSERT INTO vacancies (comp_id, duties, field, qualifications, closing_date, date_entered)
                                VALUES ('{$_SESSION['comp_id']}', '{$duties}','{$field}', '{$qualification}', '{$closing_date}', now())";

                                       if ($conn->query($sql) === TRUE) {
                                           echo "<p class='alert text-dark fw-bolder alert-success'>Vacancy successfully created</p>";
                                       }else {
                                           echo "Error: " . $sql . "<br>" . $conn->error;
                                       }
                           }
                           ?>

                           <form class="user" method="post">
                               <div class="form-group mt-4">
                                   <label for="">Field / Program</label>
                                   <select name="field" class="form-control" id="">
                                       <option value="Information Technology Or Computer Science">Information Technology / Computer Science</option>
                                       <option value="Accounting">Accounting / Banking And Finance</option>
                                       <option value="Marketing">Marketing</option>
                                       <option value="Electrical Engineering">Electrical Engineering</option>
                                   </select>
                               </div>
                               <div class="form-group mt-3">
                                   <label for="">Duties And Responsibilities</label>
                                   <textarea name="duties" id="" cols="5" rows="3" class="form-control form-control-user"
                                             placeholder="Enter Duties And Responsibilities :" minlength="4"></textarea>
                               </div>

                               <div class="form-group mt-4">
                                   <label for="">Qualifications</label>
                                   <textarea name="qualification" id="" cols="5" rows="3" class="form-control form-control-user"
                                             placeholder="Enter Qualifications :" minlength="4"></textarea>
                               </div>
                               <div class="form-group mt-4">
                                   <label for="">Closing Date</label>
                                   <input type="date" class="form-control" name="closing_date">
                               </div>

                               <button type="submit" name="create_vacancy" class="btn btn-primary mt-2 btn-user btn-block">
                                   Create Vacancy
                               </button>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>

    </div>
</center>


</div>
<?php include ("../includes/footer.php"); ?>

