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
                <h3>Edit Report </h3>
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

    $sql = "UPDATE report SET topic='$topic', duration='$duration', category='$category', male='$male', female='$female', under17='$under17', over18='$over18', over30='$over30', over35='$over35', objectives='$objectives', workplan='$workplan', indicators='$indicators', purpose='$purpose', summary='$summary', expectations='$expectations', success='$success', challenges='$challenges', outputs='$outputs', followup='$followup', actionpoints='$actionpoints', date='$date'";

    if(mysqli_query($con, $sql)){
        echo '<div class="alert alert-light-success color-success alert-dismissible show fade"><i class="bi bi-exclamation-circle"></i><strong> Your report has been updated!! Welldone</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

        } else{ 

            echo '<div class="alert alert-light-danger color-danger alert-dismissible show fade"><i class="bi bi-exclamation-circle"></i><strong> Your report has not been updated, Please form fields</strong><br> <i>ERROR: '. mysqli_error($con).'</i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to edit existing report"."</p>";
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
                                <?php 
                            $reportid = $_GET['id'];

                            $sql = "SELECT * FROM report WHERE reportid = '$reportid' "; 
                            $result = mysqli_query($con, $sql);
                    		$row = mysqli_fetch_assoc($result);  

                            ?>
                                <input type="text" class="form-control" value="<?php echo $row['duration']; ?>" name="duration" placeholder="Duration">
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
                            <?php 
                            $reportid = $_GET['id'];

                            $sql = "SELECT * FROM report WHERE reportid = '$reportid' "; 
                            $result = mysqli_query($con, $sql);
                    		$row = mysqli_fetch_assoc($result);  

                            ?>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" value="<?php echo $row['male']; ?>" class="form-control" name="male" placeholder="Male">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" value="<?php echo $row['female']; ?>" class="form-control" name="female" placeholder="Female">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" value="<?php echo $row['under17']; ?>" class="form-control" name="under17" placeholder="Under 17">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>

                             <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" value="<?php echo $row['over18']; ?>" class="form-control" name="over18" placeholder="18-29">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" value="<?php echo $row['over30']; ?>" class="form-control" name="over30" placeholder="30-34">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" value="<?php echo $row['over35']; ?>" class="form-control" name="over35" placeholder="Above 35">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Project Objectives</label>
                                <textarea class="form-control" id="default"  name="objectives"><?php echo $row['objectives']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Relation to workplan</label>
                                <textarea class="form-control" id="default2"  name="workplan">
                                	<?php echo $row['workplan']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Relevant Indicators</label>
                                <textarea class="form-control" id="default3"  name="indicators">
                                	<?php echo $row['indicators']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Purpose of Activity</label>
                                <textarea class="form-control" id="default4"  name="purpose">
                                	<?php echo $row['purpose']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Summary of Activity Agenda</label>
                                <textarea class="form-control" id="default5"  name="summary">
                                	<?php echo $row['summary']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Activity Expectations</label>
                                <textarea class="form-control" id="default6"  name="expectations">
                                	<?php echo $row['expectations']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Key Successes</label>
                                <textarea class="form-control" id="default7"  name="success">
                                	<?php echo $row['success']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Challenges</label>
                                <textarea class="form-control" id="default8"  name="challenges">
                                	<?php echo $row['challenges']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Outputs achieved</label>
                                <textarea class="form-control" id="default9"  name="outputs">
                                	<?php echo $row['outputs']; ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Follow Up Required</label>
                                <textarea class="form-control" id="default10"  name="followup">
                                	<?php echo $row['followup']; ?>
                                </textarea>
                                </div>
                            </div> 
                        </div>
                         <div class="row">
                                <div class="form-group">
                                <label for="basicInput">Record Action Points</label>
                                <textarea class="form-control" id="default11"  name="actionpoints" rows="5">
                                	<?php echo $row['actionpoints']; ?>
                                </textarea>
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
<script>
    tinymce.init({ selector: '#default' });
    tinymce.init({ selector: '#default2' });
    tinymce.init({ selector: '#default3' });
    tinymce.init({ selector: '#default4' });
    tinymce.init({ selector: '#default5' });
    tinymce.init({ selector: '#default6' });
    tinymce.init({ selector: '#default7' });
    tinymce.init({ selector: '#default8' });
    tinymce.init({ selector: '#default9' });
    tinymce.init({ selector: '#default10' });
    tinymce.init({ selector: '#default11' });
    tinymce.init({ selector: '#default12' });
    tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
</script>
</html>
