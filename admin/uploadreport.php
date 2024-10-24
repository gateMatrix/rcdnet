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
    $comment = $_POST['comment'];
    $userid = $_SESSION['userid'];
    $type = $_POST['type'];
    $month = $_POST['month'];
    $year = $_SESSION['year'];
    $photo = $_POST['file']; 
    $date  = date('d/m/Y');


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../docs/" . $filename;


    include "../includes/connection.php";

    $sql = "INSERT INTO reportdoc (name, category, doc, date, user, type, month, year)
    VALUES ('$name',  '$category', '$filename', '$date', '$userid', '$type', '$month', '$year')";

    if(move_uploaded_file($tempname, $folder) && mysqli_query($con, $sql) ){
        ?>
<script type="text/javascript"> 
alert("Report successfully uploaded"); 
window.location.href = "upreports.php";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
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
                            <div class="col-md-6">
                                 <div class="form-group">
                                <label for="basicInput">Report name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Male">
                                </div>
                            </div>

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
                        </div>

                         <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                                <label for="basicInput">Report Type</label>
                                 <select class="choices form-select" name="type">
                                        <option value='Management'>Monthly Management Highlights</option>
                                        <option value='AuditedBooks'>Audited Books of Accounts</option>
                                        <option value='Accountability'>Accountability Reports</option>
                                        <option value='Financial'>Monthly Financial Reports</option>
                                        <option value='Activity'>Activity Reports</option>
                                        <option value='Events'>Events and Fundraising Documents</option>
                                        <option value='Annual'>Annual Reports</option>
                                        <option value='Quarter'>Quarterly Reports</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="basicInput">Year *</label>
                                <select class="choices form-select" required name="year">
                                        <option value='<?php echo date(Y)-2; ?>' ><?php echo date(Y)-2; ?></option>
                                        <option value='<?php echo date(Y)-1; ?>' ><?php echo date(Y)-1; ?></option>
                                        <option value='<?php echo date(Y); ?>' ><?php echo date(Y); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                                <div class="form-group">
                                <label for="basicInput">Attach report document(.PDF) *</label>
                                <input type="file" required class="form-control" name="uploadfile">
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
