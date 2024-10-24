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
        echo '<div class="alert alert-light-success color-success alert-dismissible show fade"><i class="bi bi-exclamation-circle"></i><strong> Your report has been submitted!! Welldone</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

        } else{ 

            echo '<div class="alert alert-light-danger color-danger alert-dismissible show fade"><i class="bi bi-exclamation-circle"></i><strong> Your report has not been submitted, Please form fields</strong><br> <i>ERROR: '. mysqli_error($con).'</i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to make a project report"."</p>";
    }
    ?>

    
<?php  
    $day = date('d');
    $month = date('M-Y'); 
    if ($day < 27) {
       include ("activeEmbed.php");
    }else{
        echo '<div class="alert alert-light-danger color-danger alert-dismissible show fade"><i class="bi bi-exclamation-circle"></i><strong> You can not submit reports today. Deadline was 27th-'.$month.'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
?>


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
