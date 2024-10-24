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
                <h3>New Activity</h3>
            </div>

        </div>
    </div>


<?php
//Create new beneficiary
if (isset($_POST['post'])){
    $name = $_POST['name'];
    $project = $_POST['project'];
    $staff = $_POST['staff'];
    $year = $_POST['year'];


    include "../includes/connection.php";

    $sql = "INSERT INTO activity (activeName, project, staff, year)
    VALUES ('$name', '$project', '$staff', '$year')";

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("Activity successfully created"); 
    window.location.href = "activities.php";
    </script>
    <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to add a new activity"."</p>";
    }
    ?>




    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="basicInput">Activity Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter project name">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Project</label>
                            <select class="choices form-select" name="project">
                                <?php
                                include "../includes/connection.php";
                                $sql = "SELECT * FROM project";
                                if($result = mysqli_query($con, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                                echo '<option value='.$row['prID'].'>' . $row['name'] . '</option>';
                                        }
                                        mysqli_free_result($result);
                                    } else{
                                        echo "No records found.";
                                    }
                                }
                                ?> 
                            </select>
                        </div>

                         <div class="form-group">
                            <label for="basicInput">Staff Responsible</label>
                            <select class="choices form-select" name="staff">
                                <?php
                                include "../includes/connection.php";
                                $sql = "SELECT * FROM users WHERE role!='donor'";
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
                         <div class="form-group">
                                    <label for="basicInput">Year</label>
                                    <select class="form-control" name="category" name="year">
                                        <option value="">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="post" value="Add Now">
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
