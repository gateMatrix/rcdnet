<?php include "includes/head.php"; ?>

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="../assets/images/logo/rcdnetlogo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>


    <?php 
    include "includes/sidebarmenu.php";
    ?>


    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-content">
    <section class="row">
            <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>New Project</h3>
            </div>

        </div>
    </div>


<?php
//Create new beneficiary
if (isset($_POST['post'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $fund = $_POST['fundsource'];
    $donor = $_POST['donor'];
    $start = $_POST['startdate'];
    $stop = $_POST['stopdate'];
    $target = $_POST['target'];
    $budget = $_POST['budget'];
    $description = $_POST['description'];
    $status = $_POST['status'];


    include "../includes/connection.php";

    $sql = "UPDATE project SET name='$name', fundsource='$fund', donor='$donor', startdate='$start', stopdate='$stop', targetgroup='$target', budget='$budget', description='$description', status='$status' WHERE prID='$id'" ;

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("Project successfully created"); 
    window.location.href = "projects.php";
    </script>
    <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to add a new project"."</p>";
    }
    ?>




    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form action="" method="POST">
                          <?php 
                            $id = $_GET['id'];
                            include "../includes/connection.php";
                            $sql = "SELECT * FROM project INNER JOIN users ON project.donor=users.userID where prID='$id' "; 
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            ?>
                        <div class="row">
                        <div class="col-lg-6 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Project Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo  $row['name'];?>">
                        </div>
                        </div>
                        <div class="col-lg-6 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Source of Funds</label>
                            <input type="text" class="form-control" name="fundsource" value="<?php echo  $row['fundsource'];?>">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Project Donor</label>
                            <select class="form-control" name="donor" id="basicInput">
                                <option value="<?php echo  $row['donor'];?>"> <?php echo  $row['fullname'];?></option>
                                <?php
                                include "../includes/connection.php";
                                $sql = "SELECT * FROM users WHERE role='donor'";
                                if($result = mysqli_query($con, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                                echo '<option value='.$row['userID'].'>' . $row['fullname'] . '</option>';
                                        }
                                        mysqli_free_result($result);
                                    } else{
                                        echo "No records found.";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        </div>
                        <?php 
                            $id = $_GET['id'];
                            include "../includes/connection.php";
                            $sql = "SELECT * FROM project INNER JOIN users ON project.donor=users.userID where prID='$id' "; 
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            ?>
                            <div class="col-lg-6 mb-1">
                            <div class="form-group">
                            <label for="basicInput">Target Group</label>
                            <input type="text" class="form-control" name="target" value="<?php echo  $row['targetgroup'];?>">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" >Start Date</span>
                                        <input type="text" class="form-control" value="<?php echo  $row['startdate'];?>" name="startdate">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">End Date</span>
                                        <input type="text" class="form-control" value="<?php echo  $row['stopdate'];?>" name="stopdate">
                                    </div>
                                </div>
                            </div>

                        
                        <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <label for="basicInput">Project Budget</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Ugx</span>
                                        <input type="number" class="form-control" name="budget" value="<?php echo  $row['budget'];?>">
                                    </div>
                                </div> 
                        </div>
                         <div class="form-group">
                                    <label for="basicInput">Project Status</label>
                                    <select class="form-control" name="status">
                                        <option value="<?php echo  $row['status'];?>"><?php echo  $row['status'];?></option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Paused">Paused</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Terminated">Terminated</option>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Description</label>
                            <textarea class="form-control" name="description" rows="5"><?php echo  $row['description'];?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="post" value="Update Now">
                    </form>
                    </div> 
                </div>
            </div>
        </div>
    </section>


</div>
    </section>
</div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Created by <a href="http://julybrands.co.ug">JulyBrands Digital</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php include "includes/scripts.php"; ?>
</body>

</html>
