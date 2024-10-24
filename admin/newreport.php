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
                <h3>New Report </h3>
            </div>

        </div>
    </div>
<?php
//Create new beneficiary
if (isset($_POST['post'])){
    $topic = $_POST['topic'];
    $duration = $_POST['duration'];
    $category = $_POST['category'];
    $male = $_POST['male'];
    $female = $_POST['female'];
    $under17 = $_POST['under17'];
    $over18 = $_POST['over18'];
    $over30 = $_POST['over30'];
    $over35 = $_POST['over35'];
    $objectives = $_POST['objectives'];
    $workplan = $_POST['workplan'];
    $indicators = $_POST['indicators'];
    $purpose = $_POST['purpose'];
    $summary = $_POST['summary'];
    $expectations = $_POST['expectations'];
    $success = $_POST['success'];
    $challenges = $_POST['challenges'];
    $outputs = $_POST['outputs'];
    $followup = $_POST['followup'];
    $actionpoints = $_POST['actionpoints'];
    $userid = $_SESSION['userid'];
    $date =  date("d-m-Y");


    include "../includes/connection.php";

    $sql = "INSERT INTO report (topic, duration, category, male, female, under17, over18, over30, over35, objectives, workplan, indicators, purpose, summary, expectations, success, challenges, outputs, followup, actionpoints, date, manager)
    VALUES ('$topic', '$duration', '$category', '$male', '$female', '$under17', '$over18', '$over30', '$over35', '$objectives', '$workplan', '$indicators', '$purpose', '$summary', '$expectations', '$success', '$challenges', '$outputs', '$followup', '$actionpoints', '$date', '$userid')";

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("Report successfully created"); 
    window.location.href = "myreports.php";
    </script>
    <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to make a project report"."</p>";
    }
    ?>

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">


                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Select Activity</label>
                                <select class="choices form-select" name="topic">
                                        <?php
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM activity";
                                        if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo '<option value='.$row['activeID'].'>' . $row['activeName'] . '</option>';
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

                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Duration</label>
                                <input type="text" class="form-control" name="duration" placeholder="Duration">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Select Category</label>
                                <select class="choices form-select" name="category">
                                        <?php
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM bencategory";
                                        if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo '<option value='.$row['bid'].'>' . $row['bname'] . '</option>';
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

                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" class="form-control" name="male" placeholder="Male">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" class="form-control" name="female" placeholder="Female">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" class="form-control" name="under17" placeholder="Under 17">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>

                             <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" class="form-control" name="over18" placeholder="18-29">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" class="form-control" name="over30" placeholder="30-34">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" class="form-control" name="over35" placeholder="Above 35">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Project Objectives</label>
                                <textarea class="form-control" name="objectives"></textarea>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Relation to workplan</label>
                                <textarea class="form-control" name="workplan"></textarea>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Relevant Indicators</label>
                                <textarea class="form-control" name="indicators"></textarea>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Purpose of Activity</label>
                                <textarea class="form-control" name="purpose"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Summary of Activity Agenda</label>
                                <textarea class="form-control" name="summary"></textarea>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Activity Expectations</label>
                                <textarea class="form-control" name="expectations"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Key Successes</label>
                                <textarea class="form-control" name="success"></textarea>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Challenges</label>
                                <textarea class="form-control" name="challenges"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Outputs achieved</label>
                                <textarea class="form-control" name="outputs"></textarea>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Follow Up Required</label>
                                <textarea class="form-control" name="followup"></textarea>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                                <div class="form-group">
                                <label for="basicInput">Record Action Points</label>
                                <textarea class="form-control" name="actionpoints" rows="5"></textarea>
                                </div>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" name="post" value="Submit Report">
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
