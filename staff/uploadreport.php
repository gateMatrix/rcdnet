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
                <h3>New Document Report </h3>
            </div>

        </div>
    </div> 
<?php
//Create new beneficiary
if (isset($_POST['post'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $project = $_POST['project'];
    $userid = $_SESSION['userid'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $date  = date('d/m/Y');


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../docs/" . $filename;


    include "../includes/connection.php";

    $sql = "INSERT INTO staffdocs (date, name, file, project, category,  month, year, user)
    VALUES ('$date',  '$name', '$filename', '$project', '$category', '$month', '$year', '$userid')";

    if(move_uploaded_file($tempname, $folder) && mysqli_query($con, $sql) ){
       echo '<div class="alert alert-light-success color-success alert-dismissible show fade"><i class="bi bi-exclamation-circle"></i><strong> Your document has been successfully uploaded!! Welldone</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

    } else{
        echo '<div class="alert alert-light-danger color-danger alert-dismissible show fade"><i class="bi bi-exclamation-circle"></i><strong> Your report has not been submitted, Please form fields</strong><br> <i>ERROR: '. mysqli_error($con).'</i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
     
    // Close connection 
    mysqli_close($con);

}else{
   echo "<p class='text-subtitle text-muted'>"."Use this form to upload already made reports in .PDF"."</p>";

}

?>







    <section class="section">
    <div class="row">
    <div class="col">
    <div class="card">
    <div class="card-body">
    <form method="POST" enctype="multipart/form-data">





    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
    <label for="basicInput">Report name *</label>
    <input type="text" class="form-control" name="name" required placeholder="Enter report title">
    </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
    <label for="basicInput">Project Name</label>
    <select class="choices form-select" name="project">
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
    <div class="col-md-4">
    <div class="form-group">
    <label for="basicInput">Select Category</label>
    <select class="choices form-select" name="category">
    <option value='daily'>Daily Reports</option>
    <option value='weekly'>Weekly Reports</option>
    <option value='monthly'>Monthly Reports</option>
    </select>
    </div>
    </div>
    </div>



    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label for="basicInput">Month * <span style="font-weight: 300 !important; font-size: 0.8em;">(End month for periodic reports)</span></label>
    <select class="choices form-select" required name="month">
    <option value='January' >January</option>
    <option value='February' >February</option>
    <option value='March' >March</option>
    <option value='April' >April</option>
    <option value='May' >May</option>
    <option value='June' >June</option>
    <option value='July' >July</option>
    <option value='August' >August</option>
    <option value='September' >September</option>
    <option value='October' >October</option>
    <option value='December' >December</option>
    <option value='December' >December</option>
    </select>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label for="basicInput">Year *</label>
    <input type="text" class="form-control" name="year" required placeholder="Enter year">
    </div>
    </div>
    </div>


        <div class="row">
    <div class="form-group">
    <label for="basicInput">Attach report document(.PDF) </label>
    <input type="file" required class="form-control" name="uploadfile">
    </div>
    </div>

    <input type="submit" class="btn btn-primary" name="post" value="Upload Report">


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
